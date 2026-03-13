@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>{{ __('access_control.permissions.details') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('access_control.permissions.details') }}</h2>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="box p-5">
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 sm:col-span-6">
                        <div class="text-slate-500 text-xs">{{ __('access_control.fields.name') }}</div>
                        <div class="mt-1.5 font-medium text-base">{{ $permission->name }}</div>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <div class="text-slate-500 text-xs">{{ __('access_control.fields.guard') }}</div>
                        <div class="mt-1.5 font-medium text-base">
                            <span class="px-2 py-1 rounded-full bg-slate-100 text-slate-600 text-xs dark:bg-darkmode-400">
                                {{ $permission->guard_name }}
                            </span>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <div class="text-slate-500 text-xs">{{ __('access_control.fields.created_at') }}</div>
                        <div class="mt-1.5 font-medium text-base text-slate-600">
                            {{ $permission->created_at->format('Y-m-d H:i') }}
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <div class="text-slate-500 text-xs">{{ __('access_control.fields.updated_at') }}</div>
                        <div class="mt-1.5 font-medium text-base text-slate-600">
                            {{ $permission->updated_at->format('Y-m-d H:i') }}
                        </div>
                    </div>
                </div>

                <div class="mt-10 flex justify-end gap-3 border-t border-slate-200/60 dark:border-darkmode-400 pt-5">
                    <x-base.button variant="outline-secondary" as="a" href="{{ route('permissions.index') }}" class="w-32">
                        <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" />
                        {{ __('global.back') }}
                    </x-base.button>
                    <x-base.button variant="primary" as="a" href="{{ route('permissions.edit', $permission->id) }}" class="w-32">
                        <x-base.lucide icon="Pencil" class="w-4 h-4 me-2" />
                        {{ __('access_control.actions.edit') }}
                    </x-base.button>
                </div>
            </div>
        </div>
    </div>
@endsection
