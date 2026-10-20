<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionItem;
use App\Services\AuditLogger;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PosController extends Controller
{
    /**
     * Tampilkan antarmuka kasir (POS interface).
     */
    public function index(Request $request): View
    {
        $products = Product::where('stock', '>', 0)
            ->orderBy('name')
            ->get();

        $categories = Product::distinct()->pluck('category');

        return view('pos.index', compact('products', 'categories'));
    }

    /**
     * Memproses checkout transaksi POS dengan manajemen stok otomatis (DB Transaction & Row Locking).
     */
    public function checkout(CheckoutRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $itemsData = $validated['items'];
        $discount = (int) ($validated['discount'] ?? 0);
        $paidAmount = (int) $validated['paid_amount'];
        $customerName = trim($validated['customer_name'] ?? 'Pelanggan Umum') ?: 'Pelanggan Umum';
        $paymentMethod = $validated['payment_method'];
        $notes = $validated['notes'] ?? null;

        try {
            DB::beginTransaction();

            $calculatedSubtotal = 0;
            $itemsToCreate = [];

            // Kunci baris produk dengan lockForUpdate untuk mencegah race condition pengurangan stok
            foreach ($itemsData as $item) {
                $product = Product::lockForUpdate()->find($item['id']);

                if (!$product) {
                    throw new \Exception("Produk dengan ID {$item['id']} tidak ditemukan.");
                }

                $qty = (int) $item['qty'];

                if ($product->stock < $qty) {
                    throw new \Exception("Stok tidak mencukupi untuk '{$product->name}'. Tersisa: {$product->stock}, Diminta: {$qty}.");
                }

                $subtotal = $product->price * $qty;
                $calculatedSubtotal += $subtotal;

                // Kurangi stok produk
                $product->decrement('stock', $qty);

                if ($product->stock <= 0) {
                    $product->update(['is_ready_stock' => false]);
                }

                $itemsToCreate[] = [
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'price' => $product->price,
                    'qty' => $qty,
                    'subtotal' => $subtotal,
                ];
            }

            $discount = min($discount, $calculatedSubtotal);
            $totalAmount = max(0, $calculatedSubtotal - $discount);

            if ($paidAmount < $totalAmount) {
                throw new \Exception('Uang pembayaran (Rp ' . number_format($paidAmount, 0, ',', '.') . ') kurang dari total tagihan (Rp ' . number_format($totalAmount, 0, ',', '.') . ').');
            }

            $changeAmount = $paidAmount - $totalAmount;

            // Generate nomor faktur unik: INV-YYYYMMDD-XXXX
            $datePrefix = date('Ymd');
            $uniqueCode = strtoupper(Str::random(5));
            $invoiceNumber = "INV-{$datePrefix}-{$uniqueCode}";

            $transaction = Transaction::create([
                'invoice_number' => $invoiceNumber,
                'user_id' => Auth::id(),
                'customer_name' => $customerName,
                'subtotal' => $calculatedSubtotal,
                'discount' => $discount,
                'tax' => 0,
                'total_amount' => $totalAmount,
                'paid_amount' => $paidAmount,
                'change_amount' => $changeAmount,
                'payment_method' => $paymentMethod,
                'status' => 'completed',
                'notes' => $notes,
            ]);

            foreach ($itemsToCreate as $item) {
                $transaction->items()->create($item);
            }

            AuditLogger::log('CREATE_TRANSACTION', "Transaksi POS berhasil: {$invoiceNumber} senilai Rp " . number_format($totalAmount, 0, ',', '.') . " oleh kasir " . Auth::user()->name, [
                'invoice_number' => $invoiceNumber,
                'total_amount' => $totalAmount,
                'items_count' => count($itemsToCreate),
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Transaksi berhasil diproses.',
                'invoice_number' => $invoiceNumber,
                'receipt_url' => route('pos.receipt', $invoiceNumber),
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();

            Log::error('POS Checkout Failed: ' . $e->getMessage(), [
                'exception' => $e,
                'user_id' => Auth::id(),
            ]);

            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 422);
        }
    }

    /**
     * Tampilan cetak nota / struk termal siap cetak (58mm/80mm format).
     */
    public function receipt(string $invoiceNumber): View
    {
        $transaction = Transaction::with(['items', 'cashier'])
            ->where('invoice_number', $invoiceNumber)
            ->firstOrFail();

        return view('pos.receipt', compact('transaction'));
    }
}
