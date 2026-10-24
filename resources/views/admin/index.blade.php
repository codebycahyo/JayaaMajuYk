@extends('admin.layout')

@section('title', 'Daftar Produk')

@section('content')
<div class="flex justify-between items-end mb-8">
    <div>
        <h1 class="text-3xl font-black text-slate-800 tracking-tight">Daftar Produk</h1>
        <p class="text-slate-500 mt-2">Kelola katalog dan ketersediaan stok produk toko</p>
    </div>
    <a href="{{ route('admin.products.create') }}" class="bg-primary text-white px-6 py-3 rounded-xl font-bold shadow-lg shadow-primary/20 hover:scale-105 transition-transform flex items-center gap-2">
        <span class="material-symbols-outlined">add</span> Tambah Produk
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
    @if($products->isEmpty())
        <div class="p-12 text-center">
            <span class="material-symbols-outlined text-5xl text-slate-300 mb-3">inventory_2</span>
            <p class="text-slate-600 font-bold text-lg">Belum ada produk</p>
            <p class="text-slate-400 text-sm mt-1">Silakan klik tombol "Tambah Produk" untuk menambahkan katalog baru.</p>
        </div>
    @else
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50 border-b border-slate-100">
                <tr>
                    <th class="p-6 text-xs font-bold uppercase text-slate-400 tracking-wider">Produk</th>
                    <th class="p-6 text-xs font-bold uppercase text-slate-400 tracking-wider">Kategori</th>
                    <th class="p-6 text-xs font-bold uppercase text-slate-400 tracking-wider">Harga</th>
                    <th class="p-6 text-xs font-bold uppercase text-slate-400 tracking-wider text-center">Stok</th>
                    <th class="p-6 text-xs font-bold uppercase text-slate-400 tracking-wider text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach ($products as $product)
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="p-6">
                        <div class="flex items-center gap-4">
                            <div class="size-12 rounded-lg bg-slate-100 border border-slate-200 p-1 flex-shrink-0 flex items-center justify-center">
                                @if($product->image)
                                    <img src="{{ Str::startsWith($product->image, ['http://', 'https://', 'data:']) ? $product->image : asset($product->image) }}" class="w-full h-full object-contain" alt="{{ $product->name }}">
                                @else
                                    <span class="material-symbols-outlined text-slate-300">image</span>
                                @endif
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-800">{{ $product->name }}</h4>
                                <div class="flex gap-2 mt-1">
                                    <span class="text-[10px] text-slate-400 font-mono">ID: {{ $product->id }}</span>
                                    @if($product->is_ready_stock && $product->stock > 0)
                                        <span class="text-[10px] bg-green-100 text-green-700 px-2 py-0.5 rounded-full font-bold">Ready</span>
                                    @else
                                        <span class="text-[10px] bg-red-100 text-red-600 px-2 py-0.5 rounded-full font-bold">Habis</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="p-6">
                        <span class="bg-slate-100 text-slate-600 px-3 py-1 rounded-lg text-xs font-bold">
                            {{ $product->category }}
                        </span>
                    </td>
                    <td class="p-6 font-bold text-slate-900">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                        @if($product->original_price)
                            <span class="block text-xs text-slate-400 line-through font-normal">
                                Rp {{ number_format($product->original_price, 0, ',', '.') }}
                            </span>
                        @endif
                    </td>
                    <td class="p-6 text-center">
                        @if($product->stock > 10)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-extrabold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                {{ $product->stock }} unit
                            </span>
                        @elseif($product->stock > 0)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-extrabold bg-amber-50 text-amber-700 border border-amber-200">
                                {{ $product->stock }} unit (Menipis)
                            </span>
                        @else
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-extrabold bg-red-50 text-red-600 border border-red-200">
                                0 unit
                            </span>
                        @endif
                    </td>
                    <td class="p-6 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="size-10 flex items-center justify-center rounded-lg border border-slate-200 text-slate-600 hover:border-primary hover:text-primary transition-colors" title="Edit">
                                <span class="material-symbols-outlined text-lg">edit</span>
                            </a>
                            <form action="{{ route('admin.products.delete', $product->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini? Tindakan ini tidak dapat dibatalkan.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="size-10 flex items-center justify-center rounded-lg border border-slate-200 text-red-500 hover:bg-red-50 hover:border-red-200 transition-colors" title="Hapus">
                                    <span class="material-symbols-outlined text-lg">delete</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
