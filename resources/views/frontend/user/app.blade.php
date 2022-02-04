@extends('layouts.frontend',['title'=>__('dashboard.dashboard')])
@section('content')
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{auth()->user()->name}}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">{{__('page.home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{__('dashboard.dashboard')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <!-- section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 px-4">
                    <div class="account-sidebar"><a class="popup-btn">{{__('dashboard.dashboard')}}</a></div>
                    <div class="dashboard-left">
                        <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-close" aria-hidden="true"></i> {{__('btn.close')}}</span></div>
                        <div class="block-content text-center">
                                <img alt="" src="{{auth()->user()->avatar}}" class="img-thumbnail rounded-circle shadow-lg mb-2" style="width: 30%">
                            <h5 class="mb-4">{{auth()->user()->name}}</h5>
                            <style>
                                .user_menu li{
                                    justify-content: start !important;
                                }
                            </style>
                            <ul class="text-center user_menu" >

                                <li @if(request()->is('home')) class=" active" @endif><a href="{{url('/home')}}">{{__('dashboard.dashboard')}}</a></li>
                                <li @if(request()->is('myOrders')) class=" active" @endif><a href="{{url('/myOrders')}}">{{__('front.myOrders')}}</a></li>
                                <li @if(request()->is('profile')) class=" active" @endif><a href="{{url('/profile')}}">{{__('front.profile')}}</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    @yield('user')
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->

@stop
