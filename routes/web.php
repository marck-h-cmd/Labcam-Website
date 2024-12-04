<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('usuario.index');
});

use App\Http\Controllers\ContactoController;

Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');

use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

