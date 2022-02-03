<?php

namespace App\View\Components;

use App\Models\Product;
use Illuminate\View\Component;

class ProductBox extends Component
{
    public ?Product $product;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Product $product = null)
    {
        $this->product = $product;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product-box');
    }
}
