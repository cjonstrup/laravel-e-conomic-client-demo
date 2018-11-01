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


/* e-conomic */
Route::group(['prefix' => 'e-conomic'], function () {
    Route::get('/auth', ['as' => 'economic.auth', 'uses' => 'EconomicController@auth']);
    Route::get('/save', ['as' => 'economic.token', 'uses' => 'EconomicController@save']);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
