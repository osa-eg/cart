<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SitePageController extends Controller
{
    public function landing()
    {
        $products = Product::active()->withTranslation()->take(20)->inRandomOrder('id')->get();
        return view('frontend.index',compact('products'));
    }
}
