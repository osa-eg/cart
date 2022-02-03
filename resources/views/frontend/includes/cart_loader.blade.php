<div class="loader_skeleton">
    <header class="header-2 position-relative w-auto">
        <div class="top-header">
            <div class="container container-lg">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header-contact">
                            <ul>
                                <li>{{__('front.welcome_to_our_store')}} </li>
                                <li><i class="fa fa-phone" aria-hidden="true"></i>{{__('front.call_us')}}: 123 - 456 - 7890</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 text-end">
                        <ul class="header-dropdown">
                            <li class="mobile-wishlist">
                                <a href="#"><i class="fa fa-heart" aria-hidden="true"></i>
                                    {{__('front.wishlist')}}
                                </a></li>
                            <li class="onhover-dropdown mobile-account"><i class="fa fa-user" aria-hidden="true"></i>
                                {{__('front.my_account')}}
                                <ul class="onhover-show-div">
                                    <li><a href="{{route('login')}}">{{__('front.login')}}</a></li>
                                    <li><a href="{{route('register')}}">{{__('front.register')}}</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container container-lg layout3-menu">
            <div class="row">
                <div class="col-sm-12">
                    <div class="main-menu">
                        <div class="menu-left around-border">
                            <div class="navbar d-xl-none">
                                <a href="javascript:void(0)">
                                    <div class="bar-style"><i class="fa fa-bars sidebar-bar" aria-hidden="true"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="main-menu-right">
                                <nav>
                                    <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                    <ul class="sm pixelstrap sm-horizontal">
                                        <li>
                                            <div class="mobile-back text-end">Back<i class="fa fa-angle-right ps-2"
                                                                                     aria-hidden="true"></i></div>
                                        </li>
                                        <li><a href="{{url('/')}}">{{__('front.home')}}</a></li>

                                        <li>
                                            <a href="#">{{__('front.shop')}}</a></li>
                                        <li>

                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="absolute-logo">
                            <div class="brand-logo">
                                <a href="#"><img alt="" src="{{asset('logo/logo_'.app()->getLocale().'.png')}}"></a>
                            </div>
                        </div>
                        <div class="">
                            <div class="menu-right pull-right">
                                <div>
                                    <div class="icon-nav icon-nav d-none d-sm-block">
                                        <ul>
                                            <li class="onhover-div mobile-search">
                                                <div><img alt="" src="{{asset('front/assets/images/icon/layout4/search.png')}}" class="img-fluid blur-up lazyload"> <i
                                                            class="ti-search" ></i></div> </li>
                                            <li class="onhover-div mobile-setting">
                                                <div><img alt="" src="{{asset('front/assets/images/icon/layout4/setting.png')}}"
                                                          class="img-fluid blur-up lazyload"> <i class="ti-settings"></i>
                                                </div>  </li>
                                            <li class="onhover-div mobile-cart">
                                                <div><img alt="" src="{{asset('front/assets/images/icon/layout4/cart.png')}}"
                                                          class="img-fluid blur-up lazyload"> <i
                                                            class="ti-shopping-cart"></i></div></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="small-slider pt-0 home-fashion mt-0">
        <div class="container container-lg">
            <div class="home-slider">
                <div class="home"></div>
            </div>
        </div>
    </section>
    <section class="cart-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="cart_counter">
                        <div class="countdownholder py-3">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>