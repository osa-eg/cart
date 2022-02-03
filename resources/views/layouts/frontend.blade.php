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
        .done( (response) => {
            if(!response.success){
                notify(response.message,'error','fa fa-times');
            }else{
                let cart = response.cart;
                updateHeaderCart(cart);
                notify(response.message)
                $('#quick-view').modal('hide');
            }
        })
    }

    function removeCartItem(id)
    {
        $.get(`{{url('ajax/cart/delete')}}/${id}`)
        .done( (response) => {
            if(!response.success){
                notify(response.message,'error','fa fa-times');
            }else{
                let cart = response.cart;
                updateHeaderCart(cart);
                notify(response.message)
            }
        })
    }


    function updateHeaderCart (cart){
        let headerCart = $('#header_cart');
        headerCart.empty();
        $.each(cart.items , function (id , item){
            var cart_item = `<li class="cart_el">
                                    <div class="media">
                                        <a href="#">
                                            <img class="me-3" src="${item.image}" alt="image"></a>
                                        <div class="media-body">
                                            <a href="#">
                                                <h4>${item.name}'}</h4>
                                            </a>
                                            <h4><span class="headerQty${id}">${item.qty} </span> <small>x</small> <span>  $${item.price} </h4>
                                        </div>
                                    </div>
                                    <div class="close-circle">
                                        <a href="#" class="removeCartItem'" onclick="removeCartItem(${id})" id="removeHeaderCartItem${id}')" data-id="${id}"><i class="fa fa-times"  aria-hidden="true"></i></a>
                                    </div>
                                </li>`;
            headerCart.append(cart_item);
        });
        let cart_total = ` <li>
                <div class="total">
                    <h6>{{__('cart.total')}} :
                        <span class="cartSubTotalPrice"> $ ${cart.subTotalPrice} </span>
                    </h6>
                </div>
            </li>
            <li>
                <div class="buttons">
                    <a href="#" class="view-cart"> {{__('cart.show_cart')}} </a>
                    <a href="#" class="checkout">{{__('cart.checkout')}}</a>
                </div>
            </li>`;
        headerCart.append(cart_total);
    }

    function notify(message, type = 'success', icon='fa fa-check'){
        $.notify({
            icon: icon,
            title: '',
            message: message
        }, {
            element: 'body',
            position: null,
            type: type,
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: true,
            placement: {
                from: "top",
                align: "right"
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: 5000,
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            },
            icon_type: 'class',
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
        });
    }
</script>
</body>

</html>