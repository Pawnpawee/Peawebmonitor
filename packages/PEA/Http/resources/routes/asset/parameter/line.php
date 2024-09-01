<?php

use PEA\Http\Controllers\Asset\Parameter\LineController;

Route::group([
    'prefix' => 'line',
    'as' => '.line'
], function (){

    Route::get('/list', [LineController::class, 'index'])
        ->name('.list');
    Route::get('/create', [LineController::class, 'create'])
        ->name('.create');
    Route::post('/store', [LineController::class, 'store'])
        ->name('.store');
    Route::get('/edit', [LineController::class, 'edit'])
        ->name('.edit');
    Route::patch('/update', [LineController::class, 'update'])
        ->name('.update');
    Route::delete('/delete', [LineController::class, 'delete'])
        ->name('.delete');

});