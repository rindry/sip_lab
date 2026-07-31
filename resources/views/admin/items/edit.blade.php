<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="p-2 bg-amber-100 rounded-xl">
                <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </div>
            <div>
                <h2 class="font-extrabold text-2xl text-gray-900 leading-tight">Edit Inventaris</h2>
                <p class="text-xs text-gray-500 mt-0.5">Perbarui informasi aset atau bahan yang sudah terdaftar.</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-[#F9FAFB] min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white overflow-hidden shadow-xl shadow-gray-200/50 rounded-[2.5rem] border border-gray-100 p-8 md:p-12">

                <form action="{{ route('admin.items.update', $item->id) }}" method="POST" class="space-y-8">
                    @csrf
                    @method('PUT')

                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2 ml-1 text-amber-600">Kode
                                    Barang (ID)</label>
                                <input type="text" name="code" value="{{ $item->code }}"
                                    class="block w-full px-4 py-3 rounded-2xl border-transparent bg-amber-50/50 text-gray-700 focus:bg-white focus:border-amber-500 focus:ring-4 focus:ring-amber-50 transition-all font-mono font-bold"
                                    required>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Tipe Inventaris</label>
                                <select name="type"
                                    class="block w-full px-4 py-3 rounded-2xl border-transparent bg-gray-50 text-gray-700 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50 transition-all"
                                    required>
                                    <option value="barang" {{ $item->type == 'barang' ? 'selected' : '' }}>Barang
                                        (Aset/Dipinjam)</option>
                                    <option value="bahan" {{ $item->type == 'bahan' ? 'selected' : '' }}>Bahan (Habis
                                        Pakai)</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Nama Barang / Bahan</label>
                            <input type="text" name="name" value="{{ $item->name }}"
                                class="block w-full px-4 py-3 rounded-2xl border-transparent bg-gray-50 text-gray-700 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50 transition-all"
                                required>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-6 border-t border-gray-50">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Jenis Laboratorium</label>
                            <select name="jenis_lab"
                                class="block w-full px-4 py-3 rounded-2xl border-transparent bg-gray-50 text-gray-700 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50 transition-all">
                                <option value="Lab Komputer" {{ $item->jenis_lab == 'Lab Komputer' ? 'selected' : '' }}>
                                    Lab Komputer</option>
                                <option value="Lab Jaringan" {{ $item->jenis_lab == 'Lab Jaringan' ? 'selected' : '' }}>
                                    Lab Jaringan</option>
                                <option value="Lab Multimedia"
                                    {{ $item->jenis_lab == 'Lab Multimedia' ? 'selected' : '' }}>Lab Multimedia</option>
                                <option value="Gudang Umum" {{ $item->jenis_lab == 'Gudang Umum' ? 'selected' : '' }}>
                                    Gudang Umum</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Lokasi (Rak/Lemari)</label>
                            <input type="text" name="location" value="{{ $item->location }}"
                                class="block w-full px-4 py-3 rounded-2xl border-transparent bg-gray-50 text-gray-700 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50 transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Stok Saat Ini</label>
                            <div class="relative">
                                <input type="number" name="stock" value="{{ $item->stock }}" min="0"
                                    class="block w-full px-4 py-3 rounded-2xl border-transparent bg-gray-50 text-gray-700 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50 transition-all font-bold"
                                    required>
                                <span class="absolute right-4 top-3.5 text-xs font-bold text-gray-400">Unit</span>
                            </div>
                        </div>
                    </div>

                    <div class="pt-6 border-t border-gray-50">
                        <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Deskripsi Tambahan</label>
                        <textarea name="description" rows="3"
                            class="block w-full px-4 py-3 rounded-2xl border-transparent bg-gray-50 text-gray-700 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50 transition-all">{{ $item->description }}</textarea>
                    </div>

                    <div class="flex items-center justify-end gap-4 pt-8">
                        <a href="{{ route('admin.items.index') }}"
                            class="text-sm font-bold text-gray-400 hover:text-gray-600 transition-colors px-4">
                            Batalkan
                        </a>
                        <button type="submit"
                            class="px-10 py-3.5 bg-amber-500 text-white rounded-2xl font-bold text-sm hover:bg-amber-600 shadow-xl shadow-amber-100 transition-all transform active:scale-95">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
