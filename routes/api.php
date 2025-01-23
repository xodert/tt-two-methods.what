<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

    Route::post('/registration', [AuthController::class, 'register']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/profile', [AuthController::class, 'profile']);
    });
