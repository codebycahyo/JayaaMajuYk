<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Membatasi akses rute berdasarkan role pengguna.
     *
     * @param string ...$roles Daftar role yang diizinkan (misal: 'admin', 'kasir')
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect()->route('admin.login')
                ->with('error', 'Silakan masuk terlebih dahulu untuk mengakses fitur ini.');
        }

        $user = Auth::user();

        // Admin selalu memiliki hak akses menyeluruh
        if ($user->role === 'admin' || $user->is_admin) {
            return $next($request);
        }

        // Cek apakah role user saat ini ada dalam daftar role yang diizinkan
        if (in_array($user->role, $roles, true)) {
            return $next($request);
        }

        abort(403, 'Akses ditolak: Anda tidak memiliki izin untuk mengakses halaman ini.');
    }
}
