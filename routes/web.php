<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('usuario.index');
})->name('home');


Route::get('/direccion', function(){
    return view ('usuario.Organizacion.Direccion');
})->name('direccion');

Route::get('/capital', function () {
    return view('usuario.Organizacion.CapitalHumano');
})->name('capital');


Route::get('/nosotros/about', function () {
    return view('usuario.nosotros.about');
})->name('about');


Route::get('/nosotros/biblioteca', function () {
    return view('usuario.nosotros.biblioteca');
})->name('biblioteca');

Route::get('/nosotros/historia', function () {
    return view('usuario.nosotros.historia');
})->name('historia');

Route::get('/nosotros/paper', function () {
    return view('usuario.nosotros.paper');
})->name('biblioteca.paper');

use App\Http\Controllers\ContactoController;

Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');

use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');




