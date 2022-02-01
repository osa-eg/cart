<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{AdminController,ProductController,UserController};
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix(config('settings.admin_prefix','admin'))->group(function (){

});
