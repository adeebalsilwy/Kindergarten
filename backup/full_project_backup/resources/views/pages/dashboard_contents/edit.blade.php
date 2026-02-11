@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('DashboardContent.edit') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('DashboardContent.edit') }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-10">
            <div class="intro-y box p-5">
                <form action="{{ route('dashboard_contents.update', $dashboardContents->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('dashboard-contents.fields.section') }}</x-base.form-label>
                            <x-base.form-input type="text" name="section" value="{{ old('section', $dashboardContents->section ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('dashboard-contents.fields.key') }}</x-base.form-label>
                            <x-base.form-input type="text" name="key" value="{{ old('key', $dashboardContents->key ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('dashboard-contents.fields.content') }}</x-base.form-label>
                            <x-base.form-textarea name="content" rows="4" class="resize-none">{{ old('content', $dashboardContents->content ?? '') }}</x-base.form-textarea>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('dashboard-contents.fields.is_active') }}</x-base.form-label>
                            <div class="mt-2 space-y-2">
                                <!-- Hidden input to send 0 if unchecked -->
                                <input type="hidden" name="is_active" value="0">
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <x-base.form-input type="checkbox" name="is_active" value="1" {{ old('is_active', $dashboardContents->is_active ?? false) ? 'checked' : '' }} class="sr-only peer" />
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/30 dark:peer-focus:ring-primary rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('global.active') }}</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('dashboard-contents.fields.order') }}</x-base.form-label>
                            <x-base.form-input type="number" name="order" value="{{ old('order', $dashboardContents->order ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('dashboard-contents.fields.metadata') }}</x-base.form-label>
                            <x-base.form-textarea name="metadata" rows="4" class="resize-none">{{ old('metadata', $dashboardContents->metadata ?? '') }}</x-base.form-textarea>
                        </div>

                    </div>
                    <div class="flex justify-end mt-5">
                        <a href="{{ route('dashboard_contents.index') }}" class="btn btn-outline-secondary w-24 mr-1">{{ __('global.cancel') }}</a>
                        <x-base.button type="submit" variant="primary" class="w-24">{{ __('global.update') }}</x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
