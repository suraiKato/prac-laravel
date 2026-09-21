<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page.title')</title>
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.8/css/bootstrap.min.css" rel="stylesheet"> --}}
    @stack('css')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .required::after { content: '*'; color: red; }
    </style>
</head>
<body>

    <div class="flex flex-col justify-between min-h-screen">
        
        @include('includes.header')

        <main class="container mx-auto grow py-4">
            @yield('content')
        </main>

        @include('includes.footer')

    </div>
    
</body>
</html>