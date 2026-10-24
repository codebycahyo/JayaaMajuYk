<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Primary SEO Meta Tags -->
    <title>@yield('title', 'Mitra Setia - Software Kasir Minimarket & Hardware Mesin Kasir')</title>
    <meta name="title" content="@yield('title', 'Mitra Setia - Software Kasir Minimarket & Hardware Mesin Kasir')">
    <meta name="description" content="@yield('description', 'Mitra Setia: Spesialis Software Kasir Minimarket POS Enterprise (Bayar 1x Pakai Selamanya Tanpa Langganan) dan Mesin Kasir Lengkap bergaransi resmi.')">
    <meta name="author" content="Mitra Setia">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'Mitra Setia - Software Kasir Minimarket & Hardware Mesin Kasir')">
    <meta property="og:description" content="@yield('description', 'Software kasir POS Enterprise tanpa biaya langganan, bayar 1x pakai selamanya, bergaransi resmi dan support teknis penuh.')">
    <meta property="og:image" content="@yield('og_image', asset('assets/logo-share.jpg'))">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="@yield('title', 'Mitra Setia - Software Kasir Minimarket & Hardware Mesin Kasir')">
    <meta name="twitter:description" content="@yield('description', 'Solusi mesin kasir dan software kasir POS Enterprise untuk segala jenis usaha retail, minimarket, resto, dan apotek.')">
    <meta name="twitter:image" content="@yield('og_image', asset('assets/logo-share.jpg'))">

    <!-- Structured Data: Organization JSON-LD -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "LocalBusiness",
      "name": "Mitra Setia",
      "telephone": "+6281234567890",
      "email": "halo@mitrasetia.id",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Jl. Babarsari No. 12",
        "addressLocality": "Sleman",
        "addressRegion": "D.I. Yogyakarta",
        "postalCode": "55281",
        "addressCountry": "ID"
      },
      "url": "{{ url('/') }}",
      "priceRange": "$$",
      "openingHours": "Mo-Sa 08:30-17:00"
    }
    </script>
    @stack('structured-data')

    <!-- Typography: Newsreader (Display Serif) + Plus Jakarta Sans (UI & Text) + JetBrains Mono (Data & Ledger) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600;700&family=Newsreader:ital,opsz,wght@0,6..72,400;0,6..72,500;0,6..72,600;0,6..72,700;1,6..72,400;1,6..72,600&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet" />

    <!-- Tailwind CSS with Editorial Industrial Ledger Design Tokens -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'serif': ['Newsreader', 'Georgia', 'Cambria', 'serif'],
                        'sans': ['"Plus Jakarta Sans"', 'system-ui', '-apple-system', 'sans-serif'],
                        'mono': ['"JetBrains Mono"', 'SFMono-Regular', 'Menlo', 'monospace']
                    },
                    colors: {
                        'canvas': '#FAF8F5',
                        'canvas-subtle': '#F3EFE9',
                        'ink': '#191816',
                        'ink-muted': '#5C5852',
                        'ink-faint': '#8C867E',
                        'rule': '#E4DDD3',
                        'rule-strong': '#191816',
                        'primary': '#162C46',
                        'primary-dark': '#0E1C2D',
                        'vermilion': '#BA2D1D',
                        'vermilion-hover': '#9F2618',
                        'forest': '#1B5E38',
                        'forest-hover': '#14462A',
                        'gold': '#8A6218',
                        'surface-card': '#FFFFFF'
                    },
                    boxShadow: {
                        'crisp': '2px 2px 0 0 #191816',
                        'crisp-sm': '1px 1px 0 0 #191816',
                        'crisp-lg': '4px 4px 0 0 #191816'
                    }
                }
            }
        }
    </script>
    <style>
        :root {
            --bg-canvas: #FAF8F5;
            --bg-canvas-subtle: #F3EFE9;
            --bg-surface: #FFFFFF;
            --color-ink: #191816;
            --color-ink-muted: #5C5852;
            --color-ink-faint: #8C867E;
            --color-rule: #E4DDD3;
            --color-rule-strong: #191816;
            --color-primary: #162C46;
            --color-vermilion: #BA2D1D;
            --color-forest: #1B5E38;
        }

        body {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            background-color: var(--bg-canvas);
            color: var(--color-ink);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        h1, h2, .font-editorial {
            font-family: 'Newsreader', Georgia, serif;
            letter-spacing: -0.02em;
        }

        .touch-target {
            min-height: 44px;
            min-width: 44px;
        }

        .hairline-border {
            border: 1px solid var(--color-rule);
        }

        .hairline-b {
            border-bottom: 1px solid var(--color-rule);
        }

        .hairline-t {
            border-top: 1px solid var(--color-rule);
        }

        @media print {
            .no-print {
                display: none !important;
            }
        }
    </style>
    @stack('styles')
</head>
<body class="bg-canvas text-ink min-h-screen flex flex-col">

    <!-- Top Utility Announcement Bar: Editorial Broadsheet Slug -->
    <div class="bg-ink text-canvas text-xs py-2 px-4 sm:px-6 border-b border-ink">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-2 font-mono text-[11px] uppercase tracking-wider">
            <div class="flex items-center gap-3">
                <span class="inline-flex items-center gap-1.5 text-forest font-bold bg-white/10 px-2 py-0.5 rounded-xs">
                    <span class="size-1.5 rounded-full bg-emerald-400"></span>
                    MITRA SETIA &bull; EST. 10+ TAHUN
                </span>
                <span class="text-white/30 hidden md:inline">|</span>
                <span class="text-canvas-subtle hidden md:inline">Software Kasir Minimarket & Hardware Toko Resmi</span>
            </div>
            <div class="flex items-center gap-4 text-canvas text-[11px]">
                <a href="#demo-form" class="text-amber-300 hover:text-white transition-colors flex items-center gap-1 font-bold">
                    [Coba Gratis 30 Hari]
                </a>
                <span class="text-white/30">&bull;</span>
                <a href="{{ route('order.track') }}" class="hover:text-amber-200 transition-colors">
                    Lacak Pesanan
                </a>
                <span class="text-white/30">&bull;</span>
                <a href="https://wa.me/6281234567890?text={{ urlencode('Halo Mitra Setia, saya ingin konsultasi software kasir & mesin kasir.') }}" target="_blank" class="text-emerald-300 hover:underline">
                    WA Admin: 0812-3456-7890
                </a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar: Clean Mercantile Masthead -->
    <header class="sticky top-0 z-40 bg-surface-card/95 backdrop-blur-xs border-b border-rule">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 h-18 flex items-center justify-between gap-4">
            <!-- Brand Logo with Editorial Stamp -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 shrink-0 focus:outline-none focus:ring-1 focus:ring-ink">
                <div class="size-10 bg-primary text-canvas flex items-center justify-center font-serif text-lg font-bold border border-ink shadow-crisp-sm">
                    MS
                </div>
                <div>
                    <span class="font-serif text-xl sm:text-2xl font-bold tracking-tight text-ink block leading-none">
                        Mitra Setia
                    </span>
                    <span class="font-mono text-[9px] uppercase tracking-widest text-ink-muted block mt-0.5">Software & Mesin Kasir Toko</span>
                </div>
            </a>

            <!-- Desktop Nav Links with Typographic Deliberation -->
            <nav class="hidden lg:flex items-center gap-7 text-xs uppercase tracking-wider font-bold text-ink-muted">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-ink border-b-2 border-vermilion py-1' : 'hover:text-ink transition-colors py-1' }}">
                    Beranda
                </a>
                <a href="{{ route('catalog') }}" class="{{ request()->routeIs('catalog') ? 'text-ink border-b-2 border-vermilion py-1' : 'hover:text-ink transition-colors py-1' }}">
                    Katalog Produk
                </a>
                <a href="#fitur-software" class="hover:text-ink transition-colors py-1">
                    Spesifikasi POS
                </a>
                <a href="#keunggulan" class="hover:text-ink transition-colors py-1">
                    Nilai Investasi
                </a>
                <a href="#testimoni" class="hover:text-ink transition-colors py-1">
                    Warta Pengguna
                </a>
                <a href="{{ route('pos.index') }}" class="px-3 py-1.5 bg-canvas border border-rule hover:border-ink text-ink text-[11px] font-mono font-bold inline-flex items-center gap-1.5 transition-colors">
                    <span class="material-symbols-outlined text-sm text-vermilion">point_of_sale</span>
                    TERMINAL KASIR
                </a>
            </nav>

            <!-- Actions: Demo, Cart, Staff Auth -->
            <div class="flex items-center gap-3">
                <a href="#demo-form" class="hidden sm:inline-flex h-10 px-4 bg-vermilion hover:bg-vermilion-hover text-white text-xs font-mono font-bold items-center gap-2 border border-ink shadow-crisp-sm transition-all active:translate-x-[1px] active:translate-y-[1px]">
                    <span class="size-1.5 bg-white rounded-full"></span>
                    <span>TRIAL 30 HARI</span>
                </a>

                <!-- Cart Counter with Monospace Precision -->
                <a href="{{ route('cart') }}" class="touch-target flex items-center justify-center p-2 text-ink hover:text-vermilion relative border border-transparent hover:border-rule transition-colors" title="Keranjang Belanja">
                    <span class="material-symbols-outlined text-2xl">shopping_bag</span>
                    @php 
                        $cart_count = session('cart') ? array_sum(array_column(session('cart'), 'qty')) : 0;
                    @endphp
                    @if($cart_count > 0)
                        <span class="absolute top-1 right-1 font-mono text-[10px] font-bold bg-vermilion text-white px-1.5 py-0.2 leading-tight border border-ink">
                            {{ $cart_count }}
                        </span>
                    @endif
                </a>

                <!-- Staff/Admin Button -->
                <div class="pl-2 border-l border-rule">
                    @auth
                        <a href="{{ Auth::user()->isAdmin() ? route('admin.products.index') : route('pos.index') }}" class="h-10 px-3 bg-ink hover:bg-primary text-canvas text-xs font-mono font-semibold inline-flex items-center gap-1.5 border border-ink transition-colors">
                            <span class="material-symbols-outlined text-sm">badge</span>
                            <span class="hidden sm:inline">{{ Auth::user()->name }}</span>
                        </a>
                    @else
                        <a href="{{ route('admin.login') }}" class="h-10 px-3 border border-rule hover:border-ink text-ink bg-white text-xs font-mono font-semibold inline-flex items-center gap-1.5 transition-colors">
                            <span class="material-symbols-outlined text-sm">lock</span>
                            <span class="hidden sm:inline">Portal Staf</span>
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <!-- Global Alerts -->
    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 pt-4 w-full">
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-900 px-4 py-3 rounded-lg flex items-center gap-3 text-xs sm:text-sm font-medium">
                <span class="material-symbols-outlined text-emerald-600 text-lg">check_circle</span>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 pt-4 w-full">
            <div class="bg-red-50 border border-red-200 text-red-900 px-4 py-3 rounded-lg flex items-center gap-3 text-xs sm:text-sm font-medium">
                <span class="material-symbols-outlined text-red-600 text-lg">error</span>
                <span>{{ session('error') }}</span>
            </div>
        </div>
    @endif

    <!-- Main Content Area -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Editorial Ledger Broadsheet Footer -->
    <footer class="bg-surface-card border-t border-rule-strong mt-20 text-xs text-ink-muted">
        <!-- Top Broadsheet Strip -->
        <div class="border-b border-rule bg-canvas-subtle py-4 px-4 sm:px-6">
            <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-3 font-mono text-[11px] uppercase tracking-wider">
                <span class="flex items-center gap-2 text-ink">
                    <span class="size-2 bg-vermilion rounded-full"></span>
                    GARANSI RESMI MITRA SETIA &bull; LAYANAN TEKNIS PURNA JUAL
                </span>
                <span class="text-ink-muted">
                    Hotline Teknis: 0812-3456-7890 (Senin - Sabtu 08.30 - 17.00 WIB)
                </span>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-14">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">
                <!-- Col 1: Brand & Colophon -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="size-8 bg-primary text-canvas flex items-center justify-center font-serif font-bold text-sm border border-ink">
                            MS
                        </div>
                        <span class="font-serif text-lg font-bold text-ink">MITRA SETIA</span>
                    </div>
                    <p class="text-ink-muted text-xs leading-relaxed">
                        Penyedia peranti kasir terpadu dan lisensi software retail POS Enterprise. Berdedikasi lebih dari 10 tahun mendampingi ratusan toko kelontong, toserba, dan ritel mandiri di seluruh penjuru Indonesia.
                    </p>
                    <div class="font-mono text-[11px] text-ink-faint border-t border-rule pt-2">
                        Jl. Babarsari No. 12, Sleman, D.I. Yogyakarta 55281
                    </div>
                </div>

                <!-- Col 2: Kategori & Produk -->
                <div>
                    <h4 class="font-mono text-[11px] uppercase tracking-widest font-bold text-ink pb-2 mb-3 border-b border-rule">Katalog Produk</h4>
                    <ul class="space-y-2 text-xs text-ink-muted">
                        <li><a href="{{ route('catalog', ['category' => 'Software Kasir']) }}" class="hover:text-vermilion transition-colors flex items-center justify-between"><span>Software POS Enterprise</span><span class="font-mono text-[10px] text-ink-faint">01</span></a></li>
                        <li><a href="{{ route('catalog', ['category' => 'Paket Usaha']) }}" class="hover:text-vermilion transition-colors flex items-center justify-between"><span>Paket Komplit Mesin Kasir</span><span class="font-mono text-[10px] text-ink-faint">02</span></a></li>
                        <li><a href="{{ route('catalog', ['category' => 'Printer Kasir']) }}" class="hover:text-vermilion transition-colors flex items-center justify-between"><span>Thermal Receipt Printer</span><span class="font-mono text-[10px] text-ink-faint">03</span></a></li>
                        <li><a href="{{ route('catalog', ['category' => 'Barcode Scanner']) }}" class="hover:text-vermilion transition-colors flex items-center justify-between"><span>Laser Barcode Scanner</span><span class="font-mono text-[10px] text-ink-faint">04</span></a></li>
                        <li><a href="{{ route('catalog', ['category' => 'Komputer Kasir']) }}" class="hover:text-vermilion transition-colors flex items-center justify-between"><span>Komputer Kasir All-in-One</span><span class="font-mono text-[10px] text-ink-faint">05</span></a></li>
                    </ul>
                </div>

                <!-- Col 3: Ketentuan Layanan & Standar -->
                <div>
                    <h4 class="font-mono text-[11px] uppercase tracking-widest font-bold text-ink pb-2 mb-3 border-b border-rule">Integritas Layanan</h4>
                    <ul class="space-y-2.5 text-xs text-ink-muted">
                        <li class="border-b border-rule/60 pb-1.5">
                            <span class="font-bold text-ink block">Beli Putus (Lisensi Seumur Hidup)</span>
                            <span class="text-[11px] text-ink-faint">Bayar 1x, pakai selamanya tanpa biaya sewa bulanan.</span>
                        </li>
                        <li class="border-b border-rule/60 pb-1.5">
                            <span class="font-bold text-ink block">Garansi 6 Bulan & Free Training 3x</span>
                            <span class="text-[11px] text-ink-faint">Bimbingan tuntas operasional staf dan pemilik toko.</span>
                        </li>
                        <li>
                            <span class="font-bold text-ink block">Bantuan Teknis Berkelanjutan</span>
                            <span class="text-[11px] text-ink-faint">Dukungan via WhatsApp & remote desktop.</span>
                        </li>
                    </ul>
                </div>

                <!-- Col 4: Dispatch Permintaan / Direct Line -->
                <div>
                    <h4 class="font-mono text-[11px] uppercase tracking-widest font-bold text-ink pb-2 mb-3 border-b border-rule">Saluran Langsung</h4>
                    <p class="text-xs text-ink-muted mb-4 leading-relaxed">Konsultasi kebutuhan toko atau minta installer demo 30 hari langsung ke tim teknis kami:</p>
                    <a href="https://wa.me/6281234567890?text={{ urlencode('Halo Mitra Setia, saya ingin konsultasi software kasir & mesin kasir.') }}" target="_blank" class="h-11 px-4 bg-forest hover:bg-forest-hover text-white text-xs font-mono font-bold inline-flex items-center justify-center gap-2 border border-ink shadow-crisp-sm transition-all w-full">
                        <svg class="size-4 fill-current shrink-0" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                        </svg>
                        <span>HUBUNGI VIA WHATSAPP</span>
                    </a>
                </div>
            </div>

            <!-- Bottom Colophon -->
            <div class="pt-6 border-t border-rule flex flex-col sm:flex-row justify-between items-center gap-3 font-mono text-[11px] text-ink-faint">
                <div>&copy; {{ date('Y') }} MITRA SETIA &bull; SELURUH HAK CIPTA DILINDUNGI</div>
                <div class="flex items-center gap-5">
                    <a href="{{ route('catalog') }}" class="hover:text-ink transition-colors">Katalog Lengkap</a>
                    <span>/</span>
                    <a href="{{ route('order.track') }}" class="hover:text-ink transition-colors">Pelacakan Pesanan</a>
                    <span>/</span>
                    <a href="{{ route('admin.login') }}" class="hover:text-ink transition-colors">Akses Karyawan</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
