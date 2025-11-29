@csrf

<div class="space-y-4">
    <div>
        <label class="block text-sm font-medium text-gray-700">Nama Armada</label>
        <input type="text" name="name"
               value="{{ old('name', $fleet->name ?? '') }}"
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        @error('name')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Kode Armada</label>
        <input type="text" name="code"
               placeholder="pickup / dumptruck / tronton"
               value="{{ old('code', $fleet->code ?? '') }}"
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        @error('code')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Ukuran</label>
        <input type="text" name="size"
               placeholder="Kecil / Sedang / Besar"
               value="{{ old('size', $fleet->size ?? '') }}"
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        @error('size')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">Harga per Km (Rp)</label>
            <input type="number" name="price_per_km"
                   value="{{ old('price_per_km', $fleet->price_per_km ?? '') }}"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('price_per_km')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Kapasitas (m³)</label>
            <input type="number" step="0.01" name="capacity_m3"
                   value="{{ old('capacity_m3', $fleet->capacity_m3 ?? '') }}"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('capacity_m3')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
        <textarea name="description" rows="3"
                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $fleet->description ?? '') }}</textarea>
        @error('description')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="mt-6 flex justify-end space-x-3">
    <a href="{{ route('admin.fleets.index') }}"
       class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md text-sm text-gray-700 bg-white hover:bg-gray-50">
        Batal
    </a>

    <button type="submit"
            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md text-sm text-white bg-indigo-600 hover:bg-indigo-700">
        Simpan
    </button>
</div>
