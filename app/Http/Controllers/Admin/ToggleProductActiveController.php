<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BaseModel;
use App\Models\Category;
use App\Models\Product;

class ToggleProductActiveController extends Controller
{

    public function __invoke(Product $product)
    {
        $product->update(['active' => !$product->active]);
        updated();
        return back();
    }
}
