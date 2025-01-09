<?php

use App\Http\Controllers\HistoriaSliderController;
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

// RUTAS DE SECCIÓN NOSOTROS
use App\Http\Controllers\PaperController;
Route::get('/nosotros/about', function () {
    return view('usuario.nosotros.about');
})->name('about');


Route::get('/nosotros/biblioteca',[PaperController::class, 'index'])->name('biblioteca');

Route::get('/nosotros/biblioteca/fetch-more', [PaperController::class, 'fetchMorePapers'])->name('biblioteca.fetchMore');


Route::get('/nosotros/historia', HistoriaSliderController::class . '@index')->name('historia');

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

// ------------------------- CRUD PAPERS ---------------------------------------------
Route::get('/admin/papers', PaperController::class .'@adminIndex')->name('paper-panel');

Route::get('/admin/papers/create', PaperController::class . '@create')->name('papers.create');

Route::post('/admin/papers', PaperController::class .'@storePaper')->name('papers.store');

Route::get('/nosotros/biblioteca/papers/{paper}', PaperController::class .'@show')->name('papers.show');

Route::get('/admin/papers/{paper}/edit', PaperController::class .'@edit')->name('papers.edit');

Route::put('/admin/papers/{paper}', PaperController::class .'@update')->name('papers.update');

Route::delete('/admin/papers/{paper}', PaperController::class .'@destroy')->name('papers.destroy');

Route::get('/nosotros/biblioteca/{area}',[PaperController::class, 'fetchByArea'])->name('biblioteca.area');

// ------------------------- CRUD SLIDERS HISTORIA ---------------------------------------------


Route::get('/admin/h-sliders/create', HistoriaSliderController::class . '@create')->name('h-slider.create');

Route::post('/admin/h-sliders', HistoriaSliderController::class .'@store')->name('h-slider.store');