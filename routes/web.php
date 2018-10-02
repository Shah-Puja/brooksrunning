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
Auth::routes();
Route::get('/', 'HomePageController@index');

Route::get('/cart', 'CartController@show');
Route::post('/cart/update_delivery_option', 'CartController@update_delivery_option');
Route::get('/cart/get_cart_order_total', 'CartController@get_cart_order_total');


Route::get('/{prodname}/{style}_{color}.html', 'ProductColourController@index'); /* Detail page for shoes , apparel and sports bra */

Route::get('/c/{category}', 'ProductController@index'); 
Route::get('/list/{prod_type}', 'ProductController@list');

Route::get('/test', 'ProductController@newlist');
Route::get('/data','DataController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::post('/subscribers/new', 'SubscriberController@store');



Route::middleware(['allowOnlyAjax'])->group(function () {
	Route::post('/cartitem', 'CartItemsController@store');
	Route::patch('/cartitem', 'CartItemsController@update');
	Route::delete('/cartitem', 'CartItemsController@destroy');
});


/* info static pages */
Route::get('/about-us', 'InfoController@about_us');

Route::get('/shipping','BillingShippingController@create');
Route::post('/shipping','BillingShippingController@store');

Route::get('/payment', 'PaymentController@create');
Route::post('/payment', 'PaymentController@store');
Route::get('/{category}', 'CategoryController@index');