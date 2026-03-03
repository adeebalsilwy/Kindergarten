@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Activity.show') }} - {{ $activity->title }}</title>
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
            {{ __('global.activity_profile') }} - {{ $activity->title }}
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
                    {{ __('global.activity_details') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="class">
                    <x-base.lucide icon="Home" class="w-4 h-4 me-2" />
                    {{ __('global.class_info') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="teacher">
                    <x-base.lucide icon="UserCheck" class="w-4 h-4 me-2" />
                    {{ __('global.teacher_info') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="curriculum">
                    <x-base.lucide icon="Book" class="w-4 h-4 me-2" />
                    {{ __('global.curriculum_info') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="participants">
                    <x-base.lucide icon="Users" class="w-4 h-4 me-2" />
                    {{ __('global.participants') }}
                </button>
            </nav>
        </div>
    </div>

    <!-- Tab Content -->
    <div class="mt-5">
        <!-- Overview Tab -->
        <div id="overview" class="tab-content active">
            <div class="grid grid-cols-12 gap-6">
                <!-- Activity Info Card -->
                <div class="intro-y col-span-12 lg:col-span-4">
                    <div class="box p-5 info-card">
                        <div class="flex items-start justify-between">
                            <div>
                                <div class="text-xl font-bold">{{ $activity->title }}</div>
                                <div class="text-slate-500 text-sm mt-1">{{ $activity->activity_type ?? 'General' }}</div>
                                <div class="text-slate-500 text-sm mt-1">
                                    {{ $activity->scheduled_date ? $activity->scheduled_date->format('M d, Y') : 'Not scheduled' }}
                                </div>
                            </div>
                            <div class="ms-auto">
                                <span class="px-3 py-1 rounded-full text-sm font-medium
                                    {{ $activity->is_active ? 'bg-success/20 text-success' : 'bg-warning/20 text-warning' }}">
                                    {{ $activity->is_active ? __('global.active') : __('global.inactive') }}
                                </span>
                            </div>
                        </div>

                        <div class="mt-4 space-y-3">
                            <div class="flex items-center text-sm">
                                <x-base.lucide icon="Clock" class="w-4 h-4 me-2 text-slate-500" />
                                <span>{{ $activity->start_time ? $activity->start_time->format('H:i') : 'N/A' }} - {{ $activity->end_time ? $activity->end_time->format('H:i') : 'N/A' }}</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <x-base.lucide icon="MapPin" class="w-4 h-4 me-2 text-slate-500" />
                                <span>{{ $activity->location ?? 'Not specified' }}</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <x-base.lucide icon="Users" class="w-4 h-4 me-2 text-slate-500" />
                                <span>{{ $activity->participant_count ?? 0 }}/{{ $activity->max_participants ?? '∞' }} {{ __('global.participants') }}</span>
                            </div>
                        </div>

                        <div class="mt-5">
                            <div class="text-sm text-slate-500 mb-2">{{ __('global.participation_rate') }}</div>
                            @php
                                $participationRate = $activity->max_participants ? min(100, ($activity->participant_count / $activity->max_participants) * 100) : 0;
                            @endphp
                            <x-base.progress.bar :value="$participationRate" class="h-2" />
                            <div class="text-xs text-end mt-1">{{ number_format($participationRate, 1) }}%</div>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="box p-5 mt-5">
                        <div class="text-base font-medium mb-4">{{ __('global.activity_statistics') }}</div>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="text-center p-2 bg-blue-50 rounded">
                                <div class="text-lg font-bold text-blue-600">{{ $activity->class->name ?? 'N/A' }}</div>
                                <div class="text-xs text-slate-500">{{ __('global.class') }}</div>
                            </div>
                            <div class="text-center p-2 bg-green-50 rounded">
                                <div class="text-lg font-bold text-green-600">{{ $activity->teacher->name ?? 'N/A' }}</div>
                                <div class="text-xs text-slate-500">{{ __('global.teacher') }}</div>
                            </div>
                            <div class="text-center p-2 bg-purple-50 rounded">
                                <div class="text-lg font-bold text-purple-600">{{ (int) $activity->participant_count }}</div>
                                <div class="text-xs text-slate-500">{{ __('global.participants') }}</div>
                            </div>
                            <div class="text-center p-2 bg-yellow-50 rounded">
                                <div class="text-lg font-bold text-yellow-600">{{ $activity->difficulty_level ?? 'N/A' }}</div>
                                <div class="text-xs text-slate-500">{{ __('global.difficulty') }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Activity Description -->
                <div class="intro-y col-span-12 lg:col-span-8">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4">{{ __('global.description') }}</div>
                        <div class="text-slate-700">
                            @if($activity->description)
                                <p>{{ is_array($activity->description) ? implode('\n', $activity->description) : $activity->description }}</p>
                            @else
                                <p class="text-slate-500 italic">{{ __('global.no_description_provided') }}</p>
                            @endif
                        </div>

                        @if($activity->instructions)
                            <div class="mt-5">
                                <div class="text-lg font-medium mb-4">{{ __('global.instructions') }}</div>
                                <div class="text-slate-700">
                                    <p>{{ is_array($activity->instructions) ? implode('\n', $activity->instructions) : $activity->instructions }}</p>
                                </div>
                            </div>
                        @endif

                        @if(is_array($activity->learning_objectives) && count($activity->learning_objectives) > 0)
                            <div class="mt-5">
                                <div class="text-lg font-medium mb-4">{{ __('global.learning_objectives') }}</div>
                                <ul class="list-disc ps-5 text-slate-700">
                                    @foreach($activity->learning_objectives as $objective)
                                        <li>{{ $objective }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
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
                                <span class="font-medium">{{ $activity->title }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.description') }}:</span>
                                <span class="font-medium text-right max-w-xs">{{ $activity->description ?? __('global.not_provided') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.activity_type') }}:</span>
                                <span class="font-medium">{{ $activity->activity_type ?? __('global.not_specified') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.difficulty_level') }}:</span>
                                <span class="font-medium">{{ $activity->difficulty_level ?? __('global.not_specified') }}</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500">{{ __('global.status') }}:</span>
                                <span class="font-medium px-2 py-1 rounded text-sm
                                    {{ $activity->is_active ? 'bg-success/20 text-success' : 'bg-warning/20 text-warning' }}">
                                    {{ $activity->is_active ? __('global.active') : __('global.inactive') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="Calendar" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.scheduling_info') }}
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.scheduled_date') }}:</span>
                                <span class="font-medium">{{ $activity->scheduled_date ? $activity->scheduled_date->format('F j, Y') : __('global.not_specified') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.start_time') }}:</span>
                                <span class="font-medium">{{ $activity->start_time ? $activity->start_time->format('H:i') : __('global.not_specified') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.end_time') }}:</span>
                                <span class="font-medium">{{ $activity->end_time ? $activity->end_time->format('H:i') : __('global.not_specified') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.estimated_duration') }}:</span>
                                <span class="font-medium">{{ $activity->estimated_duration ?? __('global.not_specified') }} {{ __('global.minutes') }}</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500">{{ __('global.location') }}:</span>
                                <span class="font-medium">{{ $activity->location ?? __('global.not_specified') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-12 gap-6 mt-6">
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="Book" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.learning_info') }}
                        </div>
                        <div class="space-y-4">
                            @if(is_array($activity->learning_objectives) && count($activity->learning_objectives) > 0)
                                <div class="py-2 border-b">
                                    <span class="text-slate-500">{{ __('global.learning_objectives') }}:</span>
                                    <ul class="list-disc ps-5 mt-1">
                                        @foreach($activity->learning_objectives as $objective)
                                            <li class="font-medium">{{ $objective }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(is_array($activity->outcomes) && count($activity->outcomes) > 0)
                                <div class="py-2 border-b">
                                    <span class="text-slate-500">{{ __('global.outcomes') }}:</span>
                                    <ul class="list-disc ps-5 mt-1">
                                        @foreach($activity->outcomes as $outcome)
                                            <li class="font-medium">{{ $outcome }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(is_array($activity->required_materials) && count($activity->required_materials) > 0)
                                <div class="py-2 border-b">
                                    <span class="text-slate-500">{{ __('global.required_materials') }}:</span>
                                    <ul class="list-disc ps-5 mt-1">
                                        @foreach($activity->required_materials as $material)
                                            <li class="font-medium">{{ $material }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(is_array($activity->assessment_criteria) && count($activity->assessment_criteria) > 0)
                                <div class="py-2">
                                    <span class="text-slate-500">{{ __('global.assessment_criteria') }}:</span>
                                    <ul class="list-disc ps-5 mt-1">
                                        @foreach($activity->assessment_criteria as $criteria)
                                            <li class="font-medium">{{ $criteria }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
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
                                <span class="text-slate-500">{{ __('global.max_participants') }}:</span>
                                <span class="font-medium">{{ $activity->max_participants ?? '∞' }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.current_participants') }}:</span>
                                <span class="font-medium">{{ $activity->participant_count }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.category') }}:</span>
                                <span class="font-medium">{{ is_array($activity->category) ? implode(', ', $activity->category) : ($activity->category ?? __('global.not_specified')) }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.materials_needed') }}:</span>
                                <span class="font-medium">{{ is_array($activity->materials_needed) ? implode(', ', $activity->materials_needed) : ($activity->materials_needed ?? __('global.not_specified')) }}</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500">{{ __('global.status') }}:</span>
                                <span class="font-medium">{{ is_array($activity->status) ? implode(', ', $activity->status) : ($activity->status ?? __('global.not_specified')) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Class Info Tab -->
        <div id="class" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="Home" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.associated_class') }}
                        </div>
                        @if($activity->class)
                            <div class="border rounded-lg p-5">
                                <div class="flex items-start justify-between mb-4">
                                    <div>
                                        <h3 class="text-xl font-bold">{{ $activity->class->name }}</h3>
                                        <div class="text-slate-500 text-sm mt-1">{{ $activity->class->code ?? 'No code' }}</div>
                                    </div>
                                    <span class="px-3 py-1 rounded-full text-sm font-medium
                                        {{ $activity->class->is_active ? 'bg-success/20 text-success' : 'bg-warning/20 text-warning' }}">
                                        {{ $activity->class->is_active ? __('global.active') : __('global.inactive') }}
                                    </span>
                                </div>

                                <div class="space-y-4">
                                    <div class="flex justify-between py-2 border-b">
                                        <span class="text-slate-500">{{ __('global.description') }}:</span>
                                        <span class="font-medium">{{ $activity->class->description ?? __('global.not_provided') }}</span>
                                    </div>
                                    <div class="flex justify-between py-2 border-b">
                                        <span class="text-slate-500">{{ __('global.age_group') }}:</span>
                                        <span class="font-medium">{{ $activity->class->age_group ?? __('global.not_specified') }}</span>
                                    </div>
                                    <div class="flex justify-between py-2 border-b">
                                        <span class="text-slate-500">{{ __('global.capacity') }}:</span>
                                        <span class="font-medium">{{ $activity->class->capacity ?? '∞' }}</span>
                                    </div>
                                    <div class="flex justify-between py-2 border-b">
                                        <span class="text-slate-500">{{ __('global.current_students') }}:</span>
                                        <span class="font-medium">{{ $activity->class->current_students ?? 0 }}</span>
                                    </div>
                                    <div class="flex justify-between py-2">
                                        <span class="text-slate-500">{{ __('global.monthly_fee') }}:</span>
                                        <span class="font-medium">{{ number_format($activity->class->monthly_fee ?? 0, 2) }}</span>
                                    </div>
                                </div>

                                @if($activity->class->description)
                                    <div class="mt-4 pt-4 border-t">
                                        <p class="text-slate-700">{{ $activity->class->description }}</p>
                                    </div>
                                @endif

                                <div class="mt-4 pt-4 border-t">
                                    <a href="{{ route('classes.show', $activity->class->id) }}" class="text-primary hover:underline">
                                        {{ __('global.view_class_details') }}
                                        <x-base.lucide icon="ArrowRight" class="w-4 h-4 inline ms-1" />
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="text-center py-8">
                                <x-base.lucide icon="Home" class="w-16 h-16 mx-auto mb-4 text-slate-300" />
                                <h3 class="text-lg font-medium text-slate-500">{{ __('global.no_class_associated') }}</h3>
                                <p class="text-slate-400 mt-2">{{ __('global.this_activity_is_not_associated_with_any_class') }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Teacher Info Tab -->
        <div id="teacher" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="UserCheck" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.assigned_teacher') }}
                        </div>
                        @if($activity->teacher)
                            <div class="flex items-start">
                                <div class="w-20 h-20 rounded-full overflow-hidden border-4 border-primary/20 me-4">
                                    @if($activity->teacher->photo_path)
                                        <img src="{{ asset('storage/'.$activity->teacher->photo_path) }}" class="w-full h-full object-cover" alt="{{ $activity->teacher->name }}">
                                    @else
                                        <div class="w-full h-full bg-primary/10 flex items-center justify-center text-primary font-bold text-xl">
                                            {{ strtoupper(substr($activity->teacher->name, 0, 2)) }}
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <div class="text-xl font-bold">{{ $activity->teacher->name }}</div>
                                    <div class="text-slate-500 text-sm mt-1">
                                        {{ $activity->teacher->specialization ?? 'Not specified' }}
                                    </div>
                                    <div class="text-slate-500 text-sm mt-1">
                                        {{ $activity->teacher->qualification ?? 'Not specified' }}
                                    </div>

                                    <div class="mt-4 space-y-2">
                                        <div class="flex items-center text-sm">
                                            <x-base.lucide icon="Phone" class="w-4 h-4 me-2 text-slate-500" />
                                            <span>{{ $activity->teacher->phone ?? __('global.not_provided') }}</span>
                                        </div>
                                        <div class="flex items-center text-sm">
                                            <x-base.lucide icon="Mail" class="w-4 h-4 me-2 text-slate-500" />
                                            <span>{{ $activity->teacher->email ?? __('global.not_provided') }}</span>
                                        </div>
                                        <div class="flex items-center text-sm">
                                            <x-base.lucide icon="Briefcase" class="w-4 h-4 me-2 text-slate-500" />
                                            <span>{{ $activity->teacher->experience_years ?? 0 }} {{ __('global.years_experience') }}</span>
                                        </div>
                                    </div>

                                    <div class="mt-4 pt-4 border-t">
                                        <div class="grid grid-cols-3 gap-2">
                                            <div class="text-center p-2 bg-blue-50 rounded">
                                                <div class="text-lg font-bold text-blue-600">{{ $activity->teacher->classes()->count() }}</div>
                                                <div class="text-xs text-slate-500">{{ __('global.classes') }}</div>
                                            </div>
                                            <div class="text-center p-2 bg-green-50 rounded">
                                                <div class="text-lg font-bold text-green-600">{{ $activity->teacher->activities()->count() }}</div>
                                                <div class="text-xs text-slate-500">{{ __('global.activities') }}</div>
                                            </div>
                                            <div class="text-center p-2 bg-purple-50 rounded">
                                                <div class="text-lg font-bold text-purple-600">{{ $activity->teacher->getClassChildrenCountAttribute() }}</div>
                                                <div class="text-xs text-slate-500">{{ __('global.students') }}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <a href="{{ route('teachers.show', $activity->teacher->id) }}" class="text-primary hover:underline">
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

        <!-- Curriculum Info Tab -->
        <div id="curriculum" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="Book" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.associated_curriculum') }}
                        </div>
                        @if($activity->curriculum)
                            <div class="border rounded-lg p-5">
                                <div class="flex items-start justify-between mb-4">
                                    <div>
                                        <h3 class="text-xl font-bold">{{ $activity->curriculum->name }}</h3>
                                        <div class="text-slate-500 text-sm mt-1">{{ $activity->curriculum->subject_area ?? 'General' }}</div>
                                    </div>
                                </div>

                                <div class="space-y-4">
                                    <div class="flex justify-between py-2 border-b">
                                        <span class="text-slate-500">{{ __('global.code') }}:</span>
                                        <span class="font-medium">{{ $activity->curriculum->code ?? 'Not specified' }}</span>
                                    </div>
                                    <div class="flex justify-between py-2 border-b">
                                        <span class="text-slate-500">{{ __('global.grade_level') }}:</span>
                                        <span class="font-medium">{{ $activity->curriculum->grade_level ?? 'Not specified' }}</span>
                                    </div>
                                    <div class="flex justify-between py-2 border-b">
                                        <span class="text-slate-500">{{ __('global.duration_weeks') }}:</span>
                                        <span class="font-medium">{{ $activity->curriculum->duration_weeks ?? 'N/A' }} {{ __('global.weeks') }}</span>
                                    </div>
                                    <div class="flex justify-between py-2">
                                        <span class="text-slate-500">{{ __('global.status') }}:</span>
                                        <span class="font-medium px-2 py-1 rounded text-sm
                                            {{ $activity->curriculum->is_active ? 'bg-success/20 text-success' : 'bg-warning/20 text-warning' }}">
                                            {{ $activity->curriculum->is_active ? __('global.active') : __('global.inactive') }}
                                        </span>
                                    </div>
                                </div>

                                @if($activity->curriculum->description)
                                    <div class="mt-4 pt-4 border-t">
                                        <p class="text-slate-700">{{ $activity->curriculum->description }}</p>
                                    </div>
                                @endif

                                <div class="mt-4 pt-4 border-t">
                                    <a href="{{ route('curricula.show', $activity->curriculum->id) }}" class="text-primary hover:underline">
                                        {{ __('global.view_curriculum_details') }}
                                        <x-base.lucide icon="ArrowRight" class="w-4 h-4 inline ms-1" />
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="text-center py-8">
                                <x-base.lucide icon="BookOpen" class="w-16 h-16 mx-auto mb-4 text-slate-300" />
                                <h3 class="text-lg font-medium text-slate-500">{{ __('global.no_curriculum_associated') }}</h3>
                                <p class="text-slate-400 mt-2">{{ __('global.this_activity_is_not_associated_with_any_curriculum') }}</p>
                            </div>
                        @endif
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
                            <span>{{ __('global.participating_children') }}</span>
                            <span class="text-sm text-slate-500">{{ $activity->children()->count() }} {{ __('global.children') }}</span>
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
                                    <h3 class="text-lg font-medium text-slate-500">{{ __('global.no_participants') }}</h3>
                                    <p class="text-slate-400 mt-2">{{ __('global.no_children_participating_in_this_activity') }}</p>
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
                button.addEventListener('click', function(e) {
                    e.preventDefault();
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
