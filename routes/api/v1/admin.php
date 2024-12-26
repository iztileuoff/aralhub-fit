<?php

use App\Http\Controllers\Api\V1\Admin\AdminController;
use App\Http\Controllers\Api\V1\Admin\Auth\LoginController;
use App\Http\Controllers\Api\V1\Admin\Auth\LogoutController;
use App\Http\Controllers\Api\V1\Admin\ProfileController;

Route::group([
    'prefix'     => 'admin/auth',
    'as'         => 'admin.auth.',
], function () {
    Route::post('login', LoginController::class);
    Route::delete('logout', LogoutController::class)->middleware('auth:sanctum');
});

Route::group([
    'prefix'     => 'admin',
    'as'         => 'admin.',
    'middleware' => 'auth:sanctum',
], function () {
    Route::apiSingleton('profile', ProfileController::class);

    Route::apiResource('admins', AdminController::class);
});
