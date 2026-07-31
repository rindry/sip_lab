<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h2 class="font-extrabold text-3xl text-gray-900 tracking-tight">
                    {{ __('Dashboard') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Selamat datang kembali, <span class="font-bold text-indigo-600">{{ Auth::user()->name }}</span> 👋
                </p>
            </div>

            <div class="flex items-center gap-3">
                <div class="hidden md:flex flex-col items-end mr-2">
                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Aktivitas Anda</span>
                    <span class="text-sm font-bold text-gray-700">{{ $loans->count() }} Pengajuan</span>
                </div>
                <div
                    class="h-12 w-12 bg-white rounded-2xl shadow-sm border border-gray-100 flex items-center justify-center">
                    <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-10 bg-[#F9FAFB] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                    class="mb-6 flex items-center p-4 text-emerald-800 rounded-2xl bg-emerald-50/50 border border-emerald-100 shadow-sm backdrop-blur-sm"
                    role="alert">
                    <div class="p-1.5 bg-emerald-100 rounded-lg mr-3">
                        <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                    </div>
                    <span class="font-semibold text-sm">{{ session('success') }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <a href="{{ route('loans.create.barang') }}"
                    class="group relative overflow-hidden bg-indigo-600 p-8 rounded-3xl shadow-xl shadow-indigo-200 transition-all hover:scale-[1.02] active:scale-95">
                    <div class="relative z-10">
                        <div
                            class="w-12 h-12 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                        <h4 class="text-white font-bold text-xl">Pinjam Alat</h4>
                        <p class="text-indigo-100 text-sm mt-1">Ajukan peminjaman alat laboratorium.</p>
                    </div>
                    <div class="absolute -right-4 -bottom-4 text-white/10 group-hover:scale-110 transition-transform">
                        <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                </a>

                <a href="{{ route('loans.create.bahan') }}"
                    class="group relative overflow-hidden bg-white p-8 rounded-3xl shadow-sm border border-gray-100 transition-all hover:shadow-md hover:scale-[1.02] active:scale-95">
                    <div class="relative z-10">
                        <div class="w-12 h-12 bg-emerald-50 rounded-2xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                        </div>
                        <h4 class="text-gray-900 font-bold text-xl">Minta Bahan</h4>
                        <p class="text-gray-500 text-sm mt-1">Permintaan bahan habis pakai laboratorium.</p>
                    </div>
                    <div class="absolute -right-4 -bottom-4 text-gray-50 group-hover:scale-110 transition-transform">
                        <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </div>
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm rounded-[2rem] border border-gray-100">
                <div class="px-8 py-6 flex flex-col sm:flex-row justify-between items-center gap-4">
                    <h3 class="text-lg font-bold text-gray-900 flex items-center gap-3">
                        Riwayat Aktivitas
                        <span class="bg-indigo-50 text-indigo-600 text-[10px] px-2 py-0.5 rounded-full uppercase">Update
                            Terbaru</span>
                    </h3>
                </div>

                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead>
                            <tr
                                class="text-[11px] text-gray-400 uppercase tracking-widest bg-gray-50/50 border-b border-gray-50">
                                <th class="px-8 py-4 font-bold">Item & Tipe</th>
                                <th class="px-8 py-4 font-bold text-center">Info Transaksi</th>
                                <th class="px-8 py-4 font-bold text-center">Status</th>
                                <th class="px-8 py-4 font-bold">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse($loans as $loan)
                                <tr class="bg-white hover:bg-indigo-50/30 transition-all group">
                                    <td class="px-8 py-5">
                                        <div class="flex items-center gap-4">
                                            <div
                                                class="h-10 w-10 {{ $loan->item->type === 'bahan' ? 'bg-emerald-50 text-emerald-600' : 'bg-indigo-50 text-indigo-600' }} rounded-xl flex items-center justify-center transition-transform group-hover:scale-110">
                                                @if ($loan->item->type === 'bahan')
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                                    </svg>
                                                @else
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                                    </svg>
                                                @endif
                                            </div>
                                            <div>
                                                <div class="font-bold text-gray-900 leading-tight">
                                                    {{ $loan->item->name }}</div>
                                                <div class="flex items-center gap-2 mt-1">
                                                    <span
                                                        class="text-[9px] font-black uppercase tracking-tighter px-1.5 py-0.5 rounded-md {{ $loan->item->type === 'bahan' ? 'bg-emerald-100 text-emerald-700' : 'bg-indigo-100 text-indigo-700' }}">
                                                        {{ $loan->item->type }}
                                                    </span>
                                                    <span class="text-xs text-gray-400">×{{ $loan->amount }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-8 py-5">
                                        <div class="text-center">
                                            @if ($loan->item->type === 'barang')
                                                <div
                                                    class="inline-flex items-center gap-2 bg-gray-50 px-3 py-1 rounded-full border border-gray-100">
                                                    <span
                                                        class="text-[10px] font-bold text-gray-700">{{ \Carbon\Carbon::parse($loan->borrow_date)->format('d M') }}</span>
                                                    <svg class="w-3 h-3 text-gray-300" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path d="M17 8l4 4m0 0l-4 4m4-4H3" stroke-width="2"
                                                            stroke-linecap="round" />
                                                    </svg>
                                                    <span
                                                        class="text-[10px] font-bold text-gray-700">{{ \Carbon\Carbon::parse($loan->return_date)->format('d M') }}</span>
                                                </div>
                                            @else
                                                <span
                                                    class="text-[10px] font-bold text-gray-400 uppercase tracking-widest italic">Habis
                                                    Pakai</span>
                                            @endif
                                        </div>
                                    </td>

                                    <td class="px-8 py-5 text-center">
                                        @php
                                            $badgeStyles = match ($loan->status) {
                                                'pending' => 'bg-amber-50 text-amber-600 border-amber-100',
                                                'validated' => 'bg-sky-50 text-sky-600 border-sky-100',
                                                'approved' => 'bg-emerald-50 text-emerald-600 border-emerald-100',
                                                'rejected' => 'bg-rose-50 text-rose-600 border-rose-100',
                                                'returned' => 'bg-slate-50 text-slate-500 border-slate-100',
                                                default => 'bg-gray-50 text-gray-500',
                                            };
                                        @endphp
                                        <span
                                            class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider border {{ $badgeStyles }}">
                                            {{ $loan->status }}
                                        </span>
                                    </td>

                                    <td class="px-8 py-5">
                                        <div class="flex items-center justify-between gap-4">
                                            <p class="text-xs text-gray-500 line-clamp-1 max-w-[150px]">
                                                {{ $loan->admin_note ?? $loan->purpose }}
                                            </p>
                                            @if ($loan->status == 'approved')
                                                <!-- <a href="{{ route('loans.print', $loan->id) }}" target="_blank"
                                                    class="p-2 hover:bg-indigo-50 rounded-xl text-indigo-600 transition-colors">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                                    </svg>
                                                </a> -->
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-8 py-20 text-center text-gray-400">
                                        <div class="flex flex-col items-center">
                                            <svg class="w-16 h-16 text-gray-100 mb-4" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                                    stroke-width="2" />
                                            </svg>
                                            <p class="text-sm">Belum ada aktivitas terekam.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
