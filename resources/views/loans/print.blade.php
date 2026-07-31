<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Peminjaman - {{ $loan->kode_pinjam ?? 'DRAFT' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Times+New+Roman&display=swap');
        body { font-family: 'Times New Roman', serif; }
        @media print {
            .no-print { display: none; }
            body { -webkit-print-color-adjust: exact; }
        }
    </style>
</head>
<body class="bg-gray-100 p-8">

    <div class="max-w-3xl mx-auto mb-6 flex justify-end no-print">
        <button onclick="window.print()" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
            Cetak Dokumen
        </button>
    </div>

    <div class="max-w-3xl mx-auto bg-white p-10 shadow-lg border border-gray-200 print:shadow-none print:border-none print:p-0">
        
        <div class="flex items-center justify-between border-b-2 border-black pb-4 mb-6">
            <div class="flex items-center gap-4">
                <div class="w-20 h-20 bg-gray-200 flex items-center justify-center text-xs text-gray-500 font-bold rounded-full">LOGO</div>
                <div>
                    <h1 class="text-xl font-bold uppercase tracking-wider">Politeknik Jambi</h1>
                    <h2 class="text-sm font-semibold">UPT Laboratorium Terpadu</h2>
                    <p class="text-xs mt-1">Jl. Lingkar Barat II, Bagan Pete, Kota Jambi - Indonesia</p>
                </div>
            </div>
            <div class="text-right">
                <h3 class="text-lg font-bold text-gray-800">BUKTI PEMINJAMAN</h3>
                <p class="text-sm text-gray-500">No: {{ $loan->id }}/LAB/{{ date('Y') }}</p>
            </div>
        </div>

        <div class="mb-6">
            <p class="text-sm">Yang bertanda tangan di bawah ini menerangkan bahwa:</p>
            <table class="w-full text-sm mt-3">
                <tr>
                    <td class="w-32 py-1 font-bold">Nama Peminjam</td>
                    <td>: {{ $loan->user->name }}</td>
                </tr>
                <tr>
                    <td class="py-1 font-bold">NIM / ID</td>
                    <td>: {{ $loan->user->email }}</td>
                </tr>
                <tr>
                    <td class="py-1 font-bold">Keperluan</td>
                    <td>: {{ $loan->purpose }}</td>
                </tr>
            </table>
        </div>

        <div class="mb-8">
            <p class="text-sm font-bold mb-2">Telah diizinkan meminjam barang inventaris sebagai berikut:</p>
            <table class="w-full text-sm border-collapse border border-black">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-black px-3 py-2 text-center w-10">No</th>
                        <th class="border border-black px-3 py-2 text-left">Nama Barang</th>
                        <th class="border border-black px-3 py-2 text-center w-24">Jumlah</th>
                        <th class="border border-black px-3 py-2 text-center">Kondisi Keluar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-black px-3 py-2 text-center">1</td>
                        <td class="border border-black px-3 py-2">
                            <span class="font-bold block">{{ $loan->item->name }}</span>
                            <span class="text-xs text-gray-600">Kode: {{ $loan->item->kode_item }}</span>
                        </td>
                        <td class="border border-black px-3 py-2 text-center">{{ $loan->amount }} Unit</td>
                        <td class="border border-black px-3 py-2 text-center">{{ $loan->item->kondisi }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mb-8 text-sm">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <span class="font-bold">Tanggal Pinjam:</span> <br>
                    {{ \Carbon\Carbon::parse($loan->borrow_date)->format('d F Y') }}
                </div>
                <div>
                    <span class="font-bold">Rencana Kembali:</span> <br>
                    {{ \Carbon\Carbon::parse($loan->return_date)->format('d F Y') }}
                </div>
            </div>
        </div>

        <div class="mb-12 text-xs border border-gray-300 p-3 bg-gray-50 italic">
            <strong>Catatan Penting:</strong> <br>
            1. Barang harus dikembalikan sesuai tanggal rencana kembali.<br>
            2. Kerusakan atau kehilangan barang menjadi tanggung jawab peminjam sepenuhnya.<br>
            3. Bawa surat ini saat mengambil dan mengembalikan barang.
        </div>

        <div class="grid grid-cols-2 text-center text-sm gap-10">
            <div>
                <p class="mb-16">Peminjam,</p>
                <p class="font-bold underline">{{ $loan->user->name }}</p>
            </div>
            <div>
                <p class="mb-16">Jambi, {{ date('d F Y') }} <br> Menyetujui, Kepala Lab</p>
                <p class="font-bold underline">Administrator Lab</p>
                <p class="text-xs">NIP. .........................</p>
            </div>
        </div>

    </div>

</body>
</html>