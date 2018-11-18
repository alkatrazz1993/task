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

Route::get('/', 'IndexController@index')->name('mainPage');
Route::resource('forecasts-types', 'ForecastsTypesController');
Route::resource('forecasts', 'ForecastsController');
Route::get('forecasts/{zodiacId}/{typeId}', 'ForecastsController@show');
Route::post('forecasts/{zodiacId}/{typeId}', 'ForecastsController@show');