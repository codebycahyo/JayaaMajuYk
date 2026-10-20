<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Enforce HTTPS behind reverse proxies (Wasmer, Cloudflare)
        if (request()->header('x-forwarded-proto') === 'https' || str_contains(config('app.url'), 'https://') || app()->environment('production')) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }

        // Ensure critical storage framework directories exist on serverless/cloud environments
        foreach (['framework/sessions', 'framework/views', 'framework/cache', 'logs'] as $dir) {
            $path = storage_path($dir);
            if (!is_dir($path)) {
                @mkdir($path, 0755, true);
            }
        }
    }
}
