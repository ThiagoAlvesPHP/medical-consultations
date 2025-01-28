<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:api')->group(function() {
    Route::post('/user', [AuthController::class, 'user']);
});

Route::post('/login', [AuthController::class, 'login']);
