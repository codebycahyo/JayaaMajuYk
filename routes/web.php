<?php

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CompareController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

// ==========================================
// 1. PUBLIC STOREFRONT & E-COMMERCE ROUTES
// ==========================================
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/catalog', [ProductController::class, 'catalog'])->name('catalog');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// Checkout & Order Tracking Routes
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/order/{invoiceNumber}', [CheckoutController::class, 'success'])->name('order.success');
Route::get('/track-order', [CheckoutController::class, 'track'])->name('order.track');

// Product Comparison Routes
Route::get('/compare', [CompareController::class, 'index'])->name('compare');
Route::post('/compare/add', [CompareController::class, 'add'])->name('compare.add');
Route::post('/compare/remove', [CompareController::class, 'remove'])->name('compare.remove');
Route::post('/compare/clear', [CompareController::class, 'clear'])->name('compare.clear');

// ==========================================
// 2. AUTHENTICATION ROUTES
// ==========================================
Route::get('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'authenticate'])->name('admin.authenticate');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// ==========================================
// 3. INTERNAL STAFF & CASHIER (POS) ROUTES
// ==========================================
Route::middleware('admin.auth')->group(function () {
    // Ubah Kata Sandi Akun
    Route::get('/admin/profile/password', [ProfileController::class, 'editPassword'])->name('profile.password');
    Route::put('/admin/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');

    // Modul Point of Sale (POS)
    Route::prefix('pos')->name('pos.')->group(function () {
        Route::get('/', [PosController::class, 'index'])->name('index');
        Route::post('/checkout', [PosController::class, 'checkout'])->name('checkout');
        Route::get('/receipt/{invoiceNumber}', [PosController::class, 'receipt'])->name('receipt');
    });
});

// ==========================================
// 4. ADMIN-ONLY MANAGEMENT ROUTES
// ==========================================
Route::prefix('admin')->name('admin.')->middleware(['admin.auth', 'role:admin'])->group(function () {
    // Manajemen Produk & Stok
    Route::get('/', [AdminProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [AdminProductController::class, 'create'])->name('products.create');
    Route::post('/products', [AdminProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [AdminProductController::class, 'edit'])->name('products.edit');
    Route::match(['post', 'put'], '/products/{id}', [AdminProductController::class, 'update'])->name('products.update');
    Route::match(['post', 'delete'], '/products/{id}/delete', [AdminProductController::class, 'destroy'])->name('products.delete');
    Route::delete('/products/{id}', [AdminProductController::class, 'destroy'])->name('products.destroy');

    // Manajemen Pengguna (Admin, Kasir, Staff)
    Route::resource('users', AdminUserController::class);

    // Laporan Penjualan & Ekspor Data
    Route::prefix('reports')->name('reports.')->group(function () {
        Route::get('/', [ReportController::class, 'index'])->name('index');
        Route::get('/export-csv', [ReportController::class, 'exportCsv'])->name('export.csv');
        Route::get('/print', [ReportController::class, 'printReport'])->name('print');
    });

    // Audit Trail & Log Aktivitas
    Route::get('/logs', [ActivityLogController::class, 'index'])->name('logs.index');
});
