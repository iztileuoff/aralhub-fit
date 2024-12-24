<?php

use App\Http\Controllers\Api\V1\Mobile\ProfileController;
use App\Http\Controllers\Api\V1\Mobile\TargetController;

Route::group([
    'prefix'     => 'mobile',
    'as'         => 'mobile.',
    'middleware' => 'auth:sanctum',
], function () {
    Route::apiResource('targets', TargetController::class)->only('index');
    Route::apiSingleton('profile', ProfileController::class);
});
