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
    return view('home');
});

Route::resource('items', 'ItemController');

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::resource('campaigns', 'CampaignsController');

    Route::resource('recaps', 'RecapController');

    // Route::resource('parse', 'ParseController');
});