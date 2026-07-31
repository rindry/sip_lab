<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'loan_id',
        'item_id',
        'jumlah',
        'kondisi_item',
    ];

    /**
     * Relasi ke Loan
     */
    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }

    /**
     * Relasi ke Item
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
