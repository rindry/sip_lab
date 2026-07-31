<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h2 class="font-extrabold text-2xl text-gray-900 leading-tight">
                    {{ __('Manajemen Inventaris') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">Kelola stok alat laboratorium dan bahan habis pakai secara
                    terpusat.</p>
            </div>

            <div class="flex gap-2">
                <div class="px-4 py-2 bg-white rounded-2xl border border-gray-100 shadow-sm">
                    <span class="text-[10px] font-bold text-gray-400 uppercase block leading-none mb-1">Total Item</span>
                    <span class="text-lg font-black text-indigo-600 leading-none">{{ $items->total() }}</span>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-10 bg-[#F9FAFB] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
                    class="mb-6 flex items-center p-4 text-emerald-800 rounded-2xl bg-emerald-50 border border-emerald-100 shadow-sm"
                    role="alert">
                    <svg class="w-5 h-5 mr-3 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="font-semibold text-sm">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm rounded-[2rem] border border-gray-100 p-2">
                <div class="p-6 flex flex-col md:flex-row justify-between items-center gap-4">
                    <form action="{{ route('admin.items.index') }}" method="GET"
                        class="relative w-full md:w-96 group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-4 w-4 text-gray-400 group-focus-within:text-indigo-500 transition-colors"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input type="text" name="search" value="{{ request('search') }}"
                            class="block w-full pl-11 pr-4 py-2.5 bg-gray-50 border-transparent rounded-2xl leading-5 placeholder-gray-400 focus:bg-white focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 transition-all sm:text-sm"
                            placeholder="Cari alat atau bahan...">
                    </form>

                    <a href="{{ route('admin.items.create') }}"
                        class="w-full md:w-auto inline-flex items-center justify-center px-6 py-2.5 bg-indigo-600 text-white rounded-xl font-bold text-sm hover:bg-indigo-700 shadow-lg shadow-indigo-200 transition-all active:scale-95">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah Inventaris
                    </a>
                </div>

                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead>
                            <tr
                                class="text-[11px] text-gray-400 uppercase tracking-widest bg-gray-50/50 border-b border-gray-50">
                                <th class="px-8 py-4 font-bold">Identitas Item</th>
                                <th class="px-8 py-4 font-bold">Laboratorium</th>
                                <th class="px-8 py-4 font-bold text-center">Tipe</th>
                                <th class="px-8 py-4 font-bold text-center">Stok</th>
                                <th class="px-8 py-4 font-bold text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse($items as $item)
                                <tr class="bg-white hover:bg-indigo-50/30 transition-all group">
                                    <td class="px-8 py-5">
                                        <div class="flex items-center gap-4">
                                            <div
                                                class="h-10 w-10 bg-gray-50 text-gray-400 rounded-xl flex items-center justify-center border border-gray-100 group-hover:bg-white group-hover:text-indigo-600 group-hover:border-indigo-100 transition-all">
                                                <span class="text-[10px] font-black">ID</span>
                                            </div>
                                            <div>
                                                <div class="font-bold text-gray-900 leading-tight">{{ $item->name }}
                                                </div>
                                                <div
                                                    class="text-[10px] font-mono font-bold text-gray-400 mt-0.5 tracking-tighter">
                                                    {{ $item->code }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-5">
                                        <div class="text-xs font-semibold text-gray-600">{{ $item->jenis_lab }}</div>
                                        <div class="text-[10px] text-gray-400 italic">
                                            {{ $item->location ?? 'Lokasi belum diatur' }}</div>
                                    </td>
                                    <td class="px-8 py-5 text-center">
                                        <span
                                            class="px-2.5 py-1 rounded-md text-[10px] font-black uppercase tracking-wider {{ $item->type === 'bahan' ? 'bg-emerald-50 text-emerald-600 border border-emerald-100' : 'bg-blue-50 text-blue-600 border border-blue-100' }}">
                                            {{ $item->type }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-5 text-center">
                                        <div class="flex flex-col items-center">
                                            <span
                                                class="text-sm font-bold {{ $item->stock <= 5 ? 'text-rose-600' : 'text-gray-900' }}">
                                                {{ $item->stock }}
                                            </span>
                                            <span
                                                class="text-[9px] font-bold text-gray-400 uppercase tracking-tighter">Unit</span>
                                        </div>
                                    </td>
                                    <td class="px-8 py-5">
                                        <div class="flex justify-end items-center gap-2">
                                            <a href="{{ route('admin.items.edit', $item->id) }}"
                                                class="p-2 text-indigo-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-xl transition-all"
                                                title="Edit">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>

                                            <form action="{{ route('admin.items.destroy', $item->id) }}" method="POST"
                                                onsubmit="return confirm('Hapus {{ $item->name }} dari sistem?');">
                                                @csrf @method('DELETE')
                                                <button type="submit"
                                                    class="p-2 text-rose-300 hover:text-rose-600 hover:bg-rose-50 rounded-xl transition-all"
                                                    title="Hapus">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-8 py-20 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <div class="p-4 bg-gray-50 rounded-3xl mb-4">
                                                <svg class="w-12 h-12 text-gray-200" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                                </svg>
                                            </div>
                                            <p class="text-gray-900 font-bold">Inventaris Kosong</p>
                                            <p class="text-xs text-gray-400 mt-1 max-w-[200px]">Data tidak ditemukan.
                                                Silakan tambahkan barang atau periksa kata kunci pencarian.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($items->hasPages())
                    <div class="px-8 py-6 border-t border-gray-50">
                        {{ $items->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
