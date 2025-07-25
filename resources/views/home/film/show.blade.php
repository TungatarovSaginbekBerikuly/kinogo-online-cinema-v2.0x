@extends('layouts.home_layout')

@section('title', 'Фильм - ' . $film->title . ' kinogo online cinema')

@section('content')
    <!-- Content -->
    <div class="content bg__grey">
        <div class="container__secondary">
            <!-- Bg back Image -->
            <div class="product__show-bg">
                <img src="{{ asset($film->banner) }}">
                <div class="shadow__bg"></div>
            </div>

            <div class="product__show-inner">
                <!-- Images and vk form -->
                <div class="product__show-head">
                    <img src="{{ asset($film->image) }}" class="product__show-image">

                    <!-- Product Cadrs -->
                    <div class="product-cadrs">
                        <div class="cadrs-wrap">
                            <p class="cadrs-title">Кадры из фильма:</p>
                            <div class="cadrs-inner">
                                @foreach ($film->cadrs as $cadr)
                                    <div class="cadrs-box">
                                        <div class="cadrs-modal">
                                            <img src="{{ asset($cadr->image) }}" class="cadrs-modal-image">
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <button class="btn__primary">Добавить в закладки</button>
                        </div>
                    </div>
                </div>

                <!-- Info about films -->
                <div class="product__show-content">
                    <!-- Movie title and rating -->
                    <div class="product__nav">
                        <h1 class="product__title">{{ $film->title }}</h1>
                        <div class="product__rating">
                            <ul class="product__star">
                                <li class="product__star-active">
                                    <i class="fa-solid fa-star"></i>
                                </li>
                                <li class="product__star-active">
                                    <i class="fa-solid fa-star"></i>
                                </li>
                                <li class="product__star-active">
                                    <i class="fa-solid fa-star"></i>
                                </li>
                                <li class="product__star-active">
                                    <i class="fa-solid fa-star"></i>
                                </li>
                                <li>
                                    <i class="fa-solid fa-star"></i>
                                </li>
                            </ul>
                            <p class="product__star-count">(84)</p>
                        </div>
                    </div>


                    <div class="product-tabs">
                        <div class="product-tabs-wrap">
                            <div class="product-tabs-btn active" data="1">Подробнее</div>
                            <div class="product-tabs-btn" data="2">Кадры</div>
                            <div class="product-tabs-btn" data="3">Рекомендуем</div>
                        </div>
                        <div class="product-tabs-body" data="1">
                            <!-- Categories Types ... Information -->
                            <div class="product__info">
                                <ul class="product__info-item">
                                    <li>
                                        Режжисер: {{ $film->director }}
                                    </li>
                                    <li>
                                        Год выпуска: <a href="{{ route('showReleaseYear', $film->releaseYear->year) }}"
                                            class="link__primary">
                                            {{ $film->releaseYear->year }}
                                        </a>
                                    </li>
                                    <li>
                                        Жанр:
                                        @foreach ($film->categories as $category)
                                            <a href="{{ route('showCategory', $category->alias) }}" class="link__primary">
                                                {{ $category->title }}
                                            </a>
                                        @endforeach
                                    </li>
                                </ul>

                                <ul class="product__info-item">
                                    <li>Длительность: {{ $film->duration }} минут</li>
                                    <li>Перевод: {{ $film->translator }}</li>
                                </ul>
                            </div>
                            <h2 class="product-secondary-title">О фильме</h2>
                            <!-- Description -->
                            <p class="product__desc">
                                {{ $film->description }}
                            </p>
                        </div>
                        <div class="product-tabs-body" data="2">
                            <div class="product-tabs-cadrs">
                                @foreach ($film->cadrs as $cadr)
                                    <div class="cadrs-box">
                                        <div class="cadrs-modal">
                                            <img src="{{ asset($cadr->image) }}" class="cadrs-modal-image">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="product-tabs-body" data="3">
                            <h2 class="product-secondary-title">Рекомендуем посмотреть</h2>
                            <div class="product-tabs-recommendation">
                                @foreach ($recommendations->take(6) as $recommendation)
                                    <div class="movie__card">
                                        <a href="{{ route('showFilm', $recommendation->alias) }}" class="movie__card-img">
                                            <img src="{{ asset($recommendation->image) }}">
                                        </a>

                                        <a href="{{ route('showFilm', $recommendation->alias) }}"
                                            class="movie__card-title">{{ $recommendation->title }}</a>

                                        <ul class="movie__card-categories">
                                            @foreach ($recommendation->categories->take(2) as $category)
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

                    <!-- Share -->
                    <div class="product__share">
                        <p>Поделиться с друзями</p>
                        <ul class="product__share-list">
                            <li>
                                <a class="facebook" href=""><i class="fa-brands fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a class="twitter" href=""><i class="fa-brands fa-twitter"></i></a>
                            </li>
                            <li>
                                <a class="vk" href=""><i class="fa-brands fa-vk"></i></a>
                            </li>
                            <li>
                                <a class="odnoklassniki" href=""><i class="fa-brands fa-odnoklassniki"></i></a>
                            </li>
                            <li>
                                <a class="tiktok" href=""><i class="fa-brands fa-tiktok"></i></a>
                            </li>
                        </ul>
                    </div>

                    <div class="product__player"></div>

                </div>
            </div>

            <!-- Recommendation Films -->
            <div class="blog__recommendation">
                <div class="content__title">
                    <div class="content__title-info">
                        <p class="content__title-txt">Рекомендуем посмотреть</p>
                        <i class="fa-solid fa-fire"></i>
                    </div>
                </div>

                <div class="recommendation__products">
                    @foreach ($recommendations->take(4) as $recommendation)
                        <div class="movie__card">
                            <a href="{{ route('showFilm', $recommendation->alias) }}" class="movie__card-img">
                                <img src="{{ asset($recommendation->image) }}">
                            </a>

                            <a href="{{ route('showFilm', $recommendation->alias) }}" class="movie__card-title">Человек
                                Паук Вдали От ...</a>

                            <ul class="movie__card-categories">
                                @foreach ($recommendation->categories->take(2) as $category)
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

            <!-- Comments -->
            <div class="blog__comments">
                <div class="content__title">
                    <div class="content__title-info">
                        <p class="content__title-txt">Комментарии к фильму</p>
                        <i class="fa-solid fa-comment"></i>
                    </div>
                </div>

                @auth
                    <form action="{{ route('comments.store') }}" method="POST" class="add__comment">
                        @csrf

                        <input type="hidden" name="film_id" value="{{ $film->id }}">

                        <textarea name="message" class="add__comment-input">{{ old('message') }}</textarea>

                        {{-- Показ ошибки под полем --}}
                        @error('message')
                            <div class="txt-primary" style="color:red;">{{ $message }}</div>
                        @enderror

                        <button type="submit" class="btn__primary btn__bg-blue">Отправить</button>
                    </form>
                @else
                    <p class="txt-primary">Для добавления комментария зарегистрируйтесь на сайте.</p>
                @endauth


                <!-- All comments -->
                <div class="comments">
                    @foreach ($comments as $comment)
                        @php
                            $userVote = $comment->userVote($userId)->first();
                            $isLiked = $userVote && $userVote->is_like;
                            $isDisliked = $userVote && !$userVote->is_like;
                        @endphp

                        <div class="comment-item">
                            <div class="comment__head">
                                @if ($comment->user->image)
                                    <div class="comment__img">
                                        <img src="{{ asset('storage/' . $comment->user->image) }}" alt="Аватар"
                                            style="height: 75px">
                                    </div>
                                @else
                                    <div class="comment__img"></div>
                                @endif

                                <div class="comment__status">
                                    <form method="POST" action="{{ route('comments.like', $comment->id) }}">
                                        @csrf
                                        <button class="comment__likes {{ $isLiked ? 'active' : '' }}">
                                            <span class="plus__icon">+</span>{{ $comment->likes->count() }}
                                        </button>
                                    </form>

                                    <form method="POST" action="{{ route('comments.dislike', $comment->id) }}">
                                        @csrf
                                        <button class="comment__dislikes {{ $isDisliked ? 'active' : '' }}">
                                            <span class="minus__icon">-</span>{{ $comment->dislikes->count() }}
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <div class="comment__body">
                                <div class="comment__body-nav">
                                    <p class="comment__user-name">{{ $comment->user->name }}</p>
                                    <div class="comment__user-date">
                                        {{ \Carbon\Carbon::parse($comment->created_at)->format('d.m.Y') }}
                                    </div>
                                </div>
                                <p class="comment__txt">{{ $comment->message }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
