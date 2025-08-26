<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaperController;


Route::prefix('biblioteca/papers')->group(function () {
    Route::get('/all', [PaperController::class, 'getAll']);
});