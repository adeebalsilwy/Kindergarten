@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Job.add_new') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('Job.add_new') }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-10">
            <div class="intro-y box p-5">
                <form action="{{ route('jobs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('jobs.fields.queue') }}</x-base.form-label>
                            <x-base.form-input type="text" name="queue" value="{{ old('queue', $job->queue ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('jobs.fields.payload') }}</x-base.form-label>
                            <x-base.form-textarea name="payload" rows="4" class="resize-none">{{ old('payload', $job->payload ?? '') }}</x-base.form-textarea>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('jobs.fields.attempts') }}</x-base.form-label>
                            <x-base.form-input type="text" name="attempts" value="{{ old('attempts', $job->attempts ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('jobs.fields.reserved_at') }}</x-base.form-label>
                            <x-base.form-input type="text" name="reserved_at" value="{{ old('reserved_at', $job->reserved_at ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('jobs.fields.available_at') }}</x-base.form-label>
                            <x-base.form-input type="text" name="available_at" value="{{ old('available_at', $job->available_at ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('jobs.fields.name') }}</x-base.form-label>
                            <x-base.form-input type="text" name="name" value="{{ old('name', $job->name ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('jobs.fields.total_jobs') }}</x-base.form-label>
                            <x-base.form-input type="number" name="total_jobs" value="{{ old('total_jobs', $job->total_jobs ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('jobs.fields.pending_jobs') }}</x-base.form-label>
                            <x-base.form-input type="number" name="pending_jobs" value="{{ old('pending_jobs', $job->pending_jobs ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('jobs.fields.failed_jobs') }}</x-base.form-label>
                            <x-base.form-input type="number" name="failed_jobs" value="{{ old('failed_jobs', $job->failed_jobs ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('jobs.fields.failed_job_ids') }}</x-base.form-label>
                            <x-base.form-textarea name="failed_job_ids" rows="4" class="resize-none">{{ old('failed_job_ids', $job->failed_job_ids ?? '') }}</x-base.form-textarea>
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('jobs.fields.options') }}</x-base.form-label>
                            <x-base.form-textarea name="options" rows="4" class="resize-none">{{ old('options', $job->options ?? '') }}</x-base.form-textarea>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('jobs.fields.cancelled_at') }}</x-base.form-label>
                            <x-base.form-input type="number" name="cancelled_at" value="{{ old('cancelled_at', $job->cancelled_at ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('jobs.fields.finished_at') }}</x-base.form-label>
                            <x-base.form-input type="number" name="finished_at" value="{{ old('finished_at', $job->finished_at ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('jobs.fields.uuid') }}</x-base.form-label>
                            <x-base.form-input type="text" name="uuid" value="{{ old('uuid', $job->uuid ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('jobs.fields.connection') }}</x-base.form-label>
                            <x-base.form-textarea name="connection" rows="4" class="resize-none">{{ old('connection', $job->connection ?? '') }}</x-base.form-textarea>
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('jobs.fields.exception') }}</x-base.form-label>
                            <x-base.form-textarea name="exception" rows="4" class="resize-none">{{ old('exception', $job->exception ?? '') }}</x-base.form-textarea>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('jobs.fields.failed_at') }}</x-base.form-label>
                            <x-base.form-input type="datetime-local" name="failed_at" value="{{ old('failed_at', $job->failed_at ?? '') }}" class="mt-2" />
                        </div>

                    </div>
                    <div class="flex justify-end mt-5">
                        <a href="{{ route('jobs.index') }}" class="btn btn-outline-secondary w-24 me-1">{{ __('global.cancel') }}</a>
                        <x-base.button type="submit" variant="primary" class="w-24">{{ __('global.save') }}</x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
