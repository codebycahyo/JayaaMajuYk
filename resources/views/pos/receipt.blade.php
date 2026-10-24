<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Transaksi - {{ $transaction->invoice_number }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            body { margin: 0; padding: 0; background: white; }
            .no-print { display: none !important; }
            .receipt-box { border: none !important; box-shadow: none !important; width: 100% !important; max-width: 100% !important; }
        }
        @page {
            margin: 0;
            size: auto;
        }
        .receipt-font {
            font-family: 'Courier New', Courier, monospace;
        }
    </style>
</head>
<body class="bg-slate-100 min-h-screen p-4 flex flex-col items-center justify-center text-slate-900 receipt-font text-xs">

    <!-- Action Buttons for Screen View -->
    <div class="no-print mb-4 flex gap-3">
        <button onclick="window.print()" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-bold flex items-center gap-1.5 shadow transition-all font-sans">
            Cetak Struk
        </button>
        <button onclick="window.close()" class="px-5 py-2.5 bg-slate-300 hover:bg-slate-400 text-slate-800 rounded-xl font-bold transition-all font-sans">
            Tutup
        </button>
    </div>

    <!-- Thermal Receipt Paper (58mm / 80mm layout) -->
    <div class="receipt-box w-full max-w-[340px] bg-white p-6 rounded-2xl shadow-md border border-slate-200">
        <!-- Store Header -->
        <div class="text-center mb-4 pb-3 border-b border-dashed border-slate-300">
            <h2 class="text-base font-black tracking-tight uppercase">MITRA SETIA POS</h2>
            <p class="text-[11px] text-slate-600 mt-0.5">Software & Mesin Kasir Minimarket</p>
            <p class="text-[10px] text-slate-500">Yogyakarta, Indonesia</p>
            <p class="text-[10px] text-slate-500">WhatsApp: {{ config('shop.whatsapp_number', '081915444983') }}</p>
        </div>

        <!-- Transaction Details -->
        <div class="space-y-1 mb-3 text-[11px] pb-3 border-b border-dashed border-slate-300">
            <div class="flex justify-between">
                <span>No. Faktur:</span>
                <span class="font-bold">{{ $transaction->invoice_number }}</span>
            </div>
            <div class="flex justify-between">
                <span>Tanggal:</span>
                <span>{{ $transaction->created_at->translatedFormat('d/m/Y H:i') }}</span>
            </div>
            <div class="flex justify-between">
                <span>Kasir:</span>
                <span>{{ $transaction->cashier?->name ?? 'Kasir' }}</span>
            </div>
            <div class="flex justify-between">
                <span>Pelanggan:</span>
                <span>{{ $transaction->customer_name }}</span>
            </div>
            <div class="flex justify-between">
                <span>Pembayaran:</span>
                <span class="uppercase font-bold">{{ $transaction->payment_method }}</span>
            </div>
        </div>

        <!-- Items Table -->
        <div class="space-y-2 mb-3 pb-3 border-b border-dashed border-slate-300 text-[11px]">
            @foreach ($transaction->items as $item)
                <div>
                    <div class="font-bold">{{ $item->product_name }}</div>
                    <div class="flex justify-between text-slate-600">
                        <span>{{ $item->qty }} &times; {{ number_format($item->price, 0, ',', '.') }}</span>
                        <span class="font-bold text-slate-900">{{ number_format($item->subtotal, 0, ',', '.') }}</span>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Summary Calculation -->
        <div class="space-y-1 mb-4 text-[11px]">
            <div class="flex justify-between text-slate-600">
                <span>Subtotal:</span>
                <span>Rp {{ number_format($transaction->subtotal, 0, ',', '.') }}</span>
            </div>
            @if($transaction->discount > 0)
                <div class="flex justify-between text-red-600">
                    <span>Diskon:</span>
                    <span>- Rp {{ number_format($transaction->discount, 0, ',', '.') }}</span>
                </div>
            @endif
            <div class="flex justify-between text-sm font-black pt-1 border-t border-slate-200">
                <span>TOTAL:</span>
                <span>Rp {{ number_format($transaction->total_amount, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between text-slate-600 pt-1">
                <span>Bayar:</span>
                <span>Rp {{ number_format($transaction->paid_amount, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between font-bold text-slate-900">
                <span>Kembalian:</span>
                <span>Rp {{ number_format($transaction->change_amount, 0, ',', '.') }}</span>
            </div>
        </div>

        <!-- Footer Notice -->
        <div class="text-center pt-3 border-t border-dashed border-slate-300 text-[10px] text-slate-500 space-y-1">
            <p class="font-bold text-slate-700">*** TERIMA KASIH ***</p>
            <p>Barang yang sudah dibeli tidak dapat ditukar atau dikembalikan.</p>
            <p class="text-[9px] text-slate-400 mt-2">Dicetak oleh Sistem Jaya Maju POS</p>
        </div>
    </div>

    <script>
        // Otomatis picu dialog cetak saat halaman dimuat
        window.addEventListener('load', function() {
            setTimeout(function() {
                window.print();
            }, 300);
        });
    </script>
</body>
</html>
