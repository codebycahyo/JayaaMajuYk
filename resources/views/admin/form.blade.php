@extends('admin.layout')

@section('title', isset($product) ? 'Edit Produk' : 'Tambah Produk')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8">
        <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-100">
            <div>
                <h2 class="text-2xl font-black text-slate-800">
                    {{ isset($product) ? 'Edit Produk' : 'Tambah Produk Baru' }}
                </h2>
                <p class="text-slate-500 text-sm mt-1">Lengkapi data produk kasir di bawah ini dengan benar.</p>
            </div>
            <a href="{{ route('admin.products.index') }}" class="text-sm font-semibold text-slate-500 hover:text-slate-800">
                &larr; Kembali
            </a>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-xl mb-6">
                <p class="font-bold text-sm mb-1">Terdapat kesalahan pada formulir:</p>
                <ul class="list-disc list-inside text-xs space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ isset($product) ? route('admin.products.update', $product->id) : route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @if(isset($product))
                @method('PUT')
            @endif
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        ID Produk (Slug/Kode Unik) <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="id" 
                        value="{{ old('id', $product->id ?? '') }}" 
                        class="w-full px-4 py-3 rounded-xl border @error('id') border-red-500 @else border-slate-200 @enderror focus:outline-none focus:border-primary font-medium text-slate-800" 
                        placeholder="contoh: epson-tmt82" 
                        required 
                        {{ isset($product) ? 'readonly' : '' }}
                    >
                    @error('id')
                        <p class="text-xs text-red-500 mt-1 font-semibold">{{ $message }}</p>
                    @else
                        @if(!isset($product))
                            <p class="text-[11px] text-slate-400 mt-1">Hanya huruf, angka, tanda strip (-), dan garis bawah (_).</p>
                        @endif
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Nama Produk <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="name" 
                        value="{{ old('name', $product->name ?? '') }}" 
                        class="w-full px-4 py-3 rounded-xl border @error('name') border-red-500 @else border-slate-200 @enderror focus:outline-none focus:border-primary font-medium text-slate-800" 
                        placeholder="contoh: Epson TM-T82X Thermal Printer" 
                        required
                    >
                    @error('name')
                        <p class="text-xs text-red-500 mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Kategori <span class="text-red-500">*</span>
                    </label>
                    @php
                        $availableCategories = ['Printer Kasir', 'Barcode Scanner', 'Komputer Kasir', 'Paket Usaha'];
                        if (isset($product) && $product->category && !in_array($product->category, $availableCategories)) {
                            $availableCategories[] = $product->category;
                        }
                    @endphp
                    <select 
                        name="category" 
                        class="w-full px-4 py-3 rounded-xl border @error('category') border-red-500 @else border-slate-200 @enderror focus:outline-none focus:border-primary font-medium text-slate-800"
                        required
                    >
                        <option value="" disabled {{ old('category', $product->category ?? '') == '' ? 'selected' : '' }}>Pilih Kategori</option>
                        @foreach($availableCategories as $cat)
                            <option value="{{ $cat }}" {{ old('category', $product->category ?? '') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <p class="text-xs text-red-500 mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Harga (IDR) <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="number" 
                        name="price" 
                        min="0" 
                        step="1" 
                        value="{{ old('price', $product->price ?? '') }}" 
                        class="w-full px-4 py-3 rounded-xl border @error('price') border-red-500 @else border-slate-200 @enderror focus:outline-none focus:border-primary font-medium text-slate-800" 
                        placeholder="contoh: 1850000" 
                        required
                    >
                    @error('price')
                        <p class="text-xs text-red-500 mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Harga Coret (Opsional)
                    </label>
                    <input 
                        type="number" 
                        name="original_price" 
                        min="0" 
                        step="1" 
                        value="{{ old('original_price', $product->original_price ?? '') }}" 
                        class="w-full px-4 py-3 rounded-xl border @error('original_price') border-red-500 @else border-slate-200 @enderror focus:outline-none focus:border-primary font-medium text-slate-800" 
                        placeholder="contoh: 2100000"
                    >
                    @error('original_price')
                        <p class="text-xs text-red-500 mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Stok Produk <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="number" 
                        name="stock" 
                        min="0" 
                        step="1" 
                        value="{{ old('stock', $product->stock ?? 10) }}" 
                        class="w-full px-4 py-3 rounded-xl border @error('stock') border-red-500 @else border-slate-200 @enderror focus:outline-none focus:border-primary font-medium text-slate-800" 
                        placeholder="contoh: 25" 
                        required
                    >
                    @error('stock')
                        <p class="text-xs text-red-500 mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-1 md:col-span-2">
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Gambar Produk {{ isset($product) ? '(Opsional)' : '*' }}
                    </label>
                    <div class="flex items-center gap-6 p-4 bg-slate-50 rounded-2xl border @error('image') border-red-500 @else border-slate-200 @enderror">
                        @if(isset($product) && $product->image)
                            <img src="{{ Str::startsWith($product->image, ['http://', 'https://']) ? $product->image : asset($product->image) }}" class="size-20 object-contain bg-white p-1 rounded-xl shadow-sm border border-slate-200" alt="Preview Gambar">
                        @endif
                        <div class="flex-1">
                            <input 
                                type="file" 
                                name="image" 
                                accept="image/jpeg,image/png,image/jpg,image/webp" 
                                class="w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-primary file:text-white hover:file:bg-opacity-90 cursor-pointer" 
                                {{ isset($product) ? '' : 'required' }}
                            >
                            <p class="text-[11px] text-slate-400 mt-1">Format: JPG, PNG, WebP. Maksimal 2 MB. {{ isset($product) ? 'Biarkan kosong jika tidak ingin mengganti.' : '' }}</p>
                        </div>
                    </div>
                    @error('image')
                        <p class="text-xs text-red-500 mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">
                    Deskripsi Produk <span class="text-red-500">*</span>
                </label>
                <textarea 
                    name="description" 
                    rows="4" 
                    class="w-full px-4 py-3 rounded-xl border @error('description') border-red-500 @else border-slate-200 @enderror focus:outline-none focus:border-primary font-medium text-slate-800" 
                    placeholder="Tuliskan deskripsi lengkap produk di sini..." 
                    required
                >{{ old('description', $product->description ?? '') }}</textarea>
                @error('description')
                    <p class="text-xs text-red-500 mt-1 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            @php
                $defaultSpecs = '';
                if (isset($product->specs) && is_array($product->specs)) {
                    foreach ($product->specs as $k => $v) {
                        $defaultSpecs .= "{$k}={$v}\n";
                    }
                }
            @endphp
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">
                    Spesifikasi (Format: Kunci=Nilai, pisahkan dengan baris baru)
                </label>
                <textarea 
                    name="specs_raw" 
                    rows="5" 
                    class="w-full px-4 py-3 rounded-xl border @error('specs_raw') border-red-500 @else border-slate-200 @enderror focus:outline-none focus:border-primary font-mono text-sm text-slate-800" 
                    placeholder="Kecepatan Cetak=200mm/detik&#10;Konektivitas=USB + LAN&#10;Lebar Kertas=80mm"
                >{{ old('specs_raw', $defaultSpecs) }}</textarea>
                @error('specs_raw')
                    <p class="text-xs text-red-500 mt-1 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center gap-4 pt-4 border-t border-slate-100">
                <a href="{{ route('admin.products.index') }}" class="px-6 py-3.5 rounded-xl font-bold text-slate-500 hover:bg-slate-100 transition-colors">
                    Batal
                </a>
                <button type="submit" class="flex-1 px-8 py-3.5 rounded-xl font-bold text-white bg-primary hover:bg-opacity-90 shadow-lg shadow-primary/20 transition-all active:scale-[0.99]">
                    {{ isset($product) ? 'Perbarui Produk' : 'Simpan Produk' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
