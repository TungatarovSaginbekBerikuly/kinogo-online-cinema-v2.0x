<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Category;
use App\Models\User;
use App\Models\Cadr;
use App\Models\Comment;
use App\Models\ReleaseYear;
use App\Models\Slider;

class AdminController extends Controller
{
    public function index()
    {
        $metrics = [
            ['📦', Film::count(), 'Фильмы'],
            ['🗂️', Category::count(), 'Категорий'],
            ['👥', User::count(), 'Пользователей'],
            ['🎞️', Cadr::count(), 'Кадров'],
            ['💬', Comment::count(), 'Комментарии'],
            ['📅', ReleaseYear::count(), 'Дат выпуска'],
            ['🖼️', Slider::count(), 'Слайдов'],
        ];
        $lastComments = Comment::orderBy('created_at', 'DESC')->take(5)->get();

        return view('admin.dashboard', [
            'metrics' => $metrics,
            'lastComments' => $lastComments
        ]);
    }
}
