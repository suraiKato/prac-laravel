@extends('layouts.auth')

@section('page.title', 'Редактирование задачи')

@section('auth.content')

    <x-card>
        <x-card-header>
            <x-card-title>
                {{ __('Редактирование задачи') }}
            </x-card-title>
            <x-slot name="right">
                <a href="{{ route('user.projects.show', $project) }}">
                    {{ __('Назад') }}
                </a>
            </x-slot>
        </x-card-header>
        <x-card-body>
            <x-form action="{{ route('user.projects.task.update', [$project, $task]) }}" method="POST">
                @method('PUT')
                <x-form-item>
                    <x-label required>{{ __('Название задачи') }}</x-label>
                    <x-input name="title" value="{{ $task->title }}" autofocus />
                    @error('title')
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