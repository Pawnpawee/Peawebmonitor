<?php

Route::group([
    'prefix' => 'prioritize',
    'namespace' => 'Prioritize',
    'as' => '.prioritize'
], function (){

    include __DIR__ . '/prioritize/transformer.php';
    include __DIR__ . '/prioritize/line.php';
    include __DIR__ . '/prioritize/cb.php';
});