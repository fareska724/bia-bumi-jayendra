<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'BBJ System') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans antialiased bg-gradient-to-b from-black via-gray-900 to-black text-white">

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">

            <!-- Logo -->
            <div class="mb-4">
                <a href="/">
                    <img src="{{ asset('images/logo.png') }}" 
                         alt="PT. Bia Bumi Jayendra"
                         class="w-28 h-auto mx-auto">
                </a>

                <h1 class="text-center text-xl font-semibold text-yellow-400 mt-3">
                    PT. BIA BUMI JAYENDRA
                </h1>

                <p class="text-center text-gray-300 text-sm">
                    Sistem E-Commerce Batu Split & Ready Mix
                </p>
            </div>

            <!-- Login/Register Card -->
            <div class="w-full sm:max-w-md mt-6 px-6 py-6 
                        bg-gray-900 border border-yellow-500 
                        shadow-lg rounded-xl text-white">
                {{ $slot }}
            </div>
        </div>

    </body>
</html>
