@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('kindergarten.children.add_new') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('kindergarten.children.add_new') }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-10">
            <div class="intro-y box p-5">
                <form action="{{ route('children.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('kindergarten.children.name') }}</x-base.form-label>
                            <x-base.form-input type="text" name="name" value="{{ old('name', $children->name ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('kindergarten.children.dob') }}</x-base.form-label>
                            <div class="relative mt-2">
                                <x-base.form-input type="date" name="dob" value="{{ old('dob', $children->dob ?? '') }}" />
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <x-base.lucide icon="Calendar" class="h-5 w-5 text-gray-400" />
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('kindergarten.children.gender') }}</x-base.form-label>
                            <x-base.tom-select name="gender" class="mt-2">
                                <option value="">{{ __('global.select_option') }}</option>
                                <option value="male" {{ old('gender', $children->gender ?? '') == 'male' ? 'selected' : '' }}>{{ __('kindergarten.children.male') }}</option>
                                <option value="female" {{ old('gender', $children->gender ?? '') == 'female' ? 'selected' : '' }}>{{ __('kindergarten.children.female') }}</option>
                            </x-base.tom-select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('kindergarten.children.class') }}</x-base.form-label>
                            <x-base.form-input type="text" name="class_grade" value="{{ old('class_grade', $children->class_grade ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('kindergarten.children.parent') }}</x-base.form-label>
                            <x-base.form-input type="text" name="parent_id" value="{{ old('parent_id', $children->parent_id ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('kindergarten.children.photo') }}</x-base.form-label>
                            <div class="mt-2 flex items-center">
                                <x-base.form-input type="file" name="photo_path" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary/90" />
                            </div>
                            @if($children->photo_path)
                                <div class="mt-2 flex items-center">
                                    <img src="{{ asset('storage/' . $children->photo_path) }}" alt="Current Photo" class="w-16 h-16 object-cover rounded border-2 border-gray-200">
                                    <span class="ml-3 text-sm text-gray-500">{{ __('global.current_image') }}</span>
                                </div>
                            @endif
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('kindergarten.children.fees_req') }}</x-base.form-label>
                            <div class="relative mt-2">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">{{ config('app.currency', 'USD') }}</span>
                                </div>
                                <x-base.form-input type="number" step="0.01" min="0" name="fees_required" value="{{ old('fees_required', $children->fees_required ?? '') }}" class="pl-12" />
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('kindergarten.children.fees_paid') }}</x-base.form-label>
                            <div class="relative mt-2">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">{{ config('app.currency', 'USD') }}</span>
                                </div>
                                <x-base.form-input type="number" step="0.01" min="0" name="fees_paid" value="{{ old('fees_paid', $children->fees_paid ?? '') }}" class="pl-12" />
                            </div>
                        </div>

                    </div>
                    <div class="flex justify-end mt-5">
                        <a href="{{ route('children.index') }}" class="btn btn-outline-secondary w-24 mr-1">{{ __('global.cancel') }}</a>
                        <x-base.button type="submit" variant="primary" class="w-24">{{ __('global.save') }}</x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
