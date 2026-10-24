@extends('layouts.app')

@section('title', 'Lacak Status Pesanan - Mitra Setia')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 py-10 min-h-[75vh]">
    <!-- Breadcrumbs -->
    <nav class="flex items-center gap-2 text-xs text-zinc-400 mb-6">
        <a href="{{ route('home') }}" class="hover:text-black transition-colors">Beranda</a>
        <span>/</span>
        <span class="text-black font-semibold">Lacak Pesanan</span>
    </nav>

    <!-- Search Box Card -->
    <div class="bg-white rounded-3xl border border-zinc-200/80 p-8 sm:p-12 shadow-sm mb-10 text-center">
        <div class="size-14 rounded-2xl bg-zinc-100 text-black flex items-center justify-center mx-auto mb-4">
            <span class="material-symbols-outlined text-2xl">local_shipping</span>
        </div>
        <h1 class="text-2xl sm:text-3xl font-extrabold text-black tracking-tight">Pelacakan Pesanan</h1>
        <p class="text-xs sm:text-sm text-zinc-500 mt-1 max-w-md mx-auto">
            Periksa status verifikasi pembayaran, persiapan packing, dan pengiriman paket hardware Anda.
        </p>

        <form action="{{ route('order.track') }}" method="GET" class="mt-8 max-w-xl mx-auto">
            <div class="flex flex-col sm:flex-row items-center gap-2.5">
                <div class="relative flex-grow w-full">
                    <input type="text" name="q" value="{{ $search }}" required
                           placeholder="Nomor Faktur (INV-EC-...) atau Nomor HP..."
                           class="w-full h-11 px-4 text-xs sm:text-sm rounded-full bg-zinc-50 border border-zinc-200 focus:bg-white focus:border-black focus:outline-none text-black transition-all">
                </div>
                <button type="submit" class="w-full sm:w-auto h-11 px-7 bg-black hover:bg-zinc-800 text-white rounded-full font-semibold text-xs sm:text-sm transition-all shadow-sm shrink-0">
                    Cari Pesanan
                </button>
            </div>
            <div class="text-[11px] text-zinc-400 mt-2.5">
                Contoh: <code class="font-mono bg-zinc-100 px-1.5 py-0.5 rounded text-zinc-700">INV-EC-2026...</code> atau nomor WhatsApp saat checkout.
            </div>
        </form>
    </div>

    @if (!empty($search))
        @if ($order)
            <!-- Result Box -->
            <div class="bg-white rounded-xl border border-border-subtle p-6 shadow-xs space-y-6">
                <!-- Summary Header -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-4 border-b border-border-subtle gap-3">
                    <div>
                        <span class="text-[11px] text-slate-400 font-bold uppercase tracking-wider block">No. Faktur</span>
                        <span class="font-mono font-extrabold text-base text-slate-900">{{ $order->invoice_number }}</span>
                        <div class="text-[11px] text-slate-400 mt-0.5">Waktu Pesan: {{ $order->created_at->format('d M Y, H:i') }} WIB</div>
                    </div>

                    <div class="flex items-center gap-2">
                        @if ($order->payment_status === 'paid')
                            <span class="px-3 py-1 bg-emerald-50 text-emerald-800 border border-emerald-200 rounded-md text-xs font-bold">
                                &bull; Pembayaran Terverifikasi
                            </span>
                        @else
                            <span class="px-3 py-1 bg-amber-50 text-amber-800 border border-amber-200 rounded-md text-xs font-bold">
                                &bull; Menunggu Konfirmasi WA
                            </span>
                        @endif

                        @if ($order->order_status === 'completed')
                            <span class="px-3 py-1 bg-blue-50 text-blue-800 border border-blue-200 rounded-md text-xs font-bold">Selesai</span>
                        @elseif ($order->order_status === 'processing')
                            <span class="px-3 py-1 bg-purple-50 text-purple-800 border border-purple-200 rounded-md text-xs font-bold">Diproses</span>
                        @elseif ($order->order_status === 'cancelled')
                            <span class="px-3 py-1 bg-red-50 text-red-800 border border-red-200 rounded-md text-xs font-bold">Batal</span>
                        @else
                            <span class="px-3 py-1 bg-slate-100 text-slate-700 border border-slate-200 rounded-md text-xs font-bold">Masuk</span>
                        @endif
                    </div>
                </div>

                <!-- 4-Step Progress Timeline -->
                @php
                    $step1 = true;
                    $step2 = ($order->payment_status === 'paid');
                    $step3 = ($order->order_status === 'processing' || $order->order_status === 'completed');
                    $step4 = ($order->order_status === 'completed');
                @endphp

                <div>
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-4">Progres Pesanan</h3>
                    <div class="grid grid-cols-4 gap-2 text-center text-xs">
                        <!-- Step 1 -->
                        <div class="space-y-1.5">
                            <div class="size-8 mx-auto rounded-full flex items-center justify-center font-bold {{ $step1 ? 'bg-primary text-white' : 'bg-slate-200 text-slate-500' }}">
                                1
                            </div>
                            <div class="font-bold {{ $step1 ? 'text-primary' : 'text-slate-400' }}">Pesanan Dibuat</div>
                            <div class="text-[10px] text-slate-400 hidden sm:block">Tersimpan di sistem</div>
                        </div>

                        <!-- Step 2 -->
                        <div class="space-y-1.5">
                            <div class="size-8 mx-auto rounded-full flex items-center justify-center font-bold {{ $step2 ? 'bg-emerald-600 text-white' : 'bg-slate-100 text-slate-400 border border-border-bold' }}">
                                2
                            </div>
                            <div class="font-bold {{ $step2 ? 'text-emerald-700' : 'text-slate-400' }}">Verifikasi WA</div>
                            <div class="text-[10px] text-slate-400 hidden sm:block">{{ $step2 ? 'Lunas / Terverifikasi' : 'Pending' }}</div>
                        </div>

                        <!-- Step 3 -->
                        <div class="space-y-1.5">
                            <div class="size-8 mx-auto rounded-full flex items-center justify-center font-bold {{ $step3 ? 'bg-primary text-white' : 'bg-slate-100 text-slate-400 border border-border-bold' }}">
                                3
                            </div>
                            <div class="font-bold {{ $step3 ? 'text-primary' : 'text-slate-400' }}">QC & Packing</div>
                            <div class="text-[10px] text-slate-400 hidden sm:block">{{ $step3 ? 'Pengemasan aman' : 'Menunggu' }}</div>
                        </div>

                        <!-- Step 4 -->
                        <div class="space-y-1.5">
                            <div class="size-8 mx-auto rounded-full flex items-center justify-center font-bold {{ $step4 ? 'bg-emerald-600 text-white' : 'bg-slate-100 text-slate-400 border border-border-bold' }}">
                                4
                            </div>
                            <div class="font-bold {{ $step4 ? 'text-emerald-700' : 'text-slate-400' }}">Selesai</div>
                            <div class="text-[10px] text-slate-400 hidden sm:block">{{ $step4 ? 'Barang diterima' : 'Pengiriman' }}</div>
                        </div>
                    </div>
                </div>

                <!-- Recipient & Order Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-3 border-t border-border-subtle text-xs">
                    <div class="p-4 rounded-lg bg-surface-bg border border-border-subtle space-y-1.5">
                        <span class="font-bold text-slate-700 block uppercase tracking-wider text-[11px]">Tujuan Pengiriman</span>
                        <div><span class="text-slate-500">Penerima:</span> <strong class="text-slate-800">{{ $order->customer_name }}</strong> ({{ $order->customer_phone }})</div>
                        <div><span class="text-slate-500">Alamat:</span> <span class="text-slate-800">{{ $order->customer_address }}</span></div>
                    </div>

                    <div class="p-4 rounded-lg bg-surface-bg border border-border-subtle space-y-1.5">
                        <span class="font-bold text-slate-700 block uppercase tracking-wider text-[11px]">Rincian Total</span>
                        <div class="flex justify-between"><span class="text-slate-500">Total Harga:</span> <strong class="text-slate-900">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</strong></div>
                        <div class="flex justify-between"><span class="text-slate-500">Metode:</span> <span class="text-slate-800">{{ $order->payment_method }}</span></div>
                    </div>
                </div>

                <!-- Items List -->
                <div>
                    <h4 class="text-[11px] font-bold uppercase tracking-wider text-slate-500 mb-2">Item Hardware Dipesan</h4>
                    <div class="divide-y divide-border-subtle border border-border-subtle rounded-lg overflow-hidden bg-white">
                        @foreach ($order->items as $item)
                            <div class="p-3 flex items-center justify-between text-xs">
                                <div>
                                    <div class="font-bold text-slate-800">{{ $item->product_name }}</div>
                                    <div class="text-[11px] text-slate-500">{{ $item->qty }} &times; Rp {{ number_format($item->price, 0, ',', '.') }}</div>
                                </div>
                                <div class="font-bold text-slate-900">
                                    Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Customer Care Hotline -->
                <div class="p-4 rounded-lg bg-slate-50 border border-slate-200 flex flex-col sm:flex-row sm:items-center justify-between gap-3 text-xs">
                    <div>
                        <span class="font-bold text-slate-900 block">Ada pertanyaan terkait pesanan ini?</span>
                        <span class="text-slate-500">Hubungi langsung customer support Jaya Maju Yk di WhatsApp.</span>
                    </div>
                    <a href="https://wa.me/6281234567890?text={{ urlencode('Halo Jaya Maju Yk, saya ingin menanyakan status faktur ' . $order->invoice_number) }}" target="_blank" class="h-10 px-4 bg-wa-green hover:bg-wa-hover text-white rounded-lg font-bold inline-flex items-center justify-center gap-1.5 transition-colors shrink-0">
                        <span>Chat CS WhatsApp</span>
                    </a>
                </div>
            </div>
        @else
            <!-- Not Found -->
            <div class="bg-white rounded-xl border border-border-subtle p-8 text-center max-w-md mx-auto">
                <span class="material-symbols-outlined text-4xl text-amber-500 mb-2">search_off</span>
                <h3 class="text-sm font-bold text-slate-900">Faktur Tidak Ditemukan</h3>
                <p class="text-xs text-slate-500 mt-1">Nomor "{{ $search }}" tidak terdaftar di sistem kami. Pastikan nomor invoice atau nomor HP sudah sesuai.</p>
                <a href="{{ route('order.track') }}" class="mt-4 inline-block text-xs font-bold text-primary hover:underline">
                    Cari Ulang
                </a>
            </div>
        @endif
    @endif
</div>
@endsection
