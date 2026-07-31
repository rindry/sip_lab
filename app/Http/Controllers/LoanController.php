<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LoanController extends Controller
{
    // --- AREA MAHASISWA ---

    // Input Peminjaman BARANG
    public function createBarang()
    {
        $items = Item::where('type', 'barang')->where('stock', '>', 0)->get();
        return view('loans.create_barang', compact('items'));
    }

    // Input Permintaan BAHAN
    public function createBahan()
    {
        $items = Item::where('type', 'bahan')->where('stock', '>', 0)->get();
        return view('loans.create_bahan', compact('items'));
    }

    public function store(Request $request)
    {
        $item = Item::findOrFail($request->item_id);

        // Validasi Dinamis
        $rules = [
            'item_id' => 'required|exists:items,id',
            'amount' => 'required|integer|min:1',
            'purpose' => 'required|string|min:5',
        ];

        // Hanya wajib tanggal jika tipenya BARANG
        if ($item->type === 'barang') {
            $rules['borrow_date'] = 'required|date|after_or_equal:today';
            $rules['return_date'] = 'required|date|after_or_equal:borrow_date';
        }

        $request->validate($rules);

        // Simpan Data
        Loan::create([
            'user_id' => auth()->id(),
            'item_id' => $request->item_id,
            'amount' => $request->amount,
            'purpose' => $request->purpose,
            'status' => 'pending',
            // Jika bahan, ini otomatis terisi null dari request yang tidak ada inputnya
            'borrow_date' => $item->type === 'barang' ? $request->borrow_date : null,
            'return_date' => $item->type === 'barang' ? $request->return_date : null,
        ]);

        return redirect()->route('dashboard.mahasiswa')->with('success', 'Pengajuan berhasil dikirim!');
    }

    // --- AREA ADMIN ---

    public function validateRequest(Request $request, Loan $loan)
    {
        $request->validate(['action' => 'required|in:approve,reject']);

        $status = ($request->action == 'approve') ? 'validated' : 'rejected';

        $loan->update([
            'status' => $status,
            'admin_note' => $request->note
        ]);

        return back()->with('success', 'Validasi Admin selesai.');
    }

    public function returnItem(Loan $loan)
    {
        // Hanya untuk tipe barang
        if ($loan->item->type !== 'barang') {
            return back()->with('error', 'Bahan tidak perlu dikembalikan.');
        }

        DB::transaction(function () use ($loan) {
            $loan->item->increment('stock', $loan->amount);
            $loan->update([
                'status' => 'returned',
                'return_date_actual' => Carbon::now()
            ]);
        });

        return back()->with('success', 'Barang diterima. Stok bertambah.');
    }

    // --- AREA KEPALA LAB ---

    public function assessRequest(Request $request, Loan $loan)
    {
        if ($request->action == 'approve') {
            return DB::transaction(function () use ($loan) {
                $item = Item::where('id', $loan->item_id)->lockForUpdate()->first();

                if ($item->stock < $loan->amount) {
                    return back()->with('error', 'Gagal ACC. Stok fisik habis.');
                }

                // POTONG STOK DI SINI (Berlaku untuk barang maupun bahan)
                $item->decrement('stock', $loan->amount);

                $loan->update(['status' => 'approved']);
                return back()->with('success', 'Persetujuan sukses. Stok telah dikurangi.');
            });
        }

        $loan->update(['status' => 'rejected', 'head_note' => 'Ditolak Kepala Lab']);
        return back()->with('error', 'Pengajuan ditolak.');
    }
}
