@extends('layouts.auth')

@section('page.title', 'Страница входа')

@section('auth.content')
    <x-card>
        <x-card-header>
            <x-card-title>
                {{ __('Изменение пароля') }}
            </x-card-title>
        </x-card-header>
        <x-card-body>
            <x-form action="{{ route('password.update') }}" method="POST">
                <input type="hidden" name="token" value="{{ $request->token }}">
                <x-form-item>
                    <x-label required>{{ __('Email') }}</x-label>
                    <x-input type="email" name="email" value="{{ old('email', $request->email) }}" autofocus />
                    @error('email')
                        <div class="text-danger small pt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </x-form-item>
                <x-form-item>
                    <x-label required>{{ __('Пароль') }}</x-label>
                    <x-input type="password" name="password"/>
                    @error('password')
                        <div class="text-danger small pt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </x-form-item>
                <x-form-item>
                    <x-label required>{{ __('Подтвердите пароль') }}</x-label>
                    <x-input type="password" name="password_confirmation"/>
                    @error('password_confirmation')
                        <div class="text-danger small pt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </x-form-item>
                <x-button type="submit">
                    {{ __('Изменить пароль') }}
                </x-button>
            </x-form>
        </x-card-body>
    </x-card>
@endsection