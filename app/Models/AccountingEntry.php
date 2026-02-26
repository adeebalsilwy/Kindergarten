<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountingEntry extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'description',
        'debit',
        'credit',
        'entry_date',
        'reference',
        'account_type',
    ];

    protected $casts = [
        'debit' => 'decimal:2',
        'credit' => 'decimal:2',
        'entry_date' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
