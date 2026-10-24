@extends('layouts.app')

@section('title', 'Software Kasir Minimarket & Mesin Kasir | Mitra Setia')
@section('description', 'Mitra Setia: Software kasir minimarket POS Enterprise tanpa biaya langganan, bayar 1x pakai selamanya, bergaransi 6 bulan, full support teknis, dan paket mesin kasir lengkap.')

@section('content')

<!-- =======================================================================
     1. HERO SECTION: PURE WHITE, CENTERED, BOLD BLACK TYPOGRAPHY
======================================================================= -->
<section class="bg-white pt-16 sm:pt-24 pb-16 border-b border-zinc-100">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        
        <!-- Eyebrow Pill Badge -->
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-zinc-100 text-zinc-800 text-xs font-semibold mb-6">
            <span class="size-2 rounded-full bg-emerald-500"></span>
            <span>Software Kasir Minimarket &bull; Mitra Setia</span>
        </div>

        <!-- Big Punchy Black Headline -->
        <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight text-black leading-[1.12] mb-6">
            Solusi Mesin Kasir &amp; Software Kasir Tanpa Biaya Langganan.
        </h1>

        <!-- High-Contrast Subtitle -->
        <p class="text-base sm:text-lg text-zinc-600 leading-relaxed max-w-2xl mx-auto mb-8 font-normal">
            POS Enterprise mendampingi ratusan pemilik bisnis di Indonesia selama lebih dari 10 tahun. <strong>Bayar 1x pakai selamanya</strong>, bebas biaya bulanan, kerja kilat dengan shortcut keyboard, dan laporan otomatis siap saji.
        </p>

        <!-- Centered Action Buttons (Black Pill + WhatsApp Pill) -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-3 sm:gap-4 mb-4">
            <a href="#demo-form" class="w-full sm:w-auto h-12 px-7 bg-black hover:bg-zinc-800 text-white rounded-full font-semibold text-sm inline-flex items-center justify-center gap-2 transition-all shadow-sm hover:scale-[1.02] active:scale-[0.98]">
                <span class="material-symbols-outlined text-lg">download</span>
                <span>Coba Gratis 30 Hari</span>
            </a>

            <a href="https://wa.me/6281234567890?text={{ urlencode('Halo Mitra Setia, saya ingin konsultasi software kasir POS Enterprise & mesin kasir untuk usaha saya.') }}" target="_blank" class="w-full sm:w-auto h-12 px-7 bg-zinc-100 hover:bg-zinc-200 text-zinc-900 rounded-full font-semibold text-sm inline-flex items-center justify-center gap-2.5 transition-all">
                <svg class="size-4 fill-current text-emerald-600 shrink-0" viewBox="0 0 24 24">
                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                </svg>
                <span>Hubungi Kami</span>
            </a>

            <a href="{{ route('catalog') }}" class="w-full sm:w-auto h-12 px-6 bg-white hover:bg-zinc-50 text-zinc-700 border border-zinc-200 rounded-full font-semibold text-sm inline-flex items-center justify-center gap-2 transition-all">
                <span>Katalog Produk</span>
                <span class="material-symbols-outlined text-base">east</span>
            </a>
        </div>

        <p class="text-xs text-zinc-400">
            Harga Terjangkau &bull; Tanpa Biaya Langganan &bull; Bergaransi &bull; Full Support Teknis
        </p>

    </div>

    <!-- Centered Mockup Showcase: Clean Floating White Terminal with Soft Natural Shadow -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 mt-12 sm:mt-16">
        <div class="bg-white rounded-3xl p-4 sm:p-7 border border-zinc-200/80 shadow-2xl shadow-zinc-200/50">
            <!-- Terminal Header Bar -->
            <div class="flex items-center justify-between pb-4 border-b border-zinc-100 mb-5">
                <div class="flex items-center gap-2">
                    <span class="size-3 rounded-full bg-red-400"></span>
                    <span class="size-3 rounded-full bg-amber-400"></span>
                    <span class="size-3 rounded-full bg-emerald-400"></span>
                    <span class="text-xs font-bold text-zinc-800 ml-2">POS ENTERPRISE v10.4 &mdash; Edisi Ritel &amp; Minimarket</span>
                </div>
                <div class="flex items-center gap-2 text-xs font-semibold text-emerald-700 bg-emerald-50 px-3 py-1 rounded-full">
                    <span class="size-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>Status: Database Lokal Aktif (Offline Ready)</span>
                </div>
            </div>

            <!-- Realistic POS Cashier Screen Simulation -->
            <div class="bg-zinc-950 text-white rounded-2xl p-4 sm:p-5 mb-5 font-mono text-xs overflow-hidden shadow-inner">
                <!-- POS Status Line -->
                <div class="flex flex-wrap items-center justify-between gap-2 pb-3 border-b border-zinc-800 text-[11px] text-zinc-400">
                    <div class="flex items-center gap-3">
                        <span>KASIR: <strong class="text-white">01 (Utama)</strong></span>
                        <span>&bull;</span>
                        <span>SHIFT: <strong class="text-white">Pagi / Buka</strong></span>
                        <span>&bull;</span>
                        <span>FAKTUR: <strong class="text-emerald-400">TRX-20261024-0042</strong></span>
                    </div>
                    <div class="text-emerald-400 font-bold flex items-center gap-1.5">
                        <span class="size-2 rounded-full bg-emerald-400 animate-ping"></span>
                        MODE BARCODE SCANNER: AKTIF
                    </div>
                </div>

                <!-- Transaction Items Table Preview -->
                <div class="py-3 space-y-2 text-[11px] sm:text-xs">
                    <div class="hidden sm:grid grid-cols-12 text-zinc-500 font-bold border-b border-zinc-900 pb-1.5 uppercase text-[10px]">
                        <div class="col-span-2">Kode / Barcode</div>
                        <div class="col-span-5">Nama Barang</div>
                        <div class="col-span-1 text-center">Qty</div>
                        <div class="col-span-2 text-right">Harga</div>
                        <div class="col-span-2 text-right">Subtotal</div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-12 items-center gap-1 sm:gap-0 text-zinc-300">
                        <div class="sm:col-span-2 text-zinc-500 font-medium">8992753001</div>
                        <div class="sm:col-span-5 font-semibold text-white">Minyak Goreng Bimoli 2L</div>
                        <div class="sm:col-span-1 sm:text-center text-zinc-400">2 pcs</div>
                        <div class="sm:col-span-2 sm:text-right text-zinc-400">Rp 34.000</div>
                        <div class="sm:col-span-2 sm:text-right font-bold text-white">Rp 68.000</div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-12 items-center gap-1 sm:gap-0 text-zinc-300">
                        <div class="sm:col-span-2 text-zinc-500 font-medium">8999909012</div>
                        <div class="sm:col-span-5 font-semibold text-white">Beras Premium Ramos 5kg</div>
                        <div class="sm:col-span-1 sm:text-center text-zinc-400">1 sak</div>
                        <div class="sm:col-span-2 sm:text-right text-zinc-400">Rp 72.500</div>
                        <div class="sm:col-span-2 sm:text-right font-bold text-white">Rp 72.500</div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-12 items-center gap-1 sm:gap-0 text-zinc-300">
                        <div class="sm:col-span-2 text-zinc-500 font-medium">8991001004</div>
                        <div class="sm:col-span-5 font-semibold text-white">Gula Pasir Gulaku 1kg</div>
                        <div class="sm:col-span-1 sm:text-center text-zinc-400">1 pcs</div>
                        <div class="sm:col-span-2 sm:text-right text-zinc-400">Rp 17.500</div>
                        <div class="sm:col-span-2 sm:text-right font-bold text-white">Rp 17.500</div>
                    </div>
                </div>

                <!-- Total & Calculation Ribbon -->
                <div class="pt-3 border-t border-zinc-800 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 bg-zinc-900/70 p-3 rounded-xl mt-1">
                    <div class="flex items-center gap-4 text-xs">
                        <span class="text-zinc-400">Item: <strong class="text-white">4 pcs</strong></span>
                        <span class="text-zinc-400">Bayar: <strong class="text-white">Rp 200.000 (Tunai)</strong></span>
                        <span class="text-emerald-400 font-bold">Kembali: Rp 42.000</span>
                    </div>
                    <div class="text-right sm:text-right w-full sm:w-auto">
                        <span class="text-[10px] text-zinc-400 uppercase tracking-widest block">TOTAL AKHIR</span>
                        <span class="text-lg sm:text-xl font-extrabold text-emerald-400 tracking-tight">Rp 158.000</span>
                    </div>
                </div>

                <!-- Keyboard Shortcut Guide Bar -->
                <div class="mt-3 pt-2.5 border-t border-zinc-800/60 flex flex-wrap items-center justify-between gap-2 text-[10px] text-zinc-400">
                    <span class="flex items-center gap-1"><kbd class="bg-zinc-800 text-white px-1.5 py-0.5 rounded font-bold">F1</kbd> Cari Barang</span>
                    <span class="flex items-center gap-1"><kbd class="bg-zinc-800 text-white px-1.5 py-0.5 rounded font-bold">F2</kbd> Ubah Qty</span>
                    <span class="flex items-center gap-1"><kbd class="bg-zinc-800 text-white px-1.5 py-0.5 rounded font-bold">F4</kbd> Diskon</span>
                    <span class="flex items-center gap-1"><kbd class="bg-zinc-800 text-white px-1.5 py-0.5 rounded font-bold">F5</kbd> Bayar / Selesai</span>
                    <span class="flex items-center gap-1"><kbd class="bg-zinc-800 text-white px-1.5 py-0.5 rounded font-bold">F7</kbd> Pending Transaksi</span>
                    <span class="flex items-center gap-1"><kbd class="bg-zinc-800 text-white px-1.5 py-0.5 rounded font-bold">F12</kbd> Cetak Ulang Struk</span>
                </div>
            </div>

            <!-- 3 Benefit Pillars underneath -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-left">
                <!-- Col 1: Shortcut & Input Barang -->
                <div class="bg-zinc-50 rounded-2xl p-4 sm:p-5 border border-zinc-100 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-bold text-zinc-800 uppercase tracking-wider">Input Kilat</span>
                            <span class="font-mono text-[11px] font-bold bg-white border border-zinc-200 px-2 py-0.5 rounded text-zinc-700">F1</span>
                        </div>
                        <p class="text-xs text-zinc-500 leading-relaxed">
                            Cari barang instan via Barcode Scanner atau ketik nama/kode barang tanpa sentuh mouse.
                        </p>
                    </div>
                    <div class="mt-3 pt-2.5 border-t border-zinc-200/60 font-mono text-[11px] text-zinc-700">
                        &gt; Barcode &amp; Autocomplete Ready
                    </div>
                </div>

                <!-- Col 2: Multi-Payment & QRIS -->
                <div class="bg-zinc-50 rounded-2xl p-4 sm:p-5 border border-zinc-100 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-bold text-zinc-800 uppercase tracking-wider">Multi-Pembayaran</span>
                            <span class="font-mono text-[11px] font-bold bg-white border border-zinc-200 px-2 py-0.5 rounded text-zinc-700">F5</span>
                        </div>
                        <p class="text-xs text-zinc-500 leading-relaxed">
                            Support Tunai, Transfer Bank, Debit, E-Wallet, QRIS Dinamis, dan Piutang Member.
                        </p>
                    </div>
                    <div class="mt-3 pt-2.5 border-t border-zinc-200/60 font-mono text-[11px] text-emerald-700 font-bold">
                        &gt; Hitung Kembalian Otomatis
                    </div>
                </div>

                <!-- Col 3: Cetak Struk & Laporan -->
                <div class="bg-zinc-50 rounded-2xl p-4 sm:p-5 border border-zinc-100 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-bold text-zinc-800 uppercase tracking-wider">Cetak &amp; Rekap</span>
                            <span class="font-mono text-[11px] font-bold bg-white border border-zinc-200 px-2 py-0.5 rounded text-zinc-700">F12</span>
                        </div>
                        <p class="text-xs text-zinc-500 leading-relaxed">
                            Cetak struk thermal 58/80mm, auto buka laci cash drawer, dan rekap omzet kasir harian.
                        </p>
                    </div>
                    <div class="mt-3 pt-2.5 border-t border-zinc-200/60 font-mono text-[11px] text-zinc-700">
                        &gt; Laci Terbuka &bull; Struk Selesai
                    </div>
                </div>
            </div>

            <!-- Terminal Footer Banner -->
            <div class="mt-5 pt-4 border-t border-zinc-100 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-zinc-500">
                <div>
                    <strong class="text-black font-semibold">Bayar 1x Pakai Selamanya</strong> &bull; Tanpa beban biaya sewa atau biaya per transaksi.
                </div>
                <a href="#demo-form" class="font-semibold text-black hover:underline inline-flex items-center gap-1">
                    <span>Minta link installer coba gratis</span>
                    <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </a>
            </div>
        </div>
    </div>
</section>


<!-- =======================================================================
     2. ASYMMETRIC EDITORIAL STATEMENT & 10+ YEARS EXPERIENCE
======================================================================= -->
<section class="py-20 sm:py-28 bg-white border-b border-zinc-100">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-start">
            
            <!-- Left Column: Big Metric & Trust Anchors (Col 5) -->
            <div class="lg:col-span-5 bg-zinc-50/70 p-7 sm:p-9 rounded-3xl border border-zinc-200/80">
                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white border border-zinc-200 text-zinc-800 text-xs font-semibold mb-6 shadow-xs">
                    <span class="size-2 rounded-full bg-emerald-500"></span>
                    <span>Pengalaman Teruji Sejak 2014</span>
                </span>
                
                <div class="flex items-baseline gap-2 mb-3">
                    <span class="text-6xl sm:text-7xl font-extrabold text-black tracking-tight leading-none">10+</span>
                    <span class="text-2xl sm:text-3xl font-extrabold text-emerald-600 tracking-tight">Tahun</span>
                </div>
                
                <h3 class="text-base sm:text-lg font-bold text-zinc-950 mb-3 leading-snug">
                    Mendampingi &amp; mempercepat transaksi ratusan pemilik toko di Indonesia.
                </h3>
                
                <p class="text-xs sm:text-sm text-zinc-500 leading-relaxed mb-6">
                    Sistem POS Enterprise telah matang teruji melewati berbagai pembaruan alur kasir, stabil tanpa koneksi internet (*offline ready*), dan database ringan tanpa perlu spek komputer mahal.
                </p>

                <!-- Retail Types Supported -->
                <div class="pt-6 border-t border-zinc-200/80">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-zinc-400 block mb-3">
                        Fleksibel Untuk Segala Jenis Usaha:
                    </span>
                    <div class="flex flex-wrap gap-2 text-xs">
                        <span class="px-3 py-1.5 rounded-full bg-white border border-zinc-200/90 text-zinc-800 font-medium">Toko Kelontong &amp; Sembako</span>
                        <span class="px-3 py-1.5 rounded-full bg-white border border-zinc-200/90 text-zinc-800 font-medium">Minimarket &amp; Swalayan</span>
                        <span class="px-3 py-1.5 rounded-full bg-white border border-zinc-200/90 text-zinc-800 font-medium">Toko Pakaian &amp; Butik</span>
                        <span class="px-3 py-1.5 rounded-full bg-white border border-zinc-200/90 text-zinc-800 font-medium">Toko Bahan Bangunan</span>
                        <span class="px-3 py-1.5 rounded-full bg-white border border-zinc-200/90 text-zinc-800 font-medium">Toko Buku &amp; ATK</span>
                        <span class="px-3 py-1.5 rounded-full bg-white border border-zinc-200/90 text-zinc-800 font-medium">Apotek &amp; Grosir</span>
                    </div>
                </div>
            </div>

            <!-- Right Column: Dual-Tone Headline & Editorial Story (Col 7) -->
            <div class="lg:col-span-7 flex flex-col justify-center lg:pt-2">
                
                <!-- Dual-tone Headline: Contrast between Market Flaw vs Solution -->
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold leading-[1.2] tracking-tight mb-6">
                    <span class="text-zinc-400 block mb-2 font-bold text-xl sm:text-2xl lg:text-3xl">
                        Kebanyakan software kasir membebani biaya bulanan dan sulit dipelajari staf baru.
                    </span>
                    <span class="text-black block">
                        POS Enterprise dirancang sebaliknya: sekali beli, mudah digunakan, dan operasional kilat tanpa klik mouse.
                    </span>
                </h2>

                <p class="text-sm sm:text-base text-zinc-600 leading-relaxed mb-6">
                    Berpengalaman lebih dari 10 tahun mendampingi pelaku usaha dari berbagai jenis bisnis, mulai dari toko kelontong, toko pakaian, toko buku, hingga toko bahan bangunan. POS Enterprise terus melakukan pengembangan sehingga fitur-fitur yang tersedia dapat memenuhi kebutuhan pengguna dan sesuai dengan perkembangan jaman yang dinamis.
                </p>

                <!-- 4 Value Checkmarks -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5 pt-6 border-t border-zinc-100 text-xs">
                    <div class="flex items-center gap-2.5 font-bold text-zinc-900">
                        <span class="material-symbols-outlined text-emerald-600 text-lg">check_circle</span>
                        <span>Bayar 1x Pakai Selamanya</span>
                    </div>
                    <div class="flex items-center gap-2.5 font-bold text-zinc-900">
                        <span class="material-symbols-outlined text-emerald-600 text-lg">check_circle</span>
                        <span>Full Shortcut Keyboard (Tanpa Mouse)</span>
                    </div>
                    <div class="flex items-center gap-2.5 font-bold text-zinc-900">
                        <span class="material-symbols-outlined text-emerald-600 text-lg">check_circle</span>
                        <span>Database Ringan &amp; Offline Ready</span>
                    </div>
                    <div class="flex items-center gap-2.5 font-bold text-zinc-900">
                        <span class="material-symbols-outlined text-emerald-600 text-lg">check_circle</span>
                        <span>Garansi 6 Bulan &amp; Free Training 3x</span>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>


<!-- =======================================================================
     3. EMPAT PILAR POS ENTERPRISE (CLEAN LIST CARDS)
======================================================================= -->
<section id="fitur-software" class="scroll-mt-20 py-20 sm:py-28 bg-zinc-50/60 border-b border-zinc-100">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        
        <div class="text-center max-w-xl mx-auto mb-16">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-black tracking-tight">
                Empat pilar. Itu saja.
            </h2>
            <p class="text-sm text-zinc-500 mt-3">
                Kunci utama kemudahan operasional kasir toko Anda setiap hari.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Pilar 1 -->
            <div class="bg-white p-7 rounded-3xl border border-zinc-200/80 shadow-sm flex flex-col justify-between">
                <div>
                    <span class="text-xs font-bold text-zinc-400 block mb-4">01</span>
                    <h3 class="text-base font-bold text-black mb-2">Tampilan Menarik &amp; Mudah Digunakan</h3>
                    <p class="text-xs text-zinc-500 leading-relaxed">
                        Desain tampilan menarik dan nyaman dilihat, fitur lengkap menggunakan bahasa Indonesia sehingga mudah dipelajari serta digunakan.
                    </p>
                </div>
            </div>

            <!-- Pilar 2 -->
            <div class="bg-white p-7 rounded-3xl border border-zinc-200/80 shadow-sm flex flex-col justify-between">
                <div>
                    <span class="text-xs font-bold text-zinc-400 block mb-4">02</span>
                    <h3 class="text-base font-bold text-black mb-2">Kerja Lebih Cepat, Tanpa Klik Mouse</h3>
                    <p class="text-xs text-zinc-500 leading-relaxed">
                        Layani pelanggan lebih cepat dengan berbagai shortcut yang disediakan. Pelayanan cepat, pelanggan puas.
                    </p>
                </div>
            </div>

            <!-- Pilar 3 -->
            <div class="bg-white p-7 rounded-3xl border border-zinc-200/80 shadow-sm flex flex-col justify-between">
                <div>
                    <span class="text-xs font-bold text-zinc-400 block mb-4">03</span>
                    <h3 class="text-base font-bold text-black mb-2">Laporan Lengkap &amp; Customizable</h3>
                    <p class="text-xs text-zinc-500 leading-relaxed">
                        Puluhan menu laporan yang bisa diubah atau ditambah sesuai kebutuhan user. Cukup sekali klik, laporan tersaji.
                    </p>
                </div>
            </div>

            <!-- Pilar 4 -->
            <div class="bg-white p-7 rounded-3xl border border-zinc-200/80 shadow-sm flex flex-col justify-between">
                <div>
                    <span class="text-xs font-bold text-zinc-400 block mb-4">04</span>
                    <h3 class="text-base font-bold text-black mb-2">Kunci Menu Dengan Hak Akses User</h3>
                    <p class="text-xs text-zinc-500 leading-relaxed">
                        Melindungi data penting toko; user hanya bisa mengakses menu sesuai pekerjaan dan jabatannya.
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>


<!-- =======================================================================
     4. FITUR APLIKASI LENGKAP & USER FRIENDLY
======================================================================= -->
<section class="py-20 sm:py-28 bg-white border-b border-zinc-100">
    <div class="max-w-5xl mx-auto px-4 sm:px-6">
        
        <div class="text-center max-w-xl mx-auto mb-16">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-black tracking-tight">
                Fitur lengkap sesuai kebutuhan toko Anda.
            </h2>
            <p class="text-sm text-zinc-500 mt-3">
                Fitur lengkap sesuai kebutuhan user dan mudah digunakan bahkan oleh user awam sekalipun.
            </p>
        </div>

        <!-- Clean 2-Column Minimalist Feature Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-10">
            
            <!-- Fitur 1 -->
            <div class="flex items-start gap-4">
                <div class="size-10 rounded-2xl bg-zinc-100 flex items-center justify-center text-zinc-800 shrink-0">
                    <span class="material-symbols-outlined text-xl">database</span>
                </div>
                <div>
                    <h4 class="font-bold text-black text-sm mb-1">Master Data</h4>
                    <p class="text-xs text-zinc-500 leading-relaxed">
                        Kelola data Supplier, Pelanggan, Barang, Satuan Bertingkat, dan Barcode Scanner secara rapi.
                    </p>
                </div>
            </div>

            <!-- Fitur 2 -->
            <div class="flex items-start gap-4">
                <div class="size-10 rounded-2xl bg-zinc-100 flex items-center justify-center text-zinc-800 shrink-0">
                    <span class="material-symbols-outlined text-xl">inventory_2</span>
                </div>
                <div>
                    <h4 class="font-bold text-black text-sm mb-1">Stok Barang</h4>
                    <p class="text-xs text-zinc-500 leading-relaxed">
                        Data Stok real-time, Mutasi stok antar toko/gudang, Stok Opname, dan peringatan barang menipis.
                    </p>
                </div>
            </div>

            <!-- Fitur 3 -->
            <div class="flex items-start gap-4">
                <div class="size-10 rounded-2xl bg-zinc-100 flex items-center justify-center text-zinc-800 shrink-0">
                    <span class="material-symbols-outlined text-xl">receipt_long</span>
                </div>
                <div>
                    <h4 class="font-bold text-black text-sm mb-1">Transaksi</h4>
                    <p class="text-xs text-zinc-500 leading-relaxed">
                        Transaksi Jual (POS Kasir), Pembelian Supplier, Hutang, Piutang Pelanggan, dan Retur Barang.
                    </p>
                </div>
            </div>

            <!-- Fitur 4 -->
            <div class="flex items-start gap-4">
                <div class="size-10 rounded-2xl bg-zinc-100 flex items-center justify-center text-zinc-800 shrink-0">
                    <span class="material-symbols-outlined text-xl">payments</span>
                </div>
                <div>
                    <h4 class="font-bold text-black text-sm mb-1">Pembayaran Tunai / Non Tunai</h4>
                    <p class="text-xs text-zinc-500 leading-relaxed">
                        Menerima Transfer, Kartu Debit, E-Wallet (GoPay/OVO/ShopeePay), dan QRIS Dinamis.
                    </p>
                </div>
            </div>

            <!-- Fitur 5 -->
            <div class="flex items-start gap-4">
                <div class="size-10 rounded-2xl bg-zinc-100 flex items-center justify-center text-zinc-800 shrink-0">
                    <span class="material-symbols-outlined text-xl">summarize</span>
                </div>
                <div>
                    <h4 class="font-bold text-black text-sm mb-1">Laporan Lengkap</h4>
                    <p class="text-xs text-zinc-500 leading-relaxed">
                        Puluhan laporan penjualan, laba rugi, rekap kasir harian. Edit/tambah sesuai kebutuhan.
                    </p>
                </div>
            </div>

            <!-- Fitur 6 -->
            <div class="flex items-start gap-4">
                <div class="size-10 rounded-2xl bg-zinc-100 flex items-center justify-center text-zinc-800 shrink-0">
                    <span class="material-symbols-outlined text-xl">lock</span>
                </div>
                <div>
                    <h4 class="font-bold text-black text-sm mb-1">Fitur Hak Akses</h4>
                    <p class="text-xs text-zinc-500 leading-relaxed">
                        Kunci menu dengan hak akses user untuk mengamankan data omzet dan mencegah kecurangan.
                    </p>
                </div>
            </div>

            <!-- Fitur 7 (Full Span) -->
            <div class="md:col-span-2 flex items-start gap-4 pt-4 border-t border-zinc-100">
                <div class="size-10 rounded-2xl bg-zinc-100 flex items-center justify-center text-zinc-800 shrink-0">
                    <span class="material-symbols-outlined text-xl">print</span>
                </div>
                <div>
                    <h4 class="font-bold text-black text-sm mb-1">Support Aksesoris Pendukung</h4>
                    <p class="text-xs text-zinc-500 leading-relaxed">
                        Printer Kasir Thermal (58mm/80mm), Scanner Barcode 1D &amp; 2D, Timbangan Digital, Cash Drawer, dan Customer Display.
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>


<!-- =======================================================================
     5. MINIMUM REQUIREMENT (CLEAN WHITE SPEC PILL)
======================================================================= -->
<section class="py-16 bg-zinc-50/60 border-b border-zinc-100">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        <div class="bg-white rounded-3xl p-8 sm:p-10 border border-zinc-200/80 shadow-sm text-center">
            <span class="text-xs font-bold uppercase tracking-wider text-emerald-700 bg-emerald-50 px-3 py-1 rounded-full inline-block mb-3">
                Database Ringan &amp; Bandel
            </span>
            <h3 class="text-2xl sm:text-3xl font-extrabold text-black tracking-tight mb-3">
                Minimum Requirement
            </h3>
            <p class="text-xs sm:text-sm text-zinc-500 max-w-xl mx-auto mb-8 leading-relaxed">
                POS Enterprise sangat efisien dan ringan. Bisa dipasang di komputer kasir baru maupun laptop kantor lama.
            </p>

            <div class="grid grid-cols-2 sm:grid-cols-5 gap-3 text-left">
                <div class="bg-zinc-50 rounded-2xl p-4 border border-zinc-100">
                    <span class="text-[10px] text-zinc-400 font-bold uppercase block">OS</span>
                    <strong class="text-xs text-black block mt-1">Windows XP/7/10/11</strong>
                </div>
                <div class="bg-zinc-50 rounded-2xl p-4 border border-zinc-100">
                    <span class="text-[10px] text-zinc-400 font-bold uppercase block">Prosesor</span>
                    <strong class="text-xs text-black block mt-1">Core i3 / i5 / up</strong>
                </div>
                <div class="bg-zinc-50 rounded-2xl p-4 border border-zinc-100">
                    <span class="text-[10px] text-zinc-400 font-bold uppercase block">RAM</span>
                    <strong class="text-xs text-black block mt-1">2 / 4 GB / up</strong>
                </div>
                <div class="bg-zinc-50 rounded-2xl p-4 border border-zinc-100">
                    <span class="text-[10px] text-zinc-400 font-bold uppercase block">Hard Disk</span>
                    <strong class="text-xs text-black block mt-1">250 / 500 GB / up</strong>
                </div>
                <div class="bg-zinc-50 rounded-2xl p-4 border border-zinc-100 col-span-2 sm:col-span-1">
                    <span class="text-[10px] text-zinc-400 font-bold uppercase block">Jaringan</span>
                    <strong class="text-xs text-black block mt-1">LAN / Wifi</strong>
                </div>
            </div>

            <div class="mt-8">
                <a href="#demo-form" class="h-11 px-6 bg-black hover:bg-zinc-800 text-white rounded-full text-xs font-semibold inline-flex items-center gap-2 transition-all">
                    <span>Coba Gratis 30 Hari</span>
                    <span class="material-symbols-outlined text-base">arrow_downward</span>
                </a>
            </div>
        </div>
    </div>
</section>


<!-- =======================================================================
     6. KENAPA HARUS MEMILIH POS ENTERPRISE? (VALUE COMPARISON)
======================================================================= -->
<section id="keunggulan" class="scroll-mt-20 py-20 sm:py-28 bg-white border-b border-zinc-100">
    <div class="max-w-5xl mx-auto px-4 sm:px-6">
        
        <div class="text-center max-w-2xl mx-auto mb-16">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-black tracking-tight">
                Kenapa Harus Memilih POS Enterprise?
            </h2>
            <p class="text-sm text-zinc-500 mt-3 leading-relaxed">
                Banyak software sejenis tersedia di internet atau marketplace, mulai dari puluhan ribu hingga puluhan juta. Dari sekian banyak pilihan, kenapa harus memilih POS Enterprise?
            </p>
        </div>

        <!-- 8 Bullet Reasons with Checkmark Pills -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            
            <div class="p-5 rounded-2xl border border-zinc-200 bg-white hover:border-black transition-colors flex items-start gap-3">
                <span class="material-symbols-outlined text-emerald-600 text-xl shrink-0 mt-0.5">check_circle</span>
                <div>
                    <h4 class="font-bold text-black text-sm">Harga Terjangkau</h4>
                    <p class="text-xs text-zinc-500 mt-1">Investasi software bersahabat untuk toko Anda.</p>
                </div>
            </div>

            <div class="p-5 rounded-2xl border border-zinc-200 bg-white hover:border-black transition-colors flex items-start gap-3">
                <span class="material-symbols-outlined text-emerald-600 text-xl shrink-0 mt-0.5">check_circle</span>
                <div>
                    <h4 class="font-bold text-black text-sm">Bayar 1x, Pakai Selamanya</h4>
                    <p class="text-xs text-zinc-500 mt-1">Lisensi seumur hidup tanpa masa kedaluwarsa.</p>
                </div>
            </div>

            <div class="p-5 rounded-2xl border border-zinc-200 bg-white hover:border-black transition-colors flex items-start gap-3">
                <span class="material-symbols-outlined text-emerald-600 text-xl shrink-0 mt-0.5">check_circle</span>
                <div>
                    <h4 class="font-bold text-black text-sm">Tanpa Biaya Langganan</h4>
                    <p class="text-xs text-zinc-500 mt-1">Nol rupiah per bulan, tanpa tagihan rutin.</p>
                </div>
            </div>

            <div class="p-5 rounded-2xl border border-zinc-200 bg-white hover:border-black transition-colors flex items-start gap-3">
                <span class="material-symbols-outlined text-emerald-600 text-xl shrink-0 mt-0.5">check_circle</span>
                <div>
                    <h4 class="font-bold text-black text-sm">Garansi 6 Bulan</h4>
                    <p class="text-xs text-zinc-500 mt-1">Jaminan pendampingan dan garansi resmi.</p>
                </div>
            </div>

            <div class="p-5 rounded-2xl border border-zinc-200 bg-white hover:border-black transition-colors flex items-start gap-3">
                <span class="material-symbols-outlined text-emerald-600 text-xl shrink-0 mt-0.5">check_circle</span>
                <div>
                    <h4 class="font-bold text-black text-sm">Free Training 3x</h4>
                    <p class="text-xs text-zinc-500 mt-1">Bimbingan sampai Anda dan staf kasir mahir.</p>
                </div>
            </div>

            <div class="p-5 rounded-2xl border border-zinc-200 bg-white hover:border-black transition-colors flex items-start gap-3">
                <span class="material-symbols-outlined text-emerald-600 text-xl shrink-0 mt-0.5">check_circle</span>
                <div>
                    <h4 class="font-bold text-black text-sm">Support Teknis Selama Pakai</h4>
                    <p class="text-xs text-zinc-500 mt-1">Bantuan via WA &amp; Remote desktop.</p>
                </div>
            </div>

            <div class="p-5 rounded-2xl border border-zinc-200 bg-white hover:border-black transition-colors flex items-start gap-3">
                <span class="material-symbols-outlined text-emerald-600 text-xl shrink-0 mt-0.5">check_circle</span>
                <div>
                    <h4 class="font-bold text-black text-sm">Fitur Dapat Disesuaikan</h4>
                    <p class="text-xs text-zinc-500 mt-1">Dapat dicustom sesuai alur bisnis toko Anda.</p>
                </div>
            </div>

            <div class="p-5 rounded-2xl border border-zinc-200 bg-white hover:border-black transition-colors flex items-start gap-3">
                <span class="material-symbols-outlined text-emerald-600 text-xl shrink-0 mt-0.5">check_circle</span>
                <div>
                    <h4 class="font-bold text-black text-sm">Cocok Untuk Segala Usaha</h4>
                    <p class="text-xs text-zinc-500 mt-1">Minimarket, toserba, pakaian, bangunan, apotek.</p>
                </div>
            </div>

        </div>

        <div class="mt-10 text-center">
            <a href="#demo-form" class="h-12 px-8 bg-black hover:bg-zinc-800 text-white rounded-full font-semibold text-xs uppercase tracking-wider inline-flex items-center gap-2 transition-all shadow-sm">
                <span>Coba Gratis 30 Hari</span>
                <span class="material-symbols-outlined text-base">east</span>
            </a>
        </div>

    </div>
</section>


<!-- =======================================================================
     7. PRODUK & HARDWARE PILIHAN (CLEAN WHITE PRODUCT CARDS)
======================================================================= -->
<section class="py-20 sm:py-28 bg-zinc-50/60 border-b border-zinc-100">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-12">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-zinc-400 block mb-1">
                    Katalog Mitra Setia
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-black tracking-tight">
                    Software &amp; Mesin Kasir Pilihan
                </h2>
            </div>
            <a href="{{ route('catalog') }}" class="text-xs font-semibold text-black hover:underline inline-flex items-center gap-1">
                <span>Lihat semua produk</span>
                <span class="material-symbols-outlined text-sm">east</span>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($featuredProducts as $product)
                <div class="bg-white rounded-3xl p-5 border border-zinc-200/80 hover:border-black transition-all shadow-sm flex flex-col justify-between">
                    <div>
                        <!-- Category Badge & Stock -->
                        <div class="flex items-center justify-between text-xs mb-3">
                            <span class="font-semibold text-zinc-500 text-[11px] bg-zinc-100 px-2.5 py-0.5 rounded-full">
                                {{ $product->category }}
                            </span>
                            @if ($product->stock > 0)
                                <span class="text-emerald-700 font-semibold text-[11px] flex items-center gap-1">
                                    <span class="size-1.5 rounded-full bg-emerald-500"></span>
                                    Ready ({{ $product->stock }})
                                </span>
                            @else
                                <span class="text-red-600 font-semibold text-[11px]">Habis</span>
                            @endif
                        </div>

                        <!-- 1:1 Aspect Ratio Photo -->
                        <a href="{{ route('product.show', $product->id) }}" class="block aspect-square bg-zinc-50 rounded-2xl p-4 flex items-center justify-center border border-zinc-100 mb-4 overflow-hidden">
                            <img src="{{ Str::startsWith($product->image, ['http://', 'https://', 'data:']) ? $product->image : asset($product->image) }}" 
                                 alt="{{ $product->name }}" 
                                 class="max-h-full max-w-full object-contain"
                                 onerror="this.src='https://placehold.co/400x400/FAFAFA/18181B?text=Mitra+Setia'">
                        </a>

                        <!-- Product Title -->
                        <h3 class="font-bold text-black text-sm leading-snug line-clamp-2 mb-2">
                            <a href="{{ route('product.show', $product->id) }}" class="hover:underline">
                                {{ $product->name }}
                            </a>
                        </h3>

                        <!-- Specs Preview -->
                        @if ($product->specs)
                            <div class="text-[11px] text-zinc-500 space-y-0.5 mb-4 line-clamp-2">
                                @foreach (array_slice($product->specs, 0, 2) as $key => $val)
                                    <div>&bull; {{ $key }}: <span class="text-zinc-800 font-medium">{{ $val }}</span></div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-[11px] text-zinc-400 mb-4">Garansi Resmi Mitra Setia</div>
                        @endif
                    </div>

                    <div>
                        <!-- Price -->
                        <div class="pt-3 border-t border-zinc-100 mb-4 flex items-baseline justify-between">
                            <div>
                                <span class="text-[10px] text-zinc-400 block uppercase font-medium">Harga</span>
                                <div class="text-base font-extrabold text-black">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </div>
                            </div>
                            @if($product->original_price)
                                <span class="text-xs text-zinc-400 line-through">
                                    Rp {{ number_format($product->original_price, 0, ',', '.') }}
                                </span>
                            @endif
                        </div>

                        <!-- Actions (Pill Buttons) -->
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
                                <button type="submit" name="buy_now" value="1" class="w-full h-10 px-2 bg-black hover:bg-zinc-800 text-white font-semibold rounded-full transition-colors inline-flex items-center justify-center gap-1">
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


<!-- =======================================================================
     8. TESTIMONI PENGGUNA (CLEAN WHITE EDITORIAL QUOTES)
======================================================================= -->
<section id="testimoni" class="scroll-mt-20 py-20 sm:py-28 bg-white border-b border-zinc-100">
    <div class="max-w-5xl mx-auto px-4 sm:px-6">
        
        <div class="text-center max-w-xl mx-auto mb-16">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-black tracking-tight">
                Dipercaya oleh pemilik usaha di seluruh Indonesia.
            </h2>
            <p class="text-sm text-zinc-500 mt-3">
                Kisah nyata pengguna software kasir minimarket POS Enterprise.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <!-- Testimoni 1 -->
            <div class="bg-zinc-50/60 p-7 rounded-3xl border border-zinc-200/80 flex flex-col justify-between">
                <div>
                    <div class="text-xs font-semibold text-emerald-700 mb-4">&bull; Terverifikasi</div>
                    <blockquote class="text-sm text-zinc-800 leading-relaxed font-normal">
                        “Mudah dalam pengoperasian, bisa dicustom sesuai kebutuhan dan support teknis tanggap (pelayanan bagus).”
                    </blockquote>
                </div>
                <div class="pt-4 border-t border-zinc-200/60 mt-6">
                    <strong class="text-black text-xs block">Grosir Batik Arjuna</strong>
                    <span class="text-[11px] text-zinc-500">Retail Fashion &amp; Grosir</span>
                </div>
            </div>

            <!-- Testimoni 2 -->
            <div class="bg-zinc-50/60 p-7 rounded-3xl border border-zinc-200/80 flex flex-col justify-between">
                <div>
                    <div class="text-xs font-semibold text-emerald-700 mb-4">&bull; Terverifikasi</div>
                    <blockquote class="text-sm text-zinc-800 leading-relaxed font-normal">
                        “Respon cepat ketika terjadi trouble. Program mudah dioperasikan dan menu cukup lengkap.”
                    </blockquote>
                </div>
                <div class="pt-4 border-t border-zinc-200/60 mt-6">
                    <strong class="text-black text-xs block">Swalayan Madu Rejeki</strong>
                    <span class="text-[11px] text-zinc-500">Minimarket &amp; Swalayan</span>
                </div>
            </div>

            <!-- Testimoni 3 -->
            <div class="bg-zinc-50/60 p-7 rounded-3xl border border-zinc-200/80 flex flex-col justify-between">
                <div>
                    <div class="text-xs font-semibold text-emerald-700 mb-4">&bull; Terverifikasi</div>
                    <blockquote class="text-sm text-zinc-800 leading-relaxed font-normal">
                        “Keunggulan POS Enterprise mudah digunakan dan menu yang ditampilkan juga lengkap untuk menunjang aktifitas pekerjaan. Support teknis memuaskan.”
                    </blockquote>
                </div>
                <div class="pt-4 border-t border-zinc-200/60 mt-6">
                    <strong class="text-black text-xs block">Maco</strong>
                    <span class="text-[11px] text-zinc-500">Toko Retail</span>
                </div>
            </div>

            <!-- Testimoni 4 -->
            <div class="bg-zinc-50/60 p-7 rounded-3xl border border-zinc-200/80 flex flex-col justify-between">
                <div>
                    <div class="text-xs font-semibold text-emerald-700 mb-4">&bull; Terverifikasi</div>
                    <blockquote class="text-sm text-zinc-800 leading-relaxed font-normal">
                        “Sistemnya lengkap dan rapi, mudah dipelajari dan sangat membantu pekerjaan lebih cepat.”
                    </blockquote>
                </div>
                <div class="pt-4 border-t border-zinc-200/60 mt-6">
                    <strong class="text-black text-xs block">Commando</strong>
                    <span class="text-[11px] text-zinc-500">Usaha Retail &amp; Dagang</span>
                </div>
            </div>

            <!-- Testimoni 5 -->
            <div class="bg-zinc-50/60 p-7 rounded-3xl border border-zinc-200/80 flex flex-col justify-between">
                <div>
                    <div class="text-xs font-semibold text-emerald-700 mb-4">&bull; Terverifikasi</div>
                    <blockquote class="text-sm text-zinc-800 leading-relaxed font-normal">
                        “Simpel, mudah dioperasikan, dan bisa disesuaikan dengan kebutuhan. Tim support teknis sangat membantu setiap ada kendala.”
                    </blockquote>
                </div>
                <div class="pt-4 border-t border-zinc-200/60 mt-6">
                    <strong class="text-black text-xs block">Swalayan Ijo Royo-Royo</strong>
                    <span class="text-[11px] text-zinc-500">Minimarket Sembako</span>
                </div>
            </div>

            <!-- Testimoni 6 -->
            <div class="bg-zinc-50/60 p-7 rounded-3xl border border-zinc-200/80 flex flex-col justify-between">
                <div>
                    <div class="text-xs font-semibold text-emerald-700 mb-4">&bull; Terverifikasi</div>
                    <blockquote class="text-sm text-zinc-800 leading-relaxed font-normal">
                        “Support sangat baik, sistem mudah dioperasikan dan bandel, database ringan. Secara keseluruhan kami sangat puas.”
                    </blockquote>
                </div>
                <div class="pt-4 border-t border-zinc-200/60 mt-6">
                    <strong class="text-black text-xs block">Toko Sri Rejeki</strong>
                    <span class="text-[11px] text-zinc-500">Toko Sembako &amp; Kelontong</span>
                </div>
            </div>

        </div>

    </div>
</section>


<!-- =======================================================================
     9. FORM DEMO 30 HARI & DOWNLOAD SEKARANG
======================================================================= -->
<section id="demo-form" class="scroll-mt-20 py-20 sm:py-28 bg-zinc-50/60">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        
        <div class="bg-white rounded-3xl p-8 sm:p-12 border border-zinc-200/80 shadow-card">
            
            <div class="text-center max-w-xl mx-auto mb-10">
                <span class="text-xs font-bold uppercase tracking-wider text-black bg-zinc-100 px-3 py-1 rounded-full inline-block mb-3">
                    DOWNLOAD SEKARANG &bull; FULL FITUR AKTIF
                </span>
                <h2 class="text-2xl sm:text-4xl font-extrabold text-black tracking-tight">
                    Coba Gratis 30 Hari Dengan Full Fitur Aktif
                </h2>
                <p class="text-xs sm:text-sm text-zinc-600 mt-3 leading-relaxed">
                    Ratusan pemilik usaha di berbagai kota di Indonesia dengan beragam jenis usaha dan skala bisnis telah terbantu dengan software kasir minimarket POS Enterprise dari Mitra Setia.
                </p>
                <p class="text-xs text-zinc-400 mt-2">
                    Adalah sebuah kebanggaan bagi kami untuk dapat membantu memudahkan pekerjaan Anda, meningkatkan efektivitas pekerjaan, dan menjadi bagian dari pertumbuhan bisnis Anda.
                </p>
                <div class="text-xs font-semibold text-black mt-3">
                    Download POS Enterprise sekarang dan Anda dapat mencoba secara GRATIS selama 30 hari dengan full fitur aktif.
                </div>
            </div>

            <!-- Feedback Banner (Hidden by default, shown on submit) -->
            <div id="demo-feedback" class="hidden mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-950 text-xs sm:text-sm">
                <div class="flex items-start gap-3">
                    <span class="material-symbols-outlined text-emerald-600 text-xl shrink-0 mt-0.5">check_circle</span>
                    <div>
                        <strong class="font-bold block text-emerald-900">Permintaan Anda Berhasil Disiapkan!</strong>
                        <p class="mt-0.5 text-emerald-800">
                            Jendela WhatsApp sedang dibuka otomatis untuk menghubungi Helpdesk Mitra Setia. Jika chat belum terbuka, <a id="demo-fallback-link" href="#" target="_blank" class="underline font-bold text-emerald-950 hover:text-black">klik di sini untuk membuka WhatsApp</a>.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Form Kontak Lutfian / Mitra Setia -->
            <form onsubmit="handleDemoRequest(event)" class="space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-zinc-700 mb-1.5">
                            Nama Lengkap <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="demo_name" required placeholder="Contoh: Budi Santoso" class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:border-black focus:outline-none text-black text-sm rounded-xl transition-all">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-zinc-700 mb-1.5">
                            No. WhatsApp / Telepon <span class="text-red-500">*</span>
                        </label>
                        <input type="tel" id="demo_phone" required placeholder="Contoh: 081234567890" class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:border-black focus:outline-none text-black text-sm rounded-xl transition-all">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-zinc-700 mb-1.5">
                            Kota / Domisili Usaha <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="demo_city" required placeholder="Contoh: Sleman, Yogyakarta" class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:border-black focus:outline-none text-black text-sm rounded-xl transition-all">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-zinc-700 mb-1.5">
                            Jenis Usaha Anda <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="demo_business" required placeholder="Contoh: Toko Kelontong, Minimarket, Butik" class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:border-black focus:outline-none text-black text-sm rounded-xl transition-all">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-zinc-700 mb-1.5">
                        Subject Permintaan <span class="text-red-500">*</span>
                    </label>
                    <select id="demo_subject" required class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:border-black focus:outline-none text-black text-sm rounded-xl transition-all">
                        <option value="Request Demo POS Enterprise (Coba Gratis 30 Hari)">Request Demo POS Enterprise (Coba Gratis 30 Hari)</option>
                        <option value="Konsultasi Pembuatan Aplikasi & Custom Fitur">Konsultasi Pembuatan Aplikasi & Custom Fitur</option>
                        <option value="Konsultasi Paket Komplit Mesin Kasir + Software">Konsultasi Paket Komplit Mesin Kasir + Software</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-zinc-700 mb-1.5">
                        Catatan Tambahan (Opsional)
                    </label>
                    <textarea id="demo_notes" rows="2" placeholder="Tuliskan pertanyaan atau alur spesifik toko Anda di sini..." class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:border-black focus:outline-none text-black text-sm rounded-xl transition-all"></textarea>
                </div>

                <div class="pt-3">
                    <button type="submit" id="demo_submit_btn" class="w-full h-12 bg-black hover:bg-zinc-800 text-white rounded-full font-semibold text-sm flex items-center justify-center gap-2 transition-all shadow-sm">
                        <span class="material-symbols-outlined text-lg" id="demo_btn_icon">send</span>
                        <span id="demo_btn_text">Kirim Permintaan &bull; Hubungkan ke WhatsApp</span>
                    </button>
                    <p class="text-[11px] text-zinc-400 text-center mt-3">
                        Tim teknis Mitra Setia akan langsung merespons dan mengirimkan installer coba gratis 30 hari.
                    </p>
                </div>
            </form>

        </div>

    </div>
</section>


<!-- =======================================================================
     10. QUESTIONS, ANSWERED (MINIMALIST FAQ ACCORDION)
======================================================================= -->
<section class="py-20 sm:py-28 bg-white">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        
        <div class="text-center mb-14">
            <h2 class="text-3xl font-extrabold text-black tracking-tight">
                Pertanyaan yang Sering Diajukan
            </h2>
            <p class="text-xs sm:text-sm text-zinc-500 mt-2">
                Informasi seputar lisensi, fitur, dan garansi POS Enterprise.
            </p>
        </div>

        <div class="divide-y divide-zinc-200 border-y border-zinc-200 text-left">
            
            <details class="group py-5">
                <summary class="flex justify-between items-center cursor-pointer list-none font-bold text-sm text-black group-hover:text-zinc-600 transition-colors">
                    <span>Apakah benar software ini bayar 1x tanpa biaya bulanan?</span>
                    <span class="material-symbols-outlined text-lg text-zinc-400 group-open:rotate-180 transition-transform">expand_more</span>
                </summary>
                <p class="text-xs sm:text-sm text-zinc-600 mt-3 leading-relaxed">
                    Ya, betul sekali. Anda cukup membeli lisensi 1x di awal, dan program dapat digunakan selamanya tanpa biaya bulanan maupun tahunan.
                </p>
            </details>

            <details class="group py-5">
                <summary class="flex justify-between items-center cursor-pointer list-none font-bold text-sm text-black group-hover:text-zinc-600 transition-colors">
                    <span>Bagaimana jika komputer kasir kami rusak atau ganti baru?</span>
                    <span class="material-symbols-outlined text-lg text-zinc-400 group-open:rotate-180 transition-transform">expand_more</span>
                </summary>
                <p class="text-xs sm:text-sm text-zinc-600 mt-3 leading-relaxed">
                    Database POS Enterprise memiliki fitur backup otomatis. Jika Anda mengganti komputer, tim support kami akan membantu memindahkan lisensi dan data toko Anda secara aman.
                </p>
            </details>

            <details class="group py-5">
                <summary class="flex justify-between items-center cursor-pointer list-none font-bold text-sm text-black group-hover:text-zinc-600 transition-colors">
                    <span>Apakah software bisa dicoba terlebih dahulu?</span>
                    <span class="material-symbols-outlined text-lg text-zinc-400 group-open:rotate-180 transition-transform">expand_more</span>
                </summary>
                <p class="text-xs sm:text-sm text-zinc-600 mt-3 leading-relaxed">
                    Tentu. Kami menyediakan installer demo gratis 30 hari dengan full fitur aktif 100%. Silakan isi formulir di atas untuk menerima link download resmi.
                </p>
            </details>

            <details class="group py-5">
                <summary class="flex justify-between items-center cursor-pointer list-none font-bold text-sm text-black group-hover:text-zinc-600 transition-colors">
                    <span>Apakah support printer kasir thermal dan scanner barcode biasa?</span>
                    <span class="material-symbols-outlined text-lg text-zinc-400 group-open:rotate-180 transition-transform">expand_more</span>
                </summary>
                <p class="text-xs sm:text-sm text-zinc-600 mt-3 leading-relaxed">
                    Ya, kompatibel dengan hampir semua merk printer kasir thermal ukuran 58mm maupun 80mm (USB, Bluetooth, atau LAN), barcode scanner 1D/2D, dan cash drawer RJ11.
                </p>
            </details>

        </div>

    </div>
</section>

<!-- Dispatch Script via WhatsApp -->
<script>
function handleDemoRequest(e) {
    e.preventDefault();
    const name = document.getElementById('demo_name').value.trim();
    const phone = document.getElementById('demo_phone').value.trim();
    const city = document.getElementById('demo_city').value.trim();
    const business = document.getElementById('demo_business').value.trim();
    const subject = document.getElementById('demo_subject').value;
    const notes = document.getElementById('demo_notes').value.trim();

    const submitBtn = document.getElementById('demo_submit_btn');
    const btnIcon = document.getElementById('demo_btn_icon');
    const btnText = document.getElementById('demo_btn_text');
    const feedback = document.getElementById('demo-feedback');
    const fallbackLink = document.getElementById('demo-fallback-link');

    let text = `Halo Tim Mitra Setia, saya ingin mengajukan:\n\n`
             + `*Subject:* ${subject}\n`
             + `*Nama:* ${name}\n`
             + `*No. WhatsApp:* ${phone}\n`
             + `*Kota:* ${city}\n`
             + `*Jenis Usaha:* ${business}\n`;

    if (notes) {
        text += `*Catatan:* ${notes}\n`;
    }

    text += `\nMohon dibantu link download dan panduan aktivasi coba gratis 30 hari POS Enterprise. Terima kasih!`;

    const waUrl = `https://wa.me/6281234567890?text=${encodeURIComponent(text)}`;

    // Show visual confirmation on the page
    if (fallbackLink) {
        fallbackLink.href = waUrl;
    }
    if (feedback) {
        feedback.classList.remove('hidden');
        feedback.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    if (submitBtn) {
        btnIcon.textContent = 'check_circle';
        btnText.textContent = 'Membuka WhatsApp...';
        submitBtn.classList.remove('bg-black', 'hover:bg-zinc-800');
        submitBtn.classList.add('bg-emerald-600', 'hover:bg-emerald-700');
    }

    // Open WhatsApp
    window.open(waUrl, '_blank');

    setTimeout(() => {
        if (submitBtn) {
            btnIcon.textContent = 'send';
            btnText.textContent = 'Kirim Ulang &bull; Hubungkan ke WhatsApp';
            submitBtn.classList.remove('bg-emerald-600', 'hover:bg-emerald-700');
            submitBtn.classList.add('bg-black', 'hover:bg-zinc-800');
        }
    }, 4000);
}
</script>

@endsection
