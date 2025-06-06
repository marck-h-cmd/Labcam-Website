<?php

use App\Http\Controllers\CapitalHumanoController;
use App\Http\Controllers\HistoriaSliderController;
use App\Http\Controllers\PestañaHomeController;
use App\Http\Controllers\AreaInvestigacionController;
use App\Http\Controllers\TopicoController;
use App\Http\Controllers\DireccionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Middleware\UpdateEventosMiddleware;
use App\Http\Controllers\PaperController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\AreaProyectoController;
use App\Http\Controllers\TutorialesController;
use App\Http\Middleware\CacheControl;


Route::middleware([CacheControl::class])->group(function () {
    Route::middleware([UpdateEventosMiddleware::class])->group(function () {

        // -----------------------------------------------------USUARIO--------------------------------------------------------------------------------------
        Route::get('/', [PestañaHomeController::class, 'vista_home_user'])->name('home');


        Route::get('/direccion', [DireccionController::class, 'direc_us'])->name('direccion');

        Route::get('/capitales', [CapitalHumanoController::class, 'capHumano_us'])->name('capital_usuario');

        Route::get('/areas', [CapitalHumanoController::class, 'area_us'])->name('areas');

        // RUTAS DE SECCIÓN NOSOTROS

        Route::get('/about', function () {
            return view('usuario.nosotros.about');
        })->name('about');


        Route::get('/nosotros/biblioteca/papers', [PaperController::class, 'index'])->name('biblioteca');

        Route::get('/nosotros/biblioteca/fetch-more', [PaperController::class, 'fetchMorePapers'])->name('biblioteca.fetchMore');


        Route::get('/historia', HistoriaSliderController::class . '@view')->name('historia');

        //RUTA CONTACTO

        Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');
        Route::post('/contacto', [ContactoController::class, 'store'])->name('contacto.store');


        //RUTA NOTICIA
        Route::get('/noticias', [NoticiaController::class, 'index'])->name('noticias');
        Route::get('/noticias/{id}', [NoticiaController::class, 'show'])->name('noticias.show');

        //RUTA EVENTO
        Route::get('/eventos', [EventoController::class, 'index'])->name('eventos');
        Route::get('/eventos/{id}', [EventoController::class, 'show'])->name('eventos.show');

        // ------------------------- SECCION BIBLIOTECA ---------------------------------------------
        Route::prefix('biblioteca/papers')->name('biblioteca.papers.')->group(function () {
            Route::get('/', [PaperController::class, 'index'])->name('index');
            Route::get('/paper/{paper}', [PaperController::class, 'show'])->name('show');
            Route::get('/area/{area}', [PaperController::class, 'fetchByArea'])->name('area');
            Route::get('/search', [PaperController::class, 'index'])->name('search');
            Route::get('/fetch-more', [PaperController::class, 'fetchMorePapers'])->name('fetchMore');
            Route::get('/paper/download-pdf/{pdf_fileName}', [PaperController::class, 'downloadPdf'])->name('download.pdf');
        });


        // ------------------------- SECCION AREAS PROYECTOS ---------------------------------------------
        Route::get('/areas_proyectos', [AreaProyectoController::class, 'vista_user_areas'])->name('areas_proyectos_user');
        Route::get('/areas_proyectos/{areaFormatted}', [AreaProyectoController::class, 'mostrarProyectosPorArea'])
            ->name('areas.proyectos');
        Route::get('/areas_proyectos/{areaFormatted}/{id}', [ProyectoController::class, 'show'])->name('proyectos.show');

        // -------------------------RUTA LOGIN ---------------------------------------------


        Route::get('/login', [AuthController::class, 'index'])->name('login.index');
        Route::post('/login', [AuthController::class, 'login'])->name('login');
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

        // -------------------------RUTA REGISTRO ----------------------------------------------------------------------------------------


        Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
        Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');



        // ------------------------- RUTAS PARA PERFIL --------------------------------------------- 
        Route::middleware('auth')->group(function () {
            Route::get('/admin/user', [CustomAuthController::class, 'edit_user'])->name('user.edit_user');
            Route::put('/admin/user/{id}', [CustomAuthController::class, 'update_user'])->name('user.update_user');
            Route::put('/admin/user/{id}/photo', [CustomAuthController::class, 'update_photo'])->name('user.update_photo');
            Route::put('/admin/user/{id}/password', [CustomAuthController::class, 'update_password'])->name('user.update_password');



            // ------------------------- CRUD USUARIOS---------------------------------------------
            Route::get('/admin/users', [CustomAuthController::class, 'showUser'])->name('users');
            Route::get('/admin/users/{id}/edit', [CustomAuthController::class, 'edit'])->name('users.edit');
            Route::put('/admin/users/{id}', [CustomAuthController::class, 'update'])->name('users.update');

            Route::post('/admin/users', [CustomAuthController::class, 'store'])->name('users.store');
            Route::delete('/admin/users/{id}', [CustomAuthController::class, 'destroy'])->name('users.destroy');
            Route::get('/admin/users/buscar', [CustomAuthController::class, 'showUser'])->name('users.buscar');

            // ------------------------- VERIFICACION DE PERSONAS---------------------------------------------
            Route::get('/admin/person', [CustomAuthController::class, 'showPerson'])->name('person');
            Route::post('/admin/person/{id}/approve', [CustomAuthController::class, 'approveUser'])->name('person.approve');
            Route::delete('/admin/person/{id}', [CustomAuthController::class, 'destroy_person'])->name('person.destroy_person');


            // ---------------------------------------------------ADMINISTRADOR-----------------------------------------------------------------------------------
            // ------------------------- PRINCIPAL ---------------------------------------------

            Route::get('/admin', [PrincipalController::class, 'vista_principal_admin'])->name('admin-principal');
            Route::get('/admin', [PrincipalController::class, 'vista_admin'])->name('admin-principal')->middleware('auth');


            // ------------------------- HOME SLIDER ---------------------------------------------
            Route::get('/admin/slider', [PestañaHomeController::class, 'vista_slider_admin'])->name('admin-homeSlider');
            Route::put('/admin/slider/update', [PestañaHomeController::class, 'update_slider_admin'])->name('admin-homeSliderUpdate');

            // ------------------------- CRUD PAPERS ---------------------------------------------
            Route::prefix('admin/papers')->name('papers.')->group(function () {
                Route::get('/', [PaperController::class, 'adminIndex'])->name('index');
                Route::get('/create', [PaperController::class, 'create'])->name('create');
                Route::post('/', [PaperController::class, 'storePaper'])->name('store');
                Route::get('/{paper}/edit', [PaperController::class, 'edit'])->name('edit');
                Route::put('/{paper}', [PaperController::class, 'update'])->name('update');
                Route::delete('/{paper}', [PaperController::class, 'destroy'])->name('destroy');
                Route::get('/buscar', [PaperController::class, 'adminIndex'])->name('search');
            });

            // ------------------------- CRUD SECCION PROYECTOS ---------------------------------------------
            Route::get('/admin/areas_proyectos', [AreaProyectoController::class, 'index'])->name('areas_proyectos_admin');
            Route::post('/admin/areas_proyectos_store', [AreaProyectoController::class, 'store'])->name('areas_proyectos_store');
            Route::put('/admin/areas_proyectos/{area}', [AreaProyectoController::class, 'update'])->name('areas_proyectos_update');
            Route::delete('/admin/areas_proyectos/{area}', [AreaProyectoController::class, 'destroy'])->name('areas_proyectos_destroy');

            // ------------------------- CRUD SLIDERS HISTORIA ---------------------------------------------
            Route::get('/admin/historia-sliders', HistoriaSliderController::class . '@index')->name('h-sliders-panel');

            Route::get('/admin/historia-sliders/create', HistoriaSliderController::class . '@create')->name('h-slider.create');

            Route::post('/admin/historia-sliders', HistoriaSliderController::class . '@store')->name('h-slider.store');

            Route::get('/admin/historia-sliders/{slider}/edit', HistoriaSliderController::class . '@edit')->name('h-slider.edit');

            Route::put('/admin/historia-sliders/{slider}', HistoriaSliderController::class . '@update')->name('h-slider.update');

            Route::delete('/admin/historia-sliders/{slider}', HistoriaSliderController::class . '@destroy')->name('h-slider.destroy');



            // --------------------------- CRUD AREAS Y TOPICOS ----------------------------------------------
            // ---- Areas ---- //
            Route::get('/admin/areas', AreaInvestigacionController::class . '@index')->name('areas-panel');

            Route::post('/admin/areas', AreaInvestigacionController::class . '@store')->name('areas.store');

            Route::get('/admin/areas/{area}/edit', AreaInvestigacionController::class . '@edit')->name('areas.edit');

            Route::put('/admin/areas/{area}', AreaInvestigacionController::class . '@update')->name('areas.update');

            Route::delete('/admin/areas/{area}/destroy', AreaInvestigacionController::class . '@destroy')->name('areas.destroy');

            // ---- Topicos ---- //
            Route::get('/admin/topicos', TopicoController::class . '@index')->name('topic-panel');

            Route::post('/admin/topicos', TopicoController::class . '@store')->name('topics.store');

            Route::get('/admin/topicos/{topico}/edit', TopicoController::class . '@edit')->name('topics.edit');

            Route::put('/admin/topicos/{topico}', TopicoController::class . '@update')->name('topics.update');

            Route::delete('/admin/topicos/{topico}/destroy', TopicoController::class . '@destroy')->name('topics.destroy');

            // ------------------------- CRUD CONTACTO ---------------------------------------------

            Route::get('/admin/contacto', [ContactoController::class, 'showContacts'])->name('contactos');
            Route::post('/admin/contacto', ContactoController::class . '@store')->name('contactos.store');

            // ------------------------- CRUD NOVEDADES ---------------------------------------------
            // ---- NOTICIA ---- //

            Route::get('/admin/noticias', [NoticiaController::class, 'showNoticia'])->name('notici');
            Route::post('/admin/noticias', NoticiaController::class . '@store')->name('notici.store');
            Route::put('/admin/noticias/{id}', [NoticiaController::class, 'update'])->name('notici.update');

            Route::delete('/admin/noticias/{id}', [NoticiaController::class, 'destroy'])->name('notici.destroy');
            Route::get('/admin/noticias/buscar', [NoticiaController::class, 'showNoticia'])->name('notici.buscar');

            // ---- PROYECTO ---- //
            Route::get('/admin/proyectos', [ProyectoController::class, 'showProyecto'])->name('proyect');
            Route::post('/admin/proyectos', ProyectoController::class . '@store')->name('proyect.store');
            Route::get('/admin/proyectos/{id}/edit', [ProyectoController::class, 'edit'])->name('proyect.edit');
            Route::put('/admin/proyectos/{id}', [ProyectoController::class, 'update'])->name('proyect.update');

            Route::delete('/admin/proyectos/{id}', [ProyectoController::class, 'destroy'])->name('proyect.destroy');
            Route::get('/admin/proyectos/buscar', [ProyectoController::class, 'showProyecto'])->name('proyect.buscar');


            // ---- EVENTO ---- //
            Route::get('/admin/eventos', [EventoController::class, 'showEvento'])->name('event');
            Route::post('/admin/eventos', EventoController::class . '@store')->name('event.store');
            Route::get('/admin/eventos/{id}/edit', [EventoController::class, 'edit'])->name('event.edit');
            Route::put('/admin/eventos/{id}', [EventoController::class, 'update'])->name('event.update');

            Route::delete('/admin/eventos/{id}', [EventoController::class, 'destroy'])->name('event.destroy');
            Route::get('/admin/eventos/buscar', [EventoController::class, 'showEvento'])->name('event.buscar');

            // ------------------------- CRUD ORGANIZACION ---------------------------------------------
            // ---- Capital Humano ---- //

            Route::get('/admin/capital_humano', [CapitalHumanoController::class, 'index'])->name('capital_index');




            Route::post('/admin/capitales', [CapitalHumanoController::class, 'store'])->name('capitales.store');
            // Route::get('/admin/capitales/{id}/edit', [CapitalHumanoController::class, 'edit'])->name('capitales.edit');
            Route::put('/admin/capitales/{id}', [CapitalHumanoController::class, 'update'])->name('capitales.update');
            Route::delete('/admin/capitales/{id}', [CapitalHumanoController::class, 'destroy'])->name('capitales.destroy');

            //-------Direccion-------//
            Route::get('/admin/direccion', [DireccionController::class, 'index'])->name('direccion_index');
            Route::post('/admin/direccion', [DireccionController::class, 'store'])->name('direcciones.store');
            Route::put('/admin/direccion/{id}', [DireccionController::class, 'update'])->name('direcciones.update');

            //-------Tutoriales-------//
            Route::prefix('admin/tutoriales')->name('tutorials.')->group(function () {
                Route::get('/', [TutorialesController::class, 'index'])->name('index');
                Route::get('/visualizar', [TutorialesController::class, 'mainIndex'])->name('main');
                Route::get('/create', [TutorialesController::class, 'create'])->name('create');
                Route::post('/', [TutorialesController::class, 'store'])->name('store');
                Route::get('/{tutorial}/edit', [TutorialesController::class, 'edit'])->name('edit');
                Route::put('/{tutorial}', [TutorialesController::class, 'update'])->name('update');
                Route::delete('/{tutorial}', [TutorialesController::class, 'destroy'])->name('destroy');
                Route::get('/tutorial/{id}', [TutorialesController::class, 'show'])->name('show');
            });
        });
    });
});
