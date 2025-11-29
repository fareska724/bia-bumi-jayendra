<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Daftar Produk Batu Split') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($products as $product)
                    <div class="bg-gray-900 border border-yellow-500 rounded-xl p-5 shadow-md">
                        {{-- Gambar produk --}}
                        <div class="mb-3">
                            <img src="{{ asset($product->image_path ?? 'images/default-product.png') }}"
                                 alt="{{ $product->name }}"
                                 class="w-full h-40 object-cover rounded-md">
                        </div>

                        {{-- Nama --}}
                        <h3 class="text-lg font-bold text-yellow-400 mb-1">
                            {{ $product->name }}
                        </h3>

                        {{-- Ukuran --}}
                        <p class="text-sm text-gray-300 mb-1">
                            Ukuran: {{ $product->size_range }}
                        </p>

                        {{-- Harga --}}
                        <p class="text-md font-semibold text-gray-100 mb-3">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </p>

                        {{-- Tombol beli (nanti kita sambung ke cart/checkout) --}}
                        <a href="#"
                           class="block text-center bg-yellow-500 text-black font-semibold py-2 rounded-md hover:bg-yellow-400">
                            Beli Sekarang
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
