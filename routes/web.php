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


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/purchase', 'HomeController@purchase')->name('purchase');
Route::get('/profile', 'HomeController@Profile');
Route::post('/profile', 'HomeController@UpdateProfile')->name('update');


Route::get('/transactions', 'HomeController@Transcations');
Route::post('/purchase', 'TransactionsController@makePurchase')->name('makePurchase');
Route::post('/payment/stripeCharge', 'TransactionsController@Payment');
Route::post('/confirmationsms', 'SmsController@getUserNumber');



