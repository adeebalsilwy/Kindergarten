<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use App\Traits\Filterable;

class Fee extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $searchable = [
        'name',
        'description',
        'category',
    ];

    protected $fillable = [
        'name',
        'amount',
        'description',
        'is_active',
        'frequency',
        'category',
        'due_date',
    ];

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'is_active' => 'boolean',
            'due_date' => 'date',
            'deleted_at' => 'datetime',
        ];
    }

    protected $appends = [
        'slug',
        'formatted_amount',
        'is_overdue',
        'due_date_formatted',
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class, 'fee_id');
    }

    public function getSlugAttribute()
    {
        return Str::slug($this->name);
    }

    public function getFormattedAmountAttribute()
    {
        return '$' . number_format($this->amount, 2);
    }

    public function getIsOverdueAttribute()
    {
        return $this->due_date && $this->due_date->isPast();
    }

    public function getDueDateFormattedAttribute()
    {
        return $this->due_date ? $this->due_date->format('Y-m-d') : null;
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}