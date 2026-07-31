<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h2 class="font-extrabold text-3xl text-gray-900 tracking-tight">
                    {{ __('Admin Control') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">Validasi permintaan dan pantau inventaris laboratorium secara
                    real-time.</p>
            </div>

            <div x-data="{ openReport: false }" class="flex items-center gap-3">
                <div class="hidden lg:flex flex-col items-end mr-2">
                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Waktu Sistem</span>
                    <span class="text-sm font-bold text-gray-700">{{ now()->format('d M Y, H:i') }}</span>
                </div>

                <!-- <button @click="openReport = true"
                    class="inline-flex items-center px-5 py-2.5 bg-indigo-600 text-white rounded-xl font-bold text-sm hover:bg-indigo-700 shadow-lg shadow-indigo-100 transition-all active:scale-95">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                    </svg>
                    Laporan Cetak
                </button> -->

                <div x-show="openReport" style="display: none;"
                    class="fixed inset-0 z-[60] flex items-center justify-center bg-gray-900/60 backdrop-blur-md p-4"
                    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100">

                    <div @click.outside="openReport = false"
                        class="bg-white rounded-[2rem] shadow-2xl w-full max-w-md overflow-hidden">
                        <div class="px-8 py-6 bg-indigo-600 text-white flex justify-between items-center">
                            <h3 class="text-xl font-bold">Filter Laporan</h3>
                            <button @click="openReport = false"
                                class="bg-white/20 hover:bg-white/30 rounded-full p-1 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M6 18L18 6M6 6l12 12" stroke-width="2.5" />
                                </svg>
                            </button>
                        </div>

                        <form action="{{ route('report.print') }}" method="GET" target="_blank" class="p-8 space-y-5">
                            <div>
                                <label
                                    class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-2 ml-1">Rentang
                                    Tanggal</label>
                                <div class="grid grid-cols-2 gap-3">
                                    <input type="date" name="start_date" required
                                        class="w-full rounded-2xl border-gray-100 bg-gray-50 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50 text-sm py-3 transition-all">
                                    <input type="date" name="end_date" required value="{{ date('Y-m-d') }}"
                                        class="w-full rounded-2xl border-gray-100 bg-gray-50 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50 text-sm py-3 transition-all">
                                </div>
                            </div>
                            <div>
                                <label
                                    class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-2 ml-1">Kategori
                                    Status</label>
                                <select name="status"
                                    class="w-full rounded-2xl border-gray-100 bg-gray-50 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50 text-sm py-3 transition-all">
                                    <option value="all">Semua Riwayat</option>
                                    <option value="returned">Selesai Dikembalikan</option>
                                    <option value="approved">Aktif Dipinjam</option>
                                    <option value="rejected">Ditolak</option>
                                </select>
                            </div>
                            <button type="submit"
                                class="w-full py-4 bg-indigo-600 text-white rounded-2xl font-bold hover:bg-indigo-700 shadow-xl shadow-indigo-100 transition-all active:scale-95 flex justify-center items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"
                                        stroke-width="2.5" />
                                </svg>
                                Generate Dokumen PDF
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-10 bg-[#F9FAFB] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div
                    class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 flex items-center justify-between relative group">
                    <div>
                        <p class="text-[10px] font-black text-indigo-400 uppercase tracking-[0.2em] mb-1">Incoming
                            Request</p>
                        <h2 class="text-3xl font-extrabold text-gray-900">{{ $pendingLoans->count() }}</h2>
                    </div>
                    <div
                        class="h-14 w-14 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-600 transition-transform group-hover:scale-110">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </div>
                </div>

                <div
                    class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 flex items-center justify-between relative group">
                    <div>
                        <p class="text-[10px] font-black text-amber-400 uppercase tracking-[0.2em] mb-1">Active Loans
                        </p>
                        <h2 class="text-3xl font-extrabold text-gray-900">{{ $activeLoans->count() }}</h2>
                    </div>
                    <div
                        class="h-14 w-14 bg-amber-50 rounded-2xl flex items-center justify-center text-amber-600 transition-transform group-hover:scale-110">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>

                <div
                    class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 flex items-center justify-between relative group">
                    <div>
                        <p class="text-[10px] font-black text-emerald-400 uppercase tracking-[0.2em] mb-1">Total History
                        </p>
                        <h2 class="text-3xl font-extrabold text-gray-900">{{ $historyLoans->count() }}</h2>
                    </div>
                    <div
                        class="h-14 w-14 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600 transition-transform group-hover:scale-110">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-sm rounded-[2rem] border border-gray-100 overflow-hidden">
                <div class="px-8 py-6 flex justify-between items-center border-b border-gray-50 bg-gray-50/30">
                    <h3 class="text-lg font-bold text-gray-900 flex items-center gap-3">
                        <span class="w-2 h-2 rounded-full bg-indigo-600 animate-pulse"></span>
                        Menunggu Validasi Admin
                    </h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead>
                            <tr
                                class="text-[11px] text-gray-400 uppercase tracking-widest bg-gray-50/50 border-b border-gray-50">
                                <th class="px-8 py-4 font-bold">Mahasiswa</th>
                                <th class="px-8 py-4 font-bold">Barang & Alasan</th>
                                <th class="px-8 py-4 font-bold">Jadwal</th>
                                <th class="px-8 py-4 font-bold text-right">Aksi Cepat</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse($pendingLoans as $loan)
                                <tr class="bg-white hover:bg-indigo-50/20 transition-all">
                                    <td class="px-8 py-5">
                                        <div class="font-bold text-gray-900">{{ $loan->user->name }}</div>
                                        <div class="text-[10px] text-gray-400 font-mono tracking-tighter">
                                            {{ $loan->user->email }}</div>
                                    </td>
                                    <td class="px-8 py-5">
                                        <div class="flex items-center gap-2 mb-1">
                                            <span
                                                class="bg-indigo-50 text-indigo-600 px-1.5 py-0.5 rounded text-[10px] font-black uppercase">x{{ $loan->amount }}</span>
                                            <span class="font-bold text-gray-700">{{ $loan->item->name }}</span>
                                        </div>
                                        <div class="text-xs text-gray-400 line-clamp-1 italic italic">
                                            "{{ $loan->purpose }}"</div>
                                    </td>
                                    <td class="px-8 py-5 font-bold text-gray-600 text-xs">
                                        {{ \Carbon\Carbon::parse($loan->borrow_date)->format('d M') }} -
                                        {{ \Carbon\Carbon::parse($loan->return_date)->format('d M') }}
                                    </td>
                                    <td class="px-8 py-5">
                                        <form action="{{ route('admin.loans.validate', $loan->id) }}" method="POST"
                                            class="flex items-center justify-end gap-2">
                                            @csrf @method('PATCH')
                                            <input type="text" name="note" placeholder="Note..."
                                                class="text-[11px] border-transparent bg-gray-50 rounded-xl w-32 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 py-1.5 transition-all">
                                            <button type="submit" name="action" value="reject"
                                                class="p-2 text-rose-400 hover:bg-rose-50 hover:text-rose-600 rounded-xl transition-all"
                                                onclick="return confirm('Tolak?')">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path d="M6 18L18 6M6 6l12 12" stroke-width="2.5" />
                                                </svg>
                                            </button>
                                            <button type="submit" name="action" value="approve"
                                                class="px-4 py-2 bg-indigo-600 text-white rounded-xl text-xs font-black uppercase tracking-widest hover:bg-indigo-700 transition-all shadow-md shadow-indigo-100">
                                                Validasi
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-8 py-12 text-center text-gray-400 italic">Antrean
                                        validasi kosong.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="bg-white shadow-sm rounded-[2rem] border border-gray-100 overflow-hidden">
                <div class="px-8 py-6 border-b border-gray-50 bg-gray-50/30 flex justify-between items-center">
                    <h3 class="text-lg font-bold text-gray-900">Pinjaman Sedang Berjalan</h3>
                    <span
                        class="text-[10px] font-black text-amber-500 bg-amber-50 px-3 py-1 rounded-full border border-amber-100 uppercase tracking-widest">{{ $activeLoans->count() }}
                        Terpantau</span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead>
                            <tr
                                class="text-[11px] text-gray-400 uppercase tracking-widest bg-gray-50/50 border-b border-gray-50">
                                <th class="px-8 py-4 font-bold">Peminjam</th>
                                <th class="px-8 py-4 font-bold">Barang</th>
                                <th class="px-8 py-4 font-bold text-center">Tenggat Waktu</th>
                                <th class="px-8 py-4 font-bold text-right">Aksi Terima</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @foreach ($activeLoans as $loan)
                                <tr class="bg-white hover:bg-amber-50/20 transition-all">
                                    <td class="px-8 py-5">
                                        <div class="font-bold text-gray-900 leading-none mb-1">{{ $loan->user->name }}
                                        </div>
                                        <div class="text-[10px] text-gray-400 font-mono tracking-tighter">
                                            {{ $loan->user->email }}</div>
                                    </td>
                                    <td class="px-8 py-5">
                                        <span
                                            class="text-xs font-bold text-gray-700 tracking-tight">{{ $loan->item->name }}
                                            (x{{ $loan->amount }})</span>
                                    </td>
                                    <td class="px-8 py-5 text-center">
                                        @if (now() > $loan->return_date)
                                            <span
                                                class="px-3 py-1 rounded-full text-[10px] font-black bg-rose-50 text-rose-600 border border-rose-100 animate-pulse">TELAT</span>
                                        @else
                                            <span
                                                class="px-3 py-1 rounded-full text-[10px] font-black bg-emerald-50 text-emerald-600 border border-emerald-100">{{ now()->diffInDays($loan->return_date, false) }}
                                                HARI LAGI</span>
                                        @endif
                                    </td>
                                    <td class="px-8 py-5 text-right">
                                        <form action="{{ route('admin.loans.return', $loan->id) }}" method="POST">
                                            @csrf @method('PATCH')
                                            <button type="submit"
                                                class="px-4 py-2 bg-emerald-600 text-white rounded-xl text-xs font-black uppercase tracking-widest hover:bg-emerald-700 transition-all shadow-md shadow-emerald-100"
                                                onclick="return confirm('Sudah dicek kelengkapannya?')">
                                                Terima Barang
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
