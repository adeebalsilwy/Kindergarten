<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class FinancialReport extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'report_type',
        'generated_by',
        'period_start',
        'period_end',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
        'period_start' => 'datetime',
        'period_end' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    protected $appends = [
        'slug',
    ];

    public function generatedBy()
    {
        return $this->belongsTo(User::class, 'generated_by');
    }

    public function getSlugAttribute()
    {
        return Str::slug($this->name);
    }
}
