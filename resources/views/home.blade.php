@extends('layouts.app')

@section('title', 'Jaya Maju Yk - Spesialis Hardware Kasir POS & Perlengkapan Retail Yogyakarta')
@section('description', 'Pusat hardware mesin kasir, printer thermal, barcode scanner, dan laci uang di Yogyakarta. Bergaransi resmi 1 tahun, ready stock, teknisi siaga.')

@section('content')

<!-- 1. Functional Hero Section (Clean Grid, Zero AI-Slop) -->
<section class="bg-white border-b border-border-subtle py-10 sm:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
            <!-- Left: Value Proposition -->
            <div class="lg:col-span-7 space-y-5">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-slate-100 border border-slate-200 text-slate-800 text-xs font-bold">
                    <span class="size-2 rounded-full bg-emerald-600"></span>
                    <span>Ready Stock &bull; Yogyakarta</span>
                </div>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-slate-900 leading-tight">
                    Hardware Kasir POS & Perlengkapan Retail Andal untuk Usaha Anda.
                </h1>

                <p class="text-slate-600 text-sm sm:text-base leading-relaxed max-w-xl">
                    Percepat antrean transaksi dan kelola stok barang secara akurat dengan printer thermal, barcode scanner, laci kasir, dan komputer all-in-one bergaransi resmi 1 tahun.
                </p>

                <!-- Action Buttons (Minimum 44px Touch Target) -->
                <div class="flex flex-col sm:flex-row gap-3 pt-2">
                    <a href="{{ route('catalog') }}" class="h-12 px-6 bg-primary hover:bg-primary-dark text-white rounded-lg font-bold text-sm inline-flex items-center justify-center gap-2 transition-colors shadow-xs">
                        <span class="material-symbols-outlined text-lg">storefront</span>
                        <span>Lihat Katalog Produk</span>
                    </a>

                    <a href="https://wa.me/6281234567890?text={{ urlencode('Halo Jaya Maju Yk, saya ingin konsultasi kebutuhan hardware kasir untuk usaha saya.') }}" target="_blank" class="h-12 px-6 bg-wa-green hover:bg-wa-hover text-white rounded-lg font-bold text-sm inline-flex items-center justify-center gap-2 transition-colors shadow-xs">
                        <svg class="size-5 fill-current shrink-0" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                        </svg>
                        <span>Konsultasi Gratis via WhatsApp</span>
                    </a>
                </div>

                <!-- Trust Points -->
                <div class="pt-4 border-t border-slate-100 grid grid-cols-3 gap-4 text-xs">
                    <div>
                        <div class="font-bold text-slate-900 text-sm">1.500+</div>
                        <div class="text-slate-500">Toko Terpasang</div>
                    </div>
                    <div>
                        <div class="font-bold text-slate-900 text-sm">1 Tahun</div>
                        <div class="text-slate-500">Garansi Toko Resmi</div>
                    </div>
                    <div>
                        <div class="font-bold text-slate-900 text-sm">On-Site</div>
                        <div class="text-slate-500">Bantuan Teknisi Jogja</div>
                    </div>
                </div>
            </div>

            <!-- Right: Clean Featured Showcase Card -->
            <div class="lg:col-span-5">
                <div class="bg-surface-bg border border-border-bold rounded-xl p-5 shadow-xs">
                    <div class="flex items-center justify-between pb-3 border-b border-border-subtle mb-4">
                        <span class="text-xs font-bold text-primary uppercase tracking-wider">Paket Rekomendasi</span>
                        <span class="text-[11px] font-bold text-emerald-700 bg-emerald-50 px-2.5 py-0.5 rounded border border-emerald-200">Siap Pakai</span>
                    </div>

                    <div class="aspect-video bg-white rounded-lg border border-border-subtle p-4 flex items-center justify-center mb-4">
                        <img src="{{ asset('assets/products/paket-umkm-lite.jpg') }}" 
                             alt="Paket Kasir POS" 
                             class="max-h-full max-w-full object-contain"
                             onerror="this.src='https://placehold.co/400x250?text=Hardware+Kasir'">
                    </div>

                    <div class="space-y-1.5">
                        <h2 class="font-bold text-slate-900 text-base">Paket Usaha Kasir Lengkap (All-in-One)</h2>
                        <p class="text-xs text-slate-600">Termasuk Printer Thermal, Barcode Scanner, Laci Uang RJ11, dan Kertas Kasir.</p>
                        <div class="pt-2 flex items-center justify-between">
                            <span class="text-lg font-black text-slate-900">Rp 3.500.000</span>
                            <a href="{{ route('catalog') }}" class="text-xs font-bold text-primary hover:underline inline-flex items-center gap-1">
                                Lihat Rincian &rarr;
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2. Value Proposition (4 Functional Pillars) -->
<section class="py-12 bg-surface-bg border-b border-border-subtle">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Pillar 1 -->
            <div class="bg-white p-5 rounded-xl border border-border-subtle shadow-xs">
                <div class="size-10 bg-primary/10 text-primary rounded-lg flex items-center justify-center mb-3">
                    <span class="material-symbols-outlined text-2xl">verified_user</span>
                </div>
                <h3 class="font-bold text-slate-900 text-sm mb-1">100% Produk Original</h3>
                <p class="text-xs text-slate-600 leading-relaxed">Unit baru bergaransi resmi dari merk terkemuka seperti Epson, Star, Honeywell, dan Sunmi.</p>
            </div>

            <!-- Pillar 2 -->
            <div class="bg-white p-5 rounded-xl border border-border-subtle shadow-xs">
                <div class="size-10 bg-emerald-50 text-emerald-700 rounded-lg flex items-center justify-center mb-3">
                    <span class="material-symbols-outlined text-2xl">build</span>
                </div>
                <h3 class="font-bold text-slate-900 text-sm mb-1">Dukungan Teknisi Siaga</h3>
                <p class="text-xs text-slate-600 leading-relaxed">Layanan purna jual jelas. Teknisi kami siap membantu setting, kendala koneksi, dan servis unit.</p>
            </div>

            <!-- Pillar 3 -->
            <div class="bg-white p-5 rounded-xl border border-border-subtle shadow-xs">
                <div class="size-10 bg-blue-50 text-blue-700 rounded-lg flex items-center justify-center mb-3">
                    <span class="material-symbols-outlined text-2xl">school</span>
                </div>
                <h3 class="font-bold text-slate-900 text-sm mb-1">Pelatihan Kasir Gratis</h3>
                <p class="text-xs text-slate-600 leading-relaxed">Panduan cara pemasangan dan pelatihan pengoperasian sistem kasir sampai kasir Anda mahir.</p>
            </div>

            <!-- Pillar 4 -->
            <div class="bg-white p-5 rounded-xl border border-border-subtle shadow-xs">
                <div class="size-10 bg-amber-50 text-amber-700 rounded-lg flex items-center justify-center mb-3">
                    <span class="material-symbols-outlined text-2xl">local_shipping</span>
                </div>
                <h3 class="font-bold text-slate-900 text-sm mb-1">Kirim Cepat & Aman</h3>
                <p class="text-xs text-slate-600 leading-relaxed">Bisa ambil langsung di outlet Babarsari Sleman atau kirim instan hari yang sama untuk area Jogja.</p>
            </div>
        </div>
    </div>
</section>

<!-- 3. Featured Products Grid (Symmetric & Accessible) -->
<section class="py-12 bg-white border-b border-border-subtle">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-8">
            <div>
                <h2 class="text-2xl font-black text-slate-900 tracking-tight">Produk Hardware Pilihan</h2>
                <p class="text-xs sm:text-sm text-slate-500 mt-1">Perangkat kasir teruji dengan performa stabil untuk ritel, resto, kafe, dan apotek.</p>
            </div>
            <a href="{{ route('catalog') }}" class="h-10 px-4 bg-slate-100 hover:bg-slate-200 text-slate-800 rounded-lg text-xs font-bold inline-flex items-center gap-1.5 transition-colors self-start sm:self-auto">
                <span>Buka Katalog Lengkap</span>
                <span class="material-symbols-outlined text-sm">arrow_forward</span>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($featuredProducts as $product)
                <div class="bg-white border border-border-subtle hover:border-border-bold rounded-xl p-4 flex flex-col justify-between shadow-xs transition-colors">
                    <div>
                        <!-- Category Badge & Stock State -->
                        <div class="flex items-center justify-between gap-2 mb-3">
                            <span class="text-[11px] font-bold text-primary bg-primary/10 px-2 py-0.5 rounded">
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

                        <!-- 1:1 Aspect Ratio Photo -->
                        <div class="aspect-square bg-surface-bg rounded-lg p-3 flex items-center justify-center border border-border-subtle mb-3">
                            <img src="{{ Str::startsWith($product->image, 'http') ? $product->image : asset($product->image) }}" 
                                 alt="{{ $product->name }}" 
                                 class="max-h-full max-w-full object-contain"
                                 onerror="this.src='https://placehold.co/300x300?text=Hardware'">
                        </div>

                        <!-- Product Name -->
                        <h3 class="font-bold text-slate-900 text-sm line-clamp-2 leading-snug mb-1">
                            <a href="{{ route('product.show', $product->id) }}" class="hover:text-primary transition-colors">
                                {{ $product->name }}
                            </a>
                        </h3>

                        <!-- Technical Specs Bullets -->
                        @if ($product->specs)
                            <div class="text-[11px] text-slate-500 space-y-0.5 mb-3 line-clamp-2">
                                @foreach (array_slice($product->specs, 0, 2) as $key => $val)
                                    <div>&bull; {{ $key }}: <span class="text-slate-700 font-medium">{{ $val }}</span></div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-[11px] text-slate-400 mb-3">Garansi Resmi 1 Tahun Jaya Maju</div>
                        @endif
                    </div>

                    <div>
                        <!-- Price -->
                        <div class="pt-2 border-t border-slate-100 mb-3">
                            <div class="text-base font-black text-slate-900">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </div>
                        </div>

                        <!-- Dual Action Button (Touch-Friendly min 44px) -->
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
    </div>
</section>

<!-- 4. Real Social Proof & Reviews -->
<section class="py-12 bg-surface-bg border-b border-border-subtle">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center max-w-xl mx-auto mb-8">
            <h2 class="text-2xl font-black text-slate-900 tracking-tight">Dipercaya Pemilik Bisnis di Jogja</h2>
            <p class="text-xs sm:text-sm text-slate-500 mt-1">Ulasan nyata dari pengusaha retail dan F&B yang menggunakan hardware kami.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Review 1 -->
            <div class="bg-white p-5 rounded-xl border border-border-subtle shadow-xs space-y-3">
                <div class="flex text-amber-500 text-sm">
                    &#9733;&#9733;&#9733;&#9733;&#9733;
                </div>
                <p class="text-xs text-slate-700 leading-relaxed italic">
                    "Printer thermal Epson dari Jaya Maju sangat awet. Sudah 2 tahun dipakai di kafe kami tanpa kendala, potong kertas auto-cutternya presisi."
                </p>
                <div class="pt-2 border-t border-slate-100">
                    <div class="font-bold text-slate-900 text-xs">Arif Wicaksono</div>
                    <div class="text-[11px] text-slate-500">Owner Kopi Merapi, Sleman</div>
                </div>
            </div>

            <!-- Review 2 -->
            <div class="bg-white p-5 rounded-xl border border-border-subtle shadow-xs space-y-3">
                <div class="flex text-amber-500 text-sm">
                    &#9733;&#9733;&#9733;&#9733;&#9733;
                </div>
                <p class="text-xs text-slate-700 leading-relaxed italic">
                    "Pelayanannya responsif. Saat scanner barcode kami butuh setting ulang kabel USB, teknisi langsung bantu via video call sampai jalan normal."
                </p>
                <div class="pt-2 border-t border-slate-100">
                    <div class="font-bold text-slate-900 text-xs">Ibu Dewi Rahayu</div>
                    <div class="text-[11px] text-slate-500">Apotek Sehat Barokah, Bantul</div>
                </div>
            </div>

            <!-- Review 3 -->
            <div class="bg-white p-5 rounded-xl border border-border-subtle shadow-xs space-y-3">
                <div class="flex text-amber-500 text-sm">
                    &#9733;&#9733;&#9733;&#9733;&#9733;
                </div>
                <p class="text-xs text-slate-700 leading-relaxed italic">
                    "Pesan pagi lewat WhatsApp, siang sudah sampai di toko dan dibantu setting driver ke software kasir kami. Benar-benar siap pakai."
                </p>
                <div class="pt-2 border-t border-slate-100">
                    <div class="font-bold text-slate-900 text-xs">Bambang S.</div>
                    <div class="text-[11px] text-slate-500">Minimarket Podomoro, Kota Yogyakarta</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 5. Interactive FAQ Section (Functional Accordion) -->
<section class="py-12 bg-white">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-8">
            <h2 class="text-2xl font-black text-slate-900 tracking-tight">Pertanyaan yang Sering Diajukan</h2>
            <p class="text-xs sm:text-sm text-slate-500 mt-1">Jawaban seputar pemesanan hardware kasir di Jaya Maju Yk.</p>
        </div>

        <div class="space-y-3">
            <details class="group bg-surface-bg border border-border-subtle rounded-xl p-4 [&_summary::-webkit-details-marker]:hidden">
                <summary class="flex items-center justify-between cursor-pointer font-bold text-xs sm:text-sm text-slate-900">
                    <span>Apakah hardware bergaransi resmi?</span>
                    <span class="material-symbols-outlined text-slate-400 group-open:rotate-180 transition-transform">expand_more</span>
                </summary>
                <p class="text-xs text-slate-600 mt-2 leading-relaxed">
                    Ya, seluruh produk baru memiliki garansi resmi distributor 1 tahun. Kami juga menyediakan layanan tukar unit jika terjadi kendala pabrik dalam 7 hari pertama.
                </p>
            </details>

            <details class="group bg-surface-bg border border-border-subtle rounded-xl p-4 [&_summary::-webkit-details-marker]:hidden">
                <summary class="flex items-center justify-between cursor-pointer font-bold text-xs sm:text-sm text-slate-900">
                    <span>Apakah bisa dibantu instalasi dan setting awal?</span>
                    <span class="material-symbols-outlined text-slate-400 group-open:rotate-180 transition-transform">expand_more</span>
                </summary>
                <p class="text-xs text-slate-600 mt-2 leading-relaxed">
                    Tentu. Untuk wilayah Yogyakarta dan sekitarnya kami bisa mengirimkan teknisi langsung ke lokasi toko Anda atau dibimbing secara online sampai mesin siap transaksi.
                </p>
            </details>

            <details class="group bg-surface-bg border border-border-subtle rounded-xl p-4 [&_summary::-webkit-details-marker]:hidden">
                <summary class="flex items-center justify-between cursor-pointer font-bold text-xs sm:text-sm text-slate-900">
                    <span>Bagaimana cara memesan jika ingin bayar saat barang sampai (COD)?</span>
                    <span class="material-symbols-outlined text-slate-400 group-open:rotate-180 transition-transform">expand_more</span>
                </summary>
                <p class="text-xs text-slate-600 mt-2 leading-relaxed">
                    Silakan masukkan barang ke keranjang atau langsung klik tombol WhatsApp. Tim penjualan kami akan menjadwalkan kurir toko untuk pengantaran langsung ke alamat Anda.
                </p>
            </details>
        </div>
    </div>
</section>

@endsection
