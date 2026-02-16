@extends('layouts.app')

@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium me-auto">{{ __('global.edit_dashboard_content') }}</h2>
</div>

<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-8 mx-auto">
        <div class="tab-content mt-5">
            <div class="tab-pane active" id="content-form">
                <div class="box p-5">
                    <form method="POST" action="{{ route('dashboard-content.update', $dashboardContent) }}">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-12">
                                <label for="section" class="form-label">{{ __('global.section') }} <span class="text-danger">*</span></label>
                                <x-base.form-select id="section" name="section" class="form-control @error('section') is-invalid @enderror" required>
                                    <option value="">{{ __('global.select_section') }}</option>
                                    <option value="welcome_section" {{ old('section', $dashboardContent->section) == 'welcome_section' ? 'selected' : '' }}>Welcome Section</option>
                                    <option value="stats_cards" {{ old('section', $dashboardContent->section) == 'stats_cards' ? 'selected' : '' }}>Stats Cards</option>
                                    <option value="recent_activities" {{ old('section', $dashboardContent->section) == 'recent_activities' ? 'selected' : '' }}>Recent Activities</option>
                                    <option value="monthly_summary" {{ old('section', $dashboardContent->section) == 'monthly_summary' ? 'selected' : '' }}>Monthly Summary</option>
                                    <option value="quick_actions" {{ old('section', $dashboardContent->section) == 'quick_actions' ? 'selected' : '' }}>Quick Actions</option>
                                    <option value="parents_communication" {{ old('section', $dashboardContent->section) == 'parents_communication' ? 'selected' : '' }}>Parents Communication</option>
                                    <option value="important_updates" {{ old('section', $dashboardContent->section) == 'important_updates' ? 'selected' : '' }}>Important Updates</option>
                                    <option value="custom" {{ old('section', $dashboardContent->section) == 'custom' ? 'selected' : '' }}>Custom Section</option>
                                </x-base.form-select>
                                @error('section')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-span-12">
                                <label for="key" class="form-label">{{ __('global.key') }} <span class="text-danger">*</span></label>
                                <x-base.form-input id="key" name="key" type="text" class="form-control @error('key') is-invalid @enderror" 
                                    placeholder="{{ __('global.enter_key') }}" value="{{ old('key', $dashboardContent->key) }}" required />
                                @error('key')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-span-12">
                                <label for="content_en" class="form-label">{{ __('global.content_en') }} <span class="text-danger">*</span></label>
                                <x-base.form-textarea id="content_en" name="content_en" class="form-control @error('content_en') is-invalid @enderror" 
                                    placeholder="{{ __('global.enter_content_en') }}" rows="4" required>{{ old('content_en', $dashboardContent->content['en'] ?? '') }}</x-base.form-textarea>
                                @error('content_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-span-12">
                                <label for="content_ar" class="form-label">{{ __('global.content_ar') }} <span class="text-danger">*</span></label>
                                <x-base.form-textarea id="content_ar" name="content_ar" class="form-control @error('content_ar') is-invalid @enderror" 
                                    placeholder="{{ __('global.enter_content_ar') }}" rows="4" required>{{ old('content_ar', $dashboardContent->content['ar'] ?? '') }}</x-base.form-textarea>
                                @error('content_ar')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-span-6">
                                <label for="is_active" class="form-label">{{ __('global.status') }}</label>
                                <x-base.form-check.input id="is_active" name="is_active" class="form-check-input @error('is_active') is-invalid @enderror" 
                                    type="checkbox" value="1" {{ old('is_active', $dashboardContent->is_active) ? 'checked' : '' }} />
                                <label for="is_active" class="form-check-label">{{ __('global.active') }}</label>
                                @error('is_active')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-span-6">
                                <label for="order" class="form-label">{{ __('global.order') }}</label>
                                <x-base.form-input id="order" name="order" type="number" class="form-control @error('order') is-invalid @enderror" 
                                    placeholder="{{ __('global.enter_order') }}" value="{{ old('order', $dashboardContent->order) }}" min="0" />
                                @error('order')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-5">
                            <a href="{{ route('dashboard-content.index') }}" class="btn btn-outline-secondary w-24 me-1">{{ __('global.cancel') }}</a>
                            <button type="submit" class="btn btn-primary w-24">{{ __('global.update') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection