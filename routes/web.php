<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('usuario.index');
});

Route::get('/nosotros/about', function () {
    return view('usuario.nosotros.about');
});


Route::get('/nosotros/biblioteca', function () {
    return view('usuario.nosotros.biblioteca');
});

Route::get('/nosotros/historia', function () {
    return view('usuario.nosotros.historia');
});

Route::get('/nosotros/paper', function () {
    return view('usuario.nosotros.paper');
});
