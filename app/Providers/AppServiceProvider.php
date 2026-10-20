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
        // Enforce HTTPS behind reverse proxies (Wasmer, Cloudflare) and all remote cloud hosts
        $host = request()->getHost();
        $isLocalHost = in_array($host, ['localhost', '127.0.0.1', '::1', '']) || str_ends_with($host, '.test') || str_ends_with($host, '.local');

        if (
            !$isLocalHost
            || request()->header('x-forwarded-proto') === 'https'
            || request()->header('x-forwarded-ssl') === 'on'
            || request()->server('HTTPS') === 'on'
            || str_contains(config('app.url'), 'https://')
            || app()->environment('production')
        ) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }

        // Ensure critical storage framework directories exist on serverless/cloud environments
        foreach (['framework/sessions', 'framework/views', 'framework/cache', 'logs'] as $dir) {
            $path = storage_path($dir);
            if (!is_dir($path)) {
                @mkdir($path, 0755, true);
            }
        }

        // Auto-migrate & seed tables on remote cloud hosting if connected to a fresh database
        if (!$isLocalHost && !app()->runningInConsole()) {
            try {
                if (!\Illuminate\Support\Facades\Schema::hasTable('products')) {
                    \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
                    if (\App\Models\User::count() === 0) {
                        \Illuminate\Support\Facades\Artisan::call('db:seed', ['--force' => true]);
                    }
                }
            } catch (\Throwable $e) {
                \Illuminate\Support\Facades\Log::error('Auto-migration error on cloud: ' . $e->getMessage());
            }
        }
    }
}
