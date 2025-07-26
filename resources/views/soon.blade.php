@extends('layouts.home_layout')

@section('title', '404 Ошибка: не удалось найти запрашиваемую вам страницу!')

@section('content')
    <!-- 404 Error -->
    <div class="error">
        <p>🚧 Страница в разработке</p>
        <p>Скоро она будет доступна!
            <a href="{{ url()->previous() }}" class="btn btn-primary mt-3">Назад</a>
        </p>
    </div>
@endsection
