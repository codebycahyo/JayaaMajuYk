@extends('layouts.app')

@section('title', 'Katalog Software & Hardware Mesin Kasir - Mitra Setia')
@section('description', 'Katalog lengkap software kasir minimarket POS Enterprise, printer thermal, barcode scanner, komputer kasir, dan laci uang cash drawer bergaransi resmi Mitra Setia.')

@section('content')
<!-- Breadcrumbs & Header -->
<div class="bg-surface-card border-b border-rule py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <nav class="font-mono flex items-center gap-2 text-xs text-ink-muted mb-3 uppercase tracking-wider">
            <a href="{{ route('home') }}" class="hover:text-vermilion transition-colors">Beranda</a>
            <span>/</span>
            <span class="text-ink font-bold">Katalog Produk</span>
        </nav>
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-3">
            <div>
                <span class="font-mono text-[11px] uppercase tracking-widest text-vermilion font-bold block mb-1">
                    // PERANGKAT & LISENSI RESMI
                </span>
                <h1 class="font-serif text-3xl sm:text-4xl font-bold text-ink tracking-tight">Katalog Software &amp; Hardware Kasir</h1>
            </div>
            <div class="font-mono text-xs text-ink-muted">
                Total: <strong class="text-ink font-bold">{{ $products->total() }}</strong> produk terdaftar
            </div>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 py-10 font-sans">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Filter Sidebar (Col 3 on Desktop) -->
        <aside class="lg:col-span-3">
            <div class="bg-surface-card p-5 border border-rule shadow-crisp-sm space-y-5 sticky top-24">
                <div class="flex items-center justify-between pb-3 border-b border-rule font-mono">
                    <span class="font-bold text-xs uppercase tracking-wider text-ink flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-sm text-vermilion">filter_list</span>
                        Filter Katalog
                    </span>
                    @if(request()->hasAny(['search', 'category', 'min_price', 'max_price', 'ready_only', 'sort']))
                        <a href="{{ route('catalog') }}" class="text-[11px] font-bold text-vermilion hover:underline">[Reset]</a>
                    @endif
                </div>

                <form method="GET" action="{{ route('catalog') }}" id="filterForm" class="space-y-5">
                    <!-- Search Input -->
                    <div>
                        <label class="block font-mono text-[11px] uppercase tracking-wider font-bold text-ink mb-1.5">Pencarian Nama</label>
                        <div class="relative">
                            <input 
                                type="text" 
                                name="search" 
                                value="{{ request('search') }}" 
                                placeholder="Printer, scanner, POS..." 
                                class="w-full h-10 px-3 text-xs bg-canvas border border-rule focus:border-ink focus:outline-none text-ink rounded-none"
                            >
                        </div>
                    </div>

                    <!-- Category Radio Selection -->
                    <div>
                        <label class="block font-mono text-[11px] uppercase tracking-wider font-bold text-ink mb-2">Kategori Produk</label>
                        <div class="space-y-1 text-xs">
                            <label class="flex items-center gap-2 p-1.5 hover:bg-canvas cursor-pointer">
                                <input type="radio" name="category" value="Semua" onchange="this.form.submit()" {{ !request('category') || request('category') === 'Semua' ? 'checked' : '' }} class="text-ink focus:ring-ink">
                                <span class="text-ink font-medium">Semua Kategori</span>
                            </label>
                            @foreach ($categories as $cat)
                                <label class="flex items-center gap-2 p-1.5 hover:bg-canvas cursor-pointer">
                                    <input type="radio" name="category" value="{{ $cat }}" onchange="this.form.submit()" {{ request('category') === $cat ? 'checked' : '' }} class="text-ink focus:ring-ink">
                                    <span class="text-ink font-medium">{{ $cat }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Price Min-Max -->
                    <div>
                        <label class="block font-mono text-[11px] uppercase tracking-wider font-bold text-ink mb-1.5">Rentang Harga (Rp)</label>
                        <div class="grid grid-cols-2 gap-2">
                            <input 
                                type="number" 
                                name="min_price" 
                                value="{{ request('min_price') }}" 
                                placeholder="Min" 
                                class="w-full h-10 px-2.5 text-xs bg-canvas border border-rule focus:border-ink focus:outline-none text-ink rounded-none font-mono"
                            >
                            <input 
                                type="number" 
                                name="max_price" 
                                value="{{ request('max_price') }}" 
                                placeholder="Maks" 
                                class="w-full h-10 px-2.5 text-xs bg-canvas border border-rule focus:border-ink focus:outline-none text-ink rounded-none font-mono"
                            >
                        </div>
                    </div>

                    <!-- Ready Stock Only -->
                    <div>
                        <label class="flex items-center gap-2 text-xs font-bold text-ink cursor-pointer">
                            <input type="checkbox" name="ready_only" value="1" {{ request('ready_only') ? 'checked' : '' }} class="border-rule text-ink focus:ring-ink">
                            <span>Hanya Stok Siap Kirim</span>
                        </label>
                    </div>

                    <!-- Sorting -->
                    <div>
                        <label class="block font-mono text-[11px] uppercase tracking-wider font-bold text-ink mb-1.5">Urutan Tampilan</label>
                        <select name="sort" onchange="this.form.submit()" class="w-full h-10 px-2.5 text-xs bg-canvas border border-rule focus:border-ink focus:outline-none text-ink rounded-none">
                            <option value="latest" {{ request('sort') === 'latest' ? 'selected' : '' }}>Terbaru</option>
                            <option value="price_asc" {{ request('sort') === 'price_asc' ? 'selected' : '' }}>Harga: Termurah</option>
                            <option value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>Harga: Termahal</option>
                            <option value="name_asc" {{ request('sort') === 'name_asc' ? 'selected' : '' }}>Nama A - Z</option>
                        </select>
                    </div>

                    <button type="submit" class="w-full h-11 bg-ink hover:bg-primary text-canvas text-xs font-mono font-bold uppercase tracking-wider transition-colors border border-ink shadow-crisp-sm">
                        Terapkan Filter
                    </button>
                </form>
            </div>
        </aside>

        <!-- Product List Grid (Col 9 on Desktop) -->
        <main class="lg:col-span-9">
            @if ($products->isEmpty())
                <div class="bg-surface-card border border-rule p-12 text-center">
                    <span class="material-symbols-outlined text-4xl text-ink-faint mb-2">search_off</span>
                    <h2 class="font-serif text-lg font-bold text-ink">Produk Tidak Ditemukan</h2>
                    <p class="text-xs text-ink-muted mt-1 max-w-sm mx-auto">Tidak ada hardware atau software yang cocok dengan filter Anda. Silakan reset filter untuk menampilkan semua produk.</p>
                    <a href="{{ route('catalog') }}" class="mt-4 inline-flex items-center h-10 px-4 bg-ink text-canvas font-mono text-xs font-bold uppercase tracking-wider hover:bg-primary transition-colors">
                        Reset Filter
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                    @foreach ($products as $product)
                        <div class="bg-surface-card border border-rule hover:border-ink p-4 flex flex-col justify-between shadow-crisp-sm transition-all">
                            <div>
                                <!-- Header Badge -->
                                <div class="flex items-center justify-between font-mono text-[11px] pb-2.5 mb-3 border-b border-rule/60">
                                    <span class="font-bold text-ink uppercase tracking-wider">
                                        {{ $product->category }}
                                    </span>
                                    @if ($product->stock > 0)
                                        <span class="font-bold text-forest flex items-center gap-1">
                                            <span class="size-1.5 rounded-full bg-forest"></span>
                                            READY ({{ $product->stock }})
                                        </span>
                                    @else
                                        <span class="font-bold text-vermilion">HABIS</span>
                                    @endif
                                </div>

                                <!-- 1:1 Image Container -->
                                <a href="{{ route('product.show', $product->id) }}" class="block aspect-square bg-canvas p-3 flex items-center justify-center border border-rule mb-3 overflow-hidden">
                                    <img src="{{ Str::startsWith($product->image, ['http://', 'https://', 'data:']) ? $product->image : asset($product->image) }}" 
                                         alt="{{ $product->name }}" 
                                         class="max-h-full max-w-full object-contain"
                                         onerror="this.src='https://placehold.co/300x300/FAF8F5/191816?text=Mitra+Setia'">
                                </a>

                                <!-- Title -->
                                <h2 class="font-bold text-ink text-sm leading-snug line-clamp-2 mb-2">
                                    <a href="{{ route('product.show', $product->id) }}" class="hover:text-vermilion transition-colors">
                                        {{ $product->name }}
                                    </a>
                                </h2>

                                <!-- Specs Preview -->
                                @if ($product->specs)
                                    <div class="font-mono text-[11px] text-ink-muted space-y-0.5 mb-3 line-clamp-2">
                                        @foreach (array_slice($product->specs, 0, 2) as $key => $val)
                                            <div>&bull; {{ $key }}: <span class="text-ink font-semibold">{{ $val }}</span></div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <div>
                                <!-- Price -->
                                <div class="pt-2 border-t border-rule mb-3 font-mono">
                                    <span class="text-[10px] text-ink-faint block uppercase">Harga Resmi</span>
                                    <div class="text-base font-bold text-ink">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </div>
                                </div>

                                <!-- Actions: Add Cart & Buy (Min 44px) -->
                                <div class="grid grid-cols-2 gap-2 font-mono text-xs">
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <input type="hidden" name="qty" value="1">
                                        <button type="submit" class="w-full h-11 px-2 bg-canvas hover:bg-canvas-subtle text-ink font-bold border border-rule hover:border-ink transition-colors inline-flex items-center justify-center gap-1">
                                            <span class="material-symbols-outlined text-base">add_shopping_cart</span>
                                            <span>+ Keranjang</span>
                                        </button>
                                    </form>

                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <input type="hidden" name="qty" value="1">
                                        <button type="submit" name="buy_now" value="1" class="w-full h-11 px-2 bg-ink hover:bg-primary text-canvas font-bold border border-ink transition-colors inline-flex items-center justify-center gap-1" title="Beli">
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
                    <div class="mt-8 pt-6 border-t border-rule font-mono text-xs">
                        {{ $products->links() }}
                    </div>
                @endif
            @endif
        </main>
    </div>
</div>
@endsection
