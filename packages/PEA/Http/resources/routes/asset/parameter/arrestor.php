<?php

use PEA\Http\Controllers\Asset\Parameter\ArrestorController;

Route::group([
    'prefix' => 'arrestor',
    'as' => '.arrestor'
], function (){

    Route::get('/list', [ArrestorController::class, 'index'])
        ->name('.list');
    Route::get('/create', [ArrestorController::class, 'create'])
        ->name('.create');
    Route::post('/store', [ArrestorController::class, 'store'])
        ->name('.store');
    Route::get('/edit', [ArrestorController::class, 'edit'])
        ->name('.edit');
    Route::patch('/update', [ArrestorController::class, 'update'])
        ->name('.update');
    Route::delete('/delete', [ArrestorController::class, 'delete'])
        ->name('.delete');

});