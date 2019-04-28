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

Route::get('/', 'HermoBackendController@index')->name('login');
Route::post('/login_process', 'HermoBackendController@login_process')->name('login_process');
Route::get('/mainpage', 'HermoBackendController@mainpage')->name('mainpage');
Route::get('/list_purchase_order', 'HermoBackendController@list_purchase_order')->name('list_purchase_order');
Route::post('/add_purchase_order', 'HermoBackendController@add_purchase_order')->name('add_purchase_order');
Route::get('/edit_purchase_order/{po_number}', 'HermoBackendController@edit_purchase_order')->name('edit_purchase_order');
Route::post('/add_lineItems', 'HermoBackendController@add_lineItems')->name('add_lineItems');
Route::post('/update_purchase_order','HermoBackendController@update_purchase_order')->name('update_purchase_order');
Route::post('/update_quantity_items','HermoBackendController@update_quantity_items')->name('update_quantity_items');
Route::get('/list_items', 'HermoBackendController@list_items')->name('list_items');
Route::post('/add_register_locationtagging','HermoBackendController@add_register_locationtagging')->name('add_register_locationtagging');
Route::get('/list_inventory', 'HermoBackendController@list_inventory')->name('list_inventory');		
Route::post('/add_products','HermoBackendController@add_products')->name('add_products');
Route::get('/list_products', 'HermoBackendController@list_products')->name('list_products');	

Route::get('/home', 'LandingController@index')->name('home');
Route::post('/checkout', 'LandingController@checkout')->name('checkout');
Route::post('/checkout_process', 'LandingController@checkout_process')->name('checkout_process');
Route::get('/summary_checkout/{id}', 'LandingController@summary_checkout')->name('summary_checkout');
Route::get('/login', 'LandingController@login')->name('login_frontend');
Route::post('/login_process_frontend', 'LandingController@login_process_frontend')->name('login_process_frontend');
Route::get('/logout_backend', 'HermoBackendController@logout_backend')->name('logout_backend');

