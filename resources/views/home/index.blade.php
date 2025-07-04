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

                <ul class="category__menu">
                    <li>
                        <a href="{{ route('home') }}" class="category__link active">Все</a>
                    </li>
                    @foreach ($categories as $category)
                        <li>
                            <a href="#" class="category__link">{{ $category->title }}</a>
                        </li>
                    @endforeach
                    
                </ul>
            </div>

            <!-- Movies -->
            <div class="content__movie">
                <div class="content__movie-header">
                    <div class="selectbox-wrap">
                        <div class="selectbox">
                            <p class="selectbox-desc">Сортировка</p>
                            <div class="selectbox-btn" data-selectbox="1">
                                Рекомендуемые
                                <span></span>
                            </div>
                            <ul data-selectbox="1" class="selectbox-body">
                                <li>
                                    <a href="#" class="selectbox-link">Рекомендуемые</a>
                                </li>
                                <li>
                                    <a href="#" class="selectbox-link">Популярные</a>
                                </li>
                                <li>
                                    <a href="#" class="selectbox-link">По дате</a>
                                </li>
                                <li>
                                    <a href="#" class="selectbox-link">Топ - 100</a>
                                </li>
                                <li>
                                    <a href="#" class="selectbox-link">Рекомендуемые</a>
                                </li>
                                <li>
                                    <a href="#" class="selectbox-link">Популярные</a>
                                </li>
                                <li>
                                    <a href="#" class="selectbox-link">По дате</a>
                                </li>
                                <li>
                                    <a href="#" class="selectbox-link">Топ - 100</a>
                                </li>
                                <li>
                                    <a href="#" class="selectbox-link">Рекомендуемые</a>
                                </li>
                                <li>
                                    <a href="#" class="selectbox-link">Популярные</a>
                                </li>
                                <li>
                                    <a href="#" class="selectbox-link">По дате</a>
                                </li>
                                <li>
                                    <a href="#" class="selectbox-link">Топ - 100</a>
                                </li>
                                <li>
                                    <a href="#" class="selectbox-link">Рекомендуемые</a>
                                </li>
                                <li>
                                    <a href="#" class="selectbox-link">Популярные</a>
                                </li>
                                <li>
                                    <a href="#" class="selectbox-link">По дате</a>
                                </li>
                                <li>
                                    <a href="#" class="selectbox-link">Топ - 100</a>
                                </li>
                                <li>
                                    <a href="#" class="selectbox-link">Рекомендуемые</a>
                                </li>
                                <li>
                                    <a href="#" class="selectbox-link">Популярные</a>
                                </li>
                                <li>
                                    <a href="#" class="selectbox-link">По дате</a>
                                </li>
                                <li>
                                    <a href="#" class="selectbox-link">Топ - 100</a>
                                </li>
                            </ul>
                        </div>

                        <div class="selectbox">
                            <p class="selectbox-desc">По жанру:</p>
                            <div class="selectbox-btn" data-selectbox="2">
                                Боевики
                                <span></span>
                            </div>
                            <ul data-selectbox="2" class="selectbox-body">
                                <li>
                                    <a href="#" class="selectbox-link">Боевики</a>
                                </li>
                                <li>
                                    <a href="#" class="selectbox-link">Приключения</a>
                                </li>
                                <li>
                                    <a href="#" class="selectbox-link">Детективы</a>
                                </li>
                                <li>
                                    <a href="#" class="selectbox-link">Фантастика</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Movie Cards -->
                <div class="content__movie-body">
                    @foreach ($films as $film)
                        <div class="movie__card">
                            <a href="#" class="movie__card-img">
                                <img src="{{ $film->image }}">
                            </a>

                            <a href="#" class="movie__card-title">
                                {{ $film->title }}
                            </a>

                            <ul class="movie__card-categories">
                                @foreach ($film->categories->take(2) as $category)
                                    <li>
                                        <a href="#" class="movie__card-category-link">{{ $category->title }}</a>
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
