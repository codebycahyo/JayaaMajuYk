@extends('layouts.app')

@section('title', 'Data Pemesanan - Mitra Setia')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 py-6 sm:py-8 min-h-[75vh]">
    <!-- Breadcrumbs -->
    <nav class="flex items-center gap-2 text-xs text-slate-500 mb-6">
        <a href="{{ route('home') }}" class="hover:text-primary transition-colors">Beranda</a>
        <span>/</span>
        <a href="{{ route('cart') }}" class="hover:text-primary transition-colors">Keranjang</a>
        <span>/</span>
        <span class="text-slate-800 font-semibold">Isi Data Pemesan</span>
    </nav>

    <div class="mb-6 pb-3 border-b border-border-subtle">
        <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Formulir Pemesanan Mitra Setia</h1>
        <p class="text-xs text-slate-500 mt-1">Lengkapi data tujuan pengiriman/instalasi untuk verifikasi pemesanan via WhatsApp Admin.</p>
    </div>

    @if (session('error'))
        <div class="mb-6 p-3.5 rounded-lg bg-red-50 border border-red-200 text-red-800 text-xs sm:text-sm font-medium flex items-center gap-2">
            <span class="material-symbols-outlined text-red-600 text-base">error</span>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200 text-red-800 text-xs">
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
            <div class="lg:col-span-7 bg-white rounded-xl border border-border-subtle p-5 sm:p-6 shadow-xs space-y-4">
                <h2 class="text-xs font-bold uppercase tracking-wider text-slate-700 pb-2 border-b border-border-subtle">
                    Data Penerima & Alamat Kirim
                </h2>

                <div>
                    <label for="customer_name" class="block text-xs font-bold text-slate-700 mb-1">
                        Nama Lengkap Penerima <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name') }}" required
                           placeholder="Contoh: Budi Santoso"
                           class="w-full h-11 px-3 text-xs sm:text-sm rounded-lg border border-border-bold focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary">
                </div>

                <div>
                    <label for="customer_phone" class="block text-xs font-bold text-slate-700 mb-1">
                        Nomor WhatsApp Aktif <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="customer_phone" id="customer_phone" value="{{ old('customer_phone') }}" required
                           placeholder="Contoh: 081234567890"
                           class="w-full h-11 px-3 text-xs sm:text-sm rounded-lg border border-border-bold focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary">
                    <span class="text-[11px] text-slate-400 mt-0.5 block">Nomor ini terhubung langsung ke chat WhatsApp dengan admin kami.</span>
                </div>

                <div>
                    <label for="customer_address" class="block text-xs font-bold text-slate-700 mb-1">
                        Alamat Lengkap Pengiriman <span class="text-red-500">*</span>
                    </label>
                    <textarea name="customer_address" id="customer_address" rows="3" required
                              placeholder="Nama jalan, nomor bangunan, RT/RW, kelurahan, patokan lokasi..."
                              class="w-full p-3 text-xs sm:text-sm rounded-lg border border-border-bold focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary">{{ old('customer_address') }}</textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label for="city" class="block text-xs font-bold text-slate-700 mb-1">Kota / Kabupaten <span class="text-red-500">*</span></label>
                        <input type="text" name="city" id="city" value="{{ old('city', 'Sleman / Kota Yogyakarta') }}" required
                               placeholder="Contoh: Sleman, Yogyakarta"
                               class="w-full h-11 px-3 text-xs sm:text-sm rounded-lg border border-border-bold focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary">
                    </div>

                    <div>
                        <label for="province" class="block text-xs font-bold text-slate-700 mb-1">Provinsi (Opsional)</label>
                        <input type="text" name="province" id="province" value="{{ old('province', 'D.I. Yogyakarta') }}"
                               placeholder="Contoh: D.I. Yogyakarta"
                               class="w-full h-11 px-3 text-xs sm:text-sm rounded-lg border border-border-bold focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary">
                    </div>
                </div>

                <div>
                    <label for="notes" class="block text-xs font-bold text-slate-700 mb-1">Catatan Tambahan (Opsional)</label>
                    <input type="text" name="notes" id="notes" value="{{ old('notes') }}"
                           placeholder="Contoh: Kirim jam 2 siang / ambil langsung di toko"
                           class="w-full h-11 px-3 text-xs sm:text-sm rounded-lg border border-border-bold focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary">
                </div>
            </div>

            <!-- Order Summary & Submit Button (Col 5) -->
            <div class="lg:col-span-5 space-y-4">
                <div class="bg-white rounded-xl border border-border-subtle p-5 shadow-xs sticky top-24">
                    <h2 class="text-xs font-bold uppercase tracking-wider text-slate-700 pb-2 border-b border-border-subtle flex items-center justify-between">
                        <span>Ringkasan Pesanan</span>
                        <a href="{{ route('cart') }}" class="text-primary text-[11px] font-bold hover:underline">Ubah</a>
                    </h2>

                    <div class="divide-y divide-border-subtle max-h-56 overflow-y-auto py-2 pr-1">
                        @foreach ($cart as $item)
                            <div class="py-2.5 first:pt-0 last:pb-0 flex items-center justify-between gap-3 text-xs">
                                <div>
                                    <div class="font-bold text-slate-800 line-clamp-1">{{ $item['name'] }}</div>
                                    <div class="text-[11px] text-slate-500">{{ $item['qty'] }} &times; Rp {{ number_format($item['price'], 0, ',', '.') }}</div>
                                </div>
                                <div class="font-bold text-slate-900 shrink-0">
                                    Rp {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="py-3 border-t border-b border-border-subtle space-y-1.5 text-xs">
                        <div class="flex justify-between text-slate-600">
                            <span>Subtotal Produk</span>
                            <span class="font-bold text-slate-900">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-slate-600">
                            <span>Metode Pembayaran</span>
                            <span class="font-bold text-emerald-700">via WhatsApp</span>
                        </div>
                    </div>

                    <div class="py-3 flex justify-between items-center">
                        <span class="text-xs uppercase text-slate-500 font-bold">Total Pembayaran</span>
                        <span class="font-black text-xl text-slate-900">
                            Rp {{ number_format($subtotal, 0, ',', '.') }}
                        </span>
                    </div>

                    <!-- Submit Button (Min 44px) -->
                    <button type="submit" class="w-full h-12 px-4 bg-wa-green hover:bg-wa-hover text-white rounded-lg font-bold text-xs sm:text-sm inline-flex items-center justify-center gap-2 transition-colors shadow-xs">
                        <span>Lanjut ke Pembayaran</span>
                        <span class="material-symbols-outlined text-base">arrow_forward</span>
                    </button>

                    <div class="text-[11px] text-slate-500 text-center pt-1 leading-relaxed">
                        Setelah ini, rincian pesanan & nomor rekening pembayaran akan dibuka di WhatsApp Admin.
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
