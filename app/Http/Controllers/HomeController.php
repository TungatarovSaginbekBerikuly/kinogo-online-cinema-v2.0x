<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Category;
use App\Models\Slider;
use App\Models\ReleaseYear;
use App\Models\User;
use Illuminate\Support\Str;

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

    public function showCategory(Category $category)
    {
        $films = $category->films()->paginate(10);
        $category = Category::where('alias', $category->alias)->firstOrFail();

        return view('home.category.show', [
            'category' => $category,
            'films' => $films
        ]);
    }

    public function showReleaseYear(ReleaseYear $release_year)
    {
        $films = $release_year->films()->paginate(10);
        $release_year = ReleaseYear::where('year', $release_year->year)->firstOrFail();

        return view('home.release_year.show', [
            'release_year' => $release_year,
            'films' => $films
        ]);
    }

    public function showFilm(Film $film)
    {
        $recommendations = Film::where('is_recommended', true)->limit(6)->get();
        $film = Film::where('alias', $film->alias)->firstOrFail();

        return view('home.film.show', [
            'film' => $film,
            'recommendations' => $recommendations
        ]);
    }

    public function contacts()
    {
        return view('home.contacts');
    }

    public function notFound()
    {
        return view('errors.404');
    }

    public function search(Request $request)
    {
        $s = $request->s;
        $films = Film::where('title', 'LIKE', "%$s%")
                ->orderBy('title')->paginate(10);

        return view('home.search', [
            'films' => $films,
            's' => $s
        ]);
    }
}