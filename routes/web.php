<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ManicuristaController;
use App\Http\Controllers\DisponibilidadController;

// Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Services
Route::resource('services', ServiceController::class);

// Manicuristas
Route::resource('manicuristas', ManicuristaController::class);

// Disponibilidades
Route::resource('disponibilidades', DisponibilidadController::class);