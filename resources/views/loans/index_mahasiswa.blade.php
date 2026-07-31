<x-app-layout>
    <x-slot name="header">
        <h2>Daftar Peminjaman Saya</h2>
    </x-slot>

    <div class="p-4 bg-white rounded shadow">
        <table class="w-full border">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Item</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($loans as $loan)
                    <tr>
                        <td>{{ $loan->item->kode_item }}</td>
                        <td>{{ $loan->item->nama_item }}</td>
                        <td>{{ $loan->status }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Belum ada peminjaman</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
