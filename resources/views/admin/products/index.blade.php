<x-app-layout>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Notifikasi sukses --}}
            @if (session('success'))
                <div class="bg-green-600 text-white px-4 py-2 rounded-md text-sm">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Hero atas --}}
            <section class="bg-gray-900 border border-yellow-500 rounded-xl p-6 shadow-md flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-yellow-400 mb-2">
                        Kelola Produk Batu Split
                    </h1>
                    <p class="text-gray-300 text-sm md:text-base">
                        Tambahkan, ubah, atau hapus produk batu split yang akan ditampilkan
                        ke customer di halaman katalog.
                    </p>
                </div>

                <div class="text-right">
                    <a href="{{ route('admin.products.create') }}"
                       class="inline-flex items-center px-4 py-2 bg-yellow-500 text-black font-semibold rounded-md hover:bg-yellow-400">
                        + Tambah Produk
                    </a>
                </div>
            </section>

            {{-- Tabel produk --}}
            <section class="bg-gray-900 border border-yellow-500 rounded-xl p-6 shadow-md">
                @if ($products->isEmpty())
                    <p class="text-gray-300 text-center">
                        Belum ada produk. Klik tombol <span class="font-semibold">"Tambah Produk"</span> untuk mulai mengisi.
                    </p>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm text-gray-100">
                            <thead>
                                <tr class="border-b border-gray-700 bg-gray-800">
                                    <th class="py-2 px-3 text-left">#</th>
                                    <th class="py-2 px-3 text-left">Nama</th>
                                    <th class="py-2 px-3 text-left">Ukuran</th>
                                    <th class="py-2 px-3 text-left">Harga</th>
                                    <th class="py-2 px-3 text-left">Gambar</th>
                                    <th class="py-2 px-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr class="border-b border-gray-800 hover:bg-gray-800/60">
                                        <td class="py-2 px-3">
                                            {{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}
                                        </td>
                                        <td class="py-2 px-3">
                                            <div class="font-semibold">{{ $product->name }}</div>
                                            <div class="text-xs text-gray-400 line-clamp-1">
                                                {{ $product->description }}
                                            </div>
                                        </td>
                                        <td class="py-2 px-3">
                                            {{ $product->size_range }}
                                        </td>
                                        <td class="py-2 px-3">
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </td>
                                        <td class="py-2 px-3">
                                            @if ($product->image_path)
                                                <img src="{{ asset($product->image_path) }}"
                                                     alt="Gambar {{ $product->name }}"
                                                     class="w-16 h-12 object-cover rounded border border-gray-700">
                                            @else
                                                <span class="text-xs text-gray-400">Tidak ada</span>
                                            @endif
                                        </td>
                                        <td class="py-2 px-3 text-right">
                                            <div class="inline-flex items-center gap-2">
                                                <a href="{{ route('admin.products.edit', $product) }}"
                                                   class="px-3 py-1 text-xs bg-blue-500 hover:bg-blue-400 text-white rounded-md">
                                                    Edit
                                                </a>

                                                <form action="{{ route('admin.products.destroy', $product) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('Yakin ingin menghapus produk ini?')"
                                                      class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="px-3 py-1 text-xs bg-red-600 hover:bg-red-500 text-white rounded-md">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $products->links() }}
                    </div>
                @endif
            </section>
        </div>
    </div>
</x-app-layout>
