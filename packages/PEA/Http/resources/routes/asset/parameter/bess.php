<?php

use PEA\Http\Controllers\Asset\Parameter\BessController;

Route::group([
    'prefix' => 'bess',
    'as' => '.bess'
], function (){

    Route::get('/list', [BessController::class, 'index'])
        ->name('.list');
    Route::get('/create', [BessController::class, 'create'])
        ->name('.create');
    Route::post('/store', [BessController::class, 'store'])
        ->name('.store');
    Route::get('/edit', [BessController::class, 'edit'])
        ->name('.edit');
    Route::patch('/update', [BessController::class, 'update'])
        ->name('.update');
    Route::delete('/delete', [BessController::class, 'delete'])
        ->name('.delete');

});