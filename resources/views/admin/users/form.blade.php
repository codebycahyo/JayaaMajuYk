@extends('admin.layout')

@section('title', isset($user) ? 'Edit Pengguna' : 'Tambah Pengguna Baru')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8">
        <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-100">
            <div>
                <h2 class="text-2xl font-black text-slate-800">
                    {{ isset($user) ? 'Edit Pengguna' : 'Tambah Pengguna Baru' }}
                </h2>
                <p class="text-slate-500 text-sm mt-1">Lengkapi informasi akun administrator atau kasir di bawah ini.</p>
            </div>
            <a href="{{ route('admin.users.index') }}" class="text-sm font-semibold text-slate-500 hover:text-slate-800">
                &larr; Kembali
            </a>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-xl mb-6">
                <p class="font-bold text-sm mb-1">Terdapat kesalahan pada input formulir:</p>
                <ul class="list-disc list-inside text-xs space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ isset($user) ? route('admin.users.update', $user->id) : route('admin.users.store') }}" method="POST" class="space-y-6">
            @csrf
            @if(isset($user))
                @method('PUT')
            @endif

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">
                    Nama Lengkap <span class="text-red-500">*</span>
                </label>
                <input 
                    type="text" 
                    name="name" 
                    value="{{ old('name', $user->name ?? '') }}" 
                    class="w-full px-4 py-3 rounded-xl border @error('name') border-red-500 @else border-slate-200 @enderror focus:outline-none focus:border-primary font-medium text-slate-800" 
                    placeholder="contoh: Budi Santoso" 
                    required
                >
                @error('name')
                    <p class="text-xs text-red-500 mt-1 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">
                    Alamat Email <span class="text-red-500">*</span>
                </label>
                <input 
                    type="email" 
                    name="email" 
                    value="{{ old('email', $user->email ?? '') }}" 
                    class="w-full px-4 py-3 rounded-xl border @error('email') border-red-500 @else border-slate-200 @enderror focus:outline-none focus:border-primary font-medium text-slate-800" 
                    placeholder="contoh: budi@jayamaju.com" 
                    required
                >
                @error('email')
                    <p class="text-xs text-red-500 mt-1 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">
                    Role / Peran Pengguna <span class="text-red-500">*</span>
                </label>
                <select 
                    name="role" 
                    class="w-full px-4 py-3 rounded-xl border @error('role') border-red-500 @else border-slate-200 @enderror focus:outline-none focus:border-primary font-medium text-slate-800"
                    required
                >
                    <option value="kasir" {{ old('role', $user->role ?? 'kasir') === 'kasir' ? 'selected' : '' }}>
                        Kasir (Akses Mesin POS & Nota Transaksi)
                    </option>
                    <option value="admin" {{ old('role', $user->role ?? '') === 'admin' ? 'selected' : '' }}>
                        Administrator (Akses Penuh: Produk, Pengguna, Laporan, & Log)
                    </option>
                </select>
                @error('role')
                    <p class="text-xs text-red-500 mt-1 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-2 border-t border-slate-100">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Kata Sandi {{ isset($user) ? '(Kosongkan jika tidak diubah)' : '*' }}
                    </label>
                    <input 
                        type="password" 
                        name="password" 
                        class="w-full px-4 py-3 rounded-xl border @error('password') border-red-500 @else border-slate-200 @enderror focus:outline-none focus:border-primary font-medium text-slate-800" 
                        placeholder="••••••••" 
                        {{ isset($user) ? '' : 'required' }}
                    >
                    @error('password')
                        <p class="text-xs text-red-500 mt-1 font-semibold">{{ $message }}</p>
                    @else
                        <p class="text-[11px] text-slate-400 mt-1">Minimal 8 karakter.</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Konfirmasi Kata Sandi {{ isset($user) ? '' : '*' }}
                    </label>
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-primary font-medium text-slate-800" 
                        placeholder="••••••••" 
                        {{ isset($user) ? '' : 'required' }}
                    >
                </div>
            </div>

            <div class="flex items-center gap-4 pt-4 border-t border-slate-100">
                <a href="{{ route('admin.users.index') }}" class="px-6 py-3.5 rounded-xl font-bold text-slate-500 hover:bg-slate-100 transition-colors">
                    Batal
                </a>
                <button type="submit" class="flex-1 px-8 py-3.5 rounded-xl font-bold text-white bg-primary hover:bg-opacity-90 shadow-lg shadow-primary/20 transition-all active:scale-[0.99]">
                    {{ isset($user) ? 'Simpan Perubahan' : 'Buat Pengguna' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
