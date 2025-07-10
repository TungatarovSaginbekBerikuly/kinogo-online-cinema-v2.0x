@extends('layouts.home_layout')

@section('title', 'Добро пожаловать!')

@section('content')
    <!-- Content -->
    <div class="auth__container">
        <form class="auth__box" action="{{ route('registerPost') }}" method="POST">
            @csrf
            <h1 class="auth__title">Добро пожаловать!</h1>

            <div class="auth__form">
                <label class="auth__label" for="name">Ваше имя</label>
                <input id="name" name="name" type="text"
                       value="{{ old('name') }}"
                       class="auth__input @error('name') auth__input--error @enderror" placeholder="Имя">
                @error('name')
                    <p class="auth__error">{{ $message }}</p>
                @enderror
            </div>

            <div class="auth__form">
                <label class="auth__label" for="email">Ваша почта</label>
                <input id="email" name="email" type="email"
                       value="{{ old('email') }}"
                       class="auth__input @error('email') auth__input--error @enderror" placeholder="example@gmail.com">
                @error('email')
                    <p class="auth__error">{{ $message }}</p>
                @enderror
            </div>

            <div class="auth__form">
                <label class="auth__label" for="password">Придумайте пароль</label>
                <input id="password" name="password" type="password"
                       class="auth__input @error('password') auth__input--error @enderror" placeholder="Пароль">
                @error('password')
                    <p class="auth__error">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn__primary">Зарегистрироваться</button>
            <a href="{{ route('login') }}" class="auth__link">У меня есть аккаунт</a>
        </form>
    </div>
@endsection