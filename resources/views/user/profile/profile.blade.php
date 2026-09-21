@extends('layouts.main')

@section('page.title', 'Дашборд')
    
@section('main.content')
    <x-title>Профиль
        <x-slot name="right">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <a class="me-3" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                    Выход
                </a>
            </form>
        </x-slot>
    </x-title>
    
@endsection