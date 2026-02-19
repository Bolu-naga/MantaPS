<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MantaPS - Bawa Pulang Keseruan Tanpa Batas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .glass { background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.1); }
        .text-gradient { background: linear-gradient(to right, #60a5fa, #a855f7); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    </style>
</head>

<body class="bg-[#0f172a] text-slate-200 antialiased font-sans">

    <nav class="fixed w-full z-50 glass px-6 md:px-20 py-5 flex items-center justify-between">
    <div class="flex-1">
        <a href="/">
            <img src="{{ asset('assets/LOGO_MANTAPS.png') }}" alt="MantaPS Logo" class="h-10 md:h-12">
        </a>
    </div>

    <div class="hidden md:flex flex-1 justify-center space-x-10 text-xs font-black uppercase tracking-[0.2em]">
        <a href="#home" class="hover:text-blue-400 transition-colors">Beranda</a>
        <a href="#paket" class="hover:text-blue-400 transition-colors">Harga</a>
        <a href="/catalogue" class="hover:text-blue-400 transition-colors">Katalog</a>
    </div>

    <div class="flex-1 flex justify-end">
        <a href="#booking" class="bg-blue-600 px-8 py-3 rounded-full font-black text-xs uppercase shadow-lg shadow-blue-600/30 transition-all hover:scale-105 active:scale-95">
            Booking Now
        </a>
    </div>
</nav>

    <!-- <div class="flex items-center gap-4">
        @if (Route::has('login'))
            @auth
                {{-- Jika sudah login, tampilkan Dashboard & Logout --}}
                <span class="text-[10px] font-black uppercase text-slate-400">Halo, {{ Auth::user()->name }}</span>
                <a href="{{ url('/dashboard') }}" class="text-[10px] font-black uppercase tracking-widest text-blue-400 hover:text-white transition">Dashboard</a>
                
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-[10px] font-black uppercase tracking-widest text-red-500 hover:text-red-400 transition">Logout</button>
                </form>
            @else
                {{-- Jika belum login --}}
                <a href="{{ route('login') }}" class="text-[10px] font-black uppercase tracking-widest hover:text-blue-400 transition">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="bg-white/10 border border-white/20 px-5 py-2 rounded-full font-black text-[10px] uppercase transition-all hover:bg-white/20">Register</a>
                @endif
            @endauth
        @endif
    </div> -->

<!-- INI BAGIAN BERANDA -->

<section id="home" class="relative pt-48 pb-24 px-6 text-center overflow-hidden">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[600px] bg-blue-500/10 blur-[120px] rounded-full -z-10"></div>
    <div class="max-w-5xl mx-auto">
        <span class="inline-block px-5 py-2 rounded-full bg-blue-500/10 text-blue-400 text-xs font-black tracking-widest uppercase mb-8 border border-blue-500/20">
            PlayStation 5 Ready
        </span>
        <h1 class="text-6xl md:text-9xl font-black italic tracking-tighter leading-[0.9] mb-10 uppercase">
            Bawa Pulang <br> <span class="text-gradient">Keseruan Tanpa Batas</span>
        </h1>
        <p class="text-slate-400 text-base md:text-xl leading-relaxed max-w-2xl mx-auto mb-12">
            Sewa PS5 harian termurah & terpercaya. Unit lengkap dengan game terbaru, siap diantar langsung ke rumah Anda.
        </p>
    </div>
</section>

<!-- INI BAGIAN HARGA -->

<section id="paket" class="py-32 px-6 md:px-20 bg-[#0a101f] relative overflow-hidden">
    <div class="absolute top-1/2 left-0 w-64 h-64 bg-blue-600/10 blur-[100px] rounded-full"></div>

    <div class="text-center mb-20 relative">
        <span class="text-blue-500 text-[10px] font-black uppercase tracking-[0.3em] mb-4 block">Penawaran Terbaik</span>
        <h2 class="text-4xl md:text-6xl font-black italic uppercase tracking-tighter">
            Daily <span class="text-blue-500">Price List</span>
        </h2>
        <div class="h-1.5 w-24 bg-blue-600 mx-auto mt-6 rounded-full shadow-[0_0_15px_rgba(37,99,235,0.5)]"></div>
    </div>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 max-w-7xl mx-auto">
        @forelse($prices as $price)
        <div class="relative group">
            @if($price->is_highlight)
                <div class="absolute -inset-1 bg-gradient-to-b from-blue-600 to-purple-600 rounded-[2.5rem] blur opacity-25 group-hover:opacity-50 transition duration-1000"></div>
            @endif

            <div class="relative {{ $price->is_highlight ? 'bg-[#1a2040] border-blue-500/50' : 'bg-slate-800/40 border-white/5' }} border-2 backdrop-blur-xl rounded-[2.5rem] p-10 h-full flex flex-col justify-between shadow-2xl transition-all duration-500 hover:-translate-y-3">
                
                <div>
                    <div class="flex justify-between items-start mb-8">
                        <div>
                            <p class="font-black uppercase text-[10px] tracking-widest {{ $price->is_highlight ? 'text-blue-400' : 'text-slate-500' }}">Paket Sewa</p>
                            <h3 class="text-2xl font-black italic uppercase tracking-tighter">{{ $price->duration }}</h3>
                        </div>
                        @if($price->is_highlight)
                            <span class="bg-blue-600 text-[8px] font-black uppercase px-3 py-1 rounded-full shadow-lg shadow-blue-600/40">Best Value</span>
                        @endif
                    </div>

                    <div class="flex items-baseline gap-1 mb-8">
                        <span class="text-xl font-black italic text-blue-500">Rp</span>
                        <h3 class="text-6xl font-black italic tracking-tighter">
                            {{ number_format($price->price / 1000, 0) }}<span class="text-2xl">k</span>
                        </h3>
                    </div>
                </div>

                <div class="relative py-10">
                    <img src="https://gmedia.playstation.com/is/image/SIEPDC/ps5-product-thumbnail-01-en-14sep21?$facebook$" 
                         class="w-full object-contain group-hover:scale-110 transition duration-700 drop-shadow-[0_20px_30px_rgba(0,0,0,0.5)]">
                    <div class="w-1/2 h-4 bg-black/40 blur-xl mx-auto rounded-full mt-4 opacity-0 group-hover:opacity-100 transition duration-700"></div>
                </div>

                <a href="#booking" class="text-center py-5 rounded-2xl font-black text-xs uppercase tracking-widest transition-all duration-300 {{ $price->is_highlight ? 'bg-blue-600 hover:bg-blue-500 shadow-xl shadow-blue-600/20' : 'bg-white text-slate-900 hover:bg-blue-600 hover:text-white' }}">
                    Pilih Paket
                </a>
            </div>
        </div>
        @empty
            <div class="col-span-full text-center py-20 bg-slate-800/20 rounded-[3rem] border border-dashed border-white/10">
                <p class="text-slate-500 italic font-bold uppercase tracking-widest text-xs">Data harga sedang diperbarui oleh tim MantaPS</p>
            </div>
        @endforelse
    </div>
</section>

<!-- INI BAGIAN KATALOG -->

<section id="catalogue" class="py-24 px-6 md:px-20">
    <div class="flex justify-between items-end mb-16">
        <div>
            <h2 class="text-4xl font-black italic uppercase tracking-tighter">Popular <span class="text-blue-500">Games</span></h2>
            <p class="text-slate-500 text-sm mt-2 uppercase tracking-widest font-bold">Koleksi Terupdate Minggu Ini</p>
        </div>
        <a href="/catalogue" class="text-blue-400 font-black text-xs uppercase hover:underline tracking-widest">Lihat Semua &rarr;</a>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-8 gap-6">
        @forelse($featuredGames as $game)
        <div class="group cursor-pointer">
            <div class="aspect-[3/4] rounded-3xl overflow-hidden mb-4 shadow-2xl border border-white/5 transition-transform duration-500 group-hover:-translate-y-2">
                <img src="{{ asset('storage/' . $game->cover_image) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
            </div>
            <h4 class="text-xs font-black truncate uppercase text-center tracking-widest text-slate-300 group-hover:text-blue-400 transition-colors">
                {{ $game->title }}
            </h4>
        </div>
        @empty
            <p class="col-span-full text-center text-slate-500 italic py-10">Katalog game sedang dipersiapkan...</p>
        @endforelse
    </div>
</section>

    <section id="booking" class="py-24 px-6 bg-slate-900">
        <div class="max-w-xl mx-auto glass p-10 rounded-[3rem]">
            <h2 class="text-2xl font-black mb-8 text-center italic uppercase tracking-tighter">Form <span class="text-blue-500">Booking</span></h2>
            <div class="space-y-6">
                <div>
                    <label class="text-[10px] font-black tracking-widest text-slate-500 uppercase">Nama Lengkap</label>
                    <input type="text" id="wa_name" class="w-full bg-slate-800/50 border border-white/5 p-4 rounded-2xl mt-2 focus:outline-blue-500" placeholder="Masukkan nama Anda...">
                </div>
                <div>
                    <label class="text-[10px] font-black tracking-widest text-slate-500 uppercase">Pilih Paket</label>
                    <select id="wa_package" class="w-full bg-slate-800/50 border border-white/5 p-4 rounded-2xl mt-2">
                        @foreach($prices as $price)
                            <option value="{{ $price->duration }}">{{ $price->duration }} - Rp{{ number_format($price->price, 0, ',', '.') }}</option>
                        @endforeach
                    </select>
                </div>
                <button onclick="sendWA()" class="w-full bg-green-600 py-5 rounded-2xl font-black uppercase tracking-widest shadow-xl shadow-green-600/20 hover:bg-green-500 transition-all flex items-center justify-center gap-3">
                    <i class="fab fa-whatsapp text-xl"></i> Order via WhatsApp
                </button>
            </div>
        </div>
    </section>

    <script>
        function sendWA() {
            const name = document.getElementById('wa_name').value;
            const pack = document.getElementById('wa_package').value;
            const waNum = "6281237063538"; // Ganti nomor Anda
            if(!name) return alert('Nama wajib diisi!');
            const msg = encodeURIComponent(`Halo MantaPS! Saya ${name} mau booking sewa PS5 paket ${pack}. Apakah slot tersedia?`);
            window.open(`https://wa.me/${waNum}?text=${msg}`, '_blank');
        }
    </script>
</body>
</html>