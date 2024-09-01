<?php

Route::group([
    'prefix' => 'reset-password',
    'as' => '.reset-password'
], function () {

    Route::get('/{token?}', 'ResetPasswordController@index')
        ->name('');

    Route::post('/{token?}', 'ResetPasswordController@reset')
        ->name('.reset');
});
