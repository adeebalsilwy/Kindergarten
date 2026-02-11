<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Filterable;

class AccountingEntry extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $searchable = [
        'description',
        'reference',
    ];

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


}
