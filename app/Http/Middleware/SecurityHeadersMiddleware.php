<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeadersMiddleware
{
    /**
     * Terapkan header keamanan HTTP standar untuk mencegah Clickjacking, MIME sniffing, XSS, dan man-in-the-middle attacks.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Mencegah Clickjacking (tidak boleh di-embed dalam iframe dari domain lain)
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');

        // Mencegah MIME Type Sniffing
        $response->headers->set('X-Content-Type-Options', 'nosniff');

        // Proteksi XSS bawaan browser lama
        $response->headers->set('X-XSS-Protection', '1; mode=block');

        // Kebijakan Referrer yang aman
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');

        // Batasi akses fitur perangkat keras browser
        $response->headers->set('Permissions-Policy', 'camera=(), microphone=(), geolocation=()');

        // HTTP Strict Transport Security (HSTS)
        if ($request->isSecure()) {
            $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload');
        }

        // Content Security Policy (CSP) dasar yang mendukung CDN internal, Tailwind, dan Google Fonts
        $csp = "default-src 'self' https: data:; "
            . "script-src 'self' 'unsafe-inline' 'unsafe-eval' https://cdn.tailwindcss.com; "
            . "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://cdn.tailwindcss.com; "
            . "font-src 'self' https://fonts.gstatic.com data:; "
            . "img-src 'self' data: https: blob:; "
            . "frame-ancestors 'self';";

        $response->headers->set('Content-Security-Policy', $csp);

        return $response;
    }
}
