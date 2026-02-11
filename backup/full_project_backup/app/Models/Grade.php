<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'child_id',
        'subject',
        'score',
        'date',

    ];

    protected $casts = [
        'date' => 'datetime',

    ];

    public function child()
    {
        return $this->belongsTo(Children::class, 'child_id');
    }
}
