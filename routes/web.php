<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ServiceController;

Route::resource('services', ServiceController::class);

use App\Http\Controllers\ClientController;

Route::resource('clients', ClientController::class);