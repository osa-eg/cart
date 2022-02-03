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
        // check product qty:
        if ($product->qty < $qty){
            return response([
                'success' => false,
                'message' => __('alerts.no_enough_qty')
            ]);
        }
        // get cart:
        if (session()->has('cart'))
            $cart = new Cart(session('cart'));
         else
            $cart = new Cart();

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
