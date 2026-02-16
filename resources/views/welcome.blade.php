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

    <nav class="fixed w-full z-50 glass px-6 md:px-20 py-4 flex justify-between items-center">
        <a href="/">
            <img src="{{ asset('assets/LOGO_MANTAPS.png') }}" alt="MantaPS Logo" class="h-8 md:h-10">
        </a>
        <div class="hidden md:flex space-x-8 text-[10px] font-black uppercase tracking-widest">
            <a href="#home" class="hover:text-blue-400">Beranda</a>
            <a href="#paket" class="hover:text-blue-400">Harga</a>
            <a href="#catalogue" class="hover:text-blue-400">Katalog Game</a>
        </div>
        <a href="#booking" class="bg-blue-600 px-6 py-2 rounded-full font-black text-[10px] uppercase shadow-lg shadow-blue-600/30 transition-all hover:scale-105">Booking Now</a>
    </nav>

    <section id="home" class="relative pt-40 pb-20 px-6 text-center overflow-hidden">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[600px] bg-blue-500/10 blur-[120px] rounded-full -z-10"></div>
        <div class="max-w-4xl mx-auto">
            <span class="inline-block px-4 py-1.5 rounded-full bg-blue-500/10 text-blue-400 text-[10px] font-black tracking-widest uppercase mb-6 border border-blue-500/20">PlayStation 5 Ready</span>
            <h1 class="text-5xl md:text-8xl font-black italic tracking-tighter leading-none mb-8 uppercase">
                Bawa Pulang <br> <span class="text-gradient">Keseruan Tanpa Batas</span>
            </h1>
            <p class="text-slate-400 text-sm md:text-lg leading-relaxed max-w-2xl mx-auto mb-10">
                Sewa PS5 harian termurah & terpercaya. Unit lengkap dengan game terbaru, siap diantar langsung ke rumah Anda.
            </p>
        </div>
    </section>

    <section id="paket" class="py-20 px-6 md:px-20 bg-[#0a101f]">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-black italic uppercase tracking-tighter">Daily <span class="text-blue-500">Price List</span></h2>
            <div class="h-1.5 w-20 bg-blue-600 mx-auto mt-4 rounded-full"></div>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($prices as $price)
            <div class="{{ $price->is_highlight ? 'bg-[#1a2040] border-blue-500/50' : 'bg-white text-slate-900 border-transparent' }} border-2 rounded-[2.5rem] p-8 flex flex-col justify-between shadow-2xl transition hover:-translate-y-2 group">
                <div>
                    <h3 class="text-5xl font-black italic tracking-tighter">{{ number_format($price->price / 1000, 0) }}k</h3>
                    <p class="font-bold uppercase text-[10px] opacity-60 mt-1">{{ $price->duration }}</p>
                </div>
                <img src="https://gmedia.playstation.com/is/image/SIEPDC/ps5-product-thumbnail-01-en-14sep21?$facebook$" class="w-full my-8 group-hover:scale-105 transition duration-500 drop-shadow-2xl">
                <a href="#booking" class="text-center py-4 rounded-2xl font-black text-[10px] uppercase {{ $price->is_highlight ? 'bg-blue-600 text-white' : 'bg-slate-900 text-white' }}">Pilih Paket</a>
            </div>
            @empty
                <p class="col-span-full text-center text-slate-500 italic">Data harga sedang diperbarui...</p>
            @endforelse
        </div>
    </section>

    <section id="catalogue" class="py-24 px-6 md:px-20">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="text-3xl font-black italic uppercase tracking-tighter">Popular <span class="text-blue-500">Games</span></h2>
                <p class="text-slate-500 text-xs mt-2 uppercase tracking-widest font-bold">Koleksi Terupdate Minggu Ini</p>
            </div>
            <a href="/catalogue" class="text-blue-400 font-black text-[10px] uppercase hover:underline">Lihat Semua &rarr;</a>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-8 gap-4">
            @forelse($featuredGames as $game)
            <div class="group">
                <div class="aspect-[3/4] rounded-2xl overflow-hidden mb-3 shadow-xl border border-white/5">
                    <img src="{{ asset('storage/' . $game->cover_image) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                </div>
                <h4 class="text-[10px] font-black truncate uppercase text-center tracking-widest text-slate-400">{{ $game->title }}</h4>
            </div>
            @empty
                <p class="col-span-full text-center text-slate-500 italic">Katalog game sedang dipersiapkan...</p>
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
            const waNum = "628123456789"; // Ganti nomor Anda
            if(!name) return alert('Nama wajib diisi!');
            const msg = encodeURIComponent(`Halo MantaPS! Saya ${name} mau booking sewa PS5 paket ${pack}. Apakah slot tersedia?`);
            window.open(`https://wa.me/${waNum}?text=${msg}`, '_blank');
        }
    </script>
</body>
</html>