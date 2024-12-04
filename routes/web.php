<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('usuario.index');
});

//contacto

Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');

//login

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

