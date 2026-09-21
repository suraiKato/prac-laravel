@extends('layouts.auth')

@section('page.title', 'Страница входа')

@section('auth.content')
    <x-card>
        <x-card-header>
            <x-card-title>
                {{ __('Забыли пароль?') }}
            </x-card-title>
        </x-card-header>
        <x-card-body>
            @if (session('status'))
                <p class="text-success">{{ session('status') }}</p>
            @endif
            <x-form action="{{ route('password.request') }}" method="POST">
                <x-form-item>
                    <x-label required>{{ __('Email') }}</x-label>
                    <x-input type="email" name="email" value="{{ old('email') }}" autofocus />
                    @error('email')
                        <div class="text-danger small pt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </x-form-item>
                <x-button type="submit">
                    {{ __('Отправить письмо') }}
                </x-button>
            </x-form>
        </x-card-body>
    </x-card>
@endsection