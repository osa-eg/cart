<!DOCTYPE html>
<html lang="{{app()->getLocale()}}" >
<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/@mdi/font@6.4.95/css/materialdesignicons.min.css">
    <!-- Title -->
    <title> {{$title??'لوحة التحكم'}} </title>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('logo/logo_'.app()->getLocale().'.png')}}" type="image/x-icon"/>

    <!-- Icons css -->
    <link href="{{asset('backend/assets/css/icons.css')}}" rel="stylesheet">

    <!--  Right-sidemenu css -->
    <link href="{{asset('backend/assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">



    <!-- Sidemenu css -->
    <link href="{{asset('backend/assets/'.((app()->getLocale() == 'ar')?'css-rtl':'css').'/sidemenu.css')}}" rel="stylesheet">


    <!--  Custom Scroll bar-->
    <link href="{{asset('backend/assets/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>

    <link href="{{asset('backend/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

    <!--- Style css-->
    <link href="{{asset('backend/assets/'.((app()->getLocale() == 'ar')?'css-rtl':'css').'/style.css')}}" rel="stylesheet">
    <link href="{{asset('backend/assets/'.((app()->getLocale() == 'ar')?'css-rtl':'css').'/style-dark.css')}}" rel="stylesheet">


    <!---Skinmodes css-->
    <link href="{{asset('backend/assets/'.((app()->getLocale() == 'ar')?'css-rtl':'css').'/skin-modes.css')}}" rel="stylesheet" />

    <!--- Animations css-->
    <link href="{{asset('backend/assets/css/animate.css')}}" rel="stylesheet">
    @stack('css')
    {{-- Google font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400&display=swap" rel="stylesheet">

    <link href="{{asset('backend/assets/css/custom_app.css')}}" rel="stylesheet">
    <style>
        body, h1, h2, h3, h4, h5, h6, p{
            font-family: 'Almarai', sans-serif !important;
        }

    </style>
    @if (session()->has('dark'))
        <style>
            .mdi{
                color: white;
            }
        </style>

    @endif
</head>


{{-- dark-theme  --}}
<body class="main-body app sidebar-mini  @if (session()->has('dark')) dark-theme @endif  ">

<!-- Loader -->
<div id="global-loader">
    <img src="{{asset('backend/assets/img/loader.svg')}}" class="loader-img" alt="Loader">
</div>
<!-- /Loader -->

<!-- Page -->
<div class="page" id="top">


    <!-- main-sidebar -->
@auth
    @include('includes.sidemenu')
@endauth
<!-- main-sidebar -->


<!-- main-content -->
    <div class=" @auth main-content app-content  @else pt-5 @endauth">

        <!-- main-header opened -->
        <div class="main-header sticky side-header nav nav-item">
            <div class="container-fluid ">
                <div class="main-header-left ">
                    <div class="responsive-logo">
                        <img src="{{asset('logo/logo_'.app()->getLocale().'.png')}}" style="width: 90px; height: auto" class="desktop-dark">
                        <img src="{{asset('logo/logo_'.app()->getLocale().'.png')}}" style="width: 90px; height: auto" class="desktop-logo">
                        <img src="{{asset('logo/logo_'.app()->getLocale().'.png')}}" style="width: 90px; height: auto" class="desktop-logo-1">
                        <img src="{{asset('logo/logo_'.app()->getLocale().'.png')}}" style="width: 90px; height: auto" class="desktop-logo-dark">
                    </div>
                    @auth
                        <div class="app-sidebar__toggle" data-toggle="sidebar">
                            <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left" ></i></a>
                            <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
                        </div>
                    @endauth
                </div>
                <div class="main-header-right">
                    <ul class="nav">
                        @auth()
                        <li class="">
                            <div class="d-md-flex">
                                @if (app()->getLocale() == 'ar')
                                    <a href="{{route('changeLocale','en')}}" class="d-flex  nav-item  pl-0 country-flag1" >
                                    <span class="avatar country-Flag mr-0 align-self-center bg-transparent">
                                        <img src="{{asset('backend/assets/img/flags/us_flag.jpg')}}" alt="img">
                                    </span>
                                    </a>
                                @else
                                    <a href="{{route('changeLocale','ar')}}"  class="d-flex  nav-item  pl-0 country-flag1" >
                                        <span class="avatar country-Flag mr-0 align-self-center bg-transparent">
                                        <img src="{{asset('backend/assets/img/flags/uae.png')}}" alt="img">
                                    </span>
                                    </a>
                                @endif

                            </div>
                        </li>
                        @endauth
                        <li class="">
                            <div class="d-md-flex">
                                @if (session()->has('dark') )
                                    <a href="#" onclick="$('#dark').submit()" class="d-flex  nav-item  pl-0 country-flag1" >
                                        <form action="{{route('changeTheme','0')}}" method="post" class="d-none" id="dark">@csrf</form>
                                        <i class="icon ion-ios-sunny tx-30  mx-2"></i>
                                    </a>
                                @else
                                    <a href="#" onclick="$('#light').submit()" class="d-flex  nav-item  pl-0 country-flag1" >
                                        <form action="{{route('changeTheme','1')}}" method="post" class="d-none" id="light">@csrf</form>
                                        <i class="icon ion-ios-moon  tx-30 mx-2"></i>
                                    </a>
                                @endif

                            </div>
                        </li>
                    </ul>
                    <div class="nav nav-item  navbar-nav-right ml-auto">


                        <div class="nav-item full-screen fullscreen-button">
                            <a class="new nav-link full-screen-link" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-maximize"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg>
                            </a>
                        </div>
                        @auth
                        <div class="dropdown nav-item main-header-notification">
                            <a class="new nav-link" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg><span class=" pulse"></span></a>
                            <div class="dropdown-menu">
                                <div class="menu-header-content bg-primary text-left">
                                    <div class="d-flex">
                                        <h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">
                                            {{__('main.notifications.all_new')}}</h6>
{{--                                        <span class="badge badge-pill badge-warning ml-auto my-auto float-right">{{__('btn.mark_all_as_read')}}</span>--}}
                                    </div>
                                    <p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">{{__('alerts.you_have_unread_notification_number',['number'=>auth()->user()->unreadNotifications()->count()])}}</p>
                                </div>
                                <div class="main-notification-list Notification-scroll ps">
                                    @foreach (auth()->user()->unreadNotifications as $notification)
                                    <a class="d-flex p-3 border-bottom" href="#" onclick="notification(this)" data-id="{{$notification->id}}">

                                        <div class="ml-3">
                                            <h5 class="notification-label mb-1">{{$notification->data['text']??''}}</h5>
                                            <div class="notification-subtext">{{$notification->created_at->diffForHumans()}}</div>
                                        </div>
                                        <div class="ml-auto">
                                            <i class="las la-angle-right text-right text-muted"></i>
                                        </div>
                                    </a>
                                    @endforeach
                                    <div class="ps__rail-x" style="left: 0px; top: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                                <div class="dropdown-footer">
{{--                                    <a href="{{route('my_notifications')}}">{{__('btn.view_all')}}</a>--}}
                                </div>
                            </div>
                        </div>


                            <div class="dropdown main-profile-menu nav nav-item nav-link">
                                <a class="profile-user d-flex" href=""><img alt="" src="{{auth()->user()->avatar}}"></a>
                                <div class="dropdown-menu">
                                    <div class="main-header-profile bg-primary p-3">
                                        <div class="d-flex wd-100p">
                                            <div class="main-img-user"><img alt="" src="{{auth()->user()->avatar}}" class=""></div>
                                            <div class="mr-3 my-auto">
                                                <h6>{{auth()->user()->name}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="dropdown-item" href="#" onclick="$('#logout').submit()"><i class="bx bx-log-out"></i> {{__('main.logout')}}</a>
                                    <form action="{{route('logout')}}" class="d-none" method="post" id="logout"> @csrf </form>
                                </div>
                            </div>
                        @endauth

                    </div>
                </div>
            </div>
        </div>
        <!-- /main-header -->


        <!-- container opened -->

        <div class=" container-fluid pt-2">

            @yield('content')
        </div>
        <!-- Container closed -->
    </div>
    <!-- main-content closed -->

    <!-- Footer opened -->
    <div class="main-footer ht-40">
        <div class="container-fluid pd-t-0-f ht-100p">
            <span>Copyright © {{date('Y')}} <a href="#">Osama Saad</a>. Developed by  Osama Saad @ All rights reserved.</span>
        </div>
    </div>
    <!-- Footer closed -->

</div>
<!-- End Page -->
<div class="modal" id="success_modal" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-body tx-center pd-y-20 pd-x-20">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                <i class="icon icon ion-ios-save tx-100 text-success lh-1 mg-t-20 d-inline-block"></i>
                <h4 class="text-success mg-b-20">{{__('main.alerts.success')}}</h4>

                <p class="mg-b-20 mg-x-20">{{__('main.alerts.saved')}}</p>

            </div>

        </div>
    </div>
</div>

<div class="modal" id="notification_modal" aria-modal="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-body tx-center pd-y-20 pd-x-20">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                <h4 class="text-primary mg-b-20">{{__('main.notification_details')}}</h4>
                <div id="noti_text" class="mt-2">

                </div>
                <a href="" id="noti_link" class="btn btn-sm btn-info-gradient" style="display: none">{{__('btn.follow_link')}}</a>
            </div>

        </div>
    </div>
</div>

<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>


<!-- JQuery min js -->
<script src="{{asset('backend/assets/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Bundle js -->
<script src="{{asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Ionicons js -->
<script src="{{asset('backend/assets/plugins/ionicons/ionicons.js')}}"></script>

<!-- Moment js -->
<script async src="{{asset('backend/assets/plugins/moment/moment.js')}}"></script>

<!-- Eva-icons js -->
<script src="{{asset('backend/assets/js/eva-icons.min.js')}}"></script>

<!-- P-scroll js -->
<script async src="{{asset('backend/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script async src="{{asset('backend/assets/plugins/perfect-scrollbar/p-scroll.js')}}"></script>

<!-- Sticky js -->
<script async src="{{asset('backend/assets/js/sticky.js')}}"></script>

<!-- Rating js-->
<script async src="{{asset('backend/assets/plugins/rating/jquery.rating-stars.js')}}"></script>
<script async src="{{asset('backend/assets/plugins/rating/jquery.barrating.js')}}"></script>

<!-- Custom Scroll bar Js-->
<script async src="{{asset('backend/assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>

<!-- Horizontalmenu js-->
{{--<script src="{{asset('backend/assets/plugins/horizontal-menu/horizontal-menu-2/horizontal-menu.js')}}"></script>--}}

<script src="{{asset('backend/assets/plugins/side-menu/sidemenu.js')}}"></script>

<!-- Right-sidebar js -->
@if (app()->getLocale() == 'ar')
    <script src="{{asset('backend/assets/plugins/sidebar/sidebar-rtl.js')}}"></script>
@else
    <script src="{{asset('backend/assets/plugins/sidebar/sidebar.js')}}"></script>

@endif

<script async src="{{asset('backend/assets/plugins/sidebar/sidebar-custom.js')}}"></script>

<!-- eva-icons js -->
<script async src="{{asset('backend/assets/js/eva-icons.min.js')}}"></script>
@stack('js')
<!-- custom js -->
<script defer src="{{asset('backend/assets/plugins/select2/js/select2.min.js')}}"></script>

<script src="{{asset('backend/assets/js/modal.js')}}"></script>
<script src="{{asset('backend/assets/js/custom.js')}}"></script>

<script>
    function notification(item){
        var id = $(item).data('id');
        var url = '{{url('read_notification/')}}/'+id;
        $.get(url).done(function (data){
            if (data.notification){
                $(item).removeClass('d-flex').addClass('d-none');

                $('#noti_link').css('display','none');
                $('#noti_text').text(data.notification.text);
                if (data.notification.url) {
                    $('#noti_link').css('display','inline').attr('href',data.notification.url);
                }
                $('#notification_modal').modal('show');
            }
        });
    }

    $(document).ready(function() {
        $('.select2').select2();
    });
    $('form').submit(function() {
        $(this).find("button[type='submit']").prop('disabled',true);
        $(this).find("input[type='submit']").prop('disabled',true);
    });
</script>

</body>
</html>
