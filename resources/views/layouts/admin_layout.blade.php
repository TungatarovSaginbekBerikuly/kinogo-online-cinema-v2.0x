<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geologica:wght@100..900&display=swap" rel="stylesheet">
    <!-- Core dark theme styles -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>
    <!-- Mobile header -->
    <header class="navbar navbar-dark navbar-custom sticky-top d-lg-none">
        <div class="container-fluid">
            <button class="btn btn-outline-accent" id="sidebarToggle">☰</button>
            <span class="navbar-brand">Админ-панель</span>
        </div>
    </header>

    <!-- Sidebar -->
    <nav id="sidebar" class="sidebar position-fixed top-0 start-0 d-flex flex-column p-3">
        <!-- Close button visible on mobile -->
        <button id="sidebarClose" class="btn btn-outline-accent btn-sm d-lg-none">✖</button>

        <a href="#"
            class="d-flex align-items-center mb-4 text-decoration-none text-light fs-5 fw-semibold">Админ-панель</a>

        <ul class="nav nav-pills flex-column gap-1">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                    <span class="emoji">🏠</span>Главная
                </a>
            </li>
            <li>
                <a class="nav-link" data-bs-toggle="collapse" href="#productsMenu" role="button">
                    <span class="emoji">🎦</span>Фильмы
                    <span class="ms-auto">➕</span>
                </a>
                <div class="collapse" id="productsMenu">
                    <a href="#" class="nav-link">📃 Все фильмы</a>
                    <a href="#" class="nav-link">➕ Добавить фильм</a>
                </div>
            </li>
            <li>
                <a class="nav-link" data-bs-toggle="collapse" href="#categoriesMenu" role="button">
                    <span class="emoji">🗂️</span>Категории
                    <span class="ms-auto">➕</span>
                </a>
                <div class="collapse" id="categoriesMenu">
                    <a href="#" class="nav-link">📃 Все категории</a>
                    <a href="#" class="nav-link">➕ Добавить категорию</a>
                </div>
            </li>
            <li>
                <a class="nav-link" data-bs-toggle="collapse" href="#datesMenu" role="button">
                    <span class="emoji">📅</span>Даты выпуска
                    <span class="ms-auto">➕</span>
                </a>
                <div class="collapse" id="datesMenu">
                    <a href="#" class="nav-link">📃 Все даты</a>
                    <a href="#" class="nav-link">➕ Добавить дату</a>
                </div>
            </li>
            <li>
                <a class="nav-link" data-bs-toggle="collapse" href="#cadrsMenu" role="button">
                    <span class="emoji">🎞️</span>Кадры
                    <span class="ms-auto">➕</span>
                </a>
                <div class="collapse" id="cadrsMenu">
                    <a href="#" class="nav-link">📃 Все кадры</a>
                    <a href="#" class="nav-link">➕ Добавить кадр</a>
                </div>
            </li>
            <li>
                <a class="nav-link" data-bs-toggle="collapse" href="#slidesMenu" role="button">
                    <span class="emoji">🖼️</span>Слайды
                    <span class="ms-auto">➕</span>
                </a>
                <div class="collapse" id="slidesMenu">
                    <a href="#" class="nav-link">📃 Все слайды</a>
                    <a href="#" class="nav-link">➕ Добавить слайд</a>
                </div>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <span class="emoji">👥</span>Пользователи
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <span class="emoji">💬</span>Комментарии
                </a>
            </li>
        </ul>
        <hr class="my-4" style="border-color:var(--border)">
        <div class="mt-auto d-flex flex-column gap-2 text-secondary small">
            @auth
                {{Auth::user()->name }}  
            @endauth
            <a href="{{ route('home') }}" class="btn btn-outline-accent btn-sm w-100">🚪 Выйти</a>
        </div>
    </nav>
    
    <!-- Main content -->
    <div class="content-wrapper">
        <main class="container-fluid py-4 px-4 px-lg-5">
            @yield('content')

            <footer class="text-end text-secondary small pt-3">
                © 2025 Admin Panel by 
                <a href="https://github.com/TungatarovSaginbekBerikuly">Tungatarov Saginbek</a>
            </footer>
        </main>
    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
    <script>
        const sidebar = document.getElementById('sidebar');
        document.getElementById('sidebarToggle')?.addEventListener('click', () => sidebar.classList.toggle('show'));
        document.getElementById('sidebarClose')?.addEventListener('click', () => sidebar.classList.remove('show'));
    </script>
</body>
</html>
