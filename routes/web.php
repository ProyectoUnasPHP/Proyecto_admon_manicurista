<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServiceController;

Route::resource('services', ServiceController::class);

use App\Http\Controllers\ClientController;

Route::resource('clients', ClientController::class);
// Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

