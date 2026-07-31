<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h2 class="font-extrabold text-3xl text-gray-900 tracking-tight">
                    {{ __('Edit Inventaris') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Mode pembaruan data untuk aset dan bahan laboratorium.
                </p>
            </div>
            <a href="{{ route('admin.items.index') }}"
                class="inline-flex items-center gap-2 text-sm font-bold text-gray-400 hover:text-indigo-600 transition-colors group">
                <svg class="w-5 h-5 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Inventaris
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-[#F9FAFB] min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl shadow-gray-200/50 rounded-[2.5rem] border border-gray-100">

                <div class="px-8 py-6 border-b border-gray-50 bg-amber-50/30 flex items-center gap-4">
                    <div class="bg-amber-500 p-3 rounded-2xl text-white shadow-lg shadow-amber-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-black text-gray-900">Konfigurasi Item</h3>
                        <p class="text-xs text-amber-600 font-bold uppercase tracking-wider">Sedang Mengedit:
                            {{ $item->name }}</p>
                    </div>
                </div>

                <div class="p-8 md:p-12">
                    <form method="POST" action="{{ route('admin.items.update', $item->id) }}" class="space-y-10">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

                            <div class="space-y-6">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="w-8 h-px bg-amber-200"></span>
                                    <h4 class="text-[10px] font-black text-amber-500 uppercase tracking-[0.2em]">1.
                                        Identitas Utama</h4>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Kode Unik
                                        (ID)</label>
                                    <input type="text" name="code" value="{{ old('code', $item->code) }}"
                                        class="bg-gray-50 border-transparent text-gray-900 font-mono font-bold text-sm rounded-2xl focus:ring-4 focus:ring-amber-100 focus:border-amber-500 focus:bg-white block w-full p-4 transition-all @error('code') border-red-500 bg-red-50 @enderror"
                                        required>
                                    @error('code')
                                        <p class="text-xs text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Nama Item</label>
                                    <input type="text" name="name" value="{{ old('name', $item->name) }}"
                                        class="bg-gray-50 border-transparent text-gray-900 font-bold text-sm rounded-2xl focus:ring-4 focus:ring-amber-100 focus:border-amber-500 focus:bg-white block w-full p-4 transition-all @error('name') border-red-500 bg-red-50 @enderror"
                                        required>
                                    @error('name')
                                        <p class="text-xs text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Tipe
                                        Inventaris</label>
                                    <select name="type"
                                        class="bg-gray-50 border-transparent text-gray-900 text-sm font-bold rounded-2xl focus:ring-4 focus:ring-amber-100 focus:border-amber-500 focus:bg-white block w-full p-4 transition-all">
                                        <option value="barang"
                                            {{ old('type', $item->type) == 'barang' ? 'selected' : '' }}>Barang
                                            (Aset/Pinjam)</option>
                                        <option value="bahan"
                                            {{ old('type', $item->type) == 'bahan' ? 'selected' : '' }}>Bahan (Habis
                                            Pakai)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="space-y-6">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="w-8 h-px bg-amber-200"></span>
                                    <h4 class="text-[10px] font-black text-amber-500 uppercase tracking-[0.2em]">2.
                                        Detail Logistik</h4>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Lokasi
                                        Laboratorium</label>
                                    <select name="jenis_lab"
                                        class="bg-gray-50 border-transparent text-gray-900 text-sm font-bold rounded-2xl focus:ring-4 focus:ring-amber-100 focus:border-amber-500 focus:bg-white block w-full p-4 transition-all">
                                        <option value="Lab Komputer"
                                            {{ old('jenis_lab', $item->jenis_lab) == 'Lab Komputer' ? 'selected' : '' }}>
                                            Lab Komputer</option>
                                        <option value="Lab Jaringan"
                                            {{ old('jenis_lab', $item->jenis_lab) == 'Lab Jaringan' ? 'selected' : '' }}>
                                            Lab Jaringan</option>
                                        <option value="Lab Multimedia"
                                            {{ old('jenis_lab', $item->jenis_lab) == 'Lab Multimedia' ? 'selected' : '' }}>
                                            Lab Multimedia</option>
                                        <option value="Gudang Umum"
                                            {{ old('jenis_lab', $item->jenis_lab) == 'Gudang Umum' ? 'selected' : '' }}>
                                            Gudang Umum</option>
                                    </select>
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Stok
                                            Tersedia</label>
                                        <div class="relative">
                                            <input type="number" name="stock"
                                                value="{{ old('stock', $item->stock) }}" min="0"
                                                class="bg-gray-50 border-transparent text-gray-900 font-black text-sm rounded-2xl focus:ring-4 focus:ring-amber-100 focus:border-amber-500 focus:bg-white block w-full p-4 transition-all"
                                                required>
                                            <span
                                                class="absolute right-4 top-4 text-[10px] font-black text-gray-400 uppercase">Unit</span>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Posisi
                                            Rak</label>
                                        <input type="text" name="location"
                                            value="{{ old('location', $item->location) }}"
                                            class="bg-gray-50 border-transparent text-gray-900 text-sm font-bold rounded-2xl focus:ring-4 focus:ring-amber-100 focus:border-amber-500 focus:bg-white block w-full p-4 transition-all"
                                            placeholder="Misal: A-01">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pt-6">
                            <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Informasi Tambahan /
                                Deskripsi</label>
                            <textarea name="description" rows="4"
                                class="bg-gray-50 border-transparent text-gray-900 text-sm rounded-2xl focus:ring-4 focus:ring-amber-100 focus:border-amber-500 focus:bg-white block w-full p-4 transition-all resize-none shadow-inner"
                                placeholder="Masukkan spesifikasi teknis atau catatan kondisi barang...">{{ old('description', $item->description) }}</textarea>
                        </div>

                        <div class="flex items-center justify-end gap-4 pt-10 border-t border-gray-50">
                            <a href="{{ route('admin.items.index') }}"
                                class="px-6 py-3 text-sm font-bold text-gray-400 hover:text-gray-600 transition-colors uppercase tracking-widest">
                                Batalkan
                            </a>
                            <button type="submit"
                                class="inline-flex items-center px-10 py-4 bg-amber-500 text-white rounded-[1.5rem] font-black text-xs uppercase tracking-[0.2em] hover:bg-amber-600 shadow-xl shadow-amber-100 transition-all transform active:scale-95">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="3"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                </svg>
                                Update Database
                            </button>
                        </div>

                    </form>
                </div>
            </div>

            <p class="mt-8 text-center text-[10px] text-gray-300 font-bold uppercase tracking-[0.3em]">Build ID:
                LAB-SYS-{{ $item->id }}</p>
        </div>
    </div>
</x-app-layout>
