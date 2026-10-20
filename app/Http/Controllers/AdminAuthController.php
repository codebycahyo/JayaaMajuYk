<?php

namespace App\Http\Controllers;

use App\Services\AuditLogger;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminAuthController extends Controller
{
    /**
     * Menampilkan halaman login.
     */
    public function login(): View|RedirectResponse
    {
        if (Auth::check()) {
            return Auth::user()->isAdmin()
                ? redirect()->route('admin.products.index')
                : redirect()->route('pos.index');
        }

        return view('admin.login');
    }

    /**
     * Memproses otentikasi login dengan rate limiting dan pencatatan audit log.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $request->validate([
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
        ], [
            'login.required' => 'Email atau username wajib diisi.',
            'password.required' => 'Kata sandi wajib diisi.',
        ]);

        $loginInput = trim($request->input('login'));
        $throttleKey = Str::transliterate(Str::lower($loginInput) . '|' . $request->ip());

        // Proteksi Brute Force: maksimal 5 kegagalan per 60 detik
        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            AuditLogger::log('BRUTE_FORCE_BLOCKED', "Upaya login terblokir untuk akun: {$loginInput}");
            return back()->with('error', "Terlalu banyak percobaan masuk yang gagal. Silakan coba kembali dalam {$seconds} detik.");
        }

        $field = filter_var($loginInput, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        $credentials = [
            $field => $loginInput,
            'password' => $request->input('password'),
        ];
        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();

            // Mencegah Session Fixation
            $request->session()->regenerate();
            RateLimiter::clear($throttleKey);

            // Audit log login sukses
            AuditLogger::log('LOGIN', "Pengguna {$user->name} ({$user->role}) berhasil masuk ke dalam sistem.");

            if ($user->isAdmin()) {
                return redirect()->intended(route('admin.products.index'))
                    ->with('success', "Selamat datang kembali, Administrator {$user->name}.");
            }

            return redirect()->intended(route('pos.index'))
                ->with('success', "Selamat datang, Kasir {$user->name}. Mesin POS siap digunakan.");
        }

        RateLimiter::hit($throttleKey, 60);

        AuditLogger::log('LOGIN_FAILED', "Upaya login gagal untuk username/email: {$loginInput}");

        return back()
            ->withInput($request->only('login'))
            ->with('error', 'Email/Username atau kata sandi tidak cocok.');
    }

    /**
     * Logout pengguna dari sesi aktif.
     */
    public function logout(Request $request): RedirectResponse
    {
        $user = Auth::user();
        if ($user) {
            AuditLogger::log('LOGOUT', "Pengguna {$user->name} ({$user->role}) telah keluar dari sistem.");
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'Anda telah berhasil keluar dari sesi.');
    }
}
