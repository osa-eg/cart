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
        Route::get('/', [CartController::class,'show']);
        Route::get('empty', [CartController::class,'empty']);
    });
    // all routes of ajax requests.
    Route::prefix('ajax')->group(function (){
        Route::get('product_details/{product}',GetProductDetailsController::class);
        Route::prefix('cart')->group(function (){
            Route::get('add/{product}/{qty?}',AddProductToCartController::class);
            Route::get('update/{product}/{qty?}',UpdateProductInCartController::class);
            Route::get('delete/{product}',DeleteProducFromCartController::class);
        });
    });



    Route::post('changeTheme/{mood}', ChangeThemeController::class)->name('changeTheme');
    Route::get('lang-{lang}',ChangeLocaleController::class )->name('changeLocale') ;

});
