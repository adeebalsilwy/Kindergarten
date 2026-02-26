<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'child_id',
        'date',
        'status',
        'notes',
        'check_in',
        'check_out',
        'absence_reason',
    ];

    protected $casts = [
        'date' => 'datetime',
        'check_in' => 'datetime',
        'check_out' => 'datetime',
    ];

    public function child()
    {
        return $this->belongsTo(Children::class, 'child_id');
    }

    public function getClassAttribute()
    {
        return $this->child->class; // Assuming child has a class relationship
    }

    protected function casts(): array
    {
        return [
            'date' => 'datetime',
            'check_in' => 'datetime',
            'check_out' => 'datetime',
            'deleted_at' => 'datetime',
        ];
    }
}
