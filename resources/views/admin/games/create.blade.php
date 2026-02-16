<x-app-layout>
    <div class="py-12 bg-[#0f172a] min-h-screen text-white">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            
            {{-- PERBAIKAN: Tambahkan ini agar kamu tahu kalau ada yang error --}}
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-500/20 border border-red-500 text-red-500 rounded-2xl">
                    <ul class="list-disc list-inside text-xs font-bold uppercase tracking-widest">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-slate-800 p-8 rounded-[2rem] border border-white/10 shadow-2xl">
                <h2 class="text-2xl font-black italic uppercase mb-8">Tambah <span class="text-blue-500">Game Baru</span></h2>
                
                {{-- Pastikan @csrf dan enctype sudah ada --}}
                <form action="{{ route('game.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    <div>
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-500">Judul Game</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="w-full bg-slate-900 border-none rounded-xl mt-2 text-white focus:ring-blue-500" required>
                    </div>

                    <div>
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-500">Cover Image (Poster)</label>
                        <input type="file" name="cover_image" class="w-full mt-2 text-sm text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-blue-600 file:text-white hover:file:bg-blue-500" required>
                    </div>

                    <div class="flex items-center gap-3">
                        <input type="checkbox" name="is_featured" value="1" class="rounded border-gray-700 bg-slate-900 text-blue-600 focus:ring-blue-500">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-400">Munculkan di Landing Page (Featured)</label>
                    </div>

                    <button type="submit" class="w-full bg-blue-600 py-4 rounded-xl font-black uppercase tracking-widest hover:bg-blue-500 transition-all">
                        Simpan Game
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>