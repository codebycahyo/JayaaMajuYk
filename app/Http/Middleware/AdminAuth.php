<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Memastikan request hanya dapat diakses oleh pengguna yang sudah terotentikasi (admin atau kasir).
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('admin.login')
                ->with('error', 'Silakan masuk terlebih dahulu untuk mengakses fitur ini.');
        }

        return $next($request);
    }
}
