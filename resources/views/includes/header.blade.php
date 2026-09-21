<nav class="border-b border-black/30 py-4 px-4">
  <div class="container mx-auto flex gap-10 items-center w-full">
    <a class="text-xl font-semibold" href="{{ route('home') }}">
        {{ __('TaskFlow') }}
    </a>
    <div class="flex items-center justify-between w-full" id="navbarSupportedContent">
        <ul class="flex items-center gap-6">
            <li class="">
                <a class=" {{ active__link('home') }}" aria-current="page" href="{{ route('home') }}">{{ __('Главная') }}</a>
            </li>
            
            @auth 
            <li class="">
                <a class=" {{ active__link('user.dashboard') }}" aria-current="page" href="{{ route('user.dashboard') }}">{{ __('Дашбоард') }}</a>
            </li>
            <li class="">
                <a class=" {{ active__link('user.projects') }}" aria-current="page" href="{{ route('user.projects') }}">{{ __('Проекты') }}</a>
            </li>
            @endauth
        </ul>
        <ul class="flex items-center gap-6">
            @guest
            <li class="">
                <a class=" {{ active__link('register') }}" aria-current="page" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
            </li>
            <li class="">
                <a class=" {{ active__link('login') }}" aria-current="page" href="{{ route('login') }}">{{ __('Вход') }}</a>
            </li>
            @endguest
        </ul>
    </div>
  </div>
</nav>