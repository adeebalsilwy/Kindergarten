@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Classes.show') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('global.class_profile') }}</h2>
        <div class="ml-auto flex gap-2">
            <x-base.button variant="secondary" as="a" href="{{ route('classes.index') }}">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 mr-2" />
                {{ __('global.back') }}
            </x-base.button>
            @can('edit_classes')
            <x-base.button variant="primary" as="a" href="{{ route('classes.edit', $classes->id) }}">
                <x-base.lucide icon="Pencil" class="w-4 h-4 mr-2" />
                {{ __('global.edit') }}
            </x-base.button>
            @endcan
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-4">
            <div class="box p-5">
                <div class="flex items-start">
                    <div>
                        <div class="text-base font-medium">{{ $classes->name }}</div>
                        <div class="text-slate-500 text-sm">{{ $classes->code }}</div>
                    </div>
                    <div class="ml-auto">
                        @if($classes->is_active)
                            <span class="px-2 py-1 rounded-full text-xs bg-success/20 text-success">{{ __('global.active') }}</span>
                        @else
                            <span class="px-2 py-1 rounded-full text-xs bg-danger/20 text-danger">{{ __('global.inactive') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mt-5 grid grid-cols-2 gap-4">
                    <div>
                        <div class="text-xs text-slate-500">{{ __('global.teacher') }}</div>
                        <div class="font-medium">{{ optional($classes->teacher)->name ?? '-' }}</div>
                    </div>
                    <div>
                        <div class="text-xs text-slate-500">{{ __('global.grade') }}</div>
                        <div class="font-medium">{{ optional($classes->grade)->name ?? '-' }}</div>
                    </div>
                    <div>
                        <div class="text-xs text-slate-500">{{ __('global.capacity') }}</div>
                        <div class="font-medium">{{ $classes->capacity }}</div>
                    </div>
                    <div>
                        <div class="text-xs text-slate-500">{{ __('global.enrolled') }}</div>
                        <div class="font-medium">{{ $classes->enrollment_count }}</div>
                    </div>
                </div>
                <div class="mt-5">
                    @php
                        $fillPercent = $classes->capacity > 0 ? min(100, ($classes->enrollment_count / $classes->capacity) * 100) : 0;
                    @endphp
                    <x-base.progress.bar :value="$fillPercent" />
                    <div class="text-xs text-right mt-1">{{ number_format($fillPercent, 1) }}%</div>
                </div>
                <div class="mt-5 space-y-2 text-sm">
                    <div class="flex items-center">
                        <x-base.lucide icon="Clock" class="w-4 h-4 mr-2" />
                        <span>{{ $classes->start_time }} - {{ $classes->end_time }}</span>
                    </div>
                    <div class="flex items-center">
                        <x-base.lucide icon="MapPin" class="w-4 h-4 mr-2" />
                        <span>{{ $classes->room_number ?? $classes->location ?? '-' }}</span>
                    </div>
                    <div class="flex items-center">
                        <x-base.lucide icon="DollarSign" class="w-4 h-4 mr-2" />
                        <span>{{ number_format($classes->monthly_fee ?? 0, 2) }}</span>
                    </div>
                </div>
            </div>

            <div class="box p-5 mt-5">
                <div class="text-base font-medium mb-3">{{ __('global.curriculum') }}</div>
                <div class="text-sm">
                    {{ optional($classes->curriculum)->name ?? __('global.not_specified') }}
                </div>
            </div>
        </div>

        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="box p-5">
                <div class="text-base font-medium mb-3">{{ __('global.children') }}</div>
                <div class="flex flex-wrap gap-2">
                    @forelse($classes->children as $child)
                        <a href="{{ route('children.show', $child->id) }}" class="px-2 py-1 text-xs rounded-full bg-primary/10 text-primary border border-primary/20">
                            {{ $child->name ?? $child->first_name }}
                        </a>
                    @empty
                        <div class="text-slate-500">{{ __('global.no_children_found') }}</div>
                    @endforelse
                </div>
            </div>

            <div class="box p-5 mt-5">
                <div class="text-base font-medium mb-3">{{ __('global.activities') }}</div>
                <div class="grid grid-cols-2 gap-4">
                    @forelse($classes->activities as $activity)
                        <div class="p-3 border rounded">
                            <div class="font-medium">{{ $activity->title ?? $activity->name }}</div>
                            <div class="text-xs text-slate-500">{{ \Carbon\Carbon::parse($activity->date ?? $activity->created_at)->format('Y-m-d') }}</div>
                        </div>
                    @empty
                        <div class="text-slate-500">{{ __('global.no_activities') }}</div>
                    @endforelse
                </div>
            </div>

            <div class="box p-5 mt-5">
                <div class="text-base font-medium mb-3">{{ __('global.events') }}</div>
                <div class="grid grid-cols-2 gap-4">
                    @forelse($classes->events as $event)
                        <div class="p-3 border rounded">
                            <div class="font-medium">{{ $event->title ?? $event->name }}</div>
                            <div class="text-xs text-slate-500">{{ \Carbon\Carbon::parse($event->date ?? $event->start_date)->format('Y-m-d') }}</div>
                        </div>
                    @empty
                        <div class="text-slate-500">{{ __('global.no_events') }}</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
