<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = Category::with('children','translations:name ')->withCount('products')->when(\request()->name, function ($q) {
            $q->whereTranslationLike('name','%'.$_GET['name'].'%');
        })->orderByTranslation('name')->paginate();
        return view('admin.categories.index',compact('data'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Category::parents()->get();
        return view('admin.categories.create',compact('categories'));
    }

    /**
     * @param CategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());
        success();
        return back();
    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Category $category)
    {
        return view('admin.categories.show',compact('category'));
    }


    /**
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Category $category)
    {
        $categories = Category::parents()->get();
        return view('admin.categories.edit',compact('category','categories'));
    }

    /**
     * @param CategoryRequest $request
     * @param Category $category
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        updated();
        return back();
    }


    /**
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        if ($category->deletable && $category->delete())
            deleted();
        else
            cant_deleted();

        return back();
    }
}
