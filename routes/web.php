<?php

use App\Http\Controllers\RoleController;

Route::middleware(['auth'])->group(function () {
    Route::resource('roles', RoleController::class);
});

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/panel-admin', function () {
    return 'Â¡Felicidades! Si puedes leer esto, entraste como Admin y tu middleware funciona perfecto.';
})->middleware(['auth', 'role:Admin']);

require __DIR__.'/auth.php';
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ManicuristaController;
use App\Http\Controllers\DisponibilidadController;

Route::resource('services', ServiceController::class);
Route::resource('manicuristas', ManicuristaController::class);
Route::resource('disponibilidades', DisponibilidadController::class);

use App\Http\Controllers\ClientController;

Route::resource('clients', ClientController::class);
// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('/', function () {
    return redirect()->route('dashboard');
});

