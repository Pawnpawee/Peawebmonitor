<?php

Route::group([
    'namespace' => 'PEA\Http\Controllers',
    'middleware' => ['web'],
    'as' => 'http::'
], function() {
    include __DIR__ . '/auth.php';
    include __DIR__ . '/dashboard.php';
//    include __DIR__ . '/microgrid.php';
    include __DIR__ . '/asset/asset.php';

    Route::get('/', 'DashboardController@index')->name('dashboard');
});







