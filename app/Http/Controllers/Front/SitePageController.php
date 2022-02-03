<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SitePageController extends Controller
{
    public function landing()
    {
        $products = Product::active()->withTranslation()->take(20)->inRandomOrder('id')->get();
        return view('frontend.index',compact('products'));
    }

    public function category($slug)
    {
        $category = Category::whereTranslation('slug',$slug)->with('products')->firstOrFail();
        $products = $category->products()->paginate(16);
        return view('frontend.category',compact('products','category'));
    }
    public function product($slug)
    {
        $product = Product::whereTranslation('slug',$slug)->firstOrFail();
        return view('frontend.product',compact('product'));
    }
}
