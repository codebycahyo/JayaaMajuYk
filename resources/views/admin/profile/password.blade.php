@extends('admin.layout')

@section('title', 'Ubah Kata Sandi')

@section('content')
<div class="max-w-xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8">
        <div class="mb-6 pb-4 border-b border-slate-100">
            <h2 class="text-2xl font-black text-slate-800">Ubah Kata Sandi</h2>
            <p class="text-slate-500 text-sm mt-1">Pastikan Anda menggunakan kata sandi yang kuat dan tidak digunakan di layanan lain.</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-xl mb-6">
                <p class="font-bold text-sm mb-1">Gagal memperbarui kata sandi:</p>
                <ul class="list-disc list-inside text-xs space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('profile.password.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">
                    Kata Sandi Saat Ini <span class="text-red-500">*</span>
                </label>
                <input 
                    type="password" 
                    name="current_password" 
                    class="w-full px-4 py-3 rounded-xl border @error('current_password') border-red-500 @else border-slate-200 @enderror focus:outline-none focus:border-primary font-medium text-slate-800" 
                    placeholder="••••••••" 
                    required
                >
                @error('current_password')
                    <p class="text-xs text-red-500 mt-1 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">
                    Kata Sandi Baru <span class="text-red-500">*</span>
                </label>
                <input 
                    type="password" 
                    name="password" 
                    class="w-full px-4 py-3 rounded-xl border @error('password') border-red-500 @else border-slate-200 @enderror focus:outline-none focus:border-primary font-medium text-slate-800" 
                    placeholder="••••••••" 
                    required
                >
                @error('password')
                    <p class="text-xs text-red-500 mt-1 font-semibold">{{ $message }}</p>
                @else
                    <p class="text-[11px] text-slate-400 mt-1">Minimal 8 karakter.</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">
                    Konfirmasi Kata Sandi Baru <span class="text-red-500">*</span>
                </label>
                <input 
                    type="password" 
                    name="password_confirmation" 
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-primary font-medium text-slate-800" 
                    placeholder="••••••••" 
                    required
                >
            </div>

            <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-4">
                <button type="submit" class="w-full md:w-auto px-8 py-3.5 bg-primary text-white rounded-xl font-bold shadow-lg shadow-primary/20 hover:bg-opacity-90 transition-all active:scale-[0.98]">
                    Perbarui Kata Sandi
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
