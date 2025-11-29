<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- HEADER CARD --}}
            <div class="bg-slate-900 rounded-2xl shadow-lg border border-yellow-500 px-8 py-6">
                <h1 class="text-2xl font-bold text-yellow-400">
                    Manajemen Pesanan
                </h1>
                <p class="mt-2 text-sm text-gray-200">
                    Lihat daftar pesanan batu split yang masuk dari customer.
                </p>
            </div>

            {{-- TABEL PESANAN --}}
            <div class="bg-slate-900 rounded-2xl shadow-lg px-8 py-6 text-white">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-yellow-300">
                        Daftar Pesanan Masuk
                    </h2>
                </div>

                <div class="overflow-x-auto rounded-xl border border-slate-800">
                    <table class="min-w-full divide-y divide-slate-800 text-sm">
                        <thead class="bg-slate-800/80">
                            <tr class="text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                                <th class="px-4 py-3">#</th>
                                <th class="px-4 py-3">Kode</th>
                                <th class="px-4 py-3">Customer</th>
                                <th class="px-4 py-3">Armada</th>
                                <th class="px-4 py-3">Total Item</th>
                                <th class="px-4 py-3">Total Harga</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Tanggal</th>
                                <th class="px-4 py-3 text-right">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-800 bg-slate-900/60">
                            @forelse($orders as $index => $order)
                                <tr class="hover:bg-slate-800/60 transition">
                                    {{-- # --}}
                                    <td class="px-4 py-3 text-gray-400">
                                        {{ $orders->firstItem() + $index }}
                                    </td>

                                    {{-- Kode --}}
                                    <td class="px-4 py-3 font-mono text-yellow-300">
                                        {{ $order->order_code }}
                                    </td>

                                    {{-- Customer --}}
                                    <td class="px-4 py-3">
                                        <div class="text-sm font-semibold text-white">
                                            {{ trim(($order->customer->first_name ?? '') . ' ' . ($order->customer->last_name ?? '')) ?: '-' }}
                                        </div>
                                        <div class="text-xs text-gray-400">
                                            {{ $order->customer->phone ?? '-' }}
                                        </div>
                                    </td>

                                    {{-- Armada --}}
                                    <td class="px-4 py-3 text-sm text-gray-200">
                                        {{ $order->fleet->name ?? '-' }}
                                    </td>

                                    {{-- Total item --}}
                                    <td class="px-4 py-3 text-sm text-gray-200">
                                        {{ $order->total_items }}
                                    </td>

                                    {{-- Total harga --}}
                                    <td class="px-4 py-3 text-sm text-gray-200">
                                        Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                    </td>

                                    {{-- Status --}}
                                    <td class="px-4 py-3">
                                        @php
                                            $statusColors = [
                                                'pending'    => 'bg-yellow-500/10 text-yellow-300 border-yellow-500/40',
                                                'confirmed'  => 'bg-blue-500/10 text-blue-300 border-blue-500/40',
                                                'on_delivery'=> 'bg-purple-500/10 text-purple-300 border-purple-500/40',
                                                'completed'  => 'bg-green-500/10 text-green-300 border-green-500/40',
                                                'cancelled'  => 'bg-red-500/10 text-red-300 border-red-500/40',
                                            ];
                                        @endphp
                                        <span class="inline-flex items-center px-3 py-1 rounded-full border text-xs font-medium
                                            {{ $statusColors[$order->status] ?? 'bg-slate-700 text-gray-200 border-slate-600' }}">
                                            {{ strtoupper(str_replace('_', ' ', $order->status)) }}
                                        </span>
                                    </td>

                                    {{-- Tanggal --}}
                                    <td class="px-4 py-3 text-xs text-gray-300">
                                        {{ $order->created_at?->format('d M Y H:i') }}
                                    </td>

                                    {{-- Aksi --}}
                                    <td class="px-4 py-3 text-right">
                                        <a href="{{ route('admin.orders.show', $order) }}"
                                           class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-semibold
                                                  bg-yellow-500 text-black hover:bg-yellow-400 transition">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="px-4 py-6 text-center text-gray-400">
                                        Belum ada pesanan masuk.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $orders->links() }}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
