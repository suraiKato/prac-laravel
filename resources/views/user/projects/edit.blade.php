@extends('layouts.auth')

@section('page.title', 'Изменение проекта')

@section('auth.content')

    <x-card>
        <x-card-header>
            <x-card-title>
                {{ __('Изменение проекта') }}
            </x-card-title>
            <x-slot name="right">
                <a href="{{ route('user.projects') }}">
                    {{ __('Назад') }}
                </a>
            </x-slot>
        </x-card-header>
        <x-card-body>
            <x-form action="{{ route('user.projects.update', $project->id) }}" method="POST">
                @method('PUT')
                <x-form-item>
                    <x-label required>{{ __('Название проекта') }}</x-label>
                    <x-input name="title" value="{{ $project->title ?? '' }}" autofocus />
                    @error('title')
                        <div class="text-danger small pt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </x-form-item>
                <x-form-item>
                    <x-label required>{{ __('Описание проекта') }}</x-label>
                    <x-input name="description" value="{{ $project->description ?? '' }}" />
                    @error('description')
                        <div class="text-danger small pt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </x-form-item>
                <x-button type="submit">
                    {{ __('Сохранить') }}
                </x-button>
            </x-form>
        </x-card-body>
    </x-card>

@endsection