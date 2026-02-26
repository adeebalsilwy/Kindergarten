@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Grade.show') }} - {{ $grade->subject }} Grade</title>
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
            <x-base.lucide icon="Award" class="w-5 h-5 inline me-2" />
            {{ __('global.grade_details') }} - {{ $grade->subject }}
        </h2>
        <div class="ms-auto flex gap-2">
            <x-base.button variant="secondary" as="a" href="{{ route('grades.index') }}">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" />
                {{ __('global.back') }}
            </x-base.button>
            @can('edit_grades')
            <x-base.button variant="primary" as="a" href="{{ route('grades.edit', $grade->id) }}">
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
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="student">
                    <x-base.lucide icon="User" class="w-4 h-4 me-2" />
                    {{ __('global.student_info') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="academic">
                    <x-base.lucide icon="Book" class="w-4 h-4 me-2" />
                    {{ __('global.academic_details') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="evaluation">
                    <x-base.lucide icon="Clipboard" class="w-4 h-4 me-2" />
                    {{ __('global.evaluation') }}
                </button>
            </nav>
        </div>
    </div>

    <!-- Tab Content -->
    <div class="mt-5">
        <!-- Overview Tab -->
        <div id="overview" class="tab-content active">
            <div class="grid grid-cols-12 gap-6">
                <!-- Grade Card -->
                <div class="intro-y col-span-12 lg:col-span-4">
                    <div class="box p-5 info-card">
                        <div class="text-center">
                            <div class="w-32 h-32 bg-gradient-to-br from-primary/20 to-secondary/20 flex items-center justify-center text-primary rounded-full text-5xl font-bold mx-auto mb-6">
                                {{ $grade->score }}
                            </div>
                            <div class="text-2xl font-bold mb-2">{{ $grade->subject }}</div>
                            <div class="text-slate-500 text-lg">
                                {{ __('global.grade') }}: 
                                <span class="px-3 py-1 rounded-full text-lg font-bold 
                                    {{ $grade->grade === 'A' ? 'bg-success/20 text-success' : ($grade->grade === 'B' ? 'bg-blue/20 text-blue' : ($grade->grade === 'C' ? 'bg-warning/20 text-warning' : 'bg-danger/20 text-danger')) }}">
                                    {{ $grade->grade }}
                                </span>
                            </div>
                            
                            <div class="mt-6 pt-4 border-t">
                                <div class="grid grid-cols-2 gap-3">
                                    <div class="text-center p-3 bg-blue-50 rounded">
                                        <div class="text-xl font-bold text-blue-600">{{ $grade->child->grades()->count() }}</div>
                                        <div class="text-xs text-slate-500">{{ __('global.total_grades') }}</div>
                                    </div>
                                    <div class="text-center p-3 bg-green-50 rounded">
                                        <div class="text-xl font-bold text-green-600">
                                            {{ $grade->child->grades()->count() > 0 ? round($grade->child->grades()->avg('score'), 1) : 0 }}
                                        </div>
                                        <div class="text-xs text-slate-500">{{ __('global.average_score') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Grade Context -->
                <div class="intro-y col-span-12 lg:col-span-8">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12 md:col-span-6">
                            <div class="box p-5">
                                <div class="text-base font-medium mb-3 flex items-center">
                                    <x-base.lucide icon="User" class="w-5 h-5 me-2 text-primary" />
                                    {{ __('global.student') }}
                                </div>
                                <div class="flex items-center">
                                    <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center me-3">
                                        <span class="text-primary font-bold">{{ strtoupper(substr($grade->child->name, 0, 1)) }}</span>
                                    </div>
                                    <div>
                                        <div class="font-medium">{{ $grade->child->name }}</div>
                                        <div class="text-sm text-slate-500">
                                            {{ optional($grade->child->class)->name ?? 'Not assigned' }}
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 pt-3 border-t">
                                    <a href="{{ route('children.show', $grade->child->id) }}" class="text-primary hover:underline">
                                        {{ __('global.view_student_profile') }}
                                        <x-base.lucide icon="ArrowRight" class="w-4 h-4 inline ms-1" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-span-12 md:col-span-6">
                            <div class="box p-5">
                                <div class="text-base font-medium mb-3 flex items-center">
                                    <x-base.lucide icon="Calendar" class="w-5 h-5 me-2 text-primary" />
                                    {{ __('global.evaluation_info') }}
                                </div>
                                <div class="space-y-3">
                                    <div class="flex justify-between">
                                        <span class="text-slate-500">{{ __('global.date') }}:</span>
                                        <span class="font-medium">{{ $grade->date->format('M d, Y') }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-slate-500">{{ __('global.evaluator') }}:</span>
                                        <span class="font-medium">{{ $grade->evaluator ?? 'Not specified' }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-slate-500">{{ __('global.recorded_at') }}:</span>
                                        <span class="font-medium text-sm">{{ $grade->created_at->format('M d, Y H:i') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Student Information Tab -->
        <div id="student" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="User" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.student_profile') }}
                        </div>
                        <div class="flex items-start">
                            <div class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center me-4">
                                <span class="text-primary font-bold text-xl">{{ strtoupper(substr($grade->child->name, 0, 2)) }}</span>
                            </div>
                            <div class="flex-1">
                                <div class="text-xl font-bold">{{ $grade->child->name }}</div>
                                <div class="text-slate-500 text-sm mt-1">
                                    {{ $grade->child->age }} {{ __('global.years_old') }} • {{ ucfirst($grade->child->gender) }}
                                </div>
                                <div class="text-slate-500 text-sm mt-1">
                                    {{ $grade->child->nationality ?? 'Not specified' }}
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-5 space-y-3">
                            <div class="flex items-center text-sm">
                                <x-base.lucide icon="Home" class="w-4 h-4 me-2 text-slate-500" />
                                <span>{{ optional($grade->child->class)->name ?? 'Not assigned' }}</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <x-base.lucide icon="Cake" class="w-4 h-4 me-2 text-slate-500" />
                                <span>{{ $grade->child->dob->format('F j, Y') }}</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <x-base.lucide icon="Users" class="w-4 h-4 me-2 text-slate-500" />
                                <span>{{ optional($grade->child->parent)->name ?? 'No parent assigned' }}</span>
                            </div>
                        </div>
                        
                        <div class="mt-5 pt-4 border-t">
                            <a href="{{ route('children.show', $grade->child->id) }}" class="text-primary hover:underline">
                                {{ __('global.view_full_student_profile') }}
                                <x-base.lucide icon="ArrowRight" class="w-4 h-4 inline ms-1" />
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="BarChart2" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.academic_summary') }}
                        </div>
                        <div class="space-y-4">
                            <div class="text-center p-4 bg-blue-50 rounded-lg">
                                <div class="text-2xl font-bold text-blue-600">{{ $grade->child->grades()->count() }}</div>
                                <div class="text-sm text-slate-600">{{ __('global.total_grades_recorded') }}</div>
                            </div>
                            <div class="text-center p-4 bg-green-50 rounded-lg">
                                <div class="text-2xl font-bold text-green-600">
                                    {{ $grade->child->grades()->count() > 0 ? round($grade->child->grades()->avg('score'), 1) : 0 }}
                                </div>
                                <div class="text-sm text-slate-600">{{ __('global.average_score') }}</div>
                            </div>
                            <div class="text-center p-4 bg-purple-50 rounded-lg">
                                <div class="text-2xl font-bold text-purple-600">
                                    {{ $grade->child->grades()->where('grade', 'A')->count() }}
                                </div>
                                <div class="text-sm text-slate-600">{{ __('global.a_grades') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Academic Details Tab -->
        <div id="academic" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="Book" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.grade_information') }}
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.subject') }}:</span>
                                <span class="font-medium">{{ $grade->subject }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.score') }}:</span>
                                <span class="font-medium text-xl">{{ $grade->score }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.grade') }}:</span>
                                <span class="font-medium px-3 py-1 rounded text-sm 
                                    {{ $grade->grade === 'A' ? 'bg-success/20 text-success' : ($grade->grade === 'B' ? 'bg-blue/20 text-blue' : ($grade->grade === 'C' ? 'bg-warning/20 text-warning' : 'bg-danger/20 text-danger')) }}">
                                    {{ $grade->grade }}
                                </span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500">{{ __('global.date') }}:</span>
                                <span class="font-medium">{{ $grade->date->format('F j, Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="BookOpen" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.subject_performance') }}
                        </div>
                        <div class="space-y-4">
                            <div class="text-center p-4 bg-blue-50 rounded-lg">
                                <div class="text-2xl font-bold text-blue-600">
                                    {{ $grade->child->grades()->where('subject', $grade->subject)->count() }}
                                </div>
                                <div class="text-sm text-slate-600">{{ __('global.times_graded') }}</div>
                            </div>
                            <div class="text-center p-4 bg-green-50 rounded-lg">
                                <div class="text-2xl font-bold text-green-600">
                                    {{ $grade->child->grades()->where('subject', $grade->subject)->count() > 0 ? round($grade->child->grades()->where('subject', $grade->subject)->avg('score'), 1) : 0 }}
                                </div>
                                <div class="text-sm text-slate-600">{{ __('global.subject_average') }}</div>
                            </div>
                            <div class="text-center p-4 bg-purple-50 rounded-lg">
                                <div class="text-2xl font-bold text-purple-600">
                                    {{ $grade->child->grades()->where('subject', $grade->subject)->where('grade', 'A')->count() }}
                                </div>
                                <div class="text-sm text-slate-600">{{ __('global.a_grades_in_subject') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Evaluation Tab -->
        <div id="evaluation" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="Clipboard" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.evaluation_details') }}
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.evaluator') }}:</span>
                                <span class="font-medium">{{ $grade->evaluator ?? __('global.not_specified') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.recorded_at') }}:</span>
                                <span class="font-medium">{{ $grade->created_at->format('M d, Y H:i') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.last_updated') }}:</span>
                                <span class="font-medium">{{ $grade->updated_at->format('M d, Y H:i') }}</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500">{{ __('global.status') }}:</span>
                                <span class="font-medium px-2 py-1 rounded text-sm bg-success/20 text-success">
                                    {{ __('global.active') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="MessageSquare" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.comments') }}
                        </div>
                        @if($grade->comments)
                            <div class="p-4 bg-slate-50 rounded-lg">
                                <p class="text-slate-700">{{ $grade->comments }}</p>
                            </div>
                        @else
                            <div class="text-center py-8 text-slate-500">
                                <x-base.lucide icon="MessageSquare" class="w-12 h-12 mx-auto mb-3 opacity-50" />
                                <p>{{ __('global.no_comments_provided') }}</p>
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
