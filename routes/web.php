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
Route::get('/program/ppp', 'Auth\RegisterController@loyalty_register');
Route::redirect('/loyalty_register', '/program/ppp');
Route::redirect('/meet_brooks/technology', '/meet_brooks/technology/running-shoes-technology');

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
Route::post('/medibank_check_user', 'MedibankController@medibank_check_user');
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
Route::get('/meet_brooks/competition/thank_you', 'meet_brooksController@rh_comp_thank_you');
Route::get('/meet_brooks/competition/{comp_name}', 'meet_brooksController@competition');
Route::get('/meet_brooks/update_previous_competitions', 'meet_brooksController@update_previous_competitions');
Route::post('/meet_brooks/competition', 'meet_brooksController@store');
Route::post('/meet_brooks/enewsletter_post', 'meet_brooksController@enewsletter_store');
Route::post('/meet_brooks/newsletter_update', 'meet_brooksController@newsletter_update');
Route::post('/meet_brooks/newsletter_signup', 'meet_brooksController@newsletter_signup');
Route::post('/meet_brooks/{meet_brooks_pg}', 'meet_brooksController@index');
/* meet_brooks static pages */
Route::get('/meet_brooks/{meet_brooks_pg}', 'meet_brooksController@index');

Route::get('/meet_brooks/technology/brooks-sports-bra', 'meet_brooksController@brooks_sports_bra');
Route::get('/meet_brooks/technology/running-shoes-technology', 'meet_brooksController@running_shoes_technology');




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

Route::get('/womens-running-shoes-and-clothing', 'CategoryController@womens_landing');
Route::get('/mens-running-shoes-and-clothing', 'CategoryController@mens_landing');
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


Route::get('/loyalty-account-personal', 'MyaccountController@loyalty_account_personal');

/* shoefinder old page */
Route::get('/shoefinder_old', 'ShoefinderController@shoefinder');  
Route::post('/shoefinder-ajax', 'ShoefinderController@ajax_data')->middleware('allowOnlyAjax');
Route::get('/shoefinder-getshoe', 'ShoefinderController@get_shoe')->middleware('allowOnlyAjax');

/* shoefinder new page */
Route::get('/shoefinder', 'ShoefinderController@shoefinder_new');
Route::get('/ShoeFinder-Progress', 'ShoefinderController@ajax_data_new')->middleware('allowOnlyAjax'); 
Route::get('/ShoeFinder-Checkpoint', 'ShoefinderController@ajax_checkpoint_new')->middleware('allowOnlyAjax');   
Route::post('/ShoeFinder-Checkpoint', 'ShoefinderController@ajax_checkpoint_new')->middleware('allowOnlyAjax');  
Route::get('/ShoeFinder-ResultsShow', 'ShoefinderController@ajax_result_new')->middleware('allowOnlyAjax');   
Route::get('/ShoeFinder-score', 'ShoefinderController@ajax_getscore')->middleware('allowOnlyAjax');   

/* Best selling page */
Route::get('/footwear/{gender}/best_selling', 'CategoryController@bestselling');  

/* events page */
// Route::get('/events', 'EventController@events_view'); 
// Route::get('/events/month/{events_pg}', 'EventController@index');
// Route::get('/events/{event}', 'EventController@events_detail'); 
// Route::get('/month', 'EventController@events_default'); 
Route::get('/events', 'EventController@new_events_listing'); 
Route::post('/events', 'EventController@new_events_listing'); 
Route::get('/events/{one_event}', 'EventController@event_type'); 
Route::get('/events-listing/single-event', 'EventController@static');
//Route::get('/events/{series}', 'EventController@new_series_event')->name('series_event'); 
Route::get('/events-listing/series-event', 'EventController@series_static');
Route::get('/events-listing/series-blurb-event', 'EventController@new_series_blurb_per_race_event'); 
Route::get('/events-listing/series-static-event', 'EventController@new_series_static_event');

Route::get('/events-slug','EventController@get_event')->name('events-slug');


/* quickhelp static pages */
// Route::get('/returns-centre', 'quickhelpController@returns_centre');
//Route::get('/error-404', 'QuickhelpController@error_404');

Route::get('/defective-product-clain', 'quickhelpController@defective_product_clain');
Route::get('/faqs', 'quickhelpController@faqs');
Route::get('/fit-sizing', 'quickhelpController@fit_sizing');
Route::get('/track-your-order', 'quickhelpController@track_your_order');

Route::get('/testap21/create_user', 'testap21@create_user'); 
Route::get('/testap21/create_order', 'testap21@create_order'); 
Route::get('/testap21/voucher_valid', 'testap21@voucher_valid'); 
Route::get('/testap21/remove_loyalty', 'testap21@remove_loyalty'); 

Route::get('/test/stockrefresh', 'TestController@stockrefresh'); 

Route::get('/neutral-running-shoes', 'CategoryController@shoes_category');
Route::get('/support-running-shoes', 'CategoryController@shoes_category');
Route::get('/trail-running-shoes', 'CategoryController@shoes_category');
Route::get('/competition-running-shoes', 'CategoryController@shoes_category');
Route::get('/cross-trainer-shoes', 'CategoryController@shoes_category');
Route::get('/walking-shoes', 'CategoryController@shoes_category');

// Route::get('/orderfailed', 'CategoryController@orderfailed');

Route::get('/order-confirmation', 'CategoryController@order_confirmation');

// staff competition 

Route::get('/TAFwintranscend', 'StaffcompetitionController@index');
Route::get('/tafwintranscend', 'StaffcompetitionController@index');
Route::get('/wintranscend', 'StaffcompetitionController@index');
Route::get('/TAFwinglycerin17', 'StaffcompetitionController@index');
Route::get('/winglycerin17', 'StaffcompetitionController@index');
Route::post('/staffcompetition/insert', 'StaffcompetitionController@store');

/* Collection pages */
Route::get('/limited-edition-levitate-ricochet-shoes', 'CollectionController@index');
Route::get('/abstract-collection-adrenaline-ghost', 'CollectionController@adreline_ghost');
Route::get('/collections/mothers-day', 'CollectionController@mothers_day');
Route::get('/collections/fathers-day', 'CollectionController@fathers_day');
Route::get('/collections/energize-running-shoes', 'CollectionController@energize_collection');
Route::get('/healthcare-shoes-for-nurses', 'CollectionController@shoes_for_nurses');
Route::get('/collections/ghost-saturation', 'CollectionController@ghost_saturation');
Route::get('/collections/revel-3-shine-collection', 'CollectionController@revel3_shine_collection');
Route::get('/collections/melts-collection', 'CollectionController@melts_collection');
Route::get('/collections/revel-3-breakthrough-collection', 'CollectionController@revel3_breakthrough_collection');
Route::get('/collections/christmas-gift-guide', 'CollectionController@christmas_giftguide');

Route::get('sitemap-index.xml', 'SitemapController@index');
Route::redirect('/sitemap.xml', '/sitemap-index.xml');

Route::get('check_gv', 'SimpleGVController@gv_check');

Route::get('/{category}', 'CategoryController@index');
Route::get('/{prodname}/{style}_{color}.html', 'ProductColourController@index'); /* Detail page for shoes , apparel and sports bra */


/* Shoes pages */
Route::get('/shoes/{shoe_name}', 'CategoryController@shoes_detail');

Route::post('/cart/check_valid_gift_voucher', 'CartController@check_valid_gift_voucher');
Route::post('/cart/remove_gift_voucher', 'CartController@remove_gift_voucher');
Route::post('/cart/couponvalidate', 'CartController@couponvalidate');
Route::post('/cart/removecoupon', 'CartController@removecoupon');

/* Manual Order Push */ 

Route::get('/manual_ap21order_push/{order_id}', 'Manual_ap21order_push@manual_ap21order_push');
//Route::get('/move/table', 'MovetableController@index'); 

Route::get('/d/testicontact/add', 'testicontact@add');
Route::get('/d/testicontact/pull_from_icontact/{run_cnt}', 'testicontact@pull_from_icontact');
Route::get('/d/testicontact/unsubscribe_list', 'testicontact@unsubscribe_list');
Route::get('/d/testicontact/push_to_icontact', 'testicontact@push_to_icontact');
Route::get('/d/testicontact/fetch_icontact_ids_in_web', 'testicontact@fetch_icontact_ids_in_web');
Route::get('/d/testicontact/push_queued_records_to_icontact', 'testicontact@push_queued_records_to_icontact');
Route::get('/test_ap21_personidx/{email}', 'testap21@test_ap21_personidx');
Route::get('/test/media-list', 'testImageList@index');
Route::get('/test/ManualOrderMail/{from}/{to}', 'ManualOrderMail@index');

Route::post('/medibank_shipping_verify_login','BillingShippingController@verify_medibank_login');

Route::get('/testmedibankcsv/export_medibank_order_csv', 'testmedibankcsv@export_medibank_order_csv');
Route::get('/error-page', 'QuickhelpController@error_404');




/* loyalty accounts static pages */
Route::get('/account-homepage', 'MyaccountController@account_homepage');
