<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center bg-slate-50 relative overflow-hidden font-sans">

        <div
            class="absolute top-0 left-0 -mt-20 -ml-20 w-96 h-96 bg-indigo-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob">
        </div>
        <div
            class="absolute bottom-0 right-0 -mb-20 -mr-20 w-96 h-96 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000">
        </div>

        <div
            class="w-full max-w-md bg-white rounded-[2.5rem] shadow-2xl shadow-indigo-100 border border-gray-100 relative z-10 overflow-hidden">

            <div class="pt-10 pb-6 px-10 text-center">
                <div
                    class="inline-flex items-center justify-center w-20 h-20 rounded-3xl bg-indigo-600 mb-6 shadow-xl shadow-indigo-200 transform -rotate-3 hover:rotate-0 transition-transform duration-300">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                </div>
                <h1 class="text-2xl font-black text-gray-900 tracking-tighter uppercase leading-tight">
                    SIP<span class="text-indigo-600">LAB</span> POLITEKNIK
                </h1>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-[0.2em] mt-2">Laboratory Management System
                </p>
            </div>

            <div class="px-10 pb-10 pt-2">
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="email"
                            class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1 mb-1.5">Email
                            Akses</label>
                        <div class="relative group">
                            <div
                                class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-indigo-600 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206"
                                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <input id="email" type="email" name="email" :value="old('email')" required
                                autofocus
                                class="block w-full pl-11 pr-4 py-3.5 bg-gray-50 border-transparent rounded-2xl text-sm font-semibold focus:bg-white focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 transition-all duration-200"
                                placeholder="nim@politeknikjambi.ac.id" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div>
                        <div class="flex justify-between items-center mb-1.5 ml-1">
                            <label for="password"
                                class="block text-[10px] font-black text-gray-400 uppercase tracking-widest">Kata
                                Sandi</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                    class="text-[10px] font-bold text-indigo-600 hover:text-indigo-700 uppercase tracking-widest transition">Lupa?</a>
                            @endif
                        </div>
                        <div class="relative group">
                            <div
                                class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-indigo-600 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <input id="password" type="password" name="password" required
                                class="block w-full pl-11 pr-4 py-3.5 bg-gray-50 border-transparent rounded-2xl text-sm font-semibold focus:bg-white focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 transition-all duration-200"
                                placeholder="••••••••" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="flex items-center ml-1">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                            <input id="remember_me" type="checkbox" name="remember"
                                class="w-4 h-4 rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 transition-all cursor-pointer">
                            <span
                                class="ml-2 text-xs font-bold text-gray-500 group-hover:text-gray-700 transition select-none">Biarkan
                                saya tetap masuk</span>
                        </label>
                    </div>

                    <div class="pt-2">
                        <button type="submit"
                            class="w-full flex justify-center items-center py-4 px-4 bg-indigo-600 text-white rounded-2xl font-black text-xs uppercase tracking-[0.2em] hover:bg-indigo-700 shadow-xl shadow-indigo-100 transition-all transform active:scale-95">
                            Otentikasi Masuk
                        </button>
                    </div>
                </form>
            </div>

            <div class="bg-gray-50/50 py-5 text-center border-t border-gray-50">
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                    &copy; {{ date('Y') }} Politeknik Jambi • Versi 1.0.4
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
