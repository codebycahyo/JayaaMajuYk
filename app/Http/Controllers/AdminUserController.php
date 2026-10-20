<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\AuditLogger;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AdminUserController extends Controller
{
    public function index(Request $request): View
    {
        $query = User::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($request->filled('role') && $request->input('role') !== 'all') {
            $query->where('role', $request->input('role'));
        }

        $users = $query->orderBy('name')->paginate(10)->withQueryString();

        return view('admin.users.index', compact('users'));
    }

    public function create(): View
    {
        return view('admin.users.form');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
            'is_admin' => $validated['role'] === 'admin',
        ]);

        AuditLogger::log('CREATE_USER', "Menambahkan pengguna baru: {$user->name} ({$user->email}) dengan role {$user->role}.", [
            'created_user_id' => $user->id,
            'role' => $user->role,
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', "Pengguna {$user->name} berhasil ditambahkan.");
    }

    public function edit(User $user): View
    {
        return view('admin.users.form', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $validated = $request->validated();

        // Mencegah admin menghapus hak akses admin diri sendiri secara tidak sengaja
        if ($user->id === Auth::id() && $validated['role'] !== 'admin') {
            return back()->withInput()->with('error', 'Anda tidak dapat menurunkan hak akses akun Anda sendiri dari Administrator.');
        }

        $updateData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
            'is_admin' => $validated['role'] === 'admin',
        ];

        if (!empty($validated['password'])) {
            $updateData['password'] = Hash::make($validated['password']);
        }

        $user->update($updateData);

        AuditLogger::log('UPDATE_USER', "Memperbarui data pengguna: {$user->name} ({$user->email}) [Role: {$user->role}].", [
            'target_user_id' => $user->id,
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', "Data pengguna {$user->name} berhasil diperbarui.");
    }

    public function destroy(User $user): RedirectResponse
    {
        if ($user->id === Auth::id()) {
            return back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        $name = $user->name;
        $id = $user->id;

        $user->delete();

        AuditLogger::log('DELETE_USER', "Menghapus akun pengguna: {$name} (ID: {$id}).", [
            'deleted_user_id' => $id,
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', "Pengguna {$name} berhasil dihapus dari sistem.");
    }
}
