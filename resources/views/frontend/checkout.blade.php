@extends('layouts.frontend',['title'=>__('pages.checkout')])
@section('looder')
    @include('frontend.includes.cart_loader')
@stop
@section('content')

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{__('pages.checkout')}}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">{{__('pages.home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{__('pages.checkout')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--section start-->
    <section class="cart-section section-b-space">
        <div class="container">
            @include('includes.alerts')

            <div class="checkout-page">
                <div class="checkout-form">
                    @if($cart->items)


                        <form action="{{route('checkout')}}" method="post" id="checkoutForm">
                            @csrf
                            <div class="row justify-content-center">

                                    <div class="col-lg-6 col-sm-12 col-xs-12">
                                        <div class="checkout-title">
                                            <h3>{{__('pages.checkout')}}</h3>
                                        </div>

                                        <div class="checkout-details">
                                            <div class="order-box">
                                                <div class="form-group">
                                                    <label for="address"> {{__('key.address')}} <span class="required">*</span></label>
                                                    <input type="text" id="address" name="address" value="{{old('address')}}" class="form-control required-field" required='required'>
                                                    @error("address")
                                                    <small class="form-control-feedback">{{$message}}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="notes"> {{__('key.notes')}}</label>
                                                    <textarea name="notes" id="notes" class="form-control"  style="height: 150px" placeholder="" >{{old('notes')}}</textarea>
                                                    @error("address")
                                                    <small class="form-control-feedback">{{$message}}</small>
                                                    @enderror
                                                </div>
                                                <hr class="my-3">

                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>{{__('keys.product')}}</th>
                                                            <th>{{__('keys.value')}}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($cart->items as $product)
                                                        <tr>
                                                            <td>{{$product['name_'.app()->getLocale()]}} × {{$product['qty']}}</td>
                                                            <td>$ {{ $product['price'] * $product['qty']}}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>

                                                <ul class="sub-total">
                                                    <li>{{__('cart.sub_total')}} <span class="count">{{ $cart->subTotalPrice  }}  </span></li>
                                                    <li>{{__('cart.discount')}} <span class="count" id="discount"> 0% </span></li>

                                                </ul>
                                                <ul class="total">
                                                    <li>{{__('cart.total')}} <span class="count" ><strong id="totalCart">$ {{ $cart->totalPrice  }} </strong></span></li>
                                                </ul>
                                            </div>

                                            <div class="payment-box">

                                                <div class="upper-box">

                                                    <div class="payment-options">

                                                        <label class="mb-4">{{__('keys.payment_method')}}:</label>
                                                        <ul>
                                                            <li>
                                                                    <div class="radio-option visaMeta" >
                                                                        <input type="radio" class=" required-field "  name="payment_method" checked value="on-delivery" required='required' id="payment-on-delivery" >
                                                                        <label for="payment-on-delivery">{{__('payment.on-delivery')}}</label>
                                                                    </div>
                                                                </li>

                                                        </ul>

                                                    </div>
                                                </div>

                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-solid " id="submitCheckout" > {{__('btn.checkout')}}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </form>
                    @else
                        <div class="row">
                            <div class="col-md-12 ">
                                <x-no-data></x-no-data>
                            </div>
                        </div>
                    @endif
                </div>
            </div>


            <div class="row cart-buttons">
                <div class="col-6">
                    <a href="{{url('/')}}" class="btn btn-solid">{{__('btn.continue_shopping')}}</a>
                </div>

            </div>
        </div>
    </section>
    <!--section end-->
@stop
@push('css')
    <style>
        table tbody tr td{
            vertical-align: middle !important;
        }
    </style>
@endpush
@push('js')
    <script>
        $(".quantity").change(function (e) {
            var id = $(this).data('id');
            var qty = $(this).val();
            let total_line = $(this).closest('tr').find('.subtotal-amount');
            $.get( `{{url('cart/update/')}}/${id}/${qty}` )
                .done(function( response ) {
                    if(!response.success){
                        notify(response.message,'error','fa fa-times');
                    }else{
                        let cart = response.cart;
                        let cart_row = cart.items[id];
                        total_line.html(parseFloat( cart_row.totalLine))
                        $('.cartSubTotalPrice').html(parseFloat(cart.subTotalPrice ));
                        $('.cartTotalPrice').html(parseFloat(cart.totalPrice));
                        updateHeaderCart(cart);
                        notify(response.message)
                    }
                });
        });

    </script>
@endpush
