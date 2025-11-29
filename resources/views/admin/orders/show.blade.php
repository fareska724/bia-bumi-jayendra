<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="py-10">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- HEADER --}}
            <div class="bg-slate-900 rounded-2xl shadow-lg border border-yellow-500 px-8 py-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-yellow-400">
                            Detail Pesanan
                        </h1>
                        <p class="mt-2 text-sm text-gray-200">
                            Kode pesanan: <span class="font-mono text-yellow-300">{{ $order->order_code }}</span>
                        </p>
                    </div>

                    <div class="text-right">
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
                        <div class="mt-2 text-xs text-gray-400">
                            Dibuat: {{ $order->created_at?->format('d M Y H:i') }}
                        </div>
                    </div>
                </div>
            </div>

            {{-- BODY --}}
            <div class="bg-slate-900 rounded-2xl shadow-lg px-8 py-6 text-white space-y-6">

                {{-- CUSTOMER + PENGIRIMAN --}}
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <h2 class="text-sm font-semibold text-yellow-300 mb-2">
                            Data Customer
                        </h2>
                        <div class="text-sm">
                            <div class="font-semibold">
                                {{-- Nanti gampang diganti sesuai struktur customer --}}
                                {{ trim(($order->customer->first_name ?? '') . ' ' . ($order->customer->last_name ?? '')) ?: '-' }}
                            </div>
                            @if(!empty($order->customer->phone))
                                <div class="text-gray-300 text-xs mt-1">
                                    Telp: {{ $order->customer->phone }}
                                </div>
                            @endif
                            @if(!empty($order->customer->address))
                                <div class="text-gray-300 text-xs mt-1">
                                    Alamat: {{ $order->customer->address }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div>
                        <h2 class="text-sm font-semibold text-yellow-300 mb-2">
                            Informasi Pengiriman
                        </h2>
                        <div class="text-sm">
                            <div class="text-gray-200">
                                Armada:
                                <span class="font-semibold">
                                    {{ $order->fleet->name ?? '-' }}
                                </span>
                            </div>
                            <div class="text-gray-300 text-xs mt-1">
                                Kapasitas:
                                {{ $order->fleet?->capacity_m3 ? $order->fleet->capacity_m3 . ' m³' : '-' }}
                                @if($order->fleet?->price_per_km)
                                    • Tarif: Rp {{ number_format($order->fleet->price_per_km, 0, ',', '.') }}/km
                                @endif
                            </div>
                            <div class="mt-3 text-xs text-gray-300">
                                Alamat kirim:<br>
                                <span class="text-gray-100">
                                    {{ $order->shipping_address }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- RINGKASAN NILAI --}}
                <div class="grid md:grid-cols-3 gap-4 text-sm">
                    <div class="bg-slate-800 rounded-xl p-4">
                        <div class="text-xs text-gray-400">Total Item</div>
                        <div class="mt-1 text-2xl font-bold text-yellow-300">
                            {{ $order->total_items }}
                        </div>
                    </div>
                    <div class="bg-slate-800 rounded-xl p-4">
                        <div class="text-xs text-gray-400">Total Harga</div>
                        <div class="mt-1 text-2xl font-bold text-yellow-300">
                            Rp {{ number_format($order->total_price, 0, ',', '.') }}
                        </div>
                    </div>
                    <div class="bg-slate-800 rounded-xl p-4">
                        <div class="text-xs text-gray-400">Status</div>
                        <div class="mt-1 text-sm">
                            <span class="inline-flex items-center px-3 py-1 rounded-full border text-xs font-medium
                                {{ $statusColors[$order->status] ?? 'bg-slate-700 text-gray-200 border-slate-600' }}">
                                {{ strtoupper(str_replace('_', ' ', $order->status)) }}
                            </span>
                        </div>
                    </div>
                </div>

                {{-- CATATAN --}}
                @if(!empty($order->note))
                    <div>
                        <h2 class="text-sm font-semibold text-yellow-300 mb-2">
                            Catatan Customer
                        </h2>
                        <p class="text-sm text-gray-200">
                            {{ $order->note }}
                        </p>
                    </div>
                @endif

                {{-- BUTTON KEMBALI --}}
                <div class="pt-4 border-t border-slate-800 flex justify-between items-center">
                    <a href="{{ route('admin.orders.index') }}"
                       class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-medium
                              bg-slate-800 text-gray-100 hover:bg-slate-700 transition">
                        ← Kembali ke daftar pesanan
                    </a>

                    {{-- nanti bisa ditambah tombol Ubah Status di sini --}}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
