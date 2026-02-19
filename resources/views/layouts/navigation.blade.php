<nav x-data="{ open: false }" class="bg-[#0f172a] border-b border-white/5 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center gap-8">
                <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                    <div class="w-8 h-8 rounded-full bg-white/5 flex items-center justify-center group-hover:bg-blue-600 transition-all shadow-lg">
                        <i class="fas fa-home text-[10px] text-slate-400 group-hover:text-white"></i>
                    </div>
                    <span class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 group-hover:text-white transition">Lihat Website</span>
                </a>

                <div class="hidden space-x-8 sm:-my-px sm:flex border-l border-white/10 pl-8">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-[10px] font-black uppercase tracking-widest !text-blue-500 border-blue-500">
                        {{ __('Inventory Admin') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-white/5 text-[10px] font-black uppercase tracking-widest rounded-xl text-slate-400 bg-white/5 hover:text-white transition">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-2 italic text-blue-500 opacity-50">#Pemilik</div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="text-[10px] font-bold uppercase">Profile</x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-[10px] font-bold uppercase text-red-500">
                                Keluar
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>