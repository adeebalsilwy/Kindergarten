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
        'check_in_time',
        'check_out_time',
        'absence_reason',
        'duration_minutes',
        'check_in_location',
        'check_out_location',
        'check_in_status',
        'check_out_status',
        'attendance_type',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'datetime',
            'check_in_time' => 'datetime',
            'check_out_time' => 'datetime',
            'duration_minutes' => 'integer',
            'deleted_at' => 'datetime',
        ];
    }

    public function child()
    {
        return $this->belongsTo(Children::class, 'child_id');
    }

    public function getClassAttribute()
    {
        return $this->child->class; // Assuming child has a class relationship
    }
}