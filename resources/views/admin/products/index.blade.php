@extends('layouts.app')
@section('content')
    <nav class="breadcrumb-header bg-white justify-content-between p-3 rounded-5">
        <div>
            <ol class="breadcrumb bg-transparent ">
                <li class="breadcrumb-item text-sm "><a class="opacity-5 " href="{{route('admin')}}">{{__('dashboard.dashboard')}}</a></li>

                <li class="breadcrumb-item text-sm  active" aria-current="page">{{__('product.index')}}</li>
            </ol>
            <h6 class="font-weight-bolder">{{__('product.index')}}</h6>
        </div>
        <div>
            <a href="{{route('product.create')}}" class="btn btn-primary-gradient btn-sm py-1 "> +&nbsp; {{__('product.create')}} </a>
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

                <div class="card-body">
                    <div class="table-responsive">
                        <div class="table-responsive">
                            <table class="table table-flush" id="products-list">
                                <thead class="thead-light">
                                <tr>
                                    <th>{{__('keys.sequence')}}</th>
                                    <th>{{__('keys.image')}}</th>
                                    <th>{{__('keys.name')}}</th>
                                    <th>{{__('keys.category')}}</th>
                                    <th>{{__('keys.qty')}}</th>
                                    <th>{{__('keys.price')}}</th>
                                    <th>{{__('keys.status')}}</th>
                                    <th>{{__('keys.created_at')}}</th>
                                    <th>{{__('keys.updated_at')}}</th>
                                    <th>{{__('keys.action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($data as $item)
                                    <tr>
                                        <td>{{$loop->iteration}} </td>
                                        <td><img src="{{$item->thumb}}" class="img-thumbnail  rounded-circle " style="width:60px ; height:60px " alt=""></td>
                                        <td class="text-sm">{{$item->name}}</td>
                                        <td class="text-sm">{{$item->category->name}}</td>
                                        <td class="text-sm">{{$item->qty}}</td>
                                        <td class="text-sm">{{$item->price}}</td>
                                        <td class="text-sm">{!! $item->active?"<span class='badge badge-success'>".__('keys.active')."</span>":"<span class='badge badge-secondary'>".__('keys.inactive')."</span>" !!}</td>
                                        <td class="text-sm">{{$item->created_at->format('Y-m-d')}}</td>
                                        <td class="text-sm">{{$item->updated_at->format('Y-m-d')}}</td>
                                        <td class="text-sm">
                                            <a href="{{route('product.show',$item)}}" class="mx-1" title="{{__('btn.show')}} ">
                                                <i class="fas fa-eye text-primary"></i>
                                            </a>
                                            <a href="{{route('product.toggle_active',$item)}}" class="mx-1" title="{{$item->active?__('btn.dactivate'):__('btn.activate')}} ">
                                                <i class="fas fa-dot-circle @if($item->active) text-secondary @else  text-success @endif "></i>
                                            </a>
                                            <a href="{{route('product.edit',$item)}}" class="mx-1"  title="{{__('btn.edit')}} ">
                                                <i class="fas fa-edit text-warning"></i>
                                            </a>
                                            <x-delete-btn :route="route('product.destroy',$item)"></x-delete-btn>
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
                    </div>
                    {{$data->links()}}
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')
@endpush