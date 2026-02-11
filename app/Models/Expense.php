<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use HasFactory, SoftDeletes;

    protected $appends = [
        'formatted_amount',
        'expense_date_formatted',
        'category_label',
    ];

    protected $fillable = [
        'title',
        'category',
        'description',
        'amount',
        'expense_date',
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
        'expense_date' => 'date',
        'deleted_at' => 'datetime',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function assignee()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function getFormattedAmountAttribute()
    {
        return '$' . number_format($this->amount, 2);
    }

    public function getExpenseDateFormattedAttribute()
    {
        return $this->expense_date ? $this->expense_date->format('Y-m-d') : null;
    }

    public function getCategoryLabelAttribute()
    {
        return ucfirst($this->category);
    }
}
