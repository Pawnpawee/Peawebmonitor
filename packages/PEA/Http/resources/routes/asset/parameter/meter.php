<?php

use PEA\Http\Controllers\Asset\Parameter\MeterController;

Route::group([
    'prefix' => 'meter',
    'as' => '.meter'
], function (){

    Route::get('/list', [MeterController::class, 'index'])
        ->name('.list');
    Route::get('/create', [MeterController::class, 'create'])
        ->name('.create');
    Route::post('/store', [MeterController::class, 'store'])
        ->name('.store');
    Route::get('/edit', [MeterController::class, 'edit'])
        ->name('.edit');
    Route::patch('/update', [MeterController::class, 'update'])
        ->name('.update');
    Route::delete('/delete', [MeterController::class, 'delete'])
        ->name('.delete');

});