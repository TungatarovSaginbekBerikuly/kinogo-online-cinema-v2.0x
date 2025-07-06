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

                                    <a href="{{ route('showFilm', $recommendation->alias) }}" class="movie__card-title">{{ $recommendation->title }}</a>

                                    <ul class="movie__card-categories">
                                        @foreach ($recommendation->categories->take(2) as $category)
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

                            <a href="{{ route('showFilm', $recommendation->alias) }}" class="movie__card-title">Человек Паук Вдали От ...</a>

                            <ul class="movie__card-categories">
                                @foreach ($recommendation->categories->take(2) as $category)
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

            <!-- Comments -->
            <div class="blog__comments">
                <div class="content__title">
                    <div class="content__title-info">
                        <p class="content__title-txt">Комментарии к фильму</p>
                        <i class="fa-solid fa-comment"></i>
                    </div>
                </div>

                <!-- Add comment -->
                <form action="#" class="add__comment">
                    <textarea type="text" class="add__comment-input"></textarea>
                    <button class="btn__primary btn__bg-blue">Отправить</button>
                </form>

                <!-- All comments -->
                <div class="comments">
                    <div class="comment-item">
                        <div class="comment__head">
                            <div class="comment__img"></div>
                            <div class="comment__status">
                                <button class="comment__dislikes"><span class="minus__icon">-</span>2</button>
                                <button class="comment__likes"><span class="plus__icon">+</span>8</button>
                            </div>
                        </div>
                        <div class="comment__body">
                            <div class="comment__body-nav">
                                <p class="comment__user-name">Elena</p>
                                <div class="comment__user-date">5 октября 2024 / 20:47</div>
                            </div>
                            <p class="comment__txt">
                                Смотрели эту часть в кино. Я не чуть не огорчена от предыдущих не
                                отстает! Всего в меру. Дети (три и пять лет) посмотрели полностью
                                без отрыва. В мультике очаровательные свинки обворожительный
                                брат Грю, Мамочка Люси!
                            </p>
                        </div>
                    </div>
                    <div class="comment-item">
                        <div class="comment__head">
                            <div class="comment__img"></div>
                            <div class="comment__status">
                                <button class="comment__dislikes"><span class="minus__icon">-</span>2</button>
                                <button class="comment__likes"><span class="plus__icon">+</span>8</button>
                            </div>
                        </div>
                        <div class="comment__body">
                            <div class="comment__body-nav">
                                <p class="comment__user-name">Elena</p>
                                <div class="comment__user-date">5 октября 2024 / 20:47</div>
                            </div>
                            <p class="comment__txt">
                                Смотрели эту часть в кино. Я не чуть не огорчена от предыдущих не
                                отстает! Всего в меру. Дети (три и пять лет) посмотрели полностью
                                без отрыва. В мультике очаровательные свинки обворожительный
                                брат Грю, Мамочка Люси!

                                Смотрели эту часть в кино. Я не чуть не огорчена от предыдущих не
                                отстает! Всего в меру. Дети (три и пять лет) посмотрели полностью
                                без отрыва. В мультике очаровательные свинки обворожительный
                                брат Грю, Мамочка Люси!
                            </p>
                        </div>
                    </div>
                    <div class="comment-item">
                        <div class="comment__head">
                            <div class="comment__img"></div>
                            <div class="comment__status">
                                <button class="comment__dislikes"><span class="minus__icon">-</span>2</button>
                                <button class="comment__likes"><span class="plus__icon">+</span>8</button>
                            </div>
                        </div>
                        <div class="comment__body">
                            <div class="comment__body-nav">
                                <p class="comment__user-name">Elena</p>
                                <div class="comment__user-date">5 октября 2024 / 20:47</div>
                            </div>
                            <p class="comment__txt">
                                Смотрели эту часть в кино. Я не чуть не огорчена от предыдущих не
                                отстает! Всего в меру. Дети (три и пять лет) посмотрели полностью
                                без отрыва. В мультике очаровательные свинки обворожительный
                                брат Грю, Мамочка Люси!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
