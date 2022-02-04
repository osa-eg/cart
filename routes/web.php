<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ChangeLocaleController,
    ChangeThemeController
};
use App\Http\Controllers\Front\{
    SitePageController,
    CartController,
    CheckoutContoller,
    UserController
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
    Route::get('/', [SitePageController::class,'landing']);
    Route::get('categories/{slug}/products', [SitePageController::class,'category'])->name('category.products');
    Route::get('products/{slug}', [SitePageController::class,'product'])->name('product_details');
    Route::middleware('auth')->group(function () {
        Route::get('checkout', [CheckoutContoller::class, 'show'])->name('checkout');
        Route::post('checkout', [CheckoutContoller::class, 'save'])->name('checkout');

        Route::get('/profile', [UserController::class, 'profile'])->name('profile');
        Route::get('/myOrders', [UserController::class, 'orders'])->name('myOrders');
        Route::post('/update-profile', [UserController::class, 'updateProfile'])->name('updateProfile');

        Route::get('home', function () {
            if (auth()->user()->hasRole('admin'))
                return (new \App\Http\Controllers\Admin\AdminController())->index();
            return (new UserController())->index();
        })->middleware('auth');
    });


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
