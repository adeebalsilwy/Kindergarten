@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Event.show') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium ms-auto">{{ __('global.event_details') }}</h2>
        <div class="ms-auto flex gap-2">
            <x-base.button variant="secondary" as="a" href="{{ route('events.index') }}">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" />
                {{ __('global.back') }}
            </x-base.button>
            @can('edit_events')
            <x-base.button variant="primary" as="a" href="{{ route('events.edit', $event->id) }}">
                <x-base.lucide icon="Pencil" class="w-4 h-4 me-2" />
                {{ __('global.edit') }}
            </x-base.button>
            @endcan
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-4">
            <div class="box p-5">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="w-12 h-12 bg-primary/10 flex items-center justify-center text-primary rounded-full">
                        <x-base.lucide icon="Calendar" class="w-6 h-6" />
                    </div>
                    <div class="ms-4">
                        <div class="text-base font-medium">{{ $event->title }}</div>
                        <div class="text-slate-500 text-sm">
                            {{ __('global.'.$event->event_type) }} | {{ __('global.'.$event->status) }}
                        </div>
                    </div>
                </div>
                <div class="space-y-4 text-sm">
                    <div class="flex items-center text-slate-600">
                        <x-base.lucide icon="Clock" class="w-4 h-4 me-2" />
                        <span class="font-medium me-2">{{ __('global.start') }}:</span>
                        {{ \Carbon\Carbon::parse($event->start_datetime)->format('Y-m-d H:i') }}
                    </div>
                    <div class="flex items-center text-slate-600">
                        <x-base.lucide icon="Clock" class="w-4 h-4 me-2" />
                        <span class="font-medium me-2">{{ __('global.end') }}:</span>
                        {{ \Carbon\Carbon::parse($event->end_datetime)->format('Y-m-d H:i') }}
                    </div>
                    <div class="flex items-center text-slate-600">
                        <x-base.lucide icon="MapPin" class="w-4 h-4 me-2" />
                        <span class="font-medium me-2">{{ __('global.location') }}:</span>
                        {{ $event->location ?? '-' }}
                    </div>
                    <div class="flex items-center text-slate-600">
                        <x-base.lucide icon="User" class="w-4 h-4 me-2" />
                        <span class="font-medium me-2">{{ __('global.organizer') }}:</span>
                        {{ $event->organizer ?? '-' }}
                    </div>
                </div>
            </div>
        </div>

        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="box p-5 h-full">
                <div class="text-base font-medium mb-4">{{ __('global.description') }}</div>
                <div class="text-slate-600 prose dark:prose-invert max-w-none">
                    {{ $event->description ?? __('global.no_description') }}
                </div>

                @if($event->notes)
                <div class="mt-8 pt-6 border-t border-slate-200">
                    <div class="text-base font-medium mb-2">{{ __('global.notes') }}</div>
                    <div class="text-slate-600 italic">
                        {{ $event->notes }}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
