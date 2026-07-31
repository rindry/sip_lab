<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Loan extends Model
{
    // protected $guarded = ['id'];
    protected $fillable = [
        'user_id',
        'item_id',
        'amount',
        'borrow_date',
        'return_date',
        'return_date_actual',
        'purpose',    // <--- WAJIB ADA
        'status',
        'admin_note',
        'head_note',
    ];

    // Relasi ke User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Barang
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    public function isBahan()
    {
        return $this->item->type === 'bahan';
    }
}
