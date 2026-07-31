<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan_Peminjaman_Lab_{{ date('Ymd') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            .no-print {
                display: none;
            }

            @page {
                size: A4 landscape;
                margin: 15mm;
            }

            body {
                -webkit-print-color-adjust: exact;
            }
        }

        body {
            font-family: 'Times New Roman', serif;
            line-height: 1.2;
        }

        .kop-surat {
            border-bottom: 3.5px double black;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background-color: #f3f4f6 !important;
        }
    </style>
</head>

<body class="bg-white p-4">

    <div class="fixed top-4 right-4 no-print flex gap-2">
        <button onclick="window.history.back()"
            class="bg-gray-600 text-white px-4 py-2 rounded shadow hover:bg-gray-700 font-sans text-xs">
            Kembali
        </button>
        <button onclick="window.print()"
            class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 font-sans text-xs flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
            </svg>
            Cetak PDF / Printer
        </button>
    </div>

    <div class="kop-surat pb-4 mb-6 flex items-center">
        <div
            class="w-24 h-24 flex-shrink-0 flex items-center justify-center border-2 border-dashed border-gray-300 mr-6">
            <span class="text-[10px] text-gray-400 font-sans">LOGO POLITEKNIK</span>
        </div>
        <div class="flex-grow text-center pr-24">
            <h1 class="text-xl font-bold uppercase tracking-tight">Kementerian Pendidikan, Kebudayaan, Riset, dan
                Teknologi</h1>
            <h2 class="text-2xl font-bold uppercase tracking-wide">Politeknik Jambi</h2>
            <h3 class="text-lg font-bold">Unit Pelaksana Teknis (UPT) Laboratorium Terpadu</h3>
            <p class="text-xs">Jl. Lingkar Barat No. 108 Kenali Besar, Kota Baru Jambi, Indonesia 36129</p>
            <p class="text-[10px] italic">Email: lab@politeknikjambi.ac.id | Website: www.politeknikjambi.ac.id</p>
        </div>
    </div>

    <div class="text-center mb-6">
        <h4 class="text-lg font-bold uppercase underline decoration-1">Laporan Rekapitulasi Peminjaman & Penggunaan</h4>
        <p class="text-sm">Periode: <strong>{{ $startDate->format('d/m/Y') }}</strong> s.d
            <strong>{{ $endDate->format('d/m/Y') }}</strong>
        </p>
    </div>

    <table class="text-[11px] border border-black">
        <thead>
            <tr>
                <th class="border border-black px-2 py-2 text-center w-8">No</th>
                <th class="border border-black px-2 py-2 text-left">NAMA PEMINJAM</th>
                <th class="border border-black px-2 py-2 text-left">ITEM INVENTARIS</th>
                <th class="border border-black px-2 py-2 text-center">TIPE</th>
                <th class="border border-black px-2 py-2 text-center">QTY</th>
                <th class="border border-black px-2 py-2 text-center">TGL PINJAM</th>
                <th class="border border-black px-2 py-2 text-center">TGL KEMBALI</th>
                <th class="border border-black px-2 py-2 text-center">STATUS</th>
                <th class="border border-black px-2 py-2 text-left w-48">CATATAN/KETERANGAN</th>
            </tr>
        </thead>
        <tbody>
            @forelse($loans as $index => $loan)
                <tr class="{{ $loop->even ? 'bg-gray-50' : '' }}">
                    <td class="border border-black px-2 py-1.5 text-center">{{ $index + 1 }}</td>
                    <td class="border border-black px-2 py-1.5 font-bold">{{ strtoupper($loan->user->name) }}</td>
                    <td class="border border-black px-2 py-1.5">
                        <span class="block font-bold">{{ $item->name }}</span>
                        <span class="text-[9px] font-mono text-gray-500">{{ $loan->item->code }}</span>
                    </td>
                    <td class="border border-black px-2 py-1.5 text-center uppercase">{{ $loan->item->type }}</td>
                    <td class="border border-black px-2 py-1.5 text-center font-bold">{{ $loan->amount }}</td>
                    <td class="border border-black px-2 py-1.5 text-center">
                        {{ $loan->borrow_date ? \Carbon\Carbon::parse($loan->borrow_date)->format('d/m/y') : '-' }}
                    </td>
                    <td class="border border-black px-2 py-1.5 text-center font-medium">
                        {{ $loan->return_date ? \Carbon\Carbon::parse($loan->return_date)->format('d/m/y') : 'N/A' }}
                    </td>
                    <td class="border border-black px-2 py-1.5 text-center">
                        <span class="text-[10px] font-bold">
                            @if ($loan->status == 'returned')
                                SELESAI
                            @elseif($loan->status == 'rejected')
                                DITOLAK
                            @elseif($loan->status == 'approved')
                                DIPINJAM
                            @else
                                {{ strtoupper($loan->status) }}
                            @endif
                        </span>
                    </td>
                    <td class="border border-black px-2 py-1.5 text-[10px]">
                        {{ $loan->purpose }}
                        @if ($loan->head_note)
                            <br><em class="text-gray-500 italic font-bold">NB: {{ $loan->head_note }}</em>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="border border-black px-4 py-8 text-center italic text-gray-500">
                        Nihil - Tidak ditemukan data transaksi pada periode terpilih.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-12 flex justify-between px-10">
        <div class="text-center w-64">
            <p class="text-sm mb-20">Admin Laboratorium,</p>
            <p class="font-bold underline uppercase">{{ Auth::user()->name }}</p>
            <p class="text-xs">NIP. ...........................</p>
        </div>

        <div class="text-center w-64">
            <p class="text-sm mb-20 text-right pr-4 italic">Jambi, {{ date('d F Y') }}</p>
            <p class="text-sm mb-20">Mengetahui,<br>Kepala Laboratorium</p>
            <p class="font-bold underline uppercase">Nama Kepala Lab</p>
            <p class="text-xs">NIP. ...........................</p>
        </div>
    </div>

    <div class="mt-16 text-[9px] text-gray-400 border-t border-gray-200 pt-1">
        Dokumen ini dibuat secara otomatis melalui Sistem Informasi Pengelolaan Laboratorium (SIP-LAB) pada
        {{ now()->format('d/m/Y H:i:s') }}
    </div>

</body>

</html>
