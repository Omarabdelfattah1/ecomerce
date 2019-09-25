<?php

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

Route::get('/','FrontendController@index')->name('index');
Route::get('product/{product}','FrontendController@singleProduct');

Route::post('/cart/add','ShopController@add_to_cart')->name('cart.add');
Route::get('/cart','ShopController@cart')->name('cart');
Route::get('/cart/delete/{id}','ShopController@cart_delete')->name('cart.delete');

Route::get('cart/incr/{id}/{qty}', [
    'uses' => 'ShopController@incr',
    'as' => 'cart.incr'
]);
Route::get('cart/decr/{id}/{qty}', [
    'uses' => 'ShopController@decr',
    'as' => 'cart.decr'
]);

Route::get('cart/checkout','CheckoutController@index')->name('cart.checkout');
Route::post('cart/checkout','CheckoutController@pay')->name('cart.pay');

Route::resource('products','ProductsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
