@extends('frontend.user.app')
@section('user')
@php
$orders = auth()->user()->orders()->select('total');
@endphp
    <div class="row">
        <div class="col-sm-6 my-2">
            <div class="card px-4 shadow">
                <div class="card-body px-2">
                    <h3 class="card-title">{{__('front.myOrders')}}</h3>
                    <h1 class="text-end text-theme">{{$orders->count()}}</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-6 my-2">
            <div class="card px-4 shadow">
                <div class="card-body px-2">
                    <h3 class="card-title">{{__('keys.orders_total')}}</h3>
                    <h1 class="text-end text-theme">$ {{$orders->sum('total') }}  </h1>
                </div>
            </div>
        </div>
    </div>

@stop
