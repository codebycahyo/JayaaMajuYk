@extends('admin.layout')

@section('title', 'Laporan Penjualan & Analitik')

@section('content')
<div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
    <div>
        <h1 class="text-3xl font-black text-slate-800 tracking-tight">Laporan & Analitik Penjualan</h1>
        <p class="text-slate-500 mt-2 text-sm">Pantau omzet berkala, tren 7 hari, performa POS vs Online, dan kontrol inventaris stok</p>
    </div>
    <div class="flex items-center gap-2 self-start md:self-auto">
        <a href="{{ route('admin.reports.export.csv', request()->query()) }}" class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2.5 rounded-xl font-bold text-xs shadow-md shadow-emerald-700/20 flex items-center gap-1.5 transition-all">
            <span class="material-symbols-outlined text-sm">table_view</span> Ekspor Excel/CSV
        </a>
        <a href="{{ route('admin.reports.print', request()->query()) }}" target="_blank" class="bg-slate-800 hover:bg-slate-900 text-white px-4 py-2.5 rounded-xl font-bold text-xs shadow-md flex items-center gap-1.5 transition-all">
            <span class="material-symbols-outlined text-sm">print</span> Cetak Laporan PDF
        </a>
    </div>
</div>

<!-- 1. Ringkasan Kartu Metrik Omzet -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
    <!-- Omzet Hari Ini -->
    <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm flex items-center gap-4">
        <div class="size-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
            <span class="material-symbols-outlined text-2xl">today</span>
        </div>
        <div>
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Omzet Hari Ini</p>
            <h3 class="text-xl font-black text-slate-800 mt-0.5">Rp {{ number_format($todayRevenue, 0, ',', '.') }}</h3>
        </div>
    </div>

    <!-- Omzet Minggu Ini -->
    <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm flex items-center gap-4">
        <div class="size-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
            <span class="material-symbols-outlined text-2xl">calendar_view_week</span>
        </div>
        <div>
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Omzet Minggu Ini</p>
            <h3 class="text-xl font-black text-slate-800 mt-0.5">Rp {{ number_format($weekRevenue, 0, ',', '.') }}</h3>
        </div>
    </div>

    <!-- Omzet Bulan Ini -->
    <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm flex items-center gap-4">
        <div class="size-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0">
            <span class="material-symbols-outlined text-2xl">calendar_month</span>
        </div>
        <div>
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Omzet Bulan Ini</p>
            <h3 class="text-xl font-black text-slate-800 mt-0.5">Rp {{ number_format($monthRevenue, 0, ',', '.') }}</h3>
        </div>
    </div>

    <!-- Total Transaksi Sukses -->
    <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm flex items-center gap-4">
        <div class="size-12 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center shrink-0">
            <span class="material-symbols-outlined text-2xl">receipt_long</span>
        </div>
        <div>
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Total Transaksi</p>
            <h3 class="text-xl font-black text-slate-800 mt-0.5">{{ number_format($totalTransactionsCount, 0, ',', '.') }}</h3>
        </div>
    </div>
</div>

<!-- 2. Visual Tren Penjualan 7 Hari & Channel Breakdown (POS vs Online) -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mb-8">
    <!-- 7-Day Revenue Trend (Col 8) -->
    <div class="lg:col-span-8 bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
        <div class="flex items-center justify-between mb-6 pb-3 border-b border-slate-100">
            <div>
                <h3 class="font-black text-slate-800 text-base flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">show_chart</span>
                    Tren Omzet 7 Hari Terakhir
                </h3>
                <p class="text-xs text-slate-500 mt-0.5">Grafik performa total penjualan per hari</p>
            </div>
            <span class="text-xs font-bold text-primary bg-primary/10 px-3 py-1 rounded-full">
                7 Hari Terakhir
            </span>
        </div>

        @php
            $maxAmount = max(array_column($last7Days, 'amount')) ?: 1;
        @endphp

        <!-- Bar Chart -->
        <div class="h-56 flex items-end justify-between gap-2 sm:gap-4 pt-6 px-2">
            @foreach ($last7Days as $dayData)
                @php
                    $percentage = max(8, round(($dayData['amount'] / $maxAmount) * 100));
                @endphp
                <div class="flex-1 flex flex-col items-center gap-2 h-full justify-end group">
                    <!-- Tooltip -->
                    <div class="opacity-0 group-hover:opacity-100 transition-opacity bg-slate-900 text-white text-[10px] py-1 px-2 rounded font-bold whitespace-nowrap shadow-lg pointer-events-none mb-1">
                        Rp {{ number_format($dayData['amount'], 0, ',', '.') }}
                    </div>

                    <!-- Bar -->
                    <div class="w-full max-w-[42px] bg-gradient-to-t from-primary to-primary/70 rounded-t-lg transition-all duration-300 group-hover:brightness-110 group-hover:shadow-md"
                         style="height: {{ $percentage }}%;">
                    </div>

                    <!-- Label Day -->
                    <span class="text-[10px] font-bold text-slate-500 text-center truncate w-full mt-1">
                        {{ $dayData['day'] }}
                    </span>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Sales Channels Breakdown (Col 4) -->
    <div class="lg:col-span-4 bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex flex-col justify-between">
        <div>
            <h3 class="font-black text-slate-800 text-base flex items-center gap-2 pb-3 border-b border-slate-100">
                <span class="material-symbols-outlined text-emerald-600">pie_chart</span>
                Kanal Penjualan
            </h3>
            <p class="text-xs text-slate-500 mt-2 mb-6">Perbandingan kontribusi omzet kasir POS fisik dengan Storefront Online.</p>

            <div class="space-y-4">
                <!-- POS Offline -->
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-100">
                    <div class="flex items-center justify-between text-xs mb-1.5">
                        <span class="font-bold text-slate-700 flex items-center gap-1.5">
                            <span class="size-2.5 rounded-full bg-primary"></span>
                            Kasir POS Fisik
                        </span>
                        <span class="font-black text-slate-900">Rp {{ number_format($posRevenue, 0, ',', '.') }}</span>
                    </div>
                    @php
                        $posPercent = $totalRevenue > 0 ? round(($posRevenue / $totalRevenue) * 100) : 0;
                    @endphp
                    <div class="w-full bg-slate-200 h-2 rounded-full overflow-hidden">
                        <div class="bg-primary h-full rounded-full" style="width: {{ $posPercent }}%"></div>
                    </div>
                    <div class="text-[10px] text-slate-400 mt-1 text-right">{{ $posPercent }}% dari total omzet</div>
                </div>

                <!-- Online E-Commerce -->
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-100">
                    <div class="flex items-center justify-between text-xs mb-1.5">
                        <span class="font-bold text-slate-700 flex items-center gap-1.5">
                            <span class="size-2.5 rounded-full bg-emerald-500"></span>
                            Storefront Online
                        </span>
                        <span class="font-black text-slate-900">Rp {{ number_format($onlineRevenue, 0, ',', '.') }}</span>
                    </div>
                    @php
                        $onlinePercent = $totalRevenue > 0 ? round(($onlineRevenue / $totalRevenue) * 100) : 0;
                    @endphp
                    <div class="w-full bg-slate-200 h-2 rounded-full overflow-hidden">
                        <div class="bg-emerald-500 h-full rounded-full" style="width: {{ $onlinePercent }}%"></div>
                    </div>
                    <div class="text-[10px] text-slate-400 mt-1 text-right">{{ $onlinePercent }}% dari total omzet</div>
                </div>
            </div>
        </div>

        <div class="mt-4 pt-3 border-t border-slate-100 text-center">
            <span class="text-xs text-slate-400 font-medium">Akumulasi Omzet Bersih:</span>
            <div class="text-lg font-black text-slate-900 mt-0.5">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</div>
        </div>
    </div>
</div>

<!-- 3. Top Products & Low Stock Warnings -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mb-8">
    <!-- Produk Terlaris (Col 7) -->
    <div class="lg:col-span-7 bg-white rounded-2xl p-6 border border-slate-200 shadow-sm">
        <div class="flex items-center justify-between mb-4 pb-3 border-b border-slate-100">
            <h3 class="font-black text-slate-800 text-base flex items-center gap-2">
                <span class="material-symbols-outlined text-amber-500">trophy</span> 5 Produk Paling Laris
            </h3>
            <span class="text-xs font-bold text-slate-400">Total Kuantitas Terjual</span>
        </div>
        @if($topProducts->isEmpty())
            <p class="text-sm text-slate-400 text-center py-8">Belum ada riwayat produk terjual.</p>
        @else
            <div class="space-y-3">
                @foreach ($topProducts as $idx => $tp)
                    <div class="p-3 bg-slate-50/70 rounded-xl border border-slate-100 flex items-center justify-between gap-4">
                        <div class="flex items-center gap-3">
                            <span class="size-7 rounded-lg bg-primary/10 text-primary font-black text-xs flex items-center justify-center shrink-0">
                                #{{ $idx + 1 }}
                            </span>
                            <div>
                                <h4 class="font-bold text-slate-800 text-xs">{{ $tp->product_name }}</h4>
                                <span class="text-[11px] text-slate-400">Total Penjualan: Rp {{ number_format($tp->total_sales, 0, ',', '.') }}</span>
                            </div>
                        </div>
                        <div class="text-right shrink-0">
                            <span class="text-xs font-black text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-lg">
                                {{ $tp->total_qty }} Unit
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Peringatan Stok Menipis (Col 5) -->
    <div class="lg:col-span-5 bg-white rounded-2xl p-6 border border-slate-200 shadow-sm">
        <div class="flex items-center justify-between mb-4 pb-3 border-b border-slate-100">
            <h3 class="font-black text-slate-800 text-base flex items-center gap-2">
                <span class="material-symbols-outlined text-red-500">warning</span>
                Peringatan Stok Menipis
            </h3>
            <span class="text-xs font-bold text-red-600 bg-red-50 px-2.5 py-0.5 rounded-full">&le; 10 Unit</span>
        </div>

        @if($lowStockProducts->isEmpty())
            <div class="text-center py-8 text-slate-400 text-xs">
                <span class="material-symbols-outlined text-3xl text-emerald-500 mb-1">task_alt</span>
                <p class="font-bold text-slate-700">Semua Stok Aman</p>
                <p>Tidak ada produk yang berada di bawah ambang batas minimum.</p>
            </div>
        @else
            <div class="space-y-2.5">
                @foreach ($lowStockProducts as $lp)
                    <div class="p-3 rounded-xl border border-red-100 bg-red-50/40 flex items-center justify-between gap-3">
                        <div class="min-w-0">
                            <h4 class="font-bold text-slate-800 text-xs truncate">{{ $lp->name }}</h4>
                            <span class="text-[10px] text-slate-500">{{ $lp->category }} &bull; Rp {{ number_format($lp->price, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex items-center gap-2 shrink-0">
                            <span class="px-2 py-0.5 rounded-md text-[11px] font-black {{ $lp->stock <= 3 ? 'bg-red-600 text-white' : 'bg-amber-100 text-amber-800' }}">
                                Sisa {{ $lp->stock }}
                            </span>
                            <a href="{{ route('admin.products.edit', $lp->id) }}" class="size-7 rounded-lg bg-white border border-slate-200 hover:border-primary text-slate-600 hover:text-primary flex items-center justify-center transition-colors" title="Restok Produk">
                                <span class="material-symbols-outlined text-sm">edit</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

<!-- 4. Filter Riwayat Transaksi -->
<div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm mb-6">
    <form method="GET" action="{{ route('admin.reports.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-3 items-end">
        <div>
            <label class="block text-[11px] font-bold text-slate-500 mb-1">Dari Tanggal</label>
            <input 
                type="date" 
                name="start_date" 
                value="{{ request('start_date') }}" 
                class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs font-medium focus:outline-none focus:border-primary"
            >
        </div>
        <div>
            <label class="block text-[11px] font-bold text-slate-500 mb-1">Sampai Tanggal</label>
            <input 
                type="date" 
                name="end_date" 
                value="{{ request('end_date') }}" 
                class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs font-medium focus:outline-none focus:border-primary"
            >
        </div>
        <div>
            <label class="block text-[11px] font-bold text-slate-500 mb-1">Kanal / Tipe</label>
            <select name="type" class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs font-medium focus:outline-none focus:border-primary">
                <option value="all">Semua Kanal</option>
                <option value="pos" {{ request('type') === 'pos' ? 'selected' : '' }}>Kasir POS</option>
                <option value="online" {{ request('type') === 'online' ? 'selected' : '' }}>Online Store</option>
            </select>
        </div>
        <div>
            <label class="block text-[11px] font-bold text-slate-500 mb-1">Status</label>
            <select name="status" class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs font-medium focus:outline-none focus:border-primary">
                <option value="all">Semua Status</option>
                <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>Selesai</option>
                <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Menunggu</option>
                <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
            </select>
        </div>
        <div>
            <label class="block text-[11px] font-bold text-slate-500 mb-1">Kata Kunci</label>
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Faktur / Pelanggan..." 
                class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs font-medium focus:outline-none focus:border-primary"
            >
        </div>
        <div class="flex gap-2">
            <button type="submit" class="flex-1 bg-primary text-white font-bold py-2 rounded-xl text-xs hover:bg-opacity-90 transition-colors shadow-xs">
                Terapkan
            </button>
            @if(request()->hasAny(['start_date', 'end_date', 'type', 'status', 'search']))
                <a href="{{ route('admin.reports.index') }}" class="px-3 py-2 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-xl text-xs font-bold transition-colors flex items-center justify-center" title="Reset">
                    <span class="material-symbols-outlined text-sm">refresh</span>
                </a>
            @endif
        </div>
    </form>
</div>

<!-- 5. Tabel Transaksi -->
<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
    @if($transactions->isEmpty())
        <div class="p-12 text-center text-slate-400">
            <span class="material-symbols-outlined text-5xl mb-2 text-slate-300">receipt_long</span>
            <p class="font-bold text-slate-600">Tidak ada riwayat transaksi</p>
            <p class="text-xs text-slate-400 mt-1">Coba sesuaikan tanggal atau kriteria filter yang digunakan.</p>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[700px]">
                <thead class="bg-slate-50 border-b border-slate-100">
                    <tr>
                        <th class="p-4 text-xs font-bold uppercase text-slate-400 tracking-wider">No. Faktur</th>
                        <th class="p-4 text-xs font-bold uppercase text-slate-400 tracking-wider">Tanggal & Kanal</th>
                        <th class="p-4 text-xs font-bold uppercase text-slate-400 tracking-wider">Pelanggan / Kasir</th>
                        <th class="p-4 text-xs font-bold uppercase text-slate-400 tracking-wider">Metode Bayar</th>
                        <th class="p-4 text-xs font-bold uppercase text-slate-400 tracking-wider">Total</th>
                        <th class="p-4 text-xs font-bold uppercase text-slate-400 tracking-wider text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach ($transactions as $trx)
                    <tr class="hover:bg-slate-50/60 transition-colors">
                        <td class="p-4">
                            <span class="font-mono font-bold text-xs text-primary">{{ $trx->invoice_number }}</span>
                            <div class="text-[10px] text-slate-400 mt-0.5">{{ $trx->items->count() }} jenis hardware</div>
                        </td>
                        <td class="p-4 text-xs">
                            <div class="text-slate-700 font-medium">{{ $trx->created_at->translatedFormat('d M Y, H:i') }}</div>
                            <span class="inline-flex items-center gap-1 text-[10px] font-bold px-2 py-0.5 rounded-full mt-1 {{ $trx->type === 'online' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700' }}">
                                <span class="material-symbols-outlined text-[11px]">{{ $trx->type === 'online' ? 'public' : 'point_of_sale' }}</span>
                                {{ $trx->type === 'online' ? 'Online Store' : 'POS Kasir' }}
                            </span>
                        </td>
                        <td class="p-4">
                            <p class="text-xs font-bold text-slate-800">{{ $trx->customer_name }}</p>
                            @if($trx->type === 'online' && $trx->customer_phone)
                                <p class="text-[10px] text-emerald-600 font-mono">{{ $trx->customer_phone }}</p>
                            @else
                                <p class="text-[10px] text-slate-400">Kasir: {{ $trx->cashier?->name ?? 'Kasir Terhapus' }}</p>
                            @endif
                        </td>
                        <td class="p-4">
                            <span class="px-2.5 py-1 rounded-full text-[10px] font-black uppercase tracking-wider bg-slate-100 text-slate-700">
                                {{ str_replace('_', ' ', $trx->payment_method) }}
                            </span>
                        </td>
                        <td class="p-4 font-black text-slate-900 text-sm">
                            Rp {{ number_format($trx->total_amount, 0, ',', '.') }}
                            @if($trx->discount > 0)
                                <span class="block text-[10px] text-red-500 font-normal">Diskon: Rp {{ number_format($trx->discount, 0, ',', '.') }}</span>
                            @endif
                        </td>
                        <td class="p-4 text-right">
                            @if ($trx->type === 'online')
                                <a href="{{ route('order.success', $trx->invoice_number) }}" target="_blank" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg border border-slate-200 text-slate-600 hover:border-primary hover:text-primary transition-colors text-xs font-bold" title="Detail Order">
                                    <span class="material-symbols-outlined text-sm">visibility</span> Detail
                                </a>
                            @else
                                <a href="{{ route('pos.receipt', $trx->invoice_number) }}" target="_blank" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg border border-slate-200 text-slate-600 hover:border-primary hover:text-primary transition-colors text-xs font-bold" title="Cetak Nota">
                                    <span class="material-symbols-outlined text-sm">receipt</span> Nota
                                </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if($transactions->hasPages())
            <div class="p-4 border-t border-slate-100">
                {{ $transactions->links() }}
            </div>
        @endif
    @endif
</div>
@endsection
