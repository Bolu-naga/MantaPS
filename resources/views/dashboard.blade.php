<x-app-layout>
    <div class="py-12 bg-[#0f172a] min-h-screen text-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-800 p-8 rounded-[2.5rem] border border-white/10 shadow-2xl">
                
                <div class="flex justify-between items-center mb-10">
                    <div>
                        <h2 class="text-3xl font-black italic uppercase tracking-tighter">
                            Admin <span class="text-blue-500">MantaPS</span>
                        </h2>
                        <p class="text-slate-500 text-[10px] font-bold uppercase tracking-widest mt-1">Kelola Katalog Game & Harga</p>
                    </div>

                    {{-- TOMBOL TAMBAH GAME YANG KAMU CARI --}}
                    <a href="{{ route('game.create') }}" class="bg-blue-600 px-8 py-3 rounded-full font-black text-[11px] uppercase shadow-lg shadow-blue-600/30 hover:scale-105 transition-all">
                        + Tambah Game Baru
                    </a>
                </div>

                <hr class="border-white/5 mb-8">

                {{-- Tabel Daftar Game --}}
                <div class="grid grid-cols-1 gap-4">
                    @forelse($games as $game)
                        <div class="flex items-center justify-between p-5 bg-slate-900 rounded-3xl border border-white/5 group hover:border-blue-500/30 transition">
                            <div class="flex items-center gap-6">
                                <img src="{{ asset('storage/' . $game->cover_image) }}" class="w-16 h-20 object-cover rounded-2xl shadow-xl">
                                <div>
                                    <h4 class="font-black uppercase text-sm tracking-tight">{{ $game->title }}</h4>
                                    @if($game->is_featured)
                                        <span class="mt-2 inline-block px-2 py-0.5 rounded-full bg-blue-500/10 text-blue-400 text-[8px] font-black uppercase border border-blue-500/20">Featured</span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="flex gap-4">
                                <form action="{{ route('game.destroy', $game) }}" method="POST" onsubmit="return confirm('Hapus game ini dari MantaPS?')">
                                    @csrf @method('DELETE')
                                    <button class="text-red-500 text-[10px] font-black uppercase hover:text-red-400 transition">Hapus</button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-20">
                            <p class="text-slate-500 italic">Belum ada game di katalog. Klik tombol di atas untuk menambah.</p>
                        </div>
                    @endforelse
                </div>

            </div>
        </div>
    </div>
</x-app-layout>