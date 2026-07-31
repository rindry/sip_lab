<x-guest-layout>
    <div
        class="min-h-screen flex flex-col justify-center items-center bg-slate-50 relative overflow-hidden font-sans py-12">

        <div
            class="absolute top-0 left-0 -mt-20 -ml-20 w-96 h-96 bg-indigo-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob">
        </div>
        <div
            class="absolute bottom-0 right-0 -mb-20 -mr-20 w-96 h-96 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000">
        </div>

        <div
            class="w-full max-w-lg bg-white rounded-[2.5rem] shadow-2xl shadow-indigo-100 border border-gray-100 relative z-10 overflow-hidden">

            <div class="pt-10 pb-6 px-10 text-center border-b border-gray-50">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-indigo-600 mb-4 shadow-lg shadow-indigo-200">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                </div>
                <h1 class="text-2xl font-black text-gray-900 tracking-tight uppercase">
                    Buat Akun <span class="text-indigo-600">Baru</span>
                </h1>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em] mt-2">Sistem Informasi
                    Laboratorium</p>
            </div>

            <div class="p-10">
                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="name"
                            class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1 mb-1.5">Nama
                            Lengkap</label>
                        <div class="relative group">
                            <div
                                class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-indigo-600 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <input id="name" type="text" name="name" :value="old('name')" required
                                autofocus
                                class="block w-full pl-11 pr-4 py-3 bg-gray-50 border-transparent rounded-2xl text-sm font-semibold focus:bg-white focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 transition-all duration-200"
                                placeholder="Nama lengkap Anda" />
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-1" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="email"
                                class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1 mb-1.5">Alamat
                                Email</label>
                            <input id="email" type="email" name="email" :value="old('email')" required
                                class="block w-full px-4 py-3 bg-gray-50 border-transparent rounded-2xl text-sm font-semibold focus:bg-white focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 transition-all duration-200"
                                placeholder="nama@email.com" />
                            <x-input-error :messages="$errors->get('email')" class="mt-1" />
                        </div>

                        <div>
                            <label for="role"
                                class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1 mb-1.5">Role
                                Pengguna</label>
                            <div class="relative">
                                <select id="role" name="role" required
                                    class="block w-full px-4 py-3 bg-indigo-50 border-transparent rounded-2xl text-sm font-bold text-indigo-600 appearance-none cursor-not-allowed focus:ring-0">
                                    <option value="mahasiswa" selected>Mahasiswa</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-indigo-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="password"
                                class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1 mb-1.5">Kata
                                Sandi</label>
                            <input id="password" type="password" name="password" required
                                class="block w-full px-4 py-3 bg-gray-50 border-transparent rounded-2xl text-sm font-semibold focus:bg-white focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 transition-all duration-200"
                                placeholder="••••••••" />
                            <x-input-error :messages="$errors->get('password')" class="mt-1" />
                        </div>

                        <div>
                            <label for="password_confirmation"
                                class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1 mb-1.5">Ulangi
                                Sandi</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" required
                                class="block w-full px-4 py-3 bg-gray-50 border-transparent rounded-2xl text-sm font-semibold focus:bg-white focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 transition-all duration-200"
                                placeholder="••••••••" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                        </div>
                    </div>

                    <div class="pt-4 flex flex-col gap-4">
                        <button type="submit"
                            class="w-full flex justify-center items-center py-4 bg-indigo-600 text-white rounded-2xl font-black text-xs uppercase tracking-[0.2em] hover:bg-indigo-700 shadow-xl shadow-indigo-100 transition-all transform active:scale-95">
                            Daftarkan Akun
                        </button>

                        <div class="text-center">
                            <a href="{{ route('login') }}"
                                class="text-[11px] font-bold text-gray-400 hover:text-indigo-600 transition-colors uppercase tracking-widest">
                                Sudah punya akun? <span class="text-indigo-600 underline underline-offset-4 ml-1">Masuk
                                    Sesi</span>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
