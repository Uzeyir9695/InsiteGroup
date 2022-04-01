<?php

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
Route::controller(\App\Http\Controllers\ProductController::class)->middleware('auth')->group(function () {
    Route::get('/products','index')->name('products.index');
    Route::get('/products/create','create')->name('products.create');
    Route::post('/products','store')->name('products.store');
    Route::get('/product-discount/{product}','createDiscount')->name('product-discount.create');
    Route::post('/product-discount','storeDiscount')->name('product-discount.store');
});

Route::controller(\App\Http\Controllers\DiscountController::class)->middleware('auth')->group(function () {
    Route::get('/discount-group','create')->name('discount-group.create');
    Route::post('/discount-group','store')->name('discount-group.store');
});

Route::resource('carts', \App\Http\Controllers\CartController::class);


Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();
