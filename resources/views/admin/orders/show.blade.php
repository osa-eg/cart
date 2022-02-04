@extends('layouts.app')

@section('content')
    <nav class="breadcrumb-header bg-white justify-content-between p-3 rounded-5">
        <div>
            <ol class="breadcrumb bg-transparent ">
                <li class="breadcrumb-item text-sm "><a class="opacity-5 " href="{{route('admin')}}">{{__('dashboard.dashboard')}}</a></li>
                <li class="breadcrumb-item text-sm "><a class="opacity-5 " href="{{route('order.index')}}">{{__('order.title')}}</a></li>
                <li class="breadcrumb-item text-sm  active" aria-current="page">{{__('order.details')}}</li>
            </ol>
            <h6 class="font-weight-bolder">{{$order->name}}</h6>
        </div>
        <div>
            <a href="{{route('order.index')}}" class="btn btn-outline-dark btn-sm py-1 m-1 ">  {{__('btn.back')}} </a>
        </div>
    </nav>
    <div class="row row-sm justify-content-center">
        <div class="col-md-8">
            <div class="card card-body shadow border-top-primary border-3 card-border ">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{__('keys.ordered_at')}}</th>
                            <th>{{__('keys.total')}}</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td>{{$order->created_at->format('d-m-Y')}}</td>
                            <td>$ {{$order->total }}</td>
                        </tr>
                        </tbody>

                    </table>


                    <label for="" class="mt-3"> {{__('keys.order_items')}}</label>

                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__('keys.name')}}</th>
                            <th>{{__('keys.qty')}}</th>
                            <th>{{__('keys.unit_price')}}</th>
                            <th>{{__('keys.sub_total')}}</th>
                        </tr>
                        </thead>
                        @foreach($order->items()->with('product')->get() as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->product->name}}</td>
                                <td>{{$item->qty}}</td>
                                <td>{{$item->unit_price}}</td>
                                <td>{{$item->unit_price * $item->qty}}</td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="d-flex justify-content-around">
                        <div class="">
                            <label for="" class="mt-3"> {{__('keys.address')}}</label>
                            <p>{{$order->address}}</p>
                        </div>
                        <div class="">
                            <label for="" class="mt-3"> {{__('keys.notes')}}</label>
                            <p>{{$order->notes}}</p>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>


@stop