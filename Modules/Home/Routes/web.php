<?php

Route::prefix('/')->group(function() {
    Route::get('/', 'Home@index');
    Route::get('pages/{clue}', 'Home@pages');
    Route::post('contact', 'Home@contact');

    Route::resource('register', 'Registration');
    Route::resource('signin', 'Sign');
    Route::resource('profile', 'Profile');

    Route::resource('search', 'Search');
    Route::resource('plans', 'Plans');

    Route::get('pay-registration-fee', 'RegistrationFee@payment');
    Route::get('registration-fee-cancel', 'RegistrationFee@cancel');
    Route::post('registration-fee-success', 'RegistrationFee@success');

    Route::get('pay-match-fee', 'MatchFee@payment');
    Route::get('match-fee-cancel', 'MatchFee@calcel');
    Route::post('match-fee-success', 'MatchFee@success');

    Route::resource('renew', 'Renew');
    Route::get('pay-renew-fee', 'RenewFee@payment');
    Route::post('renew-fee-success', 'RenewFee@success');
});
