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
$this->get('logout', 'Auth\LoginController@logout')->name('logout');
Auth::routes();
Route::get('/', 'HomePageController@index');
Route::post('/reset_pass', 'InfoController@check_email');

Route::get('/cart', 'CartController@show');
Route::post('/cart/update_delivery_option', 'CartController@update_delivery_option');
Route::get('/cart/get_cart_order_total', 'CartController@get_cart_order_total');
Route::post('/cart/edit_cart','CartController@edit_cart_popup');
Route::post('/cart/check_valid_gift_voucher', 'CartController@check_valid_gift_voucher');
Route::post('/cart/remove_gift_voucher', 'CartController@remove_gift_voucher');
Route::post('/cart/couponvalidate', 'CartController@couponvalidate');
Route::post('/cart/removecoupon', 'CartController@removecoupon');


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
Route::get('/info/contact-us', 'ContactUsEnquiryController@create');
Route::post('/info/contact-us', 'ContactUsEnquiryController@store');
Route::get('/info/{pg}', 'InfoController@index');

Route::get('/store-locator', 'InfoController@store_locator');
Route::get('/stores', 'StoreController@index');

Route::get('/sitemap', 'InfoController@sitemap'); 
Route::get('/help', 'InfoController@help');  
Route::get('/sitemap', 'InfoController@sitemap');


/* meet_brooks competition pages */
Route::get('/meet_brooks/competition/{comp_name}', 'meet_brooksController@competition');
Route::post('/meet_brooks/competition', 'meet_brooksController@store');
Route::post('/meet_brooks/enewsletter_post', 'meet_brooksController@enewsletter_store');
Route::post('/meet_brooks/{meet_brooks_pg}', 'meet_brooksController@index');
/* meet_brooks static pages */
Route::get('/meet_brooks/{meet_brooks_pg}', 'meet_brooksController@index');

// static success page for newsletter
Route::get('/roadtester', 'meet_brooksController@roadtester');


Route::get('/shipping','BillingShippingController@create');
Route::post('/shipping','BillingShippingController@store');
Route::post('/shipping-check-email','BillingShippingController@check_email');
Route::post('/shipping-verify-password','BillingShippingController@verify_password');

Route::get('/payment', 'PaymentController@create');
Route::post('/payment', 'PaymentController@store');
Route::get('/order/success', 'PaymentController@order_success');
Route::get('/order/failed', 'PaymentController@order_failed');

/* Success page password */
Route::post('/make_member', 'MyaccountController@make_member');

Route::get('/mens-running-shoes-and-clothing', 'CategoryController@womens_landing');
Route::get('/womens-running-shoes-and-clothing', 'CategoryController@mens_landing');
Route::get('/running-shoes-and-apparel-sale', 'CategoryController@sale_landing');

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
Route::post('/account/update_profile', 'MyaccountController@update_profile');
Route::get('/confirm-password', 'MyaccountController@confirm_password');
Route::get('/order-history', 'MyaccountController@order_history');
Route::post('/order/view_order','MyaccountController@view_order');

/* shoefinder page */
Route::get('/shoefinder', 'ShoefinderController@shoefinder');  
Route::post('/shoefinder-ajax', 'ShoefinderController@ajax_data')->middleware('allowOnlyAjax');
Route::get('/shoefinder-getshoe', 'ShoefinderController@get_shoe')->middleware('allowOnlyAjax');

/* Best selling page */
Route::get('/footwear/{gender}/best_selling', 'CategoryController@bestselling');  

/* events page */
Route::get('/events', 'EventController@events_view'); 
Route::get('/events/month/{events_pg}', 'EventController@index');
Route::get('/events/{event}', 'EventController@events_detail'); 

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

// Route::get('/orderfailed', 'CategoryController@orderfailed');

Route::get('/{category}', 'CategoryController@index');
Route::get('/{prodname}/{style}_{color}.html', 'ProductColourController@index'); /* Detail page for shoes , apparel and sports bra */


/* Shoes pages */
Route::get('/shoes/{shoe_name}', 'CategoryController@shoes_detail');


Route::post('/cart/check_valid_gift_voucher', 'CartController@check_valid_gift_voucher');
Route::post('/cart/remove_gift_voucher', 'CartController@remove_gift_voucher');
Route::post('/cart/couponvalidate', 'CartController@couponvalidate');
Route::post('/cart/removecoupon', 'CartController@removecoupon');

