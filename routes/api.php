<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaperController;


Route::prefix('biblioteca/papers')->group(function () {
    Route::get('/search', [PaperController::class, 'search']);

    Route::get('/fetch-more', [PaperController::class, 'fetchMorePapers']);
});