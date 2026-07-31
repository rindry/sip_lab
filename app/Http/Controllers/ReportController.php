<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function print(Request $request)
    {
        // Validasi input tanggal
        $request->validate([
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',
            'status'     => 'nullable|string'
        ]);

        $startDate = Carbon::parse($request->start_date)->startOfDay();
        $endDate   = Carbon::parse($request->end_date)->endOfDay();
        $status    = $request->status;

        // Query Data
        $query = Loan::with(['user', 'item'])
            ->whereBetween('borrow_date', [$startDate, $endDate]);

        // Filter Status (Jika dipilih)
        if ($status && $status !== 'all') {
            $query->where('status', $status);
        }

        $loans = $query->orderBy('borrow_date', 'asc')->get();

        return view('reports.print_recap', compact('loans', 'startDate', 'endDate'));
    }
}