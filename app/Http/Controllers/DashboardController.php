<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Fungsi untuk mengarahkan User berdasarkan Role
    public function index()
    {
        $role = Auth::user()->role;

        if ($role === 'admin') {
            return redirect()->route('dashboard.admin');
        } elseif ($role === 'kepala_lab') {
            return redirect()->route('dashboard.kepala');
        } else {
            return redirect()->route('dashboard.mahasiswa');
        }
    }
    public function admin()
    {
        // 1. DATA PENDING: Peminjaman baru yang butuh validasi admin
        $pendingLoans = Loan::with(['user', 'item'])
            ->where('status', 'pending')
            ->latest()
            ->get();

        // 2. DATA APPROVED: Barang yang sedang dipinjam (siap dikembalikan)
        // Note: Status 'validated' tidak muncul disini karena itu ranah Kepala Lab
        $activeLoans = Loan::with(['user', 'item'])
            ->where('status', 'approved')
            ->orderBy('return_date', 'asc') // Urutkan yang harus kembali duluan
            ->get();

        // 3. RIWAYAT: Barang yang sudah selesai atau ditolak
        $historyLoans = Loan::with(['user', 'item'])
            ->whereIn('status', ['returned', 'rejected'])
            ->latest()
            ->limit(10) // Batasi 10 terakhir agar tidak berat
            ->get();

        return view('dashboard.admin', compact('pendingLoans', 'activeLoans', 'historyLoans'));
    }
    public function kepala()
    {
        // 1. ANTREAN: Menunggu persetujuan (Sudah divalidasi Admin)
        $validatedLoans = Loan::with(['user', 'item'])
            ->where('status', 'validated')
            ->orderBy('updated_at', 'asc') // Proses dari yang terlama
            ->get();

        // 2. RIWAYAT: Keputusan yang pernah diambil (Approved/Rejected/Returned)
        $historyLoans = Loan::with(['user', 'item'])
            ->whereIn('status', ['approved', 'rejected', 'returned'])
            ->latest()
            ->limit(10)
            ->get();

        return view('dashboard.kepala_lab', compact('validatedLoans', 'historyLoans'));
    }

    public function mahasiswa()
    {
        // Mahasiswa melihat riwayatnya sendiri
        $loans = Loan::with('item')->where('user_id', Auth::id())->latest()->get();
        return view('dashboard.mahasiswa', compact('loans'));
    }
}
