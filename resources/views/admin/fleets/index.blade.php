<x-app-layout>
    

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- HEADER CARD --}}
            <div class="bg-slate-900 rounded-2xl shadow-lg border border-yellow-500 px-8 py-6">
                <h1 class="text-2xl font-bold text-yellow-400">
                    Manajemen Armada
                </h1>
                <p class="mt-2 text-sm text-gray-200">
                    Kelola armada pengiriman seperti pickup, dumptruck, dan truk tronton beserta tarif dan kapasitasnya.
                </p>
            </div>

            {{-- CARD TABEL ARMADA --}}
            <div class="bg-slate-900 rounded-2xl shadow-lg px-8 py-6 text-white">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold text-yellow-300">
                        Daftar Armada
                    </h2>

                    <a href="{{ route('admin.fleets.create') }}"
                       class="inline-flex items-center px-4 py-2 rounded-lg bg-yellow-400 text-black text-sm font-semibold hover:bg-yellow-300 transition">
                        + Tambah Armada
                    </a>
                </div>

                @if(session('success'))
                    <div class="mb-4 p-3 rounded bg-emerald-600/20 text-emerald-200 text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                @if($fleets->isEmpty())
                    <p class="text-gray-300 text-sm">Belum ada data armada.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm">
                            <thead>
                                <tr class="border-b border-slate-700 bg-slate-800">
                                    <th class="text-left py-2 px-3 font-semibold">Nama</th>
                                    <th class="text-left py-2 px-3 font-semibold">Kode</th>
                                    <th class="text-left py-2 px-3 font-semibold">Ukuran</th>
                                    <th class="text-left py-2 px-3 font-semibold">Harga / Km</th>
                                    <th class="text-left py-2 px-3 font-semibold">Kapasitas (m³)</th>
                                    <th class="text-left py-2 px-3 font-semibold">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($fleets as $fleet)
                                    <tr class="border-b border-slate-800 hover:bg-slate-800/60">
                                        <td class="py-2 px-3">{{ $fleet->name }}</td>
                                        <td class="py-2 px-3 text-gray-300">{{ $fleet->code }}</td>
                                        <td class="py-2 px-3 text-gray-300">{{ $fleet->size }}</td>
                                        <td class="py-2 px-3">
                                            Rp {{ number_format($fleet->price_per_km, 0, ',', '.') }}
                                        </td>
                                        <td class="py-2 px-3">
                                            {{ rtrim(rtrim(number_format($fleet->capacity_m3, 2, ',', '.'), '0'), ',') }}
                                        </td>
                                        <td class="py-2 px-3 space-x-3">
                                            <a href="{{ route('admin.fleets.edit', $fleet) }}"
                                               class="text-xs font-semibold px-3 py-1 rounded bg-blue-500 hover:bg-blue-400 text-white">
                                                Edit
                                            </a>

                                            <form action="{{ route('admin.fleets.destroy', $fleet) }}"
                                                  method="POST"
                                                  class="inline"
                                                  onsubmit="return confirm('Yakin ingin menghapus armada ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="text-xs font-semibold px-3 py-1 rounded bg-red-600 hover:bg-red-500 text-white">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
