@extends('layouts.app')

@section('title', $product->name . ' - Mitra Setia')
@section('description', 'Beli ' . $product->name . ' harga resmi Rp ' . number_format($product->price, 0, ',', '.') . '. Software & Hardware Mesin Kasir Minimarket Mitra Setia bergaransi resmi.')

@push('structured-data')
<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "Product",
  "name": "{{ $product->name }}",
  "image": [
    "{{ Str::startsWith($product->image, ['http://', 'https://', 'data:']) ? $product->image : asset($product->image) }}"
  ],
  "description": "{{ strip_tags($product->description) }}",
  "sku": "{{ $product->id }}",
  "brand": {
    "@type": "Brand",
    "name": "Mitra Setia"
  },
  "offers": {
    "@type": "Offer",
    "url": "{{ url()->current() }}",
    "priceCurrency": "IDR",
    "price": "{{ $product->price }}",
    "availability": "{{ $product->stock > 0 ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock' }}",
    "itemCondition": "https://schema.org/NewCondition"
  }
}
</script>
@endpush

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 py-6 sm:py-8">
    <!-- Breadcrumbs -->
    <nav class="flex items-center gap-2 text-xs text-slate-500 mb-6 overflow-x-auto pb-1">
        <a href="{{ route('home') }}" class="hover:text-primary transition-colors">Beranda</a>
        <span>/</span>
        <a href="{{ route('catalog') }}" class="hover:text-primary transition-colors">Katalog</a>
        <span>/</span>
        <a href="{{ route('catalog', ['category' => $product->category]) }}" class="hover:text-primary transition-colors">{{ $product->category }}</a>
        <span>/</span>
        <span class="text-slate-800 font-semibold truncate max-w-xs">{{ $product->name }}</span>
    </nav>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 mb-12">
        <!-- 1. Left Gallery (Col 6) -->
        <div class="lg:col-span-6 space-y-4">
            <div class="aspect-square rounded-xl bg-white border border-border-subtle p-6 flex items-center justify-center relative shadow-xs">
                <img 
                    id="mainProductImage"
                    src="{{ Str::startsWith($product->image, ['http://', 'https://', 'data:']) ? $product->image : asset($product->image) }}" 
                    alt="{{ $product->name }}"
                    class="max-h-full max-w-full object-contain"
                >
                <div class="absolute top-3 left-3 flex flex-col gap-1.5">
                    <span class="bg-primary text-white text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded">
                        {{ $product->category }}
                    </span>
                    @if($product->stock > 0)
                        <span class="bg-emerald-50 text-emerald-800 border border-emerald-200 text-[10px] font-bold px-2 py-0.5 rounded">
                            Stok Siap: {{ $product->stock }} Unit
                        </span>
                    @else
                        <span class="bg-red-50 text-red-700 border border-red-200 text-[10px] font-bold px-2 py-0.5 rounded">
                            Stok Habis
                        </span>
                    @endif
                </div>
            </div>

            <!-- Image Thumbnails -->
            @if (!empty($product->images) && is_array($product->images) && count($product->images) > 1)
                <div class="flex gap-2.5 overflow-x-auto pb-1">
                    @foreach ($product->images as $thumb)
                        <button 
                            type="button" 
                            onclick="document.getElementById('mainProductImage').src = '{{ Str::startsWith($thumb, ['http://', 'https://']) ? $thumb : asset($thumb) }}'"
                            class="size-16 rounded-lg border border-border-bold p-1 bg-white flex items-center justify-center shrink-0 hover:border-primary focus:border-primary focus:outline-none transition-colors"
                        >
                            <img src="{{ Str::startsWith($thumb, ['http://', 'https://']) ? $thumb : asset($thumb) }}" class="max-h-full max-w-full object-contain">
                        </button>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- 2. Right Product Info & Actions (Col 6) -->
        <div class="lg:col-span-6 space-y-5">
            <div>
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider block mb-1">
                    Produk Resmi Mitra Setia
                </span>
                <h1 class="text-xl sm:text-2xl lg:text-3xl font-extrabold text-slate-900 tracking-tight leading-tight">
                    {{ $product->name }}
                </h1>
            </div>

            <!-- Price Container (High Contrast) -->
            <div class="p-6 bg-white rounded-3xl border border-zinc-200/80 shadow-sm flex items-center justify-between">
                <div>
                    <span class="text-xs text-zinc-400 block font-medium">Harga Resmi:</span>
                    <div class="text-2xl sm:text-3xl font-extrabold text-black mt-0.5">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </div>
                </div>
                <div class="text-right text-xs">
                    <span class="font-bold text-emerald-700 block">&bull; Garansi Resmi 1 Tahun</span>
                    <span class="text-zinc-500 block mt-0.5">Siap kirim ke seluruh Indonesia</span>
                </div>
            </div>

            <!-- Description -->
            <div>
                <h2 class="text-xs font-bold uppercase tracking-wider text-zinc-700 mb-2">Deskripsi Produk</h2>
                <div class="text-xs sm:text-sm text-zinc-600 leading-relaxed whitespace-pre-line bg-zinc-50/60 p-5 rounded-3xl border border-zinc-100">
                    {{ $product->description }}
                </div>
            </div>

            <!-- Order Action Form -->
            <form action="{{ route('cart.add') }}" method="POST" class="space-y-4 pt-4 border-t border-zinc-100">
                @csrf
                <input type="hidden" name="id" value="{{ $product->id }}">

                <div class="flex items-center gap-4">
                    <label class="text-xs font-bold text-zinc-700">Jumlah Beli:</label>
                    <div class="flex items-center border border-zinc-200 bg-white rounded-full h-10 px-1">
                        <button type="button" onclick="let input = document.getElementById('qtyInput'); if(input.value > 1) input.value--;" class="w-8 text-zinc-600 hover:text-black font-bold text-base focus:outline-none">-</button>
                        <input type="number" id="qtyInput" name="qty" value="1" min="1" max="{{ $product->stock }}" class="w-10 text-center text-xs font-bold border-none py-1 focus:outline-none" readonly>
                        <button type="button" onclick="let input = document.getElementById('qtyInput'); if(input.value < {{ $product->stock }}) input.value++;" class="w-8 text-zinc-600 hover:text-black font-bold text-base focus:outline-none">+</button>
                    </div>
                    <span class="text-xs text-zinc-400">Tersisa {{ $product->stock }} unit</span>
                </div>

                <!-- Primary Action Buttons (Min 44px) -->
                <div class="space-y-2.5 pt-2">
                    <button type="submit" name="buy_now" value="1" class="w-full h-12 px-6 bg-black hover:bg-zinc-800 text-white rounded-full font-semibold text-xs sm:text-sm inline-flex items-center justify-center gap-2 transition-all shadow-sm" {{ $product->stock <= 0 ? 'disabled' : '' }}>
                        <span class="material-symbols-outlined text-lg">shopping_bag</span>
                        <span>Beli Sekarang</span>
                    </button>

                    <button type="submit" class="w-full h-11 px-6 bg-zinc-100 hover:bg-zinc-200 text-zinc-900 rounded-full font-semibold text-xs sm:text-sm inline-flex items-center justify-center gap-2 transition-colors" {{ $product->stock <= 0 ? 'disabled' : '' }}>
                        <span class="material-symbols-outlined text-base">add_shopping_cart</span>
                        <span>+ Tambah ke Keranjang Belanja</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- 3. Technical Specifications Table -->
    @if (!empty($product->specs) && is_array($product->specs))
        <section class="mb-12 bg-white p-6 rounded-xl border border-border-subtle shadow-xs">
            <h2 class="text-base font-bold text-slate-900 mb-4 pb-3 border-b border-border-subtle flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-lg">tune</span>
                <span>Spesifikasi Teknis Perangkat</span>
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-xs">
                @foreach ($product->specs as $specKey => $specVal)
                    <div class="flex justify-between p-3 bg-surface-bg rounded-lg border border-border-subtle">
                        <span class="font-bold text-slate-600">{{ $specKey }}</span>
                        <span class="font-semibold text-slate-900 text-right">{{ $specVal }}</span>
                    </div>
                @endforeach
            </div>
        </section>
    @endif
</div>
@endsection
