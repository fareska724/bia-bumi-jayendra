<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- CARD HEADER --}}
            <div class="bg-slate-900 rounded-2xl shadow-lg border border-yellow-500 px-8 py-6">
                <h1 class="text-2xl font-bold text-yellow-400">
                    Dashboard Admin
                </h1>
                <p class="mt-2 text-sm text-gray-200">
                    Kelola produk batu split, armada pengiriman, dan pesanan pelanggan PT. Bia Bumi Jayendra dari satu tempat.
                </p>
            </div>

            {{-- ✅ CARD RINGKASAN DATA --}}
            <div class="bg-slate-900 rounded-2xl shadow-lg px-8 py-6 text-white">
                <h2 class="text-lg font-semibold text-yellow-300 mb-4">
                    Ringkasan Data
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                    {{-- Total Produk --}}
                    <div class="bg-slate-800 rounded-xl p-4 flex flex-col">
                        <span class="text-sm text-gray-300">Total Produk</span>
                        <span class="mt-2 text-3xl font-bold text-yellow-400">
                            {{ number_format($productCount ?? 0, 0, ',', '.') }}
                        </span>
                        <span class="mt-1 text-xs text-gray-400">
                            Produk batu split yang aktif di katalog.
                        </span>
                    </div>

                    {{-- Total Armada --}}
                    <div class="bg-slate-800 rounded-xl p-4 flex flex-col">
                        <span class="text-sm text-gray-300">Total Armada</span>
                        <span class="mt-2 text-3xl font-bold text-yellow-400">
                            {{ number_format($fleetCount ?? 0, 0, ',', '.') }}
                        </span>
                        <span class="mt-1 text-xs text-gray-400">
                            Armada pengiriman yang tersedia (pickup, dumptruck, tronton).
                        </span>
                    </div>

                    {{-- Total Customer --}}
                    <div class="bg-slate-800 rounded-xl p-4 flex flex-col">
                        <span class="text-sm text-gray-300">Total Customer</span>
                        <span class="mt-2 text-3xl font-bold text-yellow-400">
                            {{ number_format($customerCount ?? 0, 0, ',', '.') }}
                        </span>
                        <span class="mt-1 text-xs text-gray-400">
                            Akun dengan role customer yang terdaftar di sistem.
                        </span>
                    </div>

                </div>
            </div>

            {{-- MENU MANAJEMEN --}}
<div class="bg-slate-900 rounded-2xl shadow-lg px-8 py-6">
    <h2 class="text-lg font-semibold text-yellow-300 mb-4">Menu Manajemen</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        {{-- PRODUK --}}
        <a href="{{ route('admin.products.index') }}"
           class="group bg-slate-800/60 p-5 rounded-xl border border-slate-700 
                  text-gray-200 hover:border-yellow-400 hover:shadow-[0_0_15px_rgba(255,215,0,0.3)]
                  transform transition duration-300 hover:-translate-y-1 hover:scale-[1.03]">

            <div class="flex items-center space-x-3">
                <div class="p-3 bg-yellow-400 rounded-full text-black group-hover:rotate-6 transition">
                    <x-heroicon-o-cube class="w-6 h-6" />
                </div>

                <div>
                    <h3 class="text-base font-semibold">Manajemen Produk</h3>
                    <p class="text-xs text-gray-400">
                        Kelola data produk batu split yang tampil di katalog customer.
                    </p>
                </div>
            </div>
        </a>

        {{-- ARMADA --}}
        <a href="{{ route('admin.fleets.index') }}"
           class="group bg-slate-800/60 p-5 rounded-xl border border-slate-700 
                  text-gray-200 hover:border-yellow-400 hover:shadow-[0_0_15px_rgba(255,215,0,0.3)]
                  transform transition duration-300 hover:-translate-y-1 hover:scale-[1.03]">

            <div class="flex items-center space-x-3">
                <div class="p-3 bg-yellow-400 rounded-full text-black group-hover:-rotate-6 transition">
                    <x-heroicon-o-truck class="w-6 h-6" />
                </div>

                <div>
                    <h3 class="text-base font-semibold">Manajemen Armada</h3>
                    <p class="text-xs text-gray-400">
                        Atur armada pengiriman seperti pickup, dumptruck, dan tronton.
                    </p>
                </div>
            </div>
        </a>

        {{-- PESANAN --}}
        <a href="{{ route('admin.orders.index') }}"
           class="group bg-slate-800/60 p-5 rounded-xl border border-slate-700 
                  text-gray-200 hover:border-yellow-400 hover:shadow-[0_0_15px_rgba(255,215,0,0.3)]
                  transform transition duration-300 hover:-translate-y-1 hover:scale-[1.03]">

            <div class="flex items-center space-x-3">
                <div class="p-3 bg-yellow-400 rounded-full text-black group-hover:rotate-12 transition">
                    <x-heroicon-o-clipboard-document-list class="w-6 h-6" />
                </div>

                <div>
                    <h3 class="text-base font-semibold">Manajemen Pesanan</h3>
                    <p class="text-xs text-gray-400">
                        Kelola pesanan batu split dari customer.
                    </p>
                </div>
            </div>
        </a>

    </div>
</div>





        </div>
    </div>
</x-app-layout>
