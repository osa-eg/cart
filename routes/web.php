<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ChangeLocaleController, ChangeThemeController};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::middleware('lang')->group(function (){
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('home', function () {
        if (auth()->user()->hasRole('admin'))
            return (new \App\Http\Controllers\Admin\AdminController())->index();

        return view('welcome');
    })->middleware('auth');
    Route::post('changeTheme/{mood}', ChangeThemeController::class)->name('changeTheme');
    Route::get('lang-{lang}',ChangeLocaleController::class )->name('changeLocale') ;

});
