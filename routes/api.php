<?php

use Illuminate\Http\Request;
use App\Http\Controllers\SensorController;

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

// index
Route::get('sensors', 'SensorController@index');

// store
Route::post('sensors/store', 'SensorController@store');

// show
Route::get('sensors/{id}', 'SensorController@show');

// update
Route::post('sensors/update/{id}', 'SensorController@update');

// delete data
Route::get('sensors/delete/{id}', 'SensorController@delete');