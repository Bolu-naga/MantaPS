<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Semua Koleksi Game - MantaPS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0f172a] text-slate-200 p-10 font-sans">
    <div class="max-w-7xl mx-auto">
        <a href="/" class="text-blue-400 font-bold mb-10 inline-block">&larr; Back to Home</a>
        <h1 class="text-4xl font-black mb-12 italic">GAME <span class="text-blue-500">CATALOGUE</span></h1>
        
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">
            @foreach($allGames as $game)
            <div class="bg-slate-800/30 p-4 rounded-3xl border border-white/5 hover:border-blue-500 transition group">
                <div class="aspect-[3/4] rounded-2xl overflow-hidden mb-4 shadow-2xl">
                    <img src="{{ asset('storage/' . $game->cover_image) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                </div>
                <h3 class="font-bold text-sm text-center">{{ $game->title }}</h3>
                <p class="text-center text-[10px] text-blue-400 mt-2 font-black uppercase tracking-widest">{{ $game->platform }}</p>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>