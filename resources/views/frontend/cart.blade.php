@extends('layouts.frontend',['title'=>__('pages.cart')])
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
                        <h2>{{__('pages.cart')}}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">{{__('pages.home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{__('pages.cart')}}</li>
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

        @if($cart->items)
                <div class="row mb-4 border-bottom">
                    <div class="col-12 ">
                        <div class="cart_counter">
                            <div class="countdownholder">
                                {{__('pages.cart_items')}}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-end mb-4">
                        <a href="{{route('cart.empty')}}" class="btn btn-outline-secondary">{{__('btn.empty_cart')}}</a>

                    </div>
                    <div class="col-md-12 ">
                        <div class="table-responsive">
                            <table class="table cart-table">
                                <thead>
                                <tr class="table-head">
                                    <th scope="col">{{__('keys.image')}}</th>
                                    <th scope="col">{{__('keys.name')}}</th>
                                    <th scope="col">{{__('keys.unit_price')}}</th>
                                    <th scope="col" style="width: 120px">{{__('keys.qty')}}</th>
                                    <th scope="col">{{__('cart.sub_total')}}</th>
                                    <th scope="col">{{__('btn.delete')}}</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $cart->items as $id => $item)
                                    @php ($product = \App\Models\Product::find($id) )

                                    <tr class="text-center">
                                        <td class="product-thumbnail" >
                                            <a href="#">
                                                <img src="{{$item['image']}}" alt="item">
                                            </a>
                                        </td>

                                        <td class="product-name text-center">
                                            <a href="#">{{$item['name_'.app()->getLocale()]}}</a>
                                        </td>


                                        <td class="product-price text-center">
                                            <span class="unit-amount">${{$item['price'] }}  </span>
                                        </td>


                                        <td class="product-quantity text-center ">
                                            <input type="number" name="quantity" data-id="{{$id}}" data-color="0" class="form-control quantity" max="{{$product->qty}}"  min="1" value="{{$item['qty']}}">
                                        </td>
                                        <td class="product-subtotal text-center" >
                                            $ <span class="subtotal-amount">  {{ $item['totalLine']  }}</span>
                                        </td>
                                        <td class="text-center" >
                                            <a href="#" onclick="$('#removeCartItem{{$id}}').submit()" data-id="{{ $id }}" class="remove mx-4 text-danger">
                                                <i class="ti-trash"></i>
                                                <form action="{{route('cart.delete_item',$id)}}" id="removeCartItem{{$id}}" method="get" hidden></form>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>

                <div class="row justify-content-end" style="overflow: hidden">

                    <div class="col-md-5">
                        <h3>{{__('front.cartTotals')}}</h3>

                        <table class="table " id="">
                            <tr>
                                <th>{{__('cart.sub_total')}}</th>
                                <td>
                                    <span> $<span class="cartSubTotalPrice"> {{ session()->get('cart')->subTotalPrice }}</span> </span>
                                </td>
                            </tr>
                            <tr>
                                <th> {{__('cart.discount')}}</th>
                                <td>
                                    0%
                               </td>
                            </tr>
                            <tr>
                                <th>{{__('cart.total')}}</th>
                                <td>
                                    <span>$<span class="cartTotalPrice"> {{ session()->get('cart')->totalPrice }} </span></span>
                                </td>
                            </tr>
                        </table>

                    </div>
                </div>
            @else

                <div class="row">
                    <div class="col-md-12 alert alert-info">
                        <p class="alert alert-secondary text-center">
                            {{__('cart.no_products_added')}}
                        </p>
                    </div>
                </div>

            @endif

            <div class="row cart-buttons">
                <div class="col-6">
                    <a href="{{url('/')}}" class="btn btn-solid">{{__('btn.continue_shopping')}}</a>
                </div>
                @if($cart->items)
                    <div class="col-6"><a href="{{route('checkout')}}" class="btn btn-solid">{{__('btn.checkout')}}</a></div>
                @endif
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
