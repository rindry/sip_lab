<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="p-2 bg-emerald-100 rounded-xl">
                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                </svg>
            </div>
            <div>
                <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                    {{ __('Permintaan Bahan') }}
                </h2>
                <p class="text-xs text-gray-500 mt-0.5">Lengkapi formulir untuk meminta bahan habis pakai laboratorium.
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-[#F9FAFB] min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white overflow-hidden shadow-xl shadow-gray-200/50 rounded-[2rem] border border-gray-100 p-8 md:p-10">

                <div
                    class="mb-8 flex gap-4 p-4 bg-emerald-50/50 rounded-2xl border border-emerald-100 text-emerald-800">
                    <svg class="w-5 h-5 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div class="text-sm">
                        <span class="font-bold">Informasi:</span> Bahan ini bersifat habis pakai. Anda tidak perlu
                        mengembalikan bahan setelah disetujui oleh Kepala Lab.
                    </div>
                </div>

                <form action="{{ route('loans.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Nama Bahan</label>
                            <div class="relative group">
                                <select name="item_id"
                                    class="block w-full px-4 py-3 rounded-2xl border-gray-200 bg-gray-50 text-gray-700 focus:bg-white focus:border-emerald-500 focus:ring focus:ring-emerald-100 transition-all duration-200 appearance-none shadow-sm"
                                    required>
                                    <option value="" disabled selected>-- Pilih Bahan yang Tersedia --</option>
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

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Jumlah yang
                                Dibutuhkan</label>
                            <div class="relative">
                                <input type="number" name="amount" min="1"
                                    class="block w-full px-4 py-3 rounded-2xl border-gray-200 bg-gray-50 text-gray-700 focus:bg-white focus:border-emerald-500 focus:ring focus:ring-emerald-100 transition-all duration-200 shadow-sm"
                                    placeholder="Masukkan angka jumlah..." required>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Keperluan Penggunaan</label>
                            <textarea name="purpose" rows="4"
                                class="block w-full px-4 py-3 rounded-2xl border-gray-200 bg-gray-50 text-gray-700 focus:bg-white focus:border-emerald-500 focus:ring focus:ring-emerald-100 transition-all duration-200 shadow-sm"
                                placeholder="Jelaskan detail praktikum atau tujuan penggunaan secara spesifik..." required></textarea>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-50">
                        <a href="{{ route('dashboard.mahasiswa') }}"
                            class="text-sm font-bold text-gray-400 hover:text-gray-600 transition-colors">
                            Batalkan
                        </a>
                        <button type="submit"
                            class="px-8 py-3 bg-emerald-600 text-white rounded-2xl text-sm font-bold hover:bg-emerald-700 hover:shadow-lg hover:shadow-emerald-200 transition-all transform active:scale-95 shadow-md shadow-emerald-100">
                            Kirim Permintaan
                        </button>
                    </div>
                </form>
            </div>

            <p class="mt-8 text-center text-xs text-gray-400">
                Data permintaan akan diverifikasi oleh Admin dan Kepala Lab sebelum dapat diambil.
            </p>
        </div>
    </div>
</x-app-layout>
