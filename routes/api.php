<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function() {
    Route::get('/user', [AuthController::class, 'user']);
});

Route::post('/login', [AuthController::class, 'login']);

Route::get('/cidades', [CityController::class, 'index']);
