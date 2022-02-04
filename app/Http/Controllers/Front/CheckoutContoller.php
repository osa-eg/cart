<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Cart;
use Illuminate\Http\Request;

class CheckoutContoller extends Controller
{
    public function show()
    {
        $cart = new Cart(session('cart'));
        return view('frontend.checkout', compact( 'cart'));
    }

    public function save(Request $request)
    {
        $user = auth()->user();
        $data = $request->validate([
           'address'=>['required','string','max:150'],
           'notes'=>['required','string','max:400'],
           'payment_method'=>['required','string','in:on-delivery'],
        ]);

        $order = $user->orders()
            ->create($data+[
                'sub_total'             => session('cart')->subTotalPrice,
                'total'                 => session('cart')->totalPrice,
            ]);
        foreach (session('cart')->items as $id => $pro ){
            $order->items()->create([
               'product_id' => $id,
                'unit_price' => $pro['price'],
                'qty' => $pro['qty'],
            ]);
        }
        success();
        $cart = new Cart();
        session()->put('cart',$cart);
        return redirect()->route('cart');
    }
}
