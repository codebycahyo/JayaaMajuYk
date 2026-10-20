<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(): View
    {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }

        return view('cart', compact('cart', 'total'));
    }

    public function add(Request $request): RedirectResponse
    {
        $request->validate([
            'id' => ['required', 'string', 'exists:products,id'],
            'qty' => ['nullable', 'integer', 'min:1'],
        ]);

        $product = Product::findOrFail($request->input('id'));

        if ($product->stock <= 0) {
            return back()->with('error', "Maaf, stok produk '{$product->name}' sedang habis.");
        }

        $cart = session()->get('cart', []);
        $qtyToAdd = (int) $request->input('qty', 1);

        if (isset($cart[$product->id])) {
            $newQty = $cart[$product->id]['qty'] + $qtyToAdd;
            if ($newQty > $product->stock) {
                return back()->with('error', "Maksimal stok yang tersedia hanya {$product->stock} unit.");
            }
            $cart[$product->id]['qty'] = $newQty;
        } else {
            if ($qtyToAdd > $product->stock) {
                return back()->with('error', "Maksimal stok yang tersedia hanya {$product->stock} unit.");
            }
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'category' => $product->category,
                'qty' => $qtyToAdd,
                'price' => $product->price,
                'image' => $product->image,
                'stock' => $product->stock,
            ];
        }

        session()->put('cart', $cart);

        if ($request->has('buy_now')) {
            return redirect()->route('checkout');
        }

        return redirect()->route('cart')->with('success', "Produk '{$product->name}' berhasil ditambahkan ke keranjang!");
    }

    public function remove(Request $request): RedirectResponse
    {
        $id = $request->input('id');
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang.');
    }

    public function update(Request $request): RedirectResponse
    {
        $id = $request->input('id');
        $qty = (int) $request->input('qty');

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $product = Product::find($id);

            if ($qty <= 0) {
                unset($cart[$id]);
            } else {
                if ($product && $qty > $product->stock) {
                    return back()->with('error', "Stok maksimal yang tersedia untuk '{$product->name}' adalah {$product->stock} unit.");
                }
                $cart[$id]['qty'] = $qty;
            }

            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Keranjang belanja berhasil diperbarui.');
    }

    public function clear(): RedirectResponse
    {
        session()->forget('cart');
        return redirect()->route('cart')->with('success', 'Keranjang belanja telah dikosongkan.');
    }
}
