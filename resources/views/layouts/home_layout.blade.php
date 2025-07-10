<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Style Css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="container">

            <div class="header__inner">

                <!-- Burger && Logo -->
                <div class="header__item">
                    <!-- Burger -->
                    <div class="header__burger">
                        <span></span>
                    </div>

                    <!-- Logo -->
                    <a href="{{ route('home') }}" class="header__logo">Kinogo</a>

                    <!-- Mobile Search Btn -->
                    <a href="" class="header__icon header__icon_mobile">
                        <i class="fa-solid fa-search"></i>
                    </a>
                </div>

                <!-- Search Form -->
                <form class="header__search" action="{{ route('search') }}" method="GET">
                    <input type="text" name="s" class="header__search-input"
                        placeholder="Пираты Карибского моря 2">
                    <button class="header__search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>

                <!-- Icons && User -->
                <div class="header__navs">
                    @auth
                        <!-- Icons -->
                        <div class="header__icons">
                            <a href="" class="header__icon">
                                <i class="fa-solid fa-download"></i>
                            </a>
                            <a href="" class="header__icon">
                                <i class="fa-solid fa-bell"></i>
                            </a>
                        </div>

                        <!-- User -->
                        <a href="{{ route('logout') }}" class="header__user">
                            <img src="{{ asset('images/default-user.png') }}" alt="">
                        </a>
                    @else
                        <!-- User -->
                        <a href="{{ route('login') }}" class="header__user">
                            <img src="{{ asset('images/default-user.png') }}" alt="">
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile Menu -->
    <div class="mobile__menu">
        <div class="mobile__menu-container">

            <ul class="mobile__menu-list">
                <li>
                    <a href="{{ route('home') }}" class="mobile__menu-link">Главная</a>
                </li>
                <li>
                    <a href="#" class="mobile__menu-link">Новинки</a>
                </li>
                <li>
                    <a href="#" class="mobile__menu-link">Стол заказов</a>
                </li>
                <li>
                    <a href="#" class="mobile__menu-link">Помощь</a>
                </li>
                <li>
                    <a href="{{ route('contacts') }}" class="mobile__menu-link">Контакты</a>
                </li>
                @auth
                    <li>
                        <a href="#" class="mobile__menu-link">Профиль</a>
                    </li>
                @else
                <br>
                <li>
                    <a href="{{ route('login') }}" class="mobile__menu-link">Вход</a>
                </li> 
                <li>
                    <a href="{{ route('register') }}" class="mobile__menu-link">Регистрация</a>
                </li> 
                @endauth
            </ul>

        </div>
    </div>

    @yield('content')

    <!-- Footer -->
    <footer class="footer">
        <div class="footer__inner">
            <nav class="footer__navs">
                <div class="footer-item">
                    <!-- Footer Menu -->
                    <h1 class="footer__title">Основные разделы</h1>

                    <ul class="footer__menu">
                        <li>
                            <a href="{{ route('home') }}" class="footer__menu-link">Главная</a>
                        </li>
                        <li>
                            <a href="#" class="footer__menu-link">Новинки</a>
                        </li>
                        <li>
                            <a href="#" class="footer__menu-link">Стол заказов</a>
                        </li>
                        <li>
                            <a href="#" class="footer__menu-link">Помощь</a>
                        </li>
                        <li>
                            <a href="{{ route('contacts') }}" class="footer__menu-link">Контакты</a>
                        </li>
                    </ul>
                </div>

                <!-- Footer Last Comments -->
                <div class="last__comments">
                    <h1 class="footer__title">Последние коментарии</h1>
                    @foreach ($comments->sortByDesc('created_at')->take(2) as $comment)
                        <div class="last__comment">
                            <a href="{{ route('showFilm', $comment->film->alias) }}" class="last__comment-img">
                                <img src="{{ asset($comment->film->image) }}">
                            </a>
                            <div class="last__comment-navs">
                                <div class="last__comment-info">
                                    <a href="{{ route('showFilm', $comment->film->alias) }}"
                                        class="last__comment-title">{{ $comment->film->title }}</a>
                                    <div class="last__comment-time">{{ $comment->created_at }}</div>
                                </div>
                                <p class="last__comment-name">{{ $comment->user->name }}</p>
                                <p class="last__comment-txt">
                                    {{ \Illuminate\Support\Str::limit($comment->message, 75) }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="footer-item">
                    <!-- Footer Contacts -->
                    <div class="footer__contacts">
                        <h1 class="footer__title">Следите за нами</h1>

                        <ul class="footer__contact-list">
                            <li>
                                <a href="#" class="footer__list-link">
                                    <i class="fa-brands fa-tiktok"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="footer__list-link">
                                    <i class="fa-brands fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="footer__list-link">
                                    <i class="fa-brands fa-telegram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="footer__list-link">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Footer Logo -->
                    <a href="{{ route('home') }}" class="footer__logo">
                        <div class="footer__logo-head">Kinogo</div>
                        <div class="footer__logo-content">Online cinema</div>
                    </a>
                </div>
            </nav>
        </div>
        <a href="{{ route('home') }}" class="footer__copyright">
            <div class="footer__inner">
                @ 2025 KINOGO Cinema. All Rights Reserved
            </div>
        </a>
    </footer>

    <!-- JQuery -->
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <!-- Slider Slick Js -->
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <!-- Header Js -->
    <script src="{{ asset('js/header.js') }}"></script>
    <!-- Slider Js -->
    <script src="{{ asset('js/slider.js') }}"></script>
    <!-- Selectbox Js -->
    <script src="{{ asset('js/selectbox.js') }}"></script>
    <!-- Cards JS -->
    <script src="{{ asset('js/cards.js') }}"></script>
    <!-- Product tabs -->
    <script src="{{ asset('js/product-tabs.js') }}"></script>
</body>

</html>
