<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaperController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('biblioteca/papers')->group(function () {
    Route::get('/search', [PaperController::class, 'search']);

    Route::get('/fetch-more', [PaperController::class, 'fetchMorePapers']);
});