@extends('layouts.auth')

@section('page.title', 'Регистрация')

@section('auth.content')
    <x-card>
        <x-card-header>
            <x-card-title>
                {{ __('Регистрация') }}
            </x-card-title>
            <x-slot name="right">
                <a href="{{ route('login') }}">
                    Вход
                </a>
            </x-slot>
        </x-card-header>
        <x-card-body>
            {{-- @if ($errors->any())
                <div class="alert alert-danger small p-2">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
            
            
            
            <x-form action="{{ route('register.store') }}" method="POST">
                <x-form-item>
                    <x-label required>{{ __('Имя') }}</x-label>
                    {{-- полная строка для value="{{ request()->old('name') }}" 
                    чтобы понимать что мы берем значения из запроса и при редиректе на эту же страницу,
                    она рендерится заново, что и позволяет взять данные с помощью old, (эта строка перенесена в компенент input.blade.php) --}}
                    <x-input name="name" value="{{ old('name') }}" autofocus />
                    @error('name')
                        <div class="text-danger small pt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </x-form-item>
                <x-form-item>
                    <x-label required>{{ __('Email') }}</x-label>
                    <x-input type="email" name="email" value="{{ old('email') }}"/>
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
                <x-form-item>
                    <x-checkbox name="agreement" >
                        {{ __("Я согласен на обработку персональной информации") }}
                    </x-checkbox>
                    @error('agreement')
                        <div class="text-danger small pt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </x-form-item>
                <x-button type="submit">
                    {{ __('Зарегистрироваться') }}
                </x-button>
            </x-form>
        </x-card-body>
    </x-card>
@endsection