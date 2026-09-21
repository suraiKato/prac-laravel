@extends('layouts.auth')

@section('page.title', 'Подтверждение почты')

@section('auth.content')
    <x-card>
        <x-card-header>
            <x-card-title>
                {{ __('Подтверждение почты') }}
            </x-card-title>
            <x-slot name="right">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                        Выход
                    </a>
                </form>
            </x-slot>
        </x-card-header>
        <x-card-body>
            @if (session('status'))
                <p class="text-success">{{ session('status') }}</p>
            @endif
            <x-form action="{{ route('verification.send') }}" method="POST">
                
                <x-button type="submit">
                    {{ __('Отправить письмо заново') }}
                </x-button>
            </x-form>
        </x-card-body>
    </x-card>
@endsection