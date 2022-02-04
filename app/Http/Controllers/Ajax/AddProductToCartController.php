<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\Cart;
use Illuminate\Http\Request;

class AddProductToCartController extends Controller
{
    /**
     * @param Product $product
     * @param $qty
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function __invoke(Product $product, $qty = 1)
    {
        // get cart:
        if (session()->has('cart'))
            $cart = new Cart(session('cart'));
        else
            $cart = new Cart();

        // check for enough qty:
        if (session()->has('cart') && isset($cart->items[$product->id])){
            if ($product->qty < $qty || ($cart->items[$product->id]['qty'] + $qty) > $product->qty){
            return response([
                'success' => false,
                'message' => __('alerts.no_enough_qty')
            ]);
            }
        }

         // insert item to cart
        $cart->add($product,$qty);
        session()->put('cart',$cart);
        return response([
            'success' => true,
            'cart' => $cart,
            'message' => __('alerts.success')
        ]);
    }
}
