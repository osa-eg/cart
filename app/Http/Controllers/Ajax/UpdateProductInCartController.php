<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\Cart;
use Illuminate\Http\Request;

class UpdateProductInCartController extends Controller
{
    /**
     * @param Product $product
     * @param $qty
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
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
        // update Product in cart:
        $cart = new Cart(session()->get('cart'));
        $cart->update($product->id, $qty);
        session()->put('cart',$cart);
        return response([
            'success' => true,
            'cart' => $cart,
            'message' => __('alerts.updated')
        ]);
    }
}
