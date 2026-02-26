@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Children.show') }} - {{ $children->name }}</title>
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
            <x-base.lucide icon="User" class="w-5 h-5 inline me-2" />
            {{ __('global.child_profile') }} - {{ $children->name }}
        </h2>
        <div class="ms-auto flex gap-2">
            <x-base.button variant="secondary" as="a" href="{{ route('children.index') }}">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" />
                {{ __('global.back') }}
            </x-base.button>
            @can('edit_children')
            <x-base.button variant="primary" as="a" href="{{ route('children.edit', $children->id) }}">
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
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="parents">
                    <x-base.lucide icon="Users" class="w-4 h-4 me-2" />
                    {{ __('global.parents') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="class">
                    <x-base.lucide icon="Home" class="w-4 h-4 me-2" />
                    {{ __('global.class_info') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="attendance">
                    <x-base.lucide icon="Clock" class="w-4 h-4 me-2" />
                    {{ __('global.attendance') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="grades">
                    <x-base.lucide icon="Award" class="w-4 h-4 me-2" />
                    {{ __('global.grades') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="payments">
                    <x-base.lucide icon="DollarSign" class="w-4 h-4 me-2" />
                    {{ __('global.payments') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="activities">
                    <x-base.lucide icon="Calendar" class="w-4 h-4 me-2" />
                    {{ __('global.activities') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="events">
                    <x-base.lucide icon="CalendarEvent" class="w-4 h-4 me-2" />
                    {{ __('global.events') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="medical">
                    <x-base.lucide icon="Heart" class="w-4 h-4 me-2" />
                    {{ __('global.medical_info') }}
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
                                @if($children->photo_path)
                                    <img src="{{ asset($children->photo_path) }}" class="w-full h-full object-cover" alt="{{ $children->name }}">
                                @else
                                    <div class="w-full h-full bg-primary/10 flex items-center justify-center text-primary font-bold text-2xl">
                                        {{ strtoupper(substr($children->name, 0, 2)) }}
                                    </div>
                                @endif
                            </div>
                            <div class="ms-4 flex-1">
                                <div class="text-xl font-bold">{{ $children->name }}</div>
                                <div class="text-slate-500 flex items-center mt-1">
                                    <x-base.lucide icon="Cake" class="w-4 h-4 me-1" />
                                    {{ $children->age }} {{ __('global.years_old') }}
                                </div>
                                <div class="text-slate-500 text-sm mt-1">
                                    {{ $children->gender }} • {{ $children->nationality ?? 'Not specified' }}
                                </div>
                            </div>
                            <div class="ms-auto">
                                <span class="px-3 py-1 rounded-full text-sm font-medium 
                                    {{ $children->enrollment_status === 'active' ? 'bg-success/20 text-success' : 'bg-warning/20 text-warning' }}">
                                    {{ ucfirst($children->enrollment_status) }}
                                </span>
                            </div>
                        </div>
                        
                        <div class="mt-6 grid grid-cols-2 gap-4">
                            <div class="text-center p-3 bg-slate-50 rounded-lg">
                                <div class="text-2xl font-bold text-primary">{{ $children->class->name ?? 'Not assigned' }}</div>
                                <div class="text-xs text-slate-500">{{ __('global.class') }}</div>
                            </div>
                            <div class="text-center p-3 bg-slate-50 rounded-lg">
                                <div class="text-2xl font-bold {{ $children->balance > 0 ? 'text-danger' : 'text-success' }}">
                                    {{ number_format(abs($children->balance), 2) }}
                                </div>
                                <div class="text-xs text-slate-500">{{ $children->balance > 0 ? __('global.balance_due') : __('global.overpaid') }}</div>
                            </div>
                        </div>
                        
                        <div class="mt-5">
                            <div class="text-sm text-slate-500 mb-2">{{ __('global.payment_progress') }}</div>
                            @php
                                $paymentPercentage = $children->fees_required > 0 ? min(100, ($children->fees_paid / $children->fees_required) * 100) : 0;
                            @endphp
                            <x-base.progress.bar :value="$paymentPercentage" class="h-2" />
                            <div class="text-xs text-end mt-1">{{ number_format($paymentPercentage, 1) }}% {{ __('global.completed') }}</div>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="box p-5 mt-5">
                        <div class="text-base font-medium mb-4">{{ __('global.quick_stats') }}</div>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="text-center p-2 bg-blue-50 rounded">
                                <div class="text-lg font-bold text-blue-600">{{ $children->attendances()->where('status', 'present')->count() }}</div>
                                <div class="text-xs text-slate-500">{{ __('global.present_days') }}</div>
                            </div>
                            <div class="text-center p-2 bg-red-50 rounded">
                                <div class="text-lg font-bold text-red-600">{{ $children->attendances()->where('status', 'absent')->count() }}</div>
                                <div class="text-xs text-slate-500">{{ __('global.absent_days') }}</div>
                            </div>
                            <div class="text-center p-2 bg-yellow-50 rounded">
                                <div class="text-lg font-bold text-yellow-600">{{ $children->attendances()->where('status', 'late')->count() }}</div>
                                <div class="text-xs text-slate-500">{{ __('global.late_days') }}</div>
                            </div>
                            <div class="text-center p-2 bg-green-50 rounded">
                                <div class="text-lg font-bold text-green-600">{{ $children->grades()->count() }}</div>
                                <div class="text-xs text-slate-500">{{ __('global.grades_recorded') }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="intro-y col-span-12 lg:col-span-8">
                    <div class="box p-5">
                        <div class="text-base font-medium mb-4">{{ __('global.recent_activity') }}</div>
                        <div class="space-y-3">
                            @forelse($children->attendances()->latest()->take(5)->get() as $attendance)
                                <div class="flex items-center p-3 border rounded-lg hover:bg-slate-50">
                                    <div class="w-3 h-3 rounded-full me-3 
                                        {{ $attendance->status === 'present' ? 'bg-success' : ($attendance->status === 'absent' ? 'bg-danger' : 'bg-warning') }}">
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-medium">{{ $attendance->status }}</div>
                                        <div class="text-xs text-slate-500">{{ $attendance->date->format('M d, Y') }}</div>
                                    </div>
                                    @if($attendance->check_in)
                                        <div class="text-xs text-slate-500">
                                            {{ $attendance->check_in->format('H:i') }}
                                        </div>
                                    @endif
                                </div>
                            @empty
                                <div class="text-center py-8 text-slate-500">
                                    <x-base.lucide icon="Calendar" class="w-12 h-12 mx-auto mb-3 opacity-50" />
                                    <p>{{ __('global.no_attendance_records') }}</p>
                                </div>
                            @endforelse
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
                                <span class="font-medium">{{ $children->name }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.date_of_birth') }}:</span>
                                <span class="font-medium">{{ $children->dob->format('F j, Y') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.age') }}:</span>
                                <span class="font-medium">{{ $children->age }} {{ __('global.years') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.gender') }}:</span>
                                <span class="font-medium">{{ ucfirst($children->gender) }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.nationality') }}:</span>
                                <span class="font-medium">{{ $children->nationality ?? 'Not specified' }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.religion') }}:</span>
                                <span class="font-medium">{{ $children->religion ?? 'Not specified' }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.special_needs') }}:</span>
                                <span class="font-medium">{{ $children->special_needs ?? 'None' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="Calendar" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.enrollment_info') }}
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.enrollment_date') }}:</span>
                                <span class="font-medium">{{ $children->enrollment_date->format('F j, Y') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.expected_graduation') }}:</span>
                                <span class="font-medium">{{ $children->expected_graduation_date 
                                    ? $children->expected_graduation_date->format('F j, Y') 
                                    : 'N/A' }}</span>

                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.enrollment_status') }}:</span>
                                <span class="font-medium px-2 py-1 rounded text-sm 
                                    {{ $children->enrollment_status === 'active' ? 'bg-success/20 text-success' : 'bg-warning/20 text-warning' }}">
                                    {{ ucfirst($children->enrollment_status) }}
                                </span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.last_attended') }}:</span>
                                <span class="font-medium">{{ $children->last_attended_at ? $children->last_attended_at->format('F j, Y H:i') : 'Never' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Parents Tab -->
        <div id="parents" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                @if($children->parent)
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="User" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.primary_parent') }}
                        </div>
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center me-3">
                                    <span class="text-primary font-bold">{{ strtoupper(substr($children->parent->name, 0, 1)) }}</span>
                                </div>
                                <div>
                                    <div class="font-medium">{{ $children->parent->name }}</div>
                                    <div class="text-sm text-slate-500">{{ $children->parent->relationship ?? 'Parent' }}</div>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-2 mt-4">
                                @if($children->parent->phone)
                                    <div class="flex items-center text-sm">
                                        <x-base.lucide icon="Phone" class="w-4 h-4 me-2 text-slate-500" />
                                        <span>{{ $children->parent->phone }}</span>
                                    </div>
                                @endif
                                @if($children->parent->email)
                                    <div class="flex items-center text-sm">
                                        <x-base.lucide icon="Mail" class="w-4 h-4 me-2 text-slate-500" />
                                        <span>{{ $children->parent->email }}</span>
                                    </div>
                                @endif
                                @if($children->parent->address)
                                    <div class="flex items-start text-sm">
                                        <x-base.lucide icon="Home" class="w-4 h-4 me-2 text-slate-500 mt-0.5" />
                                        <span>{{ $children->parent->address }}</span>
                                    </div>
                                @endif
                            </div>
                            <div class="mt-4 pt-4 border-t">
                                <a href="{{ route('guardians.show', $children->parent->id) }}" class="text-primary hover:underline text-sm">
                                    {{ __('global.view_full_profile') }}
                                    <x-base.lucide icon="ArrowRight" class="w-3 h-3 inline ms-1" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @if($children->secondParent)
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="UserPlus" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.secondary_parent') }}
                        </div>
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <div class="w-12 h-12 rounded-full bg-secondary/10 flex items-center justify-center me-3">
                                    <span class="text-secondary font-bold">{{ strtoupper(substr($children->secondParent->name, 0, 1)) }}</span>
                                </div>
                                <div>
                                    <div class="font-medium">{{ $children->secondParent->name }}</div>
                                    <div class="text-sm text-slate-500">{{ $children->secondParent->relationship ?? 'Parent' }}</div>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-2 mt-4">
                                @if($children->secondParent->phone)
                                    <div class="flex items-center text-sm">
                                        <x-base.lucide icon="Phone" class="w-4 h-4 me-2 text-slate-500" />
                                        <span>{{ $children->secondParent->phone }}</span>
                                    </div>
                                @endif
                                @if($children->secondParent->email)
                                    <div class="flex items-center text-sm">
                                        <x-base.lucide icon="Mail" class="w-4 h-4 me-2 text-slate-500" />
                                        <span>{{ $children->secondParent->email }}</span>
                                    </div>
                                @endif
                                @if($children->secondParent->address)
                                    <div class="flex items-start text-sm">
                                        <x-base.lucide icon="Home" class="w-4 h-4 me-2 text-slate-500 mt-0.5" />
                                        <span>{{ $children->secondParent->address }}</span>
                                    </div>
                                @endif
                            </div>
                            <div class="mt-4 pt-4 border-t">
                                <a href="{{ route('guardians.show', $children->secondParent->id) }}" class="text-primary hover:underline text-sm">
                                    {{ __('global.view_full_profile') }}
                                    <x-base.lucide icon="ArrowRight" class="w-3 h-3 inline ms-1" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @if(!$children->parent && !$children->secondParent)
                <div class="intro-y col-span-12">
                    <div class="box p-8 text-center">
                        <x-base.lucide icon="Users" class="w-16 h-16 mx-auto mb-4 text-slate-300" />
                        <h3 class="text-lg font-medium text-slate-500">{{ __('global.no_parents_assigned') }}</h3>
                        <p class="text-slate-400 mt-2">{{ __('global.assign_parents_to_view_details') }}</p>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- Class Information Tab -->
        <div id="class" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12 lg:col-span-8">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="Home" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.class_details') }}
                        </div>
                        @if($children->class)
                            <div class="space-y-4">
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-slate-500">{{ __('global.class_name') }}:</span>
                                    <span class="font-medium">{{ $children->class->name }}</span>
                                </div>
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-slate-500">{{ __('global.class_code') }}:</span>
                                    <span class="font-medium">{{ $children->class->code ?? 'Not specified' }}</span>
                                </div>
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-slate-500">{{ __('global.teacher') }}:</span>
                                    <span class="font-medium">{{ $children->class->teacher->name ?? 'Not assigned' }}</span>
                                </div>
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-slate-500">{{ __('global.age_group') }}:</span>
                                    <span class="font-medium">{{ $children->class->age_group ?? 'Not specified' }}</span>
                                </div>
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-slate-500">{{ __('global.capacity') }}:</span>
                                    <span class="font-medium">{{ $children->class->capacity ?? 'Not specified' }}</span>
                                </div>
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-slate-500">{{ __('global.current_students') }}:</span>
                                    <span class="font-medium">{{ $children->class->current_students ?? 0 }}</span>
                                </div>
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-slate-500">{{ __('global.room_number') }}:</span>
                                    <span class="font-medium">{{ $children->class->room_number ?? 'Not specified' }}</span>
                                </div>
                                <div class="flex justify-between py-2">
                                    <span class="text-slate-500">{{ __('global.monthly_fee') }}:</span>
                                    <span class="font-medium">{{ number_format($children->class->monthly_fee ?? 0, 2) }}</span>
                                </div>
                            </div>
                            <div class="mt-6 pt-4 border-t">
                                <a href="{{ route('classes.show', $children->class->id) }}" class="text-primary hover:underline">
                                    {{ __('global.view_class_details') }}
                                    <x-base.lucide icon="ArrowRight" class="w-4 h-4 inline ms-1" />
                                </a>
                            </div>
                        @else
                            <div class="text-center py-8">
                                <x-base.lucide icon="Home" class="w-16 h-16 mx-auto mb-4 text-slate-300" />
                                <h3 class="text-lg font-medium text-slate-500">{{ __('global.not_assigned_to_class') }}</h3>
                                <p class="text-slate-400 mt-2">{{ __('global.assign_class_to_view_details') }}</p>
                            </div>
                        @endif
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-4">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4">{{ __('global.classmates') }}</div>
                        <div class="space-y-2 max-h-96 overflow-y-auto">
                            @forelse($children->class->children->where('id', '!=', $children->id)->take(10) as $classmate)
                                <div class="flex items-center p-2 hover:bg-slate-50 rounded">
                                    <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center me-3">
                                        <span class="text-primary text-sm font-bold">{{ strtoupper(substr($classmate->name, 0, 1)) }}</span>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-medium text-sm">{{ $classmate->name }}</div>
                                        <div class="text-xs text-slate-500">{{ $classmate->age }} {{ __('global.years_old') }}</div>
                                    </div>
                                    <a href="{{ route('children.show', $classmate->id) }}" class="text-primary hover:underline text-xs">
                                        {{ __('global.view') }}
                                    </a>
                                </div>
                            @empty
                                <div class="text-center py-4 text-slate-500">
                                    <x-base.lucide icon="Users" class="w-8 h-8 mx-auto mb-2 opacity-50" />
                                    <p class="text-sm">{{ __('global.no_classmates') }}</p>
                                </div>
                            @endforelse
                        </div>
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
                                <div class="text-3xl font-bold text-success">{{ $children->attendances()->where('status', 'present')->count() }}</div>
                                <div class="text-sm text-slate-600">{{ __('global.days_present') }}</div>
                            </div>
                            <div class="text-center p-4 bg-danger/10 rounded-lg">
                                <div class="text-3xl font-bold text-danger">{{ $children->attendances()->where('status', 'absent')->count() }}</div>
                                <div class="text-sm text-slate-600">{{ __('global.days_absent') }}</div>
                            </div>
                            <div class="text-center p-4 bg-warning/10 rounded-lg">
                                <div class="text-3xl font-bold text-warning">{{ $children->attendances()->where('status', 'late')->count() }}</div>
                                <div class="text-sm text-slate-600">{{ __('global.days_late') }}</div>
                            </div>
                            <div class="pt-4 border-t">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-primary">
                                        {{ $children->attendances()->count() > 0 ? round(($children->attendances()->where('status', 'present')->count() / $children->attendances()->count()) * 100, 1) : 0 }}%
                                    </div>
                                    <div class="text-sm text-slate-600">{{ __('global.attendance_rate') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-8">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center justify-between">
                            <span>{{ __('global.attendance_history') }}</span>
                            <span class="text-sm text-slate-500">{{ $children->attendances()->count() }} {{ __('global.records') }}</span>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-left">{{ __('global.date') }}</th>
                                        <th class="text-left">{{ __('global.status') }}</th>
                                        <th class="text-left">{{ __('global.check_in') }}</th>
                                        <th class="text-left">{{ __('global.check_out') }}</th>
                                        <th class="text-left">{{ __('global.notes') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($children->attendances()->latest()->take(20)->get() as $attendance)
                                        <tr>
                                            <td class="py-2">{{ $attendance->date->format('M d, Y') }}</td>
                                            <td>
                                                <span class="px-2 py-1 rounded text-xs font-medium 
                                                    {{ $attendance->status === 'present' ? 'bg-success/20 text-success' : ($attendance->status === 'absent' ? 'bg-danger/20 text-danger' : 'bg-warning/20 text-warning') }}">
                                                    {{ ucfirst($attendance->status) }}
                                                </span>
                                            </td>
                                            <td>{{ $attendance->check_in ? $attendance->check_in->format('H:i') : '--' }}</td>
                                            <td>{{ $attendance->check_out ? $attendance->check_out->format('H:i') : '--' }}</td>
                                            <td class="text-sm text-slate-600 max-w-xs truncate">{{ $attendance->notes ?? '--' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-8 text-slate-500">
                                                <x-base.lucide icon="Clock" class="w-12 h-12 mx-auto mb-3 opacity-50" />
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

        <!-- Grades Tab -->
        <div id="grades" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12 lg:col-span-4">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4">{{ __('global.grade_summary') }}</div>
                        <div class="space-y-4">
                            <div class="text-center p-4 bg-blue-50 rounded-lg">
                                <div class="text-3xl font-bold text-blue-600">{{ $children->grades()->count() }}</div>
                                <div class="text-sm text-slate-600">{{ __('global.total_grades') }}</div>
                            </div>
                            <div class="text-center p-4 bg-green-50 rounded-lg">
                                <div class="text-3xl font-bold text-green-600">
                                    {{ $children->grades()->count() > 0 ? round($children->grades()->avg('score'), 1) : 0 }}
                                </div>
                                <div class="text-sm text-slate-600">{{ __('global.average_score') }}</div>
                            </div>
                            <div class="text-center p-4 bg-purple-50 rounded-lg">
                                <div class="text-3xl font-bold text-purple-600">
                                    {{ $children->grades->filter(function($grade) { return $grade->grade === 'A'; })->count() }}
                                </div>
                                <div class="text-sm text-slate-600">{{ __('global.a_grades') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-8">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center justify-between">
                            <span>{{ __('global.grade_history') }}</span>
                            <span class="text-sm text-slate-500">{{ $children->grades()->count() }} {{ __('global.records') }}</span>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-left">{{ __('global.date') }}</th>
                                        <th class="text-left">{{ __('global.subject') }}</th>
                                        <th class="text-left">{{ __('global.score') }}</th>
                                        <th class="text-left">{{ __('global.grade') }}</th>
                                        <th class="text-left">{{ __('global.evaluator') }}</th>
                                        <th class="text-left">{{ __('global.comments') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($children->grades()->latest()->get() as $grade)
                                        <tr>
                                            <td class="py-2">{{ $grade->date->format('M d, Y') }}</td>
                                            <td>{{ $grade->subject }}</td>
                                            <td>
                                                <span class="font-medium">{{ $grade->score }}</span>
                                            </td>
                                            <td>
                                                <span class="px-2 py-1 rounded text-xs font-medium 
                                                    {{ $grade->grade === 'A' ? 'bg-success/20 text-success' : ($grade->grade === 'B' ? 'bg-blue/20 text-blue' : ($grade->grade === 'C' ? 'bg-warning/20 text-warning' : 'bg-danger/20 text-danger')) }}">
                                                    {{ $grade->grade }}
                                                </span>
                                            </td>
                                            <td>{{ $grade->evaluator }}</td>
                                            <td class="text-sm text-slate-600 max-w-xs truncate">{{ $grade->comments ?? '--' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center py-8 text-slate-500">
                                                <x-base.lucide icon="Award" class="w-12 h-12 mx-auto mb-3 opacity-50" />
                                                <p>{{ __('global.no_grades_recorded') }}</p>
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

        <!-- Payments Tab -->
        <div id="payments" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12 lg:col-span-4">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4">{{ __('global.financial_summary') }}</div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.fees_required') }}:</span>
                                <span class="font-medium">{{ number_format($children->fees_required, 2) }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.fees_paid') }}:</span>
                                <span class="font-medium text-success">{{ number_format($children->fees_paid, 2) }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.balance') }}:</span>
                                <span class="font-medium {{ $children->balance > 0 ? 'text-danger' : 'text-success' }}">
                                    {{ number_format(abs($children->balance), 2) }}
                                </span>
                            </div>
                            <div class="pt-4">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-primary">
                                        {{ $children->fees_required > 0 ? round(($children->fees_paid / $children->fees_required) * 100, 1) : 100 }}%
                                    </div>
                                    <div class="text-sm text-slate-600">{{ __('global.payment_completion') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-8">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center justify-between">
                            <span>{{ __('global.payment_history') }}</span>
                            <span class="text-sm text-slate-500">{{ $children->payments()->count() }} {{ __('global.payments') }}</span>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-left">{{ __('global.date') }}</th>
                                        <th class="text-left">{{ __('global.amount') }}</th>
                                        <th class="text-left">{{ __('global.method') }}</th>
                                        <th class="text-left">{{ __('global.status') }}</th>
                                        <th class="text-left">{{ __('global.reference') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($children->payments()->latest()->get() as $payment)
                                        <tr>
                                            <td class="py-2">{{ $payment->payment_date->format('M d, Y') }}</td>
                                            <td class="font-medium">{{ number_format($payment->amount, 2) }}</td>
                                            <td>{{ ucfirst($payment->payment_method ?? 'Not specified') }}</td>
                                            <td>
                                                <span class="px-2 py-1 rounded text-xs font-medium 
                                                    {{ $payment->status === 'completed' ? 'bg-success/20 text-success' : ($payment->status === 'pending' ? 'bg-warning/20 text-warning' : 'bg-danger/20 text-danger') }}">
                                                    {{ ucfirst($payment->status ?? 'unknown') }}
                                                </span>
                                            </td>
                                            <td class="text-sm text-slate-600">{{ $payment->reference_number ?? '--' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-8 text-slate-500">
                                                <x-base.lucide icon="DollarSign" class="w-12 h-12 mx-auto mb-3 opacity-50" />
                                                <p>{{ __('global.no_payments_recorded') }}</p>
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

        <!-- Activities Tab -->
        <div id="activities" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center justify-between">
                            <span>{{ __('global.activities_participation') }}</span>
                            <span class="text-sm text-slate-500">{{ $children->activities()->count() }} {{ __('global.activities') }}</span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @forelse($children->activities as $activity)
                                <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                    <div class="flex items-start justify-between mb-3">
                                        <h3 class="font-medium text-lg">{{ $activity->title ?? $activity->name }}</h3>
                                        <span class="px-2 py-1 rounded text-xs 
                                            {{ $activity->is_active ? 'bg-success/20 text-success' : 'bg-slate-200 text-slate-600' }}">
                                            {{ $activity->is_active ? __('global.active') : __('global.inactive') }}
                                        </span>
                                    </div>
                                    <div class="space-y-2 text-sm text-slate-600">
                                        <div class="flex items-center">
                                            <x-base.lucide icon="User" class="w-4 h-4 me-2" />
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
                                    <h3 class="text-lg font-medium text-slate-500">{{ __('global.no_activities_participated') }}</h3>
                                    <p class="text-slate-400 mt-2">{{ __('global.child_not_assigned_to_activities') }}</p>
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
                            <span>{{ __('global.events_participation') }}</span>
                            <span class="text-sm text-slate-500">{{ $children->events()->count() }} {{ __('global.events') }}</span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @forelse($children->events as $event)
                                <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                    <div class="flex items-start justify-between mb-3">
                                        <h3 class="font-medium text-lg">{{ $event->title ?? $event->name }}</h3>
                                        <span class="px-2 py-1 rounded text-xs 
                                            {{ $event->status === 'active' ? 'bg-success/20 text-success' : 'bg-slate-200 text-slate-600' }}">
                                            {{ ucfirst($event->status ?? 'active') }}
                                        </span>
                                    </div>
                                    <div class="space-y-2 text-sm text-slate-600">
                                        <div class="flex items-center">
                                            <x-base.lucide icon="User" class="w-4 h-4 me-2" />
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
                                    <h3 class="text-lg font-medium text-slate-500">{{ __('global.no_events_participated') }}</h3>
                                    <p class="text-slate-400 mt-2">{{ __('global.child_not_assigned_to_events') }}</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Medical Information Tab -->
        <div id="medical" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="Heart" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.medical_conditions') }}
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.medical_conditions') }}:</span>
                                <span class="font-medium">{{ $children->medical_conditions ?? 'None reported' }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.allergies') }}:</span>
                                <span class="font-medium">{{ $children->allergies ?? 'None reported' }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.medications') }}:</span>
                                <span class="font-medium">{{ $children->medications ?? 'None required' }}</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500">{{ __('global.blood_type') }}:</span>
                                <span class="font-medium">{{ $children->blood_type ?? 'Not specified' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="Phone" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.emergency_contact') }}
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.contact_name') }}:</span>
                                <span class="font-medium">{{ $children->emergency_contact_name ?? 'Not specified' }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.contact_phone') }}:</span>
                                <span class="font-medium">{{ $children->emergency_contact_phone ?? 'Not specified' }}</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500">{{ __('global.relationship') }}:</span>
                                <span class="font-medium">{{ $children->emergency_contact_relation ?? 'Not specified' }}</span>
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
