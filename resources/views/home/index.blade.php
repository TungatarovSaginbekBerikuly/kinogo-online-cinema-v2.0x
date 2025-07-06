@extends('layouts.home_layout')

@section('title', 'Kinogo online cinema')

@section('content')
    <!-- Slider -->
    <div class="slider">
        @foreach ($sliders as $slider)
            <div class="slider__item">
                <img src="{{ $slider->image }}">
                <div class="slider__components">
                    <a href="#" class="slider__btn">
                        <i class="fa-solid fa-play"></i>
                    </a>
                    <div href="#" class="slider__navs">
                        <a href="#" class="slider__link">{{ $slider->film->title }}</a>
                    </div>
                </div>
        </div>
        @endforeach
    </div>

    <!-- Content -->
    <div class="content">
        <div class="content__inner">

            <!-- Categories && Soon movie Card -->
            <div class="content__item mobile__filter">

                <div class="content__title">
                    <div class="content__title-info">
                        <p class="content__title-txt">Выбор жанра</p>
                        <i class="fa-solid fa-list-ul"></i>
                    </div>
                </div>

                @include('partials.category-menu', ['categories' => $categories])
            </div>

            <!-- Movies -->
            <div class="content__movie">
                <div class="content__movie-header">
                    @include('partials.order-by')
                </div>

                <!-- Movie Cards -->
                <div class="content__movie-body">
                    @foreach ($films as $film)
                        <div class="movie__card">
                            <a href="{{ route('showFilm', $film->alias) }}" class="movie__card-img">
                                <img src="{{ $film->image }}">
                            </a>

                            <a href="{{ route('showFilm', $film->alias) }}" class="movie__card-title">
                                {{ $film->title }}
                            </a>

                            <ul class="movie__card-categories">
                                @foreach ($film->categories->take(2) as $category)
                                    <li>
                                        <a href="{{ route('showCategory', $category->alias) }}" class="movie__card-category-link">
                                            {{ $category->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                            <ul class="movie__card-rating">
                                <li>
                                    <i class="fa-solid fa-star"></i>
                                </li>
                                <li>
                                    <i class="fa-solid fa-star"></i>
                                </li>
                                <li>
                                    <i class="fa-solid fa-star"></i>
                                </li>
                                <li>
                                    <i class="fa-solid fa-star"></i>
                                </li>
                                <li>
                                    <i class="fa-solid fa-star dis-star"></i>
                                </li>
                            </ul>

                            <div class="movie__card-navs">
                                <div class="movie__card-btn">HD</div>
                                <div class="movie__card-btn">Дубляж</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <br><br>
    </div>
@endsection
