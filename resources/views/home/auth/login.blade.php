@extends('layouts.home_layout')

@section('title', 'С Возвращением!')

@section('content')
    <div class="auth__container">
        @if (session('success'))
            <div class="alert alert--success">
                <span>{{ session('success') }}</span>
                <button type="button" class="alert__close" aria-label="Close" onclick="this.parentElement.remove();">&times;</button>
            </div>
        @endif

        <form class="auth__box" action="{{ route('loginPost') }}" method="POST">
            @csrf

            <h1 class="auth__title">С Возвращением!</h1>
            <div class="auth__form">
                <label class="auth__label" for="email">Ваша почта</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" class="auth__input @error('email') auth__input--error @enderror" placeholder="example@gmail.com">
                @error('email')
                    <p class="auth__error">{{ $message }}</p>
                @enderror
            </div>
            <div class="auth__form">
                <label class="auth__label" for="password">Пароль</label>
                <input id="password" name="password" type="password" class="auth__input @error('password') auth__input--error @enderror">
                @error('password')
                    <p class="auth__error">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn__primary">Войти</button>
            <a href="{{ route('register') }}" class="auth__link">Создать аккаунт</a>
        </form>
    </div>
@endsection