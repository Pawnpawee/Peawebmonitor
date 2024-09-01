<?php

Route::group([
    'namespace' => 'PEA\Event\Controllers',
//add signed when reaady
//    'middleware' => ['web','signed'],
    'prefix' => 'event',
    'as' => 'event::'
], function() {
    include __DIR__ . '/events.php';
});
