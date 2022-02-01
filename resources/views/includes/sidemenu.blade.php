<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="{{url('/')}}"><img src="{{asset('logo.png')}}" class="main-logo" alt="logo"></a>
        <a class="desktop-logo logo-dark active" href="{{url('/')}}"><img src="{{asset('logo.png')}}" class="main-logo dark-theme" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="{{url('/')}}"><img src="{{asset('logo.png')}}" class="logo-icon" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="{{url('/')}}"><img src="{{asset('logo.png')}}" class="logo-icon dark-theme" alt="logo"></a>
    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    <img alt="user-img" class="avatar avatar-xl brround" src="{{auth()->user()->avatar??asset('logo.png')}}"><span class="avatar-status profile-status bg-green"></span>
                </div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">{{auth()->user()->name}}</h4>
{{--                    <span class="mb-0 text-muted">Premium Member</span>--}}
                </div>
            </div>
        </div>
        <ul class="side-menu">
            <li class="slide">
                <a class="side-menu__item" href="{{url('/')}}">
                    <i class="icon ion-ios-home tx-22 mx-2"></i>
                    <span class="side-menu__label">{{__('main.dashboard')}}</span>
                </a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{route('ads_index')}}">
                    <i class="icon ion-ios-microphone tx-22 mx-2"></i>
                    <span class="side-menu__label">{{__('ads.index')}}</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{route('ad.add_new')}}">
                    <i class="icon ion-ios-link tx-22 mx-2"></i>
                    <span class="side-menu__label">{{__('ads.add_new')}}</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{route('ad.blocked')}}">
                    <i class="icon ion-ios-eye-off tx-22 mx-2"></i>
                    <span class="side-menu__label">{{__('ads.hidden_index')}}</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{route('category.index')}}">
                    <i class="icon ion-ios-cube tx-22 mx-2"></i>
                    <span class="side-menu__label">{{__('categories.index')}}</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{route('city.index')}}">
                    <i class="icon ion-ios-map tx-22 mx-2"></i>
                    <span class="side-menu__label">{{__('cities.index')}}</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{route('user.index')}}">
                    <i class="icon ion-ios-people tx-22 mx-2"></i>
                    <span class="side-menu__label">{{__('users.index')}}</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{route('application.index')}}">
                    <i class="icon ion-ios-flag tx-22 mx-2"></i>
                    <span class="side-menu__label">{{__('applications.index')}}</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{route('report.index')}}">
                    <i class="icon ion-ios-information-circle tx-22 mx-2"></i>
                    <span class="side-menu__label">{{__('reports.index')}}</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
