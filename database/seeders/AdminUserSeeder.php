<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Membuat akun default untuk Administrator dan Kasir.
     */
    public function run(): void
    {
        // 1. Akun Administrator
        User::updateOrCreate(
            ['email' => 'admin@jayamaju.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'is_admin' => true,
                'email_verified_at' => now(),
            ]
        );

        // 2. Akun Kasir
        User::updateOrCreate(
            ['email' => 'kasir@jayamaju.com'],
            [
                'name' => 'Kasir Utama',
                'password' => Hash::make('kasir123'),
                'role' => 'kasir',
                'is_admin' => false,
                'email_verified_at' => now(),
            ]
        );
    }
}
