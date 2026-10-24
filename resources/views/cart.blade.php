@extends('layouts.app')

@section('title', 'Keranjang Belanja - Mitra Setia')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 py-10 min-h-[75vh]">
    <!-- Breadcrumbs -->
    <nav class="flex items-center gap-2 text-xs text-zinc-400 mb-6">
        <a href="{{ route('home') }}" class="hover:text-black transition-colors">Beranda</a>
        <span>/</span>
        <a href="{{ route('catalog') }}" class="hover:text-black transition-colors">Katalog</a>
        <span>/</span>
        <span class="text-black font-semibold">Keranjang Belanja</span>
    </nav>

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8 pb-5 border-b border-zinc-100">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-black tracking-tight">
                Keranjang Belanja
            </h1>
            <p class="text-xs sm:text-sm text-zinc-500 mt-1">Periksa daftar pesanan software &amp; hardware POS Anda sebelum lanjut ke checkout.</p>
        </div>
        @if (!empty($cart))
            <form action="{{ route('cart.clear') }}" method="POST" onsubmit="return confirm('Kosongkan keranjang belanja?')">
                @csrf
                <button type="submit" class="h-9 px-4 bg-zinc-100 hover:bg-zinc-200 text-zinc-700 rounded-full text-xs font-semibold transition-colors inline-flex items-center gap-1">
                    <span class="material-symbols-outlined text-base">delete</span>
                    <span>Kosongkan</span>
                </button>
            </form>
        @endif
    </div>

    @if (empty($cart))
        <div class="bg-white rounded-3xl border border-zinc-200/80 p-16 text-center max-w-lg mx-auto shadow-sm">
            <span class="material-symbols-outlined text-5xl text-zinc-300 mb-3">remove_shopping_cart</span>
            <h2 class="text-lg font-bold text-black">Keranjang Belanja Anda Kosong</h2>
            <p class="text-xs text-zinc-500 mt-1 mb-6">Pilih software kasir, paket usaha, printer thermal, atau scanner barcode dari katalog kami.</p>
            <div>
                <a href="{{ route('catalog') }}" class="h-11 px-6 bg-black hover:bg-zinc-800 text-white rounded-full text-xs font-semibold inline-flex items-center gap-2 transition-all">
                    <span>Buka Katalog Produk</span>
                    <span class="material-symbols-outlined text-base">east</span>
                </a>
            </div>
        </div>
    @else
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            <!-- Items Table (Col 8) -->
            <div class="lg:col-span-8 bg-white rounded-3xl border border-zinc-200/80 p-6 shadow-sm">
                <div class="divide-y divide-zinc-100">
                    @foreach ($cart as $id => $item)
                        <div class="py-5 first:pt-0 last:pb-0 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                            <div class="flex items-center gap-4">
                                <div class="size-18 rounded-2xl bg-zinc-50 border border-zinc-100 p-2 shrink-0 flex items-center justify-center">
                                    <img src="{{ Str::startsWith($item['image'], ['http://', 'https://', 'data:']) ? $item['image'] : asset($item['image']) }}" 
                                         alt="{{ $item['name'] }}" 
                                         class="max-h-full max-w-full object-contain"
                                         onerror="this.src='https://placehold.co/100x100/FAFAFA/18181B?text=Produk'">
                                </div>
                                <div>
                                    <a href="{{ route('product.show', $id) }}" class="font-bold text-black hover:underline text-sm sm:text-base line-clamp-1">
                                        {{ $item['name'] }}
                                    </a>
                                    <div class="text-xs text-zinc-400 mt-0.5">Garansi Resmi Mitra Setia &bull; 100% Original</div>
                                    <div class="text-sm font-extrabold text-black mt-1">
                                        Rp {{ number_format($item['price'], 0, ',', '.') }}
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-between sm:justify-end gap-5 pt-3 sm:pt-0 border-t sm:border-t-0 border-zinc-100">
                                <!-- Qty Stepper -->
                                <form action="{{ route('cart.update') }}" method="POST" class="flex items-center border border-zinc-200 rounded-full h-9 bg-zinc-50 px-1">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <button type="submit" name="qty" value="{{ $item['qty'] - 1 }}" 
                                            class="w-7 h-full flex items-center justify-center text-zinc-600 hover:text-black font-bold {{ $item['qty'] <= 1 ? 'opacity-30 cursor-not-allowed' : '' }}" 
                                            {{ $item['qty'] <= 1 ? 'disabled' : '' }}>
                                        &minus;
                                    </button>
                                    <input type="number" value="{{ $item['qty'] }}" class="w-8 text-center text-xs font-bold bg-transparent focus:outline-none" readonly>
                                    <button type="submit" name="qty" value="{{ $item['qty'] + 1 }}" 
                                            class="w-7 h-full flex items-center justify-center text-zinc-600 hover:text-black font-bold">
                                        &plus;
                                    </button>
                                </form>

                                <!-- Subtotal -->
                                <div class="text-right min-w-[90px]">
                                    <span class="text-[10px] uppercase text-zinc-400 font-bold block">Subtotal</span>
                                    <span class="font-extrabold text-black text-sm">
                                        Rp {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}
                                    </span>
                                </div>

                                <!-- Delete -->
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <button type="submit" class="size-8 rounded-full flex items-center justify-center text-zinc-400 hover:text-red-600 hover:bg-zinc-100 transition-colors" title="Hapus">
                                        <span class="material-symbols-outlined text-base">delete</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Summary & Actions (Col 4) -->
            <div class="lg:col-span-4 space-y-4">
                <div class="bg-white rounded-3xl border border-zinc-200/80 p-6 shadow-sm">
                    <h2 class="text-sm font-bold text-black pb-4 border-b border-zinc-100 flex items-center justify-between">
                        <span>Ringkasan Pesanan</span>
                        <span class="text-xs text-zinc-400 font-semibold">{{ count($cart) }} Produk</span>
                    </h2>

                    <div class="py-4 border-b border-zinc-100 space-y-2.5 text-xs">
                        <div class="flex justify-between text-zinc-600">
                            <span>Total Harga Produk</span>
                            <span class="font-bold text-black">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-zinc-600">
                            <span>Verifikasi &amp; Pengiriman</span>
                            <span class="font-bold text-emerald-700">via WhatsApp</span>
                        </div>
                    </div>

                    <div class="py-4 flex justify-between items-center">
                        <div>
                            <span class="text-[10px] uppercase tracking-wider text-zinc-400 font-bold block">Total Akhir</span>
                            <span class="text-[10px] text-zinc-400">Belum termasuk ongkir jika ada</span>
                        </div>
                        <span class="font-extrabold text-xl text-black">
                            Rp {{ number_format($total, 0, ',', '.') }}
                        </span>
                    </div>

                    <div class="space-y-3 pt-2">
                        <!-- Primary Action: Lanjut Checkout -->
                        <a href="{{ route('checkout') }}" class="w-full h-12 bg-black hover:bg-zinc-800 text-white rounded-full font-semibold text-xs sm:text-sm inline-flex items-center justify-center gap-2 transition-all shadow-sm">
                            <span>Lanjut Pengisian Data</span>
                            <span class="material-symbols-outlined text-base">east</span>
                        </a>

                        <div class="p-3 bg-zinc-50 border border-zinc-100 rounded-2xl text-center">
                            <span class="text-[11px] text-zinc-500 block leading-relaxed">
                                Pesanan akan diverifikasi langsung oleh Admin Mitra Setia via WhatsApp.
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
