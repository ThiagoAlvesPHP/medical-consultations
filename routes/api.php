<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function() {
    Route::get('/user', [AuthController::class, 'user']);

    Route::get('/medicos/{doctor_id}/pacientes', [DoctorController::class, 'patients']);
    Route::post('/medicos', [DoctorController::class, 'store']);
    Route::post('/medicos/consulta', [DoctorController::class, 'storeConsultation']);

    Route::post('/pacientes', [PatientController::class, 'store']);
    Route::put('/pacientes/{patient_id}', [PatientController::class, 'update']);
});

Route::post('/login', [AuthController::class, 'login']);

Route::get('/cidades', [CityController::class, 'index']);
Route::get('/cidades/{city_id}/medicos', [CityController::class, 'doctors']);

Route::get('/medicos', [DoctorController::class, 'index']);
