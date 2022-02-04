@extends('layouts.app')
@section('content')
    <nav class="breadcrumb-header bg-white justify-content-between p-3 rounded-5">
        <div>
            <ol class="breadcrumb bg-transparent ">
                <li class="breadcrumb-item text-sm "><a class="opacity-5 " href="{{route('admin')}}">{{__('dashboard.dashboard')}}</a></li>

                <li class="breadcrumb-item text-sm  active" aria-current="page">{{__('orders.index')}}</li>
            </ol>
            <h6 class="font-weight-bolder">{{__('orders.index')}}</h6>
        </div>


    </nav>

    <div class="row mt-7">
        <div class="col-md-12">
            <div class="card">
                <!-- Card header -->

                <div class="card-body">
                    <div class="table-responsive">
                        <div class="table-responsive">
                            <table class="table table-flush" id="users-list">
                                <thead class="thead-light">
                                <tr>
                                    <th>{{__('keys.sequence')}}</th>
                                    <th>{{__('keys.user')}}</th>
                                    <th>{{__('keys.ordered_at')}}</th>
                                    <th>{{__('keys.order_items')}}</th>
                                    <th>{{__('keys.address')}}</th>
                                    <th>{{__('keys.notes')}}</th>
                                    <th>{{__('keys.action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($data as $item)
                                    <tr>
                                        <td class="text-sm">{{$loop->iteration}}</td>
                                        <td class="text-sm">{{$item->user->name}}</td>
                                        <td class="text-sm">{{$item->created_at->format('Y-m-d')}}</td>
                                        <td class="text-sm">{{$item->items_count}}</td>
                                        <td class="text-sm">{{$item->address}}</td>
                                        <td class="text-sm">{{$item->notes}}</td>
                                        <td class="text-sm text-center">
                                            <a href="{{route('order.show',$item)}}" disabled class="mx-1" title="{{__('btn.show')}} ">
                                                <i class="fas fa-eye text-primary"></i>
                                            </a>



                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">{{__('order.no_saved_orders')}}</td>
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