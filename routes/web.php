<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\AdministrasiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DashboardController;


Route::get('/', [DashboardController::class, 'index']);

Route::resource('dokters', DokterController::class);
Route::resource('pasiens', PasienController::class);
Route::resource('administrasis', AdministrasiController::class);

Route::prefix('laporan')->name('laporan.')->group(function () {
    Route::get('/dokter',       [LaporanController::class, 'dokter'])->name('dokter');
    Route::get('/pasien',       [LaporanController::class, 'pasien'])->name('pasien');
    Route::get('/administrasi', [LaporanController::class, 'administrasi'])->name('administrasi');
});
