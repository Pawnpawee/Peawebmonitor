<?php

Route::group([
	'namespace' => 'Account',
	'prefix' => 'account',
	'as' => 'account',
], function() {

	Route::get('/','AccountController@index')
	     ->name('');

	Route::get('/create','AccountController@create')
	     ->name('.create');

	Route::post('/store', 'AccountController@store')
	     ->name('.store');

	Route::get('/{account}/edit','AccountController@edit')
	     ->name('.edit');

	Route::patch('/{account}/update', 'AccountController@update')
	     ->name('.update');

	Route::delete('/{account}/delete', 'AccountController@delete')
	     ->name('.delete');

	Route::get('/{account}/reset-password', 'AccountController@resetPassword')
	     ->name('.reset-password');

	Route::patch('/{account}/update-password', 'AccountController@updatePassword')
	     ->name('.update-password');
});
