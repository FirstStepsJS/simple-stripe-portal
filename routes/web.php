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

Route::redirect('/', '/stripe');
Route::get('stripe', 'StripeController@stripe');
Route::post('payment', 'StripeController@payStripe')->name('payment');
Route::view('success', 'success');