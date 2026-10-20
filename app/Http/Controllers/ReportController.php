<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionItem;
use App\Services\AuditLogger;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ReportController extends Controller
{
    /**
     * Dashboard analitik penjualan lengkap dengan visual tren, peringatan stok, dan filter.
     */
    public function index(Request $request): View
    {
        $today = Carbon::today();
        $startOfWeek = Carbon::now()->startOfWeek();
        $startOfMonth = Carbon::now()->startOfMonth();

        // 1. Metrik Omzet
        $todayRevenue = Transaction::where('status', 'completed')
            ->whereDate('created_at', $today)
            ->sum('total_amount');

        $weekRevenue = Transaction::where('status', 'completed')
            ->where('created_at', '>=', $startOfWeek)
            ->sum('total_amount');

        $monthRevenue = Transaction::where('status', 'completed')
            ->where('created_at', '>=', $startOfMonth)
            ->sum('total_amount');

        $totalRevenue = Transaction::where('status', 'completed')->sum('total_amount');
        $posRevenue = Transaction::where('status', 'completed')->where('type', 'pos')->sum('total_amount');
        $onlineRevenue = Transaction::where('status', 'completed')->where('type', 'online')->sum('total_amount');

        $totalTransactionsCount = Transaction::where('status', 'completed')->count();

        // 2. Data Tren Penjualan 7 Hari Terakhir (untuk Visual Chart)
        $last7Days = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $daySum = Transaction::where('status', 'completed')
                ->whereDate('created_at', $date)
                ->sum('total_amount');
            $last7Days[] = [
                'day' => $date->translatedFormat('D, d M'),
                'amount' => (int) $daySum,
            ];
        }

        // 3. Peringatan Stok Menipis (Low Stock Alert <= 10 unit)
        $lowStockProducts = Product::where('stock', '<=', 10)
            ->orderBy('stock', 'asc')
            ->take(6)
            ->get();

        // 4. Daftar 5 Produk Terlaris
        $topProducts = TransactionItem::select(
                'product_name',
                DB::raw('SUM(qty) as total_qty'),
                DB::raw('SUM(subtotal) as total_sales')
            )
            ->groupBy('product_name')
            ->orderByDesc('total_qty')
            ->take(5)
            ->get();

        // 5. Query Riwayat Transaksi Berfilter
        $filters = $request->only(['start_date', 'end_date', 'type', 'payment_method', 'status', 'search']);
        $transactions = Transaction::with(['cashier', 'items'])
            ->filter($filters)
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.reports.index', compact(
            'todayRevenue',
            'weekRevenue',
            'monthRevenue',
            'totalRevenue',
            'posRevenue',
            'onlineRevenue',
            'totalTransactionsCount',
            'last7Days',
            'lowStockProducts',
            'topProducts',
            'transactions',
            'filters'
        ));
    }

    /**
     * Ekspor laporan transaksi ke format file Excel / CSV (RFC-4180 dengan UTF-8 BOM).
     */
    public function exportCsv(Request $request): StreamedResponse
    {
        $filters = $request->only(['start_date', 'end_date', 'type', 'payment_method', 'status', 'search']);
        $fileName = 'Laporan-Penjualan-JayaMaju-' . date('Ymd-His') . '.csv';

        AuditLogger::log('EXPORT_REPORT', 'Mengekspor data transaksi penjualan ke format file CSV.');

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"{$fileName}\"",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        $callback = function () use ($filters) {
            $handle = fopen('php://output', 'w');

            // UTF-8 BOM untuk kompatibilitas Microsoft Excel
            fputs($handle, "\xEF\xBB\xBF");

            fputcsv($handle, [
                'No Faktur',
                'Kanal (POS / Online)',
                'Tanggal & Waktu',
                'Kasir / Staf',
                'Pelanggan',
                'No. Telepon',
                'Kurir Pengiriman',
                'Ongkir (IDR)',
                'Metode Pembayaran',
                'Status Bayar',
                'Status Pesanan',
                'Subtotal (IDR)',
                'Total Akhir (IDR)',
                'Rincian Produk Terjual',
            ]);

            Transaction::with(['cashier', 'items'])
                ->filter($filters)
                ->orderBy('created_at', 'desc')
                ->chunk(100, function ($transactions) use ($handle) {
                    foreach ($transactions as $t) {
                        $itemsSummary = $t->items->map(function ($item) {
                            return "{$item->product_name} (x{$item->qty})";
                        })->implode('; ');

                        fputcsv($handle, [
                            $t->invoice_number,
                            strtoupper($t->type ?? 'POS'),
                            $t->created_at->format('Y-m-d H:i:s'),
                            $t->cashier?->name ?? 'Online Checkout',
                            $t->customer_name,
                            $t->customer_phone ?? '-',
                            $t->shipping_courier ?? '-',
                            $t->shipping_cost ?? 0,
                            strtoupper($t->payment_method),
                            strtoupper($t->payment_status ?? 'PAID'),
                            strtoupper($t->order_status ?? $t->status),
                            $t->subtotal,
                            $t->total_amount,
                            $itemsSummary,
                        ]);
                    }
                });

            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Tampilan cetak laporan A4 / PDF dengan ringkasan kanal dan tabel transaksi lengkap.
     */
    public function printReport(Request $request): View
    {
        $filters = $request->only(['start_date', 'end_date', 'type', 'payment_method', 'status', 'search']);
        $transactions = Transaction::with(['cashier', 'items'])
            ->filter($filters)
            ->latest()
            ->get();

        $totalRevenue = $transactions->where('status', 'completed')->sum('total_amount');
        $totalItemsSold = $transactions->where('status', 'completed')->sum(function ($t) {
            return $t->items->sum('qty');
        });

        return view('admin.reports.print', compact('transactions', 'filters', 'totalRevenue', 'totalItemsSold'));
    }
}
