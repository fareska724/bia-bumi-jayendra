<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    {{-- Nama produk --}}
    <div>
        <label class="block text-sm mb-1">Nama Produk</label>
        <input type="text" name="name"
               value="{{ old('name', $product->name ?? '') }}"
               class="w-full rounded-md bg-gray-800 border-gray-700 text-white text-sm"
               required>
        @error('name')
            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Ukuran --}}
    <div>
        <label class="block text-sm mb-1">Ukuran (range)</label>
        <input type="text" name="size_range"
               placeholder="Contoh: 00 - 0,5"
               value="{{ old('size_range', $product->size_range ?? '') }}"
               class="w-full rounded-md bg-gray-800 border-gray-700 text-white text-sm"
               required>
        @error('size_range')
            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Harga --}}
    <div>
        <label class="block text-sm mb-1">Harga (per m³ / ton)</label>
        <input type="number" name="price" min="0" step="1"
               value="{{ old('price', $product->price ?? '') }}"
               class="w-full rounded-md bg-gray-800 border-gray-700 text-white text-sm"
               required>
        @error('price')
            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Gambar --}}
    <div>
        <label class="block text-sm mb-1">Gambar Produk (opsional)</label>
        <input type="file" name="image"
               class="w-full text-sm text-gray-300">

        @error('image')
            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
        @enderror

        @if (!empty($product?->image_path))
            <div class="mt-2">
                <p class="text-xs text-gray-400 mb-1">Gambar saat ini:</p>
                <img src="{{ asset($product->image_path) }}"
                     class="w-24 h-16 object-cover rounded border border-gray-700">
            </div>
        @endif
    </div>
</div>

<div class="mt-4">
    <label class="block text-sm mb-1">Deskripsi</label>
    <textarea name="description" rows="4"
              class="w-full rounded-md bg-gray-800 border-gray-700 text-white text-sm"
              required>{{ old('description', $product->description ?? '') }}</textarea>
    @error('description')
        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mt-6 flex justify-end gap-2">
    <a href="{{ route('admin.products.index') }}"
       class="px-4 py-2 rounded-md border border-gray-600 text-gray-300 text-sm">
        Batal
    </a>
    <button type="submit"
            class="px-4 py-2 rounded-md bg-yellow-500 text-black font-semibold text-sm hover:bg-yellow-400">
        Simpan
    </button>
</div>
