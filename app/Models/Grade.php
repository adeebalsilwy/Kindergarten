<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Filterable;

class Grade extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $searchable = [
        'subject',
        'score',
        'grade',
        'comments',
    ];

    protected $fillable = [
        'child_id',
        'subject',
        'score',
        'grade',
        'date',
        'comments',
        'evaluator_id',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function child()
    {
        return $this->belongsTo(Children::class, 'child_id');
    }

    public function evaluator()
    {
        return $this->belongsTo(User::class, 'evaluator_id');
    }
    
    // Model Events
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($grade) {
            // Automatically calculate grade from score if not provided or if score changed
            if (!$grade->grade || $grade->isDirty('score')) {
                $grade->grade = $grade->calculateGradeFromScore($grade->score);
            }
        });
    }
    
    // Accessors
    public function getLetterGradeAttribute(): string
    {
        return $this->grade;
    }
    
    public function getPercentageAttribute(): float
    {
        // Handle both numeric scores and Arabic text scores
        if (is_numeric($this->score)) {
            return (float)$this->score;
        }
        
        // Map Arabic text scores to numeric values
        $scoreMap = [
            'ممتاز' => 95,      // Excellent
            'جيد جداً' => 85,   // Very Good
            'جيد' => 75,        // Good
            'مقبول' => 65,     // Acceptable
            'ضعيف' => 45,        // Weak
        ];
        
        return $scoreMap[$this->score] ?? 0;
    }
    
    public function getIsPassingAttribute(): bool
    {
        return $this->percentage >= 60;
    }
    
    // Helper method to calculate grade from score
    private function calculateGradeFromScore($score): string
    {
        // Handle both numeric scores and Arabic text scores
        if (is_numeric($score)) {
            $numericScore = (float)$score;
        } else {
            // Map Arabic text scores to numeric values
            $scoreMap = [
                'ممتاز' => 95,      // Excellent
                'جيد جداً' => 85,   // Very Good
                'جيد' => 75,        // Good
                'مقبول' => 65,     // Acceptable
                'ضعيف' => 45,        // Weak
            ];
            $numericScore = $scoreMap[$score] ?? 0;
        }
        
        if ($numericScore >= 90) {
            return 'A';
        } elseif ($numericScore >= 80) {
            return 'B';
        } elseif ($numericScore >= 70) {
            return 'C';
        } elseif ($numericScore >= 60) {
            return 'D';
        } else {
            return 'F';
        }
    }
}