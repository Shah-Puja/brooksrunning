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


Route::middleware(['allowOnlyAjax'])->group(function () {
	Route::post('/cartitem', 'CartItemsController@store');
	Route::patch('/cartitem', 'CartItemsController@update');
	Route::delete('/cartitem', 'CartItemsController@destroy');
});


Route::get('/test', 'ProductController@newlist');
Route::get('/data','DataController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::post('/subscribers/new', 'SubscriberController@store');

/* info static pages */
Route::get('/about-us', 'InfoController@about_us');
Route::get('/contact-us', 'InfoController@contact_us');
Route::get('/static-page', 'InfoController@static_page');

/* meet_brooks static pages */

Route::get('/newsletter', 'meet_brooksController@newsletter');
Route::get('/injury-prevention', 'meet_brooksController@injury_prevention');
Route::get('/newsletter', 'meet_brooksController@newsletter');
Route::get('/run_happy_view', 'meet_brooksController@run_happy_view');
Route::get('/run-signature', 'meet_brooksController@run_signature');
Route::get('/technology', 'meet_brooksController@technology');
Route::get('/training-tips', 'meet_brooksController@training_tips');
Route::get('/what_makes_us_tick', 'meet_brooksController@what_makes_us_tick');


Route::get('/shipping','BillingShippingController@create');
Route::post('/shipping','BillingShippingController@store');
Route::post('/shipping-check-email','BillingShippingController@check_email');
Route::post('/shipping-verify-password','BillingShippingController@verify_password');

Route::get('/payment', 'PaymentController@create');
Route::post('/payment', 'PaymentController@store');

Route::get('/mens-running-shoes-and-clothing', 'CategoryController@womens_landing');
Route::get('/womens-running-shoes-and-clothing', 'CategoryController@mens_landing');

Route::get('/shoes-category', 'CategoryController@shoes_category');
Route::get('/shoe-main', 'CategoryController@shoe_main');

Route::post('/afterpay', 'PaymentController@create_token'); 

Route::get('/afterpay_success', 'PaymentController@afterpay_success');
Route::get('/afterpay_cancel', 'PaymentController@afterpay_cancel');

Route::get('/{category}', 'CategoryController@index');
Route::get('/{prodname}/{style}_{color}.html', 'ProductColourController@index'); /* Detail page for shoes , apparel and sports bra */




