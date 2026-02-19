<x-app-layout>
    <div class="py-12 bg-[#0f172a] min-h-screen text-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-500/20 border border-green-500/50 text-green-400 rounded-2xl flex items-center gap-3 animate-bounce">
                    <i class="fas fa-check-circle"></i>
                    <span class="text-xs font-bold uppercase tracking-widest">{{ session('success') }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-slate-800/50 p-6 rounded-3xl border border-white/5">
                    <p class="text-[10px] font-black uppercase text-slate-500 tracking-widest">Total Katalog</p>
                    <h3 class="text-3xl font-black italic mt-1">{{ $games->count() }} <span class="text-blue-500">Games</span></h3>
                </div>
                <div class="bg-slate-800/50 p-6 rounded-3xl border border-white/5">
                    <p class="text-[10px] font-black uppercase text-slate-500 tracking-widest">Featured</p>
                    <h3 class="text-3xl font-black italic mt-1 text-yellow-500">{{ $games->where('is_featured', true)->count() }}</h3>
                </div>
                <div class="bg-slate-800/50 p-6 rounded-3xl border border-white/5 flex items-center justify-between">
                    <div>
                        <p class="text-[10px] font-black uppercase text-slate-500 tracking-widest">Status Server</p>
                        <h3 class="text-lg font-black italic mt-1 text-green-400">ONLINE</h3>
                    </div>
                    <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></div>
                </div>
            </div>

            <div class="bg-slate-800 p-8 rounded-[2.5rem] border border-white/10 shadow-2xl">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-10">
                    <div>
                        <h2 class="text-3xl font-black italic uppercase tracking-tighter">
                            Admin <span class="text-blue-500">MantaPS</span>
                        </h2>
                        <p class="text-slate-500 text-[10px] font-bold uppercase tracking-widest mt-1">Kelola Katalog Game & Harga</p>
                    </div>

                    <div class="flex gap-4">
                         <a href="{{ url('/') }}" target="_blank" class="bg-white/5 border border-white/10 px-6 py-3 rounded-full font-black text-[10px] uppercase hover:bg-white/10 transition-all flex items-center gap-2">
                            <i class="fas fa-external-link-alt text-[10px]"></i> Preview Site
                        </a>
                        <a href="{{ route('game.create') }}" class="bg-blue-600 px-8 py-3 rounded-full font-black text-[11px] uppercase shadow-lg shadow-blue-600/30 hover:scale-105 transition-all flex items-center gap-2">
                            <i class="fas fa-plus"></i> Tambah Game
                        </a>
                    </div>
                </div>

                <hr class="border-white/5 mb-8">

                {{-- Tabel Daftar Game --}}
                <div class="grid grid-cols-1 gap-4">
                    @forelse($games as $game)
                        <div class="flex items-center justify-between p-5 bg-slate-900 rounded-3xl border border-white/5 group hover:border-blue-500/30 transition">
                            <div class="flex items-center gap-6">
                                <div class="relative">
                                    <img src="{{ asset('storage/' . $game->cover_image) }}" class="w-16 h-20 object-cover rounded-2xl shadow-xl group-hover:scale-105 transition duration-500">
                                    @if($game->is_featured)
                                        <div class="absolute -top-2 -right-2 w-6 h-6 bg-yellow-500 rounded-full flex items-center justify-center border-4 border-slate-900 shadow-lg" title="Featured">
                                            <i class="fas fa-star text-[8px] text-slate-900"></i>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <h4 class="font-black uppercase text-sm tracking-tight group-hover:text-blue-400 transition">{{ $game->title }}</h4>
                                    <p class="text-[9px] text-slate-500 uppercase font-bold mt-1">ID: #PS5-{{ str_pad($game->id, 3, '0', STR_PAD_LEFT) }}</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center gap-3">
                                {{-- Tombol Edit (Opsional jika ingin dibuat nanti) --}}
                                <button class="p-3 bg-white/5 rounded-xl hover:bg-white/10 transition text-slate-400 hover:text-white">
                                    <i class="fas fa-edit text-xs"></i>
                                </button>

                                <form action="{{ route('game.destroy', $game) }}" method="POST" onsubmit="return confirm('Hapus game ini dari MantaPS?')">
                                    @csrf @method('DELETE')
                                    <button class="p-3 bg-red-500/10 rounded-xl text-red-500 hover:bg-red-500 hover:text-white transition">
                                        <i class="fas fa-trash-alt text-xs"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-24 bg-slate-900/50 rounded-[2rem] border border-dashed border-white/5">
                            <i class="fas fa-gamepad text-4xl text-slate-700 mb-4"></i>
                            <p class="text-slate-500 italic text-sm">Belum ada game di katalog. Mulailah membangun koleksimu!</p>
                        </div>
                    @endforelse
                </div>

            </div>
        </div>
    </div>
</x-app-layout>