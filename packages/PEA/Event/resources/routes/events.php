
<?php

Route::group([
//    'middleware' => ['web', 'authorized'],
    'prefix' => 'display',
    'as' => 'display'
], function() {
    Route::get('/', 'DisplayController@index')->name('');
    Route::get('/{event}/edit', 'DisplayController@edit')->name('.edit');
    Route::get('/testSigned', 'DisplayController@testSigned')->name('.testSigned');
});
