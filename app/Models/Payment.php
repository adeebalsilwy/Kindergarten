<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'child_id',
        'fee_id',
        'amount',
        'payment_date',
        'payment_method',
        'reference_number',
        'status',
        'receipt_number',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'payment_date' => 'datetime',
    ];

    public function child()
    {
        return $this->belongsTo(Children::class, 'child_id');
    }

    public function fee()
    {
        return $this->belongsTo(Fee::class, 'fee_id');
    }

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'payment_date' => 'datetime',
            'deleted_at' => 'datetime',
        ];
    }
}
