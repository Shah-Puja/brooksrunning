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

Route::get('/ap21demo', 'AP21Demo@index');

Auth::routes();
Route::get('/', 'HomePageController@index');

Route::get('/cart', 'CartController@show');
Route::post('/cart/update_delivery_option', 'CartController@update_delivery_option');
Route::get('/cart/get_cart_order_total', 'CartController@get_cart_order_total');
Route::post('/cart/edit_cart','CartController@edit_cart_popup');


Route::middleware(['allowOnlyAjax'])->group(function () {
	Route::post('/cartitem', 'CartItemsController@store');
	Route::patch('/cartitem', 'CartItemsController@update');
	Route::delete('/cartitem', 'CartItemsController@destroy');
});


Route::get('/test', 'ProductController@newlist');
Route::get('/data','DataController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/search', 'SearchController@index')->middleware('allowOnlyAjax');


Route::post('/subscribers/new', 'SubscriberController@store');

/* info static pages */
Route::get('/info/{pg}', 'InfoController@index');

/* meet_brooks static pages */
Route::get('/meet_brooks/{meet_brooks_pg}', 'meet_brooksController@index');

Route::get('/shipping','BillingShippingController@create');
Route::post('/shipping','BillingShippingController@store');
Route::post('/shipping-check-email','BillingShippingController@check_email');
Route::post('/shipping-verify-password','BillingShippingController@verify_password');

Route::get('/payment', 'PaymentController@create');
Route::post('/payment', 'PaymentController@store');

Route::get('/mens-running-shoes-and-clothing', 'CategoryController@womens_landing');
Route::get('/womens-running-shoes-and-clothing', 'CategoryController@mens_landing');

/* Shoes pages */
Route::get('/shoes/{shoe_name}', 'CategoryController@shoes_detail');

Route::post('/afterpay', 'PaymentController@create_token'); 

Route::get('/afterpay_success', 'PaymentController@afterpay_success');
Route::get('/afterpay_cancel', 'PaymentController@afterpay_cancel');

Route::get('/imagecheck', 'ImagecheckController@index');

/* myaccount static pages */
Route::get('/account-homepage', 'MyaccountController@account_homepage');
Route::get('/account-order-history', 'MyaccountController@account_order_history');
Route::get('/account-personal', 'MyaccountController@account_personal');

/* shoefinder page */
Route::get('/shoefinder', 'ShoefinderController@shoefinder');  

/* quickhelp static pages */
Route::get('/returns-centre', 'quickhelpController@returns_centre');
Route::get('/defective-product-clain', 'quickhelpController@defective_product_clain');
Route::get('/faqs', 'quickhelpController@faqs');
Route::get('/fit-sizing', 'quickhelpController@fit_sizing');
Route::get('/track-your-order', 'quickhelpController@track_your_order');

Route::get('/testap21/create_user', 'testap21@create_user'); 
Route::get('/testap21/create_order', 'testap21@create_order'); 
Route::get('/testap21/voucher_valid', 'testap21@voucher_valid'); 

Route::get('/neutral-running-shoes', 'CategoryController@shoes_category');
Route::get('/support-running-shoes', 'CategoryController@shoes_category');
Route::get('/trail-running-shoes', 'CategoryController@shoes_category');
Route::get('/competition-running-shoes', 'CategoryController@shoes_category');
Route::get('/cross-trainer-shoes', 'CategoryController@shoes_category');
Route::get('/walking-shoes', 'CategoryController@shoes_category');

Route::get('/{category}', 'CategoryController@index');
Route::get('/{prodname}/{style}_{color}.html', 'ProductColourController@index'); /* Detail page for shoes , apparel and sports bra */



