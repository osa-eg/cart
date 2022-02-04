<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        try {
            DB::beginTransaction();
            $order = $user->orders()
                ->create($data+[
                        'sub_total'             => session('cart')->subTotalPrice,
                        'total'                 => session('cart')->totalPrice,
                    ]);
            foreach (session('cart')->items as $id => $pro ){
                $product = Product::find($id);
                $order->items()->create([
                    'product_id' => $id,
                    'unit_price' => $pro['price'],
                    'qty' => $pro['qty'],
                ]);
                $product->qty = $product->qty -= $pro['qty'];
                $product->save();

            }
            success();
            $cart = new Cart();
            session()->put('cart',$cart);
            DB::commit();

        }catch(\Exception $e){
            DB::rollBack();
            failed($e->getMessage());
            return back();
        }

        return redirect()->route('cart');
    }
}
