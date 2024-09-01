<?php

Route::group([
    'prefix' => 'asset',
    'namespace' => 'Asset',
    'as' => 'asset'
], function (){

    include __DIR__ . '/peak-demand.php';
    include __DIR__ . '/capacity.php';
    include __DIR__ . '/prioritize.php';
    include __DIR__ . '/parameter.php';
});