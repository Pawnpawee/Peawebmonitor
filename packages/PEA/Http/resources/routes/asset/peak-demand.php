<?php

Route::group([
    'prefix' => '/peak-demand',
    'namespace' => 'PeakDemand',
    'as' => '.peak-demand'
], function (){

    Route::get('/', function () {
        return view('http::asset.peak-demand.index');
    });
});