<?php

use PEA\Http\Controllers\Asset\Prioritize\TransformerController;

Route::group([
    'prefix' => 'transformer',
    'as' => '.transformer'
], function (){

    Route::get('/list', [TransformerController::class, 'index'])
        ->name('.list');
});