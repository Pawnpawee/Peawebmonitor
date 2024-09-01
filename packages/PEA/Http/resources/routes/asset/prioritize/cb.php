<?php

use PEA\Http\Controllers\Asset\Parameter\CBController;

Route::group([
    'prefix' => 'cb',
    'as' => '.cb'
], function (){

    Route::get('/list', [CBController::class, 'index'])
        ->name('.list');
    Route::get('/create', [CBController::class, 'create'])
        ->name('.create');
    Route::post('/store', [CBController::class, 'store'])
        ->name('.store');
    Route::get('/edit', [CBController::class, 'edit'])
        ->name('.edit');
    Route::patch('/update', [CBController::class, 'update'])
        ->name('.update');
    Route::delete('/delete', [CBController::class, 'delete'])
        ->name('.delete');

});