<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = Product::with('category','translation')->parents()->when(\request()->name, function ($q) {
            $q->whereTranslationLike('name','%'.$_GET['name'].'%');
        })->orderByTranslation('name')->paginate();
        return view('admin.products.index',compact('data'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Product::parents()->with('children')->get();
        return view('admin.products.create',compact('categories'));
    }

    /**
     * @param ProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductRequest $request)
    {
        Product::create($request->validated());
        success();
        return back();
    }

    /**
     * @param Category $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Category $product)
    {
        return view('admin.products.show',compact('product'));
    }


    /**
     * @param Category $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Category $product)
    {
        $categories = Product::parents()->with('children')->get();
        return view('admin.products.edit',compact('product','categories'));
    }

    /**
     * @param ProductRequest $request
     * @param Category $product
     */
    public function update(ProductRequest $request, Category $product)
    {
        $product->update($request->validated());
        updated();
        return back();
    }


    /**
     * @param Category $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $product)
    {
        if ($product->deletable && $product->delete())
            deleted();
        else
            cant_deleted();

        return back();
    }
}
