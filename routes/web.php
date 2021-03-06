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
Route::resource('items', 'ItemController');

Auth::routes();
Route::group(['middleware' => 'auth'], function () {

    Route::get('/', function () {
        return view('home');
    });

    Route::resource('recaps', 'RecapController');
    Route::resource('campaigns', 'CampaignsController');
    Route::resource('campaigns.items', 'CampaignItemsController');
    Route::delete('/campaigns/{campaign}/items/{item}/sell', 'CampaignItemsController@sell')->name('campaigns.items.sell');


    // Route::resource('parse', 'ParseController');
});