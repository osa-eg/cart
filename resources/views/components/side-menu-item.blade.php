<li class="slide">
    <a class="side-menu__item @if(url()->current() == $url) active @endif" href="{{$url}}">
        <i class="{{$icon??'icon ion-ios-home'}} tx-22 mx-2"></i>
        <span class="side-menu__label">{{$name}}</span>
    </a>
</li>