<div class="product-box">

    <div class="img-wrapper ">



        <div class="front  position-relative">

            <a href="#">
                <img src="{{$product->thumb}}"  class="img-fluid blur-up lazyload bg-img" alt="">
            </a>
        </div>
        <div class="cart-info cart-wrap">
            @if($product->qty > 0)
            <button type="button" onclick="addToCart({{$product->id}})"  title="{{__('keys.add_to_cart')}}">
                <i class="ti-shopping-cart"></i>
            </button>
            @endif
            <a href="javascript:void(0)" title="{{__('keys.add_to_wishlist')}}">
                <i  class="ti-heart" aria-hidden="true"></i>
            </a>
            <a  class="showProduct pointer"  data-id="{{$product->id}}"  title="{{__('btn.quick_view')}}">
                <i class="ti-search" aria-hidden="true"></i>
            </a>
            @if($product->qty > 0)
            <span class=" badge-theme-color px-1 text-sm rounded">{{__('keys.available')}}</span>
            @else
            <span class="badge-grey-color px-1 text-sm rounded">{{__('keys.not_available')}}</span>
            @endif
        </div>
    </div>
    <div class="details-product">
        <a href="#">
            <h6>{{$product->name}}</h6>
        </a>
        <h4>${{$product->price}} </h4>
    </div>
</div>