<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Category;
use App\Models\Slider;

class HomeController extends Controller
{
    public function index()
    {
        $films = Film::where('is_recommended', true)->limit(10)->get();
        $categories = Category::orderBy('id', 'asc')->get();
        $sliders = Slider::all();

        return view('home.index', [
            'films' => $films,
            'categories' => $categories,
            'sliders' => $sliders
        ]);
    }
}
