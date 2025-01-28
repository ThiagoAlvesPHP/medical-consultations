<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DoctorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function() {
    Route::get('/user', [AuthController::class, 'user']);

    Route::post('/medicos', [DoctorController::class, 'store']);
    Route::post('/medicos/consulta', [DoctorController::class, 'storeConsultation']);
});

Route::post('/login', [AuthController::class, 'login']);

Route::get('/cidades', [CityController::class, 'index']);
Route::get('/cidades/{city_id}/medicos', [CityController::class, 'doctors']);

Route::get('/medicos', [DoctorController::class, 'index']);
