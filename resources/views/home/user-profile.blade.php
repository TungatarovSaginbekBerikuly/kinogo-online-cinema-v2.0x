@extends('layouts.home_layout')

@section('title', 'Профиль пользователя')

@section('content')
    @if (session('success'))
        <div class="alert alert--success">
            <span>{{ session('success') }}</span>
            <button type="button" class="alert__close" aria-label="Close"
                onclick="this.parentElement.remove();">&times;</button>
        </div>
    @endif
    
    <!-- Content -->
    <div class="content__secondary">
        <div class="container__secondary">
            <div class="user__container">
                <form action="{{ route('update-image') }}" method="POST" enctype="multipart/form-data" class="user__image">
                    @csrf
                
                    @if($user->image)
                        <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="Аватар">
                    @else
                        <img src="{{ asset('images/default-user.png') }}" alt="Аватар по умолчанию">
                    @endif

                    <label for="image">Выберите изображение:</label>
                    <input type="file" name="image" id="image" accept="image/*" required>
                    
                    <button class="btn__primary">Обновить</button>
                </form>
                <!-- Info -->
                <div class="user__info">
                    <h1 class="user__name">{{ $user->name }}</h1>
                    <div class="form__group">
                        <p class="form__group-title">Ваше имя</p>
                        <div class="form__group-input">{{ $user->name }}</div>
                    </div>
                    <div class="form__group">
                        <p class="form__group-title">Ваше почта</p>
                        <div class="form__group-input">{{ $user->email }}</div>
                    </div>
                    <div class="form__group">
                        <p class="form__group-title">Дата создания аккаунта</p>
                        <div class="form__group-input">{{ $user->created_at }}</div>
                    </div>
                    <div class="form__group">
                        <a href="" class="btn__danger">Выйти из аккаунта</a>
                    </div>
                </div>
            </div>
        </div> 
    </div>
@endsection
