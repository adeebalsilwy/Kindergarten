@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>{{ __('access_control.roles.details') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('access_control.roles.details') }}</h2>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-10">
            <div class="box p-5">
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 sm:col-span-6">
                        <div class="text-slate-500 text-xs">{{ __('access_control.fields.name') }}</div>
                        <div class="mt-1.5 font-medium text-lg">{{ $role->name }}</div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 text-end">
                        <div class="text-slate-500 text-xs">{{ __('access_control.fields.created_at') }}</div>
                        <div class="mt-1.5 font-medium text-slate-600">
                            {{ $role->created_at->format('Y-m-d H:i') }}
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <div class="text-slate-500 text-xs mb-3 border-b border-slate-200/60 dark:border-darkmode-400 pb-2 flex items-center">
                        <x-base.lucide icon="Shield" class="w-4 h-4 me-2" />
                        {{ __('access_control.fields.permissions') }} ({{ $role->permissions->count() }})
                    </div>
                    <div class="flex flex-wrap gap-2 mt-4">
                        @forelse($role->permissions as $permission)
                            <span class="px-3 py-1.5 rounded-full bg-primary/10 text-primary text-xs font-medium border border-primary/20">
                                {{ $permission->name }}
                            </span>
                        @empty
                            <div class="text-slate-400 italic text-sm py-4">
                                {{ __('access_control.messages.no_data') }}
                            </div>
                        @endforelse
                    </div>
                </div>

                <div class="mt-10 flex justify-end gap-3 border-t border-slate-200/60 dark:border-darkmode-400 pt-5">
                    <x-base.button variant="outline-secondary" as="a" href="{{ route('roles.index') }}" class="w-32">
                        <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" />
                        {{ __('global.back') }}
                    </x-base.button>
                    <x-base.button variant="primary" as="a" href="{{ route('roles.edit', $role->id) }}" class="w-32">
                        <x-base.lucide icon="Pencil" class="w-4 h-4 me-2" />
                        {{ __('access_control.actions.edit') }}
                    </x-base.button>
                </div>
            </div>
        </div>
    </div>
@endsection
