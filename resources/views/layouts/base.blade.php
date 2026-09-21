<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page.title', config('app.name'))</title>
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.8/css/bootstrap.min.css" rel="stylesheet"> --}}
    @stack('css')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>.container { max-width: 720px; }
        .required::after { content: '*'; color: red; }
    </style>
</head>
<body>

    <div class="flex flex-col justify-between min-h-screen">

        @include('includes.alert')
        @include('includes.header')

        <main class="grow py-3">
            @yield('content')
        </main>

        @include('includes.footer')

    </div>

    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.8/js/bootstrap.min.js"></script>
    @stack('js')

</body>
</html>