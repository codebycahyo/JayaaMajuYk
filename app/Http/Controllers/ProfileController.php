<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Services\AuditLogger;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Tampilkan formulir ubah kata sandi.
     */
    public function editPassword(): View
    {
        return view('admin.profile.password');
    }

    /**
     * Proses pembaruan kata sandi akun yang sedang aktif.
     */
    public function updatePassword(UpdatePasswordRequest $request): RedirectResponse
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $user->update([
            'password' => Hash::make($request->input('password')),
        ]);

        AuditLogger::log('CHANGE_PASSWORD', "Pengguna {$user->name} berhasil mengubah kata sandi akunnya.");

        return back()->with('success', 'Kata sandi akun Anda berhasil diperbarui.');
    }
}
