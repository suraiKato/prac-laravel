@extends('layouts.auth')

@section('page.title', 'Создание проекта')

@section('auth.content')

    <x-card>
        <x-card-header>
            <x-card-title>
                {{ __('Создание проекта') }}
            </x-card-title>
            <x-slot name="right">
                <a href="{{ route('user.projects') }}">
                    {{ __('Назад') }}
                </a>
            </x-slot>
        </x-card-header>
        <x-card-body>
            <x-form action="{{ route('user.projects.store') }}" method="POST">
                <x-form-item>
                    <x-label required>{{ __('Название проекта') }}</x-label>
                    <x-input name="title" value="{{ old('title') }}" autofocus />
                    @error('title')
                        <div class="text-danger small pt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </x-form-item>
                <x-form-item>
                    <x-label required>{{ __('Описание проекта') }}</x-label>
                    <x-input name="description" />
                    @error('description')
                        <div class="text-danger small pt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </x-form-item>
                <x-button type="submit">
                    {{ __('Создать') }}
                </x-button>
            </x-form>
        </x-card-body>
    </x-card>

@endsection