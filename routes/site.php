<?php

use App\Http\Controllers\Site\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['namespace' => 'Site'], function () {

    Route::get('/site', [HomeController::class, 'home']);
    Route::get('site/{id}', [HomeController::class, 'productDetails'])->name('product.details');
    Route::post('first-product-buy', [HomeController::class, 'First_product_buy'])->name('first-product.buy');
    Route::post('second-product-buy', [HomeController::class, 'Second_product_buy'])->name('second-product.buy');


    Route::group(['middleware' => 'guest:site'], function () {
        Route::get('register_user', [\App\Http\Controllers\Site\RegisterController::class, 'getPage'])->name('register_user');
        Route::post('register_user', [\App\Http\Controllers\Site\RegisterController::class, 'create'])->name('register_user');
        Route::get('login_user', [\App\Http\Controllers\Site\LoginController::class, 'getlogin'])->name('login_user');
        Route::post('login_user', [\App\Http\Controllers\Site\LoginController::class, 'create'])->name('login_user');
        Route::post('logout_user', [\App\Http\Controllers\Site\LoginController::class, 'logout_user'])->name('logout_user');
    });

});
