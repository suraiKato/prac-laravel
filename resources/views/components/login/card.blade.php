<x-card>
    <x-card-header>
        <x-card-title>
            {{ __('Вход') }}
        </x-card-title>
        <x-slot name="right">
            <a href="{{ route('register') }}">
                {{ __('Регистрация') }}
            </a>
        </x-slot>
    </x-card-header>
    <x-card-body>
        @if (session('status'))
            <p class="text-success">{{ session('status') }}</p>
        @endif
        <x-form action="{{ route('login.store') }}" method="POST">
            <x-form-item>
                <x-label required>{{ __('Email') }}</x-label>
                <x-input type="email" name="email" value="{{ old('email') }}" autofocus />
                @error('email')
                    <div class="text-danger small pt-1">
                        {{ $message }}
                    </div>
                @enderror
            </x-form-item>
            <x-form-item>
                <x-label required>{{ __('Пароль') }}</x-label>
                <x-input type="password" name="password" />
                @error('password')
                    <div class="text-danger small pt-1">
                        {{ $message }}
                    </div>
                @enderror
            </x-form-item>
            <x-form-item>
                <x-checkbox name="remember">
                    {{ __("Запомнить меня") }}
                </x-checkbox>
            </x-form-item>
            <x-form-item>
                <a class="text-blue-400" href="{{ route('password.request') }}">
                    {{ __("Забыли пароль?") }}
                </a>
            </x-form-item>
            <x-button type="submit">
                {{ __('Войти') }}
            </x-button>
        </x-form>
    </x-card-body>
</x-card>

