@extends('layouts.admin_layout')

@section('title', 'Админ-панель Kinogo online cinema')

@section('content')
    <h1 class="h3 fw-semibold mb-3">Добро пожаловать, Администратор! 👋</h1>
    <p class="text-secondary mb-4">Рады видеть вас снова</p>

    <!-- Dashboard cards -->
    <div class="row g-4 mb-4">
        <div class="row g-4 mb-4">
            @foreach ($metrics as [$icon, $count, $label])
                <div class="col-6 col-md-4 col-xl-2">
                    <div class="card card-custom text-center p-3">
                        <div class="fs-3 icon">{{ $icon }}</div>
                        <div class="h4 mb-0 count">{{ $count }}</div>
                        <small class="text-secondary label">{{ $label }}</small>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Latest comments + chart -->
    <div class="row g-4 mb-4">
        <div class="col-12 col-lg-6">
            <div class="card card-custom h-100">
                <div class="card-header py-3 px-4 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">💬 Последние комментарии</h5>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($lastComments as $lastComment)
                        <li class="list-group-item">{{ $lastComment->user->name }}: {{ $lastComment->message }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
