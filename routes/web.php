<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendosaController;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('pendosa', \App\Http\Controllers\PendosaController::class);
Route::post('/simpan-dosa', [\App\Http\Controllers\PendosaController::class, 'simpanDosa'])->name('simpan.dosa');
