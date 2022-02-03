<!DOCTYPE html>

<html lang="{{app()->getLocale()}}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="{{$description??'osa-eg/cart'}}">
    <meta name="keywords" content="{{$keywords??'osa-eg/cart'}}">
    <meta name="author" content="{{$author??'osa-eg/cart'}}">
    <link rel="icon" href="{{asset('logo/logo_'.app()->getLocale().'.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('logo/logo_'.app()->getLocale().'.png')}}" type="image/x-icon">
    <title>{{env('APP_NAME','osa-eg/cart').'-'.($title??'')}}</title>


    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Recursive:wght@400;500;600;700;800;900&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" type="text/css" href="{{{asset('front/assets/css/vendors/fontawesome.css')}}}">

    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="{{{asset('front/assets/css/vendors/slick.css')}}}">
    <link rel="stylesheet" type="text/css" href="{{{asset('front/assets/css/vendors/slick-theme.css')}}}">

    <!-- Animate icon -->
    <link rel="stylesheet" type="text/css" href="{{{asset('front/assets/css/vendors/animate.css')}}}">

    <!-- Themify icon -->
    <link rel="stylesheet" type="text/css" href="{{{asset('front/assets/css/vendors/themify-icons.css')}}}">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{{asset('front/assets/css/vendors/bootstrap.css')}}}">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="{{{asset('front/assets/css/style.css')}}}">

    <style>
        .pointer{
            cursor: pointer;
        }
    </style>
    @stack('css')
</head>

<body class="theme-color-29 @if(app()->getLocale() == 'ar') rtl @endif @if(session()->has('theme') && session('theme') == 'dark') dark @endif">


<!-- loader start -->
@yield('loader')
<!-- loader end -->


<!-- header start -->
@include('frontend.includes.header')
<!-- header end -->

@yield('content')



<!-- newsletter section start -->
@include('frontend.includes.newsletter')
<!-- newsletter section end -->


<!-- footer -->
@include('frontend.includes.footer')
<!-- footer end -->

<!-- product modal popup start-->
@include('frontend.includes.product_modal')
<!-- product modal popup end-->



<!-- tap to top start -->
<div class="tap-top">
    <div><i class="fa fa-angle-double-up"></i></div>
</div>
<!-- tap to top end -->


<!-- latest jquery-->
<script src="{{asset('front/assets/js/jquery-3.3.1.min.js')}}"></script>

<!-- slick js-->
<script src="{{asset('front/assets/js/slick.js')}}"></script>
<script src="{{asset('front/assets/js/slick-animation.min.js')}}"></script>

<!-- menu js-->
<script src="{{asset('front/assets/js/menu.js')}}"></script>

<!-- lazyload js-->
<script src="{{asset('front/assets/js/lazysizes.min.js')}}"></script>

<!-- Bootstrap js-->
<script src="{{asset('front/assets/js/bootstrap.bundle.min.js')}}"></script>

<!-- Bootstrap Notification js-->
<script src="{{asset('front/assets/js/bootstrap-notify.min.js')}}"></script>

<!-- Theme js-->
<script src="{{asset('front/assets/js/theme-setting.js')}}"></script>
<script src="{{asset('front/assets/js/script.js')}}"></script>
<script src="{{asset('front/assets/js/custom-slick-animated.js')}}"></script>
<script src="{{asset('front/assets/js/custom.js')}}"></script>
@stack('js')
<script>
    $('.showProduct').click(function (){
        let id = $(this).data('id');
        $.get(`{{url('ajax/product_details')}}/${id}`).done(function( data ) {
            let product = data.data;
            $('#vImage').attr('src',product.image);
            $('#vName').text(product.name);
            $('#vCategory').text(product.category);
            $('#vPrice').text(product.price);
            $('#vDescription').html(product.description);
            $('#vPlus').attr('data-max',product.qty);
            $('#vQtyInput').attr('max',product.qty);
            $('#vShowDetails').attr('href','{{url('category/')}}/'+product.slug);
            if(product.qty > 0) {
                $('.product_available').show();
                $('.product_not_available').hide();
            }else {
                $('.product_available').hide();
                $('.product_not_available').show();
            }
            console.log(product);
            $('#quick-view').modal('show');
        });
    });
    $('#vAddToCart').click(function (){
        let id  = $(this).data('id');
        let qty = $('#qtyInput').val();
        addToCart(id,qty);
    });
    function addToCart(id , qty = 1)
    {
        $.get(`{{url('ajax/cart/add')}}/${id}/${qty}`)
        .done( (res) => {
            console.log(res);
            if(!data.success){
                alert(data.message);
            }else{
                console.log(data.cart);
            }
        })
    }
</script>
</body>

</html>