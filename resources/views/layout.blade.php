<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/search.js'])
    
    @stack('styles')

    @livewireStyles
</head>
<body class="bg-gray-50">
    @livewire('header')

    <main>
        @yield('main')
    </main>

    @livewire('footer')

    @livewireScripts
</body>
</html>
