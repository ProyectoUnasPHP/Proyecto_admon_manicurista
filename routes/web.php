<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServiceController;

// Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Services
Route::resource('services', ServiceController::class);