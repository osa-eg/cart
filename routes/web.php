<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ChangeLocaleController, ChangeThemeController};
use App\Http\Controllers\Front\{SitePageController};
use App\Http\Controllers\Ajax\{GetProductDetailsController};
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

    // all routes of ajax requests.
    Route::prefix('ajax')->group(function (){
        Route::get('product_details/{product}',GetProductDetailsController::class);

    });



    Route::post('changeTheme/{mood}', ChangeThemeController::class)->name('changeTheme');
    Route::get('lang-{lang}',ChangeLocaleController::class )->name('changeLocale') ;

});
