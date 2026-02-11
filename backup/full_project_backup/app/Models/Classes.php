<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'description',
        'teacher_id',
        'age_group',
        'capacity',
        'current_students',
        'start_time',
        'end_time',
        'room_number',
        'monthly_fee',
        'is_active',

    ];

    protected $casts = [
        'capacity' => 'integer',
        'current_students' => 'integer',
        'monthly_fee' => 'decimal:2',
        'is_active' => 'boolean',

    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function students()
    {
        return $this->hasMany(Children::class, 'class_id');
    }
}
