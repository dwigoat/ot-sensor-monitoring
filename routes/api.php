<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SensorDataController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Endpoint untuk ESP32 kirim data sensor
Route::post('/sensor-data', [SensorDataController::class, 'simpanDariDevice']);