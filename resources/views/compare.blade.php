@extends('layouts.app')

@section('title', 'Perbandingan Produk Kasir - Mitra Setia')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 py-6 sm:py-8 min-h-[75vh]">
    <!-- Breadcrumbs -->
    <nav class="flex items-center gap-2 text-xs text-slate-500 mb-6">
        <a href="{{ route('home') }}" class="hover:text-primary transition-colors">Beranda</a>
        <span>/</span>
        <a href="{{ route('catalog') }}" class="hover:text-primary transition-colors">Katalog</a>
        <span>/</span>
        <span class="text-slate-800 font-semibold">Bandingkan Produk</span>
    </nav>

    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6 pb-4 border-b border-border-subtle">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-2xl">compare_arrows</span>
                <span>Perbandingan Spesifikasi Produk</span>
            </h1>
            <p class="text-xs text-slate-500 mt-1">
                Bandingkan spesifikasi teknis software dan perangkat kasir secara berdampingan.
            </p>
        </div>
        @if ($compareProducts->isNotEmpty())
            <form action="{{ route('compare.clear') }}" method="POST">
                @csrf
                <button type="submit" class="h-9 px-3 border border-border-bold bg-white hover:bg-red-50 hover:text-red-600 rounded-lg text-xs font-bold transition-colors inline-flex items-center gap-1">
                    <span class="material-symbols-outlined text-sm">delete</span>
                    <span>Kosongkan</span>
                </button>
            </form>
        @endif
    </div>

    @if ($compareProducts->isEmpty())
        <div class="bg-white rounded-xl border border-border-subtle p-12 text-center max-w-lg mx-auto">
            <span class="material-symbols-outlined text-5xl text-slate-300 mb-2">compare_arrows</span>
            <h2 class="text-base font-bold text-slate-800">Belum Ada Produk untuk Dibandingkan</h2>
            <p class="text-xs text-slate-500 mt-1 mb-5">Pilih produk dari katalog kami untuk membandingkan spesifikasi teknis (maks. 4 perangkat).</p>
            <a href="{{ route('catalog') }}" class="h-11 px-5 bg-primary hover:bg-primary-dark text-white rounded-lg text-xs font-bold inline-flex items-center gap-1.5 transition-colors shadow-xs">
                <span class="material-symbols-outlined text-base">storefront</span>
                <span>Buka Katalog Hardware</span>
            </a>
        </div>
    @else
        <div class="bg-white border border-border-subtle rounded-xl overflow-hidden shadow-xs">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse min-w-[750px]">
                    <thead class="bg-surface-bg border-b border-border-subtle">
                        <tr>
                            <th class="p-4 w-1/4 align-top text-xs font-bold uppercase tracking-wider text-slate-500">
                                Parameter Hardware
                            </th>
                            @foreach ($compareProducts as $product)
                                <th class="p-4 w-1/4 border-l border-border-subtle align-top">
                                    <div class="flex flex-col gap-2 relative">
                                        <!-- Remove button -->
                                        <form action="{{ route('compare.remove') }}" method="POST" class="absolute top-0 right-0 z-10">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <button type="submit" class="size-7 bg-white hover:bg-red-500 text-slate-400 hover:text-white border border-border-bold rounded-md flex items-center justify-center transition-colors" title="Hapus">
                                                <span class="material-symbols-outlined text-xs">close</span>
                                            </button>
                                        </form>

                                        <div class="w-full h-32 bg-white rounded-lg p-2 flex items-center justify-center border border-border-subtle">
                                            <img class="max-w-full max-h-full object-contain" 
                                                 src="{{ Str::startsWith($product->image, ['http://', 'https://', 'data:']) ? $product->image : asset($product->image) }}" 
                                                 alt="{{ $product->name }}"
                                                 onerror="this.src='https://placehold.co/200x200?text=Produk'">
                                        </div>

                                        <div>
                                            <span class="text-[10px] font-bold text-primary bg-primary/10 px-1.5 py-0.5 rounded">
                                                {{ $product->category }}
                                            </span>
                                            <h3 class="text-xs font-bold text-slate-900 mt-1 line-clamp-2">
                                                <a href="{{ route('product.show', $product->id) }}" class="hover:text-primary">
                                                    {{ $product->name }}
                                                </a>
                                            </h3>
                                            <div class="text-sm font-black text-slate-900 mt-1">
                                                Rp {{ number_format($product->price, 0, ',', '.') }}
                                            </div>
                                        </div>

                                        <form action="{{ route('cart.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <input type="hidden" name="qty" value="1">
                                            <button type="submit" class="w-full h-10 px-2 bg-primary hover:bg-primary-dark text-white rounded-lg text-xs font-bold inline-flex items-center justify-center gap-1 transition-colors shadow-xs">
                                                <span class="material-symbols-outlined text-sm">shopping_cart</span>
                                                <span>+ Keranjang</span>
                                            </button>
                                        </form>
                                    </div>
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border-subtle text-xs">
                        <!-- Ketersediaan Stok -->
                        <tr class="hover:bg-slate-50/50">
                            <td class="p-3.5 font-bold text-slate-700 bg-surface-bg">Ketersediaan Stok</td>
                            @foreach ($compareProducts as $p)
                                <td class="p-3.5 border-l border-border-subtle">
                                    @if ($p->stock > 0)
                                        <span class="text-emerald-700 font-bold">&bull; Ready ({{ $p->stock }} unit)</span>
                                    @else
                                        <span class="text-red-600 font-bold">&bull; Stok Habis</span>
                                    @endif
                                </td>
                            @endforeach
                        </tr>

                        <!-- Garansi -->
                        <tr class="hover:bg-slate-50/50">
                            <td class="p-3.5 font-bold text-slate-700 bg-surface-bg">Jaminan Garansi</td>
                            @foreach ($compareProducts as $p)
                                <td class="p-3.5 border-l border-border-subtle text-slate-700">
                                    Garansi Resmi 1 Tahun Jaya Maju
                                </td>
                            @endforeach
                        </tr>

                        <!-- Dynamic Specs -->
                        @if (!empty($allSpecKeys))
                            @foreach ($allSpecKeys as $key)
                                <tr class="hover:bg-slate-50/50">
                                    <td class="p-3.5 font-bold text-slate-700 bg-surface-bg">{{ $key }}</td>
                                    @foreach ($compareProducts as $p)
                                        <td class="p-3.5 border-l border-border-subtle text-slate-800">
                                            {{ $p->specs[$key] ?? '-' }}
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection
