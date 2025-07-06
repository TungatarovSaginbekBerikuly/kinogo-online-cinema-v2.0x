@extends('layouts.home_layout')

@section('title', '404 Ошибка: не удалось найти запрашиваемую вам страницу!')

@section('content')
    <!-- 404 Error -->
    <div class="error">
        <p>404 Ошибка</p>
        <p>Страница которые вы искали не существует! <a href="{{ route('home') }}">Вернуться на главную</a></p>
    </div>
@endsection
