<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grade extends Model
{
    use HasFactory, SoftDeletes;

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
        'score' => 'decimal:2',
    ];

    public function child()
    {
        return $this->belongsTo(Children::class, 'child_id');
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
        return (float)$this->score;
    }
    
    public function getIsPassingAttribute(): bool
    {
        return (float)$this->score >= 60;
    }
    
    // Helper method to calculate grade from score
    private function calculateGradeFromScore($score): string
    {
        $numericScore = (float)$score;
        
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