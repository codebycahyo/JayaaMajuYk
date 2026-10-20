<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerCheckoutRequest;
use App\Models\Product;
use App\Models\Transaction;
use App\Services\AuditLogger;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    /**
     * Tampilkan halaman checkout formulir data pemesan (tanpa pemilihan kurir & metode pembayaran).
     */
    public function index(): View|RedirectResponse
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'Keranjang belanja Anda masih kosong.');
        }

        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['qty'];
        }

        return view('checkout', compact('cart', 'subtotal'));
    }

    /**
     * Simpan transaksi pemesanan e-commerce lalu arahkan konfirmasi langsung ke WhatsApp.
     */
    public function store(CustomerCheckoutRequest $request): RedirectResponse
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'Keranjang belanja Anda kosong.');
        }

        $validated = $request->validated();

        try {
            DB::beginTransaction();

            $calculatedSubtotal = 0;
            $itemsToCreate = [];

            foreach ($cart as $item) {
                $product = Product::lockForUpdate()->find($item['id']);

                if (!$product) {
                    throw new \Exception("Produk '{$item['name']}' tidak ditemukan atau sudah tidak tersedia.");
                }

                $qty = (int) $item['qty'];

                if ($product->stock < $qty) {
                    throw new \Exception("Stok tidak mencukupi untuk '{$product->name}'. Tersisa: {$product->stock} unit.");
                }

                $lineSubtotal = $product->price * $qty;
                $calculatedSubtotal += $lineSubtotal;

                // Kurangi stok produk secara langsung
                $product->decrement('stock', $qty);

                if ($product->stock <= 0) {
                    $product->update(['is_ready_stock' => false]);
                }

                $itemsToCreate[] = [
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'price' => $product->price,
                    'qty' => $qty,
                    'subtotal' => $lineSubtotal,
                ];
            }

            $totalAmount = $calculatedSubtotal;
            $invoiceNumber = 'INV-EC-' . date('Ymd') . '-' . strtoupper(Str::random(5));
            $fullAddress = trim("{$validated['customer_address']}, {$validated['city']}" 
                . (!empty($validated['province']) ? ", {$validated['province']}" : '') 
                . (!empty($validated['postal_code']) ? " ({$validated['postal_code']})" : ''));

            $transaction = Transaction::create([
                'invoice_number' => $invoiceNumber,
                'type' => 'online',
                'customer_name' => $validated['customer_name'],
                'customer_phone' => $validated['customer_phone'],
                'customer_address' => $fullAddress,
                'shipping_courier' => 'Konfirmasi via WhatsApp',
                'shipping_cost' => 0,
                'subtotal' => $calculatedSubtotal,
                'discount' => 0,
                'tax' => 0,
                'total_amount' => $totalAmount,
                'paid_amount' => 0,
                'change_amount' => 0,
                'payment_method' => 'WhatsApp Direct',
                'payment_status' => 'unpaid',
                'order_status' => 'pending',
                'status' => 'pending',
                'notes' => $validated['notes'] ?? null,
            ]);

            foreach ($itemsToCreate as $item) {
                $transaction->items()->create($item);
            }

            AuditLogger::log('ONLINE_ORDER_CREATED', "Pesanan online baru {$invoiceNumber} senilai Rp " . number_format($totalAmount, 0, ',', '.') . " diterima dari {$transaction->customer_name} via WhatsApp.", [
                'invoice_number' => $invoiceNumber,
                'customer_phone' => $transaction->customer_phone,
                'total_amount' => $totalAmount,
            ]);

            DB::commit();

            // Kosongkan keranjang belanja setelah data tercatat
            session()->forget('cart');

            // Format pesan konfirmasi WhatsApp
            $whatsappMessage = "Halo Admin Jaya Maju POS, saya ingin mengonfirmasi pesanan saya:\n\n"
                . "• *No. Invoice:* {$invoiceNumber}\n"
                . "• *Nama Penerima:* {$transaction->customer_name}\n"
                . "• *No. WhatsApp:* {$transaction->customer_phone}\n"
                . "• *Alamat:* {$fullAddress}\n";
            
            if (!empty($validated['notes'])) {
                $whatsappMessage .= "• *Catatan:* {$validated['notes']}\n";
            }

            $whatsappMessage .= "\n*Rincian Hardware Dipesan:*\n";
            foreach ($itemsToCreate as $item) {
                $whatsappMessage .= "- {$item['product_name']} ({$item['qty']}x) : Rp " . number_format($item['subtotal'], 0, ',', '.') . "\n";
            }
            $whatsappMessage .= "\n*Total Belanja:* Rp " . number_format($totalAmount, 0, ',', '.') . "\n\n"
                . "Mohon informasi nomor rekening pembayaran dan opsi pengirimannya. Terima kasih!";

            $whatsappUrl = "https://wa.me/6281234567890?text=" . urlencode($whatsappMessage);

            return redirect()->route('order.success', $invoiceNumber);
        } catch (\Throwable $e) {
            DB::rollBack();

            Log::error('Customer Checkout Failed: ' . $e->getMessage(), [
                'exception' => $e,
            ]);

            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    /**
     * Halaman sukses pesanan dengan tombol konfirmasi WhatsApp dan auto-redirect ke WhatsApp.
     */
    public function success(string $invoiceNumber): View
    {
        $order = Transaction::with('items')
            ->where('invoice_number', $invoiceNumber)
            ->firstOrFail();

        $whatsappMessage = "Halo Admin Jaya Maju POS, saya ingin mengonfirmasi pesanan saya:\n\n"
            . "• *No. Invoice:* {$order->invoice_number}\n"
            . "• *Nama Penerima:* {$order->customer_name}\n"
            . "• *No. WhatsApp:* {$order->customer_phone}\n"
            . "• *Alamat:* {$order->customer_address}\n";

        if (!empty($order->notes)) {
            $whatsappMessage .= "• *Catatan:* {$order->notes}\n";
        }

        $whatsappMessage .= "\n*Rincian Hardware Dipesan:*\n";
        foreach ($order->items as $item) {
            $whatsappMessage .= "- {$item->product_name} ({$item->qty}x) : Rp " . number_format($item->subtotal, 0, ',', '.') . "\n";
        }
        $whatsappMessage .= "\n*Total Belanja:* Rp " . number_format($order->total_amount, 0, ',', '.') . "\n\n"
            . "Mohon informasi nomor rekening pembayaran dan opsi pengirimannya. Terima kasih!";

        $whatsappUrl = "https://wa.me/6281234567890?text=" . urlencode($whatsappMessage);

        return view('order-success', compact('order', 'whatsappUrl'));
    }

    /**
     * Halaman pelacakan pesanan publik untuk mengecek status pesanan pelanggan.
     */
    public function track(Request $request): View
    {
        $order = null;
        $search = trim($request->input('q', ''));

        if (!empty($search)) {
            $order = Transaction::with('items')
                ->where(function ($query) use ($search) {
                    $query->where('invoice_number', $search)
                          ->orWhere('customer_phone', $search);
                })
                ->latest()
                ->first();
        }

        return view('track-order', compact('order', 'search'));
    }
}
