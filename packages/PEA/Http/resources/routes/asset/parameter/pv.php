<?php

use PEA\Http\Controllers\Asset\Parameter\PVController;

Route::group([
    'prefix' => 'pv',
    'as' => '.pv'
], function (){

    Route::get('/list', [PVController::class, 'index'])
        ->name('.list');
    Route::get('/create', [PVController::class, 'create'])
        ->name('.create');
    Route::post('/store', [PVController::class, 'store'])
        ->name('.store');
    Route::get('/edit', [PVController::class, 'edit'])
        ->name('.edit');
    Route::patch('/update', [PVController::class, 'update'])
        ->name('.update');
    Route::delete('/delete', [PVController::class, 'delete'])
        ->name('.delete');

});