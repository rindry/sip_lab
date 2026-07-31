<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h2 class="font-extrabold text-3xl text-gray-900 tracking-tight">
                    {{ __('Registrasi Inventaris') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Tambahkan aset atau material baru ke dalam basis data laboratorium.
                </p>
            </div>
            <a href="{{ route('admin.items.index') }}"
                class="inline-flex items-center gap-2 text-sm font-bold text-gray-400 hover:text-indigo-600 transition-colors group">
                <svg class="w-5 h-5 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Daftar
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-[#F9FAFB] min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl shadow-gray-200/50 rounded-[2.5rem] border border-gray-100">

                <div class="px-8 py-6 border-b border-gray-50 bg-indigo-50/30 flex items-center gap-4">
                    <div class="bg-indigo-600 p-3 rounded-2xl text-white shadow-lg shadow-indigo-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-black text-gray-900">Formulir Input Data</h3>
                        <p class="text-xs text-indigo-500 font-bold uppercase tracking-wider">Lengkapi spesifikasi item
                            di bawah ini</p>
                    </div>
                </div>

                <div class="p-8 md:p-12">
                    <form method="POST" action="{{ route('admin.items.store') }}" class="space-y-10">
                        @csrf

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

                            <div class="space-y-6">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="w-8 h-px bg-indigo-200"></span>
                                    <h4 class="text-[10px] font-black text-indigo-500 uppercase tracking-[0.2em]">1.
                                        Identitas Item</h4>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Kode
                                        Inventaris</label>
                                    <div class="relative group">
                                        <div
                                            class="absolute inset-y-0 start-0 flex items-center ps-4 pointer-events-none text-gray-400 group-focus-within:text-indigo-500 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01" />
                                            </svg>
                                        </div>
                                        <input type="text" name="code" value="{{ old('code') }}"
                                            placeholder="Misal: KOMP-001"
                                            class="bg-gray-50 border-transparent text-gray-900 font-mono font-bold text-sm rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 focus:bg-white block w-full ps-12 p-4 transition-all @error('code') border-red-500 bg-red-50 @enderror"
                                            required>
                                    </div>
                                    @error('code')
                                        <p class="text-xs text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Nama Alat /
                                        Bahan</label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        placeholder="Masukkan nama lengkap item..."
                                        class="bg-gray-50 border-transparent text-gray-900 font-bold text-sm rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 focus:bg-white block w-full p-4 transition-all @error('name') border-red-500 bg-red-50 @enderror"
                                        required>
                                    @error('name')
                                        <p class="text-xs text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Tipe Item</label>
                                    <select name="type"
                                        class="bg-gray-50 border-transparent text-gray-900 text-sm font-bold rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 focus:bg-white block w-full p-4 transition-all shadow-sm">
                                        <option value="barang">Barang (Aset/Bisa Dipinjam)</option>
                                        <option value="bahan">Bahan (Habis Pakai)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="space-y-6">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="w-8 h-px bg-indigo-200"></span>
                                    <h4 class="text-[10px] font-black text-indigo-500 uppercase tracking-[0.2em]">2.
                                        Detail Penempatan</h4>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Penempatan
                                        Lab</label>
                                    <select name="jenis_lab"
                                        class="bg-gray-50 border-transparent text-gray-900 text-sm font-bold rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 focus:bg-white block w-full p-4 transition-all shadow-sm">
                                        <option value="Lab Komputer">Lab Komputer</option>
                                        <option value="Lab Jaringan">Lab Jaringan</option>
                                        <option value="Lab Multimedia">Lab Multimedia</option>
                                        <option value="Gudang Umum">Gudang Umum</option>
                                    </select>
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Jumlah
                                            Stok</label>
                                        <div class="relative group">
                                            <input type="number" name="stock" value="{{ old('stock', 0) }}"
                                                min="0"
                                                class="bg-gray-50 border-transparent text-gray-900 font-black text-sm rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 focus:bg-white block w-full p-4 transition-all"
                                                required>
                                            <span
                                                class="absolute right-4 top-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Unit</span>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Lokasi
                                            Rak</label>
                                        <input type="text" name="location" value="{{ old('location') }}"
                                            placeholder="Misal: A-12"
                                            class="bg-gray-50 border-transparent text-gray-900 text-sm font-bold rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 focus:bg-white block w-full p-4 transition-all">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pt-6">
                            <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Informasi Spesifikasi /
                                Deskripsi</label>
                            <textarea name="description" rows="4"
                                class="bg-gray-50 border-transparent text-gray-900 text-sm rounded-[1.5rem] focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 focus:bg-white block w-full p-5 transition-all resize-none shadow-inner"
                                placeholder="Masukkan detail teknis, merk, atau kondisi khusus barang..."></textarea>
                        </div>

                        <div class="flex items-center justify-end gap-4 pt-10 border-t border-gray-50">
                            <a href="{{ route('admin.items.index') }}"
                                class="px-6 py-3 text-sm font-bold text-gray-400 hover:text-gray-600 transition-colors uppercase tracking-widest">
                                Batalkan
                            </a>
                            <button type="submit"
                                class="inline-flex items-center px-10 py-4 bg-indigo-600 text-white rounded-[1.5rem] font-black text-xs uppercase tracking-[0.2em] hover:bg-indigo-700 shadow-xl shadow-indigo-100 transition-all transform active:scale-95">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="3"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                Simpan ke Sistem
                            </button>
                        </div>

                    </form>
                </div>
            </div>

            <p class="mt-8 text-center text-[10px] text-gray-300 font-bold uppercase tracking-[0.3em]">Authorized
                Personnel Only • SIP-LAB v1.0</p>
        </div>
    </div>
</x-app-layout>
