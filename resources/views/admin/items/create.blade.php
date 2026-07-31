<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="p-2 bg-indigo-100 rounded-xl">
                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
            </div>
            <div>
                <h2 class="font-extrabold text-2xl text-gray-900 leading-tight">Tambah Inventaris</h2>
                <p class="text-xs text-gray-500 mt-0.5">Daftarkan aset atau bahan baru ke dalam sistem laboratorium.</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-[#F9FAFB] min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white overflow-hidden shadow-xl shadow-gray-200/50 rounded-[2.5rem] border border-gray-100 p-8 md:p-12">

                <form action="{{ route('admin.items.store') }}" method="POST" class="space-y-8">
                    @csrf

                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Kode Barang</label>
                                <input type="text" name="code"
                                    class="block w-full px-4 py-3 rounded-2xl border-transparent bg-gray-50 text-gray-700 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50 transition-all font-mono"
                                    required placeholder="Contoh: KOMP-001">
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Tipe Inventaris</label>
                                <select name="type"
                                    class="block w-full px-4 py-3 rounded-2xl border-transparent bg-gray-50 text-gray-700 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50 transition-all"
                                    required>
                                    <option value="barang">Barang (Aset/Dipinjam)</option>
                                    <option value="bahan">Bahan (Habis Pakai)</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Nama Barang / Bahan</label>
                            <input type="text" name="name"
                                class="block w-full px-4 py-3 rounded-2xl border-transparent bg-gray-50 text-gray-700 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50 transition-all"
                                required placeholder="Masukkan nama lengkap item">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-6 border-t border-gray-50">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Jenis Laboratorium</label>
                            <select name="jenis_lab"
                                class="block w-full px-4 py-3 rounded-2xl border-transparent bg-gray-50 text-gray-700 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50 transition-all">
                                <option value="Lab Komputer">Lab Komputer</option>
                                <option value="Lab Jaringan">Lab Jaringan</option>
                                <option value="Lab Multimedia">Lab Multimedia</option>
                                <option value="Gudang Umum">Gudang Umum</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Lokasi (Rak/Lemari)</label>
                            <input type="text" name="location"
                                class="block w-full px-4 py-3 rounded-2xl border-transparent bg-gray-50 text-gray-700 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50 transition-all"
                                placeholder="Contoh: Rak A-12">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Stok Awal</label>
                            <div class="relative">
                                <input type="number" name="stock" min="0"
                                    class="block w-full px-4 py-3 rounded-2xl border-transparent bg-gray-50 text-gray-700 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50 transition-all"
                                    required placeholder="0">
                                <span class="absolute right-4 top-3.5 text-xs font-bold text-gray-400">Unit</span>
                            </div>
                        </div>
                    </div>

                    <div class="pt-6 border-t border-gray-50">
                        <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Deskripsi Tambahan</label>
                        <textarea name="description" rows="3"
                            class="block w-full px-4 py-3 rounded-2xl border-transparent bg-gray-50 text-gray-700 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50 transition-all"
                            placeholder="Opsional: Spesifikasi singkat atau kondisi barang"></textarea>
                    </div>

                    <div class="flex items-center justify-end gap-4 pt-8">
                        <a href="{{ route('admin.items.index') }}"
                            class="text-sm font-bold text-gray-400 hover:text-gray-600 transition-colors px-4">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-10 py-3.5 bg-indigo-600 text-white rounded-2xl font-bold text-sm hover:bg-indigo-700 shadow-xl shadow-indigo-100 transition-all transform active:scale-95">
                            Simpan Inventaris
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
