@extends('admin.layout')

@section('title', 'Manajemen Pengguna')

@section('content')
<div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
    <div>
        <h1 class="text-3xl font-black text-slate-800 tracking-tight">Manajemen Pengguna</h1>
        <p class="text-slate-500 mt-2 text-sm">Kelola akun administrator dan staf kasir Jaya Maju POS</p>
    </div>
    <a href="{{ route('admin.users.create') }}" class="bg-primary text-white px-6 py-3 rounded-xl font-bold shadow-lg shadow-primary/20 hover:scale-105 transition-transform flex items-center gap-2 self-start md:self-auto">
        <span class="material-symbols-outlined">person_add</span> Tambah Pengguna
    </a>
</div>

<!-- Filter & Pencarian -->
<div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm mb-6">
    <form method="GET" action="{{ route('admin.users.index') }}" class="grid grid-cols-1 md:grid-cols-12 gap-3 items-center">
        <div class="md:col-span-7 relative">
            <span class="material-symbols-outlined absolute left-3 top-3 text-slate-400">search</span>
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Cari nama atau email pengguna..." 
                class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:border-primary font-medium"
            >
        </div>
        <div class="md:col-span-3">
            <select name="role" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:border-primary font-medium">
                <option value="all">Semua Role</option>
                <option value="admin" {{ request('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="kasir" {{ request('role') === 'kasir' ? 'selected' : '' }}>Kasir</option>
            </select>
        </div>
        <div class="md:col-span-2 flex gap-2">
            <button type="submit" class="w-full bg-slate-800 hover:bg-slate-900 text-white font-bold py-2.5 rounded-xl text-sm transition-colors">
                Filter
            </button>
            @if(request()->hasAny(['search', 'role']))
                <a href="{{ route('admin.users.index') }}" class="px-3 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-xl text-sm font-semibold transition-colors flex items-center justify-center" title="Reset">
                    <span class="material-symbols-outlined text-sm">refresh</span>
                </a>
            @endif
        </div>
    </form>
</div>

<!-- Tabel Pengguna -->
<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
    @if($users->isEmpty())
        <div class="p-12 text-center">
            <span class="material-symbols-outlined text-5xl text-slate-300 mb-3">group_off</span>
            <p class="text-slate-600 font-bold text-lg">Tidak ada pengguna ditemukan</p>
            <p class="text-slate-400 text-sm mt-1">Coba sesuaikan kata kunci pencarian atau filter role.</p>
        </div>
    @else
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50 border-b border-slate-100">
                <tr>
                    <th class="p-6 text-xs font-bold uppercase text-slate-400 tracking-wider">Nama & Email</th>
                    <th class="p-6 text-xs font-bold uppercase text-slate-400 tracking-wider">Role</th>
                    <th class="p-6 text-xs font-bold uppercase text-slate-400 tracking-wider">Terdaftar Sejak</th>
                    <th class="p-6 text-xs font-bold uppercase text-slate-400 tracking-wider text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach ($users as $user)
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="p-6">
                        <div class="flex items-center gap-3">
                            <div class="size-10 rounded-xl bg-slate-100 border border-slate-200 flex items-center justify-center font-black text-slate-600 text-sm">
                                {{ strtoupper(substr($user->name, 0, 2)) }}
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-800 flex items-center gap-2">
                                    {{ $user->name }}
                                    @if($user->id === Auth::id())
                                        <span class="text-[10px] bg-blue-100 text-blue-700 px-2 py-0.5 rounded-full font-bold">Akun Anda</span>
                                    @endif
                                </h4>
                                <p class="text-xs text-slate-400 mt-0.5">{{ $user->email }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="p-6">
                        <span class="px-3 py-1 rounded-full text-xs font-black uppercase tracking-wider {{ $user->isAdmin() ? 'bg-amber-100 text-amber-800 border border-amber-200' : 'bg-emerald-100 text-emerald-800 border border-emerald-200' }}">
                            {{ $user->role }}
                        </span>
                    </td>
                    <td class="p-6 text-xs text-slate-500 font-medium">
                        {{ $user->created_at ? $user->created_at->translatedFormat('d M Y, H:i') : '-' }}
                    </td>
                    <td class="p-6 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="size-10 flex items-center justify-center rounded-lg border border-slate-200 text-slate-600 hover:border-primary hover:text-primary transition-colors" title="Edit Pengguna">
                                <span class="material-symbols-outlined text-lg">edit</span>
                            </a>
                            @if($user->id !== Auth::id())
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun pengguna ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="size-10 flex items-center justify-center rounded-lg border border-slate-200 text-red-500 hover:bg-red-50 hover:border-red-200 transition-colors" title="Hapus Pengguna">
                                        <span class="material-symbols-outlined text-lg">delete</span>
                                    </button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if($users->hasPages())
            <div class="p-4 border-t border-slate-100">
                {{ $users->links() }}
            </div>
        @endif
    @endif
</div>
@endsection
