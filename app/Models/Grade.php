<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grade extends Model
{
    use HasFactory, SoftDeletes;

    protected $appends = [
        'percentage',
        'letter_grade',
        'is_passing',
    ];

    protected $fillable = [
        'child_id',
        'subject',
        'score',
        'date',
        'comments',
        'evaluator_id',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'deleted_at' => 'datetime',
        ];
    }

    public function child()
    {
        return $this->belongsTo(Children::class, 'child_id');
    }

    public function evaluator()
    {
        return $this->belongsTo(Teacher::class, 'evaluator_id');
    }

    public function getPercentageAttribute()
    {
        // Convert letter grade to percentage
        $gradeScale = [
            'A+' => 97,
            'A' => 93,
            'A-' => 90,
            'B+' => 87,
            'B' => 83,
            'B-' => 80,
            'C+' => 77,
            'C' => 73,
            'C-' => 70,
            'D' => 60,
            'F' => 0,
        ];
        
        return $gradeScale[$this->score] ?? 0;
    }

    public function getLetterGradeAttribute()
    {
        return $this->score;
    }

    public function getIsPassingAttribute()
    {
        $passingGrades = ['A+', 'A', 'A-', 'B+', 'B', 'B-', 'C+', 'C', 'C-'];
        return in_array($this->score, $passingGrades);
    }
}