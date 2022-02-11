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

Route::prefix('components')->group(function() {
    Route::get('/', 'ComponentsController@index');
    
    Route::resource('sliders', 'SlidersController');
    Route::resource('payments', 'PaymentsController');
    Route::resource('messages', 'MessagesController');
    Route::get('messages/destroy/{id}', 'MessagesController@destroy')->name('messages.destroy');
});
