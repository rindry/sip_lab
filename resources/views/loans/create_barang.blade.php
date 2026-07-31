<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="p-2 bg-indigo-100 rounded-xl">
                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
            </div>
            <div>
                <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                    {{ __('Peminjaman Alat Lab') }}
                </h2>
                <p class="text-xs text-gray-500 mt-0.5">Ajukan peminjaman alat penunjang praktikum atau penelitian.</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-[#F9FAFB] min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white overflow-hidden shadow-xl shadow-gray-200/50 rounded-[2rem] border border-gray-100 p-8 md:p-10">

                <div class="mb-8 flex gap-4 p-4 bg-indigo-50/50 rounded-2xl border border-indigo-100 text-indigo-800">
                    <svg class="w-5 h-5 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div class="text-sm">
                        <span class="font-bold">Ketentuan:</span> Peminjaman alat wajib mencantumkan tanggal
                        pengembalian. Pastikan alat dikembalikan dalam kondisi baik.
                    </div>
                </div>

                <form action="{{ route('loans.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Nama Barang / Alat</label>
                            <div class="relative group">
                                <select name="item_id"
                                    class="block w-full px-4 py-3 rounded-2xl border-gray-200 bg-gray-50 text-gray-700 focus:bg-white focus:border-indigo-500 focus:ring focus:ring-indigo-100 transition-all duration-200 appearance-none shadow-sm"
                                    required>
                                    <option value="" disabled selected>-- Pilih Alat yang Tersedia --</option>
                                    @foreach ($items as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }} (Tersedia:
                                            {{ $item->stock }})</option>
                                    @endforeach
                                </select>
                                <div
                                    class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-gray-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M19 9l-7 7-7-7" stroke-width="2.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Jumlah</label>
                                <input type="number" name="amount" min="1"
                                    class="block w-full px-4 py-3 rounded-2xl border-gray-200 bg-gray-50 text-gray-700 focus:bg-white focus:border-indigo-500 focus:ring focus:ring-indigo-100 transition-all duration-200 shadow-sm"
                                    required>
                            </div>
                            <div class="md:col-span-1">
                                <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Tgl Pinjam</label>
                                <input type="date" name="borrow_date" min="{{ date('Y-m-d') }}"
                                    class="block w-full px-4 py-3 rounded-2xl border-gray-200 bg-gray-50 text-gray-700 focus:bg-white focus:border-indigo-500 focus:ring focus:ring-indigo-100 transition-all duration-200 shadow-sm text-sm"
                                    required>
                            </div>
                            <div class="md:col-span-1">
                                <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Tgl Kembali</label>
                                <input type="date" name="return_date"
                                    class="block w-full px-4 py-3 rounded-2xl border-gray-200 bg-gray-50 text-gray-700 focus:bg-white focus:border-indigo-500 focus:ring focus:ring-indigo-100 transition-all duration-200 shadow-sm text-sm"
                                    required>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Alasan Peminjaman</label>
                            <textarea name="purpose" rows="3"
                                class="block w-full px-4 py-3 rounded-2xl border-gray-200 bg-gray-50 text-gray-700 focus:bg-white focus:border-indigo-500 focus:ring focus:ring-indigo-100 transition-all duration-200 shadow-sm"
                                placeholder="Jelaskan untuk praktikum apa atau keperluan penelitian apa..." required></textarea>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-50">
                        <a href="{{ route('dashboard.mahasiswa') }}"
                            class="text-sm font-bold text-gray-400 hover:text-gray-600 transition-colors">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-8 py-3 bg-indigo-600 text-white rounded-2xl text-sm font-bold hover:bg-indigo-700 hover:shadow-lg hover:shadow-indigo-200 transition-all transform active:scale-95 shadow-md shadow-indigo-100">
                            Kirim Pengajuan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
