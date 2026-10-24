@extends('layouts.app')

@section('title', 'Katalog Software & Hardware Mesin Kasir - Mitra Setia')
@section('description', 'Katalog lengkap software kasir minimarket POS Enterprise, printer thermal, barcode scanner, komputer kasir, dan laci uang cash drawer bergaransi resmi Mitra Setia.')

@section('content')
<!-- Breadcrumbs & Header -->
<div class="bg-white border-b border-zinc-100 py-10">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <nav class="flex items-center gap-2 text-xs text-zinc-400 mb-3">
            <a href="{{ route('home') }}" class="hover:text-black transition-colors">Beranda</a>
            <span>/</span>
            <span class="text-black font-semibold">Katalog Produk</span>
        </nav>
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-3">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-zinc-400 block mb-1">
                    Katalog Mitra Setia
                </span>
                <h1 class="text-3xl sm:text-4xl font-extrabold text-black tracking-tight">Katalog Software &amp; Hardware Kasir</h1>
            </div>
            <div class="text-xs text-zinc-500">
                Total: <strong class="text-black font-bold">{{ $products->total() }}</strong> produk terdaftar
            </div>
        </div>
    </div>
</div>

<div class="max-w-6xl mx-auto px-4 sm:px-6 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Filter Sidebar (Col 3 on Desktop) -->
        <aside class="lg:col-span-3">
            <div class="bg-white p-6 rounded-3xl border border-zinc-200/80 shadow-sm space-y-6 sticky top-24">
                <div class="flex items-center justify-between pb-3 border-b border-zinc-100">
                    <span class="font-bold text-xs uppercase tracking-wider text-black flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-sm">filter_list</span>
                        Filter Katalog
                    </span>
                    @if(request()->hasAny(['search', 'category', 'min_price', 'max_price', 'ready_only', 'sort']))
                        <a href="{{ route('catalog') }}" class="text-xs font-semibold text-zinc-500 hover:text-black hover:underline">Reset</a>
                    @endif
                </div>

                <form method="GET" action="{{ route('catalog') }}" id="filterForm" class="space-y-5">
                    <!-- Search Input -->
                    <div>
                        <label class="block text-xs font-bold text-zinc-700 mb-1.5">Pencarian Nama</label>
                        <div class="relative">
                            <input 
                                type="text" 
                                name="search" 
                                value="{{ request('search') }}" 
                                placeholder="Printer, scanner, POS..." 
                                class="w-full h-10 px-3.5 text-xs bg-zinc-50 border border-zinc-200 focus:bg-white focus:border-black focus:outline-none text-black rounded-xl transition-all"
                            >
                        </div>
                    </div>

                    <!-- Category Radio Selection -->
                    <div>
                        <label class="block text-xs font-bold text-zinc-700 mb-2">Kategori Produk</label>
                        <div class="space-y-1 text-xs">
                            <label class="flex items-center gap-2 p-1.5 rounded-lg hover:bg-zinc-50 cursor-pointer">
                                <input type="radio" name="category" value="Semua" onchange="this.form.submit()" {{ !request('category') || request('category') === 'Semua' ? 'checked' : '' }} class="text-black focus:ring-black">
                                <span class="text-zinc-800 font-medium">Semua Kategori</span>
                            </label>
                            @foreach ($categories as $cat)
                                <label class="flex items-center gap-2 p-1.5 rounded-lg hover:bg-zinc-50 cursor-pointer">
                                    <input type="radio" name="category" value="{{ $cat }}" onchange="this.form.submit()" {{ request('category') === $cat ? 'checked' : '' }} class="text-black focus:ring-black">
                                    <span class="text-zinc-800 font-medium">{{ $cat }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Price Min-Max -->
                    <div>
                        <label class="block text-xs font-bold text-zinc-700 mb-1.5">Rentang Harga (Rp)</label>
                        <div class="grid grid-cols-2 gap-2">
                            <input 
                                type="number" 
                                name="min_price" 
                                value="{{ request('min_price') }}" 
                                placeholder="Min" 
                                class="w-full h-10 px-3 text-xs bg-zinc-50 border border-zinc-200 focus:bg-white focus:border-black focus:outline-none text-black rounded-xl font-medium"
                            >
                            <input 
                                type="number" 
                                name="max_price" 
                                value="{{ request('max_price') }}" 
                                placeholder="Maks" 
                                class="w-full h-10 px-3 text-xs bg-zinc-50 border border-zinc-200 focus:bg-white focus:border-black focus:outline-none text-black rounded-xl font-medium"
                            >
                        </div>
                    </div>

                    <!-- Ready Stock Only -->
                    <div>
                        <label class="flex items-center gap-2 text-xs font-bold text-zinc-800 cursor-pointer">
                            <input type="checkbox" name="ready_only" value="1" {{ request('ready_only') ? 'checked' : '' }} class="rounded border-zinc-300 text-black focus:ring-black">
                            <span>Hanya Stok Siap Kirim</span>
                        </label>
                    </div>

                    <!-- Sorting -->
                    <div>
                        <label class="block text-xs font-bold text-zinc-700 mb-1.5">Urutan Tampilan</label>
                        <select name="sort" onchange="this.form.submit()" class="w-full h-10 px-3 text-xs bg-zinc-50 border border-zinc-200 focus:bg-white focus:border-black focus:outline-none text-black rounded-xl">
                            <option value="latest" {{ request('sort') === 'latest' ? 'selected' : '' }}>Terbaru</option>
                            <option value="price_asc" {{ request('sort') === 'price_asc' ? 'selected' : '' }}>Harga: Termurah</option>
                            <option value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>Harga: Termahal</option>
                            <option value="name_asc" {{ request('sort') === 'name_asc' ? 'selected' : '' }}>Nama A - Z</option>
                        </select>
                    </div>

                    <button type="submit" class="w-full h-11 bg-black hover:bg-zinc-800 text-white text-xs font-semibold rounded-full transition-colors shadow-xs">
                        Terapkan Filter
                    </button>
                </form>
            </div>
        </aside>

        <!-- Product List Grid (Col 9 on Desktop) -->
        <main class="lg:col-span-9">
            @if ($products->isEmpty())
                <div class="bg-white rounded-3xl border border-zinc-200/80 p-12 text-center shadow-sm">
                    <span class="material-symbols-outlined text-4xl text-zinc-300 mb-2">search_off</span>
                    <h2 class="text-base font-bold text-black">Produk Tidak Ditemukan</h2>
                    <p class="text-xs text-zinc-500 mt-1 max-w-sm mx-auto">Tidak ada hardware atau software yang cocok dengan filter Anda. Silakan reset filter untuk menampilkan semua produk.</p>
                    <a href="{{ route('catalog') }}" class="mt-4 inline-flex items-center h-10 px-5 bg-black text-white text-xs font-semibold rounded-full hover:bg-zinc-800 transition-colors">
                        Reset Filter
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                    @foreach ($products as $product)
                        <div class="bg-white rounded-3xl border border-zinc-200/80 hover:border-black p-5 flex flex-col justify-between shadow-sm transition-all">
                            <div>
                                <!-- Header Badge -->
                                <div class="flex items-center justify-between text-xs mb-3">
                                    <span class="font-semibold text-zinc-500 text-[11px] bg-zinc-100 px-2.5 py-0.5 rounded-full">
                                        {{ $product->category }}
                                    </span>
                                    @if ($product->stock > 0)
                                        <span class="font-semibold text-emerald-700 text-[11px] flex items-center gap-1">
                                            <span class="size-1.5 rounded-full bg-emerald-500"></span>
                                            Ready ({{ $product->stock }})
                                        </span>
                                    @else
                                        <span class="font-semibold text-red-600 text-[11px]">Habis</span>
                                    @endif
                                </div>

                                <!-- 1:1 Image Container -->
                                <a href="{{ route('product.show', $product->id) }}" class="block aspect-square bg-zinc-50 rounded-2xl p-4 flex items-center justify-center border border-zinc-100 mb-4 overflow-hidden">
                                    <img src="{{ Str::startsWith($product->image, ['http://', 'https://', 'data:']) ? $product->image : asset($product->image) }}" 
                                         alt="{{ $product->name }}" 
                                         class="max-h-full max-w-full object-contain"
                                         onerror="this.src='https://placehold.co/300x300/FAFAFA/18181B?text=Mitra+Setia'">
                                </a>

                                <!-- Title -->
                                <h2 class="font-bold text-black text-sm leading-snug line-clamp-2 mb-2">
                                    <a href="{{ route('product.show', $product->id) }}" class="hover:underline">
                                        {{ $product->name }}
                                    </a>
                                </h2>

                                <!-- Specs Preview -->
                                @if ($product->specs)
                                    <div class="text-[11px] text-zinc-500 space-y-0.5 mb-4 line-clamp-2">
                                        @foreach (array_slice($product->specs, 0, 2) as $key => $val)
                                            <div>&bull; {{ $key }}: <span class="text-zinc-800 font-medium">{{ $val }}</span></div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <div>
                                <!-- Price -->
                                <div class="pt-3 border-t border-zinc-100 mb-4">
                                    <span class="text-[10px] text-zinc-400 block uppercase font-medium">Harga</span>
                                    <div class="text-base font-extrabold text-black">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </div>
                                </div>

                                <!-- Actions: Add Cart & Buy (Pills) -->
                                <div class="grid grid-cols-2 gap-2 text-xs">
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <input type="hidden" name="qty" value="1">
                                        <button type="submit" class="w-full h-10 px-2 bg-zinc-100 hover:bg-zinc-200 text-zinc-900 font-semibold rounded-full transition-colors inline-flex items-center justify-center gap-1">
                                            <span class="material-symbols-outlined text-base">add_shopping_cart</span>
                                            <span>+ Keranjang</span>
                                        </button>
                                    </form>

                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <input type="hidden" name="qty" value="1">
                                        <button type="submit" name="buy_now" value="1" class="w-full h-10 px-2 bg-black hover:bg-zinc-800 text-white font-semibold rounded-full transition-colors inline-flex items-center justify-center gap-1" title="Beli">
                                            <span>Beli</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if ($products->hasPages())
                    <div class="mt-10 pt-6 border-t border-zinc-100">
                        {{ $products->links() }}
                    </div>
                @endif
            @endif
        </main>
    </div>
</div>
@endsection
