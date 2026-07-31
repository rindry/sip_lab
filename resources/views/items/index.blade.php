<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h2 class="font-extrabold text-3xl text-gray-900 tracking-tight">
                    {{ __('Kelola Inventaris') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Manajemen data stok alat dan bahan laboratorium terpadu.
                </p>
            </div>

            <a href="{{ route('admin.items.create') }}"
                class="inline-flex items-center justify-center px-6 py-3 text-sm font-bold text-white bg-indigo-600 rounded-2xl hover:bg-indigo-700 shadow-lg shadow-indigo-200 transition-all transform hover:-translate-y-0.5 active:scale-95">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Item Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-[#F9FAFB] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if (session('success'))
                <div x-data="{ show: true }" x-show="show" x-transition.duration.500ms x-init="setTimeout(() => show = false, 3000)"
                    class="flex items-center p-4 text-sm text-emerald-800 rounded-2xl bg-emerald-50 border border-emerald-100 shadow-sm"
                    role="alert">
                    <svg class="w-5 h-5 mr-3 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="font-bold">{{ session('success') }}</span>
                </div>
            @endif

            <div
                class="bg-white p-4 rounded-3xl shadow-sm border border-gray-100 flex flex-col md:flex-row justify-between items-center gap-4">
                <form method="GET" class="flex flex-col sm:flex-row items-center w-full gap-3">
                    <div class="relative w-full sm:w-80 group">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-4 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400 group-focus-within:text-indigo-600 transition-colors"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input type="text" name="search" value="{{ request('search') }}"
                            class="bg-gray-50 border-transparent text-gray-900 text-sm rounded-2xl focus:bg-white focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 block w-full ps-11 p-3 transition-all"
                            placeholder="Cari kode atau nama barang...">
                    </div>

                    <select name="nama_lab" onchange="this.form.submit()"
                        class="bg-gray-50 border-transparent text-gray-700 text-sm rounded-2xl focus:bg-white focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 block w-full sm:w-64 p-3 transition-all font-semibold">
                        <option value="">Semua Laboratorium</option>
                        <option value="Lab Mesin" {{ request('nama_lab') == 'Lab Mesin' ? 'selected' : '' }}>Lab Mesin
                        </option>
                        <option value="Lab Listrik" {{ request('nama_lab') == 'Lab Listrik' ? 'selected' : '' }}>Lab
                            Listrik</option>
                        <option value="Lab Komputer" {{ request('nama_lab') == 'Lab Komputer' ? 'selected' : '' }}>Lab
                            Komputer</option>
                    </select>
                </form>
            </div>

            <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead>
                            <tr
                                class="text-[11px] text-gray-400 uppercase tracking-widest bg-gray-50/50 border-b border-gray-50">
                                <th class="px-8 py-5 text-center font-bold">No</th>
                                <th class="px-8 py-5 font-bold">Informasi Barang</th>
                                <th class="px-8 py-5 font-bold">Kategori & Lokasi</th>
                                <th class="px-8 py-5 text-center font-bold">Stok</th>
                                <th class="px-8 py-5 text-center font-bold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse ($items as $index => $item)
                                <tr class="bg-white hover:bg-indigo-50/30 transition-all group">
                                    <td class="px-8 py-6 text-center text-gray-400 font-bold font-mono text-xs">
                                        {{ $items->firstItem() + $index }}
                                    </td>

                                    <td class="px-8 py-6">
                                        <div class="flex items-center gap-4">
                                            <div
                                                class="h-10 w-10 {{ $item->type === 'bahan' ? 'bg-emerald-50 text-emerald-600' : 'bg-indigo-50 text-indigo-600' }} rounded-xl flex items-center justify-center font-black text-[10px] border border-transparent group-hover:border-current transition-all">
                                                {{ $item->type === 'bahan' ? 'MAT' : 'INV' }}
                                            </div>
                                            <div>
                                                <div class="font-black text-gray-900 text-base leading-tight">
                                                    {{ $item->name }}</div>
                                                <div
                                                    class="font-mono text-[10px] font-bold text-gray-400 mt-1 tracking-tighter">
                                                    {{ $item->code }}</div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-8 py-6">
                                        <div class="flex flex-col gap-1">
                                            <span class="text-xs font-bold text-gray-700">{{ $item->jenis_lab }}</span>
                                            <div
                                                class="flex items-center gap-1.5 text-[10px] text-gray-400 uppercase font-bold tracking-tight">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2.5"
                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                                {{ $item->location ?? 'Lokasi Belum Diatur' }}
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-8 py-6 text-center">
                                        <div class="inline-flex flex-col items-center">
                                            <span
                                                class="text-lg font-black {{ $item->stock <= 5 ? 'text-rose-600 animate-pulse' : 'text-gray-900' }}">
                                                {{ $item->stock }}
                                            </span>
                                            <span
                                                class="text-[9px] font-black text-gray-400 uppercase tracking-tighter">Unit</span>
                                        </div>
                                    </td>

                                    <td class="px-8 py-6 text-center">
                                        <div x-data="{ openDelete: false }" class="flex items-center justify-center gap-2">
                                            <a href="{{ route('admin.items.edit', $item) }}"
                                                class="p-2.5 text-indigo-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-xl transition-all"
                                                title="Edit Data">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    stroke-width="2.5" viewBox="0 0 24 24">
                                                    <path
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>

                                            <button @click="openDelete = true"
                                                class="p-2.5 text-rose-300 hover:text-rose-600 hover:bg-rose-50 rounded-xl transition-all"
                                                title="Hapus Permanen">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    stroke-width="2.5" viewBox="0 0 24 24">
                                                    <path
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>

                                            <div x-show="openDelete" style="display: none;"
                                                class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900/60 backdrop-blur-md p-4">
                                                <div @click.outside="openDelete = false"
                                                    class="bg-white rounded-[2rem] shadow-2xl w-full max-w-sm p-8 transform transition-all border border-gray-100">
                                                    <div class="text-center">
                                                        <div
                                                            class="mx-auto flex items-center justify-center h-16 w-16 rounded-3xl bg-rose-50 mb-6">
                                                            <svg class="h-8 w-8 text-rose-500" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2.5"
                                                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                            </svg>
                                                        </div>
                                                        <h3 class="text-xl font-black text-gray-900">Hapus Item?</h3>
                                                        <p class="text-sm text-gray-500 mt-2 px-4 leading-relaxed">
                                                            Anda akan menghapus <span
                                                                class="font-black text-rose-600">"{{ $item->name }}"</span>.
                                                            Tindakan ini tidak dapat dibatalkan.
                                                        </p>
                                                    </div>

                                                    <div class="mt-8 flex flex-col gap-3">
                                                        <form method="POST"
                                                            action="{{ route('admin.items.destroy', $item) }}"
                                                            class="w-full">
                                                            @csrf @method('DELETE')
                                                            <button type="submit"
                                                                class="w-full py-4 bg-rose-600 text-white rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-rose-700 shadow-xl shadow-rose-100 transition-all active:scale-95">
                                                                Ya, Hapus Sekarang
                                                            </button>
                                                        </form>
                                                        <button @click="openDelete = false"
                                                            class="w-full py-4 bg-gray-50 text-gray-500 rounded-2xl font-bold text-xs uppercase tracking-widest hover:bg-gray-100 transition-all">
                                                            Batalkan
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-8 py-24 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <div class="bg-gray-50 p-6 rounded-[2rem] mb-4 border border-gray-100">
                                                <svg class="w-16 h-16 text-gray-200" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"
                                                        stroke-width="1.5" />
                                                </svg>
                                            </div>
                                            <h3 class="text-xl font-black text-gray-900">Gudang Kosong</h3>
                                            <p class="text-sm text-gray-400 mt-1">Belum ada alat atau bahan yang
                                                terdaftar di laboratorium ini.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($items->hasPages())
                    <div class="px-8 py-6 border-t border-gray-50 bg-gray-50/30">
                        {{ $items->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
