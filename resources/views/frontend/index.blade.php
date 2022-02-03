@extends('layouts.frontend',['title'=>__('pages.home')])
@section('looder')
    @include('frontend.includes.home_loader')
@stop
@section('content')

    <!-- Home slider -->
    <section class="small-slider pt-0 home-fashion mt-0">
        <div class="container container-lg">
            <div class="slider-animate home-slider">
                <div>
                    <div class="home">
                        <img src="{{asset('front/assets/images/home-banner/1.jpg')}}" alt="" class="bg-img blur-up lazyload w-100">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="slider-contain px-padding">
                                        <div>
                                            <h4 class="animated" data-animation-in="fadeInUp">{{__('slider.save')}} 30%</h4>
                                            <h1 class="animated" data-animation-in="fadeInUp" data-delay-in="0.3">
                                                {{__('slider.special_price')}}</h1>
                                            <a href="#" class="btn btn-solid animated"
                                               data-animation-in="fadeInUp" data-delay-in="0.5">
                                                {{__('slider.shop_now')}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="home">
                        <img src="{{asset('front/assets/images/home-banner/3.jpg')}}" alt="" class="bg-img blur-up lazyload w-100">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="slider-contain px-padding">
                                        <div>
                                            <h4 class="animated" data-animation-in="fadeInUp">{{__('slider.save')}} 30%</h4>
                                            <h1 class="animated" data-animation-in="fadeInUp" data-delay-in="0.3">
                                                {{__('slider.special_price')}}</h1>
                                            <a href="#" class="btn btn-solid animated"
                                               data-animation-in="fadeInUp" data-delay-in="0.5">
                                                {{__('slider.shop_now')}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Home slider end -->

    <!-- slider and product -->
    <div class="container">
        <!-- slider tab  -->
        <section class="section-b-space ratio_square  layout-8-bg">
            <div class="container-fluid">
                <div class="title4 mb-2">
                    <h2 class="title-inner4">{{__('front.trending_products')}}</h2>
                    <div class="line mb-0">
                        <span></span>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col">
                        <div class="layout7-product">
                            <div class="row no-slider">
                                @foreach($products as $product )
                                    <x-product-box :product="$product"></x-product-box>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- slider tab end -->

    </div>

    <!-- slider and product -->
@stop
@push('js')

@endpush
