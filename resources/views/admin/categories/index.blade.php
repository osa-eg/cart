@extends('layouts.app')
@section('content')
    <nav class="breadcrumb-header bg-white justify-content-between p-3 rounded-5">
        <div>
            <ol class="breadcrumb bg-transparent ">
                <li class="breadcrumb-item text-sm "><a class="opacity-5 " href="{{route('admin')}}">{{__('dashboard.dashboard')}}</a></li>

                <li class="breadcrumb-item text-sm  active" aria-current="page">{{__('category.index')}}</li>
            </ol>
            <h6 class="font-weight-bolder">{{__('category.index')}}</h6>
        </div>
        <div>
            <a href="{{route('category.create')}}" class="btn btn-primary-gradient btn-sm py-1 "> +&nbsp; {{__('category.create')}} </a>
        </div>
    </nav>


    <div class="row mt-7">
        <div class="col-md-12">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <form class="row">
                        @csrf
                        <div class="col-md-6 input-group">
                            <input type="text" class="form-control" placeholder="{{__('main.enter_name')}}" name="name" value="{{request()->name??''}}">
                            <button class="input-group-append btn btn-primary" type="submit">{{__('btn.search')}}</button>
                            @if(request()->has('name'))
                                <a href="{{url()->current()}}" class="input-group-append btn btn-secondary" type="submit">{{__('btn.clear_search')}}</a>
                            @endif
                        </div>
                    </form>

                </div>
                <div class="card-body px-2 pb-0">
                    <div class="table-responsive">
                        <table class="table table-flush" id="products-list">
                            <thead class="thead-light">
                            <tr>
                                <th>{{__('keys.sequence')}}</th>
                                <th>{{__('keys.name')}}</th>
                                <th>{{__('keys.type')}}</th>
                                <th>{{__('keys.parent')}}</th>
                                <th>{{__('keys.children_count')}}</th>
                                <th>{{__('keys.products_count')}}</th>
                                <th>{{__('keys.status')}}</th>
                                <th>{{__('keys.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($data as $item)
                                <tr>
                                    <td>{{$loop->iteration}} </td>
                                    <td class="text-sm">{{$item->name}}</td>
                                    <td class="text-sm">{{(!$item->parent_id)?__('key.main_category'): __('key.sub_category')}}</td>
                                    <td class="text-sm">{{$item?->parent->name??__('key.not_found')}}</td>

                                    <td class="text-sm">{{$item->children_count}}</td>
                                    <td class="text-sm">{{$item->products_count}}</td>
                                    <td class="text-sm">{!! $item->active?"<span class='badge badge-success'>".__('keys.active')."</span>":"<span class='badge badge-secondary'>".__('keys.inactive')."</span>" !!}</td>
                                    <td class="text-sm">

                                        <a href="{{route('category.show',$item)}}" class="mx-1" title="{{__('btn.show')}} ">
                                            <i class="fas fa-eye text-primary"></i>
                                        </a>

                                        <a href="{{route('category.toggle_active',$item)}}" class="mx-1" title="{{$item->active?__('btn.dactivate'):__('btn.activate')}} ">
                                            <i class="fas fa-dot-circle @if($item->active) text-secondary @else  text-success @endif "></i>
                                        </a>
                                        <a href="{{route('category.edit',$item)}}" class="mx-1"  title="{{__('btn.edit')}} ">
                                            <i class="fas fa-edit text-warning"></i>
                                        </a>

                                        <x-delete-btn :route="route('category.destroy',$item)"></x-delete-btn>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">{{__('category.no_saved_categories')}}</td>
                                </tr>
                            @endforelse
                            </tbody>

                        </table>
                    </div>
                    {{$data->links()}}
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')
@endpush