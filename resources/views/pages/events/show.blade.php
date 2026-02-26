@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Event.show') }} - {{ $event->title }}</title>
    <style>
        .tab-content { display: none; }
        .tab-content.active { display: block; }
        .tab-button.active { background-color: #3b82f6; color: white; }
        .info-card { transition: all 0.3s ease; }
        .info-card:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
    </style>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">
            <x-base.lucide icon="CalendarEvent" class="w-5 h-5 inline me-2" />
            {{ __('global.event_details') }} - {{ $event->title }}
        </h2>
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

    <!-- Tab Navigation -->
    <div class="intro-y mt-5">
        <div class="border-b border-slate-200">
            <nav class="flex space-x-2 overflow-x-auto">
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg active" data-tab="overview">
                    <x-base.lucide icon="Layout" class="w-4 h-4 me-2" />
                    {{ __('global.overview') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="details">
                    <x-base.lucide icon="Info" class="w-4 h-4 me-2" />
                    {{ __('global.event_info') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="attendees">
                    <x-base.lucide icon="Users" class="w-4 h-4 me-2" />
                    {{ __('global.attendees') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="schedule">
                    <x-base.lucide icon="Clock" class="w-4 h-4 me-2" />
                    {{ __('global.schedule') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="organizer">
                    <x-base.lucide icon="UserCheck" class="w-4 h-4 me-2" />
                    {{ __('global.organizer') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="registration">
                    <x-base.lucide icon="Clipboard" class="w-4 h-4 me-2" />
                    {{ __('global.registration') }}
                </button>
            </nav>
        </div>
    </div>

    <!-- Tab Content -->
    <div class="mt-5">
        <!-- Overview Tab -->
        <div id="overview" class="tab-content active">
            <div class="grid grid-cols-12 gap-6">
                <!-- Event Card -->
                <div class="intro-y col-span-12 lg:col-span-4">
                    <div class="box p-5 info-card">
                        <div class="text-center">
                            <div class="w-20 h-20 bg-gradient-to-br from-primary/20 to-secondary/20 flex items-center justify-center rounded-full text-2xl font-bold mx-auto mb-4 text-primary">
                                <x-base.lucide icon="CalendarEvent" class="w-10 h-10" />
                            </div>
                            <div class="text-xl font-bold mb-2">{{ $event->title }}</div>
                            <div class="text-slate-500 text-lg">
                                {{ ucfirst($event->event_type ?? 'General Event') }}
                            </div>
                            
                            <div class="mt-6 pt-4 border-t">
                                <div class="flex justify-center">
                                    <span class="px-3 py-1 rounded-full text-sm font-medium 
                                        {{ $event->status === 'active' ? 'bg-success/20 text-success' : 'bg-warning/20 text-warning' }}">
                                        {{ ucfirst($event->status ?? 'active') }}
                                    </span>
                                </div>
                            </div>
                            
                            <div class="mt-4 grid grid-cols-2 gap-3">
                                <div class="text-center p-2 bg-blue-50 rounded">
                                    <div class="text-lg font-bold text-blue-600">{{ $event->attendee_count }}</div>
                                    <div class="text-xs text-slate-500">{{ __('global.attendees') }}</div>
                                </div>
                                <div class="text-center p-2 bg-green-50 rounded">
                                    <div class="text-lg font-bold text-green-600">
                                        {{ $event->max_attendees ?? '∞' }}
                                    </div>
                                    <div class="text-xs text-slate-500">{{ __('global.capacity') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Event Context -->
                <div class="intro-y col-span-12 lg:col-span-8">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12 md:col-span-6">
                            <div class="box p-5">
                                <div class="text-base font-medium mb-3 flex items-center">
                                    <x-base.lucide icon="Clock" class="w-5 h-5 me-2 text-primary" />
                                    {{ __('global.schedule') }}
                                </div>
                                <div class="space-y-3">
                                    <div class="flex items-center text-sm">
                                        <x-base.lucide icon="Calendar" class="w-4 h-4 me-2 text-slate-500" />
                                        <span>{{ $event->start_datetime ? $event->start_datetime->format('M d, Y H:i') : 'Not scheduled' }}</span>
                                    </div>
                                    @if($event->end_datetime)
                                        <div class="flex items-center text-sm">
                                            <x-base.lucide icon="Calendar" class="w-4 h-4 me-2 text-slate-500" />
                                            <span>{{ __('global.ends') }}: {{ $event->end_datetime->format('M d, Y H:i') }}</span>
                                        </div>
                                    @endif
                                    <div class="flex items-center text-sm">
                                        <x-base.lucide icon="MapPin" class="w-4 h-4 me-2 text-slate-500" />
                                        <span>{{ $event->location ?? 'Not specified' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-span-12 md:col-span-6">
                            <div class="box p-5">
                                <div class="text-base font-medium mb-3 flex items-center">
                                    <x-base.lucide icon="UserCheck" class="w-5 h-5 me-2 text-primary" />
                                    {{ __('global.organizer') }}
                                </div>
                                @if($event->teacher)
                                    <div class="flex items-center">
                                        <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center me-3">
                                            <span class="text-primary font-bold">{{ strtoupper(substr($event->teacher->name, 0, 1)) }}</span>
                                        </div>
                                        <div>
                                            <div class="font-medium">{{ $event->teacher->name }}</div>
                                            <div class="text-sm text-slate-500">
                                                {{ $event->teacher->specialization ?? 'Teacher' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 pt-3 border-t">
                                        <a href="{{ route('teachers.show', $event->teacher->id) }}" class="text-primary hover:underline">
                                            {{ __('global.view_teacher_profile') }}
                                            <x-base.lucide icon="ArrowRight" class="w-4 h-4 inline ms-1" />
                                        </a>
                                    </div>
                                @else
                                    <div class="text-slate-500">{{ $event->organizer ?? __('global.no_organizer_assigned') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Event Details Tab -->
        <div id="details" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="Info" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.basic_information') }}
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.title') }}:</span>
                                <span class="font-medium">{{ $event->title }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.description') }}:</span>
                                <span class="font-medium text-right max-w-xs">
                                    {{ $event->description ?? __('global.not_provided') }}
                                </span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.event_type') }}:</span>
                                <span class="font-medium">{{ ucfirst($event->event_type ?? __('global.not_specified')) }}</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500">{{ __('global.status') }}:</span>
                                <span class="font-medium px-2 py-1 rounded text-sm 
                                    {{ $event->status === 'active' ? 'bg-success/20 text-success' : 'bg-warning/20 text-warning' }}">
                                    {{ ucfirst($event->status ?? 'active') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="Settings" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.event_settings') }}
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.is_public') }}:</span>
                                <span class="font-medium">
                                    <span class="{{ $event->is_public ? 'text-success' : 'text-danger' }}">
                                        <x-base.lucide icon="{{ $event->is_public ? 'CheckCircle' : 'XCircle' }}" class="w-4 h-4 inline me-1" />
                                        {{ $event->is_public ? __('global.yes') : __('global.no') }}
                                    </span>
                                </span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.is_recurring') }}:</span>
                                <span class="font-medium">
                                    <span class="{{ $event->is_recurring ? 'text-success' : 'text-danger' }}">
                                        <x-base.lucide icon="{{ $event->is_recurring ? 'CheckCircle' : 'XCircle' }}" class="w-4 h-4 inline me-1" />
                                        {{ $event->is_recurring ? __('global.yes') : __('global.no') }}
                                    </span>
                                </span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.requires_confirmation') }}:</span>
                                <span class="font-medium">
                                    <span class="{{ $event->requires_confirmation ? 'text-success' : 'text-danger' }}">
                                        <x-base.lucide icon="{{ $event->requires_confirmation ? 'CheckCircle' : 'XCircle' }}" class="w-4 h-4 inline me-1" />
                                        {{ $event->requires_confirmation ? __('global.yes') : __('global.no') }}
                                    </span>
                                </span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500">{{ __('global.last_updated') }}:</span>
                                <span class="font-medium text-sm">{{ $event->updated_at->format('M d, Y H:i') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Attendees Tab -->
        <div id="attendees" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center justify-between">
                            <span>{{ __('global.attendees_list') }}</span>
                            <span class="text-sm text-slate-500">{{ $event->attendee_count }}/{{ $event->max_attendees ?? '∞' }} {{ __('global.attendees') }}</span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @forelse($event->children as $child)
                                <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                    <div class="flex items-start justify-between mb-3">
                                        <div class="flex items-center">
                                            <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center me-3">
                                                <span class="text-primary font-bold">{{ strtoupper(substr($child->name, 0, 1)) }}</span>
                                            </div>
                                            <div>
                                                <h3 class="font-medium">{{ $child->name }}</h3>
                                                <div class="text-xs text-slate-500">{{ $child->age }} {{ __('global.years_old') }}</div>
                                            </div>
                                        </div>
                                        <span class="px-2 py-1 rounded text-xs 
                                            {{ $child->enrollment_status === 'active' ? 'bg-success/20 text-success' : 'bg-warning/20 text-warning' }}">
                                            {{ ucfirst($child->enrollment_status) }}
                                        </span>
                                    </div>
                                    <div class="space-y-2 text-sm text-slate-600">
                                        <div class="flex items-center">
                                            <x-base.lucide icon="Home" class="w-4 h-4 me-2" />
                                            {{ optional($child->class)->name ?? 'Not assigned' }}
                                        </div>
                                        <div class="flex items-center">
                                            <x-base.lucide icon="Users" class="w-4 h-4 me-2" />
                                            {{ optional($child->parent)->name ?? 'No parent' }}
                                        </div>
                                    </div>
                                    <div class="mt-4 pt-3 border-t">
                                        <a href="{{ route('children.show', $child->id) }}" class="text-primary hover:underline text-sm">
                                            {{ __('global.view_details') }}
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-full text-center py-12">
                                    <x-base.lucide icon="Users" class="w-16 h-16 mx-auto mb-4 text-slate-300" />
                                    <h3 class="text-lg font-medium text-slate-500">{{ __('global.no_attendees_registered') }}</h3>
                                    <p class="text-slate-400 mt-2">{{ __('global.event_has_no_attendees') }}</p>
                                </div>
                            @endforelse
                        </div>
                        
                        @if($event->children->count() > 0)
                            <div class="mt-6 pt-4 border-t text-center">
                                <div class="grid grid-cols-3 gap-4">
                                    <div class="text-center p-3 bg-blue-50 rounded">
                                        <div class="text-lg font-bold text-blue-600">
                                            {{ $event->children()->where('gender', 'male')->count() }}
                                        </div>
                                        <div class="text-xs text-slate-500">{{ __('global.male') }}</div>
                                    </div>
                                    <div class="text-center p-3 bg-pink-50 rounded">
                                        <div class="text-lg font-bold text-pink-600">
                                            {{ $event->children()->where('gender', 'female')->count() }}
                                        </div>
                                        <div class="text-xs text-slate-500">{{ __('global.female') }}</div>
                                    </div>
                                    <div class="text-center p-3 bg-green-50 rounded">
                                        <div class="text-lg font-bold text-green-600">
                                            {{ round($event->children()->avg('age') ?? 0, 1) }}
                                        </div>
                                        <div class="text-xs text-slate-500">{{ __('global.average_age') }}</div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Schedule Tab -->
        <div id="schedule" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="Clock" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.schedule_details') }}
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.start_datetime') }}:</span>
                                <span class="font-medium">
                                    {{ $event->start_datetime ? $event->start_datetime->format('F j, Y H:i') : __('global.not_scheduled') }}
                                </span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.end_datetime') }}:</span>
                                <span class="font-medium">
                                    {{ $event->end_datetime ? $event->end_datetime->format('F j, Y H:i') : __('global.not_specified') }}
                                </span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.duration') }}:</span>
                                <span class="font-medium">
                                    @if($event->start_datetime && $event->end_datetime)
                                        {{ $event->start_datetime->diffInHours($event->end_datetime) }}h 
                                        {{ $event->start_datetime->diff($event->end_datetime)->format('%i') }}m
                                    @else
                                        {{ __('global.not_specified') }}
                                    @endif
                                </span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500">{{ __('global.is_full') }}:</span>
                                <span class="font-medium">
                                    <span class="{{ $event->is_full ? 'text-danger' : 'text-success' }}">
                                        <x-base.lucide icon="{{ $event->is_full ? 'XCircle' : 'CheckCircle' }}" class="w-4 h-4 inline me-1" />
                                        {{ $event->is_full ? __('global.yes') : __('global.no') }}
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="MapPin" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.location_info') }}
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.location') }}:</span>
                                <span class="font-medium">{{ $event->location ?? __('global.not_specified') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.cost') }}:</span>
                                <span class="font-medium">
                                    {{ $event->cost ? number_format($event->cost, 2) : __('global.free') }}
                                </span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500">{{ __('global.registration_deadline') }}:</span>
                                <span class="font-medium">
                                    {{ $event->registration_deadline ? $event->registration_deadline->format('M d, Y') : __('global.no_deadline') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Organizer Tab -->
        <div id="organizer" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="UserCheck" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.organizer_information') }}
                        </div>
                        @if($event->teacher)
                            <div class="flex items-start">
                                <div class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center me-4">
                                    <span class="text-primary font-bold text-xl">{{ strtoupper(substr($event->teacher->name, 0, 2)) }}</span>
                                </div>
                                <div class="flex-1">
                                    <div class="text-xl font-bold">{{ $event->teacher->name }}</div>
                                    <div class="text-slate-500 text-sm mt-1">
                                        {{ $event->teacher->specialization ?? 'Not specified' }}
                                    </div>
                                    <div class="text-slate-500 text-sm mt-1">
                                        {{ $event->teacher->qualification ?? 'Not specified' }}
                                    </div>
                                    
                                    <div class="mt-4 space-y-2">
                                        <div class="flex items-center text-sm">
                                            <x-base.lucide icon="Phone" class="w-4 h-4 me-2 text-slate-500" />
                                            <span>{{ $event->teacher->phone ?? __('global.not_provided') }}</span>
                                        </div>
                                        <div class="flex items-center text-sm">
                                            <x-base.lucide icon="Mail" class="w-4 h-4 me-2 text-slate-500" />
                                            <span>{{ $event->teacher->email ?? __('global.not_provided') }}</span>
                                        </div>
                                        <div class="flex items-center text-sm">
                                            <x-base.lucide icon="Briefcase" class="w-4 h-4 me-2 text-slate-500" />
                                            <span>{{ $event->teacher->experience_years ?? 0 }} {{ __('global.years_experience') }}</span>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4 pt-4 border-t">
                                        <div class="grid grid-cols-3 gap-2">
                                            <div class="text-center p-2 bg-blue-50 rounded">
                                                <div class="text-lg font-bold text-blue-600">{{ $event->teacher->classes()->count() }}</div>
                                                <div class="text-xs text-slate-500">{{ __('global.classes') }}</div>
                                            </div>
                                            <div class="text-center p-2 bg-green-50 rounded">
                                                <div class="text-lg font-bold text-green-600">{{ $event->teacher->events()->count() }}</div>
                                                <div class="text-xs text-slate-500">{{ __('global.events') }}</div>
                                            </div>
                                            <div class="text-center p-2 bg-purple-50 rounded">
                                                <div class="text-lg font-bold text-purple-600">{{ $event->teacher->assignedChildren()->count() }}</div>
                                                <div class="text-xs text-slate-500">{{ __('global.students') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4">
                                        <a href="{{ route('teachers.show', $event->teacher->id) }}" class="text-primary hover:underline">
                                            {{ __('global.view_teacher_profile') }}
                                            <x-base.lucide icon="ArrowRight" class="w-4 h-4 inline ms-1" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="text-center py-8">
                                <div class="flex items-center justify-center mb-4">
                                    <x-base.lucide icon="UserX" class="w-16 h-16 text-slate-300" />
                                </div>
                                <h3 class="text-lg font-medium text-slate-500">{{ __('global.no_teacher_organizer') }}</h3>
                                <p class="text-slate-400 mt-2">{{ $event->organizer ?? __('global.external_organizer') }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Registration Tab -->
        <div id="registration" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="Clipboard" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.registration_info') }}
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.registration_deadline') }}:</span>
                                <span class="font-medium">
                                    {{ $event->registration_deadline ? $event->registration_deadline->format('F j, Y') : __('global.no_deadline') }}
                                </span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.is_registration_open') }}:</span>
                                <span class="font-medium">
                                    <span class="{{ $event->is_registration_open ? 'text-success' : 'text-danger' }}">
                                        <x-base.lucide icon="{{ $event->is_registration_open ? 'CheckCircle' : 'XCircle' }}" class="w-4 h-4 inline me-1" />
                                        {{ $event->is_registration_open ? __('global.yes') : __('global.no') }}
                                    </span>
                                </span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.send_reminders') }}:</span>
                                <span class="font-medium">
                                    <span class="{{ $event->send_reminders ? 'text-success' : 'text-danger' }}">
                                        <x-base.lucide icon="{{ $event->send_reminders ? 'CheckCircle' : 'XCircle' }}" class="w-4 h-4 inline me-1" />
                                        {{ $event->send_reminders ? __('global.yes') : __('global.no') }}
                                    </span>
                                </span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500">{{ __('global.reminder_hours') }}:</span>
                                <span class="font-medium">
                                    {{ $event->reminder_hours_before ?? '--' }} {{ __('global.hours_before') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="FileText" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.additional_info') }}
                        </div>
                        <div class="space-y-4">
                            <div>
                                <div class="text-slate-500 text-sm mb-1">{{ __('global.notes') }}:</div>
                                @if($event->notes)
                                    <div class="p-3 bg-slate-50 rounded text-sm">{{ $event->notes }}</div>
                                @else
                                    <div class="text-slate-400 text-sm">{{ __('global.no_notes') }}</div>
                                @endif
                            </div>
                            <div>
                                <div class="text-slate-500 text-sm mb-1">{{ __('global.documents') }}:</div>
                                @if($event->documents && is_array($event->documents) && count($event->documents) > 0)
                                    <div class="space-y-1">
                                        @foreach($event->documents as $document)
                                            <div class="flex items-center p-2 bg-slate-50 rounded text-sm">
                                                <x-base.lucide icon="File" class="w-4 h-4 me-2 text-slate-500" />
                                                <span>{{ $document }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="text-slate-400 text-sm">{{ __('global.no_documents') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');
            
            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const tabId = this.getAttribute('data-tab');
                    
                    // Remove active class from all buttons and contents
                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    tabContents.forEach(content => content.classList.remove('active'));
                    
                    // Add active class to clicked button and corresponding content
                    this.classList.add('active');
                    document.getElementById(tabId).classList.add('active');
                });
            });
        });
    </script>
@endsection
