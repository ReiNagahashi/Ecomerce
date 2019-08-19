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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[
    'uses' => 'FrontendController@index',
    'as' => 'index'
]);
//ここでidではなくて、productなのは、モデルを代わりにおけるから
Route::get('/product/{id}',[
    'uses' => 'FrontendController@singleProduct',
    'as' => 'product.single'
]);

Route::get('/cart',[
    'uses' => 'shoppingController@cart',
    'as' => 'cart'
]);

Route::post('/cart/add',[
    'uses' => 'shoppingController@add_to_cart',
    'as' => 'cart.add'
]);
Route::get('/cart/delete/{id}',[
    'uses' => 'shoppingController@cart_delete',
    'as' => 'cart.delete'
]);

Route::get('/cart/incr/{id}/{qty}',[
    'uses'=>'shoppingController@cart_incr',
    'as'=>'cart.incr'
]);

Route::get('/cart/decr/{id}/{qty}',[
    'uses'=>'shoppingController@cart_decr',
    'as'=>'cart.decr'
]);

Route::get('/cart/checkout',[
'uses'=>'CheckoutController@index',
'as'=>'cart.checkout'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/rapid_cart/add/{id}',[
    'uses'=>'shoppingController@rapid_add',
    'as'=>'rapid.cart.add'
]);

Route::resource('products','ProductsController');

Route::post('/cart/checkout',[
    'uses'=>'CheckoutController@payment',
    'as'=>'cart.checkout'
]);