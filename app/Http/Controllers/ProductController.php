<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Tampilkan halaman depan (Homepage) dengan branding eksklusif dan produk unggulan.
     */
    public function index(): View
    {
        $featuredProducts = Product::where(function ($q) {
            $q->where('is_best_seller', true)
              ->orWhere('stock', '>', 0);
        })
        ->take(6)
        ->get();

        if ($featuredProducts->isEmpty()) {
            $featuredProducts = Product::where('stock', '>', 0)->take(6)->get();
        }

        $categories = Product::distinct()->pluck('category');

        return view('home', compact('featuredProducts', 'categories'));
    }

    /**
     * Katalog produk dengan filter kategori, pencarian live, rentang harga, dan sorting.
     */
    public function catalog(Request $request): View|JsonResponse
    {
        $query = Product::query();

        // 1. Filter Kategori
        if ($request->filled('category') && $request->input('category') !== 'Semua') {
            $query->where('category', $request->input('category'));
        }

        // 2. Pencarian Nama / Deskripsi
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('id', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // 3. Filter Rentang Harga
        if ($request->filled('min_price')) {
            $query->where('price', '>=', (int) $request->input('min_price'));
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', (int) $request->input('max_price'));
        }

        // 4. Filter Ketersediaan Stok
        if ($request->boolean('ready_only')) {
            $query->where('stock', '>', 0);
        }

        // 5. Urutan / Sorting
        $sort = $request->input('sort', 'latest');
        match ($sort) {
            'price_asc' => $query->orderBy('price', 'asc'),
            'price_desc' => $query->orderBy('price', 'desc'),
            'name_asc' => $query->orderBy('name', 'asc'),
            default => $query->orderBy('created_at', 'desc'),
        };

        if ($request->wantsJson()) {
            $results = $query->take(8)->get(['id', 'name', 'price', 'category', 'image', 'stock']);
            return response()->json($results);
        }

        $products = $query->paginate(9)->withQueryString();
        $categories = Product::distinct()->pluck('category');
        $totalProductsCount = Product::count();

        return view('catalog', compact('products', 'categories', 'totalProductsCount'));
    }

    /**
     * Tampilan detail produk lengkap dengan rich-media dan related products.
     */
    public function show(string $id): View
    {
        $product = Product::findOrFail($id);

        $relatedProducts = Product::where('category', $product->category)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('product-detail', compact('product', 'relatedProducts'));
    }
}
