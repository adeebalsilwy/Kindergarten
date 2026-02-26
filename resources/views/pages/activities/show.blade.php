@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Activity.show') }} - {{ $activity->title ?? $activity->name }}</title>
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
            <x-base.lucide icon="Calendar" class="w-5 h-5 inline me-2" />
            {{ __('global.activity_details') }} - {{ $activity->title ?? $activity->name }}
        </h2>
        <div class="ms-auto flex gap-2">
            <x-base.button variant="secondary" as="a" href="{{ route('activities.index') }}">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" />
                {{ __('global.back') }}
            </x-base.button>
            @can('edit_activities')
            <x-base.button variant="primary" as="a" href="{{ route('activities.edit', $activity->id) }}">
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
                    {{ __('global.activity_info') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="participants">
                    <x-base.lucide icon="Users" class="w-4 h-4 me-2" />
                    {{ __('global.participants') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="schedule">
                    <x-base.lucide icon="Clock" class="w-4 h-4 me-2" />
                    {{ __('global.schedule') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="resources">
                    <x-base.lucide icon="Package" class="w-4 h-4 me-2" />
                    {{ __('global.resources') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="outcomes">
                    <x-base.lucide icon="Target" class="w-4 h-4 me-2" />
                    {{ __('global.learning_outcomes') }}
                </button>
            </nav>
        </div>
    </div>

    <!-- Tab Content -->
    <div class="mt-5">
        <!-- Overview Tab -->
        <div id="overview" class="tab-content active">
            <div class="grid grid-cols-12 gap-6">
                <!-- Activity Card -->
                <div class="intro-y col-span-12 lg:col-span-4">
                    <div class="box p-5 info-card">
                        <div class="text-center">
                            <div class="w-20 h-20 bg-gradient-to-br from-primary/20 to-secondary/20 flex items-center justify-center rounded-full text-2xl font-bold mx-auto mb-4 text-primary">
                                <x-base.lucide icon="Calendar" class="w-10 h-10" />
                            </div>
                            <div class="text-xl font-bold mb-2">{{ $activity->title ?? $activity->name }}</div>
                            <div class="text-slate-500 text-lg">
                                {{ $activity->activity_type ?? 'General Activity' }}
                            </div>
                            
                            <div class="mt-6 pt-4 border-t">
                                <div class="flex justify-center">
                                    <span class="px-3 py-1 rounded-full text-sm font-medium 
                                        {{ $activity->is_active ? 'bg-success/20 text-success' : 'bg-warning/20 text-warning' }}">
                                        {{ $activity->is_active ? __('global.active') : __('global.inactive') }}
                                    </span>
                                </div>
                            </div>
                            
                            <div class="mt-4 grid grid-cols-2 gap-3">
                                <div class="text-center p-2 bg-blue-50 rounded">
                                    <div class="text-lg font-bold text-blue-600">{{ $activity->participant_count }}</div>
                                    <div class="text-xs text-slate-500">{{ __('global.participants') }}</div>
                                </div>
                                <div class="text-center p-2 bg-green-50 rounded">
                                    <div class="text-lg font-bold text-green-600">
                                        {{ $activity->max_participants ?? '∞' }}
                                    </div>
                                    <div class="text-xs text-slate-500">{{ __('global.capacity') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Activity Context -->
                <div class="intro-y col-span-12 lg:col-span-8">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12 md:col-span-6">
                            <div class="box p-5">
                                <div class="text-base font-medium mb-3 flex items-center">
                                    <x-base.lucide icon="UserCheck" class="w-5 h-5 me-2 text-primary" />
                                    {{ __('global.organizer') }}
                                </div>
                                @if($activity->teacher)
                                    <div class="flex items-center">
                                        <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center me-3">
                                            <span class="text-primary font-bold">{{ strtoupper(substr($activity->teacher->name, 0, 1)) }}</span>
                                        </div>
                                        <div>
                                            <div class="font-medium">{{ $activity->teacher->name }}</div>
                                            <div class="text-sm text-slate-500">
                                                {{ $activity->teacher->specialization ?? 'Teacher' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 pt-3 border-t">
                                        <a href="{{ route('teachers.show', $activity->teacher->id) }}" class="text-primary hover:underline">
                                            {{ __('global.view_teacher_profile') }}
                                            <x-base.lucide icon="ArrowRight" class="w-4 h-4 inline ms-1" />
                                        </a>
                                    </div>
                                @else
                                    <div class="text-slate-500">{{ __('global.no_organizer_assigned') }}</div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-span-12 md:col-span-6">
                            <div class="box p-5">
                                <div class="text-base font-medium mb-3 flex items-center">
                                    <x-base.lucide icon="Home" class="w-5 h-5 me-2 text-primary" />
                                    {{ __('global.assigned_class') }}
                                </div>
                                @if($activity->class)
                                    <div>
                                        <div class="font-medium">{{ $activity->class->name }}</div>
                                        <div class="text-sm text-slate-500">
                                            {{ $activity->class->age_group ?? 'Not specified' }}
                                        </div>
                                        <div class="text-sm text-slate-500 mt-1">
                                            {{ $activity->class->current_students ?? 0 }} {{ __('global.students') }}
                                        </div>
                                    </div>
                                    <div class="mt-4 pt-3 border-t">
                                        <a href="{{ route('classes.show', $activity->class->id) }}" class="text-primary hover:underline">
                                            {{ __('global.view_class_details') }}
                                            <x-base.lucide icon="ArrowRight" class="w-4 h-4 inline ms-1" />
                                        </a>
                                    </div>
                                @else
                                    <div class="text-slate-500">{{ __('global.no_class_assigned') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Activity Details Tab -->
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
                                <span class="font-medium">{{ $activity->title ?? $activity->name }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.description') }}:</span>
                                <span class="font-medium text-right max-w-xs">
                                    {{ $activity->description ?? __('global.not_provided') }}
                                </span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.activity_type') }}:</span>
                                <span class="font-medium">{{ $activity->activity_type ?? __('global.not_specified') }}</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500">{{ __('global.difficulty_level') }}:</span>
                                <span class="font-medium">{{ $activity->difficulty_level ?? __('global.not_specified') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="Settings" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.status_info') }}
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.status') }}:</span>
                                <span class="font-medium px-2 py-1 rounded text-sm 
                                    {{ $activity->is_active ? 'bg-success/20 text-success' : 'bg-warning/20 text-warning' }}">
                                    {{ $activity->is_active ? __('global.active') : __('global.inactive') }}
                                </span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.is_full') }}:</span>
                                <span class="font-medium">
                                    <span class="{{ $activity->is_full ? 'text-danger' : 'text-success' }}">
                                        <x-base.lucide icon="{{ $activity->is_full ? 'XCircle' : 'CheckCircle' }}" class="w-4 h-4 inline me-1" />
                                        {{ $activity->is_full ? __('global.yes') : __('global.no') }}
                                    </span>
                                </span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500">{{ __('global.last_updated') }}:</span>
                                <span class="font-medium text-sm">{{ $activity->updated_at->format('M d, Y H:i') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Participants Tab -->
        <div id="participants" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center justify-between">
                            <span>{{ __('global.participants_list') }}</span>
                            <span class="text-sm text-slate-500">{{ $activity->participant_count }}/{{ $activity->max_participants ?? '∞' }} {{ __('global.participants') }}</span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @forelse($activity->children as $child)
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
                                    <h3 class="text-lg font-medium text-slate-500">{{ __('global.no_participants_enrolled') }}</h3>
                                    <p class="text-slate-400 mt-2">{{ __('global.activity_has_no_participants') }}</p>
                                </div>
                            @endforelse
                        </div>
                        
                        @if($activity->children->count() > 0)
                            <div class="mt-6 pt-4 border-t text-center">
                                <div class="grid grid-cols-3 gap-4">
                                    <div class="text-center p-3 bg-blue-50 rounded">
                                        <div class="text-lg font-bold text-blue-600">
                                            {{ $activity->children()->where('gender', 'male')->count() }}
                                        </div>
                                        <div class="text-xs text-slate-500">{{ __('global.male') }}</div>
                                    </div>
                                    <div class="text-center p-3 bg-pink-50 rounded">
                                        <div class="text-lg font-bold text-pink-600">
                                            {{ $activity->children()->where('gender', 'female')->count() }}
                                        </div>
                                        <div class="text-xs text-slate-500">{{ __('global.female') }}</div>
                                    </div>
                                    <div class="text-center p-3 bg-green-50 rounded">
                                        <div class="text-lg font-bold text-green-600">
                                            {{ round($activity->children()->avg('age') ?? 0, 1) }}
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
                                <span class="text-slate-500">{{ __('global.scheduled_date') }}:</span>
                                <span class="font-medium">
                                    {{ $activity->scheduled_date ? $activity->scheduled_date->format('F j, Y') : __('global.not_scheduled') }}
                                </span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.start_time') }}:</span>
                                <span class="font-medium">
                                    {{ $activity->start_time ? $activity->start_time->format('H:i') : '--:--' }}
                                </span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.end_time') }}:</span>
                                <span class="font-medium">
                                    {{ $activity->end_time ? $activity->end_time->format('H:i') : '--:--' }}
                                </span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500">{{ __('global.duration') }}:</span>
                                <span class="font-medium">
                                    @if($activity->start_time && $activity->end_time)
                                        {{ $activity->start_time->diffInHours($activity->end_time) }}h 
                                        {{ $activity->start_time->diff($activity->end_time)->format('%i') }}m
                                    @else
                                        {{ __('global.not_specified') }}
                                    @endif
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
                                <span class="font-medium">{{ $activity->location ?? __('global.not_specified') }}</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500">{{ __('global.estimated_duration') }}:</span>
                                <span class="font-medium">
                                    {{ $activity->estimated_duration ?? '--' }} {{ __('global.minutes') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Resources Tab -->
        <div id="resources" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="Package" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.required_materials') }}
                        </div>
                        @if($activity->required_materials && is_array($activity->required_materials) && count($activity->required_materials) > 0)
                            <div class="space-y-2">
                                @foreach($activity->required_materials as $material)
                                    <div class="flex items-center p-2 bg-slate-50 rounded">
                                        <x-base.lucide icon="Package" class="w-4 h-4 me-2 text-slate-500" />
                                        <span>{{ $material }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-4 text-slate-500">
                                <x-base.lucide icon="Package" class="w-8 h-8 mx-auto mb-2 opacity-50" />
                                <p class="text-sm">{{ __('global.no_materials_required') }}</p>
                            </div>
                        @endif
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="FileText" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.instructions') }}
                        </div>
                        @if($activity->instructions)
                            <div class="p-4 bg-slate-50 rounded-lg text-sm">
                                <p class="text-slate-700 whitespace-pre-line">{{ $activity->instructions }}</p>
                            </div>
                        @else
                            <div class="text-center py-4 text-slate-500">
                                <x-base.lucide icon="FileText" class="w-8 h-8 mx-auto mb-2 opacity-50" />
                                <p class="text-sm">{{ __('global.no_instructions_provided') }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Outcomes Tab -->
        <div id="outcomes" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="Target" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.learning_objectives') }}
                        </div>
                        @if($activity->learning_objectives && is_array($activity->learning_objectives) && count($activity->learning_objectives) > 0)
                            <div class="space-y-3">
                                @foreach($activity->learning_objectives as $objective)
                                    <div class="flex items-start p-3 bg-blue-50 rounded">
                                        <x-base.lucide icon="Target" class="w-4 h-4 me-2 text-blue-500 mt-0.5 flex-shrink-0" />
                                        <span class="text-sm">{{ $objective }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-4 text-slate-500">
                                <x-base.lucide icon="Target" class="w-8 h-8 mx-auto mb-2 opacity-50" />
                                <p class="text-sm">{{ __('global.no_learning_objectives') }}</p>
                            </div>
                        @endif
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="Award" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.expected_outcomes') }}
                        </div>
                        @if($activity->outcomes && is_array($activity->outcomes) && count($activity->outcomes) > 0)
                            <div class="space-y-3">
                                @foreach($activity->outcomes as $outcome)
                                    <div class="flex items-start p-3 bg-green-50 rounded">
                                        <x-base.lucide icon="Award" class="w-4 h-4 me-2 text-green-500 mt-0.5 flex-shrink-0" />
                                        <span class="text-sm">{{ $outcome }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-4 text-slate-500">
                                <x-base.lucide icon="Award" class="w-8 h-8 mx-auto mb-2 opacity-50" />
                                <p class="text-sm">{{ __('global.no_expected_outcomes') }}</p>
                            </div>
                        @endif
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