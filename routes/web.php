<?php

use App\Http\Controllers\HistoriaSliderController;
use App\Http\Controllers\PestañaHomeController;
use App\Http\Controllers\AreaInvestigacionController;
use App\Http\Controllers\TopicoController;
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
use App\Http\Controllers\PrincipalController;

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
// ------------------------- PRINCIPAL ---------------------------------------------
Route::get('/admin', [PrincipalController::class, 'vista_principal_admin'])->name('admin-principal');


// ------------------------- HOME SLIDER ---------------------------------------------
Route::get('/admin/slider', [PestañaHomeController::class, 'vista_slider_admin'])->name('admin-homeSlider');
Route::put('/admin/slider/update', [PestañaHomeController::class, 'update_slider_admin'])->name('admin-homeSliderUpdate');

// ------------------------- HOME TOP PROYECTOS ---------------------------------------------
Route::get('/admin/topProyectos', [PestañaHomeController::class, 'vista_topProyectos_admin'])->name('admin-homeProyectos');
Route::put('/admin/topProyectos/update', [PestañaHomeController::class, 'update_topProyectos_admin'])->name('admin-homeProyectosUpdate');

// ------------------------- CRUD PAPERS ---------------------------------------------
Route::get('/admin/papers', PaperController::class .'@adminIndex')->name('paper-panel');

Route::get('/admin/papers/create', PaperController::class . '@create')->name('papers.create');

Route::post('/admin/papers', PaperController::class .'@storePaper')->name('papers.store');

Route::get('/nosotros/biblioteca/papers/{paper}', PaperController::class .'@show')->name('papers.show');

Route::get('/admin/papers/{paper}/edit', PaperController::class .'@edit')->name('papers.edit');

Route::put('/admin/papers/{paper}', PaperController::class .'@update')->name('papers.update');

Route::delete('/admin/papers/{paper}', PaperController::class .'@destroy')->name('papers.destroy');

Route::get('/nosotros/biblioteca/{area}',[PaperController::class, 'fetchByArea'])->name('biblioteca.area');

Route::get('/nosotros/biblioteca/search', [PaperController::class, 'search']);

// ------------------------- CRUD SLIDERS HISTORIA ---------------------------------------------
Route::get('/admin/historia-sliders', HistoriaSliderController::class .'@index')->name('h-sliders-panel');

Route::get('/admin/historia-sliders/create', HistoriaSliderController::class . '@create')->name('h-slider.create');

Route::post('/admin/historia-sliders', HistoriaSliderController::class .'@store')->name('h-slider.store');

Route::get('/admin/historia-sliders/{slider}/edit', HistoriaSliderController::class .'@edit')->name('h-slider.edit');

Route::put('/admin/historia-sliders/{slider}', HistoriaSliderController::class .'@update')->name('h-slider.update');

Route::delete('/admin/historia-sliders/{slider}', HistoriaSliderController::class .'@destroy')->name('h-slider.destroy');


// --------------------------- CRUD AREAS Y TOPICOS ----------------------------------------------


// ---- Areas ---- //
Route::get('/admin/areas', AreaInvestigacionController::class .'@index')->name('areas-panel');

Route::post('/admin/areas', AreaInvestigacionController::class .'@store')->name('areas.store');

Route::get('/admin/areas/{area}/edit', AreaInvestigacionController::class .'@edit')->name('areas.edit');

Route::put('/admin/areas/{area}', AreaInvestigacionController::class .'@update')->name('areas.update');

Route::delete('/admin/areas/{area}', AreaInvestigacionController::class .'@destroy')->name('areas.destroy');

// ---- Topicos ---- //
Route::get('/admin/topicos', TopicoController::class .'@index')->name('topic-panel');

Route::post('/admin/topicos', TopicoController::class .'@store')->name('topics.store');

Route::get('/admin/topicos/{topico}/edit', TopicoController::class .'@edit')->name('topics.edit');

Route::put('/admin/topicos/{topico}', TopicoController::class .'@update')->name('topics.update');

Route::delete('/admin/topicos/{topico}', TopicoController::class .'@destroy')->name('topics.destroy');
