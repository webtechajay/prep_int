<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('read-data', 'APIController@index');

Route::post('store-data', 'APIController@store');
Route::get('edit-data/{id}', 'APIController@edit');
Route::post('update-data/{id}', 'APIController@update');
Route::get('delete-data/{id}', 'APIController@destroy');

