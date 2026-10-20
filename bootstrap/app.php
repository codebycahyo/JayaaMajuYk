<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Trust all reverse proxies (Wasmer, Cloudflare, etc.)
        $middleware->trustProxies(at: '*');

        // Terapkan security headers ke seluruh request web
        $middleware->web(append: [
            \App\Http\Middleware\SecurityHeadersMiddleware::class,
        ]);

        $middleware->alias([
            'admin.auth' => \App\Http\Middleware\AdminAuth::class,
            'role' => \App\Http\Middleware\RoleMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Tangani MethodNotAllowedHttpException secara elegan agar tidak menampilkan crash screen merah
        $exceptions->render(function (\Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException $e, \Illuminate\Http\Request $request) {
            if ($request->is('admin/logout') || str_contains($request->path(), 'logout')) {
                \Illuminate\Support\Facades\Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('admin.login')->with('success', 'Sesi Anda telah berhasil diakhiri.');
            }

            if ($request->is('admin/*') || $request->is('admin')) {
                return redirect()->route('admin.products.index')->with('error', 'Aksi tidak diizinkan atau telah kedaluwarsa.');
            }

            if ($request->is('pos/*') || $request->is('pos')) {
                return redirect()->route('pos.index')->with('info', 'Halaman kasir telah dimuat ulang.');
            }

            return redirect()->route('home')->with('info', 'Permintaan Anda telah dialihkan ke halaman utama.');
        });

        // Tangani TokenMismatchException (419 Page Expired) secara bersahabat
        $exceptions->render(function (\Illuminate\Session\TokenMismatchException $e, \Illuminate\Http\Request $request) {
            if ($request->is('admin/logout') || str_contains($request->path(), 'logout')) {
                \Illuminate\Support\Facades\Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('admin.login')->with('info', 'Sesi Anda telah berakhir.');
            }

            return redirect()->back()->with('error', 'Sesi keamanan formulir telah kedaluwarsa. Silakan muat ulang halaman dan coba kembali.');
        });
    })->create();
