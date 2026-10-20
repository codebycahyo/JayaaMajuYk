<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Services\AuditLogger;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminProductController extends Controller
{
    public function index(): View
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('admin.index', compact('products'));
    }

    public function create(): View
    {
        return view('admin.form');
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $uploadedPath = null;

        try {
            DB::beginTransaction();

            $validated['specs'] = $this->parseSpecs($request->input('specs_raw'));
            unset($validated['specs_raw']);

            if ($request->hasFile('image')) {
                $uploadedPath = $this->storeProductImage($request->file('image'));
                $validated['image'] = $uploadedPath;
            }

            $validated['is_ready_stock'] = ($validated['stock'] ?? 0) > 0;

            $product = Product::create($validated);

            AuditLogger::log('CREATE_PRODUCT', "Menambahkan produk baru: {$product->name} (ID: {$product->id}) dengan stok {$product->stock}.", [
                'product_id' => $product->id,
                'price' => $product->price,
                'stock' => $product->stock,
            ]);

            DB::commit();

            return redirect()->route('admin.products.index')
                ->with('success', 'Produk baru berhasil ditambahkan.');
        } catch (\Throwable $e) {
            DB::rollBack();

            if ($uploadedPath) {
                $this->deleteImageFile($uploadedPath);
            }

            Log::error('Gagal menyimpan produk baru: ' . $e->getMessage(), ['exception' => $e]);

            return back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan produk. Silakan coba kembali.');
        }
    }

    public function edit(string $id): View
    {
        $product = Product::findOrFail($id);
        return view('admin.form', compact('product'));
    }

    public function update(UpdateProductRequest $request, string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $validated = $request->validated();
        $newUploadedPath = null;
        $oldImagePath = $product->image;
        $oldStock = $product->stock;

        try {
            DB::beginTransaction();

            $validated['specs'] = $this->parseSpecs($request->input('specs_raw'));
            unset($validated['specs_raw']);

            if ($request->hasFile('image')) {
                $newUploadedPath = $this->storeProductImage($request->file('image'));
                $validated['image'] = $newUploadedPath;
            }

            $validated['is_ready_stock'] = ($validated['stock'] ?? 0) > 0;

            $product->update($validated);

            AuditLogger::log('UPDATE_PRODUCT', "Memperbarui produk: {$product->name} (ID: {$product->id}). Stok: {$oldStock} -> {$product->stock}.", [
                'product_id' => $product->id,
                'changes' => $product->getChanges(),
            ]);

            DB::commit();

            if ($newUploadedPath && $oldImagePath) {
                $this->deleteImageFile($oldImagePath);
            }

            return redirect()->route('admin.products.index')
                ->with('success', 'Produk berhasil diperbarui.');
        } catch (\Throwable $e) {
            DB::rollBack();

            if ($newUploadedPath) {
                $this->deleteImageFile($newUploadedPath);
            }

            Log::error("Gagal memperbarui produk [ID: {$id}]: " . $e->getMessage(), ['exception' => $e]);

            return back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui produk: ' . $e->getMessage());
        }
    }

    public function destroy(string $id): RedirectResponse
    {
        try {
            $product = Product::findOrFail($id);
            $productName = $product->name;
            $imagePath = $product->image;

            $product->delete();

            $this->deleteImageFile($imagePath);

            AuditLogger::log('DELETE_PRODUCT', "Menghapus produk: {$productName} (ID: {$id}).", [
                'product_id' => $id,
            ]);

            return redirect()->route('admin.products.index')
                ->with('success', "Produk '{$productName}' berhasil dihapus.");
        } catch (\Throwable $e) {
            Log::error("Gagal menghapus produk [ID: {$id}]: " . $e->getMessage(), ['exception' => $e]);

            return back()->with('error', 'Gagal menghapus produk: ' . $e->getMessage());
        }
    }

    private function parseSpecs(?string $rawSpecs): array
    {
        if (empty($rawSpecs)) {
            return [];
        }

        $specs = [];
        $lines = preg_split('/\r\n|\r|\n/', trim($rawSpecs));

        foreach ($lines as $line) {
            $line = trim($line);
            if ($line === '' || !str_contains($line, '=')) {
                continue;
            }

            [$key, $val] = explode('=', $line, 2);
            $cleanKey = trim(strip_tags($key));
            $cleanVal = trim(strip_tags($val));

            if ($cleanKey !== '') {
                $specs[$cleanKey] = $cleanVal;
            }
        }

        return $specs;
    }

    private function storeProductImage(UploadedFile $file): string
    {
        $extension = $file->guessExtension() ?: 'jpg';
        $safeFileName = Str::uuid() . '.' . $extension;
        $targetDir = public_path('assets/products');

        if (!is_dir($targetDir)) {
            @mkdir($targetDir, 0755, true);
        }

        $file->move($targetDir, $safeFileName);

        return 'assets/products/' . $safeFileName;
    }

    private function deleteImageFile(?string $relativePath): void
    {
        if (!$relativePath || Str::startsWith($relativePath, ['http://', 'https://'])) {
            return;
        }

        $filename = basename($relativePath);
        // Hanya hapus file gambar yang diunggah dinamis (UUID) agar gambar default katalog tetap aman
        if (!preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}\./i', $filename)) {
            return;
        }

        $realTarget = realpath(public_path(ltrim($relativePath, '/')));
        $allowedBase = realpath(public_path('assets/products'));

        if ($realTarget && $allowedBase && str_starts_with($realTarget, $allowedBase) && is_file($realTarget)) {
            @unlink($realTarget);
        }
    }
}
