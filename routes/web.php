<?php

use App\Http\Controllers\PestañaHomeController;
use Illuminate\Support\Facades\Route;

// -----------------------------------------------------USUARIO--------------------------------------------------------------------------------------
Route::get('/', [PestañaHomeController::class, 'vista_home_user'])->name('home');


Route::get('/direccion', function () {
    return view('usuario.Organizacion.Direccion');
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
Route::post('/contacto', [ContactoController::class, 'store'])->name('contacto.store');

use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

Route::get('/noticias', function () {
    return view('usuario.Investigacion.noticias');
})->name('noticias');


Route::get('/proyectos', function () {
    return view('usuario.Investigacion.proyectos');
})->name('proyectos');

use App\Http\Controllers\ProyectoController;
Route::get('/proyectos', [ProyectoController::class, 'index'])->name('proyectos');
Route::get('/proyectos/{id}', [ProyectoController::class, 'show'])->name('proyectos.show');

Route::get('/detalle-proyectos', function () {
    return view('usuario.Investigacion.detalle-proyectos');
})->name('detalle-proyectos');


Route::get('/eventos', function () {
    return view('usuario.Investigacion.eventos');
})->name('eventos');

Route::get('/detalle-noticias', function () {
    return view('usuario.Investigacion.detalle-noticias');
})->name('detalle-noticias');

Route::get('/detalle-proyectos', function () {
    return view('usuario.Investigacion.detalle-proyectos');
})->name('detalle-proyectos');

Route::get('/detalle-eventos', function () {
    return view('usuario.Investigacion.detalle-eventos');
})->name('detalle-eventos');



// ---------------------------------------------------ADMINISTRADOR-----------------------------------------------------------------------------------
Route::get('/admin/slider', [PestañaHomeController::class, 'vista_slider_admin'])->name('admin-homeSlider');
Route::put('/admin/slider/update', [PestañaHomeController::class, 'update_slider_admin'])->name('admin-homeSliderUpdate');


Route::get('/admin/topProyectos', function () {
    return view('administrador.homeProyectos');
})->name('admin-homeProyectos');
