<?php

use PEA\Admin\Middleware\RedirectIfAuthenticated;

Route::group([
    'namespace' => 'Authentication',
    'prefix' => 'auth',
    'as' => 'auth'
], function() {

    Route::get('/logout', 'AuthController@logout')
        ->name('.logout');

    Route::group([
//        'middleware' => [RedirectIfAuthenticated::class]
    ], function() {

        Route::get('/login', 'AuthController@login')
            ->name('.login');
//
        Route::post('/login', 'AuthController@attempt')
            ->name('.attempt');

        include __DIR__ . '/authentication/forgot-password.php';
        include __DIR__ . '/authentication/reset-password.php';
    });
});