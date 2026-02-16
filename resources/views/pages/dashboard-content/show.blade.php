@extends('layouts.app')

@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium me-auto">{{ __('global.view_dashboard_content') }}</h2>
</div>

<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-8 mx-auto">
        <div class="tab-content mt-5">
            <div class="tab-pane active" id="content-details">
                <div class="box p-5">
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12">
                            <label class="form-label font-weight-bold">{{ __('global.section') }}</label>
                            <div class="form-control">{{ $dashboardContent->section }}</div>
                        </div>

                        <div class="col-span-12">
                            <label class="form-label font-weight-bold">{{ __('global.key') }}</label>
                            <div class="form-control">{{ $dashboardContent->key }}</div>
                        </div>

                        <div class="col-span-12">
                            <label class="form-label font-weight-bold">{{ __('global.content_en') }}</label>
                            <div class="form-control">{{ $dashboardContent->content['en'] ?? '' }}</div>
                        </div>

                        <div class="col-span-12">
                            <label class="form-label font-weight-bold">{{ __('global.content_ar') }}</label>
                            <div class="form-control">{{ $dashboardContent->content['ar'] ?? '' }}</div>
                        </div>

                        <div class="col-span-6">
                            <label class="form-label font-weight-bold">{{ __('global.status') }}</label>
                            <div class="form-control">
                                @if($dashboardContent->is_active)
                                    <span class="text-success">{{ __('global.active') }}</span>
                                @else
                                    <span class="text-danger">{{ __('global.inactive') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-span-6">
                            <label class="form-label font-weight-bold">{{ __('global.order') }}</label>
                            <div class="form-control">{{ $dashboardContent->order }}</div>
                        </div>

                        <div class="col-span-12">
                            <label class="form-label font-weight-bold">{{ __('global.created_at') }}</label>
                            <div class="form-control">{{ $dashboardContent->created_at->format('Y-m-d H:i:s') }}</div>
                        </div>

                        <div class="col-span-12">
                            <label class="form-label font-weight-bold">{{ __('global.updated_at') }}</label>
                            <div class="form-control">{{ $dashboardContent->updated_at->format('Y-m-d H:i:s') }}</div>
                        </div>
                    </div>

                    <div class="mt-5">
                        <a href="{{ route('dashboard-content.index') }}" class="btn btn-outline-secondary w-24 me-1">{{ __('global.back') }}</a>
                        <a href="{{ route('dashboard-content.edit', $dashboardContent) }}" class="btn btn-primary w-24">{{ __('global.edit') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection