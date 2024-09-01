<?php

Route::group([
    'prefix' => 'capacity',
    'namespace' => 'Capacity',
    'as' => '.capacity'
], function (){

    Route::get('/', function () {
        return view('http::asset.capacity.index');
    });
});