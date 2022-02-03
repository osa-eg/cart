<?php

namespace App\Services;


use App\Models\Product;

class Cart
{
    public $items = [];
    public $totalQty = 0 ;
    public $subTotalPrice = 0;
    public $totalPrice = 0;

    public function __Construct($cart = null)
    {
        if($cart) {
            $this->items = $cart->items;
            $this->totalQty = $cart->totalQty;
            $this->subTotalPrice = $cart->subTotalPrice;
            $this->totalPrice = $cart->totalPrice;
        }
    }

    /**
     * @param Product $product
     * @param int $qty
     * @return void
     */
    public function add(Product $product,int $qty)
    {
        // This Item template has empty qty and totalLine to check if this product is in cart or not.
        // if in cart: it will be updated.
        // if not : it will be added.

        $item = [
            'name'      => $product->name,
            'name_en'   => $product->getTranslation('en')->name,
            'name_ar'   => $product->getTranslation('ar')->name,
            'price'     => $product->price,
            'qty'       => 0,
            'totalLine' => 0,
            'image'     => $product->thumb,
        ];

        if( !array_key_exists($product->id, $this->items)){
            $this->items[$product->id] = $item ;
        }

        $amount = $qty * $product->price;
        $this->totalQty         += $qty;
        $this->totalPrice       += $amount;
        $this->subTotalPrice    += $amount;

        $this->items[$product->id]['qty']  += $qty ;
        $this->items[$product->id]['totalLine'] += $amount;
    }

    public function update($id, $qty)
    {

        $item           = $this->items[$id];
        $minusQty       = $item['qty'];
        $minus_amount   = $item['price'] * $minusQty;
        $new_amount     = $item['price'] * $qty;

        // minus from current values:
        $this->totalQty         -= $minusQty;
        $this->totalPrice       -= $minus_amount;
        $this->subTotalPrice    -= $minus_amount;

        $this->items[$id]['totalLine']  -= $minus_amount;
        $this->items[$id]['qty']        -= $minusQty;


        // update new values:
        $this->totalQty         += $qty;
        $this->totalPrice       += $new_amount;
        $this->subTotalPrice    += $new_amount;

        $this->items[$id]['totalLine']  += $new_amount;
        $this->items[$id]['qty']        += $qty;


    }

    public function remove($id)
    {
        $item = $this->items[$id];
        $this->totalQty -= $item['qty'];
        $this->totalPrice -= $item['totalLine'];
        $this->subTotalPrice -= $item['totalLine'];
        unset($this->items[$id]);
    }


}
