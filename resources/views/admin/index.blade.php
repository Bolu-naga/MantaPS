<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Kelola Game</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-white p-10 font-sans">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-black mb-8 italic">ADMIN <span class="text-blue-500">MantaPS</span></h1>

        <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data" class="bg-slate-800 p-8 rounded-3xl border border-white/5 mb-12">
            @csrf
            <div class="grid grid-cols-2 gap-6">
                <div class="flex flex-col gap-2">
                    <label class="text-xs font-bold text-slate-400">JUDUL GAME</label>
                    <input type="text" name="title" class="bg-slate-700 p-3 rounded-xl focus:outline-blue-500" required>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-xs font-bold text-slate-400">PLATFORM</label>
                    <select name="platform" class="bg-slate-700 p-3 rounded-xl">
                        <option value="PS5">PS5</option>
                        <option value="PS4">PS4</option>
                    </select>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-xs font-bold text-slate-400">COVER IMAGE</label>
                    <input type="file" name="cover_image" class="text-sm" required>
                </div>
                <div class="flex items-center gap-2 pt-6">
                    <input type="checkbox" name="is_featured" id="feat">
                    <label for="feat" class="text-xs font-bold">Featured di Home?</label>
                </div>
            </div>
            <button type="submit" class="mt-8 w-full bg-blue-600 py-3 rounded-xl font-black uppercase tracking-widest">Update Supply</button>
        </form>

        <div class="space-y-4">
            @foreach($games as $game)
            <div class="flex items-center justify-between bg-slate-800/50 p-4 rounded-2xl border border-white/5">
                <div class="flex items-center gap-4">
                    <img src="{{ asset('storage/' . $game->cover_image) }}" class="w-12 h-16 object-cover rounded-lg">
                    <div>
                        <h4 class="font-bold">{{ $game->title }}</h4>
                        <span class="text-[10px] bg-blue-600 px-2 py-0.5 rounded-full">{{ $game->platform }}</span>
                    </div>
                </div>
                <form action="{{ route('admin.destroy', $game->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <button class="bg-red-500/10 text-red-500 p-3 rounded-xl hover:bg-red-500 hover:text-white transition">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>