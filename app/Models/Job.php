<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'queue',
        'payload',
        'attempts',
        'reserved_at',
        'available_at',
        'name',
        'total_jobs',
        'pending_jobs',
        'failed_jobs',
        'failed_job_ids',
        'options',
        'cancelled_at',
        'finished_at',
        'uuid',
        'connection',
        'exception',
        'failed_at',
    ];

    protected $casts = [
        'total_jobs' => 'integer',
        'pending_jobs' => 'integer',
        'failed_jobs' => 'integer',
        'cancelled_at' => 'integer',
        'finished_at' => 'integer',
        'failed_at' => 'datetime',
    ];

    protected $dates = [
        'failed_at',
    ];

    protected $appends = [
        'slug',
    ];
}
