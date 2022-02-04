<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="{{url('/')}}"><img src="{{asset('logo/logo_'.app()->getLocale().'.png')}}" class="main-logo" alt="logo"></a>
        <a class="desktop-logo logo-dark active" href="{{url('/')}}"><img src="{{asset('logo/logo_'.app()->getLocale().'.png')}}" class="main-logo dark-theme" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="{{url('/')}}"><img src="{{asset('logo/logo_'.app()->getLocale().'.png')}}" class="logo-icon" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="{{url('/')}}"><img src="{{asset('logo/logo_'.app()->getLocale().'.png')}}" class="logo-icon dark-theme" alt="logo"></a>
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

            <x-side-menu-item :name="__('main.dashboard')" :url="url('/')" :icon="'icon ion-ios-home'"></x-side-menu-item>
            <x-side-menu-item :name="__('category.title')" :url="route('category.index')" :icon="'icon ion-ios-cube'"></x-side-menu-item>
            <x-side-menu-item :name="__('product.title')" :url="route('product.index')" :icon="'icon ion-ios-list'"></x-side-menu-item>
            <x-side-menu-item :name="__('user.title')" :url="route('user.index')" :icon="'icon ion-ios-people'"></x-side-menu-item>
            <x-side-menu-item :name="__('order.title')" :url="route('order.index')" :icon="'icon ion-ios-cart'"></x-side-menu-item>

        </ul>
    </div>
</aside>
