<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        $jobNames = ['SendNotificationJob', 'GenerateReportJob', 'BackupDatabaseJob', 'ProcessPaymentJob', 'SendEmailJob'];

        $this->merge([
            'queue' => $this->queue ?? 'default',
            'payload' => $this->payload ?? json_encode(['data' => [], 'timestamp' => now()]),
            'attempts' => $this->attempts ?? 0,
            'reserved_at' => $this->reserved_at ?? null,
            'available_at' => $this->available_at ?? now()->addSeconds(rand(0, 60)),
            'name' => $this->name ?? $jobNames[array_rand($jobNames)],
            'total_jobs' => $this->total_jobs ?? rand(1, 10),
            'pending_jobs' => $this->pending_jobs ?? rand(0, 5),
            'failed_jobs' => $this->failed_jobs ?? 0,
            'failed_job_ids' => $this->failed_job_ids ?? null,
            'options' => $this->options ?? json_encode(['timeout' => 60, 'tries' => 3]),
            'cancelled_at' => $this->cancelled_at ?? null,
            'finished_at' => $this->finished_at ?? null,
            'uuid' => $this->uuid ?? (string) \Illuminate\Support\Str::uuid(),
            'connection' => $this->connection ?? 'database',
            'exception' => $this->exception ?? null,
            'failed_at' => $this->failed_at ?? null,
        ]);
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
