<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show()
    {
        $cart = new Cart(session('cart')??null);
        return view('frontend.cart',compact('cart'));
    }


    public function empty()
    {
        $cart = new Cart();
        session()->put('cart',$cart);
        return view('frontend.cart',compact('cart'));

    }
}
