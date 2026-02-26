<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Fee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'amount',
        'description',
        'is_active',
        'frequency',
        'category',
        'due_date',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'is_active' => 'boolean',
        'due_date' => 'date',
    ];

    protected $appends = [
        'slug',
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class, 'fee_id');
    }

    public function getSlugAttribute()
    {
        return Str::slug($this->name);
    }

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'is_active' => 'boolean',
            'due_date' => 'date',
            'deleted_at' => 'datetime',
        ];
    }
}
