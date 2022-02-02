@extends('layouts.app')
@section('content')
    <nav class="breadcrumb-header bg-white justify-content-between p-3 rounded-5">
        <div>
            <ol class="breadcrumb bg-transparent ">
                <li class="breadcrumb-item text-sm "><a class="opacity-5 " href="{{route('admin')}}">{{__('dashboard.dashboard')}}</a></li>

                <li class="breadcrumb-item text-sm  active" aria-current="page">{{__('user.index')}}</li>
            </ol>
            <h6 class="font-weight-bolder">{{__('user.index')}}</h6>
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
                            <table class="table table-flush" id="users-list">
                                <thead class="thead-light">
                                <tr>
                                    <th>{{__('keys.sequence')}}</th>
                                    <th>{{__('keys.image')}}</th>
                                    <th>{{__('keys.name')}}</th>
                                    <th>{{__('keys.email')}}</th>
                                    <th>{{__('keys.phone')}}</th>
                                    <th>{{__('keys.created_at')}}</th>
                                    <th>{{__('keys.status')}}</th>
                                    <th>{{__('keys.action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($data as $item)
                                    <tr>
                                        <td>{{$loop->iteration}} </td>
                                        <td><img src="{{$item->avatar}}" class="img-thumbnail  rounded-circle shadow-sm" style="width:60px ; height:60px " alt=""></td>
                                        <td class="text-sm">{{$item->name}}</td>
                                        <td class="text-sm">{{$item->email}}</td>
                                        <td class="text-sm">{{$item->phone}}</td>
                                        <td class="text-sm">{{$item->created_at->format('Y-m-d')}}</td>
                                        <td class="text-sm">{!! $item->active?"<span class='badge badge-success'>".__('keys.active')."</span>":"<span class='badge badge-secondary'>".__('keys.inactive')."</span>" !!}</td>
                                        <td class="text-sm text-center">
                                            <a href="{{route('user.show',$item)}}" disabled class="mx-1" title="{{__('btn.show')}} ">
                                                <i class="fas fa-eye text-primary"></i>
                                            </a>

                                            <a href="{{route('user.toggle_active',$item)}}"  class="mx-1" title="{{$item->active?__('btn.dactivate'):__('btn.activate')}} ">
                                                <i class="fas fa-dot-circle @if($item->active) text-secondary @else  text-success @endif "></i>
                                            </a>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">{{__('user.no_saved_users')}}</td>
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
@push('css')
    <style>
        table tbody tr td{
            vertical-align: middle !important;
        }
    </style>
@endpush
@push('js')
@endpush