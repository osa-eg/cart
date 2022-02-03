<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeleteProducFromCartController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|void
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke($id)
    {
        $cart = session()->get('cart');
        $success = false;
        if( !isset($cart->items[$id]) )
        {
            $message = __('alerts.item_not_found_in_cart');
        }else{
            $cart->remove($id);
            session()->put('cart', $cart);
            $success = true;
            $message = __('alerts.deleted');
        }

        if (\request()->ajax())
            return response([
                'success' => $success,
                'cart' => $cart,
                'message' =>$message
            ]);
        $success? deleted() : failed($message);
        return back();
    }
}
