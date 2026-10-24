@extends('layouts.app')

@section('title', 'Menghubungkan ke WhatsApp - Mitra Setia')

@section('content')
<div class="bg-white py-12 sm:py-20 min-h-[85vh] flex items-center justify-center">
    <div class="max-w-xl w-full mx-auto px-4 sm:px-6">
        <!-- Main Single Clean Card -->
        <div class="bg-white rounded-3xl border border-zinc-200/80 p-8 sm:p-12 shadow-card text-center relative overflow-hidden">
            
            <!-- WhatsApp Connecting Icon -->
            <div class="size-16 bg-black text-white rounded-full flex items-center justify-center mx-auto mb-5 shadow-sm">
                <svg class="size-8 fill-current text-emerald-400" viewBox="0 0 24 24">
                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                </svg>
            </div>

            <!-- Status Pill -->
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-800 mb-2">
                <span class="size-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                Satu Langkah Lagi
            </span>

            <h1 class="text-2xl sm:text-3xl font-extrabold text-black tracking-tight mt-1">
                Menghubungkan ke WhatsApp...
            </h1>
            <p class="text-xs sm:text-sm text-zinc-500 mt-2 max-w-sm mx-auto">
                Membuka WhatsApp Admin otomatis dalam <span id="timer" class="font-extrabold text-black text-base">2</span> detik untuk konfirmasi pesanan.
            </p>

            <!-- 2-Second Animated Progress Bar -->
            <div class="w-full max-w-xs mx-auto bg-zinc-100 h-1.5 rounded-full mt-4 overflow-hidden">
                <div id="countdown-bar" class="bg-black h-full w-0 transition-all duration-[2000ms] ease-linear"></div>
            </div>

            <!-- PRIMARY ACTION: BLACK PILL BUTTON -->
            <div class="mt-8 mb-4">
                <a href="{{ $whatsappUrl }}" id="main-wa-btn" class="w-full py-4 px-6 bg-black hover:bg-zinc-800 text-white rounded-full font-semibold text-sm flex items-center justify-center gap-2.5 transition-all shadow-sm">
                    <svg class="size-5 fill-current text-emerald-400 shrink-0" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                    </svg>
                    <span>BUKA WHATSAPP SEKARANG</span>
                </a>
                <span class="text-[11px] text-zinc-400 block mt-2">
                    Klik tombol di atas jika WhatsApp belum terbuka secara otomatis.
                </span>
            </div>

            <!-- Order Summary Section -->
            <div class="mt-8 border border-zinc-200/80 rounded-2xl p-5 text-left bg-zinc-50/60">
                <div class="flex items-center justify-between pb-3 border-b border-zinc-200/60">
                    <div>
                        <span class="text-[11px] text-zinc-400 uppercase font-bold tracking-wider block">No. Faktur</span>
                        <span class="font-mono font-bold text-xs text-zinc-800">{{ $order->invoice_number }}</span>
                    </div>
                    <div class="text-right">
                        <span class="text-[11px] text-zinc-400 uppercase font-bold tracking-wider block">Total Tagihan</span>
                        <span class="font-extrabold text-sm text-black">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                    </div>
                </div>

                <div class="pt-3 text-xs text-zinc-600 space-y-1">
                    <div>Penerima: <strong class="text-black">{{ $order->customer_name }}</strong> ({{ $order->customer_phone }})</div>
                    <div>Alamat: {{ $order->customer_address }}, {{ $order->city }}</div>
                </div>
            </div>

            <div class="mt-6">
                <a href="{{ route('home') }}" class="text-xs text-zinc-400 hover:text-black font-semibold transition-colors">
                    &larr; Kembali ke Beranda
                </a>
            </div>

        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let timeLeft = 2;
        const timerElement = document.getElementById("timer");
        const barElement = document.getElementById("countdown-bar");
        const waBtn = document.getElementById("main-wa-btn");
        const waUrl = waBtn.getAttribute("href");

        setTimeout(() => {
            barElement.style.width = "100%";
        }, 50);

        const countdownInterval = setInterval(() => {
            timeLeft--;
            if (timeLeft <= 0) {
                clearInterval(countdownInterval);
                timerElement.innerText = "0";
                window.location.href = waUrl;
            } else {
                timerElement.innerText = timeLeft;
            }
        }, 1000);
    });
</script>
@endsection
