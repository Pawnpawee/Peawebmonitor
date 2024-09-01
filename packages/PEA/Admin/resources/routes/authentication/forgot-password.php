<?php

Route::group([
    'prefix' => 'forgot-password',
    'as' => '.forgot-password'
], function() {

    Route::get('/', 'ForgotPasswordController@index')
        ->name('');

    Route::post('/', 'ForgotPasswordController@forgot')
        ->name('.forgot');
});
