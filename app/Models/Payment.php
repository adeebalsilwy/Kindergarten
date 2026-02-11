<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use App\Traits\Filterable;

class Payment extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $searchable = [
        'reference_number',
        'receipt_number',
    ];

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

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'payment_date' => 'datetime',
            'deleted_at' => 'datetime',
        ];
    }

    protected $appends = [
        'formatted_amount',
        'payment_date_formatted',
        'payment_status',
    ];

    public function child()
    {
        return $this->belongsTo(Children::class, 'child_id');
    }

    public function fee()
    {
        return $this->belongsTo(Fee::class, 'fee_id');
    }

    // Accessors
    public function getFormattedAmountAttribute()
    {
        return number_format($this->amount, 2, '.', '');
    }

    public function getPaymentDateFormattedAttribute()
    {
        return $this->payment_date ? $this->payment_date->format('F j, Y') : null;
    }

    public function getPaymentStatusAttribute()
    {
        return $this->status ?: 'completed';
    }
}