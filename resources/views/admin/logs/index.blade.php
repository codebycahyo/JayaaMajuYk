@extends('admin.layout')

@section('title', 'Log Aktivitas Sistem')

@section('content')
<div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
    <div>
        <h1 class="text-3xl font-black text-slate-800 tracking-tight">Audit Trail & Log Aktivitas</h1>
        <p class="text-slate-500 mt-2 text-sm">Rekam jejak seluruh aktivitas penting akun administrator dan kasir</p>
    </div>
</div>

<!-- Filter Log -->
<div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm mb-6">
    <form method="GET" action="{{ route('admin.logs.index') }}" class="grid grid-cols-1 md:grid-cols-12 gap-3 items-center">
        <div class="md:col-span-7 relative">
            <span class="material-symbols-outlined absolute left-3 top-3 text-slate-400">search</span>
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Cari aktivitas, nama pengguna, atau IP address..." 
                class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:border-primary font-medium"
            >
        </div>
        <div class="md:col-span-3">
            <select name="action" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:border-primary font-medium">
                <option value="all">Semua Jenis Aksi</option>
                @foreach ($distinctActions as $act)
                    <option value="{{ $act }}" {{ request('action') === $act ? 'selected' : '' }}>
                        {{ $act }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="md:col-span-2 flex gap-2">
            <button type="submit" class="w-full bg-slate-800 hover:bg-slate-900 text-white font-bold py-2.5 rounded-xl text-sm transition-colors">
                Filter
            </button>
            @if(request()->hasAny(['search', 'action']))
                <a href="{{ route('admin.logs.index') }}" class="px-3 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-xl text-sm font-semibold transition-colors flex items-center justify-center" title="Reset">
                    <span class="material-symbols-outlined text-sm">refresh</span>
                </a>
            @endif
        </div>
    </form>
</div>

<!-- Tabel Log Audit -->
<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
    @if($logs->isEmpty())
        <div class="p-12 text-center text-slate-400">
            <span class="material-symbols-outlined text-5xl mb-2 text-slate-300">history_toggle_off</span>
            <p class="font-bold text-slate-600">Belum ada catatan aktivitas</p>
            <p class="text-xs text-slate-400 mt-1">Aktivitas login, transaksi, dan perubahan data akan tercatat otomatis di sini.</p>
        </div>
    @else
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50 border-b border-slate-100">
                <tr>
                    <th class="p-5 text-xs font-bold uppercase text-slate-400 tracking-wider">Waktu</th>
                    <th class="p-5 text-xs font-bold uppercase text-slate-400 tracking-wider">Pengguna</th>
                    <th class="p-5 text-xs font-bold uppercase text-slate-400 tracking-wider">Aksi</th>
                    <th class="p-5 text-xs font-bold uppercase text-slate-400 tracking-wider">Deskripsi Aktivitas</th>
                    <th class="p-5 text-xs font-bold uppercase text-slate-400 tracking-wider text-right">IP & Browser</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach ($logs as $log)
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="p-5 text-xs text-slate-600 whitespace-nowrap">
                        <span class="font-bold text-slate-800 block">{{ $log->created_at->format('d/m/Y H:i:s') }}</span>
                        <span class="text-[10px] text-slate-400">{{ $log->created_at->diffForHumans() }}</span>
                    </td>
                    <td class="p-5">
                        <div class="flex items-center gap-2">
                            <span class="size-7 rounded-lg bg-slate-100 text-slate-700 font-bold text-xs flex items-center justify-center">
                                {{ strtoupper(substr($log->user_name ?? 'G', 0, 1)) }}
                            </span>
                            <span class="font-bold text-xs text-slate-800">{{ $log->user_name ?? 'Guest/Sistem' }}</span>
                        </div>
                    </td>
                    <td class="p-5">
                        @php
                            $badgeClass = match($log->action) {
                                'LOGIN' => 'bg-blue-100 text-blue-800 border-blue-200',
                                'LOGOUT' => 'bg-slate-100 text-slate-700 border-slate-200',
                                'CREATE_TRANSACTION' => 'bg-emerald-100 text-emerald-800 border-emerald-200',
                                'CREATE_PRODUCT', 'CREATE_USER' => 'bg-green-100 text-green-800 border-green-200',
                                'UPDATE_PRODUCT', 'UPDATE_USER', 'CHANGE_PASSWORD' => 'bg-amber-100 text-amber-800 border-amber-200',
                                'DELETE_PRODUCT', 'DELETE_USER' => 'bg-red-100 text-red-800 border-red-200',
                                default => 'bg-slate-100 text-slate-700 border-slate-200',
                            };
                        @endphp
                        <span class="px-2.5 py-1 rounded-md text-[10px] font-black uppercase tracking-wider border {{ $badgeClass }}">
                            {{ $log->action }}
                        </span>
                    </td>
                    <td class="p-5 text-xs text-slate-700 leading-relaxed font-medium">
                        {{ $log->description }}
                    </td>
                    <td class="p-5 text-right whitespace-nowrap">
                        <span class="font-mono text-xs font-bold text-slate-600 block">{{ $log->ip_address ?? '127.0.0.1' }}</span>
                        <span class="text-[10px] text-slate-400 max-w-[160px] truncate inline-block" title="{{ $log->user_agent }}">
                            {{ Str::limit($log->user_agent, 20) }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if($logs->hasPages())
            <div class="p-4 border-t border-slate-100">
                {{ $logs->links() }}
            </div>
        @endif
    @endif
</div>
@endsection
