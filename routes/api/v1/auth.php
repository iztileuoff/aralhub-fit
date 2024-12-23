<?php

use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Auth\LogoutController;
use App\Http\Controllers\Api\V1\Auth\SendCodeController;

Route::group([
    'prefix'     => 'auth',
    'as'         => 'auth.',
], function () {
    Route::post('send-code', SendCodeController::class);
    Route::post('login', LoginController::class);
    Route::delete('logout', LogoutController::class)->middleware('auth:sanctum');
});
