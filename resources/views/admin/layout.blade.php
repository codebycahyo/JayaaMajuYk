<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Jaya Maju POS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet" />
    <script>
        tailwind.config = {
            theme: {
                extend: { colors: { primary: '#0E3481', secondary: '#00BFA6' } }
            }
        }
    </script>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Inter", "Helvetica Neue", Arial, sans-serif; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen text-slate-800">

    <div class="flex min-h-screen">
        <!-- Sidebar Navigation -->
        <aside class="w-64 bg-slate-900 text-white flex flex-col fixed h-full z-20">
            <div class="p-6 border-b border-slate-800">
                <div class="flex items-center gap-3">
                    <div class="size-9 bg-primary rounded-lg flex items-center justify-center font-bold text-sm text-white">
                        JM
                    </div>
                    <div>
                        <h1 class="text-base font-bold tracking-tight leading-none text-white">JAYA MAJU YK</h1>
                        <p class="text-slate-400 text-[11px] mt-0.5">Sistem Admin & Kasir</p>
                    </div>
                </div>

                @auth
                    <div class="mt-4 px-3 py-2.5 bg-slate-800/80 rounded-xl border border-slate-700/60 flex items-center justify-between">
                        <div class="truncate mr-2">
                            <p class="text-[10px] text-slate-400 font-medium">Akun Aktif:</p>
                            <p class="text-xs font-bold text-white truncate">{{ Auth::user()->name }}</p>
                        </div>
                        <span class="text-[10px] font-black uppercase tracking-wider px-2 py-0.5 rounded-md {{ Auth::user()->isAdmin() ? 'bg-amber-500/20 text-amber-300 border border-amber-500/30' : 'bg-emerald-500/20 text-emerald-300 border border-emerald-500/30' }}">
                            {{ Auth::user()->role }}
                        </span>
                    </div>
                @endauth
            </div>

            <!-- Navigation Links -->
            <nav class="flex-1 p-4 space-y-1.5 overflow-y-auto text-xs">
                <!-- POS Shortcut -->
                <a href="{{ route('pos.index') }}" class="flex items-center gap-2.5 px-3.5 py-3 rounded-lg bg-emerald-700 hover:bg-emerald-800 text-white font-bold transition-colors mb-4 shadow-xs">
                    <span class="material-symbols-outlined text-xl">point_of_sale</span>
                    <span>Buka Mesin POS</span>
                </a>

                @if(Auth::user()?->isAdmin())
                    <div class="pt-2 pb-1 px-3 text-[10px] font-black uppercase tracking-wider text-slate-500">Katalog & Data</div>

                    <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl {{ request()->routeIs('admin.products.*') ? 'bg-primary text-white shadow-md shadow-primary/30' : 'text-slate-400 hover:bg-white/5 hover:text-white' }} font-semibold text-sm transition-all">
                        <span class="material-symbols-outlined text-lg">inventory_2</span> Produk & Stok
                    </a>

                    <div class="pt-4 pb-1 px-3 text-[10px] font-black uppercase tracking-wider text-slate-500">Laporan & Pengguna</div>

                    <a href="{{ route('admin.reports.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl {{ request()->routeIs('admin.reports.*') ? 'bg-primary text-white shadow-md shadow-primary/30' : 'text-slate-400 hover:bg-white/5 hover:text-white' }} font-semibold text-sm transition-all">
                        <span class="material-symbols-outlined text-lg">bar_chart</span> Laporan Penjualan
                    </a>

                    <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl {{ request()->routeIs('admin.users.*') ? 'bg-primary text-white shadow-md shadow-primary/30' : 'text-slate-400 hover:bg-white/5 hover:text-white' }} font-semibold text-sm transition-all">
                        <span class="material-symbols-outlined text-lg">group</span> Kelola Pengguna
                    </a>

                    <a href="{{ route('admin.logs.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl {{ request()->routeIs('admin.logs.*') ? 'bg-primary text-white shadow-md shadow-primary/30' : 'text-slate-400 hover:bg-white/5 hover:text-white' }} font-semibold text-sm transition-all">
                        <span class="material-symbols-outlined text-lg">history</span> Log Aktivitas
                    </a>
                @endif

                <div class="pt-4 pb-1 px-3 text-[10px] font-black uppercase tracking-wider text-slate-500">Pengaturan Akun</div>

                <a href="{{ route('profile.password') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl {{ request()->routeIs('profile.password') ? 'bg-primary text-white shadow-md shadow-primary/30' : 'text-slate-400 hover:bg-white/5 hover:text-white' }} font-semibold text-sm transition-all">
                    <span class="material-symbols-outlined text-lg">lock_reset</span> Ubah Kata Sandi
                </a>

                <div class="pt-4 mt-4 border-t border-slate-800 space-y-1">
                    <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-400 hover:bg-white/5 hover:text-white transition-all text-xs">
                        <span class="material-symbols-outlined text-base">storefront</span> Lihat Toko Publik
                    </a>

                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 rounded-xl text-red-400 hover:bg-red-500/10 hover:text-red-300 transition-all font-semibold text-xs">
                            <span class="material-symbols-outlined text-base">logout</span> Keluar Sesi
                        </button>
                    </form>
                </div>
            </nav>
        </aside>

        <!-- Main Content Area -->
        <main class="ml-64 flex-1 p-8 min-h-screen">
            <div class="max-w-6xl mx-auto">
                @if(session('success'))
                    <div class="bg-green-50 border border-green-200 text-green-800 px-6 py-4 rounded-2xl mb-6 flex items-center gap-3 shadow-sm">
                        <span class="material-symbols-outlined text-green-600">check_circle</span>
                        <span class="font-semibold text-sm">{{ session('success') }}</span>
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-50 border border-red-200 text-red-800 px-6 py-4 rounded-2xl mb-6 flex items-center gap-3 shadow-sm">
                        <span class="material-symbols-outlined text-red-600">error</span>
                        <span class="font-semibold text-sm">{{ session('error') }}</span>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

</body>
</html>
