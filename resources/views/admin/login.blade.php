<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Jaya Maju</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: { colors: { primary: '#0E3481' } }
            }
        }
    </script>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center p-6 font-sans">
    <div class="max-w-md w-full bg-white p-8 rounded-2xl shadow-xl border border-slate-100">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-black text-slate-900">Admin Login</h1>
            <p class="text-slate-500 mt-2 text-sm">Masuk untuk mengelola katalog produk Jaya Maju POS</p>
        </div>

        @if (session('error'))
            <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl mb-6 text-sm font-semibold">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-6 text-sm font-semibold">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.authenticate') }}" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Email atau Username</label>
                <input 
                    type="text" 
                    name="login" 
                    value="{{ old('login') }}" 
                    class="w-full px-4 py-3 rounded-xl border @error('login') border-red-500 @else border-slate-200 @enderror focus:outline-none focus:border-primary font-medium text-slate-800" 
                    placeholder="admin@jayamaju.com" 
                    required 
                    autofocus
                >
                @error('login')
                    <p class="text-xs text-red-500 mt-1 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Kata Sandi</label>
                <input 
                    type="password" 
                    name="password" 
                    class="w-full px-4 py-3 rounded-xl border @error('password') border-red-500 @else border-slate-200 @enderror focus:outline-none focus:border-primary font-medium text-slate-800" 
                    placeholder="••••••••" 
                    required
                >
                @error('password')
                    <p class="text-xs text-red-500 mt-1 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center gap-2 cursor-pointer text-slate-600">
                    <input type="checkbox" name="remember" class="rounded border-slate-300 text-primary focus:ring-primary">
                    <span>Ingat saya</span>
                </label>
            </div>

            <button type="submit" class="w-full py-3.5 bg-primary text-white rounded-xl font-bold shadow-lg shadow-primary/20 hover:bg-opacity-95 transition-all active:scale-[0.98]">
                Masuk ke Panel Admin
            </button>
        </form>

        <div class="text-center mt-6">
            <a href="{{ route('home') }}" class="text-sm text-slate-400 hover:text-primary transition-colors">
                &larr; Kembali ke Website
            </a>
        </div>
    </div>
</body>
</html>
