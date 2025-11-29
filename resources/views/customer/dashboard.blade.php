<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Dashboard Customer') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 text-white shadow-sm sm:rounded-lg p-6 border border-yellow-500">
                <h3 class="text-lg font-semibold mb-3">
                    Selamat datang, {{ auth()->user()->name }}!
                </h3>

                <p class="text-sm text-gray-300 mb-4">
                    Ini adalah dashboard customer PT. Bia Bumi Jayendra.
                </p>

                <ul class="list-disc list-inside text-sm text-gray-300 space-y-1">
                    <li>Nanti di sini bisa tampil daftar pesanan kamu.</li>
                    <li>Bisa lihat riwayat pembelian batu split.</li>
                    <li>Bisa atur profil (nama, alamat, no telepon, dll).</li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
