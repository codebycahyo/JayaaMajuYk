<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Primary SEO Meta Tags -->
    <title>@yield('title', 'Jaya Maju Yk - Hardware POS & Mesin Kasir Retail Yogyakarta')</title>
    <meta name="title" content="@yield('title', 'Jaya Maju Yk - Hardware POS & Mesin Kasir Retail Yogyakarta')">
    <meta name="description" content="@yield('description', 'Distributor hardware kasir terpercaya di Yogyakarta: printer thermal, barcode scanner, laci uang cash drawer, dan paket usaha POS bergaransi resmi.')">
    <meta name="author" content="Jaya Maju Yk">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'Jaya Maju Yk - Spesialis Hardware Kasir Retail')">
    <meta property="og:description" content="@yield('description', 'Tingkatkan efisiensi bisnis dengan hardware POS standar internasional. Garansi resmi 1 tahun & teknisi siaga di Yogyakarta.')">
    <meta property="og:image" content="@yield('og_image', asset('assets/logo-share.jpg'))">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="@yield('title', 'Jaya Maju Yk - Spesialis Hardware Kasir Retail')">
    <meta name="twitter:description" content="@yield('description', 'Solusi hardware kasir standar industri untuk minimarket, F&B, dan apotek.')">
    <meta name="twitter:image" content="@yield('og_image', asset('assets/logo-share.jpg'))">

    <!-- Structured Data: Organization JSON-LD -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "LocalBusiness",
      "name": "Jaya Maju Yk",
      "telephone": "+6281234567890",
      "email": "halo@jayamaju.id",
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

    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet" />

    <!-- Tailwind CSS with Anti-AI Slop Design Tokens -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0E3481',
                        'primary-dark': '#0A2558',
                        'primary-light': '#F0F4FA',
                        'wa-green': '#1E7E34',
                        'wa-hover': '#155D27',
                        'surface-bg': '#F8FAFC',
                        'border-subtle': '#E2E8F0',
                        'border-bold': '#CBD5E1',
                    },
                    fontFamily: {
                        sans: [
                            '-apple-system',
                            'BlinkMacSystemFont',
                            '"Segoe UI"',
                            'Roboto',
                            '"Inter"',
                            '"Helvetica Neue"',
                            'Arial',
                            'sans-serif'
                        ],
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Inter", "Helvetica Neue", Arial, sans-serif;
            background-color: #F8FAFC;
            color: #0F172A;
        }
        /* Touch target minimum accessibility rule */
        .touch-target {
            min-height: 44px;
            min-width: 44px;
        }
    </style>
    @stack('styles')
</head>
<body class="bg-surface-bg text-slate-900 min-h-screen flex flex-col antialiased">

    <!-- Top Utility Announcement Bar (Clean & Functional) -->
    <div class="bg-slate-900 text-slate-300 text-xs py-2 px-4 sm:px-6 border-b border-slate-800">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-2 font-medium">
            <div class="flex items-center gap-3">
                <span class="inline-flex items-center gap-1.5 text-emerald-400 font-bold">
                    <span class="material-symbols-outlined text-sm">verified</span>
                    Dealer Resmi Hardware POS Yogyakarta
                </span>
                <span class="text-slate-600 hidden md:inline">&bull;</span>
                <span class="text-slate-400 hidden md:inline">Garansi Resmi 1 Tahun & Siaga Teknisi</span>
            </div>
            <div class="flex items-center gap-4 text-slate-300 text-[11px] sm:text-xs">
                <a href="{{ route('order.track') }}" class="hover:text-white transition-colors flex items-center gap-1">
                    <span class="material-symbols-outlined text-sm">track_changes</span> Lacak Pesanan
                </a>
                <span class="text-slate-700">&bull;</span>
                <a href="https://wa.me/6281234567890" target="_blank" class="hover:text-emerald-400 transition-colors flex items-center gap-1">
                    <span class="material-symbols-outlined text-sm">chat</span> CS WA: 0812-3456-7890
                </a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar (Clean & Symmetric) -->
    <header class="sticky top-0 z-40 bg-white border-b border-border-subtle shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 h-16 sm:h-18 flex items-center justify-between gap-4">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-2.5 shrink-0 focus:outline-none focus:ring-2 focus:ring-primary rounded-lg p-1">
                <div class="size-9 bg-primary rounded-lg flex items-center justify-center text-white font-bold text-sm shadow-xs">
                    JM
                </div>
                <div>
                    <span class="font-extrabold text-base sm:text-lg tracking-tight text-slate-900 block leading-tight">
                        JAYA MAJU
                    </span>
                    <span class="text-[10px] font-bold text-primary tracking-wider uppercase block">Hardware Kasir POS</span>
                </div>
            </a>

            <!-- Desktop Nav Links -->
            <nav class="hidden lg:flex items-center gap-6 text-sm font-semibold text-slate-700">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-primary font-bold border-b-2 border-primary py-1' : 'hover:text-primary transition-colors py-1' }}">
                    Beranda
                </a>
                <a href="{{ route('catalog') }}" class="{{ request()->routeIs('catalog') ? 'text-primary font-bold border-b-2 border-primary py-1' : 'hover:text-primary transition-colors py-1' }}">
                    Katalog Produk
                </a>
                <a href="{{ route('compare') }}" class="{{ request()->routeIs('compare') ? 'text-primary font-bold border-b-2 border-primary py-1' : 'hover:text-primary transition-colors py-1' }}">
                    Bandingkan
                </a>
                <a href="{{ route('order.track') }}" class="{{ request()->routeIs('order.track') ? 'text-primary font-bold border-b-2 border-primary py-1' : 'hover:text-primary transition-colors py-1' }}">
                    Lacak Pesanan
                </a>
                <a href="{{ route('pos.index') }}" class="px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-800 text-xs font-bold inline-flex items-center gap-1.5 transition-colors border border-slate-200">
                    <span class="material-symbols-outlined text-sm text-primary">point_of_sale</span>
                    Mesin POS Kasir
                </a>
            </nav>

            <!-- Actions: Search, Cart, Login -->
            <div class="flex items-center gap-2 sm:gap-3">
                <!-- Compare Badge -->
                <a href="{{ route('compare') }}" class="touch-target flex items-center justify-center text-slate-600 hover:text-primary rounded-lg relative transition-colors" title="Bandingkan Hardware">
                    <span class="material-symbols-outlined text-xl">compare_arrows</span>
                    @if(session('compare') && count(session('compare')) > 0)
                        <span class="absolute top-1.5 right-1.5 size-4 bg-primary text-white text-[9px] font-extrabold rounded-full flex items-center justify-center">
                            {{ count(session('compare')) }}
                        </span>
                    @endif
                </a>

                <!-- Cart Badge -->
                <a href="{{ route('cart') }}" class="touch-target flex items-center justify-center text-slate-600 hover:text-primary rounded-lg relative transition-colors" title="Keranjang Belanja">
                    <span class="material-symbols-outlined text-xl">shopping_cart</span>
                    @php 
                        $cart_count = session('cart') ? array_sum(array_column(session('cart'), 'qty')) : 0;
                    @endphp
                    @if($cart_count > 0)
                        <span class="absolute top-1.5 right-1.5 size-4 bg-red-600 text-white text-[9px] font-extrabold rounded-full flex items-center justify-center">
                            {{ $cart_count }}
                        </span>
                    @endif
                </a>

                <!-- Staff/Admin Button -->
                <div class="pl-2 border-l border-slate-200">
                    @auth
                        <a href="{{ Auth::user()->isAdmin() ? route('admin.products.index') : route('pos.index') }}" class="h-9 px-3 bg-slate-900 hover:bg-slate-800 text-white rounded-lg text-xs font-bold inline-flex items-center gap-1.5 transition-colors">
                            <span class="material-symbols-outlined text-sm">dashboard</span>
                            <span class="hidden sm:inline">{{ Auth::user()->name }}</span>
                        </a>
                    @else
                        <a href="{{ route('admin.login') }}" class="h-9 px-3 border border-slate-300 hover:border-slate-400 text-slate-700 rounded-lg text-xs font-bold inline-flex items-center gap-1.5 transition-colors bg-white">
                            <span class="material-symbols-outlined text-sm">lock</span>
                            <span class="hidden sm:inline">Staf Login</span>
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

    <!-- Clean, High-Contrast Footer -->
    <footer class="bg-slate-900 text-slate-300 pt-14 pb-10 border-t border-slate-800 mt-16 text-xs sm:text-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <!-- Col 1: About -->
                <div class="space-y-3">
                    <div class="flex items-center gap-2">
                        <div class="size-7 bg-primary rounded-md flex items-center justify-center text-white font-bold text-xs">
                            JM
                        </div>
                        <span class="font-extrabold text-white text-base">JAYA MAJU YK</span>
                    </div>
                    <p class="text-slate-400 text-xs leading-relaxed">
                        Pusat hardware kasir POS & perlengkapan retail terpercaya di Yogyakarta. Menyediakan printer thermal, scanner barcode, laci uang, dan komputer kasir bergaransi resmi.
                    </p>
                    <div class="text-[11px] text-slate-400 pt-1">
                        Jl. Babarsari No. 12, Sleman, D.I. Yogyakarta 55281
                    </div>
                </div>

                <!-- Col 2: Kategori -->
                <div>
                    <h4 class="font-bold text-white text-xs uppercase tracking-wider mb-3">Kategori Produk</h4>
                    <ul class="space-y-2 text-xs text-slate-400">
                        <li><a href="{{ route('catalog', ['category' => 'Printer Kasir']) }}" class="hover:text-white transition-colors">Printer Kasir Thermal</a></li>
                        <li><a href="{{ route('catalog', ['category' => 'Barcode Scanner']) }}" class="hover:text-white transition-colors">Barcode Scanner 1D & 2D</a></li>
                        <li><a href="{{ route('catalog', ['category' => 'Komputer Kasir']) }}" class="hover:text-white transition-colors">Komputer & Mesin All-in-One</a></li>
                        <li><a href="{{ route('catalog', ['category' => 'Laci Kasir']) }}" class="hover:text-white transition-colors">Laci Uang Cash Drawer</a></li>
                    </ul>
                </div>

                <!-- Col 3: Layanan & Jam Operasional -->
                <div>
                    <h4 class="font-bold text-white text-xs uppercase tracking-wider mb-3">Layanan Toko</h4>
                    <ul class="space-y-2 text-xs text-slate-400">
                        <li><span class="text-slate-300 font-semibold">Garansi Resmi:</span> 1 Tahun Tukar / Servis</li>
                        <li><span class="text-slate-300 font-semibold">Instalasi On-Site:</span> Siap bantu wilayah Jogja</li>
                        <li><span class="text-slate-300 font-semibold">Jam Operasional:</span> Senin - Sabtu (08.30 - 17.00 WIB)</li>
                        <li><span class="text-slate-300 font-semibold">Konsultasi:</span> Gratis via WhatsApp</li>
                    </ul>
                </div>

                <!-- Col 4: Kontak Cepat -->
                <div>
                    <h4 class="font-bold text-white text-xs uppercase tracking-wider mb-3">Kontak & Pembelian</h4>
                    <p class="text-xs text-slate-400 mb-3">Pemesanan cepat dan konsultasi teknis langsung ke WhatsApp kami:</p>
                    <a href="https://wa.me/6281234567890" target="_blank" class="h-11 px-4 bg-wa-green hover:bg-wa-hover text-white rounded-lg font-bold text-xs inline-flex items-center justify-center gap-2 transition-colors w-full">
                        <svg class="size-4 fill-current shrink-0" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                        </svg>
                        <span>Chat WhatsApp Sales</span>
                    </a>
                </div>
            </div>

            <div class="pt-6 border-t border-slate-800 flex flex-col sm:flex-row justify-between items-center gap-3 text-slate-500 text-xs">
                <div>&copy; {{ date('Y') }} Jaya Maju Yk. Hak Cipta Dilindungi.</div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('catalog') }}" class="hover:text-slate-300 transition-colors">Katalog</a>
                    <a href="{{ route('order.track') }}" class="hover:text-slate-300 transition-colors">Status Pesanan</a>
                    <a href="{{ route('admin.login') }}" class="hover:text-slate-300 transition-colors">Portal Staf</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
