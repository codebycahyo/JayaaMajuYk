<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesin POS Kasir - Mitra Setia POS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        tailwind.config = {
            theme: {
                extend: { colors: { primary: '#0E3481', secondary: '#00BFA6' } }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .custom-scrollbar::-webkit-scrollbar { width: 6px; height: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: #f1f5f9; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 9999px; }
    </style>
</head>
<body class="bg-slate-100 min-h-screen text-slate-800 flex flex-col select-none">

    <!-- Header POS -->
    <header class="bg-slate-900 text-white px-6 py-3.5 flex items-center justify-between shadow-md z-30">
        <div class="flex items-center gap-4">
            <div class="size-9 bg-primary rounded-xl flex items-center justify-center font-black text-white shadow-md shadow-primary/40">
                MS
            </div>
            <div>
                <h1 class="text-base font-black tracking-tight leading-none text-white">POINT OF SALE (POS)</h1>
                <p class="text-slate-400 text-xs mt-0.5">Mitra Setia - Software & Mesin Kasir</p>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <div class="text-right hidden sm:block">
                <p class="text-xs font-bold text-white">{{ Auth::user()?->name ?? 'Kasir Mitra Setia' }}</p>
                <p class="text-[10px] text-emerald-400 uppercase font-black tracking-wider">{{ Auth::user()?->role ?? 'STAFF' }} ON DUTY</p>
            </div>

            @if(Auth::user()?->isAdmin())
                <a href="{{ route('admin.products.index') }}" class="px-3.5 py-2 bg-slate-800 hover:bg-slate-700 text-slate-300 hover:text-white rounded-xl text-xs font-bold flex items-center gap-1.5 transition-colors">
                    <span class="material-symbols-outlined text-sm">dashboard</span> Panel Admin
                </a>
            @endif

            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="px-3.5 py-2 bg-red-500/10 hover:bg-red-500/20 text-red-400 rounded-xl text-xs font-bold flex items-center gap-1.5 transition-colors">
                    <span class="material-symbols-outlined text-sm">logout</span> Keluar
                </button>
            </form>
        </div>
    </header>

    <!-- Main POS Interface Grid -->
    <div class="flex-1 flex flex-col lg:flex-row overflow-hidden">
        
        <!-- Left: Product Catalog & Search (60%) -->
        <div class="flex-1 flex flex-col p-6 overflow-hidden">
            
            <!-- Search & Category Filters -->
            <div class="space-y-4 mb-6">
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-4 top-3.5 text-slate-400">search</span>
                    <input 
                        type="text" 
                        id="searchInput" 
                        placeholder="Scan barcode atau cari nama produk..." 
                        class="w-full pl-12 pr-4 py-3.5 bg-white rounded-2xl border border-slate-200 shadow-sm text-sm font-medium focus:outline-none focus:border-primary text-slate-800"
                        autofocus
                    >
                </div>

                <!-- Category Pills -->
                <div class="flex items-center gap-2 overflow-x-auto pb-1 custom-scrollbar" id="categoryFilter">
                    <button class="cat-btn active px-4 py-2 rounded-xl text-xs font-bold transition-all bg-primary text-white shadow-sm" data-cat="all">
                        Semua Kategori
                    </button>
                    @foreach ($categories as $cat)
                        <button class="cat-btn px-4 py-2 rounded-xl text-xs font-bold transition-all bg-white text-slate-600 hover:bg-slate-200 border border-slate-200" data-cat="{{ $cat }}">
                            {{ $cat }}
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Product Cards Grid -->
            <div class="flex-1 overflow-y-auto pr-1 custom-scrollbar">
                <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4" id="productGrid">
                    @forelse ($products as $p)
                        <div 
                            class="product-card bg-white rounded-2xl p-4 border border-slate-200/80 shadow-sm hover:shadow-md hover:border-primary transition-all cursor-pointer flex flex-col justify-between"
                            data-id="{{ $p->id }}"
                            data-name="{{ $p->name }}"
                            data-price="{{ $p->price }}"
                            data-category="{{ $p->category }}"
                            data-stock="{{ $p->stock }}"
                            onclick="addToCart('{{ $p->id }}', '{{ addslashes($p->name) }}', {{ $p->price }}, {{ $p->stock }})"
                        >
                            <div>
                                <div class="w-full h-28 bg-slate-50 rounded-xl mb-3 p-2 flex items-center justify-center border border-slate-100 overflow-hidden">
                                    @if($p->image)
                                        <img src="{{ Str::startsWith($p->image, ['http://', 'https://', 'data:']) ? $p->image : asset($p->image) }}" class="max-h-full max-w-full object-contain" alt="{{ $p->name }}">
                                    @else
                                        <span class="material-symbols-outlined text-4xl text-slate-300">image</span>
                                    @endif
                                </div>
                                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block mb-1">{{ $p->category }}</span>
                                <h4 class="font-bold text-slate-800 text-sm leading-snug line-clamp-2">{{ $p->name }}</h4>
                            </div>
                            <div class="mt-3 pt-3 border-t border-slate-100 flex items-center justify-between">
                                <span class="font-black text-primary text-sm">Rp {{ number_format($p->price, 0, ',', '.') }}</span>
                                <span class="text-[10px] font-bold px-2 py-0.5 rounded-full {{ $p->stock > 10 ? 'bg-emerald-50 text-emerald-700' : 'bg-amber-50 text-amber-700' }}">
                                    Stok: {{ $p->stock }}
                                </span>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full py-16 text-center text-slate-400">
                            <span class="material-symbols-outlined text-5xl mb-2">inventory_2</span>
                            <p class="font-bold">Tidak ada produk tersedia</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Right: Current Transaction & Cart (40%) -->
        <div class="w-full lg:w-[460px] bg-white border-l border-slate-200 flex flex-col shadow-xl z-10">
            
            <!-- Cart Header -->
            <div class="p-5 border-b border-slate-100">
                <div class="flex items-center justify-between mb-3">
                    <h2 class="font-black text-slate-800 text-base flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">shopping_bag</span> Keranjang Transaksi
                    </h2>
                    <button onclick="clearCart()" class="text-xs font-bold text-red-500 hover:text-red-700 flex items-center gap-1 transition-colors">
                        <span class="material-symbols-outlined text-sm">delete_sweep</span> Kosongkan
                    </button>
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-500 mb-1">Nama Pelanggan (Opsional)</label>
                    <input 
                        type="text" 
                        id="customerName" 
                        placeholder="Pelanggan Umum" 
                        value="Pelanggan Umum" 
                        class="w-full px-3 py-2 bg-slate-50 rounded-xl border border-slate-200 text-xs font-medium focus:outline-none focus:border-primary"
                    >
                </div>
            </div>

            <!-- Cart Items List -->
            <div class="flex-1 overflow-y-auto p-5 space-y-3 custom-scrollbar" id="cartItemsContainer">
                <!-- Javascript will render items here -->
                <div class="h-full flex flex-col items-center justify-center text-slate-400 py-12" id="emptyCartNotice">
                    <span class="material-symbols-outlined text-5xl mb-2 text-slate-300">point_of_sale</span>
                    <p class="font-bold text-sm">Keranjang Masih Kosong</p>
                    <p class="text-xs text-slate-400 mt-1 text-center">Klik produk pada daftar di sebelah kiri untuk menambah pesanan.</p>
                </div>
            </div>

            <!-- Calculation & Payment Area -->
            <div class="p-5 bg-slate-50 border-t border-slate-200 space-y-3">
                <div class="space-y-1.5 text-xs font-semibold text-slate-600">
                    <div class="flex justify-between">
                        <span>Subtotal:</span>
                        <span id="subtotalDisplay" class="font-bold text-slate-800">Rp 0</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span>Diskon (Rp):</span>
                        <input 
                            type="number" 
                            id="discountInput" 
                            min="0" 
                            value="0" 
                            class="w-28 text-right px-2.5 py-1 bg-white rounded-lg border border-slate-200 text-xs font-bold focus:outline-none focus:border-primary"
                            oninput="calculateTotals()"
                        >
                    </div>
                </div>

                <!-- Total Tagihan -->
                <div class="p-3 bg-primary/5 rounded-xl border border-primary/20 flex items-center justify-between">
                    <div>
                        <span class="text-[10px] font-extrabold text-primary uppercase tracking-wider block">Total Tagihan</span>
                        <span class="text-2xl font-black text-primary" id="totalAmountDisplay">Rp 0</span>
                    </div>
                    <div class="text-right">
                        <span class="text-[10px] text-slate-400 block font-bold">Total Item</span>
                        <span class="text-sm font-black text-slate-700" id="totalQtyDisplay">0 unit</span>
                    </div>
                </div>

                <!-- Metode Pembayaran -->
                <div>
                    <label class="block text-[11px] font-bold text-slate-600 mb-1.5">Metode Pembayaran</label>
                    <div class="grid grid-cols-4 gap-1.5" id="paymentMethodGroup">
                        <button type="button" class="pay-method-btn active py-2 rounded-xl text-xs font-bold border border-primary bg-primary text-white transition-all text-center" data-method="cash">Tunai</button>
                        <button type="button" class="pay-method-btn py-2 rounded-xl text-xs font-bold border border-slate-200 bg-white text-slate-700 transition-all text-center" data-method="qris">QRIS</button>
                        <button type="button" class="pay-method-btn py-2 rounded-xl text-xs font-bold border border-slate-200 bg-white text-slate-700 transition-all text-center" data-method="transfer">Transfer</button>
                        <button type="button" class="pay-method-btn py-2 rounded-xl text-xs font-bold border border-slate-200 bg-white text-slate-700 transition-all text-center" data-method="debit">Debit</button>
                    </div>
                </div>

                <!-- Nominal Bayar & Quick Cash Chips -->
                <div>
                    <div class="flex justify-between items-center mb-1">
                        <label class="text-[11px] font-bold text-slate-600">Nominal Diterima (Rp)</label>
                        <button type="button" onclick="setExactAmount()" class="text-[10px] font-bold text-primary hover:underline">Uang Pas</button>
                    </div>
                    <input 
                        type="number" 
                        id="paidAmountInput" 
                        min="0" 
                        step="1000" 
                        placeholder="0" 
                        class="w-full px-3.5 py-2.5 bg-white rounded-xl border border-slate-300 font-black text-slate-800 text-lg focus:outline-none focus:border-primary text-right"
                        oninput="calculateTotals()"
                    >

                    <!-- Quick Cash Chips -->
                    <div class="flex gap-1.5 mt-2 overflow-x-auto pb-1 custom-scrollbar">
                        <button type="button" onclick="addCash(50000)" class="px-2.5 py-1 bg-white hover:bg-slate-100 border border-slate-200 rounded-lg text-[10px] font-bold text-slate-700 flex-shrink-0">+50.000</button>
                        <button type="button" onclick="addCash(100000)" class="px-2.5 py-1 bg-white hover:bg-slate-100 border border-slate-200 rounded-lg text-[10px] font-bold text-slate-700 flex-shrink-0">+100.000</button>
                        <button type="button" onclick="addCash(200000)" class="px-2.5 py-1 bg-white hover:bg-slate-100 border border-slate-200 rounded-lg text-[10px] font-bold text-slate-700 flex-shrink-0">+200.000</button>
                        <button type="button" onclick="addCash(500000)" class="px-2.5 py-1 bg-white hover:bg-slate-100 border border-slate-200 rounded-lg text-[10px] font-bold text-slate-700 flex-shrink-0">+500.000</button>
                    </div>
                </div>

                <!-- Kembalian -->
                <div class="flex items-center justify-between p-3 rounded-xl bg-slate-200/60 font-bold text-xs">
                    <span class="text-slate-600">Kembalian:</span>
                    <span id="changeDisplay" class="text-base font-black text-slate-800">Rp 0</span>
                </div>

                <!-- Tombol Checkout -->
                <button 
                    id="btnCheckout" 
                    onclick="submitCheckout()" 
                    disabled 
                    class="w-full py-4 rounded-2xl bg-primary text-white font-black text-sm shadow-xl shadow-primary/20 hover:bg-opacity-95 disabled:opacity-50 disabled:cursor-not-allowed transition-all active:scale-[0.98] flex items-center justify-center gap-2"
                >
                    <span class="material-symbols-outlined text-lg">print</span>
                    <span>PROSES BAYAR & CETAK STRUK</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Pos Javascript Logic -->
    <script>
        let cart = {};
        let selectedPaymentMethod = 'cash';

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Fast Filter & Search
        const searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('input', filterProducts);

        const categoryButtons = document.querySelectorAll('.cat-btn');
        let currentCategory = 'all';

        categoryButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                categoryButtons.forEach(b => {
                    b.classList.remove('bg-primary', 'text-white', 'shadow-sm');
                    b.classList.add('bg-white', 'text-slate-600');
                });
                btn.classList.remove('bg-white', 'text-slate-600');
                btn.classList.add('bg-primary', 'text-white', 'shadow-sm');

                currentCategory = btn.getAttribute('data-cat');
                filterProducts();
            });
        });

        function filterProducts() {
            const query = searchInput.value.toLowerCase().trim();
            const cards = document.querySelectorAll('.product-card');

            cards.forEach(card => {
                const name = card.getAttribute('data-name').toLowerCase();
                const cat = card.getAttribute('data-category');
                const id = card.getAttribute('data-id').toLowerCase();

                const matchQuery = name.includes(query) || id.includes(query);
                const matchCat = currentCategory === 'all' || cat === currentCategory;

                if (matchQuery && matchCat) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        // Payment Method selection
        const methodBtns = document.querySelectorAll('.pay-method-btn');
        methodBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                methodBtns.forEach(b => {
                    b.classList.remove('bg-primary', 'text-white', 'border-primary');
                    b.classList.add('bg-white', 'text-slate-700', 'border-slate-200');
                });
                btn.classList.remove('bg-white', 'text-slate-700', 'border-slate-200');
                btn.classList.add('bg-primary', 'text-white', 'border-primary');
                selectedPaymentMethod = btn.getAttribute('data-method');
            });
        });

        // Cart Actions
        function addToCart(id, name, price, stock) {
            if (stock <= 0) {
                alert('Stok produk ini sedang habis.');
                return;
            }

            if (cart[id]) {
                if (cart[id].qty + 1 > stock) {
                    alert('Tidak bisa menambah: stok maksimal tercapai (' + stock + ' unit).');
                    return;
                }
                cart[id].qty += 1;
            } else {
                cart[id] = { id, name, price, qty: 1, stock };
            }

            renderCart();
        }

        function updateQty(id, delta) {
            if (!cart[id]) return;
            const newQty = cart[id].qty + delta;

            if (newQty <= 0) {
                delete cart[id];
            } else if (newQty > cart[id].stock) {
                alert('Stok maksimal tercapai (' + cart[id].stock + ' unit).');
                return;
            } else {
                cart[id].qty = newQty;
            }

            renderCart();
        }

        function removeCartItem(id) {
            delete cart[id];
            renderCart();
        }

        function clearCart() {
            if (Object.keys(cart).length === 0) return;
            if (confirm('Kosongkan semua produk dalam keranjang?')) {
                cart = {};
                renderCart();
            }
        }

        function renderCart() {
            const container = document.getElementById('cartItemsContainer');
            const emptyNotice = document.getElementById('emptyCartNotice');
            const keys = Object.keys(cart);

            if (keys.length === 0) {
                container.innerHTML = `
                    <div class="h-full flex flex-col items-center justify-center text-slate-400 py-12" id="emptyCartNotice">
                        <span class="material-symbols-outlined text-5xl mb-2 text-slate-300">point_of_sale</span>
                        <p class="font-bold text-sm">Keranjang Masih Kosong</p>
                        <p class="text-xs text-slate-400 mt-1 text-center">Klik produk pada daftar di sebelah kiri untuk menambah pesanan.</p>
                    </div>
                `;
            } else {
                let html = '';
                keys.forEach(id => {
                    const item = cart[id];
                    const itemSubtotal = item.price * item.qty;

                    html += `
                        <div class="p-3 bg-white rounded-xl border border-slate-200/90 shadow-sm flex items-center justify-between gap-3">
                            <div class="flex-1 min-w-0">
                                <h5 class="text-xs font-bold text-slate-800 truncate">${item.name}</h5>
                                <p class="text-[11px] text-slate-400 font-medium">Rp ${formatRupiah(item.price)} &times; ${item.qty} = <strong class="text-primary font-bold">Rp ${formatRupiah(itemSubtotal)}</strong></p>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <button type="button" onclick="updateQty('${id}', -1)" class="size-7 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 flex items-center justify-center font-black text-sm">-</button>
                                <span class="w-6 text-center text-xs font-black text-slate-800">${item.qty}</span>
                                <button type="button" onclick="updateQty('${id}', 1)" class="size-7 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 flex items-center justify-center font-black text-sm">+</button>
                                <button type="button" onclick="removeCartItem('${id}')" class="size-7 rounded-lg text-red-500 hover:bg-red-50 flex items-center justify-center ml-1">
                                    <span class="material-symbols-outlined text-base">delete</span>
                                </button>
                            </div>
                        </div>
                    `;
                });
                container.innerHTML = html;
            }

            calculateTotals();
        }

        function calculateTotals() {
            let subtotal = 0;
            let totalQty = 0;

            Object.values(cart).forEach(item => {
                subtotal += item.price * item.qty;
                totalQty += item.qty;
            });

            const discount = Math.max(0, parseInt(document.getElementById('discountInput').value) || 0);
            const total = Math.max(0, subtotal - discount);
            const paid = parseInt(document.getElementById('paidAmountInput').value) || 0;
            const change = paid - total;

            document.getElementById('subtotalDisplay').innerText = 'Rp ' + formatRupiah(subtotal);
            document.getElementById('totalAmountDisplay').innerText = 'Rp ' + formatRupiah(total);
            document.getElementById('totalQtyDisplay').innerText = totalQty + ' unit';

            const changeEl = document.getElementById('changeDisplay');
            if (paid > 0 && change < 0) {
                changeEl.innerText = 'Kurang Rp ' + formatRupiah(Math.abs(change));
                changeEl.className = 'text-base font-black text-red-500';
            } else {
                changeEl.innerText = 'Rp ' + formatRupiah(Math.max(0, change));
                changeEl.className = 'text-base font-black text-emerald-600';
            }

            // Validasi tombol checkout
            const btn = document.getElementById('btnCheckout');
            if (totalQty > 0 && paid >= total) {
                btn.removeAttribute('disabled');
            } else {
                btn.setAttribute('disabled', 'true');
            }
        }

        function setExactAmount() {
            let subtotal = 0;
            Object.values(cart).forEach(item => subtotal += item.price * item.qty);
            const discount = Math.max(0, parseInt(document.getElementById('discountInput').value) || 0);
            const total = Math.max(0, subtotal - discount);
            document.getElementById('paidAmountInput').value = total;
            calculateTotals();
        }

        function addCash(amount) {
            const current = parseInt(document.getElementById('paidAmountInput').value) || 0;
            document.getElementById('paidAmountInput').value = current + amount;
            calculateTotals();
        }

        function formatRupiah(num) {
            return new Intl.NumberFormat('id-ID').format(num);
        }

        // Submit Checkout via AJAX
        async function submitCheckout() {
            const btn = document.getElementById('btnCheckout');
            btn.setAttribute('disabled', 'true');
            btn.innerHTML = `<span class="material-symbols-outlined text-lg animate-spin">progress_activity</span> <span>MEMPROSES...</span>`;

            const items = Object.values(cart).map(i => ({ id: i.id, qty: i.qty }));
            const payload = {
                customer_name: document.getElementById('customerName').value,
                discount: parseInt(document.getElementById('discountInput').value) || 0,
                paid_amount: parseInt(document.getElementById('paidAmountInput').value) || 0,
                payment_method: selectedPaymentMethod,
                items: items,
            };

            try {
                const response = await fetch("{{ route('pos.checkout') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify(payload),
                });

                const data = await response.json();

                if (response.ok && data.success) {
                    // Buka nota di tab baru untuk pencetakan
                    window.open(data.receipt_url, '_blank', 'width=450,height=700');
                    
                    // Reset keranjang
                    cart = {};
                    document.getElementById('paidAmountInput').value = '';
                    document.getElementById('discountInput').value = '0';
                    renderCart();
                    
                    alert('Transaksi ' + data.invoice_number + ' berhasil!');
                    window.location.reload();
                } else {
                    alert('Gagal memproses transaksi: ' + (data.message || 'Terjadi kesalahan.'));
                    btn.removeAttribute('disabled');
                    btn.innerHTML = `<span class="material-symbols-outlined text-lg">print</span> <span>PROSES BAYAR & CETAK STRUK</span>`;
                }
            } catch (err) {
                alert('Terjadi kesalahan jaringan atau server. Silakan coba kembali.');
                btn.removeAttribute('disabled');
                btn.innerHTML = `<span class="material-symbols-outlined text-lg">print</span> <span>PROSES BAYAR & CETAK STRUK</span>`;
            }
        }
    </script>
</body>
</html>
