@extends('layouts.app')

@section('content')
    <nav class="breadcrumb-header bg-white justify-content-between p-3 rounded-5">
        <div>
            <ol class="breadcrumb bg-transparent ">
                <li class="breadcrumb-item text-sm "><a class="opacity-5 " href="{{route('admin')}}">{{__('dashboard.dashboard')}}</a></li>
                <li class="breadcrumb-item text-sm "><a class="opacity-5 " href="{{route('product.index')}}">{{__('product.title')}}</a></li>
                <li class="breadcrumb-item text-sm  active" aria-current="page">{{__('product.create')}}</li>
            </ol>
            <h6 class="font-weight-bolder">{{__('product.create')}}</h6>
        </div>
        <div>
            <a href="{{route('product.index')}}" class="btn btn-primary-gradient btn-sm py-1 ">  {{__('btn.back')}} </a>
        </div>
    </nav>
    <div class="row">
        <div class="col-md-9 col-12 mx-auto">
            <form action="{{ route('product.store')}}" method="post" class="card mt-4" enctype="multipart/form-data">
                @csrf
                <div class="card-header border-bottom">
                    <h4 class="mb-0">{{__('product.create')}}</h4>
                    <p>{{__('product.create_subtitle')}}</p>
                </div>

                <div class="card-body row">
                    @foreach(config('settings.locales') as $lang)
                        <div class="form-group col-md-6">
                            <label for="name{{$lang}}" class="form-label mt-2">{{__('keys.name')}} ({{__('lang.'.$lang)}})</label>
                            <input type="text" maxlength="150" name="{{$lang.'[name]'}}" class="form-control" id="name{{$lang}}" value="{{old("{$lang}.name")}}" required>
                            @error($lang.'.name')
                            <small class="form-control-feedback">{{$message}}</small>
                            @enderror
                        </div>
                    @endforeach
                    @foreach(config('settings.locales') as $lang)
                        <div class="form-group col-md-12">
                            <label for="editor{{$lang}}" class="form-label mt-2">{{__('keys.description')}}  ({{__('lang.'.$lang)}})</label>
                            <textarea name="{{$lang.'[description]'}}" class="form-control editor" id="editor{{$lang}}"  required>{{old("{$lang}.description")}} </textarea>
                            @error("{$lang}.description")
                            <small class="form-control-feedback">{{$message}}</small>
                            @enderror
                        </div>

                    @endforeach


                        <div class="form-group col-md-6">
                            <label for="category_id" class="mt-4 form-label">
                                {{__('keys.category')}}
                            </label>
                            <select id="category_id" class="form-control select2" name="category_id" required >
                                <option value="" >{{__('main.select')}}</option>
                                @foreach($categories as $category)
                                    <optgroup label="{{$category->name}}">
                                        @foreach($category->children as $child)
                                            <option value="{{$child->id}}" @if($child->id == old('category_id')) selected @endif>{{$child->name}} </option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                            @error("category_id")
                            <small class="form-control-feedback">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="price" class="mt-4 form-label">
                                {{__('keys.price')}}
                            </label>
                            <input type="number" name="price" step="0.1" min="1" max="999999" id="price"  value="{{old('price')}}" class="form-control">
                            @error("price")
                            <small class="form-control-feedback">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="qty" class="mt-4 form-label">
                                {{__('keys.qty')}}
                            </label>
                            <input type="number" name="qty"  min="0" max="999999" id="qty"  value="{{old('qty')}}" class="form-control">
                            @error("qty")
                            <small class="form-control-feedback">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="images" class="form-label mt-2">{{__('keys.images')}} </label>
                            <input name="images[]" multiple id="images" type="file" class="form-control dropify" data-allowed-file-extensions="jpg png jpeg" data-show-remove="true"   data-max-file-size="1M"  >
                            @error('images')
                            <small class="form-control-feedback">{{$message}}</small>
                            @enderror
                        </div>

                </div>



                <div class="card-footer d-flex justify-content-end mt-4">
                    <button type="submit" name="button" class="btn bg-primary-gradient py-1 m-0 ms-2">{{__('btn.save')}}</button>
                </div>
            </form>
        </div>
    </div>

@stop
@push('css')
    <link href="{{asset('backend/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet"/>
    <style>
        .tox-notifications-container , .tox-statusbar__branding{
            display: none !important;
        }

    </style>
@endpush
@push('js')
    <script src="https://cdn.tiny.cloud/1/4dicqoprk22q8y48ztd33hmhj8we4vy8ipldqtzvg1z35bu6/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script  async defer src="{{asset('backend/assets/js/editor.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/fileuploads/js/file-upload.js')}}"></script>

@endpush