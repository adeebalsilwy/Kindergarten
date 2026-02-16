@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Guardian.show') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('global.guardian_profile') }}</h2>
        <div class="ms-auto flex gap-2">
            <x-base.button variant="secondary" as="a" href="{{ route('guardians.index') }}">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" />
                {{ __('global.back') }}
            </x-base.button>
            @can('edit_guardians')
            <x-base.button variant="primary" as="a" href="{{ route('guardians.edit', $parents->id) }}">
                <x-base.lucide icon="Pencil" class="w-4 h-4 me-2" />
                {{ __('global.edit') }}
            </x-base.button>
            @endcan
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-4">
            <div class="box p-5">
                <div class="flex items-center">
                    <div class="w-16 h-16 rounded-full overflow-hidden">
                        @if($parents->photo)
                            <img src="{{ asset('storage/'.$parents->photo) }}" class="w-full h-full object-cover" alt="{{ $parents->name }}">
                        @else
                            <div class="w-16 h-16 bg-primary/10 flex items-center justify-center text-primary font-bold">
                                {{ strtoupper(substr($parents->name, 0, 1)) }}
                            </div>
                        @endif
                    </div>
                    <div class="ms-4">
                        <div class="text-base font-medium">{{ $parents->name }}</div>
                        <div class="text-slate-500 text-sm">
                            {{ $parents->relationship ?? __('global.not_specified') }}
                        </div>
                    </div>
                    <div class="ms-auto">
                        @if($parents->is_active ?? true)
                            <span class="px-2 py-1 rounded-full text-xs bg-success/20 text-success">{{ __('global.active') }}</span>
                        @else
                            <span class="px-2 py-1 rounded-full text-xs bg-danger/20 text-danger">{{ __('global.inactive') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mt-5 space-y-2">
                    <div class="flex items-center text-sm">
                        <x-base.lucide icon="Phone" class="w-4 h-4 me-2" />
                        <span>{{ $parents->phone ?? __('global.not_provided') }}</span>
                    </div>
                    <div class="flex items-center text-sm">
                        <x-base.lucide icon="Mail" class="w-4 h-4 me-2" />
                        <span>{{ $parents->email ?? __('global.not_provided') }}</span>
                    </div>
                    <div class="flex items-center text-sm">
                        <x-base.lucide icon="Home" class="w-4 h-4 me-2" />
                        <span>{{ $parents->address ?? __('global.not_provided') }}</span>
                    </div>
                </div>
            </div>

            <div class="box p-5 mt-5">
                <div class="text-base font-medium mb-3">{{ __('global.children') }}</div>
                <div class="flex flex-wrap gap-2">
                    @forelse($parents->children as $child)
                        <a href="{{ route('children.show', $child->id) }}" class="px-2 py-1 text-xs rounded-full bg-primary/10 text-primary border border-primary/20">
                            {{ $child->name ?? $child->first_name }}
                        </a>
                    @empty
                        <div class="text-slate-500">{{ __('global.no_children_found') }}</div>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="box p-5">
                <div class="text-base font-medium mb-3">{{ __('global.contact_preferences') }}</div>
                <div class="grid grid-cols-3 gap-4">
                    <x-widgets.stat-card :value="($parents->receives_sms_notifications ?? false) ? __('global.enabled') : __('global.disabled')" :label="__('global.sms_notifications')" icon="MessageSquare" />
                    <x-widgets.stat-card :value="($parents->receives_email_notifications ?? false) ? __('global.enabled') : __('global.disabled')" :label="__('global.email_notifications')" icon="Mail" />
                    <x-widgets.stat-card :value="$parents->children->count()" :label="__('global.children_count')" icon="Users" />
                </div>
            </div>

            <div class="box p-5 mt-5">
                <div class="text-base font-medium mb-3">{{ __('global.activity_summary') }}</div>
                <div class="grid grid-cols-2 gap-4">
                    @foreach($parents->children as $child)
                        <div class="p-3 border rounded">
                            <div class="font-medium">{{ $child->name }}</div>
                            <div class="text-xs text-slate-500">
                                {{ __('global.class') }}: {{ optional($child->class)->name ?? '-' }}
                            </div>
                        </div>
                    @endforeach
                    @if($parents->children->isEmpty())
                        <div class="text-slate-500">{{ __('global.no_data') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
