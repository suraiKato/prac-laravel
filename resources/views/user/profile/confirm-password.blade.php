@extends('layouts.auth')

@section('page.title', 'Страница входа')

@section('auth.content')
    <x-card>
        <x-card-header>
            <x-card-title>
                {{ __('Подтверждение пароля') }}
            </x-card-title>
        </x-card-header>
        <x-card-body>
            <x-form action="{{ route('password.confirm') }}" method="POST">
                <x-form-item>
                    <x-label required>{{ __('Пароль') }}</x-label>
                    <x-input type="password" name="password"/>
                    @error('password')
                        <div class="text-danger small pt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </x-form-item>
                <x-button type="submit">
                    {{ __('Подтвердить') }}
                </x-button>
            </x-form>
        </x-card-body>
    </x-card>
@endsection