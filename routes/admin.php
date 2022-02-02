<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    AdminController,
    CategoryController,
    ProductController,
    UserController,
    ToggleCategoryActiveController,
    ToggleProductActiveController,
    ToggleUserActiveController
};
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware('lang')->prefix(config('settings.admin_prefix','admin'))->group(function (){
    Route::get('/',[AdminController::class, 'index'])->name('admin');

    Route::resources([
        'category' => CategoryController::class,
        'product' => ProductController::class,
    ]);
    Route::resource('user',UserController::class)->only('index','show');

    Route::get('categories/{category}/toggle_active',ToggleCategoryActiveController::class)->name('category.toggle_active');
    Route::get('products/{product}/toggle_active',ToggleProductActiveController::class)->name('product.toggle_active');
    Route::get('users/{user}/toggle_active',ToggleUserActiveController::class)->name('user.toggle_active');
});
