<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\ItemController;

Route::get('/', function () {
    return redirect()->route('login');
});

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // 2. Dashboard ADMIN
    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/dashboard/admin', [DashboardController::class, 'admin'])->name('dashboard.admin');

        // Route ini menghandle validasi barang & bahan (Pending -> Validated)
        Route::patch('/admin/loans/{loan}/validate', [LoanController::class, 'validateRequest'])->name('admin.loans.validate');

        // Route ini khusus untuk pengembalian barang (Approved -> Returned)
        Route::patch('/admin/loans/{loan}/return', [LoanController::class, 'returnItem'])->name('admin.loans.return');

        Route::resource('admin/items', ItemController::class, ['as' => 'admin']);
    });

    // 3. Dashboard KEPALA LAB
    Route::middleware(['role:kepala_lab'])->group(function () {
        Route::get('/dashboard/kepala', [DashboardController::class, 'kepala'])->name('dashboard.kepala');

        // Route ini menghandle persetujuan & potong stok (Validated -> Approved)
        Route::patch('/kepala/loans/{loan}/assess', [LoanController::class, 'assessRequest'])->name('kepala.loans.assess');
    });

    // 4. Dashboard MAHASISWA
    Route::middleware(['role:mahasiswa'])->group(function () {
        Route::get('/dashboard/mahasiswa', [DashboardController::class, 'mahasiswa'])->name('dashboard.mahasiswa');

        // PERBAIKAN: Pisahkan route create agar tidak error undefined method
        Route::get('/loans/create/barang', [LoanController::class, 'createBarang'])->name('loans.create.barang');
        Route::get('/loans/create/bahan', [LoanController::class, 'createBahan'])->name('loans.create.bahan');

        // Tetap menggunakan satu store karena logic internal controller sudah menghandle keduanya
        Route::post('/loans/store', [LoanController::class, 'store'])->name('loans.store');
    });

    // Route Umum
    Route::get('/loans/{loan}/print', [LoanController::class, 'print'])->name('loans.print');
    Route::get('/report/print', [ReportController::class, 'print'])->name('report.print');

    // Profile Routes
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});
