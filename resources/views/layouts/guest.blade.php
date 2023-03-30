<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Qui participe ? | @yield('title')</title>

        <!-- Fonts -->

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

        {{-- Icones --}}
        <script src="https://kit.fontawesome.com/7c75c7ba8b.js" crossorigin="anonymous"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="assets/css/all-common.css">
        <link rel="stylesheet" href="assets/css/guest-common.css">
        
        {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

        @stack('scripts')
        @stack('styles')
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen">
            
            <x-main-header/>

            <div class="w-full">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
