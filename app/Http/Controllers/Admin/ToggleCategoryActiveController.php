<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BaseModel;
use App\Models\Category;

class ToggleCategoryActiveController extends Controller
{
    /**
     * @param BaseModel $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Category $category)
    {

        $category->update(['active' => !$category->active]);
        updated();
        return back();
    }
}
