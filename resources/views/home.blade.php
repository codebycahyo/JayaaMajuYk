@extends('layouts.app')

@section('title', 'Software Kasir Minimarket & Mesin Kasir | Mitra Setia')
@section('description', 'Mitra Setia: Software kasir minimarket POS Enterprise tanpa biaya langganan, bayar 1x pakai selamanya, bergaransi 6 bulan, full support teknis, dan paket mesin kasir lengkap.')

@section('content')

<!-- 1. Hero Section: Mitra Setia POS Enterprise -->
<section class="bg-white border-b border-border-subtle py-12 sm:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
            <!-- Left: Headline & Core Propositions -->
            <div class="lg:col-span-7 space-y-5">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-primary/10 border border-primary/20 text-primary text-xs font-black">
                    <span class="size-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>Software Kasir Minimarket &bull; Mitra Setia</span>
                </div>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight text-slate-900 leading-tight">
                    Solusi Mesin Kasir & Software POS Enterprise untuk Segala Jenis Usaha.
                </h1>

                <!-- Keunggulan Utama Highlight Box -->
                <div class="p-4 bg-slate-50 border border-slate-200 rounded-xl">
                    <div class="text-xs font-black uppercase tracking-wider text-primary mb-2 flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-base">verified</span>
                        Keunggulan Utama:
                    </div>
                    <p class="text-xs sm:text-sm font-semibold text-slate-700 leading-relaxed">
                        Harga Terjangkau &bull; Tanpa Biaya Langganan &bull; Bergaransi &bull; Full Support Teknis &bull; Fitur Dapat Disesuaikan Dengan Kebutuhan &bull; Cocok Untuk Segala Jenis Usaha
                    </p>
                </div>

                <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                    Lebih dari <strong>10 tahun</strong> mendampingi ratusan pelaku usaha di Indonesia. Bayar 1x pakai selamanya, bebas biaya bulanan, kerja lebih cepat dengan shortcut keyboard, dan laporan otomatis siap saji.
                </p>

                <!-- Action Buttons (Minimum 44px Touch Target) -->
                <div class="flex flex-col sm:flex-row gap-3 pt-2">
                    <a href="#demo-form" class="h-12 px-6 bg-amber-500 hover:bg-amber-600 text-slate-900 rounded-lg font-black text-sm inline-flex items-center justify-center gap-2 transition-colors shadow-xs">
                        <span class="material-symbols-outlined text-xl">download</span>
                        <span>Coba Gratis 30 Hari</span>
                    </a>

                    <a href="https://wa.me/6281234567890?text={{ urlencode('Halo Mitra Setia, saya ingin konsultasi software kasir POS Enterprise & mesin kasir untuk usaha saya.') }}" target="_blank" class="h-12 px-6 bg-wa-green hover:bg-wa-hover text-white rounded-lg font-bold text-sm inline-flex items-center justify-center gap-2 transition-colors shadow-xs">
                        <svg class="size-5 fill-current shrink-0" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                        </svg>
                        <span>Hubungi Kami via WhatsApp</span>
                    </a>

                    <a href="{{ route('catalog') }}" class="h-12 px-6 bg-slate-100 hover:bg-slate-200 text-slate-800 rounded-lg font-bold text-sm inline-flex items-center justify-center gap-2 transition-colors">
                        <span class="material-symbols-outlined text-lg">storefront</span>
                        <span>Katalog Mesin & Program</span>
                    </a>
                </div>

                <!-- Trust Badges -->
                <div class="pt-4 border-t border-slate-100 grid grid-cols-3 gap-4 text-xs">
                    <div>
                        <div class="font-black text-slate-900 text-base">10+ Tahun</div>
                        <div class="text-slate-500">Pengalaman Bisnis</div>
                    </div>
                    <div>
                        <div class="font-black text-slate-900 text-base">Rp 0 / Bulan</div>
                        <div class="text-slate-500">Tanpa Biaya Langganan</div>
                    </div>
                    <div>
                        <div class="font-black text-slate-900 text-base">6 Bulan</div>
                        <div class="text-slate-500">Garansi & Free Training</div>
                    </div>
                </div>
            </div>

            <!-- Right: POS Enterprise Feature Showcase Box -->
            <div class="lg:col-span-5">
                <div class="bg-slate-900 text-white rounded-2xl p-6 sm:p-7 shadow-xl border border-slate-800 relative overflow-hidden">
                    <div class="flex items-center justify-between pb-4 border-b border-slate-800 mb-5">
                        <div class="flex items-center gap-2.5">
                            <div class="size-8 rounded-lg bg-primary flex items-center justify-center text-white font-black text-xs">
                                POS
                            </div>
                            <div>
                                <h3 class="text-sm font-black text-white">POS ENTERPRISE</h3>
                                <p class="text-[11px] text-slate-400">Software Kasir Untuk Segala Usaha</p>
                            </div>
                        </div>
                        <span class="text-[10px] font-black uppercase tracking-wider bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 px-2.5 py-1 rounded-full">
                            Full Fitur
                        </span>
                    </div>

                    <!-- Highlight Features -->
                    <div class="space-y-3.5 mb-6 text-xs text-slate-300">
                        <div class="flex items-start gap-3">
                            <span class="material-symbols-outlined text-emerald-400 text-lg shrink-0 mt-0.5">check_circle</span>
                            <div>
                                <strong class="text-white block font-bold">Tampilan Menarik & Mudah Digunakan</strong>
                                Desain nyaman dilihat, berbahasa Indonesia, mudah dipahami user awam.
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <span class="material-symbols-outlined text-emerald-400 text-lg shrink-0 mt-0.5">keyboard</span>
                            <div>
                                <strong class="text-white block font-bold">Kerja Cepat Tanpa Klik Mouse</strong>
                                Dilengkapi berbagai shortcut keyboard. Transaksi super kilat pelanggan puas.
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <span class="material-symbols-outlined text-emerald-400 text-lg shrink-0 mt-0.5">bar_chart</span>
                            <div>
                                <strong class="text-white block font-bold">Laporan Lengkap & Customizable</strong>
                                Puluhan laporan stok, omzet, laba rugi. Cukup 1 klik laporan tersaji rapi.
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <span class="material-symbols-outlined text-emerald-400 text-lg shrink-0 mt-0.5">lock</span>
                            <div>
                                <strong class="text-white block font-bold">Kunci Menu Dengan Hak Akses User</strong>
                                Mengamankan data sensitif toko; akses menu dikunci sesuai jabatan staf.
                            </div>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-slate-800 flex items-center justify-between">
                        <div>
                            <div class="text-[10px] text-slate-400 uppercase font-bold">Lisensi Software</div>
                            <div class="text-base font-black text-amber-400">Bayar 1x Pakai Selamanya</div>
                        </div>
                        <a href="#demo-form" class="h-10 px-4 bg-primary hover:bg-primary-dark text-white rounded-lg text-xs font-bold inline-flex items-center gap-1.5 transition-colors">
                            <span>Request Demo</span>
                            <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2. POS ENTERPRISE Story & Pillars Section -->
<section id="fitur-software" class="py-14 bg-surface-bg border-b border-border-subtle">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="max-w-3xl mx-auto text-center mb-12">
            <span class="text-xs font-black uppercase tracking-wider text-primary bg-primary/10 px-3 py-1 rounded-full inline-block mb-3">
                10+ Tahun Teruji di Lapangan
            </span>
            <h2 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">
                POS ENTERPRISE: Software Kasir Untuk Segala Jenis Usaha
            </h2>
            <p class="text-slate-600 text-sm sm:text-base mt-3 leading-relaxed">
                Berpengalaman lebih dari 10 tahun mendampingi pelaku usaha dari berbagai jenis bisnis, mulai dari toko kelontong, toko pakaian, toko buku, hingga toko bahan bangunan. POS Enterprise terus melakukan pengembangan sehingga fitur-fitur yang tersedia dapat memenuhi kebutuhan pengguna dan sesuai dengan perkembangan jaman yang dinamis.
            </p>
        </div>

        <!-- 4 Pilar Utama -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            <div class="bg-white p-6 rounded-2xl border border-border-subtle shadow-xs space-y-3">
                <div class="size-12 bg-primary/10 text-primary rounded-xl flex items-center justify-center">
                    <span class="material-symbols-outlined text-2xl">sentiment_satisfied</span>
                </div>
                <h3 class="font-bold text-slate-900 text-base">Tampilan Menarik & Mudah Digunakan</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Desain tampilan menarik dan nyaman dilihat, fitur lengkap menggunakan bahasa Indonesia sehingga mudah dipelajari serta digunakan bahkan oleh staf baru sekalipun.
                </p>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-border-subtle shadow-xs space-y-3">
                <div class="size-12 bg-emerald-50 text-emerald-700 rounded-xl flex items-center justify-center">
                    <span class="material-symbols-outlined text-2xl">speed</span>
                </div>
                <h3 class="font-bold text-slate-900 text-base">Kerja Lebih Cepat, Tanpa Klik Mouse</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Layani antrean pelanggan lebih cepat dengan berbagai shortcut keyboard yang disediakan. Proses checkout kilat tanpa repot geser mouse, pelanggan puas tanpa antri lama.
                </p>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-border-subtle shadow-xs space-y-3">
                <div class="size-12 bg-blue-50 text-blue-700 rounded-xl flex items-center justify-center">
                    <span class="material-symbols-outlined text-2xl">query_stats</span>
                </div>
                <h3 class="font-bold text-slate-900 text-base">Laporan Lengkap & Customizable</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Puluhan menu laporan penjualan, laba bersih, dan arus barang yang bisa diubah atau ditambah sesuai kebutuhan user. Cukup sekali klik, laporan akurat tersaji.
                </p>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-border-subtle shadow-xs space-y-3">
                <div class="size-12 bg-amber-50 text-amber-700 rounded-xl flex items-center justify-center">
                    <span class="material-symbols-outlined text-2xl">admin_panel_settings</span>
                </div>
                <h3 class="font-bold text-slate-900 text-base">Kunci Menu Dengan Hak Akses User</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Melindungi data keuangan dan stok penting toko Anda. Setiap staf kasir, supervisor, dan admin hanya bisa mengakses menu yang sesuai dengan pekerjaan dan jabatannya.
                </p>
            </div>
        </div>

        <!-- Fitur Lengkap Aplikasi Grid -->
        <div class="bg-white border border-border-subtle rounded-2xl p-6 sm:p-8 shadow-xs">
            <div class="text-center max-w-xl mx-auto mb-8">
                <h3 class="text-xl sm:text-2xl font-black text-slate-900">Fitur Lengkap & User Friendly</h3>
                <p class="text-xs sm:text-sm text-slate-500 mt-1">Sesuai kebutuhan operasional nyata di toko retail, minimarket, resto, dan apotek.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 text-xs">
                <div class="p-4 bg-slate-50 rounded-xl border border-slate-100 space-y-1.5">
                    <div class="flex items-center gap-2 font-black text-slate-900 text-sm">
                        <span class="material-symbols-outlined text-primary text-lg">database</span>
                        <span>Master Data</span>
                    </div>
                    <p class="text-slate-600 leading-relaxed">Kelola Supplier, Data Pelanggan/Member, Kategori Barang, Satuan Bertingkat, dan Barcode.</p>
                </div>

                <div class="p-4 bg-slate-50 rounded-xl border border-slate-100 space-y-1.5">
                    <div class="flex items-center gap-2 font-black text-slate-900 text-sm">
                        <span class="material-symbols-outlined text-primary text-lg">inventory</span>
                        <span>Stok Barang</span>
                    </div>
                    <p class="text-slate-600 leading-relaxed">Data Stok Real-Time, Mutasi Antar Gudang/Toko, Stok Opname Akurat, & Peringatan Stok Menipis.</p>
                </div>

                <div class="p-4 bg-slate-50 rounded-xl border border-slate-100 space-y-1.5">
                    <div class="flex items-center gap-2 font-black text-slate-900 text-sm">
                        <span class="material-symbols-outlined text-primary text-lg">receipt_long</span>
                        <span>Transaksi Lengkap</span>
                    </div>
                    <p class="text-slate-600 leading-relaxed">Penjualan Kasir (POS), Pembelian Supplier, Hutang Usaha, Piutang Pelanggan, dan Retur Barang.</p>
                </div>

                <div class="p-4 bg-slate-50 rounded-xl border border-slate-100 space-y-1.5">
                    <div class="flex items-center gap-2 font-black text-slate-900 text-sm">
                        <span class="material-symbols-outlined text-primary text-lg">payments</span>
                        <span>Pembayaran Fleksibel</span>
                    </div>
                    <p class="text-slate-600 leading-relaxed">Support Tunai, Transfer Bank, Kartu Debit, E-Wallet (GoPay/OVO/ShopeePay), dan QRIS Dinamis.</p>
                </div>

                <div class="p-4 bg-slate-50 rounded-xl border border-slate-100 space-y-1.5">
                    <div class="flex items-center gap-2 font-black text-slate-900 text-sm">
                        <span class="material-symbols-outlined text-primary text-lg">summarize</span>
                        <span>Laporan Lengkap</span>
                    </div>
                    <p class="text-slate-600 leading-relaxed">Laporan Penjualan Harian/Periode, Laba Rugi Toko, Ekspor CSV/Excel, dan Cetak Rekap Kasir.</p>
                </div>

                <div class="p-4 bg-slate-50 rounded-xl border border-slate-100 space-y-1.5">
                    <div class="flex items-center gap-2 font-black text-slate-900 text-sm">
                        <span class="material-symbols-outlined text-primary text-lg">vpn_key</span>
                        <span>Fitur Hak Akses</span>
                    </div>
                    <p class="text-slate-600 leading-relaxed">Proteksi otorisasi menu kasir. Mengunci diskon, retur, dan laporan agar terhindar dari kecurangan.</p>
                </div>

                <div class="p-4 bg-slate-50 rounded-xl border border-slate-100 space-y-1.5 sm:col-span-2">
                    <div class="flex items-center gap-2 font-black text-slate-900 text-sm">
                        <span class="material-symbols-outlined text-primary text-lg">print</span>
                        <span>Support Aksesoris Pendukung Hardware</span>
                    </div>
                    <p class="text-slate-600 leading-relaxed">Kompatibel 100% dengan Printer Kasir Thermal 58mm/80mm, Barcode Scanner 1D & 2D, Timbangan Digital, Laci Uang (Cash Drawer RJ11), dan Customer Display.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3. Minimum Requirement Section -->
<section class="py-12 bg-white border-b border-border-subtle">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="bg-gradient-to-br from-slate-900 to-slate-800 text-white rounded-3xl p-8 sm:p-12 shadow-md">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-7 space-y-4">
                    <span class="text-xs font-black uppercase tracking-wider text-amber-400 bg-amber-400/10 px-3 py-1 rounded-full inline-block">
                        Database Ringan & Bandel
                    </span>
                    <h3 class="text-2xl sm:text-3xl font-black tracking-tight text-white">
                        Minimum Requirement Komputer / Laptop
                    </h3>
                    <p class="text-slate-300 text-xs sm:text-sm leading-relaxed">
                        POS Enterprise dirancang sangat efisien dan ringan. Anda tidak memerlukan komputer mahal atau server berat untuk menjalankannya.
                    </p>

                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 pt-2 text-xs">
                        <div class="p-3 bg-white/5 rounded-xl border border-white/10">
                            <div class="text-slate-400 text-[10px] uppercase font-bold">Sistem Operasi</div>
                            <div class="font-bold text-white text-sm">Windows XP / 7 / 10 / 11</div>
                        </div>
                        <div class="p-3 bg-white/5 rounded-xl border border-white/10">
                            <div class="text-slate-400 text-[10px] uppercase font-bold">Prosesor</div>
                            <div class="font-bold text-white text-sm">Core i3 / i5 / up</div>
                        </div>
                        <div class="p-3 bg-white/5 rounded-xl border border-white/10">
                            <div class="text-slate-400 text-[10px] uppercase font-bold">Memori (RAM)</div>
                            <div class="font-bold text-white text-sm">2 GB / 4 GB / up</div>
                        </div>
                        <div class="p-3 bg-white/5 rounded-xl border border-white/10">
                            <div class="text-slate-400 text-[10px] uppercase font-bold">Hard Disk / SSD</div>
                            <div class="font-bold text-white text-sm">250 GB / 500 GB / up</div>
                        </div>
                        <div class="p-3 bg-white/5 rounded-xl border border-white/10 col-span-2 sm:col-span-2">
                            <div class="text-slate-400 text-[10px] uppercase font-bold">Jaringan & Konektivitas</div>
                            <div class="font-bold text-white text-sm">Kabel LAN / Wi-Fi (Multi-Kasir Ready)</div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-5 text-center lg:text-right">
                    <div class="bg-white/10 backdrop-blur-sm p-6 sm:p-8 rounded-2xl border border-white/15 space-y-4 inline-block text-left w-full">
                        <div class="text-amber-400 font-black text-sm uppercase tracking-wider flex items-center gap-1.5">
                            <span class="material-symbols-outlined text-lg">celebration</span>
                            Coba Tanpa Resiko
                        </div>
                        <h4 class="text-xl font-black text-white">
                            Download & Coba Gratis Selama 30 Hari!
                        </h4>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            Coba sekarang dengan <strong>full fitur aktif 100%</strong>. Buktikan sendiri kemudahan dan kecepatan transaksi di toko Anda.
                        </p>
                        <a href="#demo-form" class="h-12 w-full px-6 bg-amber-500 hover:bg-amber-600 text-slate-900 rounded-xl font-black text-sm inline-flex items-center justify-center gap-2 transition-colors shadow-lg">
                            <span class="material-symbols-outlined">download</span>
                            <span>Coba Gratis 30 Hari</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4. Kenapa Harus Memilih POS Enterprise & Mitra Setia? -->
<section id="keunggulan" class="py-14 bg-surface-bg border-b border-border-subtle">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="max-w-2xl mx-auto text-center mb-10">
            <span class="text-xs font-black uppercase tracking-wider text-primary bg-primary/10 px-3 py-1 rounded-full inline-block mb-3">
                Perbandingan Nilai Investasi
            </span>
            <h2 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">
                Kenapa Harus Memilih POS Enterprise & Mitra Setia?
            </h2>
            <p class="text-slate-600 text-xs sm:text-sm mt-2 leading-relaxed">
                Banyak software sejenis tersedia di internet atau marketplace, mulai dari puluhan ribu hingga puluhan juta. Dari sekian banyak pilihan, kenapa harus memilih POS Enterprise dari Mitra Setia?
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <div class="bg-white p-5 rounded-2xl border border-border-subtle shadow-xs space-y-2">
                <div class="size-10 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center font-bold">
                    <span class="material-symbols-outlined text-xl">payments</span>
                </div>
                <h4 class="font-black text-slate-900 text-sm">Harga Terjangkau</h4>
                <p class="text-xs text-slate-600 leading-relaxed">Investasi software yang sangat bersahabat untuk UMKM, toko kelontong, hingga ritel modern skala besar.</p>
            </div>

            <div class="bg-white p-5 rounded-2xl border border-border-subtle shadow-xs space-y-2">
                <div class="size-10 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center font-bold">
                    <span class="material-symbols-outlined text-xl">all_inclusive</span>
                </div>
                <h4 class="font-black text-slate-900 text-sm">Bayar 1x, Pakai Selamanya</h4>
                <p class="text-xs text-slate-600 leading-relaxed">Bukan sistem sewa. Anda memiliki lisensi permanen tanpa beban tagihan yang menguras kas toko setiap bulan.</p>
            </div>

            <div class="bg-white p-5 rounded-2xl border border-border-subtle shadow-xs space-y-2">
                <div class="size-10 rounded-xl bg-amber-50 text-amber-700 flex items-center justify-center font-bold">
                    <span class="material-symbols-outlined text-xl">money_off</span>
                </div>
                <h4 class="font-black text-slate-900 text-sm">Tanpa Biaya Langganan</h4>
                <p class="text-xs text-slate-600 leading-relaxed">Nol rupiah per bulan. Tidak ada biaya langganan bulanan maupun tahunan yang tersembunyi.</p>
            </div>

            <div class="bg-white p-5 rounded-2xl border border-border-subtle shadow-xs space-y-2">
                <div class="size-10 rounded-xl bg-primary/10 text-primary flex items-center justify-center font-bold">
                    <span class="material-symbols-outlined text-xl">verified_user</span>
                </div>
                <h4 class="font-black text-slate-900 text-sm">Garansi 6 Bulan</h4>
                <p class="text-xs text-slate-600 leading-relaxed">Jaminan keamanan penggunaan dengan garansi resmi 6 bulan untuk kelancaran sistem Anda.</p>
            </div>

            <div class="bg-white p-5 rounded-2xl border border-border-subtle shadow-xs space-y-2">
                <div class="size-10 rounded-xl bg-purple-50 text-purple-700 flex items-center justify-center font-bold">
                    <span class="material-symbols-outlined text-xl">co_present</span>
                </div>
                <h4 class="font-black text-slate-900 text-sm">Free Training 3x</h4>
                <p class="text-xs text-slate-600 leading-relaxed">Kami bimbing sampai staf kasir dan pemilik toko benar-benar mahir menggunakan seluruh menu aplikasi.</p>
            </div>

            <div class="bg-white p-5 rounded-2xl border border-border-subtle shadow-xs space-y-2">
                <div class="size-10 rounded-xl bg-teal-50 text-teal-700 flex items-center justify-center font-bold">
                    <span class="material-symbols-outlined text-xl">support_agent</span>
                </div>
                <h4 class="font-black text-slate-900 text-sm">Full Support Teknis</h4>
                <p class="text-xs text-slate-600 leading-relaxed">Bantuan teknis responsif selama Anda menggunakan program lewat WhatsApp dan remote desktop.</p>
            </div>

            <div class="bg-white p-5 rounded-2xl border border-border-subtle shadow-xs space-y-2">
                <div class="size-10 rounded-xl bg-indigo-50 text-indigo-700 flex items-center justify-center font-bold">
                    <span class="material-symbols-outlined text-xl">tune</span>
                </div>
                <h4 class="font-black text-slate-900 text-sm">Fitur Dapat Disesuaikan</h4>
                <p class="text-xs text-slate-600 leading-relaxed">Kebutuhan alur toko Anda unik? Fitur dan menu laporan dapat dicustom sesuai alur bisnis Anda.</p>
            </div>

            <div class="bg-white p-5 rounded-2xl border border-border-subtle shadow-xs space-y-2">
                <div class="size-10 rounded-xl bg-rose-50 text-rose-700 flex items-center justify-center font-bold">
                    <span class="material-symbols-outlined text-xl">store</span>
                </div>
                <h4 class="font-black text-slate-900 text-sm">Cocok Untuk Segala Usaha</h4>
                <p class="text-xs text-slate-600 leading-relaxed">Minimarket, toko kelontong, toko pakaian, toko bangunan, toko buku, apotek, hingga kafe & resto.</p>
            </div>
        </div>

        <div class="text-center mt-8">
            <a href="#demo-form" class="h-12 px-8 bg-primary hover:bg-primary-dark text-white rounded-xl font-bold text-sm inline-flex items-center gap-2 transition-colors shadow-xs">
                <span>Mulai Coba Gratis 30 Hari Sekarang</span>
                <span class="material-symbols-outlined text-lg">arrow_downward</span>
            </a>
        </div>
    </div>
</section>

<!-- 5. Featured Products & Hardware Showcase Grid -->
<section class="py-14 bg-white border-b border-border-subtle">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-8">
            <div>
                <span class="text-xs font-black uppercase tracking-wider text-primary">Katalog Mitra Setia</span>
                <h2 class="text-2xl font-black text-slate-900 tracking-tight mt-1">Produk Software & Mesin Kasir Pilihan</h2>
                <p class="text-xs sm:text-sm text-slate-500 mt-1">Tersedia lisensi software kasir teruji serta perangkat keras standar internasional.</p>
            </div>
            <a href="{{ route('catalog') }}" class="h-10 px-4 bg-slate-100 hover:bg-slate-200 text-slate-800 rounded-lg text-xs font-bold inline-flex items-center gap-1.5 transition-colors self-start sm:self-auto">
                <span>Buka Katalog Lengkap</span>
                <span class="material-symbols-outlined text-sm">arrow_forward</span>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($featuredProducts as $product)
                <div class="bg-white border border-border-subtle hover:border-border-bold rounded-2xl p-4 flex flex-col justify-between shadow-xs transition-colors">
                    <div>
                        <!-- Category Badge & Stock State -->
                        <div class="flex items-center justify-between gap-2 mb-3">
                            <span class="text-[11px] font-bold text-primary bg-primary/10 px-2.5 py-0.5 rounded">
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

                        <!-- 1:1 Aspect Ratio Photo with Multi-Source Fallback -->
                        <div class="aspect-square bg-surface-bg rounded-xl p-3 flex items-center justify-center border border-border-subtle mb-3 overflow-hidden">
                            <img src="{{ Str::startsWith($product->image, ['http://', 'https://', 'data:']) ? $product->image : asset($product->image) }}" 
                                 alt="{{ $product->name }}" 
                                 class="max-h-full max-w-full object-contain"
                                 onerror="this.src='https://placehold.co/400x400/f8fafc/0f4c81?text=Mitra+Setia'">
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
                            <div class="text-[11px] text-slate-400 mb-3">Garansi Resmi Mitra Setia</div>
                        @endif
                    </div>

                    <div>
                        <!-- Price -->
                        <div class="pt-2 border-t border-slate-100 mb-3 flex items-baseline justify-between">
                            <div>
                                <div class="text-base font-black text-slate-900">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </div>
                                @if($product->original_price)
                                    <span class="text-xs text-slate-400 line-through">
                                        Rp {{ number_format($product->original_price, 0, ',', '.') }}
                                    </span>
                                @endif
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

<!-- 6. Real Testimonials Section (Bukti Nyata Pengguna) -->
<section id="testimoni" class="py-14 bg-surface-bg border-b border-border-subtle">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center max-w-2xl mx-auto mb-10">
            <span class="text-xs font-black uppercase tracking-wider text-emerald-700 bg-emerald-50 px-3 py-1 rounded-full inline-block mb-3 border border-emerald-200">
                Pengalaman Nyata Klien
            </span>
            <h2 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Testimoni Pengguna POS Enterprise</h2>
            <p class="text-xs sm:text-sm text-slate-500 mt-1">Kisah nyata para pemilik toko dan swalayan yang merasakan kemudahan sistem kami.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Testimoni 1 -->
            <div class="bg-white p-6 rounded-2xl border border-border-subtle shadow-xs space-y-3 flex flex-col justify-between">
                <div>
                    <div class="flex text-amber-500 text-sm mb-2">
                        &#9733;&#9733;&#9733;&#9733;&#9733;
                    </div>
                    <p class="text-xs sm:text-sm text-slate-700 leading-relaxed italic">
                        “Mudah dalam pengoperasian, bisa dicustom sesuai kebutuhan dan support teknis tanggap (pelayanan bagus).”
                    </p>
                </div>
                <div class="pt-3 border-t border-slate-100 flex items-center gap-3">
                    <div class="size-8 rounded-full bg-primary/10 text-primary font-black text-xs flex items-center justify-center">BA</div>
                    <div>
                        <div class="font-bold text-slate-900 text-xs">Grosir Batik Arjuna</div>
                        <div class="text-[11px] text-slate-500">Retail Fashion & Grosir</div>
                    </div>
                </div>
            </div>

            <!-- Testimoni 2 -->
            <div class="bg-white p-6 rounded-2xl border border-border-subtle shadow-xs space-y-3 flex flex-col justify-between">
                <div>
                    <div class="flex text-amber-500 text-sm mb-2">
                        &#9733;&#9733;&#9733;&#9733;&#9733;
                    </div>
                    <p class="text-xs sm:text-sm text-slate-700 leading-relaxed italic">
                        “Respon cepat ketika terjadi trouble. Program mudah dioperasikan dan menu cukup lengkap.”
                    </p>
                </div>
                <div class="pt-3 border-t border-slate-100 flex items-center gap-3">
                    <div class="size-8 rounded-full bg-emerald-50 text-emerald-700 font-black text-xs flex items-center justify-center">MR</div>
                    <div>
                        <div class="font-bold text-slate-900 text-xs">Swalayan Madu Rejeki</div>
                        <div class="text-[11px] text-slate-500">Minimarket & Swalayan</div>
                    </div>
                </div>
            </div>

            <!-- Testimoni 3 -->
            <div class="bg-white p-6 rounded-2xl border border-border-subtle shadow-xs space-y-3 flex flex-col justify-between">
                <div>
                    <div class="flex text-amber-500 text-sm mb-2">
                        &#9733;&#9733;&#9733;&#9733;&#9733;
                    </div>
                    <p class="text-xs sm:text-sm text-slate-700 leading-relaxed italic">
                        “Keunggulan POS Enterprise mudah digunakan dan menu yang ditampilkan juga lengkap untuk menunjang aktifitas pekerjaan. Support teknis memuaskan.”
                    </p>
                </div>
                <div class="pt-3 border-t border-slate-100 flex items-center gap-3">
                    <div class="size-8 rounded-full bg-blue-50 text-blue-700 font-black text-xs flex items-center justify-center">MC</div>
                    <div>
                        <div class="font-bold text-slate-900 text-xs">Maco</div>
                        <div class="text-[11px] text-slate-500">Toko Retail</div>
                    </div>
                </div>
            </div>

            <!-- Testimoni 4 -->
            <div class="bg-white p-6 rounded-2xl border border-border-subtle shadow-xs space-y-3 flex flex-col justify-between">
                <div>
                    <div class="flex text-amber-500 text-sm mb-2">
                        &#9733;&#9733;&#9733;&#9733;&#9733;
                    </div>
                    <p class="text-xs sm:text-sm text-slate-700 leading-relaxed italic">
                        “Sistemnya lengkap dan rapi, mudah dipelajari dan sangat membantu pekerjaan lebih cepat.”
                    </p>
                </div>
                <div class="pt-3 border-t border-slate-100 flex items-center gap-3">
                    <div class="size-8 rounded-full bg-purple-50 text-purple-700 font-black text-xs flex items-center justify-center">CM</div>
                    <div>
                        <div class="font-bold text-slate-900 text-xs">Commando</div>
                        <div class="text-[11px] text-slate-500">Usaha Retail & Dagang</div>
                    </div>
                </div>
            </div>

            <!-- Testimoni 5 -->
            <div class="bg-white p-6 rounded-2xl border border-border-subtle shadow-xs space-y-3 flex flex-col justify-between">
                <div>
                    <div class="flex text-amber-500 text-sm mb-2">
                        &#9733;&#9733;&#9733;&#9733;&#9733;
                    </div>
                    <p class="text-xs sm:text-sm text-slate-700 leading-relaxed italic">
                        “Simpel, mudah dioperasikan, dan bisa disesuaikan dengan kebutuhan. Tim support teknis sangat membantu setiap ada kendala.”
                    </p>
                </div>
                <div class="pt-3 border-t border-slate-100 flex items-center gap-3">
                    <div class="size-8 rounded-full bg-teal-50 text-teal-700 font-black text-xs flex items-center justify-center">IR</div>
                    <div>
                        <div class="font-bold text-slate-900 text-xs">Swalayan Ijo Royo-Royo</div>
                        <div class="text-[11px] text-slate-500">Minimarket Sembako</div>
                    </div>
                </div>
            </div>

            <!-- Testimoni 6 -->
            <div class="bg-white p-6 rounded-2xl border border-border-subtle shadow-xs space-y-3 flex flex-col justify-between">
                <div>
                    <div class="flex text-amber-500 text-sm mb-2">
                        &#9733;&#9733;&#9733;&#9733;&#9733;
                    </div>
                    <p class="text-xs sm:text-sm text-slate-700 leading-relaxed italic">
                        “Support sangat baik, sistem mudah dioperasikan dan bandel, database ringan. Secara keseluruhan kami sangat puas.”
                    </p>
                </div>
                <div class="pt-3 border-t border-slate-100 flex items-center gap-3">
                    <div class="size-8 rounded-full bg-rose-50 text-rose-700 font-black text-xs flex items-center justify-center">SR</div>
                    <div>
                        <div class="font-bold text-slate-900 text-xs">Toko Sri Rejeki</div>
                        <div class="text-[11px] text-slate-500">Toko Sembako & Kelontong</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 7. DOWNLOAD SEKARANG & Form Request Demo 30 Hari -->
<section id="demo-form" class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        <div class="bg-slate-900 text-white rounded-3xl p-8 sm:p-12 shadow-xl border border-slate-800">
            <div class="text-center max-w-2xl mx-auto mb-10">
                <span class="text-xs font-black uppercase tracking-wider text-amber-400 bg-amber-400/10 px-3.5 py-1 rounded-full inline-block mb-3 border border-amber-400/20">
                    DOWNLOAD SEKARANG &bull; FULL FITUR AKTIF
                </span>
                <h2 class="text-2xl sm:text-4xl font-black text-white tracking-tight">
                    Coba Gratis 30 Hari Dengan Full Fitur Aktif
                </h2>
                <p class="text-xs sm:text-sm text-slate-300 mt-3 leading-relaxed">
                    Ratusan pemilik usaha di berbagai kota di Indonesia dengan beragam jenis usaha dan skala bisnis telah terbantu dengan software kasir minimarket POS Enterprise dari Mitra Setia.
                </p>
                <p class="text-xs text-slate-400 mt-2">
                    Adalah sebuah kebanggaan bagi kami untuk dapat membantu memudahkan pekerjaan Anda, meningkatkan efektivitas toko, dan menjadi bagian dari pertumbuhan bisnis Anda.
                </p>
            </div>

            <!-- Form Kontak & Request Demo -->
            <form onsubmit="handleDemoRequest(event)" class="space-y-4 max-w-2xl mx-auto">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-300 mb-1.5">Nama Lengkap <span class="text-red-400">*</span></label>
                        <input type="text" id="demo_name" required placeholder="contoh: Budi Santoso" class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:border-amber-400 text-sm">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-300 mb-1.5">Nomor WhatsApp / Telp <span class="text-red-400">*</span></label>
                        <input type="tel" id="demo_phone" required placeholder="contoh: 081234567890" class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:border-amber-400 text-sm">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-300 mb-1.5">Kota / Lokasi Usaha <span class="text-red-400">*</span></label>
                        <input type="text" id="demo_city" required placeholder="contoh: Sleman, Yogyakarta" class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:border-amber-400 text-sm">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-300 mb-1.5">Jenis Usaha Anda <span class="text-red-400">*</span></label>
                        <input type="text" id="demo_business" required placeholder="contoh: Toko Kelontong, Minimarket, Butik" class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:border-amber-400 text-sm">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 mb-1.5">Subject Permintaan <span class="text-red-400">*</span></label>
                    <select id="demo_subject" required class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 text-white focus:outline-none focus:border-amber-400 text-sm">
                        <option value="Request Demo POS Enterprise (Coba Gratis 30 Hari)">Request Demo POS Enterprise (Coba Gratis 30 Hari)</option>
                        <option value="Konsultasi Pembuatan Aplikasi & Custom Fitur">Konsultasi Pembuatan Aplikasi & Custom Fitur</option>
                        <option value="Konsultasi Paket Komplit Mesin Kasir + Software">Konsultasi Paket Komplit Mesin Kasir + Software</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 mb-1.5">Catatan Tambahan (Opsional)</label>
                    <textarea id="demo_notes" rows="2" placeholder="Tuliskan pertanyaan atau kebutuhan spesifik toko Anda di sini..." class="w-full px-4 py-2.5 rounded-xl bg-slate-800 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:border-amber-400 text-sm"></textarea>
                </div>

                <div class="pt-3">
                    <button type="submit" class="w-full h-12 bg-amber-500 hover:bg-amber-600 text-slate-900 rounded-xl font-black text-sm flex items-center justify-center gap-2 transition-colors shadow-lg">
                        <span class="material-symbols-outlined">send</span>
                        <span>Kirim Permintaan Demo & Hubungi via WhatsApp</span>
                    </button>
                    <p class="text-[11px] text-slate-400 text-center mt-2.5">
                        Tim teknis Mitra Setia akan langsung merespons dan mengirimkan link download installer POS Enterprise 30 Hari.
                    </p>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
function handleDemoRequest(e) {
    e.preventDefault();
    const name = document.getElementById('demo_name').value.trim();
    const phone = document.getElementById('demo_phone').value.trim();
    const city = document.getElementById('demo_city').value.trim();
    const business = document.getElementById('demo_business').value.trim();
    const subject = document.getElementById('demo_subject').value;
    const notes = document.getElementById('demo_notes').value.trim();

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
    window.open(waUrl, '_blank');
}
</script>

@endsection
