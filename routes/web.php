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

Route::get('/{gender}-{category}-{prod_type}', 'CategoryController@index');

//Route::get('/c/{category}', 'ProductController@index');
// Route::get('/list/{prod_type}', 'ProductController@list');

Route::get('/test', 'ProductController@newlist');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
