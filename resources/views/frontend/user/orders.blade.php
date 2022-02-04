@extends('frontend.user.app')
@section('user')
@php
$orders = auth()->user()->orders()->select('total');
@endphp
    <div class="row">
        <div class="col-sm-12 my-2">
            <div class="card px-4  mb-4">
                <div class="card-body px-2">
                    <h3 class="card-title">{{__('front.myOrders')}}</h3>
                    <h1 class="text-end text-theme">{{$orders->count()}}</h1>
                </div>
            </div>
        </div>
        @foreach($data as $key => $order)
            <div class="col-md-12 my-2">
                <div class="card card-body shadow border-top-primary border-3 card-border bg-light">
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
        @endforeach
        <div class="mt-4">
            {{$data->links()}}
        </div>
    </div>

@stop
