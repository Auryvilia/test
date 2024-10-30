<?php

use App\Http\Controllers\DokterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::resource('dokter', DokterController::class);
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
