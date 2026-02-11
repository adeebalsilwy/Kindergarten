@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Fee.edit') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('Fee.edit') }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-10">
            <div class="intro-y box p-5">
                <form action="{{ route('fees.update', $fee->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('fees.fields.name') }}</x-base.form-label>
                            <x-base.form-input type="text" name="name" value="{{ old('name', $fee->name ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('fees.fields.amount') }}</x-base.form-label>
                            <div class="relative mt-2">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">{{ config('app.currency', 'USD') }}</span>
                                </div>
                                <x-base.form-input type="number" step="0.01" min="0" name="amount" value="{{ old('amount', $fee->amount ?? '') }}" class="pl-12" />
                            </div>
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('fees.fields.description') }}</x-base.form-label>
                            <x-base.form-textarea name="description" rows="4" class="resize-none">{{ old('description', $fee->description ?? '') }}</x-base.form-textarea>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('fees.fields.is_active') }}</x-base.form-label>
                            <div class="mt-2 space-y-2">
                                <!-- Hidden input to send 0 if unchecked -->
                                <input type="hidden" name="is_active" value="0">
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <x-base.form-input type="checkbox" name="is_active" value="1" {{ old('is_active', $fee->is_active ?? false) ? 'checked' : '' }} class="sr-only peer" />
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/30 dark:peer-focus:ring-primary rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('global.active') }}</span>
                                </label>
                            </div>
                        </div>

                    </div>
                    <div class="flex justify-end mt-5">
                        <a href="{{ route('fees.index') }}" class="btn btn-outline-secondary w-24 mr-1">{{ __('global.cancel') }}</a>
                        <x-base.button type="submit" variant="primary" class="w-24">{{ __('global.update') }}</x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
