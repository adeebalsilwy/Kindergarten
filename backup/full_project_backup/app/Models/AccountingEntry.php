<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountingEntry extends Model
{
    use HasFactory;

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

    ];
}
