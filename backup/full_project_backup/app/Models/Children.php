<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    use HasFactory;

    protected $table = 'children';

    protected $fillable = [
        'name',
        'dob',
        'gender',
        'class_id',
        'parent_id',
        'second_parent_id',
        'photo_path',
        'fees_required',
        'fees_paid',
        'emergency_contact_name',
        'emergency_contact_phone',
        'emergency_contact_relation',
        'medical_conditions',
        'allergies',
        'medications',
        'blood_type',
        'enrollment_date',
        'expected_graduation_date',
        'enrollment_status',
        'nationality',
        'religion',
        'special_needs',
        'last_attended_at',
    ];

    protected $casts = [
        'dob' => 'datetime',
        'enrollment_date' => 'datetime',
        'expected_graduation_date' => 'datetime',
        'last_attended_at' => 'datetime',
        'fees_required' => 'decimal:2',
        'fees_paid' => 'decimal:2',

    ];

    public function parent()
    {
        return $this->belongsTo(Guardian::class, 'parent_id');
    }

    public function second_parent()
    {
        return $this->belongsTo(Guardian::class, 'second_parent_id');
    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'child_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'child_id');
    }
}
