<?php

use PEA\Http\Controllers\Asset\Parameter\DTMSController;

Route::group([
    'prefix' => 'dtms',
    'as' => '.dtms'
], function (){

    Route::get('/list', [DTMSController::class, 'index'])
        ->name('.list');
    Route::get('/create', [DTMSController::class, 'create'])
        ->name('.create');
    Route::post('/store', [DTMSController::class, 'store'])
        ->name('.store');
    Route::get('/edit', [DTMSController::class, 'edit'])
        ->name('.edit');
    Route::patch('/update', [DTMSController::class, 'update'])
        ->name('.update');
    Route::delete('/delete', [DTMSController::class, 'delete'])
        ->name('.delete');

});