<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan - Jaya Maju POS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            .no-print { display: none !important; }
            body { background: white !important; padding: 0 !important; color: black !important; }
            @page { size: A4 portrait; margin: 1.5cm; }
        }
    </style>
</head>
<body class="bg-slate-100 p-8 text-slate-800 text-xs font-sans">

    <!-- Action Bar -->
    <div class="no-print max-w-4xl mx-auto mb-6 flex items-center justify-between bg-white p-4 rounded-xl shadow-sm border border-slate-200">
        <div>
            <h2 class="font-bold text-sm text-slate-800">Pratinjau Cetak Laporan Penjualan (A4 / PDF)</h2>
            <p class="text-xs text-slate-500">Gunakan fitur print browser untuk mencetak langsung atau simpan sebagai PDF.</p>
        </div>
        <div class="flex gap-2">
            <button onclick="window.print()" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-bold flex items-center gap-1.5 shadow transition-all">
                Cetak / Simpan PDF
            </button>
            <button onclick="window.close()" class="px-4 py-2.5 bg-slate-200 hover:bg-slate-300 text-slate-700 rounded-xl font-bold transition-all">
                Tutup
            </button>
        </div>
    </div>

    <!-- Printable Paper Area -->
    <div class="max-w-4xl mx-auto bg-white p-10 rounded-2xl shadow-sm border border-slate-200">
        
        <!-- Header Laporan -->
        <div class="flex justify-between items-start pb-6 border-b-2 border-slate-900 mb-6">
            <div>
                <h1 class="text-2xl font-black tracking-tight text-slate-900">JAYA MAJU POS</h1>
                <p class="text-xs font-semibold text-slate-600 mt-1">Penyedia Perlengkapan Kasir & Solusi Bisnis Retail</p>
                <p class="text-[11px] text-slate-500">Jl. Babarsari No. 12, Sleman, D.I. Yogyakarta | Telp: (0274) 555-1234</p>
            </div>
            <div class="text-right">
                <span class="text-sm font-black uppercase tracking-wider text-slate-900 block">LAPORAN PENJUALAN</span>
                <p class="text-[11px] text-slate-500 mt-1">Tanggal Cetak: {{ now()->translatedFormat('d F Y, H:i') }}</p>
                @if(!empty($filters['start_date']) || !empty($filters['end_date']))
                    <p class="text-[11px] font-bold text-slate-700 mt-0.5">
                        Periode: {{ $filters['start_date'] ?? 'Awal' }} s/d {{ $filters['end_date'] ?? 'Hari ini' }}
                    </p>
                @endif
            </div>
        </div>

        <!-- Ringkasan Eksekutif -->
        <div class="grid grid-cols-3 gap-4 mb-6">
            <div class="p-3 bg-slate-50 rounded-lg border border-slate-200">
                <p class="text-[10px] font-bold uppercase text-slate-500">Total Transaksi</p>
                <p class="text-base font-black text-slate-900 mt-1">{{ $transactions->count() }} Transaksi</p>
            </div>
            <div class="p-3 bg-slate-50 rounded-lg border border-slate-200">
                <p class="text-[10px] font-bold uppercase text-slate-500">Total Produk Terjual</p>
                <p class="text-base font-black text-slate-900 mt-1">{{ $totalItemsSold }} Unit</p>
            </div>
            <div class="p-3 bg-slate-50 rounded-lg border border-slate-200">
                <p class="text-[10px] font-bold uppercase text-slate-500">Total Penerimaan Omzet</p>
                <p class="text-base font-black text-emerald-700 mt-1">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</p>
            </div>
        </div>

        <!-- Tabel Data Transaksi -->
        <table class="w-full text-left border-collapse mb-8">
            <thead>
                <tr class="border-y-2 border-slate-800 bg-slate-50">
                    <th class="py-2.5 px-3 font-bold uppercase text-[10px] text-slate-700">No. Faktur</th>
                    <th class="py-2.5 px-3 font-bold uppercase text-[10px] text-slate-700">Waktu</th>
                    <th class="py-2.5 px-3 font-bold uppercase text-[10px] text-slate-700">Kasir</th>
                    <th class="py-2.5 px-3 font-bold uppercase text-[10px] text-slate-700">Pelanggan</th>
                    <th class="py-2.5 px-3 font-bold uppercase text-[10px] text-slate-700">Metode</th>
                    <th class="py-2.5 px-3 font-bold uppercase text-[10px] text-slate-700 text-right">Total (IDR)</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200">
                @forelse ($transactions as $t)
                    <tr>
                        <td class="py-2 px-3 font-mono font-bold">{{ $t->invoice_number }}</td>
                        <td class="py-2 px-3">{{ $t->created_at->format('d/m/Y H:i') }}</td>
                        <td class="py-2 px-3">{{ $t->cashier?->name ?? 'Kasir' }}</td>
                        <td class="py-2 px-3">{{ $t->customer_name }}</td>
                        <td class="py-2 px-3 uppercase">{{ $t->payment_method }}</td>
                        <td class="py-2 px-3 text-right font-bold">{{ number_format($t->total_amount, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-6 text-center text-slate-400">Tidak ada transaksi tercatat pada filter ini.</td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr class="border-t-2 border-slate-800 font-black text-sm">
                    <td colspan="5" class="py-3 px-3 text-right uppercase">TOTAL KESELURUHAN:</td>
                    <td class="py-3 px-3 text-right text-emerald-800">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>

        <!-- Kolom Tanda Tangan Dokumen Resmi -->
        <div class="grid grid-cols-2 gap-8 pt-8 mt-12 border-t border-slate-200 text-center">
            <div>
                <p class="text-[11px] text-slate-500 mb-16">Dibuat & Diverifikasi Oleh (Kasir / Staf):</p>
                <div class="border-b border-slate-400 w-48 mx-auto"></div>
                <p class="text-xs font-bold text-slate-800 mt-2">{{ Auth::user()->name }}</p>
                <p class="text-[10px] text-slate-400">Staf Jaya Maju POS</p>
            </div>
            <div>
                <p class="text-[11px] text-slate-500 mb-16">Mengetahui (Pimpinan / Administrator):</p>
                <div class="border-b border-slate-400 w-48 mx-auto"></div>
                <p class="text-xs font-bold text-slate-800 mt-2">Manager Operasional</p>
                <p class="text-[10px] text-slate-400">Jaya Maju Toko</p>
            </div>
        </div>
    </div>
</body>
</html>
