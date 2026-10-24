@extends('layouts.app')

@section('title', 'Data Pemesanan - Mitra Setia')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 py-10 min-h-[75vh]">
    <!-- Breadcrumbs -->
    <nav class="flex items-center gap-2 text-xs text-zinc-400 mb-6">
        <a href="{{ route('home') }}" class="hover:text-black transition-colors">Beranda</a>
        <span>/</span>
        <a href="{{ route('cart') }}" class="hover:text-black transition-colors">Keranjang</a>
        <span>/</span>
        <span class="text-black font-semibold">Isi Data Pemesan</span>
    </nav>

    <div class="mb-8 pb-4 border-b border-zinc-100">
        <h1 class="text-2xl sm:text-3xl font-extrabold text-black tracking-tight">Formulir Pemesanan Mitra Setia</h1>
        <p class="text-xs sm:text-sm text-zinc-500 mt-1">Lengkapi data tujuan pengiriman/instalasi untuk verifikasi pemesanan via WhatsApp Admin.</p>
    </div>

    @if (session('error'))
        <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-200 text-red-800 text-xs sm:text-sm font-medium flex items-center gap-2">
            <span class="material-symbols-outlined text-red-600 text-base">error</span>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-200 text-red-800 text-xs">
            <div class="font-bold flex items-center gap-1.5 mb-1.5">
                <span class="material-symbols-outlined text-red-600 text-sm">warning</span>
                <span>Mohon lengkapi data dengan benar:</span>
            </div>
            <ul class="list-disc list-inside space-y-0.5">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('checkout.store') }}" method="POST" id="checkout-form">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            <!-- Form Data Penerima (Col 7) -->
            <div class="lg:col-span-7 bg-white rounded-3xl border border-zinc-200/80 p-6 sm:p-7 shadow-sm space-y-4">
                <h2 class="text-xs font-bold uppercase tracking-wider text-black pb-3 border-b border-zinc-100">
                    Data Penerima &amp; Alamat Kirim
                </h2>

                <div>
                    <label for="customer_name" class="block text-xs font-semibold text-zinc-700 mb-1.5">
                        Nama Lengkap Penerima <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name') }}" required
                           placeholder="Contoh: Budi Santoso"
                           class="w-full h-11 px-4 text-xs sm:text-sm rounded-xl bg-zinc-50 border border-zinc-200 focus:bg-white focus:border-black focus:outline-none transition-all">
                </div>

                <div>
                    <label for="customer_phone" class="block text-xs font-semibold text-zinc-700 mb-1.5">
                        Nomor WhatsApp Aktif <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="customer_phone" id="customer_phone" value="{{ old('customer_phone') }}" required
                           placeholder="Contoh: 081234567890"
                           class="w-full h-11 px-4 text-xs sm:text-sm rounded-xl bg-zinc-50 border border-zinc-200 focus:bg-white focus:border-black focus:outline-none transition-all">
                    <span class="text-[11px] text-zinc-400 mt-1 block">Nomor ini terhubung langsung ke chat WhatsApp dengan admin kami.</span>
                </div>

                <div>
                    <label for="customer_address" class="block text-xs font-semibold text-zinc-700 mb-1.5">
                        Alamat Lengkap Pengiriman <span class="text-red-500">*</span>
                    </label>
                    <textarea name="customer_address" id="customer_address" rows="3" required
                              placeholder="Nama jalan, nomor bangunan, RT/RW, kelurahan, patokan lokasi..."
                              class="w-full p-4 text-xs sm:text-sm rounded-xl bg-zinc-50 border border-zinc-200 focus:bg-white focus:border-black focus:outline-none transition-all">{{ old('customer_address') }}</textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="city" class="block text-xs font-semibold text-zinc-700 mb-1.5">Kota / Kabupaten <span class="text-red-500">*</span></label>
                        <input type="text" name="city" id="city" value="{{ old('city', 'Sleman / Kota Yogyakarta') }}" required
                               placeholder="Contoh: Sleman, Yogyakarta"
                               class="w-full h-11 px-4 text-xs sm:text-sm rounded-xl bg-zinc-50 border border-zinc-200 focus:bg-white focus:border-black focus:outline-none transition-all">
                    </div>

                    <div>
                        <label for="province" class="block text-xs font-semibold text-zinc-700 mb-1.5">Provinsi (Opsional)</label>
                        <input type="text" name="province" id="province" value="{{ old('province', 'D.I. Yogyakarta') }}"
                               placeholder="Contoh: D.I. Yogyakarta"
                               class="w-full h-11 px-4 text-xs sm:text-sm rounded-xl bg-zinc-50 border border-zinc-200 focus:bg-white focus:border-black focus:outline-none transition-all">
                    </div>
                </div>

                <div>
                    <label for="notes" class="block text-xs font-semibold text-zinc-700 mb-1.5">Catatan Tambahan (Opsional)</label>
                    <input type="text" name="notes" id="notes" value="{{ old('notes') }}"
                           placeholder="Contoh: Kirim jam 2 siang / instalasi toko baru"
                           class="w-full h-11 px-4 text-xs sm:text-sm rounded-xl bg-zinc-50 border border-zinc-200 focus:bg-white focus:border-black focus:outline-none transition-all">
                </div>
            </div>

            <!-- Ringkasan Keranjang (Col 5) -->
            <div class="lg:col-span-5 space-y-4">
                <div class="bg-white rounded-3xl border border-zinc-200/80 p-6 shadow-sm">
                    <h2 class="text-xs font-bold uppercase tracking-wider text-black pb-3 border-b border-zinc-100 flex items-center justify-between">
                        <span>Ringkasan Pesanan</span>
                        <a href="{{ route('cart') }}" class="text-zinc-500 hover:text-black font-semibold text-xs lowercase">Ubah</a>
                    </h2>

                    <div class="py-3 divide-y divide-zinc-100 max-h-64 overflow-y-auto">
                        @foreach ($cart as $id => $item)
                            <div class="py-2.5 flex items-center justify-between gap-3 text-xs">
                                <div class="flex items-center gap-2.5 truncate mr-2">
                                    <span class="font-bold text-zinc-400">{{ $item['qty'] }}x</span>
                                    <span class="font-semibold text-zinc-800 truncate">{{ $item['name'] }}</span>
                                </div>
                                <span class="font-bold text-black shrink-0">
                                    Rp {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}
                                </span>
                            </div>
                        @endforeach
                    </div>

                    <div class="py-3 border-t border-b border-zinc-100 space-y-2 text-xs">
                        <div class="flex justify-between text-zinc-600">
                            <span>Subtotal Produk</span>
                            <span class="font-bold text-black">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-zinc-600">
                            <span>Metode Pembayaran</span>
                            <span class="font-bold text-emerald-700">via WhatsApp</span>
                        </div>
                    </div>

                    <div class="py-4 flex justify-between items-center">
                        <span class="text-xs uppercase text-zinc-400 font-bold">Total Pembayaran</span>
                        <span class="font-extrabold text-xl text-black">
                            Rp {{ number_format($subtotal, 0, ',', '.') }}
                        </span>
                    </div>

                    <!-- Submit Button (Black Pill) -->
                    <button type="submit" class="w-full h-12 px-6 bg-black hover:bg-zinc-800 text-white rounded-full font-semibold text-xs sm:text-sm inline-flex items-center justify-center gap-2 transition-all shadow-sm">
                        <span>Lanjut ke WhatsApp</span>
                        <span class="material-symbols-outlined text-base">arrow_forward</span>
                    </button>

                    <div class="text-[11px] text-zinc-400 text-center pt-2 leading-relaxed">
                        Setelah klik tombol di atas, rincian pesanan akan otomatis terhubung ke WhatsApp Admin Mitra Setia.
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
