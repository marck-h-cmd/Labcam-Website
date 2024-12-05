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
