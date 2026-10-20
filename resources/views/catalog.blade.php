@extends('layouts.app')

@section('title', 'Katalog Hardware POS & Mesin Kasir - Jaya Maju Yk')
@section('description', 'Katalog lengkap printer kasir thermal, barcode scanner, komputer all-in-one, dan laci uang cash drawer bergaransi resmi di Yogyakarta.')

@section('content')
<!-- Breadcrumbs & Header -->
<div class="bg-white border-b border-border-subtle py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <nav class="flex items-center gap-2 text-xs text-slate-500 mb-2">
            <a href="{{ route('home') }}" class="hover:text-primary transition-colors">Beranda</a>
            <span>/</span>
            <span class="text-slate-800 font-semibold">Katalog Produk</span>
        </nav>
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Katalog Hardware Kasir</h1>
            <div class="text-xs text-slate-500">
                Total: <strong class="text-slate-900 font-bold">{{ $products->total() }}</strong> hardware tersedia
            </div>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Filter Sidebar (Col 3 on Desktop) -->
        <aside class="lg:col-span-3">
            <div class="bg-white p-5 rounded-xl border border-border-subtle shadow-xs space-y-5 sticky top-24">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <span class="font-bold text-xs uppercase tracking-wider text-slate-900 flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-base text-primary">filter_list</span>
                        Filter Produk
                    </span>
                    @if(request()->hasAny(['search', 'category', 'min_price', 'max_price', 'ready_only', 'sort']))
                        <a href="{{ route('catalog') }}" class="text-xs font-bold text-red-600 hover:underline">Reset</a>
                    @endif
                </div>

                <form method="GET" action="{{ route('catalog') }}" id="filterForm" class="space-y-5">
                    <!-- Search Input -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Pencarian Nama</label>
                        <div class="relative">
                            <input 
                                type="text" 
                                name="search" 
                                value="{{ request('search') }}" 
                                placeholder="Printer, scanner..." 
                                class="w-full h-11 px-3 text-xs rounded-lg border border-border-bold focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary"
                            >
                        </div>
                    </div>

                    <!-- Category Radio Selection -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-2">Kategori Hardware</label>
                        <div class="space-y-1 text-xs">
                            <label class="flex items-center gap-2 p-1.5 rounded hover:bg-slate-50 cursor-pointer">
                                <input type="radio" name="category" value="Semua" onchange="this.form.submit()" {{ !request('category') || request('category') === 'Semua' ? 'checked' : '' }} class="text-primary focus:ring-primary">
                                <span class="text-slate-700 font-medium">Semua Kategori</span>
                            </label>
                            @foreach ($categories as $cat)
                                <label class="flex items-center gap-2 p-1.5 rounded hover:bg-slate-50 cursor-pointer">
                                    <input type="radio" name="category" value="{{ $cat }}" onchange="this.form.submit()" {{ request('category') === $cat ? 'checked' : '' }} class="text-primary focus:ring-primary">
                                    <span class="text-slate-700 font-medium">{{ $cat }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Price Min-Max -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Rentang Harga (Rp)</label>
                        <div class="grid grid-cols-2 gap-2">
                            <input 
                                type="number" 
                                name="min_price" 
                                value="{{ request('min_price') }}" 
                                placeholder="Min" 
                                class="w-full h-10 px-2.5 text-xs rounded-lg border border-border-bold focus:outline-none focus:border-primary"
                            >
                            <input 
                                type="number" 
                                name="max_price" 
                                value="{{ request('max_price') }}" 
                                placeholder="Maks" 
                                class="w-full h-10 px-2.5 text-xs rounded-lg border border-border-bold focus:outline-none focus:border-primary"
                            >
                        </div>
                    </div>

                    <!-- Ready Stock Only -->
                    <div>
                        <label class="flex items-center gap-2 text-xs font-bold text-slate-700 cursor-pointer">
                            <input type="checkbox" name="ready_only" value="1" {{ request('ready_only') ? 'checked' : '' }} class="rounded border-border-bold text-primary focus:ring-primary">
                            <span>Hanya Stok Siap Kirim</span>
                        </label>
                    </div>

                    <!-- Sorting -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Urutkan Berdasarkan</label>
                        <select name="sort" onchange="this.form.submit()" class="w-full h-10 px-2.5 text-xs rounded-lg border border-border-bold focus:outline-none focus:border-primary bg-white text-slate-700">
                            <option value="latest" {{ request('sort') === 'latest' ? 'selected' : '' }}>Terbaru</option>
                            <option value="price_asc" {{ request('sort') === 'price_asc' ? 'selected' : '' }}>Harga: Termurah</option>
                            <option value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>Harga: Termahal</option>
                            <option value="name_asc" {{ request('sort') === 'name_asc' ? 'selected' : '' }}>Nama A - Z</option>
                        </select>
                    </div>

                    <button type="submit" class="w-full h-11 bg-primary hover:bg-primary-dark text-white rounded-lg text-xs font-bold transition-colors shadow-xs">
                        Terapkan Filter
                    </button>
                </form>
            </div>
        </aside>

        <!-- Product List Grid (Col 9 on Desktop) -->
        <main class="lg:col-span-9">
            @if ($products->isEmpty())
                <div class="bg-white rounded-xl border border-border-subtle p-12 text-center">
                    <span class="material-symbols-outlined text-4xl text-slate-300 mb-2">search_off</span>
                    <h2 class="text-base font-bold text-slate-800">Produk Tidak Ditemukan</h2>
                    <p class="text-xs text-slate-500 mt-1 max-w-sm mx-auto">Tidak ada hardware yang cocok dengan kriteria filter Anda. Coba reset filter untuk melihat seluruh katalog.</p>
                    <a href="{{ route('catalog') }}" class="mt-4 inline-flex items-center h-10 px-4 bg-primary text-white rounded-lg text-xs font-bold hover:bg-primary-dark transition-colors">
                        Reset Filter
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                    @foreach ($products as $product)
                        <div class="bg-white border border-border-subtle hover:border-border-bold rounded-xl p-4 flex flex-col justify-between shadow-xs transition-colors">
                            <div>
                                <!-- Header Badge -->
                                <div class="flex items-center justify-between gap-2 mb-2.5">
                                    <span class="text-[10px] font-bold text-primary bg-primary/10 px-2 py-0.5 rounded">
                                        {{ $product->category }}
                                    </span>
                                    @if ($product->stock > 0)
                                        <span class="text-[11px] font-bold text-emerald-700 flex items-center gap-1">
                                            <span class="size-1.5 rounded-full bg-emerald-600"></span>
                                            Ready ({{ $product->stock }})
                                        </span>
                                    @else
                                        <span class="text-[11px] font-bold text-red-600">Habis</span>
                                    @endif
                                </div>

                                <!-- 1:1 Image Container -->
                                <a href="{{ route('product.show', $product->id) }}" class="block aspect-square bg-surface-bg rounded-lg p-3 flex items-center justify-center border border-border-subtle mb-3">
                                    <img src="{{ Str::startsWith($product->image, 'http') ? $product->image : asset($product->image) }}" 
                                         alt="{{ $product->name }}" 
                                         class="max-h-full max-w-full object-contain"
                                         onerror="this.src='https://placehold.co/300x300?text=Hardware'">
                                </a>

                                <!-- Title -->
                                <h2 class="font-bold text-slate-900 text-sm line-clamp-2 leading-snug mb-1.5">
                                    <a href="{{ route('product.show', $product->id) }}" class="hover:text-primary transition-colors">
                                        {{ $product->name }}
                                    </a>
                                </h2>

                                <!-- Specs Preview -->
                                @if ($product->specs)
                                    <div class="text-[11px] text-slate-500 space-y-0.5 mb-3 line-clamp-2">
                                        @foreach (array_slice($product->specs, 0, 2) as $key => $val)
                                            <div>&bull; {{ $key }}: <span class="text-slate-700 font-medium">{{ $val }}</span></div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <div>
                                <!-- Price -->
                                <div class="pt-2 border-t border-slate-100 mb-3">
                                    <div class="text-base font-black text-slate-900">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </div>
                                </div>

                                <!-- Actions: Add Cart & WhatsApp (Min 44px) -->
                                <div class="grid grid-cols-2 gap-2">
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <input type="hidden" name="qty" value="1">
                                        <button type="submit" class="w-full h-11 px-2 bg-slate-100 hover:bg-slate-200 text-slate-800 rounded-lg text-xs font-bold inline-flex items-center justify-center gap-1 transition-colors">
                                            <span class="material-symbols-outlined text-base">add_shopping_cart</span>
                                            <span>+ Keranjang</span>
                                        </button>
                                    </form>

                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <input type="hidden" name="qty" value="1">
                                        <button type="submit" name="buy_now" value="1" class="w-full h-11 px-2 bg-primary hover:bg-primary-dark text-white rounded-lg text-xs font-bold inline-flex items-center justify-center gap-1 transition-colors" title="Beli">
                                            <span class="material-symbols-outlined text-base">shopping_bag</span>
                                            <span>Beli</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Clean Pagination -->
                @if ($products->hasPages())
                    <div class="mt-8 pt-6 border-t border-border-subtle">
                        {{ $products->links() }}
                    </div>
                @endif
            @endif
        </main>
    </div>
</div>
@endsection
