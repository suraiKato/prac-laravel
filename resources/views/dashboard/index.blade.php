@extends('layouts.main')

@section('page.title', 'Дашборд')
    
@section('main.content')
    <x-title>ДашБорд - ваша статистика
        <x-slot name="right">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <a class="me-3" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                    Выход
                </a>
                <a href="{{ route('user.profile') }}">
                    Профиль
                </a>
            </form>
        </x-slot>
    </x-title>
    <div class="grid grid-cols-2 gap-8">
        <x-card>
            <x-card-header>
                <x-card-title>
                    Количество пользователей
                </x-card-title>
            </x-card-header>
            <x-card-body>
                <h2 class="text-2xl">{{ $usersCount }}</h2>
            </x-card-body>
        </x-card>
        <x-card>
            <x-card-header>
                <x-card-title>
                    Количество ваших проектов
                </x-card-title>
            </x-card-header>
            <x-card-body>
                <h2 class="text-2xl">{{ $projectsCount }}</h2>
            </x-card-body>
        </x-card>
    </div>
    
@endsection