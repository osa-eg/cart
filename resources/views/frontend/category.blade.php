@extends('layouts.frontend',['title'=>$category->name])
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
                        <h2>{{$category->name}}</h2>
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
        <section class="section-b-space ratio_square  layout-8-bg">
            <div class="container-fluid">
                <div class="title4 mb-2">
                    <h2 class="title-inner4">{{$category->name}}</h2>
                    <div class="line mb-0">
                        <span></span>
                    </div>
                </div>
                <div class="row mt-5">

                    <div class="col">
                        <div class="layout7-product">
                            <div class="row no-slider">
                                @forelse($products as $product )
                                    <x-product-box :product="$product"></x-product-box>
                                @empty
                                    <div class="col-md-12">
                                        <x-no-data></x-no-data>
                                    </div>
                                @endforelse
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
