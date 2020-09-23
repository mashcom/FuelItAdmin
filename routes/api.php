<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(function(){
    //Route::resource('stand','StandController');
});


Route::get('product','APIController@products');
Route::get('product/{name}','APIController@get_by_name');
Route::get('product/{name}/city/{city}','APIController@search');
Route::get('product/station/{id}','APIController@station');
Route::get('stations/featured/{city?}','APIController@featured_stations');
Route::get('stations/search/{name}/{city?}','APIController@search_stations');
