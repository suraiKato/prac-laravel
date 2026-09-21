@extends('layouts.auth')

@section('page.title', 'Приглашение участника')

@section('auth.content')

    <x-card>
        <x-card-header>
            <x-card-title>
                {{ __('Приглашение участника') }}
            </x-card-title>
            <x-slot name="right">
                <a href="{{ route('user.projects') }}">
                    {{ __('Назад') }}
                </a>
            </x-slot>
        </x-card-header>
        <x-card-body>
            <x-form action="{{ route('user.projects.invitations.store', $project) }}" method="POST">
                <x-form-item>
                    <x-label required>{{ __('email пользователя') }}</x-label>
                    <x-input name="email" value="{{ old('email') }}" autofocus />
                    @error('email')
                        <div class="text-danger small pt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </x-form-item>
                <x-button type="submit">
                    {{ __('Пригласить') }}
                </x-button>
            </x-form>
        </x-card-body>
    </x-card>

@endsection