<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category/{category:alias}', [HomeController::class, 'showCategory'])->name('showCategory');
Route::get('/release_year/{release_year:year}', [HomeController::class, 'showReleaseYear'])->name('showReleaseYear');
Route::get('/film/{film:alias}', [HomeController::class, 'showFilm'])->name('showFilm');
Route::get('/contacts', [HomeController::class, 'contacts'])->name('contacts');
Route::any('{catchall}', [HomeController::class, 'notFound'])->where('catchall', '.*');