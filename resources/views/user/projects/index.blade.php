@extends('layouts.main')

@section('page.title', 'Мои проекты')

@section('main.content')
    
    <x-title>
        {{ __('Мои проекты') }}

        <x-slot name="right">
            <x-button-link href="{{ route('user.projects.create') }}">
                {{ __('Создать') }}
            </x-button-link>
        </x-slot>
    </x-title>

    @if ($projects->isEmpty())
        {{ __('Пока нет проектов') }}
    @else 
        <div class="grid grid-cols-3 gap-8">
            @foreach ($projects as $project)
                <div class="border border-black/30 p-4 rounded-xl transition-transform duration-300 hover:-translate-y-1">
                    <h2 class="text-2xl">{{ $project->title }}</h2>
                    <p class="text-black/50">Описание: {{ $project->description }}</p>
                    <a class="text-blue-400 mt-6 block" href="{{ route('user.projects.show', $project->id) }}">Перейти ></a>
                </div>
            @endforeach

        </div>
    @endif

@endsection