<nav x-data="{ open: false }" class="relative bg-black border-b border-yellow-500">
    {{-- GRADIENT KECIL DI BELAKANG LOGO --}}
    <div class="absolute inset-y-0 left-0 w-[470px] bg-gradient-to-r from-amber-50 via-amber-100 to-transparent"></div>

    {{-- ISI NAVBAR --}}
    <div class="relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">

                {{-- KIRI: LOGO --}}
                <div class="flex items-center">
                    @php
                        $homeRoute = auth()->check() && auth()->user()->role === 'admin'
                            ? route('admin.dashboard')
                            : (auth()->check() ? route('customer.dashboard') : url('/'));
                    @endphp

                    <a href="{{ $homeRoute }}" class="flex items-center">
                        <img src="{{ asset('images/logo.png') }}"
                             class="h-12 w-auto drop-shadow-[0_2px_4px_rgba(0,0,0,0.6)]"
                             alt="PT. BIA BUMI JAYENDRA">
                    </a>
                </div>

                {{-- TENGAH: MENU --}}
<div class="hidden sm:flex space-x-6">
    @auth
        @if(auth()->user()->role === 'admin')
            <a href="{{ route('admin.dashboard') }}"
               class="pb-1 text-sm font-medium
               {{ request()->routeIs('admin.dashboard') ? 'text-yellow-400 border-b-2 border-yellow-400' : 'text-gray-200 hover:text-yellow-300' }}">
                Dashboard Admin
            </a>

            <a href="{{ route('admin.products.index') }}"
               class="pb-1 text-sm font-medium
               {{ request()->routeIs('admin.products.*') ? 'text-yellow-400 border-b-2 border-yellow-400' : 'text-gray-200 hover:text-yellow-300' }}">
                Manajemen Produk
            </a>

            <a href="{{ route('admin.fleets.index') }}"
               class="pb-1 text-sm font-medium
               {{ request()->routeIs('admin.fleets.*') ? 'text-yellow-400 border-b-2 border-yellow-400' : 'text-gray-200 hover:text-yellow-300' }}">
                Manajemen Armada
            </a>

            {{-- ✅ MENU BARU: MANAJEMEN PESANAN --}}
            <a href="{{ route('admin.orders.index') }}"
               class="pb-1 text-sm font-medium
               {{ request()->routeIs('admin.orders.*') ? 'text-yellow-400 border-b-2 border-yellow-400' : 'text-gray-200 hover:text-yellow-300' }}">
                Manajemen Pesanan
            </a>
        @else
            <a href="{{ route('customer.dashboard') }}"
               class="pb-1 text-sm font-medium
               {{ request()->routeIs('customer.dashboard') ? 'text-yellow-400 border-b-2 border-yellow-400' : 'text-gray-200 hover:text-yellow-300' }}">
                Dashboard
            </a>

            <a href="{{ route('products.index') }}"
               class="pb-1 text-sm font-medium
               {{ request()->routeIs('products.index') ? 'text-yellow-400 border-b-2 border-yellow-400' : 'text-gray-200 hover:text-yellow-300' }}">
                Produk
            </a>
        @endif
    @endauth
</div>


                {{-- KANAN: NAMA USER + DROPDOWN --}}
                <div class="hidden sm:flex sm:items-center">
                    @auth
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-200 bg-gray-800 hover:text-white hover:bg-gray-700 focus:outline-none transition">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                  d="M5.23 7.21a.75.75 0 011.06.02L10 11.17l3.71-3.94a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                                  clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                                     onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    @endauth
                </div>

                {{-- MOBILE: BUTTON HAMBURGER --}}
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-200 hover:text-white hover:bg-gray-800 focus:outline-none transition">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                                  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': ! open, 'inline-flex': open }" class="hidden"
                                  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

            </div>
        </div>

        {{-- MENU MOBILE --}}
        <div :class="{ 'block': open, 'hidden': ! open }" class="hidden sm:hidden border-t border-gray-800">
            @auth
                <div class="pt-2 pb-3 space-y-1 px-4 bg-black">
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}"
                           class="block text-sm py-2 {{ request()->routeIs('admin.dashboard') ? 'text-yellow-400' : 'text-gray-200' }}">
                            Dashboard Admin
                        </a>
                        <a href="{{ route('admin.products.index') }}"
                           class="block text-sm py-2 {{ request()->routeIs('admin.products.*') ? 'text-yellow-400' : 'text-gray-200' }}">
                            Manajemen Produk
                        </a>
                        <a href="{{ route('admin.fleets.index') }}"
                           class="block text-sm py-2 {{ request()->routeIs('admin.fleets.*') ? 'text-yellow-400' : 'text-gray-200' }}">
                            Manajemen Armada
                        </a>
                         {{-- ✅ MENU BARU DI MOBILE --}}
                        <a href="{{ route('admin.orders.index') }}"
                        class="block text-sm py-2 {{ request()->routeIs('admin.orders.*') ? 'text-yellow-400' : 'text-gray-200' }}">
                            Manajemen Pesanan
                        </a>
                    @else
                        <a href="{{ route('customer.dashboard') }}"
                           class="block text-sm py-2 {{ request()->routeIs('customer.dashboard') ? 'text-yellow-400' : 'text-gray-200' }}">
                            Dashboard
                        </a>
                        <a href="{{ route('products.index') }}"
                           class="block text-sm py-2 {{ request()->routeIs('products.index') ? 'text-yellow-400' : 'text-gray-200' }}">
                            Produk
                        </a>
                    @endif
                </div>
            @endauth
        </div>
    </div>
</nav>
