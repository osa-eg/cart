@extends('frontend.user.app')
@section('user')
@php
$orders = auth()->user()->orders()->select('total','tax');
@endphp
    <form action="{{route('updateProfile')}}" method="post">
        @csrf
        <div class="row">

            <div class="col-md-6 form-group py-2">
                <label for="name">{{__('keys.name')}}</label>
                <input type="text" class="form-control" value="{{auth()->user()->name}}" name="name" id="name" required>
            </div>
            <div class="col-md-6 form-group py-2">
                <label for="email">{{__('keys.email')}}</label>
                <input type="text" class="form-control" value="{{auth()->user()->email}}" name="email" id="email" readonly required>
            </div>
            <div class="col-md-6 form-group py-2">
                <label for="phone">{{__('keys.phone')}}</label>
                <input type="text" class="form-control" value="{{auth()->user()->phone}}" name="phone" id="phone"  required>
            </div>
            <div class="col-md-12 text-center form-group py-2">
                <input type="submit" class=" btn btn-theme" value="{{__('btn.update')}}" >
            </div>

        </div>
    </form>

@stop
