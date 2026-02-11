<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'queue' => 'nullable|string|max:255',
            'payload' => 'nullable|string',
            'attempts' => 'nullable',
            'reserved_at' => 'nullable',
            'available_at' => 'nullable',
            'name' => 'nullable|string|max:255',
            'total_jobs' => 'nullable|integer',
            'pending_jobs' => 'nullable|integer',
            'failed_jobs' => 'nullable|integer',
            'failed_job_ids' => 'nullable|string',
            'options' => 'nullable',
            'cancelled_at' => 'nullable|integer',
            'finished_at' => 'nullable|integer',
            'uuid' => 'nullable|string|max:255',
            'connection' => 'nullable|string',
            'exception' => 'nullable|string',
            'failed_at' => 'nullable|date',

        ];
    }

    public function attributes()
    {
        return [
            'queue' => __('jobs.fields.queue'),
            'payload' => __('jobs.fields.payload'),
            'attempts' => __('jobs.fields.attempts'),
            'reserved_at' => __('jobs.fields.reserved_at'),
            'available_at' => __('jobs.fields.available_at'),
            'name' => __('jobs.fields.name'),
            'total_jobs' => __('jobs.fields.total_jobs'),
            'pending_jobs' => __('jobs.fields.pending_jobs'),
            'failed_jobs' => __('jobs.fields.failed_jobs'),
            'failed_job_ids' => __('jobs.fields.failed_job_ids'),
            'options' => __('jobs.fields.options'),
            'cancelled_at' => __('jobs.fields.cancelled_at'),
            'finished_at' => __('jobs.fields.finished_at'),
            'uuid' => __('jobs.fields.uuid'),
            'connection' => __('jobs.fields.connection'),
            'exception' => __('jobs.fields.exception'),
            'failed_at' => __('jobs.fields.failed_at'),

        ];
    }
}
