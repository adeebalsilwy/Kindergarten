@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>{{ __('access_control.permissions.add_new') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('access_control.permissions.add_new') }}</h2>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="intro-y box p-5">
                <form action="{{ route('permissions.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12 lg:col-span-6">
                            <x-base.form-label for="name" class="font-bold">{{ __('access_control.fields.name') }}</x-base.form-label>
                            <x-base.form-input 
                                id="name" 
                                name="name" 
                                type="text" 
                                value="{{ old('name') }}" 
                                placeholder="e.g. edit_users"
                                required 
                                class="w-full"
                            />
                        </div>
                        <div class="col-span-12 lg:col-span-6">
                            <x-base.form-label for="guard_name" class="font-bold">{{ __('access_control.fields.guard') }}</x-base.form-label>
                            <x-base.tom-select name="guard_name" id="guard_name" class="w-full">
                                <option value="web" selected>web</option>
                                <option value="api">api</option>
                            </x-base.tom-select>
                        </div>
                    </div>

                    <div class="mt-10 flex justify-end gap-3 border-t border-slate-200/60 dark:border-darkmode-400 pt-5">
                        <x-base.button variant="outline-secondary" as="a" href="{{ route('permissions.index') }}" class="w-32">
                            <x-base.lucide icon="X" class="w-4 h-4 me-2" />
                            {{ __('access_control.actions.cancel') }}
                        </x-base.button>
                        <x-base.button variant="primary" type="submit" class="w-32">
                            <x-base.lucide icon="Save" class="w-4 h-4 me-2" />
                            {{ __('access_control.actions.save') }}
                        </x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
