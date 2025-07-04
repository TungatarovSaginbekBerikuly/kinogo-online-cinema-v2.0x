<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category/{category:alias}', [HomeController::class, 'showCategory'])->name('showCategory');
Route::get('/release_year/{release_year:year}', [HomeController::class, 'showReleaseYear'])->name('showReleaseYear');