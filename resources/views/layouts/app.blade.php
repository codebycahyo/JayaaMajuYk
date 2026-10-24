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

    <!-- Typography: Plus Jakarta Sans (Clean Minimalist Swiss / High-End SaaS) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400;1,600&display=swap" rel="stylesheet">

    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet" />

    <!-- Tailwind CSS with Clean White Minimalist Design Tokens -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['"Plus Jakarta Sans"', '-apple-system', 'BlinkMacSystemFont', 'system-ui', 'sans-serif'],
                        'mono': ['SFMono-Regular', 'Menlo', 'Monaco', 'Consolas', 'monospace']
                    },
                    colors: {
                        'canvas': '#FFFFFF',
                        'canvas-subtle': '#FAFAFA',
                        'canvas-muted': '#F4F4F5',
                        'ink': '#09090B',
                        'ink-muted': '#52525B',
                        'ink-faint': '#A1A1AA',
                        'border-subtle': '#E4E4E7',
                        'border-muted': '#F4F4F5',
                        'accent-dark': '#18181B',
                        'accent-green': '#10B981',
                        'accent-cream': '#FEFDF8'
                    },
                    boxShadow: {
                        'soft': '0 2px 8px -2px rgba(0, 0, 0, 0.05), 0 1px 4px -1px rgba(0, 0, 0, 0.03)',
                        'card': '0 10px 30px -10px rgba(0, 0, 0, 0.06), 0 4px 12px -4px rgba(0, 0, 0, 0.03)',
                        'floating': '0 25px 50px -12px rgba(0, 0, 0, 0.1)'
                    }
                }
            }
        }
    </script>
    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, system-ui, sans-serif;
            background-color: #FFFFFF;
            color: #09090B;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .touch-target {
            min-height: 44px;
            min-width: 44px;
        }

        @media print {
            .no-print {
                display: none !important;
            }
        }
    </style>
    @stack('styles')
</head>
<body class="bg-white text-ink min-h-screen flex flex-col font-sans">

    <!-- Top Floating / Sticky Header (Sleek, High-End SaaS & Tech Aesthetic) -->
    <header class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-zinc-100 transition-all duration-200" id="main-header">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 h-16 flex items-center justify-between gap-4">
            
            <!-- Left: Brand Logo & Wordmark -->
            <a href="{{ route('home') }}" class="flex items-center gap-2.5 shrink-0 focus:outline-none group">
                <div class="size-8 rounded-lg bg-zinc-950 text-white flex items-center justify-center font-bold text-xs tracking-tight shadow-sm group-hover:bg-zinc-800 transition-colors">
                    MS
                </div>
                <div class="flex items-center gap-2">
                    <span class="font-bold text-base sm:text-lg tracking-tight text-zinc-950 group-hover:text-black transition-colors">
                        Mitra Setia
                    </span>
                    <span class="hidden sm:inline-block text-[10px] font-semibold text-zinc-500 bg-zinc-100 border border-zinc-200/60 rounded px-1.5 py-0.5 uppercase tracking-wider">
                        POS
                    </span>
                </div>
            </a>

            <!-- Center: Desktop Navigation Links -->
            <nav class="hidden md:flex items-center gap-8 text-xs font-medium text-zinc-600">
                <a href="{{ route('home') }}" class="transition-colors hover:text-zinc-950 {{ request()->routeIs('home') ? 'text-zinc-950 font-semibold' : '' }}">
                    Beranda
                </a>
                <a href="{{ route('catalog') }}" class="transition-colors hover:text-zinc-950 {{ request()->routeIs('catalog') ? 'text-zinc-950 font-semibold' : '' }}">
                    Katalog
                </a>
                <a href="#fitur-software" class="transition-colors hover:text-zinc-950">
                    Fitur
                </a>
                <a href="#keunggulan" class="transition-colors hover:text-zinc-950">
                    Keunggulan
                </a>
                <a href="#testimoni" class="transition-colors hover:text-zinc-950">
                    Testimoni
                </a>
            </nav>

            <!-- Right: Action Section (Staff, Cart, Primary CTA, Mobile Hamburger) -->
            <div class="flex items-center gap-3">
                
                <!-- Staff Portal Access -->
                <div class="hidden sm:block">
                    @auth
                        <a href="{{ Auth::user()->isAdmin() ? route('admin.products.index') : route('pos.index') }}" class="text-xs font-medium text-zinc-600 hover:text-zinc-950 px-2 py-1 rounded transition-colors inline-flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">account_circle</span>
                            <span>{{ Auth::user()->name }}</span>
                        </a>
                    @else
                        <a href="{{ route('admin.login') }}" class="text-xs font-medium text-zinc-500 hover:text-zinc-950 px-2 py-1 transition-colors">
                            Portal Staf
                        </a>
                    @endauth
                </div>

                <!-- Subtle Separator -->
                <div class="hidden sm:block h-4 w-px bg-zinc-200"></div>

                <!-- Minimalist Cart Icon Button -->
                <a href="{{ route('cart') }}" class="relative p-2 text-zinc-600 hover:text-zinc-950 hover:bg-zinc-100 rounded-full transition-colors" title="Keranjang Belanja">
                    <span class="material-symbols-outlined text-xl">shopping_bag</span>
                    @php 
                        $cart_count = session('cart') ? array_sum(array_column(session('cart'), 'qty')) : 0;
                    @endphp
                    @if($cart_count > 0)
                        <span class="absolute top-1 right-1 size-4 bg-zinc-950 text-white text-[9px] font-bold rounded-full flex items-center justify-center">
                            {{ $cart_count }}
                        </span>
                    @endif
                </a>

                <!-- Primary CTA: Sleek Black Pill (Hidden on mobile to keep navbar clean; visible in mobile drawer) -->
                <a href="#demo-form" class="hidden sm:inline-flex items-center gap-1.5 bg-zinc-950 hover:bg-zinc-800 text-white text-xs font-semibold px-4 py-2 rounded-full transition-all duration-150 shadow-sm active:scale-95">
                    <span>Coba Gratis</span>
                    <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </a>

                <!-- Mobile Hamburger Button -->
                <button type="button" onclick="toggleMobileMenu()" class="md:hidden size-9 rounded-lg border border-zinc-200 flex items-center justify-center text-zinc-700 hover:text-zinc-950 hover:bg-zinc-50 focus:outline-none transition-colors" aria-label="Menu Navigasi">
                    <span id="menu-icon-open" class="material-symbols-outlined text-xl">menu</span>
                    <span id="menu-icon-close" class="material-symbols-outlined text-xl hidden">close</span>
                </button>
            </div>
        </div>

        <!-- Mobile Drawer Navigation (Slide-Down & Accessible) -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-zinc-100 bg-white px-5 py-5 shadow-lg transition-all">
            <nav class="space-y-1 text-sm font-medium text-zinc-700">
                <a href="{{ route('home') }}" class="block px-3 py-2 rounded-lg hover:bg-zinc-50 {{ request()->routeIs('home') ? 'bg-zinc-50 text-zinc-950 font-semibold' : '' }}">
                    Beranda
                </a>
                <a href="{{ route('catalog') }}" class="block px-3 py-2 rounded-lg hover:bg-zinc-50 {{ request()->routeIs('catalog') ? 'bg-zinc-50 text-zinc-950 font-semibold' : '' }}">
                    Katalog Produk
                </a>
                <a href="#fitur-software" onclick="toggleMobileMenu()" class="block px-3 py-2 rounded-lg hover:bg-zinc-50">
                    Fitur Software
                </a>
                <a href="#keunggulan" onclick="toggleMobileMenu()" class="block px-3 py-2 rounded-lg hover:bg-zinc-50">
                    Nilai Investasi
                </a>
                <a href="#testimoni" onclick="toggleMobileMenu()" class="block px-3 py-2 rounded-lg hover:bg-zinc-50">
                    Testimoni Pelanggan
                </a>

                <div class="pt-4 mt-3 border-t border-zinc-100 space-y-2">
                    <a href="#demo-form" onclick="toggleMobileMenu()" class="w-full h-10 bg-zinc-950 text-white rounded-full font-semibold text-xs flex items-center justify-center gap-1.5 shadow-sm">
                        <span>Coba Gratis 30 Hari</span>
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </a>
                    
                    @auth
                        <a href="{{ Auth::user()->isAdmin() ? route('admin.products.index') : route('pos.index') }}" class="w-full h-10 border border-zinc-200 text-zinc-800 rounded-full font-medium text-xs flex items-center justify-center gap-1.5">
                            <span class="material-symbols-outlined text-sm">account_circle</span>
                            <span>Dashboard Staf ({{ Auth::user()->name }})</span>
                        </a>
                    @else
                        <a href="{{ route('admin.login') }}" class="w-full h-10 border border-zinc-200 text-zinc-700 rounded-full font-medium text-xs flex items-center justify-center gap-1.5">
                            <span class="material-symbols-outlined text-sm">lock</span>
                            <span>Login Portal Karyawan</span>
                        </a>
                    @endauth
                </div>
            </nav>
        </div>
    </header>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            const openIcon = document.getElementById('menu-icon-open');
            const closeIcon = document.getElementById('menu-icon-close');
            
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
                openIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
            } else {
                menu.classList.add('hidden');
                openIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            }
        }
    </script>

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

    <!-- Clean White Minimalist Footer -->
    <footer class="bg-white border-t border-zinc-100 mt-24 text-xs text-zinc-500">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-14">
                <!-- Col 1: Brand Info -->
                <div class="space-y-3">
                    <div class="flex items-center gap-2.5">
                        <div class="size-7 rounded-lg bg-black text-white flex items-center justify-center font-bold text-xs">
                            MS
                        </div>
                        <span class="font-extrabold text-black text-sm tracking-tight">Mitra Setia</span>
                    </div>
                    <p class="text-zinc-500 text-xs leading-relaxed">
                        Pusat software kasir POS Enterprise dan hardware mesin kasir terlengkap. Lebih dari 10 tahun mendampingi pelaku usaha ritel, minimarket, grosir, dan toko mandiri di seluruh Indonesia.
                    </p>
                    <div class="text-[11px] text-zinc-400 pt-1">
                        Jl. Babarsari No. 12, Sleman, D.I. Yogyakarta 55281
                    </div>
                </div>

                <!-- Col 2: Katalog -->
                <div>
                    <h4 class="font-bold text-zinc-900 text-xs uppercase tracking-wider mb-3">Produk &amp; Layanan</h4>
                    <ul class="space-y-2 text-xs text-zinc-500">
                        <li><a href="{{ route('catalog', ['category' => 'Software Kasir']) }}" class="hover:text-black transition-colors">Software POS Enterprise</a></li>
                        <li><a href="{{ route('catalog', ['category' => 'Paket Usaha']) }}" class="hover:text-black transition-colors">Paket Mesin Kasir Lengkap</a></li>
                        <li><a href="{{ route('catalog', ['category' => 'Printer Kasir']) }}" class="hover:text-black transition-colors">Printer Kasir Thermal</a></li>
                        <li><a href="{{ route('catalog', ['category' => 'Barcode Scanner']) }}" class="hover:text-black transition-colors">Barcode Scanner 1D &amp; 2D</a></li>
                        <li><a href="{{ route('catalog', ['category' => 'Komputer Kasir']) }}" class="hover:text-black transition-colors">Komputer Kasir Touchscreen</a></li>
                    </ul>
                </div>

                <!-- Col 3: Keunggulan -->
                <div>
                    <h4 class="font-bold text-zinc-900 text-xs uppercase tracking-wider mb-3">Keunggulan</h4>
                    <ul class="space-y-2 text-xs text-zinc-500">
                        <li><strong class="text-zinc-800">Tanpa Biaya Langganan:</strong> Bayar 1x Pakai Selamanya</li>
                        <li><strong class="text-zinc-800">Garansi 6 Bulan:</strong> Disertai Free Training 3x</li>
                        <li><strong class="text-zinc-800">Full Support Teknis:</strong> Bantuan via WhatsApp &amp; Remote</li>
                        <li><strong class="text-zinc-800">Custom Fitur:</strong> Fleksibel untuk segala jenis toko</li>
                    </ul>
                </div>

                <!-- Col 4: Kontak Cepat -->
                <div>
                    <h4 class="font-bold text-zinc-900 text-xs uppercase tracking-wider mb-3">Konsultasi</h4>
                    <p class="text-xs text-zinc-500 mb-3.5 leading-relaxed">Hubungi kami untuk konsultasi alur kasir toko Anda atau minta demo 30 hari:</p>
                    <a href="https://wa.me/6281234567890?text={{ urlencode('Halo Mitra Setia, saya ingin konsultasi software kasir & mesin kasir.') }}" target="_blank" class="h-10 px-4 bg-zinc-900 hover:bg-black text-white text-xs font-semibold rounded-full inline-flex items-center justify-center gap-2 transition-all w-full shadow-xs">
                        <svg class="size-4 fill-current shrink-0 text-emerald-400" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                        </svg>
                        <span>Chat WhatsApp</span>
                    </a>
                </div>
            </div>

            <div class="pt-8 border-t border-zinc-100 flex flex-col sm:flex-row justify-between items-center gap-3 text-zinc-400 text-xs">
                <div>&copy; {{ date('Y') }} Mitra Setia. Seluruh hak cipta dilindungi.</div>
                <div class="flex items-center gap-5">
                    <a href="{{ route('catalog') }}" class="hover:text-black transition-colors">Katalog</a>
                    <span>&bull;</span>
                    <a href="{{ route('order.track') }}" class="hover:text-black transition-colors">Lacak Pesanan</a>
                    <span>&bull;</span>
                    <a href="{{ route('admin.login') }}" class="hover:text-black transition-colors">Login Staf</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating Consultation Action (Minimalist & Non-Intrusive, Safe on Mobile Viewport) -->
    <a href="https://wa.me/6281234567890?text={{ urlencode('Halo Mitra Setia, saya ingin konsultasi software kasir POS Enterprise & mesin kasir.') }}" target="_blank" class="fixed bottom-5 right-4 sm:bottom-6 sm:right-6 z-40 bg-zinc-950/90 hover:bg-black text-white px-3.5 py-2.5 sm:px-4 sm:py-2.5 rounded-full shadow-xl shadow-zinc-950/15 border border-zinc-800/40 text-xs font-semibold flex items-center gap-2 backdrop-blur-md transition-all hover:scale-105 active:scale-95 group" title="Konsultasi WhatsApp">
        <svg class="size-4 fill-current text-emerald-400 group-hover:scale-110 transition-transform" viewBox="0 0 24 24">
            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
        </svg>
        <span class="hidden sm:inline">Konsultasi WA</span>
        <span class="sm:hidden">WA</span>
        <span class="size-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
    </a>
</body>
</html>
