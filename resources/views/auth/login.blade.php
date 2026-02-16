<x-guest-layout>
    <div class="mb-8 text-center">
        <h2 class="text-3xl font-black italic uppercase tracking-tighter">Admin <span class="text-blue-500">Login</span></h2>
        <p class="text-slate-500 text-[10px] font-bold uppercase tracking-widest mt-2">Masuk untuk kelola katalog game</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <div>
            <label class="text-[10px] font-black tracking-widest text-slate-500 uppercase">Email</label>
            <input type="email" name="email" class="w-full bg-slate-800/50 border border-white/5 p-4 rounded-2xl mt-2 focus:outline-blue-500 text-white" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <label class="text-[10px] font-black tracking-widest text-slate-500 uppercase">Password</label>
            <input type="password" name="password" class="w-full bg-slate-800/50 border border-white/5 p-4 rounded-2xl mt-2 focus:outline-blue-500 text-white" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" name="remember">
                <span class="ms-2 text-sm text-slate-400">Ingat saya</span>
            </label>
        </div>

        <div class="flex flex-col gap-4">
            <button class="w-full bg-blue-600 py-4 rounded-2xl font-black uppercase tracking-widest shadow-xl shadow-blue-600/20 hover:bg-blue-500 transition-all">
                Log in
            </button>
            
            @if (Route::has('password.request'))
                <a class="text-center text-[10px] font-black uppercase tracking-widest text-slate-500 hover:text-white" href="{{ route('password.request') }}">
                    Lupa password?
                </a>
            @endif
        </div>
    </form>
</x-guest-layout>