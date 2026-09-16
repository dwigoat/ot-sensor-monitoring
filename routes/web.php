<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SensorDataController;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

// Halaman Login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

// Proses Login
Route::post('/login', [AuthController::class, 'login']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| WEBSITE - HARUS LOGIN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | HOME
    |--------------------------------------------------------------------------
    */

    Route::get('/', [HomeController::class, 'index']);


    /*
    |--------------------------------------------------------------------------
    | HALAMAN PERCOBAAN
    |--------------------------------------------------------------------------
    */

    Route::get('/halo', function () {
        return 'Halo, ini halaman pertama saya!';
    });


    /*
    |--------------------------------------------------------------------------
    | PRODUK
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/produk/{id}',
        [ProdukController::class, 'tampilkan']
    );

    Route::get(
        '/produk/tambah',
        [ProdukController::class, 'formTambah']
    );

    Route::post(
        '/produk/simpan',
        [ProdukController::class, 'simpan']
    );


    /*
    |--------------------------------------------------------------------------
    | DASHBOARD SENSOR
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/dashboard-sensor',
        [SensorDataController::class, 'dashboard']
    );


    /*
    |--------------------------------------------------------------------------
    | TAMBAH DATA SENSOR MANUAL
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/sensor/tambah',
        [SensorDataController::class, 'formTambah']
    );


    /*
    |--------------------------------------------------------------------------
    | SIMPAN DATA SENSOR MANUAL
    |--------------------------------------------------------------------------
    */

    Route::post(
        '/sensor/simpan',
        [SensorDataController::class, 'simpan']
    );


    /*
    |--------------------------------------------------------------------------
    | DATA SENSOR UNTUK GRAFIK
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/sensor/grafik',
        [SensorDataController::class, 'dataGrafik']
    );


    /*
    |--------------------------------------------------------------------------
    | SYNC DATA ESP8266
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/sensor/sync',
        [SensorDataController::class, 'syncData']
    );

});
