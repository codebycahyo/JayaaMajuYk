@extends('layouts.app')

@section('title', 'Software Kasir Minimarket & Mesin Kasir | Mitra Setia')
@section('description', 'Mitra Setia: Software kasir minimarket POS Enterprise tanpa biaya langganan, bayar 1x pakai selamanya, bergaransi 6 bulan, full support teknis, dan paket mesin kasir lengkap.')

@section('content')

<!-- =======================================================================
     SECTION 1: HERO & ASYMMETRIC SPECIMEN LEDGER
======================================================================= -->
<section class="border-b border-rule bg-canvas py-12 sm:py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-start">
            
            <!-- Left Col (7 Cols): Editorial Masthead & Value Statement -->
            <div class="lg:col-span-7 space-y-6">
                <!-- Eyebrow Tag -->
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-surface-card border border-rule text-ink text-[11px] font-mono tracking-wider uppercase">
                    <span class="size-2 bg-vermilion rounded-full"></span>
                    <span>Software Kasir Minimarket &bull; Mitra Setia</span>
                </div>

                <!-- Editorial Headline -->
                <h1 class="font-serif text-3xl sm:text-5xl lg:text-[3.25rem] text-ink font-bold leading-[1.12] tracking-tight">
                    Solusi Mesin Kasir &amp; Software <span class="italic font-normal text-vermilion">POS Enterprise</span> untuk Segala Jenis Usaha.
                </h1>

                <!-- Keunggulan Utama: Printed Ledger Strip -->
                <div class="p-5 bg-canvas-subtle border-l-4 border-l-vermilion border-y border-r border-rule">
                    <div class="font-mono text-[11px] uppercase tracking-widest text-ink font-bold mb-1.5 flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm text-vermilion">verified</span>
                        KEUNGGULAN UTAMA:
                    </div>
                    <p class="text-xs sm:text-sm font-semibold text-ink leading-relaxed font-sans">
                        Harga Terjangkau &bull; Tanpa Biaya Langganan &bull; Bergaransi &bull; Full Support Teknis &bull; Fitur Dapat Disesuaikan Dengan Kebutuhan &bull; Cocok Untuk Segala Jenis Usaha
                    </p>
                </div>

                <!-- Narrative Copy -->
                <p class="text-ink-muted text-sm sm:text-base leading-relaxed max-w-2xl font-sans">
                    Berpengalaman lebih dari <strong class="text-ink font-bold">10 tahun</strong> mendampingi ratusan pelaku usaha dari berbagai jenis bisnis di seluruh Indonesia. Bayar 1x pakai selamanya, tanpa biaya langganan bulanan, operasional kilat dengan shortcut keyboard tanpa sentuh mouse, dan puluhan laporan akurat siap saji dalam sekali klik.
                </p>

                <!-- Action Dispatch Buttons (Strict WCAG Contrast, 44px+ Touch Target) -->
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 pt-2">
                    <a href="#demo-form" class="h-12 px-6 bg-vermilion hover:bg-vermilion-hover text-white text-xs font-mono font-bold tracking-wider uppercase inline-flex items-center justify-center gap-2.5 border border-ink shadow-crisp transition-all active:translate-x-[2px] active:translate-y-[2px]">
                        <span class="material-symbols-outlined text-lg">download</span>
                        <span>Coba Gratis 30 Hari</span>
                    </a>

                    <a href="https://wa.me/6281234567890?text={{ urlencode('Halo Mitra Setia, saya ingin konsultasi software kasir POS Enterprise & mesin kasir untuk usaha saya.') }}" target="_blank" class="h-12 px-6 bg-forest hover:bg-forest-hover text-white text-xs font-mono font-bold tracking-wider uppercase inline-flex items-center justify-center gap-2.5 border border-ink shadow-crisp transition-all active:translate-x-[2px] active:translate-y-[2px]">
                        <svg class="size-4 fill-current shrink-0" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                        </svg>
                        <span>Hubungi Kami</span>
                    </a>

                    <a href="{{ route('catalog') }}" class="h-12 px-5 bg-white hover:bg-canvas-subtle text-ink text-xs font-mono font-bold tracking-wider uppercase inline-flex items-center justify-center gap-2 border border-rule hover:border-ink transition-colors">
                        <span class="material-symbols-outlined text-base">inventory_2</span>
                        <span>Katalog Mesin & Program</span>
                    </a>
                </div>

                <!-- Three Pillar Proof Points (Editorial Rule System) -->
                <div class="pt-6 border-t border-rule grid grid-cols-3 gap-6 font-mono">
                    <div>
                        <div class="text-xl sm:text-2xl font-bold text-ink">10+ Tahun</div>
                        <div class="text-[11px] text-ink-muted mt-0.5">Pengalaman Bisnis Toko</div>
                    </div>
                    <div>
                        <div class="text-xl sm:text-2xl font-bold text-forest">Rp 0 / bln</div>
                        <div class="text-[11px] text-ink-muted mt-0.5">Tanpa Biaya Langganan</div>
                    </div>
                    <div>
                        <div class="text-xl sm:text-2xl font-bold text-ink">6 Bulan</div>
                        <div class="text-[11px] text-ink-muted mt-0.5">Garansi & Free Training 3x</div>
                    </div>
                </div>
            </div>

            <!-- Right Col (5 Cols): Real Specimen Terminal & Voucher Box -->
            <div class="lg:col-span-5">
                <div class="bg-surface-card border-2 border-ink shadow-crisp-lg p-6 sm:p-7">
                    <!-- Specimen Header -->
                    <div class="flex items-center justify-between pb-4 border-b border-rule mb-5 font-mono">
                        <div>
                            <span class="text-[10px] text-ink-faint block uppercase tracking-widest">Spesimen Lisensi &bull; POS Enterprise</span>
                            <h3 class="text-base font-bold text-ink tracking-tight">KONTROL TRANSAKSI KASIR</h3>
                        </div>
                        <span class="text-[10px] font-bold uppercase tracking-wider bg-forest/10 text-forest border border-forest/30 px-2 py-0.5">
                            FULL FITUR AKTIF
                        </span>
                    </div>

                    <!-- Shortcut & Terminal Capability Matrix -->
                    <div class="space-y-4 mb-6">
                        <!-- Capability 1 -->
                        <div class="flex items-start gap-3 pb-3 border-b border-rule/60">
                            <span class="font-mono text-xs font-bold bg-canvas-subtle border border-rule px-2 py-1 text-ink shrink-0">F1</span>
                            <div>
                                <h4 class="text-xs font-bold text-ink font-sans">Pencarian &amp; Input Barang Kilat</h4>
                                <p class="text-[11px] text-ink-muted mt-0.5 leading-relaxed">Cari barang via nama, kode, atau barcode scanner tanpa geser mouse.</p>
                            </div>
                        </div>

                        <!-- Capability 2 -->
                        <div class="flex items-start gap-3 pb-3 border-b border-rule/60">
                            <span class="font-mono text-xs font-bold bg-canvas-subtle border border-rule px-2 py-1 text-ink shrink-0">F5</span>
                            <div>
                                <h4 class="text-xs font-bold text-ink font-sans">Multi-Payment &amp; QRIS Dinamis</h4>
                                <p class="text-[11px] text-ink-muted mt-0.5 leading-relaxed">Tunai, debit card, e-wallet, piutang pelanggan, dan transfer bank dalam 1 layar.</p>
                            </div>
                        </div>

                        <!-- Capability 3 -->
                        <div class="flex items-start gap-3 pb-3 border-b border-rule/60">
                            <span class="font-mono text-xs font-bold bg-canvas-subtle border border-rule px-2 py-1 text-ink shrink-0">F12</span>
                            <div>
                                <h4 class="text-xs font-bold text-ink font-sans">Cetak Struk &amp; Auto Cash Drawer</h4>
                                <p class="text-[11px] text-ink-muted mt-0.5 leading-relaxed">Perintah cetak printer thermal 58/80mm dan membuka laci kasir otomatis.</p>
                            </div>
                        </div>

                        <!-- Capability 4 -->
                        <div class="flex items-start gap-3">
                            <span class="font-mono text-xs font-bold bg-canvas-subtle border border-rule px-2 py-1 text-ink shrink-0">CTRL</span>
                            <div>
                                <h4 class="text-xs font-bold text-ink font-sans">Kunci Hak Akses &amp; Laporan Seketika</h4>
                                <p class="text-[11px] text-ink-muted mt-0.5 leading-relaxed">Data aman dengan proteksi level supervisor; rekap laba &amp; stok real-time.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Specimen Slip Footer -->
                    <div class="pt-4 border-t-2 border-dashed border-rule bg-canvas-subtle -mx-6 -mb-6 p-5 sm:p-6 mt-4 flex items-center justify-between font-mono">
                        <div>
                            <div class="text-[10px] text-ink-muted uppercase">Model Pembelian</div>
                            <div class="text-xs sm:text-sm font-bold text-ink">BAYAR 1x &bull; PAKAI SELAMANYA</div>
                        </div>
                        <a href="#demo-form" class="h-9 px-3.5 bg-ink hover:bg-primary text-canvas text-xs font-bold uppercase tracking-wider inline-flex items-center gap-1.5 transition-colors">
                            <span>Minta Demo</span>
                            <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- =======================================================================
     SECTION 2: 10+ TAHUN DEDIKASI & 4 PILAR UTAMA (NUMBERED MANIFESTO)
======================================================================= -->
<section id="fitur-software" class="py-16 bg-surface-card border-b border-rule">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        
        <!-- Section Header: Left-Aligned Editorial Breadth -->
        <div class="max-w-3xl mb-12">
            <span class="font-mono text-[11px] uppercase tracking-widest text-vermilion font-bold block mb-2">
                // 10+ TAHUN REKAM JEJAK DI LAPANGAN
            </span>
            <h2 class="font-serif text-2xl sm:text-4xl text-ink font-bold tracking-tight leading-snug">
                POS ENTERPRISE: Software Kasir Untuk Segala Jenis Usaha
            </h2>
            <p class="text-ink-muted text-sm sm:text-base mt-4 leading-relaxed font-sans">
                Berpengalaman lebih dari 10 tahun mendampingi pelaku usaha dari berbagai jenis bisnis, mulai dari toko kelontong, toko pakaian, toko buku, hingga toko bahan bangunan, POS Enterprise terus melakukan pengembangan sehingga fitur-fitur yang tersedia dapat memenuhi kebutuhan pengguna dan sesuai dengan perkembangan jaman yang dinamis.
            </p>
        </div>

        <!-- 4 Pilar: Numbered Architectural Grid with Hairline Dividers -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 border border-rule divide-y md:divide-y-0 md:divide-x divide-rule bg-canvas">
            
            <!-- Pilar 01 -->
            <div class="p-6 sm:p-7 space-y-3 bg-surface-card hover:bg-canvas-subtle transition-colors">
                <span class="font-serif text-3xl sm:text-4xl font-bold text-vermilion block">01.</span>
                <h3 class="font-sans font-bold text-ink text-base">Tampilan Menarik &amp; Mudah Digunakan</h3>
                <p class="text-xs text-ink-muted leading-relaxed font-sans">
                    Desain tampilan menarik dan nyaman dilihat, fitur lengkap menggunakan bahasa Indonesia sehingga mudah dipelajari serta digunakan bahkan oleh staf baru sekalipun.
                </p>
            </div>

            <!-- Pilar 02 -->
            <div class="p-6 sm:p-7 space-y-3 bg-surface-card hover:bg-canvas-subtle transition-colors">
                <span class="font-serif text-3xl sm:text-4xl font-bold text-vermilion block">02.</span>
                <h3 class="font-sans font-bold text-ink text-base">Kerja Lebih Cepat, Tanpa Klik Mouse</h3>
                <p class="text-xs text-ink-muted leading-relaxed font-sans">
                    Layani antrean pelanggan lebih cepat dengan berbagai shortcut keyboard yang disediakan. Proses checkout kilat tanpa repot geser mouse, pelayanan cepat, pelanggan puas.
                </p>
            </div>

            <!-- Pilar 03 -->
            <div class="p-6 sm:p-7 space-y-3 bg-surface-card hover:bg-canvas-subtle transition-colors">
                <span class="font-serif text-3xl sm:text-4xl font-bold text-vermilion block">03.</span>
                <h3 class="font-sans font-bold text-ink text-base">Laporan Lengkap &amp; Customizable</h3>
                <p class="text-xs text-ink-muted leading-relaxed font-sans">
                    Puluhan menu laporan penjualan, mutasi stok, hingga rugi laba yang bisa diubah atau ditambah sesuai kebutuhan user. Cukup sekali klik, laporan akurat tersaji.
                </p>
            </div>

            <!-- Pilar 04 -->
            <div class="p-6 sm:p-7 space-y-3 bg-surface-card hover:bg-canvas-subtle transition-colors">
                <span class="font-serif text-3xl sm:text-4xl font-bold text-vermilion block">04.</span>
                <h3 class="font-sans font-bold text-ink text-base">Kunci Menu Dengan Hak Akses User</h3>
                <p class="text-xs text-ink-muted leading-relaxed font-sans">
                    Melindungi data keuangan dan stok penting toko Anda. Setiap kasir, supervisor, dan pemilik hanya bisa mengakses menu sesuai pekerjaan dan jabatannya.
                </p>
            </div>

        </div>

    </div>
</section>


<!-- =======================================================================
     SECTION 3: FITUR LENGKAP APLIKASI (OPERATIONAL INDEKS LEDGER)
======================================================================= -->
<section class="py-16 bg-canvas border-b border-rule">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        
        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-4 mb-10 pb-4 border-b border-rule">
            <div>
                <span class="font-mono text-[11px] uppercase tracking-widest text-ink font-bold block mb-1">
                    // FITUR LENGKAP &amp; USER FRIENDLY
                </span>
                <h3 class="font-serif text-2xl sm:text-3xl font-bold text-ink tracking-tight">
                    Fitur Aplikasi Terintegrasi untuk Operasional Toko
                </h3>
            </div>
            <p class="text-xs sm:text-sm text-ink-muted max-w-md lg:text-right font-sans">
                Dirancang lengkap sesuai kebutuhan user dan sangat mudah digunakan bahkan oleh user awam sekalipun.
            </p>
        </div>

        <!-- Indeks Modul: Table-like Ledger Layout -->
        <div class="bg-surface-card border border-rule divide-y divide-rule font-sans">
            
            <!-- Row 1: Master Data & Stok Barang -->
            <div class="grid grid-cols-1 md:grid-cols-2 divide-y md:divide-y-0 md:divide-x divide-rule">
                <div class="p-6 sm:p-7 space-y-2">
                    <div class="flex items-center justify-between font-mono text-xs">
                        <span class="font-bold text-ink uppercase tracking-wider">Master Data</span>
                        <span class="text-ink-faint">MOD-01</span>
                    </div>
                    <p class="text-xs sm:text-sm text-ink-muted leading-relaxed">
                        Data Supplier, Data Pelanggan/Member, Kategori Barang, Satuan Bertingkat, Barcode Scanner, dan Penetapan Harga Grosir/Ecer.
                    </p>
                </div>

                <div class="p-6 sm:p-7 space-y-2">
                    <div class="flex items-center justify-between font-mono text-xs">
                        <span class="font-bold text-ink uppercase tracking-wider">Stok Barang</span>
                        <span class="text-ink-faint">MOD-02</span>
                    </div>
                    <p class="text-xs sm:text-sm text-ink-muted leading-relaxed">
                        Data Stok Real-Time, Mutasi Antar Gudang/Toko, Stok Opname Akurat, Kartu Stok, dan Peringatan Dini Batas Minimum Stok.
                    </p>
                </div>
            </div>

            <!-- Row 2: Transaksi & Pembayaran -->
            <div class="grid grid-cols-1 md:grid-cols-2 divide-y md:divide-y-0 md:divide-x divide-rule">
                <div class="p-6 sm:p-7 space-y-2">
                    <div class="flex items-center justify-between font-mono text-xs">
                        <span class="font-bold text-ink uppercase tracking-wider">Transaksi Usaha</span>
                        <span class="text-ink-faint">MOD-03</span>
                    </div>
                    <p class="text-xs sm:text-sm text-ink-muted leading-relaxed">
                        Transaksi Penjualan (POS), Pembelian Supplier, Hutang Usaha, Piutang Pelanggan, dan Retur Barang Jual/Beli.
                    </p>
                </div>

                <div class="p-6 sm:p-7 space-y-2">
                    <div class="flex items-center justify-between font-mono text-xs">
                        <span class="font-bold text-ink uppercase tracking-wider">Pembayaran Tunai / Non Tunai</span>
                        <span class="text-ink-faint">MOD-04</span>
                    </div>
                    <p class="text-xs sm:text-sm text-ink-muted leading-relaxed">
                        Support Transaksi Tunai, Transfer Bank, Kartu Debit, E-Wallet (GoPay, OVO, ShopeePay), dan QRIS Dinamis.
                    </p>
                </div>
            </div>

            <!-- Row 3: Laporan & Hak Akses -->
            <div class="grid grid-cols-1 md:grid-cols-2 divide-y md:divide-y-0 md:divide-x divide-rule">
                <div class="p-6 sm:p-7 space-y-2">
                    <div class="flex items-center justify-between font-mono text-xs">
                        <span class="font-bold text-ink uppercase tracking-wider">Laporan Lengkap</span>
                        <span class="text-ink-faint">MOD-05</span>
                    </div>
                    <p class="text-xs sm:text-sm text-ink-muted leading-relaxed">
                        Laporan Rekap Kasir, Penjualan Harian/Bulanan, Laba Bersih, Arus Kas Toko, serta kemampuan edit/tambah laporan sesuai kebutuhan user.
                    </p>
                </div>

                <div class="p-6 sm:p-7 space-y-2">
                    <div class="flex items-center justify-between font-mono text-xs">
                        <span class="font-bold text-ink uppercase tracking-wider">Fitur Hak Akses User</span>
                        <span class="text-ink-faint">MOD-06</span>
                    </div>
                    <p class="text-xs sm:text-sm text-ink-muted leading-relaxed">
                        Kunci menu dengan hak akses bertingkat. Melindungi kerahasiaan omzet, harga modal, dan mencegah manipulasi diskon/retur oleh kasir.
                    </p>
                </div>
            </div>

            <!-- Row 4: Support Aksesori Pendukung Hardware (Full Width Ledger) -->
            <div class="p-6 sm:p-7 bg-canvas-subtle">
                <div class="flex items-center justify-between font-mono text-xs mb-2">
                    <span class="font-bold text-ink uppercase tracking-wider flex items-center gap-2">
                        <span class="material-symbols-outlined text-base text-vermilion">devices</span>
                        Support Aksesoris Pendukung Hardware
                    </span>
                    <span class="text-ink-faint">MOD-07</span>
                </div>
                <p class="text-xs sm:text-sm text-ink-muted leading-relaxed">
                    Printer Kasir Thermal (58mm / 80mm USB &amp; LAN), Scanner Barcode 1D &amp; 2D, Timbangan Digital Komputasi, Cash Drawer RJ11, dan Customer Display.
                </p>
            </div>

        </div>

    </div>
</section>


<!-- =======================================================================
     SECTION 4: MINIMUM REQUIREMENT (ENGINEERING SPEC SHEET)
======================================================================= -->
<section class="py-16 bg-surface-card border-b border-rule">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="border-2 border-ink p-7 sm:p-10 bg-canvas">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                
                <!-- Left Details -->
                <div class="lg:col-span-7 space-y-4">
                    <span class="font-mono text-[11px] uppercase tracking-widest text-vermilion font-bold block">
                        // SPESIFIKASI SISTEM TERUJI
                    </span>
                    <h3 class="font-serif text-2xl sm:text-3xl font-bold text-ink tracking-tight">
                        Minimum Requirement Komputer / Laptop
                    </h3>
                    <p class="text-xs sm:text-sm text-ink-muted leading-relaxed font-sans">
                        POS Enterprise dirancang sangat ringan, stabil, dan tidak rakus memori. Anda tidak perlu membeli PC gaming atau server mahal; komputer kantor standar sudah sangat mumpuni.
                    </p>

                    <!-- Spec Sheet Table -->
                    <div class="border border-rule divide-y divide-rule font-mono text-xs bg-surface-card mt-4">
                        <div class="flex justify-between p-3">
                            <span class="text-ink-muted uppercase">Sistem Operasi</span>
                            <span class="font-bold text-ink">Windows XP / 7 / 10 / 11</span>
                        </div>
                        <div class="flex justify-between p-3">
                            <span class="text-ink-muted uppercase">Prosesor</span>
                            <span class="font-bold text-ink">Core i3 / i5 / up</span>
                        </div>
                        <div class="flex justify-between p-3">
                            <span class="text-ink-muted uppercase">RAM</span>
                            <span class="font-bold text-ink">2 GB / 4 GB / up</span>
                        </div>
                        <div class="flex justify-between p-3">
                            <span class="text-ink-muted uppercase">Hard Disk</span>
                            <span class="font-bold text-ink">250 GB / 500 GB / up</span>
                        </div>
                        <div class="flex justify-between p-3">
                            <span class="text-ink-muted uppercase">Jaringan</span>
                            <span class="font-bold text-ink">LAN / Wi-Fi (Multi-Kasir Ready)</span>
                        </div>
                    </div>
                </div>

                <!-- Right Action Panel -->
                <div class="lg:col-span-5 lg:pl-6 border-t lg:border-t-0 lg:border-l border-rule pt-6 lg:pt-0">
                    <div class="space-y-4 font-sans">
                        <span class="font-mono text-xs uppercase font-bold text-forest flex items-center gap-1.5">
                            <span class="size-2 bg-forest rounded-full"></span>
                            DATABASE RINGAN &amp; BANDEL
                        </span>
                        <h4 class="font-serif text-2xl font-bold text-ink leading-snug">
                            Coba Langsung di Perangkat Toko Anda.
                        </h4>
                        <p class="text-xs text-ink-muted leading-relaxed">
                            Buktikan kecepatan buka transaksi dan kestabilan database-nya tanpa resiko apa pun selama 30 hari.
                        </p>
                        <a href="#demo-form" class="h-12 w-full px-6 bg-ink hover:bg-primary text-canvas text-xs font-mono font-bold uppercase tracking-wider inline-flex items-center justify-center gap-2 border border-ink shadow-crisp transition-all">
                            <span class="material-symbols-outlined text-lg">download</span>
                            <span>Coba Gratis 30 Hari</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


<!-- =======================================================================
     SECTION 5: KENAPA HARUS MEMILIH POS ENTERPRISE? (NILAI INVESTASI)
======================================================================= -->
<section id="keunggulan" class="py-16 bg-canvas border-b border-rule">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        
        <div class="max-w-2xl mb-12">
            <span class="font-mono text-[11px] uppercase tracking-widest text-vermilion font-bold block mb-2">
                // PERBANDINGAN NILAI INVESTASI
            </span>
            <h2 class="font-serif text-2xl sm:text-4xl text-ink font-bold tracking-tight leading-tight">
                Kenapa Harus Memilih POS Enterprise?
            </h2>
            <p class="text-ink-muted text-xs sm:text-sm mt-3 leading-relaxed font-sans">
                Banyak software sejenis tersedia di internet atau marketplace, mulai dari puluhan ribu hingga puluhan juta. Dari sekian banyak pilihan, kenapa harus memilih POS Enterprise dari Mitra Setia?
            </p>
        </div>

        <!-- 8 Nilai Investasi: 2-Column Monospaced Ledger List -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            
            <!-- Item 1 -->
            <div class="p-5 bg-surface-card border border-rule flex items-start gap-4">
                <span class="font-mono text-xs font-bold text-vermilion bg-canvas-subtle border border-rule px-2 py-1 shrink-0">01</span>
                <div>
                    <h4 class="font-bold text-ink text-sm font-sans">Harga Terjangkau</h4>
                    <p class="text-xs text-ink-muted mt-1 leading-relaxed font-sans">Investasi satu kali yang ramah kas usaha tanpa membebani biaya bulanan toko.</p>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="p-5 bg-surface-card border border-rule flex items-start gap-4">
                <span class="font-mono text-xs font-bold text-vermilion bg-canvas-subtle border border-rule px-2 py-1 shrink-0">02</span>
                <div>
                    <h4 class="font-bold text-ink text-sm font-sans">Bayar 1x, Pakai Selamanya</h4>
                    <p class="text-xs text-ink-muted mt-1 leading-relaxed font-sans">Sistem beli putus. Anda memiliki lisensi permanen tanpa batas waktu pemakaian.</p>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="p-5 bg-surface-card border border-rule flex items-start gap-4">
                <span class="font-mono text-xs font-bold text-vermilion bg-canvas-subtle border border-rule px-2 py-1 shrink-0">03</span>
                <div>
                    <h4 class="font-bold text-ink text-sm font-sans">Tanpa Biaya Langganan</h4>
                    <p class="text-xs text-ink-muted mt-1 leading-relaxed font-sans">Nol rupiah per bulan. Tidak ada biaya tersembunyi yang ditagihkan sewaktu-waktu.</p>
                </div>
            </div>

            <!-- Item 4 -->
            <div class="p-5 bg-surface-card border border-rule flex items-start gap-4">
                <span class="font-mono text-xs font-bold text-vermilion bg-canvas-subtle border border-rule px-2 py-1 shrink-0">04</span>
                <div>
                    <h4 class="font-bold text-ink text-sm font-sans">Garansi 6 Bulan</h4>
                    <p class="text-xs text-ink-muted mt-1 leading-relaxed font-sans">Jaminan kepastian sistem berjalan lancar dengan komitmen perbaikan dan pendampingan resmi.</p>
                </div>
            </div>

            <!-- Item 5 -->
            <div class="p-5 bg-surface-card border border-rule flex items-start gap-4">
                <span class="font-mono text-xs font-bold text-vermilion bg-canvas-subtle border border-rule px-2 py-1 shrink-0">05</span>
                <div>
                    <h4 class="font-bold text-ink text-sm font-sans">Free Training 3x</h4>
                    <p class="text-xs text-ink-muted mt-1 leading-relaxed font-sans">Bimbingan intensif hingga pemilik dan seluruh kasir mahir mengoperasikan sistem.</p>
                </div>
            </div>

            <!-- Item 6 -->
            <div class="p-5 bg-surface-card border border-rule flex items-start gap-4">
                <span class="font-mono text-xs font-bold text-vermilion bg-canvas-subtle border border-rule px-2 py-1 shrink-0">06</span>
                <div>
                    <h4 class="font-bold text-ink text-sm font-sans">Support Teknis Selama Menggunakan Program</h4>
                    <p class="text-xs text-ink-muted mt-1 leading-relaxed font-sans">Bantuan teknis responsif via WhatsApp dan remote bantuan jarak jauh saat ada kendala.</p>
                </div>
            </div>

            <!-- Item 7 -->
            <div class="p-5 bg-surface-card border border-rule flex items-start gap-4">
                <span class="font-mono text-xs font-bold text-vermilion bg-canvas-subtle border border-rule px-2 py-1 shrink-0">07</span>
                <div>
                    <h4 class="font-bold text-ink text-sm font-sans">Fitur Dapat Disesuaikan Kebutuhan User</h4>
                    <p class="text-xs text-ink-muted mt-1 leading-relaxed font-sans">Alur toko unik? Fitur dan formulir laporan dapat dicustom mengikuti SOP bisnis Anda.</p>
                </div>
            </div>

            <!-- Item 8 -->
            <div class="p-5 bg-surface-card border border-rule flex items-start gap-4">
                <span class="font-mono text-xs font-bold text-vermilion bg-canvas-subtle border border-rule px-2 py-1 shrink-0">08</span>
                <div>
                    <h4 class="font-bold text-ink text-sm font-sans">Cocok Untuk Segala Jenis Usaha</h4>
                    <p class="text-xs text-ink-muted mt-1 leading-relaxed font-sans">Minimarket, grosir sembako, toko baju, toko bangunan, toko buku, bengkel, hingga ritel modern.</p>
                </div>
            </div>

        </div>

        <!-- Section Callout -->
        <div class="mt-8 text-center">
            <a href="#demo-form" class="h-12 px-8 bg-vermilion hover:bg-vermilion-hover text-white text-xs font-mono font-bold uppercase tracking-wider inline-flex items-center gap-2 border border-ink shadow-crisp transition-all">
                <span>Coba Gratis 30 Hari</span>
                <span class="material-symbols-outlined text-base">arrow_downward</span>
            </a>
        </div>

    </div>
</section>


<!-- =======================================================================
     SECTION 6: KATALOG PRODUK SOFTWARE & HARDWARE PILIHAN
======================================================================= -->
<section class="py-16 bg-surface-card border-b border-rule">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-10 pb-4 border-b border-rule">
            <div>
                <span class="font-mono text-[11px] uppercase tracking-widest text-ink font-bold block mb-1">
                    // KATALOG RESMI MITRA SETIA
                </span>
                <h2 class="font-serif text-2xl sm:text-3xl font-bold text-ink tracking-tight">
                    Produk Software &amp; Perangkat Mesin Kasir
                </h2>
            </div>
            <a href="{{ route('catalog') }}" class="font-mono text-xs text-ink hover:text-vermilion font-bold uppercase tracking-wider inline-flex items-center gap-1.5 self-start sm:self-auto">
                <span>Buka Seluruh Katalog</span>
                <span class="material-symbols-outlined text-sm">east</span>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($featuredProducts as $product)
                <div class="bg-surface-card border border-rule hover:border-ink p-5 flex flex-col justify-between shadow-crisp-sm transition-all font-sans">
                    <div>
                        <!-- Category Tag & Stock Status -->
                        <div class="flex items-center justify-between font-mono text-[11px] pb-3 mb-3 border-b border-rule/60">
                            <span class="font-bold text-ink uppercase tracking-wider">
                                {{ $product->category }}
                            </span>
                            @if ($product->stock > 0)
                                <span class="text-forest font-bold flex items-center gap-1">
                                    <span class="size-1.5 rounded-full bg-forest"></span>
                                    READY ({{ $product->stock }})
                                </span>
                            @else
                                <span class="text-vermilion font-bold">HABIS</span>
                            @endif
                        </div>

                        <!-- 1:1 Aspect Ratio Photo Container -->
                        <a href="{{ route('product.show', $product->id) }}" class="block aspect-square bg-canvas p-4 flex items-center justify-center border border-rule mb-4 overflow-hidden">
                            <img src="{{ Str::startsWith($product->image, ['http://', 'https://', 'data:']) ? $product->image : asset($product->image) }}" 
                                 alt="{{ $product->name }}" 
                                 class="max-h-full max-w-full object-contain"
                                 onerror="this.src='https://placehold.co/400x400/FAF8F5/191816?text=Mitra+Setia'">
                        </a>

                        <!-- Product Title -->
                        <h3 class="font-bold text-ink text-sm sm:text-base leading-snug line-clamp-2 mb-2">
                            <a href="{{ route('product.show', $product->id) }}" class="hover:text-vermilion transition-colors">
                                {{ $product->name }}
                            </a>
                        </h3>

                        <!-- Technical Specs Bullets -->
                        @if ($product->specs)
                            <div class="font-mono text-[11px] text-ink-muted space-y-1 mb-4 line-clamp-2">
                                @foreach (array_slice($product->specs, 0, 2) as $key => $val)
                                    <div>&bull; {{ $key }}: <span class="text-ink font-semibold">{{ $val }}</span></div>
                                @endforeach
                            </div>
                        @else
                            <div class="font-mono text-[11px] text-ink-faint mb-4">Garansi Resmi Mitra Setia</div>
                        @endif
                    </div>

                    <div>
                        <!-- Price Section -->
                        <div class="pt-3 border-t border-rule mb-4 flex items-baseline justify-between font-mono">
                            <div>
                                <span class="text-[10px] text-ink-faint block uppercase">Harga Resmi</span>
                                <div class="text-lg font-bold text-ink">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </div>
                            </div>
                            @if($product->original_price)
                                <span class="text-xs text-ink-faint line-through">
                                    Rp {{ number_format($product->original_price, 0, ',', '.') }}
                                </span>
                            @endif
                        </div>

                        <!-- Action Grid (Min 44px Touch Targets) -->
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
                                <button type="submit" name="buy_now" value="1" class="w-full h-11 px-2 bg-ink hover:bg-primary text-canvas font-bold border border-ink transition-colors inline-flex items-center justify-center gap-1" title="Beli Langsung">
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


<!-- =======================================================================
     SECTION 7: WARTA TESTIMONI (BUKTI NYATA PENGGUNA DI LAPANGAN)
======================================================================= -->
<section id="testimoni" class="py-16 bg-canvas border-b border-rule">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        
        <div class="max-w-2xl mb-12">
            <span class="font-mono text-[11px] uppercase tracking-widest text-vermilion font-bold block mb-2">
                // KESAKSIAN DARI LAPANGAN TOKO
            </span>
            <h2 class="font-serif text-2xl sm:text-4xl text-ink font-bold tracking-tight">
                Testimoni Pengguna POS Enterprise
            </h2>
            <p class="text-xs sm:text-sm text-ink-muted mt-2 leading-relaxed font-sans">
                Kisah langsung dari pemilik toko kelontong, butik, dan swalayan yang merasakan kemudahan operasional bersama kami.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 font-sans">
            
            <!-- Testimoni 1 -->
            <div class="bg-surface-card p-6 border border-rule flex flex-col justify-between shadow-crisp-sm">
                <div>
                    <div class="font-mono text-[10px] uppercase tracking-wider text-ink-faint pb-3 border-b border-rule mb-4 flex items-center justify-between">
                        <span>PENGGUNA TERVERIFIKASI</span>
                        <span class="text-forest">&bull; AKTIF</span>
                    </div>
                    <blockquote class="font-serif text-base sm:text-lg text-ink italic leading-relaxed">
                        “Mudah dalam pengoperasian, bisa dicustom sesuai kebutuhan dan support teknis tanggap (pelayanan bagus).”
                    </blockquote>
                </div>
                <div class="pt-4 border-t border-rule mt-6">
                    <div class="font-bold text-ink text-sm">Grosir Batik Arjuna</div>
                    <div class="font-mono text-[11px] text-ink-muted">Retail Fashion &amp; Grosir</div>
                </div>
            </div>

            <!-- Testimoni 2 -->
            <div class="bg-surface-card p-6 border border-rule flex flex-col justify-between shadow-crisp-sm">
                <div>
                    <div class="font-mono text-[10px] uppercase tracking-wider text-ink-faint pb-3 border-b border-rule mb-4 flex items-center justify-between">
                        <span>PENGGUNA TERVERIFIKASI</span>
                        <span class="text-forest">&bull; AKTIF</span>
                    </div>
                    <blockquote class="font-serif text-base sm:text-lg text-ink italic leading-relaxed">
                        “Respon cepat ketika terjadi trouble. Program mudah dioperasikan dan menu cukup lengkap.”
                    </blockquote>
                </div>
                <div class="pt-4 border-t border-rule mt-6">
                    <div class="font-bold text-ink text-sm">Swalayan Madu Rejeki</div>
                    <div class="font-mono text-[11px] text-ink-muted">Minimarket &amp; Swalayan</div>
                </div>
            </div>

            <!-- Testimoni 3 -->
            <div class="bg-surface-card p-6 border border-rule flex flex-col justify-between shadow-crisp-sm">
                <div>
                    <div class="font-mono text-[10px] uppercase tracking-wider text-ink-faint pb-3 border-b border-rule mb-4 flex items-center justify-between">
                        <span>PENGGUNA TERVERIFIKASI</span>
                        <span class="text-forest">&bull; AKTIF</span>
                    </div>
                    <blockquote class="font-serif text-base sm:text-lg text-ink italic leading-relaxed">
                        “Keunggulan POS Enterprise mudah digunakan dan menu yang ditampilkan juga lengkap untuk menunjang aktifitas pekerjaan. Support teknis memuaskan.”
                    </blockquote>
                </div>
                <div class="pt-4 border-t border-rule mt-6">
                    <div class="font-bold text-ink text-sm">Maco</div>
                    <div class="font-mono text-[11px] text-ink-muted">Toko Retail</div>
                </div>
            </div>

            <!-- Testimoni 4 -->
            <div class="bg-surface-card p-6 border border-rule flex flex-col justify-between shadow-crisp-sm">
                <div>
                    <div class="font-mono text-[10px] uppercase tracking-wider text-ink-faint pb-3 border-b border-rule mb-4 flex items-center justify-between">
                        <span>PENGGUNA TERVERIFIKASI</span>
                        <span class="text-forest">&bull; AKTIF</span>
                    </div>
                    <blockquote class="font-serif text-base sm:text-lg text-ink italic leading-relaxed">
                        “Sistemnya lengkap dan rapi, mudah dipelajari dan sangat membantu pekerjaan lebih cepat.”
                    </blockquote>
                </div>
                <div class="pt-4 border-t border-rule mt-6">
                    <div class="font-bold text-ink text-sm">Commando</div>
                    <div class="font-mono text-[11px] text-ink-muted">Usaha Retail &amp; Dagang</div>
                </div>
            </div>

            <!-- Testimoni 5 -->
            <div class="bg-surface-card p-6 border border-rule flex flex-col justify-between shadow-crisp-sm">
                <div>
                    <div class="font-mono text-[10px] uppercase tracking-wider text-ink-faint pb-3 border-b border-rule mb-4 flex items-center justify-between">
                        <span>PENGGUNA TERVERIFIKASI</span>
                        <span class="text-forest">&bull; AKTIF</span>
                    </div>
                    <blockquote class="font-serif text-base sm:text-lg text-ink italic leading-relaxed">
                        “Simpel, mudah dioperasikan, dan bisa disesuaikan dengan kebutuhan. Tim support teknis sangat membantu setiap ada kendala.”
                    </blockquote>
                </div>
                <div class="pt-4 border-t border-rule mt-6">
                    <div class="font-bold text-ink text-sm">Swalayan Ijo Royo-Royo</div>
                    <div class="font-mono text-[11px] text-ink-muted">Minimarket Sembako</div>
                </div>
            </div>

            <!-- Testimoni 6 -->
            <div class="bg-surface-card p-6 border border-rule flex flex-col justify-between shadow-crisp-sm">
                <div>
                    <div class="font-mono text-[10px] uppercase tracking-wider text-ink-faint pb-3 border-b border-rule mb-4 flex items-center justify-between">
                        <span>PENGGUNA TERVERIFIKASI</span>
                        <span class="text-forest">&bull; AKTIF</span>
                    </div>
                    <blockquote class="font-serif text-base sm:text-lg text-ink italic leading-relaxed">
                        “Support sangat baik, sistem mudah dioperasikan dan bandel, database ringan. Secara keseluruhan kami sangat puas.”
                    </blockquote>
                </div>
                <div class="pt-4 border-t border-rule mt-6">
                    <div class="font-bold text-ink text-sm">Toko Sri Rejeki</div>
                    <div class="font-mono text-[11px] text-ink-muted">Toko Sembako &amp; Kelontong</div>
                </div>
            </div>

        </div>

    </div>
</section>


<!-- =======================================================================
     SECTION 8: DOWNLOAD SEKARANG & FORM VOUCHER DEMO 30 HARI
======================================================================= -->
<section id="demo-form" class="py-16 bg-surface-card">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        
        <!-- Official Voucher Border Container -->
        <div class="border-2 border-ink bg-canvas p-8 sm:p-12 shadow-crisp-lg">
            
            <!-- Slip Header -->
            <div class="text-center max-w-2xl mx-auto mb-10 pb-6 border-b border-rule">
                <span class="font-mono text-[11px] uppercase tracking-widest text-vermilion font-bold bg-white border border-rule px-3 py-1 inline-block mb-3">
                    DOWNLOAD SEKARANG &bull; FULL FITUR AKTIF 100%
                </span>
                <h2 class="font-serif text-2xl sm:text-4xl font-bold text-ink tracking-tight">
                    Coba Gratis 30 Hari Dengan Full Fitur Aktif
                </h2>
                <p class="text-xs sm:text-sm text-ink-muted mt-3 leading-relaxed font-sans">
                    Ratusan pemilik usaha di berbagai kota di Indonesia dengan beragam jenis usaha dan skala bisnis telah terbantu dengan software kasir minimarket POS Enterprise dari Mitra Setia.
                </p>
                <p class="text-xs text-ink-faint mt-2 font-sans italic">
                    Adalah sebuah kebanggaan bagi kami untuk dapat membantu memudahkan pekerjaan Anda, meningkatkan efektivitas pekerjaan, dan menjadi bagian dari pertumbuhan bisnis Anda.
                </p>
                <div class="font-mono text-xs text-ink font-bold mt-3">
                    Download POS Enterprise sekarang dan Anda dapat mencoba secara GRATIS selama 30 hari dengan full fitur aktif.
                </div>
            </div>

            <!-- Form Permintaan Demo Resmi -->
            <form onsubmit="handleDemoRequest(event)" class="space-y-4 max-w-2xl mx-auto font-sans">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-mono text-xs font-bold text-ink mb-1.5 uppercase">
                            Nama Lengkap <span class="text-vermilion">*</span>
                        </label>
                        <input type="text" id="demo_name" required placeholder="Contoh: Budi Santoso" class="w-full px-4 py-3 bg-surface-card border border-rule focus:border-ink focus:outline-none text-ink text-sm rounded-none">
                    </div>

                    <div>
                        <label class="block font-mono text-xs font-bold text-ink mb-1.5 uppercase">
                            No. WhatsApp / Telepon <span class="text-vermilion">*</span>
                        </label>
                        <input type="tel" id="demo_phone" required placeholder="Contoh: 081234567890" class="w-full px-4 py-3 bg-surface-card border border-rule focus:border-ink focus:outline-none text-ink text-sm rounded-none">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-mono text-xs font-bold text-ink mb-1.5 uppercase">
                            Kota / Domisili Usaha <span class="text-vermilion">*</span>
                        </label>
                        <input type="text" id="demo_city" required placeholder="Contoh: Sleman, Yogyakarta" class="w-full px-4 py-3 bg-surface-card border border-rule focus:border-ink focus:outline-none text-ink text-sm rounded-none">
                    </div>

                    <div>
                        <label class="block font-mono text-xs font-bold text-ink mb-1.5 uppercase">
                            Jenis Usaha Anda <span class="text-vermilion">*</span>
                        </label>
                        <input type="text" id="demo_business" required placeholder="Contoh: Toko Kelontong, Minimarket, Butik" class="w-full px-4 py-3 bg-surface-card border border-rule focus:border-ink focus:outline-none text-ink text-sm rounded-none">
                    </div>
                </div>

                <div>
                    <label class="block font-mono text-xs font-bold text-ink mb-1.5 uppercase">
                        Subject Permintaan <span class="text-vermilion">*</span>
                    </label>
                    <select id="demo_subject" required class="w-full px-4 py-3 bg-surface-card border border-rule focus:border-ink focus:outline-none text-ink text-sm rounded-none">
                        <option value="Request Demo POS Enterprise (Coba Gratis 30 Hari)">Request Demo POS Enterprise (Coba Gratis 30 Hari)</option>
                        <option value="Konsultasi Pembuatan Aplikasi & Custom Fitur">Konsultasi Pembuatan Aplikasi & Custom Fitur</option>
                        <option value="Konsultasi Paket Komplit Mesin Kasir + Software">Konsultasi Paket Komplit Mesin Kasir + Software</option>
                    </select>
                </div>

                <div>
                    <label class="block font-mono text-xs font-bold text-ink mb-1.5 uppercase">
                        Catatan Tambahan (Opsional)
                    </label>
                    <textarea id="demo_notes" rows="2" placeholder="Tuliskan pertanyaan atau kebutuhan alur spesifik toko Anda di sini..." class="w-full px-4 py-2.5 bg-surface-card border border-rule focus:border-ink focus:outline-none text-ink text-sm rounded-none"></textarea>
                </div>

                <div class="pt-4 border-t border-rule">
                    <button type="submit" class="w-full h-12 bg-vermilion hover:bg-vermilion-hover text-white font-mono text-xs font-bold uppercase tracking-wider flex items-center justify-center gap-2 border border-ink shadow-crisp transition-all active:translate-x-[2px] active:translate-y-[2px]">
                        <span class="material-symbols-outlined text-lg">send</span>
                        <span>Kirim Permintaan Demo &bull; Hubungkan ke WhatsApp</span>
                    </button>
                    <p class="font-mono text-[11px] text-ink-muted text-center mt-3">
                        Tim teknis Mitra Setia akan langsung merespons dan mengirimkan link installer POS Enterprise 30 Hari.
                    </p>
                </div>
            </form>

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
