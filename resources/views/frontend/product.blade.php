@extends('layouts.frontend',['title'=>$product->name])
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
                        <h2>{{$product->name}}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">{{__('pages.home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{__('pages.products')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!-- slider and product -->
    <div class="container">
        <!-- slider tab  -->
        <section>
            <div class="collection-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-slick">
                                <div><img src="{{$product->image}}" alt=""
                                          class="img-fluid blur-up lazyload image_zoom_cls-0"></div>
                                @foreach($product->media as $media)
                                    <div><img src="{{$media->getUrl()}}" alt=""
                                              class="img-fluid blur-up lazyload image_zoom_cls-1"></div>
                                @endforeach

                            </div>

                                <div class="row">
                                    <div class="col-12 p-0">
                                        <div class="slider-nav">
                                            <div><img src="{{$product->image}}" alt=""   class="img-fluid blur-up imgScroll lazyload"></div>
                                            @foreach($product->media as $media)
                                                <div class="text-center"><img src="{{$media->getUrl('thumb')}}" alt=""  class="img-fluid blur-up imgScroll lazyload"></div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>


                        </div>
                        <div class="col-lg-6 rtl-text">
                            <div class="product-right">

                                <h2>{{$product->name}}</h2>
                                <div class="label-section">
                                    <span class="badge badge-grey-color"># {{$product->category->name??''}}</span>
                                </div>

                                <h3 class="price-detail">{{$product->price}} </h3>

                                <div class="row">
                                    <div class="col-md-12 table-responsive smallText" style="overflow: hidden">
                                        {!! $product->description !!}

                                    </div>
                                </div>

                                <div class="pt-5">
                                    <div class="product-buttons">
                                        @if(!$product->qty )
                                            <small class="text-danger">{{__('keys.not_available')}}</small>
                                        @else
                                            <div class="qty-box ">
                                                <div class="input-group justify-content-start" ><span class="input-group-prepend">
                                                <button type="button" class="btn quantity-left-minus" id="vMinus" data-type="minus" data-field="">
                                                    <i  class="ti-minus"></i>
                                                </button>
                                            </span>
                                                    <input type="text" id="qtyInput" name="quantity" class="form-control input-number" value="1">
                                                    <span class="input-group-prepend">
                                                <button type="button" class="btn quantity-right-plus" id="vPlus" data-max="{{$product->qty}}" data-type="plus" data-field="">
                                                    <i class="ti-plus"></i>
                                                </button>
                                            </span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="alert text-danger p-0 mt-0" id="maxQuntity" style="display: none">
                                        <small>{{__('alerts.maxQuntityAvailable')}}</small>
                                    </div>

                                    <div class="product-buttons">
                                        <a class="btn btn-solid product_available pointer" id="vAddToCart" data-id="{{$product->id}}">{{__('btn.add_to_cart')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- slider tab end -->

    </div>

    <!-- slider and product -->


    @include('frontend.includes.product_modal')
@stop
