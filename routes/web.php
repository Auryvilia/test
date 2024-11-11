<?php

use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::resource('dokter', DokterController::class);
    Route::get('/dokter/laporan/cetak', [DokterController::class, 'laporan']);

    Route::resource('pasien', PasienController::class);
    Route::get('/pasien/laporan/cetak', [PasienController::class, 'laporan']);
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
