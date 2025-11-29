<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Tambah Produk Baru') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 border border-yellow-500 text-white shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4 text-yellow-400">
                    Form Tambah Produk
                </h3>

                <form method="POST"
                      action="{{ route('admin.products.store') }}"
                      enctype="multipart/form-data">
                    @csrf

                    @include('admin.products.partials.form', ['product' => null])
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
