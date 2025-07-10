<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category/{category:alias}', [HomeController::class, 'showCategory'])->name('showCategory');
Route::get('/release_year/{release_year:year}', [HomeController::class, 'showReleaseYear'])->name('showReleaseYear');
Route::get('/film/{film:alias}', [HomeController::class, 'showFilm'])->name('showFilm');
Route::get('/contacts', [HomeController::class, 'contacts'])->name('contacts');
Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('loginPost');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('registerPost');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::any('{catchall}', [HomeController::class, 'notFound'])->where('catchall', '.*');