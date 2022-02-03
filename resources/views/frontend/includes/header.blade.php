<header class="header-2 position-relative w-auto">
    <div class="mobile-fix-option"></div>
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
                            <a href="javascript:void(0)" onclick="openNav()">
                                <div class="bar-style"><i class="fa fa-bars sidebar-bar" aria-hidden="true"></i>
                                </div>
                            </a>
                        </div>
                        <div class="main-menu-right">
                            <nav id="main-nav">
                                <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                    <li>
                                        <div class="mobile-back text-end">{{__('btn.back')}}<i class="fa fa-angle-right ps-2"
                                                                                 aria-hidden="true"></i></div>
                                    </li>
                                    <li><a href="{{url('/')}}">{{__('front.home')}}</a></li>
                                    <li>
                                        <a href="#">{{__('front.shop')}}</a>
                                        <ul>
                                           @foreach(\App\Models\Category::parents()->with('children')->withCount('children')->get() as $category)
                                            <li>
                                                <a href="#">{{$category->name}}</a>
                                                @if($category->children_count)
                                                <ul>
                                                    @foreach($category->children as $child)
                                                    <li><a href="#">{{$child->name}}</a></li>
                                                    @endforeach
                                                </ul>
                                                @endif
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
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
                                <div class="icon-nav">
                                    <ul>
                                        <li class="onhover-div mobile-search">
                                            <div>
                                                <img alt="" src="{{asset('front/assets/images/icon/layout4/search.png')}}"
                                                      onclick="openSearch()" class="img-fluid blur-up lazyload">
                                                <i class="ti-search" onclick="openSearch()"></i>
                                            </div>
                                            <div id="search-overlay" class="search-overlay">
                                                <div>
                                                    <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
                                                    <div class="overlay-content">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-xl-12">
                                                                    <form action="#" >
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" id="exampleInputPassword1"placeholder="{{__('front.search_a_product')}}">
                                                                        </div>
                                                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="onhover-div mobile-setting">
                                            <div>
                                                <img alt="" src="{{asset('front/assets/images/icon/layout4/setting.png')}}" class="img-fluid blur-up lazyload">
                                                <i class="ti-settings"></i>
                                            </div>
                                            <div class="show-div setting">
                                                <h6>{{__('front.languages')}}</h6>
                                                <ul>
                                                    @foreach(config('settings.locales',['ar','en']) as $lang)
                                                    <li @if(app()->getLocale() == $lang) class="active" @endif >
                                                        <a href="{{route('changeLocale',$lang)}}">{{__("lang-{$lang}")}}</a>
                                                    </li>
                                                    @endforeach
                                                </ul>

                                            </div>
                                        </li>
                                        <li class="onhover-div mobile-cart">
                                            <div>
                                                <img alt="" src="{{asset('front/assets/images/icon/layout4/cart.png')}}"  class="img-fluid blur-up lazyload">
                                                <i class="ti-shopping-cart"></i>
                                            </div>
                                            <ul class="show-div shopping-cart">
                                                @if(session()->has('cart'))
                                                    @foreach (session('cart')->items as $id => $item)
                                                        <li class="cart_el">
                                                            <div class="media">
                                                                <a href="#">
                                                                    <img class="me-3" src="{{$item['image']}}" alt="image"></a>
                                                                <div class="media-body">
                                                                    <a href="#">
                                                                        <h4>{{$item['name_'.app()->getLocale()]}}</h4>
                                                                    </a>
                                                                    <h4><span class="headerQty{{$id}}">{{$item['qty'] }} </span> <small>x</small> <span>  ${{$item['price']}} </h4>
                                                                </div>
                                                            </div>
                                                            <div class="close-circle">
                                                                <a href="#" onclick="$('#removeCartItem{{$id}}').submit()"><i class="fa fa-times"  aria-hidden="true"></i></a>
                                                                <form action="#" id="removeCartItem{{$id}}" method="post" hidden>@csrf</form>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                @else
                                                    <li class="cart_el">
                                                        <p class="alert alert-secondary text-center">
                                                            {{__('cart.no_products_added')}}
                                                        </p>

                                                    </li>
                                                @endif
                                                <li>
                                                    <div class="total">
                                                        <h6>{{__('cart.total')}} :
                                                            <span class="cartSubTotalPrice">  {{session('cart')?session('cart')->subTotalPrice:0}} </span>
                                                        </h6>
                                                    </div>
                                                </li>


                                                <li>
                                                    <div class="buttons">
                                                        <a href="#" class="view-cart"> {{__('cart.show_cart')}} </a>
                                                        <a href="#" class="checkout">{{__('cart.checkout')}}</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
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
