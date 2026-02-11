@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Children.show') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('global.child_profile') }}</h2>
        <div class="ml-auto flex gap-2">
            <x-base.button variant="secondary" as="a" href="{{ route('children.index') }}">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 mr-2" />
                {{ __('global.back') }}
            </x-base.button>
            @can('edit_children')
            <x-base.button variant="primary" as="a" href="{{ route('children.edit', $children->id) }}">
                <x-base.lucide icon="Pencil" class="w-4 h-4 mr-2" />
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
                        @if($children->photo_path)
                            <img src="{{ asset($children->photo_path) }}" class="w-full h-full object-cover" alt="{{ $children->name }}">
                        @else
                            <div class="w-16 h-16 bg-primary/10 flex items-center justify-center text-primary font-bold">
                                {{ strtoupper(substr($children->name, 0, 1)) }}
                            </div>
                        @endif
                    </div>
                    <div class="ml-4">
                        <div class="text-base font-medium">{{ $children->name }}</div>
                        <div class="text-slate-500 text-sm">
                            <x-base.lucide icon="Cake" class="w-4 h-4 inline mr-1" />
                            {{ $children->age }} {{ __('global.years_old') }}
                        </div>
                    </div>
                    <div class="ml-auto">
                        <span class="px-2 py-1 rounded-full text-xs bg-slate-200">
                            {{ $children->enrollment_status }}
                        </span>
                    </div>
                </div>
                <div class="mt-5 grid grid-cols-2 gap-4">
                    <div>
                        <div class="text-xs text-slate-500">{{ __('global.class') }}</div>
                        <div class="font-medium">{{ $children->class->name ?? '-' }}</div>
                    </div>
                    <div>
                        <div class="text-xs text-slate-500">{{ __('global.fees_balance') }}</div>
                        <div class="font-medium {{ ($children->fees_required - $children->fees_paid) > 0 ? 'text-danger' : 'text-success' }}">
                            {{ number_format(($children->fees_required - $children->fees_paid), 2) }}
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    @php
                        $paymentPercentage = $children->fees_required > 0 ? min(100, ($children->fees_paid / $children->fees_required) * 100) : 0;
                    @endphp
                    <x-base.progress.bar :value="$paymentPercentage" />
                    <div class="text-xs text-right mt-1">{{ number_format($paymentPercentage, 1) }}%</div>
                </div>
            </div>

            <div class="box p-5 mt-5">
                <div class="text-base font-medium mb-3">{{ __('global.parents') }}</div>
                <div class="space-y-3">
                    @if($children->parent)
                        <div class="flex items-center">
                            <x-base.lucide icon="User" class="w-4 h-4 mr-2" />
                            <div>
                                <div class="font-medium">{{ $children->parent->name }}</div>
                                @if($children->parent->phone)
                                    <div class="text-xs text-slate-500">{{ $children->parent->phone }}</div>
                                @endif
                            </div>
                        </div>
                    @endif
                    @if($children->secondParent)
                        <div class="flex items-center">
                            <x-base.lucide icon="User" class="w-4 h-4 mr-2" />
                            <div>
                                <div class="font-medium">{{ $children->secondParent->name }}</div>
                                @if($children->secondParent->phone)
                                    <div class="text-xs text-slate-500">{{ $children->secondParent->phone }}</div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="box p-5">
                <div class="text-base font-medium mb-3">{{ __('global.attendance_summary') }}</div>
                <div class="grid grid-cols-3 gap-4">
                    <x-widgets.stat-card :value="$children->attendances()->where('status','present')->count()" :label="__('global.present')" icon="CheckCircle" />
                    <x-widgets.stat-card :value="$children->attendances()->where('status','absent')->count()" :label="__('global.absent')" icon="XCircle" />
                    <x-widgets.stat-card :value="$children->attendances()->where('status','late')->count()" :label="__('global.late')" icon="Clock" />
                </div>
            </div>

            <div class="box p-5 mt-5">
                <div class="text-base font-medium mb-3">{{ __('global.activities') }}</div>
                <div class="grid grid-cols-2 gap-4">
                    @forelse($children->activities as $activity)
                        <div class="p-3 border rounded">
                            <div class="font-medium">{{ $activity->title ?? $activity->name }}</div>
                            <div class="text-xs text-slate-500">{{ optional($activity->teacher)->name }}</div>
                        </div>
                    @empty
                        <div class="text-slate-500">{{ __('global.no_activities') }}</div>
                    @endforelse
                </div>
            </div>

            <div class="box p-5 mt-5">
                <div class="text-base font-medium mb-3">{{ __('global.events') }}</div>
                <div class="grid grid-cols-2 gap-4">
                    @forelse($children->events as $event)
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
