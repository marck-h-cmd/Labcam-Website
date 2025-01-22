<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaperController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('/biblioteca/search', [PaperController::class, 'search']);

Route::get('/biblioteca/fetch-more', [PaperController::class, 'fetchMorePapers']);