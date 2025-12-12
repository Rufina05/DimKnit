<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Document')</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
        'resources/js/search.js',
        'resources/js/modal.js'
    ])

    @stack('styles')

    @livewireStyles
</head>

<body class="bg-gray-50">

    {{-- HEADER --}}
    @livewire('header')

    {{-- MAIN CONTENT --}}
    <main>
        @yield('main')
    </main>

    {{-- FOOTER --}}
    @livewire('footer')


    {{-- Livewire Scripts --}}
    @livewireScripts

    {{-- Global events --}}
    <script>
        window.addEventListener('reload-page', () => window.location.reload());
    </script>

    {{-- Modal components must be inside <body> --}}
    @livewire('cart-success-modal')
    @livewire('heart-success-modal')

    @stack('scripts')

</body>
</html>
