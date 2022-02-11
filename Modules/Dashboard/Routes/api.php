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

Route::middleware('auth:api')->get('/dashboard', function (Request $request) {
    return $request->user();
});

Route::get('database-backup','API\APIController@databaseBackup');

Route::post('check-in-out-status','API\APIController@checkInOutStatus');
Route::post('check-in-out','API\APIController@checkInOut');