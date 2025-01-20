<?php

use App\Http\Controllers\CapitalHumanoController;
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


Route::get('/nosotros/historia', HistoriaSliderController::class . '@view')->name('historia');

Route::get('/nosotros/paper', function () {
    return view('usuario.nosotros.paper');
})->name('biblioteca.paper');

//RUTA CONTACTO
use App\Http\Controllers\ContactoController;

Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');
Route::post('/contacto', [ContactoController::class, 'store'])->name('contacto.store');

//RUTA LOGIN
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PrincipalController;

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


//RUTA REGISTRO
use App\Http\Controllers\CustomAuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');

//RUTA NOTICIA
Route::get('/noticias', function () {
    return view('usuario.novedades.noticias');
})->name('noticias');

use App\Http\Controllers\NoticiaController;

Route::get('/noticias', [NoticiaController::class, 'index'])->name('noticias');
Route::get('/noticias/{id}', [NoticiaController::class, 'show'])->name('noticias.show');
// Route::get('/noticias/create', [NoticiaController::class, 'create'])->name('noticias.create');
// Route::post('/noticias', [NoticiaController::class, 'store'])->name('noticias.store');
Route::get('/detalle-noticias', function () {
    return view('usuario.novedades.detalle-noticias');
})->name('detalle-noticias');

//RUTA PROYECTO
Route::get('/proyectos', function () {
    return view('usuario.novedades.proyectos');
})->name('proyectos');

use App\Http\Controllers\ProyectoController;
Route::get('/proyectos', [ProyectoController::class, 'index'])->name('proyectos');
Route::get('/proyectos/{id}', [ProyectoController::class, 'show'])->name('proyectos.show');

Route::get('/detalle-proyectos', function () {
    return view('usuario.novedades.detalle-proyectos');
})->name('detalle-proyectos');

//RUTA EVENTO
Route::get('/eventos', function () {
    return view('usuario.novedades.eventos');
})->name('eventos');

use App\Http\Controllers\EventoController;

Route::get('/eventos', [EventoController::class, 'index'])->name('eventos');
Route::get('/eventos/{id}', [EventoController::class, 'show'])->name('eventos.show');


Route::get('/detalle-eventos', function () {
    return view('usuario.novedades.detalle-eventos');
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



Route::get('/admin/contacto', [ContactoController::class, 'showContacts'])->name('contactos');
Route::post('/admin/contacto', ContactoController::class .'@store')->name('contactos.store');

// use App\Http\Controllers\NoticiaController;

Route::get('/admin/noticias', [NoticiaController::class, 'showNoticia'])->name('noticias');
Route::post('/admin/noticias', NoticiaController::class .'@store')->name('noticias.store');
Route::get('/admin/noticias/{id}/edit', [NoticiaController::class, 'edit'])->name('noticias.edit');
Route::put('/admin/noticias/{id}', [NoticiaController::class, 'update'])->name('noticias.update');

Route::delete('/admin/noticias/{id}', [NoticiaController::class, 'destroy'])->name('noticias.destroy');

// Route::get('/admin/noticias/create', NoticiaController::class . '@create')->name('noticias.create');

// ------------------------- CRUD ORGANIZACION ---------------------------------------------
// ---- Capital Humano ---- //
Route::get('/admin/capital_humano', [CapitalHumanoController::class, 'index'])->name('capital_index');

