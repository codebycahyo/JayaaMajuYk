@extends('layouts.app')

@section('title', 'Menghubungkan ke WhatsApp - Jaya Maju POS')

@section('content')
<div class="bg-slate-50/50 py-8 sm:py-12 min-h-[85vh] flex items-center justify-center">
    <div class="max-w-2xl w-full mx-auto px-4 sm:px-6">
        <!-- Main Single Clean Card -->
        <div class="bg-white rounded-3xl border border-slate-200/80 p-6 sm:p-10 shadow-xl shadow-slate-200/60 text-center relative overflow-hidden">
            <!-- Subtle background accents -->
            <div class="absolute -top-16 -right-16 size-44 bg-emerald-100/50 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-16 -left-16 size-44 bg-primary/5 rounded-full blur-3xl pointer-events-none"></div>

            <!-- WhatsApp Connecting Icon -->
            <div class="size-20 bg-emerald-500 text-white rounded-3xl flex items-center justify-center mx-auto mb-4 shadow-lg shadow-emerald-500/30 ring-8 ring-emerald-50 animate-bounce">
                <svg class="size-10 fill-current" viewBox="0 0 24 24">
                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                </svg>
            </div>

            <!-- Status Pill -->
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-800 mb-2">
                <span class="size-2 rounded-full bg-amber-500 animate-ping"></span>
                Satu Langkah Lagi
            </span>

            <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight mt-1">
                Menghubungkan ke WhatsApp...
            </h1>
            <p class="text-xs sm:text-sm text-slate-600 mt-2 max-w-md mx-auto">
                Membuka WhatsApp Admin otomatis dalam <span id="timer" class="font-black text-emerald-600 text-base">2</span> detik untuk menyelesaikan pesanan Anda.
            </p>

            <!-- 2-Second Animated Progress Bar -->
            <div class="w-full max-w-xs mx-auto bg-slate-100 h-2 rounded-full mt-4 overflow-hidden">
                <div id="countdown-bar" class="bg-emerald-500 h-full w-0 transition-all duration-[2000ms] ease-linear"></div>
            </div>

            <!-- PRIMARY ACTION: BIG UNMISSABLE BUTTON -->
            <div class="mt-6 mb-4">
                <a href="{{ $whatsappUrl }}" id="main-wa-btn" class="w-full py-4 px-6 bg-emerald-600 hover:bg-emerald-700 text-white rounded-2xl font-black text-base flex items-center justify-center gap-3 transition-all shadow-xl shadow-emerald-600/30 hover:scale-[1.02] active:scale-[0.99] ring-4 ring-emerald-600/20">
                    <svg class="size-6 fill-current shrink-0" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                    </svg>
                    <span>BUKA WHATSAPP SEKARANG</span>
                </a>
                <span class="text-[11px] text-slate-400 block mt-2">
                    Klik tombol di atas jika WhatsApp belum terbuka secara otomatis.
                </span>
            </div>

            <!-- Order Summary Section -->
            <div class="mt-6 border border-slate-200 rounded-2xl p-4 sm:p-5 text-left bg-slate-50/50">
                <div class="flex items-center justify-between pb-3 border-b border-slate-200">
                    <div>
                        <span class="text-[11px] text-slate-400 uppercase font-bold tracking-wider block">No. Faktur</span>
                        <span class="font-mono font-bold text-xs text-slate-800">{{ $order->invoice_number }}</span>
                    </div>
                    <div class="text-right">
                        <span class="text-[11px] text-slate-400 uppercase font-bold tracking-wider block">Total Tagihan</span>
                        <span class="font-black text-sm text-primary">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                    </div>
                </div>

                <!-- Product Items -->
                <div class="divide-y divide-slate-200/70 py-2">
                    @foreach ($order->items as $item)
                        <div class="py-2 flex items-center justify-between text-xs">
                            <span class="font-bold text-slate-800">{{ $item->product_name }} ({{ $item->qty }}x)</span>
                            <span class="font-semibold text-slate-700">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</span>
                        </div>
                    @endforeach
                </div>

                <!-- Recipient Info -->
                <div class="pt-2 border-t border-slate-200 text-[11px] text-slate-500">
                    <div><span class="font-semibold text-slate-700">Penerima:</span> {{ $order->customer_name }} ({{ $order->customer_phone }})</div>
                    <div><span class="font-semibold text-slate-700">Alamat:</span> {{ $order->customer_address }}</div>
                </div>
            </div>

            <!-- Bottom Secondary Actions -->
            <div class="mt-6 flex items-center justify-center gap-4 text-xs">
                <a href="{{ route('order.track', ['q' => $order->invoice_number]) }}" class="text-slate-500 hover:text-primary transition-colors font-medium">
                    Lacak Pesanan
                </a>
                <span class="text-slate-300">&bull;</span>
                <a href="{{ route('catalog') }}" class="text-primary hover:underline font-bold transition-colors">
                    Kembali Belanja
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let seconds = 2;
        const timerSpan = document.getElementById('timer');
        const countdownBar = document.getElementById('countdown-bar');
        const waUrl = @json($whatsappUrl);

        // Start progress bar animation
        setTimeout(function() {
            if (countdownBar) {
                countdownBar.style.width = '100%';
            }
        }, 50);

        // Countdown interval
        const timer = setInterval(function () {
            seconds--;
            if (timerSpan && seconds >= 0) {
                timerSpan.textContent = seconds;
            }

            if (seconds <= 0) {
                clearInterval(timer);
                // Redirect user to WhatsApp
                window.location.href = waUrl;
            }
        }, 1000);

        // If user clicks manually before countdown ends, cancel timer and navigate immediately
        const btn = document.getElementById('main-wa-btn');
        if (btn) {
            btn.addEventListener('click', function() {
                clearInterval(timer);
            });
        }
    });
</script>
@endsection
