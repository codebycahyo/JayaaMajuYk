@extends('layouts.app')

@section('title', 'Keranjang Belanja - Jaya Maju Yk')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 py-6 sm:py-8 min-h-[75vh]">
    <!-- Breadcrumbs -->
    <nav class="flex items-center gap-2 text-xs text-slate-500 mb-6">
        <a href="{{ route('home') }}" class="hover:text-primary transition-colors">Beranda</a>
        <span>/</span>
        <a href="{{ route('catalog') }}" class="hover:text-primary transition-colors">Katalog</a>
        <span>/</span>
        <span class="text-slate-800 font-semibold">Keranjang Belanja</span>
    </nav>

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6 pb-4 border-b border-border-subtle">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-2xl">shopping_cart</span>
                <span>Keranjang Belanja</span>
            </h1>
            <p class="text-xs text-slate-500 mt-1">Periksa daftar pesanan hardware POS Anda sebelum lanjut ke pengisian data.</p>
        </div>
        @if (!empty($cart))
            <form action="{{ route('cart.clear') }}" method="POST" onsubmit="return confirm('Kosongkan keranjang belanja?')">
                @csrf
                <button type="submit" class="h-9 px-3 bg-white hover:bg-red-50 text-red-600 rounded-lg text-xs font-bold border border-red-200 transition-colors inline-flex items-center gap-1">
                    <span class="material-symbols-outlined text-base">delete</span>
                    <span>Kosongkan</span>
                </button>
            </form>
        @endif
    </div>

    @if (empty($cart))
        <div class="bg-white rounded-xl border border-border-subtle p-12 text-center max-w-lg mx-auto">
            <span class="material-symbols-outlined text-5xl text-slate-300 mb-2">remove_shopping_cart</span>
            <h2 class="text-base font-bold text-slate-800">Keranjang Belanja Anda Kosong</h2>
            <p class="text-xs text-slate-500 mt-1">Pilih perangkat kasir, printer thermal, atau scanner barcode dari katalog kami.</p>
            <div class="mt-6">
                <a href="{{ route('catalog') }}" class="h-11 px-5 bg-primary hover:bg-primary-dark text-white rounded-lg text-xs font-bold inline-flex items-center gap-1.5 transition-colors shadow-xs">
                    <span class="material-symbols-outlined text-base">storefront</span>
                    <span>Buka Katalog Hardware</span>
                </a>
            </div>
        </div>
    @else
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            <!-- Items Table (Col 8) -->
            <div class="lg:col-span-8 bg-white rounded-xl border border-border-subtle p-4 sm:p-5 shadow-xs">
                <div class="divide-y divide-border-subtle">
                    @foreach ($cart as $id => $item)
                        <div class="py-4 first:pt-0 last:pb-0 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                            <div class="flex items-center gap-3">
                                <div class="size-16 rounded-lg bg-surface-bg border border-border-subtle p-1.5 shrink-0 flex items-center justify-center">
                                    <img src="{{ Str::startsWith($item['image'], 'http') ? $item['image'] : asset($item['image']) }}" 
                                         alt="{{ $item['name'] }}" 
                                         class="max-h-full max-w-full object-contain"
                                         onerror="this.src='https://placehold.co/100x100?text=HW'">
                                </div>
                                <div>
                                    <a href="{{ route('product.show', $id) }}" class="font-bold text-slate-900 hover:text-primary transition-colors text-xs sm:text-sm line-clamp-1">
                                        {{ $item['name'] }}
                                    </a>
                                    <div class="text-[11px] text-slate-500 mt-0.5">Garansi Resmi 1 Tahun &bull; Original</div>
                                    <div class="text-xs font-black text-slate-900 mt-1">
                                        Rp {{ number_format($item['price'], 0, ',', '.') }}
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-between sm:justify-end gap-5 pt-2 sm:pt-0 border-t sm:border-t-0 border-slate-100">
                                <!-- Qty Stepper (Touch-Friendly) -->
                                <form action="{{ route('cart.update') }}" method="POST" class="flex items-center border border-border-bold rounded-lg h-10 bg-white">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <button type="submit" name="qty" value="{{ $item['qty'] - 1 }}" 
                                            class="w-9 h-full flex items-center justify-center text-slate-600 hover:text-primary font-bold {{ $item['qty'] <= 1 ? 'opacity-30 cursor-not-allowed' : '' }}" 
                                            {{ $item['qty'] <= 1 ? 'disabled' : '' }}>
                                        &minus;
                                    </button>
                                    <input type="number" value="{{ $item['qty'] }}" class="w-10 text-center text-xs font-bold border-x border-border-bold py-1 focus:outline-none" readonly>
                                    <button type="submit" name="qty" value="{{ $item['qty'] + 1 }}" 
                                            class="w-9 h-full flex items-center justify-center text-slate-600 hover:text-primary font-bold">
                                        &plus;
                                    </button>
                                </form>

                                <!-- Subtotal -->
                                <div class="text-right min-w-[90px]">
                                    <span class="text-[10px] uppercase text-slate-400 font-bold block">Subtotal</span>
                                    <span class="font-black text-slate-900 text-xs sm:text-sm">
                                        Rp {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}
                                    </span>
                                </div>

                                <!-- Delete -->
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <button type="submit" class="size-9 rounded-lg flex items-center justify-center text-slate-400 hover:text-red-600 hover:bg-red-50 transition-colors" title="Hapus">
                                        <span class="material-symbols-outlined text-lg">delete</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Summary & Actions (Col 4) -->
            <div class="lg:col-span-4 space-y-4">
                <div class="bg-white rounded-xl border border-border-subtle p-5 shadow-xs">
                    <h2 class="text-sm font-bold text-slate-900 pb-3 border-b border-border-subtle flex items-center justify-between">
                        <span>Ringkasan Pesanan</span>
                        <span class="text-xs font-bold text-slate-500">{{ count($cart) }} Hardware</span>
                    </h2>

                    <div class="py-3 border-b border-border-subtle space-y-2 text-xs">
                        <div class="flex justify-between text-slate-600">
                            <span>Total Harga Produk</span>
                            <span class="font-bold text-slate-900">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-slate-600">
                            <span>Konfirmasi & Ongkir</span>
                            <span class="font-bold text-emerald-700">via WhatsApp</span>
                        </div>
                    </div>

                    <div class="py-3 flex justify-between items-center">
                        <div>
                            <span class="text-[11px] uppercase tracking-wider text-slate-400 font-bold block">Total Akhir</span>
                            <span class="text-[10px] text-slate-500">Belum termasuk ongkir jika ada</span>
                        </div>
                        <span class="font-black text-xl text-slate-900">
                            Rp {{ number_format($total, 0, ',', '.') }}
                        </span>
                    </div>

                    <div class="space-y-2.5 pt-2">
                        <!-- Primary Action: Lanjut Beli -->
                        <a href="{{ route('checkout') }}" class="w-full h-12 bg-primary hover:bg-primary-dark text-white rounded-lg font-bold text-xs sm:text-sm inline-flex items-center justify-center gap-2 transition-colors shadow-xs">
                            <span class="material-symbols-outlined text-base">shopping_bag</span>
                            <span>Lanjut Beli</span>
                        </a>

                        <div class="p-3 bg-surface-bg border border-border-subtle rounded-lg text-center">
                            <span class="text-[11px] text-slate-600 block leading-relaxed">
                                Anda akan mengisi data penerima & alamat pengiriman sebelum konfirmasi ke WhatsApp.
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
