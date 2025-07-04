@extends('layouts.home_layout')

@section('title', 'Год выпуска - ' . $release_year->year)

@section('content')
    <!-- Responses -->
    <div class="response__box">
        <div class="response__inner">
            <h1 class="response__title">Год выпуска: {{ $release_year->year }}</h1>
            <p class="response__txt">Найдено {{ $release_year->films->count() }} фильмов.</p>
        </div>
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

                    <div class="selectbox-wrap">
                        <div class="selectbox">
                            <p class="selectbox-desc">Сортировка по:</p>
                            <div class="selectbox-btn" data-selectbox="1">
                                Рекомендуемые
                                <span></span>
                            </div>
                            <ul data-selectbox="1" class="selectbox-body">
                                <li>
                                    <a href="{{ route('home') }}" class="selectbox-link">Рекомендуемые</a>
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
                            <p class="selectbox-desc">По году выпуска:</p>
                            <div class="selectbox-btn" data-selectbox="2">
                                {{ $release_year->year }}
                                <span></span>
                            </div>
                            <ul data-selectbox="2" class="selectbox-body">
                                @foreach ($release_years as $release_year)
                                <li>
                                    <a href="{{ route('showReleaseYear', $release_year->year) }}"
                                        class="selectbox-link">
                                        {{ $release_year->year }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>

                <!-- Movie Cards -->
                <div class="content__movie-body">
                    @foreach ($films as $film)
                        <div class="movie__card">
                            <a href="#" class="movie__card-img">
                                <img src="{{ asset($film->image) }}">
                            </a>

                            <a href="#" class="movie__card-title">
                                {{ $film->title }}
                            </a>

                            <ul class="movie__card-categories">
                                @foreach ($film->categories->take(2) as $category)
                                    <li>
                                        <a href="{{ route('showCategory', $category->alias) }}"
                                            class="movie__card-category-link">
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

        <!-- Pagination -->
        @if ($films->hasPages())
            <ul class="pagination">

                {{-- ← prev --}}
                <li class="page-item {{ $films->onFirstPage() ? 'disabled' : '' }}">
                    @if ($films->onFirstPage())
                        <span class="page-link"><i class="fa-solid fa-angle-left"></i></span>
                    @else
                        <a href="{{ $films->previousPageUrl() }}" class="page-link">
                            <i class="fa-solid fa-angle-left"></i>
                        </a>
                    @endif
                </li>

                @php
                    $current = $films->currentPage();
                    $last = $films->lastPage();
                @endphp

                {{-- начало диапазона --}}
                @if ($current <= 2)
                    {{-- 1, 2 --}}
                    @for ($i = 1; $i <= min(2, $last); $i++)
                        <li class="page-item {{ $current == $i ? 'active' : '' }}">
                            <a href="{{ $films->url($i) }}" class="page-link">{{ $i }}</a>
                        </li>
                    @endfor
                    {{-- …, если страниц больше двух --}}
                    @if ($last > 2)
                        <li class="page-item disabled"><span class="page-link">…</span></li>
                    @endif

                    {{-- конец диапазона --}}
                @elseif ($current >= $last - 1)
                    {{-- … --}}
                    <li class="page-item disabled"><span class="page-link">…</span></li>
                    {{-- last-1, last --}}
                    @for ($i = max(1, $last - 1); $i <= $last; $i++)
                        <li class="page-item {{ $current == $i ? 'active' : '' }}">
                            <a href="{{ $films->url($i) }}" class="page-link">{{ $i }}</a>
                        </li>
                    @endfor

                    {{-- середина --}}
                @else
                    {{-- … --}}
                    <li class="page-item disabled"><span class="page-link">…</span></li>
                    {{-- current-1, current, current+1 --}}
                    @for ($i = $current - 1; $i <= $current + 1; $i++)
                        <li class="page-item {{ $current == $i ? 'active' : '' }}">
                            <a href="{{ $films->url($i) }}" class="page-link">{{ $i }}</a>
                        </li>
                    @endfor
                    {{-- … --}}
                    <li class="page-item disabled"><span class="page-link">…</span></li>
                @endif

                {{-- → next --}}
                <li class="page-item {{ $films->hasMorePages() ? '' : 'disabled' }}">
                    @if ($films->hasMorePages())
                        <a href="{{ $films->nextPageUrl() }}" class="page-link">
                            <i class="fa-solid fa-angle-right"></i>
                        </a>
                    @else
                        <span class="page-link"><i class="fa-solid fa-angle-right"></i></span>
                    @endif
                </li>
            </ul>
        @else
            <br><br>
        @endif
    </div>
@endsection
