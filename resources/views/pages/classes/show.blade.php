@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Classes.show') }} - {{ $classes->name }}</title>
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
            <x-base.lucide icon="Home" class="w-5 h-5 inline me-2" />
            {{ __('global.class_profile') }} - {{ $classes->name }}
        </h2>
        <div class="ms-auto flex gap-2">
            <x-base.button variant="secondary" as="a" href="{{ route('classes.index') }}">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" />
                {{ __('global.back') }}
            </x-base.button>
            @can('edit_classes')
            <x-base.button variant="primary" as="a" href="{{ route('classes.edit', $classes->id) }}">
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
                    {{ __('global.class_details') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="students">
                    <x-base.lucide icon="Users" class="w-4 h-4 me-2" />
                    {{ __('global.students') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="teacher">
                    <x-base.lucide icon="UserCheck" class="w-4 h-4 me-2" />
                    {{ __('global.teacher') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="schedule">
                    <x-base.lucide icon="Clock" class="w-4 h-4 me-2" />
                    {{ __('global.schedule') }}
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
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="attendance">
                    <x-base.lucide icon="CheckCircle" class="w-4 h-4 me-2" />
                    {{ __('global.attendance') }}
                </button>
            </nav>
        </div>
    </div>

    <!-- Tab Content -->
    <div class="mt-5">
        <!-- Overview Tab -->
        <div id="overview" class="tab-content active">
            <div class="grid grid-cols-12 gap-6">
                <!-- Class Info Card -->
                <div class="intro-y col-span-12 lg:col-span-4">
                    <div class="box p-5 info-card">
                        <div class="flex items-start justify-between">
                            <div>
                                <div class="text-2xl font-bold">{{ $classes->name }}</div>
                                <div class="text-slate-500 text-lg mt-1">{{ $classes->code ?? 'No code' }}</div>
                                <div class="text-slate-500 text-sm mt-2">
                                    {{ $classes->age_group ?? 'Not specified' }} • {{ $classes->description ?? 'No description' }}
                                </div>
                            </div>
                            <div class="ms-auto">
                                <span class="px-3 py-1 rounded-full text-sm font-medium 
                                    {{ $classes->is_active ? 'bg-success/20 text-success' : 'bg-danger/20 text-danger' }}">
                                    {{ $classes->is_active ? __('global.active') : __('global.inactive') }}
                                </span>
                            </div>
                        </div>
                        
                        <div class="mt-6 grid grid-cols-2 gap-4">
                            <div class="text-center p-3 bg-blue-50 rounded-lg">
                                <div class="text-2xl font-bold text-blue-600">{{ $classes->current_students ?? 0 }}</div>
                                <div class="text-xs text-slate-500">{{ __('global.enrolled_students') }}</div>
                            </div>
                            <div class="text-center p-3 bg-green-50 rounded-lg">
                                <div class="text-2xl font-bold text-green-600">{{ $classes->available_spots }}</div>
                                <div class="text-xs text-slate-500">{{ __('global.available_spots') }}</div>
                            </div>
                            <div class="text-center p-3 bg-purple-50 rounded-lg">
                                <div class="text-2xl font-bold text-purple-600">{{ $classes->capacity ?? '∞' }}</div>
                                <div class="text-xs text-slate-500">{{ __('global.total_capacity') }}</div>
                            </div>
                            <div class="text-center p-3 bg-yellow-50 rounded-lg">
                                <div class="text-2xl font-bold text-yellow-600">
                                    {{ $classes->monthly_fee ? number_format($classes->monthly_fee, 2) : '0.00' }}
                                </div>
                                <div class="text-xs text-slate-500">{{ __('global.monthly_fee') }}</div>
                            </div>
                        </div>
                        
                        <div class="mt-5">
                            <div class="text-sm text-slate-500 mb-2">{{ __('global.enrollment_progress') }}</div>
                            @php
                                $fillPercent = $classes->capacity > 0 ? min(100, ($classes->current_students / $classes->capacity) * 100) : 0;
                            @endphp
                            <x-base.progress.bar :value="$fillPercent" class="h-2" />
                            <div class="text-xs text-end mt-1">{{ number_format($fillPercent, 1) }}% {{ __('global.full') }}</div>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="box p-5 mt-5">
                        <div class="text-base font-medium mb-4">{{ __('global.class_statistics') }}</div>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="text-center p-2 bg-blue-50 rounded">
                                <div class="text-lg font-bold text-blue-600">{{ $classes->activities()->count() }}</div>
                                <div class="text-xs text-slate-500">{{ __('global.activities') }}</div>
                            </div>
                            <div class="text-center p-2 bg-green-50 rounded">
                                <div class="text-lg font-bold text-green-600">{{ $classes->events()->count() }}</div>
                                <div class="text-xs text-slate-500">{{ __('global.events') }}</div>
                            </div>
                            <div class="text-center p-2 bg-purple-50 rounded">
                                <div class="text-lg font-bold text-purple-600">{{ $classes->attendances()->count() }}</div>
                                <div class="text-xs text-slate-500">{{ __('global.attendance_records') }}</div>
                            </div>
                            <div class="text-center p-2 bg-yellow-50 rounded">
                                <div class="text-lg font-bold text-yellow-600">
                                    {{ $classes->children()->sum('fees_paid') > 0 ? number_format($classes->children()->sum('fees_paid'), 2) : '0.00' }}
                                </div>
                                <div class="text-xs text-slate-500">{{ __('global.total_fees_paid') }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="intro-y col-span-12 lg:col-span-8">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12 md:col-span-6">
                            <div class="box p-5">
                                <div class="text-base font-medium mb-3">{{ __('global.recent_students') }}</div>
                                <div class="space-y-3">
                                    @forelse($classes->children()->latest()->take(4)->get() as $child)
                                        <div class="flex items-center p-2 hover:bg-slate-50 rounded">
                                            <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center me-3">
                                                <span class="text-primary text-sm font-bold">{{ strtoupper(substr($child->name, 0, 1)) }}</span>
                                            </div>
                                            <div class="flex-1">
                                                <div class="font-medium text-sm">{{ $child->name }}</div>
                                                <div class="text-xs text-slate-500">{{ $child->age }} {{ __('global.years_old') }}</div>
                                            </div>
                                            <a href="{{ route('children.show', $child->id) }}" class="text-primary hover:underline text-xs">
                                                {{ __('global.view') }}
                                            </a>
                                        </div>
                                    @empty
                                        <div class="text-center py-4 text-slate-500">
                                            <x-base.lucide icon="Users" class="w-8 h-8 mx-auto mb-2 opacity-50" />
                                            <p class="text-sm">{{ __('global.no_students_enrolled') }}</p>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-span-12 md:col-span-6">
                            <div class="box p-5">
                                <div class="text-base font-medium mb-3">{{ __('global.recent_activities') }}</div>
                                <div class="space-y-3">
                                    @forelse($classes->activities()->latest()->take(4)->get() as $activity)
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
                                            <p class="text-sm">{{ __('global.no_activities_scheduled') }}</p>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Class Details Tab -->
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
                                <span class="text-slate-500">{{ __('global.class_name') }}:</span>
                                <span class="font-medium">{{ $classes->name }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.class_code') }}:</span>
                                <span class="font-medium">{{ $classes->code ?? __('global.not_specified') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.description') }}:</span>
                                <span class="font-medium text-right max-w-xs">{{ $classes->description ?? __('global.not_provided') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.age_group') }}:</span>
                                <span class="font-medium">{{ $classes->age_group ?? __('global.not_specified') }}</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500">{{ __('global.status') }}:</span>
                                <span class="font-medium px-2 py-1 rounded text-sm 
                                    {{ $classes->is_active ? 'bg-success/20 text-success' : 'bg-danger/20 text-danger' }}">
                                    {{ $classes->is_active ? __('global.active') : __('global.inactive') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="Settings" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.administrative_info') }}
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.capacity') }}:</span>
                                <span class="font-medium">{{ $classes->capacity ?? 'Not specified' }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.current_students') }}:</span>
                                <span class="font-medium">{{ $classes->current_students ?? 0 }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.available_spots') }}:</span>
                                <span class="font-medium">{{ $classes->available_spots }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.monthly_fee') }}:</span>
                                <span class="font-medium">{{ $classes->monthly_fee ? number_format($classes->monthly_fee, 2) : __('global.not_specified') }}</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500">{{ __('global.is_full') }}:</span>
                                <span class="font-medium">
                                    <span class="{{ $classes->is_full ? 'text-danger' : 'text-success' }}">
                                        <x-base.lucide icon="{{ $classes->is_full ? 'XCircle' : 'CheckCircle' }}" class="w-4 h-4 inline me-1" />
                                        {{ $classes->is_full ? __('global.yes') : __('global.no') }}
                                    </span>
                                </span>
                            </div>
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
                            <span>{{ __('global.enrolled_students') }}</span>
                            <span class="text-sm text-slate-500">{{ $classes->children()->count() }} {{ __('global.students') }}</span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @forelse($classes->children as $child)
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
                                        <div class="flex items-center">
                                            <x-base.lucide icon="User" class="w-4 h-4 me-2" />
                                            {{ $child->gender }}
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
                                    <h3 class="text-lg font-medium text-slate-500">{{ __('global.no_students_enrolled') }}</h3>
                                    <p class="text-slate-400 mt-2">{{ __('global.class_has_no_students') }}</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Teacher Tab -->
        <div id="teacher" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="UserCheck" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.assigned_teacher') }}
                        </div>
                        @if($classes->teacher)
                            <div class="flex items-start">
                                <div class="w-20 h-20 rounded-full overflow-hidden border-4 border-primary/20 me-4">
                                    @if($classes->teacher->photo_path)
                                        <img src="{{ asset('storage/'.$classes->teacher->photo_path) }}" class="w-full h-full object-cover" alt="{{ $classes->teacher->name }}">
                                    @else
                                        <div class="w-full h-full bg-primary/10 flex items-center justify-center text-primary font-bold text-xl">
                                            {{ strtoupper(substr($classes->teacher->name, 0, 2)) }}
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <div class="text-xl font-bold">{{ $classes->teacher->name }}</div>
                                    <div class="text-slate-500 text-sm mt-1">
                                        {{ $classes->teacher->specialization ?? 'Not specified' }}
                                    </div>
                                    <div class="text-slate-500 text-sm mt-1">
                                        {{ $classes->teacher->qualification ?? 'Not specified' }}
                                    </div>
                                    
                                    <div class="mt-4 space-y-2">
                                        <div class="flex items-center text-sm">
                                            <x-base.lucide icon="Phone" class="w-4 h-4 me-2 text-slate-500" />
                                            <span>{{ $classes->teacher->phone ?? __('global.not_provided') }}</span>
                                        </div>
                                        <div class="flex items-center text-sm">
                                            <x-base.lucide icon="Mail" class="w-4 h-4 me-2 text-slate-500" />
                                            <span>{{ $classes->teacher->email ?? __('global.not_provided') }}</span>
                                        </div>
                                        <div class="flex items-center text-sm">
                                            <x-base.lucide icon="Briefcase" class="w-4 h-4 me-2 text-slate-500" />
                                            <span>{{ $classes->teacher->experience_years ?? 0 }} {{ __('global.years_experience') }}</span>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4 pt-4 border-t">
                                        <div class="grid grid-cols-3 gap-2">
                                            <div class="text-center p-2 bg-blue-50 rounded">
                                                <div class="text-lg font-bold text-blue-600">{{ $classes->teacher->classes()->count() }}</div>
                                                <div class="text-xs text-slate-500">{{ __('global.classes') }}</div>
                                            </div>
                                            <div class="text-center p-2 bg-green-50 rounded">
                                                <div class="text-lg font-bold text-green-600">{{ $classes->teacher->activities()->count() }}</div>
                                                <div class="text-xs text-slate-500">{{ __('global.activities') }}</div>
                                            </div>
                                            <div class="text-center p-2 bg-purple-50 rounded">
                                                <div class="text-lg font-bold text-purple-600">{{ $classes->teacher->assignedChildren()->count() }}</div>
                                                <div class="text-xs text-slate-500">{{ __('global.students') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4">
                                        <a href="{{ route('teachers.show', $classes->teacher->id) }}" class="text-primary hover:underline">
                                            {{ __('global.view_teacher_profile') }}
                                            <x-base.lucide icon="ArrowRight" class="w-4 h-4 inline ms-1" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="text-center py-8">
                                <x-base.lucide icon="UserX" class="w-16 h-16 mx-auto mb-4 text-slate-300" />
                                <h3 class="text-lg font-medium text-slate-500">{{ __('global.no_teacher_assigned') }}</h3>
                                <p class="text-slate-400 mt-2">{{ __('global.assign_teacher_to_view_details') }}</p>
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
                            {{ __('global.class_schedule') }}
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.start_time') }}:</span>
                                <span class="font-medium">{{ $classes->start_time ? $classes->start_time->format('H:i') : __('global.not_specified') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.end_time') }}:</span>
                                <span class="font-medium">{{ $classes->end_time ? $classes->end_time->format('H:i') : __('global.not_specified') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.room_number') }}:</span>
                                <span class="font-medium">{{ $classes->room_number ?? __('global.not_specified') }}</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500">{{ __('global.location') }}:</span>
                                <span class="font-medium">{{ $classes->location ?? $classes->room_number ?? __('global.not_specified') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="Calendar" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.schedule_summary') }}
                        </div>
                        <div class="space-y-4">
                            <div class="text-center p-4 bg-blue-50 rounded-lg">
                                <div class="text-2xl font-bold text-blue-600">
                                    {{ $classes->start_time && $classes->end_time ? $classes->start_time->diffInMinutes($classes->end_time) : 0 }}
                                </div>
                                <div class="text-sm text-slate-600">{{ __('global.minutes_per_session') }}</div>
                            </div>
                            <div class="text-center p-4 bg-green-50 rounded-lg">
                                <div class="text-2xl font-bold text-green-600">
                                    {{ $classes->activities()->whereDate('scheduled_date', 'today')->count() }}
                                </div>
                                <div class="text-sm text-slate-600">{{ __('global.activities_today') }}</div>
                            </div>
                            <div class="text-center p-4 bg-purple-50 rounded-lg">
                                <div class="text-2xl font-bold text-purple-600">
                                    {{ $classes->events()->whereDate('start_datetime', 'today')->count() }}
                                </div>
                                <div class="text-sm text-slate-600">{{ __('global.events_today') }}</div>
                            </div>
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
                            <span>{{ __('global.scheduled_activities') }}</span>
                            <span class="text-sm text-slate-500">{{ $classes->activities()->count() }} {{ __('global.activities') }}</span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @forelse($classes->activities as $activity)
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
                                            <x-base.lucide icon="UserCheck" class="w-4 h-4 me-2" />
                                            {{ optional($activity->teacher)->name ?? 'Not assigned' }}
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
                                    <h3 class="text-lg font-medium text-slate-500">{{ __('global.no_activities_scheduled') }}</h3>
                                    <p class="text-slate-400 mt-2">{{ __('global.class_has_no_activities') }}</p>
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
                            <span>{{ __('global.scheduled_events') }}</span>
                            <span class="text-sm text-slate-500">{{ $classes->events()->count() }} {{ __('global.events') }}</span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @forelse($classes->events as $event)
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
                                            <x-base.lucide icon="UserCheck" class="w-4 h-4 me-2" />
                                            {{ optional($event->teacher)->name ?? 'Not assigned' }}
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
                                    <h3 class="text-lg font-medium text-slate-500">{{ __('global.no_events_scheduled') }}</h3>
                                    <p class="text-slate-400 mt-2">{{ __('global.class_has_no_events') }}</p>
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
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="Book" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.assigned_curriculum') }}
                        </div>
                        @if($classes->curriculum)
                            <div class="border rounded-lg p-5">
                                <div class="flex items-start justify-between mb-4">
                                    <div>
                                        <h3 class="text-xl font-bold">{{ $classes->curriculum->name }}</h3>
                                        <div class="text-slate-500 text-sm mt-1">{{ $classes->curriculum->code ?? 'No code' }}</div>
                                    </div>
                                    <span class="px-3 py-1 rounded text-sm 
                                        {{ $classes->curriculum->is_active ? 'bg-success/20 text-success' : 'bg-warning/20 text-warning' }}">
                                        {{ $classes->curriculum->is_active ? __('global.active') : __('global.inactive') }}
                                    </span>
                                </div>
                                
                                <div class="space-y-3 text-sm text-slate-600">
                                    <div class="flex items-center">
                                        <x-base.lucide icon="Award" class="w-4 h-4 me-2" />
                                        {{ $classes->curriculum->grade_level ?? 'Not specified' }}
                                    </div>
                                    <div class="flex items-center">
                                        <x-base.lucide icon="Book" class="w-4 h-4 me-2" />
                                        {{ $classes->curriculum->subject_area ?? 'Not specified' }}
                                    </div>
                                    <div class="flex items-center">
                                        <x-base.lucide icon="Calendar" class="w-4 h-4 me-2" />
                                        {{ $classes->curriculum->duration_weeks ?? 'N/A' }} {{ __('global.weeks') }}
                                    </div>
                                </div>
                                
                                @if($classes->curriculum->description)
                                    <div class="mt-4 pt-4 border-t">
                                        <p class="text-slate-700">{{ $classes->curriculum->description }}</p>
                                    </div>
                                @endif
                                
                                <div class="mt-4 pt-4 border-t">
                                    <div class="grid grid-cols-3 gap-2">
                                        <div class="text-center p-2 bg-blue-50 rounded">
                                            <div class="text-lg font-bold text-blue-600">{{ $classes->curriculum->activities()->count() }}</div>
                                            <div class="text-xs text-slate-500">{{ __('global.activities') }}</div>
                                        </div>
                                        <div class="text-center p-2 bg-green-50 rounded">
                                            <div class="text-lg font-bold text-green-600">{{ $classes->curriculum->classes()->count() }}</div>
                                            <div class="text-xs text-slate-500">{{ __('global.classes') }}</div>
                                        </div>
                                        <div class="text-center p-2 bg-purple-50 rounded">
                                            <div class="text-lg font-bold text-purple-600">
                                                {{ $classes->curriculum->topics ? count($classes->curriculum->topics) : 0 }}
                                            </div>
                                            <div class="text-xs text-slate-500">{{ __('global.topics') }}</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-4">
                                    <a href="{{ route('curricula.show', $classes->curriculum->id) }}" class="text-primary hover:underline">
                                        {{ __('global.view_curriculum_details') }}
                                        <x-base.lucide icon="ArrowRight" class="w-4 h-4 inline ms-1" />
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="text-center py-8">
                                <x-base.lucide icon="BookOpen" class="w-16 h-16 mx-auto mb-4 text-slate-300" />
                                <h3 class="text-lg font-medium text-slate-500">{{ __('global.no_curriculum_assigned') }}</h3>
                                <p class="text-slate-400 mt-2">{{ __('global.assign_curriculum_to_view_details') }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Attendance Tab -->
        <div id="attendance" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12 lg:col-span-4">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4">{{ __('global.attendance_summary') }}</div>
                        <div class="space-y-4">
                            <div class="text-center p-4 bg-success/10 rounded-lg">
                                <div class="text-3xl font-bold text-success">
                                    {{ $classes->attendances()->where('status', 'present')->count() }}
                                </div>
                                <div class="text-sm text-slate-600">{{ __('global.total_present') }}</div>
                            </div>
                            <div class="text-center p-4 bg-danger/10 rounded-lg">
                                <div class="text-3xl font-bold text-danger">
                                    {{ $classes->attendances()->where('status', 'absent')->count() }}
                                </div>
                                <div class="text-sm text-slate-600">{{ __('global.total_absent') }}</div>
                            </div>
                            <div class="text-center p-4 bg-warning/10 rounded-lg">
                                <div class="text-3xl font-bold text-warning">
                                    {{ $classes->attendances()->where('status', 'late')->count() }}
                                </div>
                                <div class="text-sm text-slate-600">{{ __('global.total_late') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-8">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center justify-between">
                            <span>{{ __('global.recent_attendance') }}</span>
                            <span class="text-sm text-slate-500">{{ $classes->attendances()->count() }} {{ __('global.records') }}</span>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-left">{{ __('global.student') }}</th>
                                        <th class="text-left">{{ __('global.date') }}</th>
                                        <th class="text-left">{{ __('global.status') }}</th>
                                        <th class="text-left">{{ __('global.check_in') }}</th>
                                        <th class="text-left">{{ __('global.notes') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($classes->attendances()->latest()->take(10)->get() as $attendance)
                                        <tr>
                                            <td class="py-2">
                                                <div class="flex items-center">
                                                    <div class="w-6 h-6 rounded-full bg-primary/10 flex items-center justify-center me-2">
                                                        <span class="text-primary text-xs font-bold">{{ strtoupper(substr($attendance->child->name, 0, 1)) }}</span>
                                                    </div>
                                                    {{ $attendance->child->name }}
                                                </div>
                                            </td>
                                            <td>{{ $attendance->date->format('M d, Y') }}</td>
                                            <td>
                                                <span class="px-2 py-1 rounded text-xs font-medium 
                                                    {{ $attendance->status === 'present' ? 'bg-success/20 text-success' : ($attendance->status === 'absent' ? 'bg-danger/20 text-danger' : 'bg-warning/20 text-warning') }}">
                                                    {{ ucfirst($attendance->status) }}
                                                </span>
                                            </td>
                                            <td>{{ $attendance->check_in ? $attendance->check_in->format('H:i') : '--' }}</td>
                                            <td class="text-sm text-slate-600 max-w-xs truncate">{{ $attendance->notes ?? '--' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-8 text-slate-500">
                                                <x-base.lucide icon="CheckCircle" class="w-12 h-12 mx-auto mb-3 opacity-50" />
                                                <p>{{ __('global.no_attendance_records') }}</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
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
