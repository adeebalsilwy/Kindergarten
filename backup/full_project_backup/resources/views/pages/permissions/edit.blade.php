@extends('../themes/kindergarten')

@section('head')
    <title>{{ __('Permission.edit') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('Permission.edit') }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-10">
            <div class="intro-y box p-5">
                <form action="{{ route('permissions.update', $permissions->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('permissions.fields.name') }}</x-base.form-label>
                            <x-base.form-input type="text" name="name" value="{{ old('name', $permissions->name ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('permissions.fields.guard_name') }}</x-base.form-label>
                            <x-base.form-input type="text" name="guard_name" value="{{ old('guard_name', $permissions->guard_name ?? '') }}" class="mt-2" />
                        </div>

                    </div>
                    <div class="flex justify-end mt-5">
                        <a href="{{ route('permissions.index') }}" class="btn btn-outline-secondary w-24 mr-1">{{ __('global.cancel') }}</a>
                        <x-base.button type="submit" variant="primary" class="w-24">{{ __('global.update') }}</x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
