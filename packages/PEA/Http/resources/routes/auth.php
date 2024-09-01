<?php

Route::group([
    'namespace' => 'Authentication',
    'prefix' => 'auth',
    'as' => 'auth.'
], function() {
    Route::get('login', 'AuthController@login')->name('login');
    Route::get('redirect', 'AuthController@redirectToKeycloak')->name('redirect.keycloak');
    Route::get('callback', 'AuthController@handleKeycloakCallback')->name('callback');
    Route::get('logout', 'AuthController@logout')->name('logout');
});