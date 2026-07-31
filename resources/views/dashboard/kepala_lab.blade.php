<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h2 class="font-extrabold text-3xl text-gray-900 tracking-tight">
                    {{ __('Lab Assessment') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">Otoritas persetujuan akhir penggunaan aset & bahan laboratorium.
                </p>
            </div>

            <div x-data="{ openReport: false }" class="flex items-center gap-3">
                <div class="hidden lg:flex flex-col items-end mr-2 text-right">
                    <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest leading-none mb-1">Status
                        Sesi</span>
                    <span
                        class="text-xs font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-100 flex items-center gap-1">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span> Terhubung
                    </span>
                </div>

                <!-- <button @click="openReport = true"
                    class="inline-flex items-center px-5 py-2.5 bg-indigo-600 text-white rounded-xl font-bold text-sm hover:bg-indigo-700 shadow-lg shadow-indigo-100 transition-all active:scale-95">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                    </svg>
                    Data Laporan
                </button> -->

                <div x-show="openReport" style="display: none;"
                    class="fixed inset-0 z-[60] flex items-center justify-center bg-gray-900/60 backdrop-blur-md p-4"
                    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100">

                    <div @click.outside="openReport = false"
                        class="bg-white rounded-[2rem] shadow-2xl w-full max-w-md overflow-hidden">
                        <div class="px-8 py-6 bg-indigo-600 text-white flex justify-between items-center">
                            <h3 class="text-xl font-bold">Cetak Laporan Lab</h3>
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
                                    class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-2 ml-1">Periode</label>
                                <div class="grid grid-cols-2 gap-3">
                                    <input type="date" name="start_date" required
                                        class="w-full rounded-2xl border-gray-100 bg-gray-50 focus:bg-white focus:ring-4 focus:ring-indigo-50 text-sm py-3 transition-all">
                                    <input type="date" name="end_date" required value="{{ date('Y-m-d') }}"
                                        class="w-full rounded-2xl border-gray-100 bg-gray-50 focus:bg-white focus:ring-4 focus:ring-indigo-50 text-sm py-3 transition-all">
                                </div>
                            </div>
                            <button type="submit"
                                class="w-full py-4 bg-indigo-600 text-white rounded-2xl font-bold hover:bg-indigo-700 shadow-xl shadow-indigo-100 transition-all active:scale-95 flex justify-center items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"
                                        stroke-width="2.5" />
                                </svg>
                                Generate PDF
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-10 bg-[#F9FAFB] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">

            <div class="bg-white rounded-3xl p-6 shadow-sm border border-indigo-100 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div
                        class="h-14 w-14 bg-indigo-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-indigo-100">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-black text-indigo-400 uppercase tracking-widest leading-none mb-1">
                            Queue Management</p>
                        <h2 class="text-2xl font-black text-gray-900 leading-none">{{ $validatedLoans->count() }} <span
                                class="text-gray-400 font-normal text-lg">Antrean Persetujuan</span></h2>
                    </div>
                </div>
                <div class="text-right">
                    <span class="text-xs font-bold text-gray-400 block uppercase mb-1">Terakhir Diupdate</span>
                    <span class="text-xs font-black text-gray-700 uppercase">{{ now()->format('H:i') }} WIB</span>
                </div>
            </div>

            <div class="bg-white shadow-sm rounded-[2.5rem] border border-gray-100 overflow-hidden">
                <div class="px-8 py-6 border-b border-gray-50 flex justify-between items-center bg-gray-50/30">
                    <h3 class="text-lg font-bold text-gray-900 flex items-center gap-3">
                        <span class="w-2.5 h-2.5 rounded-full bg-indigo-600"></span>
                        Menunggu Keputusan Anda
                    </h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead>
                            <tr
                                class="text-[11px] text-gray-400 uppercase tracking-widest bg-gray-50/50 border-b border-gray-50">
                                <th class="px-8 py-4 font-bold">Profil Mahasiswa</th>
                                <th class="px-8 py-4 font-bold">Item & Validasi Stok</th>
                                <th class="px-8 py-4 font-bold text-center">Catatan Admin</th>
                                <th class="px-8 py-4 font-bold text-right">Aksi Final</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse($validatedLoans as $loan)
                                <tr class="bg-white hover:bg-gray-50/50 transition-all group">
                                    <td class="px-8 py-6 align-top">
                                        <div class="font-black text-gray-900 text-lg leading-tight">
                                            {{ $loan->user->name }}</div>
                                        <div
                                            class="text-[10px] font-mono font-bold text-indigo-400 mt-1 uppercase tracking-tighter">
                                            {{ $loan->user->email }}</div>
                                        <div
                                            class="mt-4 inline-flex items-center gap-2 bg-gray-50 px-3 py-1.5 rounded-xl border border-gray-100">
                                            <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                                    stroke-width="2" />
                                            </svg>
                                            <span
                                                class="text-[10px] font-bold text-gray-600 uppercase">{{ \Carbon\Carbon::parse($loan->borrow_date)->format('d M') }}
                                                -
                                                {{ \Carbon\Carbon::parse($loan->return_date)->format('d M Y') }}</span>
                                        </div>
                                    </td>

                                    <td class="px-8 py-6 align-top">
                                        <div class="flex items-center gap-2 mb-3">
                                            <span
                                                class="bg-indigo-600 text-white px-2 py-0.5 rounded-lg text-[10px] font-black uppercase">x{{ $loan->amount }}</span>
                                            <span
                                                class="font-bold text-gray-900 text-base tracking-tight">{{ $loan->item->name }}</span>
                                        </div>

                                        <div class="bg-gray-50 rounded-2xl p-3 border border-gray-100 inline-block">
                                            <div class="flex items-center gap-4">
                                                <div>
                                                    <span
                                                        class="block text-[9px] font-black text-gray-400 uppercase tracking-widest mb-1">Sisa
                                                        Stok Lab</span>
                                                    <div class="flex items-end gap-1">
                                                        <span
                                                            class="text-xl font-black {{ $loan->item->stock < $loan->amount ? 'text-rose-600 animate-pulse' : 'text-emerald-600' }}">
                                                            {{ $loan->item->stock }}
                                                        </span>
                                                        <span
                                                            class="text-[10px] font-bold text-gray-400 mb-1 uppercase">Unit</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-8 py-6 align-top">
                                        <div
                                            class="text-xs text-gray-400 bg-amber-50/50 p-3 rounded-2xl border border-amber-100 max-w-xs italic">
                                            <span
                                                class="block text-[9px] font-black text-amber-500 uppercase tracking-widest not-italic mb-1">Verifikasi
                                                Admin:</span>
                                            "{{ $loan->admin_note ?? 'Berkas sudah lengkap.' }}"
                                        </div>
                                    </td>

                                    <td class="px-8 py-6">
                                        <form action="{{ route('kepala.loans.assess', $loan->id) }}" method="POST"
                                            class="space-y-3">
                                            @csrf @method('PATCH')
                                            <textarea name="note" rows="2" placeholder="Catatan Kepala Lab..."
                                                class="text-xs border-transparent bg-gray-50 rounded-2xl w-full focus:bg-white focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 py-2 transition-all resize-none shadow-inner"></textarea>

                                            <div class="flex gap-2">
                                                <button type="submit" name="action" value="reject"
                                                    onclick="return confirm('Tolak?')"
                                                    class="flex-1 py-2.5 bg-white border border-rose-100 text-rose-500 rounded-xl text-xs font-black uppercase tracking-widest hover:bg-rose-50 transition-all">
                                                    Tolak
                                                </button>
                                                <button type="submit" name="action" value="approve"
                                                    {{ $loan->item->stock < $loan->amount ? 'disabled' : '' }}
                                                    class="flex-[2] py-2.5 bg-emerald-600 text-white rounded-xl text-xs font-black uppercase tracking-widest hover:bg-emerald-700 shadow-lg shadow-emerald-100 transition-all active:scale-95 disabled:opacity-30">
                                                    Setujui
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-8 py-20 text-center">
                                        <div class="flex flex-col items-center">
                                            <div class="p-5 bg-indigo-50 rounded-full mb-4">
                                                <svg class="w-12 h-12 text-indigo-300" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                            </div>
                                            <h4 class="text-gray-900 font-bold">Semua Selesai!</h4>
                                            <p class="text-xs text-gray-400 mt-1 uppercase tracking-widest">Tidak ada
                                                pengajuan yang membutuhkan keputusan Anda.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="bg-white shadow-sm rounded-[2rem] border border-gray-100 overflow-hidden mb-12">
                <div class="px-8 py-5 border-b border-gray-50 flex justify-between items-center bg-gray-50/50">
                    <h3 class="text-xs font-black text-gray-400 uppercase tracking-[0.2em]">Riwayat Otoritas Anda</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <tbody class="divide-y divide-gray-50">
                            @foreach ($historyLoans as $loan)
                                <tr class="bg-white hover:bg-gray-50 transition-colors">
                                    <td class="px-8 py-4">
                                        <div class="font-bold text-gray-800">{{ $loan->user->name }}</div>
                                        <div class="text-[10px] text-gray-400 uppercase tracking-tighter">
                                            {{ $loan->item->name }} (x{{ $loan->amount }})</div>
                                    </td>
                                    <td class="px-8 py-4">
                                        @if ($loan->status == 'approved' || $loan->status == 'returned')
                                            <span
                                                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-black bg-emerald-50 text-emerald-600 border border-emerald-100 uppercase tracking-wider">
                                                <span class="w-1 h-1 rounded-full bg-emerald-500"></span> Approved
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-black bg-rose-50 text-rose-600 border border-rose-100 uppercase tracking-wider">
                                                <span class="w-1 h-1 rounded-full bg-rose-500"></span> Rejected
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-8 py-4 text-right">
                                        <span
                                            class="text-[10px] font-bold text-gray-400 italic">"{{ Str::limit($loan->head_note ?? 'Tanpa catatan', 40) }}"</span>
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
