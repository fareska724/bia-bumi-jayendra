<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login | PT. Bia Bumi Jayendra</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gradient-to-b from-black via-gray-900 to-black text-white">

    <div class="min-h-screen flex flex-col justify-center items-center px-4">

        {{-- Logo + Judul --}}
        <div class="mb-6 text-center">
            <img src="{{ asset('images/logo.png') }}"
                 alt="PT. Bia Bumi Jayendra"
                 class="w-65 h-auto mx-auto mb-3">

            <h1 class="text-2xl font-semibold text-yellow-400">
                SELAMAT DATANG
            </h1>
            <!-- <p class="text-sm text-gray-300">
                Sistem E-Commerce Batu Split
            </p> -->
        </div>

        {{-- Card Login --}}
        <div class="w-full max-w-md bg-gray-900 border border-yellow-500 rounded-xl shadow-lg px-8 py-6">

            {{-- Status session (misal: password reset) --}}
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div>
                    <x-input-label for="email" value="Email" class="text-gray-200" />
                    <x-text-input id="email"
                                  class="block mt-1 w-full bg-gray-800 border-gray-700 text-white focus:border-yellow-400 focus:ring-yellow-400"
                                  type="email"
                                  name="email"
                                  :value="old('email')"
                                  required
                                  autofocus
                                  autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                {{-- Password --}}
                <div class="mt-4">
                    <x-input-label for="password" value="Password" class="text-gray-200" />
                    <x-text-input id="password"
                                  class="block mt-1 w-full bg-gray-800 border-gray-700 text-white focus:border-yellow-400 focus:ring-yellow-400"
                                  type="password"
                                  name="password"
                                  required
                                  autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                {{-- Remember Me --}}
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me"
                               type="checkbox"
                               class="rounded border-gray-700 bg-gray-800 text-yellow-500 shadow-sm focus:ring-yellow-400"
                               name="remember">
                        <span class="ms-2 text-sm text-gray-300">
                            Remember me
                        </span>
                    </label>
                </div>

                {{-- Tombol + Forgot password --}}
                <div class="flex items-center justify-between mt-6">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-300 hover:text-yellow-300"
                           href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>
                    @endif

                    <x-primary-button class="ms-3">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>

        {{-- Link ke register --}}
        @if (Route::has('register'))
            <p class="mt-4 text-sm text-gray-300">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-yellow-400 hover:underline">
                    Daftar di sini
                </a>
            </p>
        @endif
    </div>
</body>
</html>
