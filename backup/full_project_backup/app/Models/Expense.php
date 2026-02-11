<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'amount',
        'expense_date',
        'category',
        'vendor',
        'receipt_number',
        'payment_method',
        'reference_number',
        'status',
        'created_by',
        'assigned_to',

    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'expense_date' => 'datetime',

    ];
}
