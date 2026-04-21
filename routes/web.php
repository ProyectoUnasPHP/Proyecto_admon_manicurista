<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/panel-admin', function () {
    return '¡Felicidades! Si puedes leer esto, entraste como Admin y tu middleware funciona perfecto.';
})->middleware(['auth', 'role:Admin']);

require __DIR__.'/auth.php';
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServiceController;

Route::resource('services', ServiceController::class);

use App\Http\Controllers\ClientController;

Route::resource('clients', ClientController::class);
// Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

