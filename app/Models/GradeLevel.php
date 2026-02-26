<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GradeLevel extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'code',
        'description',
        'min_age',
        'max_age',
        'order',
    ];

    protected $casts = [
        'min_age' => 'integer',
        'max_age' => 'integer',
        'order' => 'integer',
    ];

    public function classes()
    {
        return $this->hasMany(Classes::class, 'grade_level_id');
    }
}