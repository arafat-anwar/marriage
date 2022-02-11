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

Route::prefix('events-management')->group(function() {
    Route::get('/', 'EventManagementController@index');

    Route::resource('holiday-types', 'HolidayTypesController');
    Route::resource('holidays', 'HolidaysController');

    Route::resource('event-types', 'EventTypesController');
    Route::resource('events', 'EventsController');
});
