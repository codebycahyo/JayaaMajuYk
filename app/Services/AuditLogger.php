<?php

namespace App\Services;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuditLogger
{
    /**
     * Catat aktivitas pengguna ke dalam audit trail.
     *
     * @param string $action Jenis aktivitas (misal: LOGIN, CREATE_PRODUCT, CREATE_TRANSACTION)
     * @param string $description Penjelasan aktivitas yang dilakukan
     * @param array $properties Data konteks tambahan (misal: ID transaksi, nilai sebelum/sesudah perubahan)
     */
    public static function log(string $action, string $description, array $properties = []): void
    {
        try {
            ActivityLog::create([
                'user_id' => Auth::id(),
                'user_name' => Auth::user()?->name ?? 'Sistem/Guest',
                'action' => strtoupper($action),
                'description' => $description,
                'ip_address' => request()->ip(),
                'user_agent' => substr((string) request()->userAgent(), 0, 500),
                'properties' => !empty($properties) ? $properties : null,
                'created_at' => now(),
            ]);
        } catch (\Throwable $e) {
            // Kegagalan pencatatan audit log tidak boleh menghentikan alur proses utama bisnis
            Log::warning('Gagal mencatat audit log: ' . $e->getMessage());
        }
    }
}
