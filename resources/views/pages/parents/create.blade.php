@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('kindergarten.parents.add_new') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('kindergarten.parents.add_new') }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-10">
            <div class="intro-y box p-5">
                <form action="{{ route('parents.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('kindergarten.parents.name') }}</x-base.form-label>
                            <x-base.form-input type="text" name="name" value="{{ old('name', $parents->name ?? '') }}" class="mt-2" />
                            @error('name')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('kindergarten.parents.phone') }}</x-base.form-label>
                            <div class="relative mt-2">
                                <x-base.form-input type="tel" name="phone" value="{{ old('phone', $parents->phone ?? '') }}" />
                                <div class="absolute inset-y-0 right-0 pe-3 flex items-center pointer-events-none">
                                    <x-base.lucide icon="Phone" class="h-5 w-5 text-gray-400" />
                                </div>
                            </div>
                            @error('phone')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('kindergarten.parents.address') }}</x-base.form-label>
                            <x-base.form-textarea name="address" rows="4" class="resize-none">{{ old('address', $parents->address ?? '') }}</x-base.form-textarea>
                            @error('address')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('kindergarten.parents.relation') }}</x-base.form-label>
                            <x-base.form-input type="text" name="relation" value="{{ old('relation', $parents->relation ?? '') }}" class="mt-2" />
                            @error('relation')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="flex justify-end mt-5">
                        <a href="{{ route('parents.index') }}" class="btn btn-outline-secondary w-24 me-1">{{ __('global.cancel') }}</a>
                        <x-base.button type="submit" variant="primary" class="w-24">{{ __('global.save') }}</x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
