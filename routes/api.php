<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaperController;
use App\Http\Controllers\PatenteController;


Route::prefix('biblioteca/papers')->group(function () {
    Route::get('/all', [PaperController::class, 'getAll']);
});


Route::prefix('biblioteca/patentes')->group(function () {
    Route::get('/all', [PatenteController::class, 'getAll']);
});