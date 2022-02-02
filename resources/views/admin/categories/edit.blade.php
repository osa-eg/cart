@extends('layouts.app')

@section('content')
    <nav class="breadcrumb-header bg-white justify-content-between p-3 rounded-5">
        <div>
            <ol class="breadcrumb bg-transparent ">
                <li class="breadcrumb-item text-sm "><a class="opacity-5 " href="{{route('admin')}}">{{__('dashboard.dashboard')}}</a></li>
                <li class="breadcrumb-item text-sm "><a class="opacity-5 " href="{{route('category.index')}}">{{__('category.title')}}</a></li>
                <li class="breadcrumb-item text-sm  active" aria-current="page">{{$category->name}}</li>
            </ol>
            <h6 class="font-weight-bolder">{{__('category.update')}}</h6>
        </div>
        <div>
            <a href="{{route('category.index')}}" class="btn btn-primary-gradient btn-sm py-1 ">  {{__('btn.back')}} </a>
        </div>
    </nav>
    <div class="row">
        <div class="col-md-6 col-12 mx-auto">
            <form action="{{ route('category.update',$category)}}" method="post" class="card mt-4">
                @csrf
                @method('PUT')
                <div class="card-header border-bottom">
                    <h4 class="mb-0">{{__('category.update')}}</h4>
                    <p>{{__('category.update_subtitle')}}</p>
                </div>

                <div class="card-body">
                    @foreach(config('settings.locales') as $lang)
                        <div class="form-group">
                            <label for="name{{$lang}}" class="form-label mt-2">{{__('keys.name')}} ({{__('lang.'.$lang)}})</label>
                            <input type="text" name="{{$lang.'[name]'}}" class="form-control" id="name{{$lang}}" value="{{old("{$lang}.name",$category->translate($lang)->name??'')}}" required>
                            @error($lang.'.name')
                            <small class="form-control-feedback">{{$message}}</small>
                            @enderror
                        </div>

                    @endforeach


                    <label for="parent_id" class="mt-4 form-label">
                        {{__('keys.main_category')}}
                    </label>
                    <select id="parent_id" class="form-control select2" name="parent_id"  >
                        <option value="" selected>{{__('keys.its_main_cat')}}</option>
                        @foreach($categories as $cat)
                            <option value="{{$cat->id}}" @if(old('parent_id',$category->parent_id) == $cat->id) selected @endif>{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>



                <div class="card-footer d-flex justify-content-end mt-4">
                    <button type="submit" name="button" class="btn bg-primary-gradient py-1 m-0 ms-2">{{__('btn.save')}}</button>
                </div>
            </form>
        </div>
    </div>

@stop
