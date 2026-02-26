@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Teacher.show') }} - {{ $teacher->name }}</title>
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
            <x-base.lucide icon="UserCheck" class="w-5 h-5 inline me-2" />
            {{ __('global.teacher_profile') }} - {{ $teacher->name }}
        </h2>
        <div class="ms-auto flex gap-2">
            <x-base.button variant="secondary" as="a" href="{{ route('teachers.index') }}">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" />
                {{ __('global.back') }}
            </x-base.button>
            @can('edit_teachers')
            <x-base.button variant="primary" as="a" href="{{ route('teachers.edit', $teacher->id) }}">
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
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="personal">
                    <x-base.lucide icon="User" class="w-4 h-4 me-2" />
                    {{ __('global.personal_info') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="professional">
                    <x-base.lucide icon="Briefcase" class="w-4 h-4 me-2" />
                    {{ __('global.professional_info') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="classes">
                    <x-base.lucide icon="Home" class="w-4 h-4 me-2" />
                    {{ __('global.classes') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="activities">
                    <x-base.lucide icon="Calendar" class="w-4 h-4 me-2" />
                    {{ __('global.activities') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="events">
                    <x-base.lucide icon="CalendarEvent" class="w-4 h-4 me-2" />
                    {{ __('global.events') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="curriculum">
                    <x-base.lucide icon="Book" class="w-4 h-4 me-2" />
                    {{ __('global.curriculum') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="students">
                    <x-base.lucide icon="Users" class="w-4 h-4 me-2" />
                    {{ __('global.students') }}
                </button>
            </nav>
        </div>
    </div>

    <!-- Tab Content -->
    <div class="mt-5">
        <!-- Overview Tab -->
        <div id="overview" class="tab-content active">
            <div class="grid grid-cols-12 gap-6">
                <!-- Profile Card -->
                <div class="intro-y col-span-12 lg:col-span-4">
                    <div class="box p-5 info-card">
                        <div class="flex items-center">
                            <div class="w-20 h-20 rounded-full overflow-hidden border-4 border-primary/20">
                                @if($teacher->photo_path)
                                    <img src="{{ asset('storage/'.$teacher->photo_path) }}" class="w-full h-full object-cover" alt="{{ $teacher->name }}">
                                @else
                                    <div class="w-full h-full bg-primary/10 flex items-center justify-center text-primary font-bold text-2xl">
                                        {{ strtoupper(substr($teacher->name, 0, 2)) }}
                                    </div>
                                @endif
                            </div>
                            <div class="ms-4 flex-1">
                                <div class="text-xl font-bold">{{ $teacher->name }}</div>
                                <div class="text-slate-500 text-sm mt-1">
                                    {{ $teacher->specialization ?? 'Not specified' }}
                                </div>
                                <div class="text-slate-500 text-sm mt-1">
                                    {{ $teacher->qualification ?? 'Not specified' }}
                                </div>
                            </div>
                            <div class="ms-auto">
                                <span class="px-3 py-1 rounded-full text-sm font-medium 
                                    {{ $teacher->is_active ? 'bg-success/20 text-success' : 'bg-warning/20 text-warning' }}">
                                    {{ $teacher->is_active ? __('global.active') : __('global.inactive') }}
                                </span>
                            </div>
                        </div>
                        
                        <div class="mt-6 space-y-3">
                            <div class="flex items-center text-sm">
                                <x-base.lucide icon="Phone" class="w-4 h-4 me-2 text-slate-500" />
                                <span>{{ $teacher->phone ?? __('global.not_provided') }}</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <x-base.lucide icon="Mail" class="w-4 h-4 me-2 text-slate-500" />
                                <span>{{ $teacher->email ?? __('global.not_provided') }}</span>
                            </div>
                            <div class="flex items-start text-sm">
                                <x-base.lucide icon="Home" class="w-4 h-4 me-2 text-slate-500 mt-0.5" />
                                <span>{{ $teacher->address ?? __('global.not_provided') }}</span>
                            </div>
                        </div>
                        
                        <div class="mt-5 pt-4 border-t">
                            <div class="grid grid-cols-3 gap-2">
                                <div class="text-center p-2 bg-blue-50 rounded">
                                    <div class="text-lg font-bold text-blue-600">{{ $teacher->classes()->count() }}</div>
                                    <div class="text-xs text-slate-500">{{ __('global.classes') }}</div>
                                </div>
                                <div class="text-center p-2 bg-green-50 rounded">
                                    <div class="text-lg font-bold text-green-600">{{ $teacher->activities()->count() }}</div>
                                    <div class="text-xs text-slate-500">{{ __('global.activities') }}</div>
                                </div>
                                <div class="text-center p-2 bg-purple-50 rounded">
                                    <div class="text-lg font-bold text-purple-600">{{ $teacher->assignedChildren()->count() }}</div>
                                    <div class="text-xs text-slate-500">{{ __('global.students') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="box p-5 mt-5">
                        <div class="text-base font-medium mb-4">{{ __('global.professional_summary') }}</div>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-slate-500">{{ __('global.experience') }}:</span>
                                <span class="font-medium">{{ $teacher->experience_years ?? 0 }} {{ __('global.years') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-500">{{ __('global.years_of_service') }}:</span>
                                <span class="font-medium">{{ $teacher->years_of_service ?? 0 }} {{ __('global.years') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-500">{{ __('global.salary') }}:</span>
                                <span class="font-medium">{{ $teacher->salary ? number_format($teacher->salary, 2) : 'Not specified' }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-500">{{ __('global.hire_date') }}:</span>
                                <span class="font-medium">{{ $teacher->hire_date ? $teacher->hire_date->format('M d, Y') : 'Not specified' }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="intro-y col-span-12 lg:col-span-8">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12 md:col-span-6">
                            <div class="box p-5">
                                <div class="text-base font-medium mb-3">{{ __('global.recent_classes') }}</div>
                                <div class="space-y-3">
                                    @forelse($teacher->classes()->latest()->take(3)->get() as $class)
                                        <div class="flex items-center p-2 border rounded hover:bg-slate-50">
                                            <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center me-3">
                                                <span class="text-primary text-sm font-bold">{{ strtoupper(substr($class->name, 0, 1)) }}</span>
                                            </div>
                                            <div class="flex-1">
                                                <div class="font-medium text-sm">{{ $class->name }}</div>
                                                <div class="text-xs text-slate-500">{{ $class->age_group ?? 'Not specified' }}</div>
                                            </div>
                                            <span class="text-xs px-2 py-1 rounded 
                                                {{ $class->is_active ? 'bg-success/20 text-success' : 'bg-warning/20 text-warning' }}">
                                                {{ $class->is_active ? __('global.active') : __('global.inactive') }}
                                            </span>
                                        </div>
                                    @empty
                                        <div class="text-center py-4 text-slate-500">
                                            <x-base.lucide icon="Home" class="w-8 h-8 mx-auto mb-2 opacity-50" />
                                            <p class="text-sm">{{ __('global.no_classes_assigned') }}</p>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-span-12 md:col-span-6">
                            <div class="box p-5">
                                <div class="text-base font-medium mb-3">{{ __('global.recent_activities') }}</div>
                                <div class="space-y-3">
                                    @forelse($teacher->activities()->latest()->take(3)->get() as $activity)
                                        <div class="flex items-center p-2 border rounded hover:bg-slate-50">
                                            <div class="flex-1">
                                                <div class="font-medium text-sm">{{ $activity->title ?? $activity->name }}</div>
                                                <div class="text-xs text-slate-500">
                                                    {{ $activity->scheduled_date ? $activity->scheduled_date->format('M d, Y') : 'Not scheduled' }}
                                                </div>
                                            </div>
                                            <span class="text-xs px-2 py-1 rounded 
                                                {{ $activity->is_active ? 'bg-success/20 text-success' : 'bg-warning/20 text-warning' }}">
                                                {{ $activity->is_active ? __('global.active') : __('global.inactive') }}
                                            </span>
                                        </div>
                                    @empty
                                        <div class="text-center py-4 text-slate-500">
                                            <x-base.lucide icon="Calendar" class="w-8 h-8 mx-auto mb-2 opacity-50" />
                                            <p class="text-sm">{{ __('global.no_activities_created') }}</p>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Personal Information Tab -->
        <div id="personal" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="User" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.basic_information') }}
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.name') }}:</span>
                                <span class="font-medium">{{ $teacher->name }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.email') }}:</span>
                                <span class="font-medium">{{ $teacher->email ?? __('global.not_provided') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.phone') }}:</span>
                                <span class="font-medium">{{ $teacher->phone ?? __('global.not_provided') }}</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500">{{ __('global.address') }}:</span>
                                <span class="font-medium text-right max-w-xs">{{ $teacher->address ?? __('global.not_provided') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="UserCheck" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.account_status') }}
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.status') }}:</span>
                                <span class="font-medium px-2 py-1 rounded text-sm 
                                    {{ $teacher->is_active ? 'bg-success/20 text-success' : 'bg-warning/20 text-warning' }}">
                                    {{ $teacher->is_active ? __('global.active') : __('global.inactive') }}
                                </span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.user_account') }}:</span>
                                <span class="font-medium">
                                    @if($teacher->user)
                                        <span class="text-success">
                                            <x-base.lucide icon="CheckCircle" class="w-4 h-4 inline me-1" />
                                            {{ __('global.linked') }}
                                        </span>
                                    @else
                                        <span class="text-danger">
                                            <x-base.lucide icon="XCircle" class="w-4 h-4 inline me-1" />
                                            {{ __('global.not_linked') }}
                                        </span>
                                    @endif
                                </span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500">{{ __('global.last_updated') }}:</span>
                                <span class="font-medium">{{ $teacher->updated_at->format('M d, Y H:i') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Professional Information Tab -->
        <div id="professional" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="Briefcase" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.professional_details') }}
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.specialization') }}:</span>
                                <span class="font-medium">{{ $teacher->specialization ?? __('global.not_specified') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.qualification') }}:</span>
                                <span class="font-medium">{{ $teacher->qualification ?? __('global.not_specified') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.experience_years') }}:</span>
                                <span class="font-medium">{{ $teacher->experience_years ?? 0 }} {{ __('global.years') }}</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500">{{ __('global.salary') }}:</span>
                                <span class="font-medium">{{ $teacher->salary ? number_format($teacher->salary, 2) : __('global.not_specified') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="Calendar" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.employment_info') }}
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.hire_date') }}:</span>
                                <span class="font-medium">{{ $teacher->hire_date ? $teacher->hire_date->format('F j, Y') : __('global.not_specified') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.years_of_service') }}:</span>
                                <span class="font-medium">{{ $teacher->years_of_service ?? 0 }} {{ __('global.years') }}</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500">{{ __('global.bio') }}:</span>
                                <span class="font-medium text-right max-w-xs">{{ $teacher->bio ?? __('global.not_provided') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Classes Tab -->
        <div id="classes" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center justify-between">
                            <span>{{ __('global.classes_managed') }}</span>
                            <span class="text-sm text-slate-500">{{ $teacher->classes()->count() }} {{ __('global.classes') }}</span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @forelse($teacher->classes as $class)
                                <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                    <div class="flex items-start justify-between mb-3">
                                        <h3 class="font-medium text-lg">{{ $class->name }}</h3>
                                        <span class="px-2 py-1 rounded text-xs 
                                            {{ $class->is_active ? 'bg-success/20 text-success' : 'bg-warning/20 text-warning' }}">
                                            {{ $class->is_active ? __('global.active') : __('global.inactive') }}
                                        </span>
                                    </div>
                                    <div class="space-y-2 text-sm text-slate-600">
                                        <div class="flex items-center">
                                            <x-base.lucide icon="Hash" class="w-4 h-4 me-2" />
                                            {{ $class->code ?? 'Not specified' }}
                                        </div>
                                        <div class="flex items-center">
                                            <x-base.lucide icon="Users" class="w-4 h-4 me-2" />
                                            {{ $class->current_students ?? 0 }}/{{ $class->capacity ?? '∞' }} {{ __('global.students') }}
                                        </div>
                                        <div class="flex items-center">
                                            <x-base.lucide icon="Calendar" class="w-4 h-4 me-2" />
                                            {{ $class->age_group ?? 'Not specified' }}
                                        </div>
                                        <div class="flex items-center">
                                            <x-base.lucide icon="MapPin" class="w-4 h-4 me-2" />
                                            {{ $class->room_number ?? 'Not specified' }}
                                        </div>
                                        <div class="flex items-center">
                                            <x-base.lucide icon="DollarSign" class="w-4 h-4 me-2" />
                                            {{ $class->monthly_fee ? number_format($class->monthly_fee, 2) : 'Not specified' }}
                                        </div>
                                    </div>
                                    @if($class->description)
                                        <div class="mt-3 pt-3 border-t text-sm">
                                            <p class="text-slate-700 line-clamp-2">{{ $class->description }}</p>
                                        </div>
                                    @endif
                                    <div class="mt-4 pt-3 border-t flex justify-between items-center">
                                        <div class="flex space-x-2">
                                            <span class="text-xs px-2 py-1 rounded bg-blue-100 text-blue-800">
                                                {{ $class->activities()->count() }} {{ __('global.activities') }}
                                            </span>
                                            <span class="text-xs px-2 py-1 rounded bg-green-100 text-green-800">
                                                {{ $class->children()->count() }} {{ __('global.students') }}
                                            </span>
                                        </div>
                                        <a href="{{ route('classes.show', $class->id) }}" class="text-primary hover:underline text-sm">
                                            {{ __('global.view_details') }}
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-full text-center py-12">
                                    <x-base.lucide icon="Home" class="w-16 h-16 mx-auto mb-4 text-slate-300" />
                                    <h3 class="text-lg font-medium text-slate-500">{{ __('global.no_classes_assigned') }}</h3>
                                    <p class="text-slate-400 mt-2">{{ __('global.teacher_not_assigned_to_classes') }}</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Activities Tab -->
        <div id="activities" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center justify-between">
                            <span>{{ __('global.activities_created') }}</span>
                            <span class="text-sm text-slate-500">{{ $teacher->activities()->count() }} {{ __('global.activities') }}</span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @forelse($teacher->activities as $activity)
                                <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                    <div class="flex items-start justify-between mb-3">
                                        <h3 class="font-medium text-lg">{{ $activity->title ?? $activity->name }}</h3>
                                        <span class="px-2 py-1 rounded text-xs 
                                            {{ $activity->is_active ? 'bg-success/20 text-success' : 'bg-warning/20 text-warning' }}">
                                            {{ $activity->is_active ? __('global.active') : __('global.inactive') }}
                                        </span>
                                    </div>
                                    <div class="space-y-2 text-sm text-slate-600">
                                        <div class="flex items-center">
                                            <x-base.lucide icon="Home" class="w-4 h-4 me-2" />
                                            {{ optional($activity->class)->name ?? 'Not assigned' }}
                                        </div>
                                        <div class="flex items-center">
                                            <x-base.lucide icon="Calendar" class="w-4 h-4 me-2" />
                                            {{ $activity->scheduled_date ? $activity->scheduled_date->format('M d, Y') : 'Not scheduled' }}
                                        </div>
                                        <div class="flex items-center">
                                            <x-base.lucide icon="Clock" class="w-4 h-4 me-2" />
                                            {{ $activity->start_time ? $activity->start_time->format('H:i') : '--' }} - 
                                            {{ $activity->end_time ? $activity->end_time->format('H:i') : '--' }}
                                        </div>
                                        <div class="flex items-center">
                                            <x-base.lucide icon="MapPin" class="w-4 h-4 me-2" />
                                            {{ $activity->location ?? 'Not specified' }}
                                        </div>
                                        <div class="flex items-center">
                                            <x-base.lucide icon="Users" class="w-4 h-4 me-2" />
                                            {{ $activity->participant_count }}/{{ $activity->max_participants ?? '∞' }} {{ __('global.participants') }}
                                        </div>
                                    </div>
                                    @if($activity->description)
                                        <div class="mt-3 pt-3 border-t text-sm">
                                            <p class="text-slate-700 line-clamp-2">{{ $activity->description }}</p>
                                        </div>
                                    @endif
                                    <div class="mt-4 pt-3 border-t flex justify-between items-center">
                                        <span class="text-xs text-slate-500">
                                            {{ $activity->activity_type ?? 'General' }}
                                        </span>
                                        <a href="{{ route('activities.show', $activity->id) }}" class="text-primary hover:underline text-sm">
                                            {{ __('global.view_details') }}
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-full text-center py-12">
                                    <x-base.lucide icon="Calendar" class="w-16 h-16 mx-auto mb-4 text-slate-300" />
                                    <h3 class="text-lg font-medium text-slate-500">{{ __('global.no_activities_created') }}</h3>
                                    <p class="text-slate-400 mt-2">{{ __('global.teacher_has_not_created_activities') }}</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Events Tab -->
        <div id="events" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center justify-between">
                            <span>{{ __('global.events_managed') }}</span>
                            <span class="text-sm text-slate-500">{{ $teacher->events()->count() }} {{ __('global.events') }}</span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @forelse($teacher->events as $event)
                                <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                    <div class="flex items-start justify-between mb-3">
                                        <h3 class="font-medium text-lg">{{ $event->title ?? $event->name }}</h3>
                                        <span class="px-2 py-1 rounded text-xs 
                                            {{ $event->status === 'active' ? 'bg-success/20 text-success' : 'bg-warning/20 text-warning' }}">
                                            {{ ucfirst($event->status ?? 'active') }}
                                        </span>
                                    </div>
                                    <div class="space-y-2 text-sm text-slate-600">
                                        <div class="flex items-center">
                                            <x-base.lucide icon="Home" class="w-4 h-4 me-2" />
                                            {{ optional($event->class)->name ?? 'Not assigned' }}
                                        </div>
                                        <div class="flex items-center">
                                            <x-base.lucide icon="Calendar" class="w-4 h-4 me-2" />
                                            {{ $event->start_datetime ? $event->start_datetime->format('M d, Y H:i') : 'Not scheduled' }}
                                        </div>
                                        @if($event->end_datetime)
                                            <div class="flex items-center">
                                                <x-base.lucide icon="Calendar" class="w-4 h-4 me-2" />
                                                {{ __('global.ends') }}: {{ $event->end_datetime->format('M d, Y H:i') }}
                                            </div>
                                        @endif
                                        <div class="flex items-center">
                                            <x-base.lucide icon="MapPin" class="w-4 h-4 me-2" />
                                            {{ $event->location ?? 'Not specified' }}
                                        </div>
                                        <div class="flex items-center">
                                            <x-base.lucide icon="Users" class="w-4 h-4 me-2" />
                                            {{ $event->attendee_count }}/{{ $event->max_attendees ?? '∞' }} {{ __('global.attendees') }}
                                        </div>
                                        <div class="flex items-center">
                                            <x-base.lucide icon="DollarSign" class="w-4 h-4 me-2" />
                                            {{ $event->cost ? number_format($event->cost, 2) : 'Free' }}
                                        </div>
                                    </div>
                                    @if($event->description)
                                        <div class="mt-3 pt-3 border-t text-sm">
                                            <p class="text-slate-700 line-clamp-2">{{ $event->description }}</p>
                                        </div>
                                    @endif
                                    <div class="mt-4 pt-3 border-t flex justify-between items-center">
                                        <span class="text-xs text-slate-500">
                                            {{ ucfirst($event->event_type ?? 'General') }}
                                        </span>
                                        <a href="{{ route('events.show', $event->id) }}" class="text-primary hover:underline text-sm">
                                            {{ __('global.view_details') }}
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-full text-center py-12">
                                    <x-base.lucide icon="CalendarEvent" class="w-16 h-16 mx-auto mb-4 text-slate-300" />
                                    <h3 class="text-lg font-medium text-slate-500">{{ __('global.no_events_managed') }}</h3>
                                    <p class="text-slate-400 mt-2">{{ __('global.teacher_has_not_managed_events') }}</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Curriculum Tab -->
        <div id="curriculum" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center justify-between">
                            <span>{{ __('global.curriculum_developed') }}</span>
                            <span class="text-sm text-slate-500">{{ $teacher->curriculum()->count() }} {{ __('global.curricula') }}</span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @forelse($teacher->curriculum as $curriculum)
                                <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                    <div class="flex items-start justify-between mb-3">
                                        <h3 class="font-medium text-lg">{{ $curriculum->name }}</h3>
                                        <span class="px-2 py-1 rounded text-xs 
                                            {{ $curriculum->is_active ? 'bg-success/20 text-success' : 'bg-warning/20 text-warning' }}">
                                            {{ $curriculum->is_active ? __('global.active') : __('global.inactive') }}
                                        </span>
                                    </div>
                                    <div class="space-y-2 text-sm text-slate-600">
                                        <div class="flex items-center">
                                            <x-base.lucide icon="Hash" class="w-4 h-4 me-2" />
                                            {{ $curriculum->code ?? 'Not specified' }}
                                        </div>
                                        <div class="flex items-center">
                                            <x-base.lucide icon="Award" class="w-4 h-4 me-2" />
                                            {{ $curriculum->grade_level ?? 'Not specified' }}
                                        </div>
                                        <div class="flex items-center">
                                            <x-base.lucide icon="Book" class="w-4 h-4 me-2" />
                                            {{ $curriculum->subject_area ?? 'Not specified' }}
                                        </div>
                                        <div class="flex items-center">
                                            <x-base.lucide icon="Calendar" class="w-4 h-4 me-2" />
                                            {{ $curriculum->duration_weeks ?? 'N/A' }} {{ __('global.weeks') }}
                                        </div>
                                    </div>
                                    @if($curriculum->description)
                                        <div class="mt-3 pt-3 border-t text-sm">
                                            <p class="text-slate-700 line-clamp-2">{{ $curriculum->description }}</p>
                                        </div>
                                    @endif
                                    <div class="mt-4 pt-3 border-t flex justify-between items-center">
                                        <div class="flex space-x-2">
                                            <span class="text-xs px-2 py-1 rounded bg-blue-100 text-blue-800">
                                                {{ $curriculum->activities()->count() }} {{ __('global.activities') }}
                                            </span>
                                            <span class="text-xs px-2 py-1 rounded bg-green-100 text-green-800">
                                                {{ $curriculum->classes()->count() }} {{ __('global.classes') }}
                                            </span>
                                        </div>
                                        <a href="{{ route('curricula.show', $curriculum->id) }}" class="text-primary hover:underline text-sm">
                                            {{ __('global.view_details') }}
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-full text-center py-12">
                                    <x-base.lucide icon="Book" class="w-16 h-16 mx-auto mb-4 text-slate-300" />
                                    <h3 class="text-lg font-medium text-slate-500">{{ __('global.no_curriculum_developed') }}</h3>
                                    <p class="text-slate-400 mt-2">{{ __('global.teacher_has_not_developed_curriculum') }}</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Students Tab -->
        <div id="students" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center justify-between">
                            <span>{{ __('global.students_under_care') }}</span>
                            <span class="text-sm text-slate-500">{{ $teacher->assignedChildren()->count() }} {{ __('global.students') }}</span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @forelse($teacher->assignedChildren as $child)
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
                                        <div class="flex items-center">
                                            <x-base.lucide icon="DollarSign" class="w-4 h-4 me-2" />
                                            {{ number_format($child->balance, 2) }} {{ __('global.balance') }}
                                        </div>
                                        <div class="flex items-center">
                                            <x-base.lucide icon="Cake" class="w-4 h-4 me-2" />
                                            {{ $child->dob->format('M d, Y') }}
                                        </div>
                                    </div>
                                    <div class="mt-4 pt-3 border-t flex justify-between items-center">
                                        <div class="flex space-x-2">
                                            <span class="text-xs px-2 py-1 rounded bg-blue-100 text-blue-800">
                                                {{ $child->attendances()->where('status', 'present')->count() }} {{ __('global.present') }}
                                            </span>
                                            <span class="text-xs px-2 py-1 rounded bg-red-100 text-red-800">
                                                {{ $child->attendances()->where('status', 'absent')->count() }} {{ __('global.absent') }}
                                            </span>
                                        </div>
                                        <a href="{{ route('children.show', $child->id) }}" class="text-primary hover:underline text-sm">
                                            {{ __('global.view_details') }}
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-full text-center py-12">
                                    <x-base.lucide icon="Users" class="w-16 h-16 mx-auto mb-4 text-slate-300" />
                                    <h3 class="text-lg font-medium text-slate-500">{{ __('global.no_students_assigned') }}</h3>
                                    <p class="text-slate-400 mt-2">{{ __('global.teacher_has_no_assigned_students') }}</p>
                                </div>
                            @endforelse
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