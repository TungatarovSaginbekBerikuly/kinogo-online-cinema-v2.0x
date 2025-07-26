<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category/{category:alias}', [HomeController::class, 'showCategory'])->name('showCategory');
Route::get('/release_year/{release_year:year}', [HomeController::class, 'showReleaseYear'])->name('showReleaseYear');
Route::get('/film/{film:alias}', [HomeController::class, 'showFilm'])->name('showFilm');
Route::get('/contacts', [HomeController::class, 'contacts'])->name('contacts');
Route::get('/search', [HomeController::class, 'search'])->name('search');

// Группа маршрутов только для гостей (неавторизованных)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('loginPost');

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('registerPost');
});

// Группа маршрутов только для авторизованных
Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/profile', [AuthController::class, 'profile'])->name('user-profile');
    Route::post('/profile/update-image', [AuthController::class, 'updateImage'])->name('update-image');

    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

    Route::post('/comments/{comment}/like', [CommentController::class, 'like'])->name('comments.like');
    Route::post('/comments/{comment}/dislike', [CommentController::class, 'dislike'])->name('comments.dislike');
    Route::delete('/comments/{comment}/undo', [CommentController::class, 'undo'])->name('comments.undo');

});

Route::view('/soon', 'soon')->name('soon');

Route::fallback([HomeController::class, 'notFound']);