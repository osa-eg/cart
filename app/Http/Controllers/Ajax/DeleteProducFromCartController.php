<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeleteProducFromCartController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke($id)
    {
        $cart = session()->get('cart');

        if( !isset($cart->items[$id]) )
        {
            return response([
                'success' => false,
                'message' => __('alerts.item_not_found_in_cart')
            ]);
        }

        $cart->remove($id);
        session()->put('cart', $cart);
        return response([
            'success' => true,
            'cart' => $cart,
            'message' => __('alerts.deleted')
        ]);
    }
}
