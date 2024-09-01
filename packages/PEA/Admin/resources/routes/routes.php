<?php

Route::group([
	'namespace' => 'PEA\Admin\Controllers',
	'middleware' => ['web'],
	'prefix' => 'admin',
	'as' => 'admin::'
], function() {

    include __DIR__ . '/auth.php';
//
    Route::get('/dashboard', 'DashboardController@index')
//        ->middleware(\PEA\Admin\Middleware\Authorized::class)
        ->name('dashboard');



//	include __DIR__ . '/business/business.php';
//	include __DIR__ . '/adaccount/adaccount.php';
//	include __DIR__ . '/account/account.php';
//	include __DIR__ . '/master/objective.php';
//	include __DIR__ . '/master/type.php';
//	include __DIR__ . '/master/bidding.php';
//	include __DIR__ . '/master/location.php';
//	include __DIR__ . '/master/tag.php';
//	include __DIR__ . '/master/placement.php';
});