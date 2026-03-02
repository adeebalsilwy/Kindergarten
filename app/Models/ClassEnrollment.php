<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClassEnrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'child_id',
        'enrollment_date',
        'withdrawal_date',
        'status',
        'reason',
        'created_by',
    ];

    protected $casts = [
        'enrollment_date' => 'date',
        'withdrawal_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relationships
    public function class(): BelongsTo
    {
        return $this->belongsTo(Classes::class);
    }

    public function child(): BelongsTo
    {
        return $this->belongsTo(Children::class, 'child_id');
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeTransferred($query)
    {
        return $query->where('status', 'transferred');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopeInactive($query)
    {
        return $query->where('status', 'inactive');
    }
}