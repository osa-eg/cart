<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ChangeLocaleController,
    ChangeThemeController
};
use App\Http\Controllers\Front\{
    SitePageController,
    CartController
};
use App\Http\Controllers\Ajax\{
    GetProductDetailsController,
    AddProductToCartController,
    UpdateProductInCartController,
    DeleteProducFromCartController
};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::middleware('lang')->group(function (){
    Route::get('/', [SitePageController::class,'landing']    );
    Route::get('home', function () {
        if (auth()->user()->hasRole('admin'))
            return (new \App\Http\Controllers\Admin\AdminController())->index();
        return view('frontend.index');
    })->middleware('auth');


    Route::prefix('cart')->group(function () {
        Route::get('/', [CartController::class,'show'])->name('cart');
        Route::get('empty', [CartController::class,'empty'])->name('cart.empty');

        Route::get('add/{product}/{qty?}',AddProductToCartController::class);
        Route::get('update/{product}/{qty?}',UpdateProductInCartController::class);
        Route::get('delete/{product}',DeleteProducFromCartController::class)->name('cart.delete_item');

    });
    // all routes of ajax requests.
    Route::get('ajax_product_details/{product}',GetProductDetailsController::class);



    Route::post('changeTheme/{mood}', ChangeThemeController::class)->name('changeTheme');
    Route::get('lang-{lang}',ChangeLocaleController::class )->name('changeLocale') ;

});
