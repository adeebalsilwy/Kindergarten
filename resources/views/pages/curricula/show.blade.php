@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Curriculum.show') }} - {{ $curriculum->name }}</title>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/pages/curricula.css') }}">
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
            <x-base.lucide icon="Book" class="w-5 h-5 inline me-2" />
            {{ __('global.curriculum_profile') }} - {{ $curriculum->name }}
        </h2>
        <div class="ms-auto flex gap-2">
            <x-base.button variant="secondary" as="a" href="{{ route('curricula.index') }}">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" />
                {{ __('global.back') }}
            </x-base.button>
            @can('edit_curricula')
            <x-base.button variant="primary" as="a" href="{{ route('curricula.edit', $curriculum->id) }}">
                <x-base.lucide icon="Pencil" class="w-4 h-4 me-2" />
                {{ __('global.edit') }}
            </x-base.button>
            @endcan
        </div>
    </div>

    <!-- Tab Navigation -->
    <div class="intro-y mt-5">
        <div class="border-b border-slate-200">
            <nav class="flex space-x-2 overflow-x-auto curriculum-tabs">
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg active" data-tab="overview">
                    <x-base.lucide icon="Layout" class="w-4 h-4 me-2" />
                    {{ __('global.overview') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="details">
                    <x-base.lucide icon="Info" class="w-4 h-4 me-2" />
                    {{ __('global.curriculum_details') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="learning">
                    <x-base.lucide icon="Award" class="w-4 h-4 me-2" />
                    {{ __('global.learning_outcomes') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="materials">
                    <x-base.lucide icon="Clipboard" class="w-4 h-4 me-2" />
                    {{ __('global.materials_assessment') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="activities">
                    <x-base.lucide icon="Calendar" class="w-4 h-4 me-2" />
                    {{ __('global.activities') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="classes">
                    <x-base.lucide icon="Home" class="w-4 h-4 me-2" />
                    {{ __('global.assigned_classes') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="teacher">
                    <x-base.lucide icon="UserCheck" class="w-4 h-4 me-2" />
                    {{ __('global.assigned_teacher') }}
                </button>
            </nav>
        </div>
    </div>

    <!-- Tab Content -->
    <div class="mt-5">
        <!-- Overview Tab -->
        <div id="overview" class="tab-content active">
            <div class="grid grid-cols-12 gap-6">
                <!-- Curriculum Info Card -->
                <div class="intro-y col-span-12 lg:col-span-4">
                    <div class="box p-5 info-card curriculum-card">
                        <div class="flex items-start justify-between">
                            <div>
                                <div class="text-xl font-bold">{{ $curriculum->name }}</div>
                                <div class="text-slate-500 text-sm mt-1">{{ $curriculum->subject_area ?? 'General' }}</div>
                                <div class="text-slate-500 text-sm mt-1">
                                    {{ $curriculum->grade_level ?? 'Not specified' }}
                                </div>
                            </div>
                            <div class="ms-auto">
                                <span class="px-3 py-1 rounded-full text-sm font-medium 
                                    {{ $curriculum->is_active ? 'bg-success/20 text-success' : 'bg-warning/20 text-warning' }}">
                                    {{ $curriculum->is_active ? __('global.active') : __('global.inactive') }}
                                </span>
                            </div>
                        </div>
                        
                        <div class="mt-4 space-y-3">
                            <div class="flex items-center text-sm">
                                <x-base.lucide icon="Book" class="w-4 h-4 me-2 text-slate-500" />
                                <span>{{ $curriculum->curriculum_type ?? 'General' }}</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <x-base.lucide icon="Calendar" class="w-4 h-4 me-2 text-slate-500" />
                                <span>{{ $curriculum->duration_weeks ?? 'N/A' }} {{ __('global.weeks') }}</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <x-base.lucide icon="Users" class="w-4 h-4 me-2 text-slate-500" />
                                <span>{{ $curriculum->activity_count }} {{ __('global.activities') }}</span>
                            </div>
                        </div>
                        
                        <div class="mt-5">
                            <div class="text-sm text-slate-500 mb-2">{{ __('global.completion_status') }}</div>
                            @php
                                $completionRate = $curriculum->classes()->count() > 0 ? min(100, ($curriculum->classes()->whereHas('activities')->count() / $curriculum->classes()->count()) * 100) : 0;
                            @endphp
                            <x-base.progress.bar :value="$completionRate" class="h-2" />
                            <div class="text-xs text-end mt-1">{{ number_format($completionRate, 1) }}%</div>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="box p-5 mt-5 curriculum-card">
                        <div class="text-base font-medium mb-4">{{ __('global.curriculum_statistics') }}</div>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="text-center p-2 bg-blue-50 rounded">
                                <div class="text-lg font-bold text-blue-600">{{ $curriculum->activity_count }}</div>
                                <div class="text-xs text-slate-500">{{ __('global.activities') }}</div>
                            </div>
                            <div class="text-center p-2 bg-green-50 rounded">
                                <div class="text-lg font-bold text-green-600">{{ $curriculum->classes()->count() }}</div>
                                <div class="text-xs text-slate-500">{{ __('global.assigned_classes') }}</div>
                            </div>
                            <div class="text-center p-2 bg-purple-50 rounded">
                                <div class="text-lg font-bold text-purple-600">{{ $curriculum->created_at->format('Y') }}</div>
                                <div class="text-xs text-slate-500">{{ __('global.year_created') }}</div>
                            </div>
                            <div class="text-center p-2 bg-yellow-50 rounded">
                                <div class="text-lg font-bold text-yellow-600">{{ $curriculum->duration_weeks ?? 'N/A' }}</div>
                                <div class="text-xs text-slate-500">{{ __('global.weeks') }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Curriculum Description -->
                <div class="intro-y col-span-12 lg:col-span-8">
                    <div class="box p-5 curriculum-card">
                        <div class="text-lg font-medium mb-4">{{ __('global.description') }}</div>
                        <div class="text-slate-700">
                            @if($curriculum->description)
                                <p>{{ $curriculum->description }}</p>
                            @else
                                <p class="text-slate-500 italic">{{ __('global.no_description_provided') }}</p>
                            @endif
                        </div>
                        
                        @if($curriculum->learning_outcomes)
                            <div class="mt-5">
                                <div class="text-lg font-medium mb-4">{{ __('global.learning_outcomes') }}</div>
                                <ul class="list-disc ps-5 text-slate-700">
                                    @foreach($curriculum->learning_outcomes as $outcome)
                                        <li>{{ $outcome }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        @if($curriculum->objectives)
                            <div class="mt-5">
                                <div class="text-lg font-medium mb-4">{{ __('global.objectives') }}</div>
                                <ul class="list-disc ps-5 text-slate-700">
                                    @foreach($curriculum->objectives as $objective)
                                        <li>{{ $objective }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Curriculum Details Tab -->
        <div id="details" class="tab-content">
            <div class="grid grid-cols-12 gap-6 curriculum-detail-section">
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5 curriculum-card">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="Info" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.basic_information') }}
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.name') }}:</span>
                                <span class="font-medium">{{ $curriculum->name }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.code') }}:</span>
                                <span class="font-medium">{{ $curriculum->code ?? __('global.not_specified') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.description') }}:</span>
                                <span class="font-medium text-right max-w-xs">{{ $curriculum->description ?? __('global.not_provided') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.subject_area') }}:</span>
                                <span class="font-medium">{{ $curriculum->subject_area ?? __('global.not_specified') }}</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500">{{ __('global.status') }}:</span>
                                <span class="font-medium px-2 py-1 rounded text-sm 
                                    {{ $curriculum->is_active ? 'bg-success/20 text-success' : 'bg-warning/20 text-warning' }}">
                                    {{ $curriculum->is_active ? __('global.active') : __('global.inactive') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5 curriculum-card">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="Book" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.curriculum_info') }}
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.grade_level') }}:</span>
                                <span class="font-medium">{{ $curriculum->grade_level ?? __('global.not_specified') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.curriculum_type') }}:</span>
                                <span class="font-medium">{{ $curriculum->curriculum_type ?? __('global.not_specified') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.duration_weeks') }}:</span>
                                <span class="font-medium">{{ $curriculum->duration_weeks ?? 'N/A' }} {{ __('global.weeks') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.published_at') }}:</span>
                                <span class="font-medium">{{ $curriculum->published_at ? $curriculum->published_at->format('F j, Y') : __('global.not_published') }}</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500">{{ __('global.created_by') }}:</span>
                                <span class="font-medium">{{ $curriculum->teacher->name ?? 'N/A' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="grid grid-cols-12 gap-6 curriculum-detail-section">
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5 curriculum-card">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="Award" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.learning_info') }}
                        </div>
                        <div class="space-y-4">
                            @if($curriculum->objectives)
                                <div class="py-2 border-b">
                                    <span class="text-slate-500">{{ __('global.objectives') }}:</span>
                                    <ul class="list-disc ps-5 mt-1">
                                        @foreach($curriculum->objectives as $objective)
                                            <li class="font-medium">{{ $objective }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if($curriculum->learning_outcomes)
                                <div class="py-2 border-b">
                                    <span class="text-slate-500">{{ __('global.learning_outcomes') }}:</span>
                                    <ul class="list-disc ps-5 mt-1">
                                        @foreach($curriculum->learning_outcomes as $outcome)
                                            <li class="font-medium">{{ $outcome }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if($curriculum->learning_objectives)
                                <div class="py-2">
                                    <span class="text-slate-500">{{ __('global.learning_objectives') }}:</span>
                                    <ul class="list-disc ps-5 mt-1">
                                        @foreach($curriculum->learning_objectives as $objective)
                                            <li class="font-medium">{{ $objective }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5 curriculum-card">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="Settings" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.administrative_info') }}
                        </div>
                        <div class="space-y-4">
                            @if($curriculum->topics)
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-slate-500">{{ __('global.topics') }}:</span>
                                    <div class="text-right">
                                        <ul class="list-disc ps-5 text-right">
                                            @foreach($curriculum->topics as $topic)
                                                <li class="font-medium">{{ $topic }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                            @if($curriculum->materials_needed)
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-slate-500">{{ __('global.materials_needed') }}:</span>
                                    <div class="text-right">
                                        <ul class="list-disc ps-5 text-right">
                                            @foreach($curriculum->materials_needed as $material)
                                                <li class="font-medium">{{ $material }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                            @if($curriculum->assessment_methods)
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-slate-500">{{ __('global.assessment_methods') }}:</span>
                                    <div class="text-right">
                                        <ul class="list-disc ps-5 text-right">
                                            @foreach($curriculum->assessment_methods as $method)
                                                <li class="font-medium">{{ $method }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                            @if($curriculum->prerequisites)
                                <div class="flex justify-between py-2">
                                    <span class="text-slate-500">{{ __('global.prerequisites') }}:</span>
                                    <div class="text-right">
                                        <ul class="list-disc ps-5 text-right">
                                            @foreach($curriculum->prerequisites as $prereq)
                                                <li class="font-medium">{{ $prereq }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Learning Outcomes Tab -->
        <div id="learning" class="tab-content">
            <div class="grid grid-cols-12 gap-6 curriculum-detail-section">
                <div class="intro-y col-span-12">
                    <div class="box p-5 curriculum-card">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="Award" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.detailed_learning_outcomes') }}
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @if($curriculum->objectives)
                                <div class="border rounded-lg p-4">
                                    <h3 class="font-medium text-lg mb-3 text-primary">{{ __('global.objectives') }}</h3>
                                    <ul class="list-disc ps-5 space-y-2">
                                        @foreach($curriculum->objectives as $objective)
                                            <li class="text-slate-700">{{ $objective }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if($curriculum->learning_outcomes)
                                <div class="border rounded-lg p-4">
                                    <h3 class="font-medium text-lg mb-3 text-primary">{{ __('global.learning_outcomes') }}</h3>
                                    <ul class="list-disc ps-5 space-y-2">
                                        @foreach($curriculum->learning_outcomes as $outcome)
                                            <li class="text-slate-700">{{ $outcome }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if($curriculum->learning_objectives)
                                <div class="border rounded-lg p-4 col-span-full">
                                    <h3 class="font-medium text-lg mb-3 text-primary">{{ __('global.learning_objectives') }}</h3>
                                    <ul class="list-disc ps-5 space-y-2">
                                        @foreach($curriculum->learning_objectives as $objective)
                                            <li class="text-slate-700">{{ $objective }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Materials and Assessment Tab -->
        <div id="materials" class="tab-content">
            <div class="grid grid-cols-12 gap-6 curriculum-detail-section">
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5 curriculum-card">
                        <div class="text-lg font-medium mb-4 flex items-center justify-between">
                            <span>{{ __('global.materials_needed') }}</span>
                            <a href="{{ route('materials.index') }}" class="text-sm text-primary hover:underline">
                                <i data-lucide="Box"></i> Manage Materials
                            </a>
                        </div>
                        <!-- Legacy materials from array -->
                        @if($curriculum->materials_needed)
                            <div class="mb-6">
                                <h4 class="font-medium text-gray-700 mb-2">Legacy Materials:</h4>
                                <div class="grid grid-cols-1 gap-3">
                                    @foreach($curriculum->materials_needed as $material)
                                        <div class="flex items-center justify-between p-3 bg-slate-50 rounded-lg">
                                            <span class="font-medium">{{ $material }}</span>
                                            <span class="text-xs px-2 py-1 bg-primary/10 text-primary rounded-full">
                                                {{ __('global.material') }}
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        
                        <!-- Relationship materials -->
                        @if($curriculum->materials->count() > 0)
                            <div>
                                <h4 class="font-medium text-gray-700 mb-2">Connected Materials:</h4>
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach($curriculum->materials as $material)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $material->name }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 capitalize">{{ $material->type }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                                              {{ $material->status === 'available' ? 'bg-green-100 text-green-800' : 
                                                                 ($material->status === 'in-use' ? 'bg-yellow-100 text-yellow-800' : 
                                                                 ($material->status === 'maintenance' ? 'bg-orange-100 text-orange-800' : 
                                                                 'bg-red-100 text-red-800')) }}">
                                                            {{ ucfirst(str_replace('-', ' ', $material->status)) }}
                                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $material->quantity_formatted }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                        <a href="{{ route('materials.show', $material->id) }}" class="text-blue-600 hover:text-blue-900">View</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @else
                            <div class="text-center py-8 text-slate-500">
                                <x-base.lucide icon="Package" class="w-12 h-12 mx-auto mb-3 opacity-50" />
                                <p>No connected materials. <a href="{{ route('materials.index') }}" class="text-blue-600 hover:text-blue-900">Add materials</a>.</p>
                            </div>
                        @endif
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5 curriculum-card">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="CheckCircle" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.assessment_methods') }}
                        </div>
                        @if($curriculum->assessment_methods)
                            <div class="grid grid-cols-1 gap-3">
                                @foreach($curriculum->assessment_methods as $method)
                                    <div class="flex items-center justify-between p-3 bg-slate-50 rounded-lg">
                                        <span class="font-medium">{{ $method }}</span>
                                        <span class="text-xs px-2 py-1 bg-success/10 text-success rounded-full">
                                            {{ __('global.assessment') }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8 text-slate-500">
                                <x-base.lucide icon="CheckSquare" class="w-12 h-12 mx-auto mb-3 opacity-50" />
                                <p>{{ __('global.no_assessment_methods_specified') }}</p>
                            </div>
                        @endif
                    </div>
                </div>
                
                @if($curriculum->topics)
                <div class="intro-y col-span-12">
                    <div class="box p-5 curriculum-card">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="BookOpen" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.topics_covered') }}
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
                            @foreach($curriculum->topics as $topic)
                                <div class="flex items-center p-3 bg-slate-50 rounded-lg">
                                    <x-base.lucide icon="BookMarked" class="w-4 h-4 me-2 text-primary" />
                                    <span>{{ $topic }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- Activities Tab -->
        <div id="activities" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12">
                    <div class="box p-5 curriculum-card">
                        <div class="text-lg font-medium mb-4 flex items-center justify-between">
                            <span>{{ __('global.associated_activities') }}</span>
                            <span class="text-sm text-slate-500">{{ $curriculum->activities()->count() }} {{ __('global.activities') }}</span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @forelse($curriculum->activities as $activity)
                                <div class="border rounded-lg p-4 hover:shadow-md transition-shadow curriculum-card">
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
                                    <h3 class="text-lg font-medium text-slate-500">{{ __('global.no_activities_associated') }}</h3>
                                    <p class="text-slate-400 mt-2">{{ __('global.no_activities_found_for_this_curriculum') }}</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Classes Tab -->
        <div id="classes" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12">
                    <div class="box p-5 curriculum-card">
                        <div class="text-lg font-medium mb-4 flex items-center justify-between">
                            <span>{{ __('global.assigned_classes') }}</span>
                            <span class="text-sm text-slate-500">{{ $curriculum->classes()->count() }} {{ __('global.classes') }}</span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @forelse($curriculum->classes as $class)
                                <div class="border rounded-lg p-4 hover:shadow-md transition-shadow curriculum-card">
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
                                            <x-base.lucide icon="UserCheck" class="w-4 h-4 me-2" />
                                            {{ optional($class->teacher)->name ?? 'Not assigned' }}
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
                                    <p class="text-slate-400 mt-2">{{ __('global.no_classes_found_for_this_curriculum') }}</p>
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
                    <div class="box p-5 curriculum-card">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="UserCheck" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.assigned_teacher') }}
                        </div>
                        @if($curriculum->teacher)
                            <div class="flex items-start">
                                <div class="w-20 h-20 rounded-full overflow-hidden border-4 border-primary/20 me-4">
                                    @if($curriculum->teacher->photo_path)
                                        <img src="{{ asset('storage/'.$curriculum->teacher->photo_path) }}" class="w-full h-full object-cover" alt="{{ $curriculum->teacher->name }}">
                                    @else
                                        <div class="w-full h-full bg-primary/10 flex items-center justify-center text-primary font-bold text-xl">
                                            {{ strtoupper(substr($curriculum->teacher->name, 0, 2)) }}
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <div class="text-xl font-bold">{{ $curriculum->teacher->name }}</div>
                                    <div class="text-slate-500 text-sm mt-1">
                                        {{ $curriculum->teacher->specialization ?? 'Not specified' }}
                                    </div>
                                    <div class="text-slate-500 text-sm mt-1">
                                        {{ $curriculum->teacher->qualification ?? 'Not specified' }}
                                    </div>
                                    
                                    <div class="mt-4 space-y-2">
                                        <div class="flex items-center text-sm">
                                            <x-base.lucide icon="Phone" class="w-4 h-4 me-2 text-slate-500" />
                                            <span>{{ $curriculum->teacher->phone ?? __('global.not_provided') }}</span>
                                        </div>
                                        <div class="flex items-center text-sm">
                                            <x-base.lucide icon="Mail" class="w-4 h-4 me-2 text-slate-500" />
                                            <span>{{ $curriculum->teacher->email ?? __('global.not_provided') }}</span>
                                        </div>
                                        <div class="flex items-center text-sm">
                                            <x-base.lucide icon="Briefcase" class="w-4 h-4 me-2 text-slate-500" />
                                            <span>{{ $curriculum->teacher->experience_years ?? 0 }} {{ __('global.years_experience') }}</span>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4 pt-4 border-t">
                                        <div class="grid grid-cols-3 gap-2">
                                            <div class="text-center p-2 bg-blue-50 rounded">
                                                <div class="text-lg font-bold text-blue-600">{{ $curriculum->teacher->classes()->count() }}</div>
                                                <div class="text-xs text-slate-500">{{ __('global.classes') }}</div>
                                            </div>
                                            <div class="text-center p-2 bg-green-50 rounded">
                                                <div class="text-lg font-bold text-green-600">{{ $curriculum->teacher->activities()->count() }}</div>
                                                <div class="text-xs text-slate-500">{{ __('global.activities') }}</div>
                                            </div>
                                            <div class="text-center p-2 bg-purple-50 rounded">
                                                <div class="text-lg font-bold text-purple-600">{{ $curriculum->teacher->getClassChildrenCountAttribute() }}</div>
                                                <div class="text-xs text-slate-500">{{ __('global.students') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4">
                                        <a href="{{ route('teachers.show', $curriculum->teacher->id) }}" class="text-primary hover:underline">
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