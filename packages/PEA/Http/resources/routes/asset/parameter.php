<?php

Route::group([
    'prefix' => 'parameter',
    'namespace' => 'Parameter',
    'as' => '.parameter'
], function (){

    include __DIR__ . '/parameter/transformer.php';
    include __DIR__ . '/parameter/line.php';
    include __DIR__ . '/parameter/cb.php';
    include __DIR__ . '/parameter/meter.php';
    include __DIR__ . '/parameter/dtms.php';
    include __DIR__ . '/parameter/pv.php';
    include __DIR__ . '/parameter/bess.php';
    include __DIR__ . '/parameter/ev-charger.php';
    include __DIR__ . '/parameter/arrestor.php';
});