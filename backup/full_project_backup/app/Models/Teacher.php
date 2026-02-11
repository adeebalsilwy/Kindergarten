<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'date_of_birth',
        'gender',
        'qualification',
        'experience',
        'salary',
        'hire_date',
        'photo_path',
        'is_active',
        'notes',

    ];

    protected $casts = [
        'date_of_birth' => 'datetime',
        'salary' => 'decimal:2',
        'hire_date' => 'datetime',
        'is_active' => 'boolean',

    ];

    public function classes()
    {
        return $this->hasMany(Classes::class);
    }
}
