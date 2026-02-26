@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Guardian.show') }} - {{ $parents->name }}</title>
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
            <x-base.lucide icon="Users" class="w-5 h-5 inline me-2" />
            {{ __('global.guardian_profile') }} - {{ $parents->name }}
        </h2>
        <div class="ms-auto flex gap-2">
            <x-base.button variant="secondary" as="a" href="{{ route('guardians.index') }}">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-2" />
                {{ __('global.back') }}
            </x-base.button>
            @can('edit_guardians')
            <x-base.button variant="primary" as="a" href="{{ route('guardians.edit', $parents->id) }}">
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
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="children">
                    <x-base.lucide icon="Baby" class="w-4 h-4 me-2" />
                    {{ __('global.children') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="contact">
                    <x-base.lucide icon="Phone" class="w-4 h-4 me-2" />
                    {{ __('global.contact_info') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="financial">
                    <x-base.lucide icon="DollarSign" class="w-4 h-4 me-2" />
                    {{ __('global.financial_info') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="notifications">
                    <x-base.lucide icon="Bell" class="w-4 h-4 me-2" />
                    {{ __('global.notifications') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="activity">
                    <x-base.lucide icon="Activity" class="w-4 h-4 me-2" />
                    {{ __('global.activity_summary') }}
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
                                @if($parents->photo)
                                    <img src="{{ asset('storage/'.$parents->photo) }}" class="w-full h-full object-cover" alt="{{ $parents->name }}">
                                @else
                                    <div class="w-full h-full bg-primary/10 flex items-center justify-center text-primary font-bold text-2xl">
                                        {{ strtoupper(substr($parents->name, 0, 2)) }}
                                    </div>
                                @endif
                            </div>
                            <div class="ms-4 flex-1">
                                <div class="text-xl font-bold">{{ $parents->name }}</div>
                                <div class="text-slate-500 text-sm mt-1">
                                    {{ $parents->relationship ?? __('global.parent') }}
                                </div>
                                <div class="text-slate-500 text-sm mt-1">
                                    {{ $parents->occupation ?? 'Not specified' }}
                                </div>
                            </div>
                            <div class="ms-auto">
                                <span class="px-3 py-1 rounded-full text-sm font-medium 
                                    {{ ($parents->is_active ?? true) ? 'bg-success/20 text-success' : 'bg-danger/20 text-danger' }}">
                                    {{ ($parents->is_active ?? true) ? __('global.active') : __('global.inactive') }}
                                </span>
                            </div>
                        </div>
                        
                        <div class="mt-6 space-y-3">
                            <div class="flex items-center text-sm">
                                <x-base.lucide icon="Phone" class="w-4 h-4 me-2 text-slate-500" />
                                <span>{{ $parents->phone ?? __('global.not_provided') }}</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <x-base.lucide icon="Mail" class="w-4 h-4 me-2 text-slate-500" />
                                <span>{{ $parents->email ?? __('global.not_provided') }}</span>
                            </div>
                            <div class="flex items-start text-sm">
                                <x-base.lucide icon="Home" class="w-4 h-4 me-2 text-slate-500 mt-0.5" />
                                <span>{{ $parents->address ?? __('global.not_provided') }}</span>
                            </div>
                        </div>
                        
                        <div class="mt-5 pt-4 border-t">
                            <div class="grid grid-cols-3 gap-2">
                                <div class="text-center p-2 bg-blue-50 rounded">
                                    <div class="text-lg font-bold text-blue-600">{{ $parents->children_count }}</div>
                                    <div class="text-xs text-slate-500">{{ __('global.children') }}</div>
                                </div>
                                <div class="text-center p-2 bg-green-50 rounded">
                                    <div class="text-lg font-bold text-green-600">
                                        {{ $parents->children()->where('enrollment_status', 'active')->count() }}
                                    </div>
                                    <div class="text-xs text-slate-500">{{ __('global.active') }}</div>
                                </div>
                                <div class="text-center p-2 bg-purple-50 rounded">
                                    <div class="text-lg font-bold text-purple-600">
                                        {{ $parents->payments()->sum('amount') > 0 ? number_format($parents->payments()->sum('amount'), 2) : '0.00' }}
                                    </div>
                                    <div class="text-xs text-slate-500">{{ __('global.paid') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="intro-y col-span-12 lg:col-span-8">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12 md:col-span-6">
                            <div class="box p-5">
                                <div class="text-base font-medium mb-3">{{ __('global.children_summary') }}</div>
                                <div class="space-y-3">
                                    @forelse($parents->children->take(4) as $child)
                                        <div class="flex items-center p-2 hover:bg-slate-50 rounded">
                                            <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center me-3">
                                                <span class="text-primary text-sm font-bold">{{ strtoupper(substr($child->name, 0, 1)) }}</span>
                                            </div>
                                            <div class="flex-1">
                                                <div class="font-medium text-sm">{{ $child->name }}</div>
                                                <div class="text-xs text-slate-500">{{ optional($child->class)->name ?? 'Not assigned' }}</div>
                                            </div>
                                            <a href="{{ route('children.show', $child->id) }}" class="text-primary hover:underline text-xs">
                                                {{ __('global.view') }}
                                            </a>
                                        </div>
                                    @empty
                                        <div class="text-center py-4 text-slate-500">
                                            <x-base.lucide icon="Baby" class="w-8 h-8 mx-auto mb-2 opacity-50" />
                                            <p class="text-sm">{{ __('global.no_children_assigned') }}</p>
                                        </div>
                                    @endforelse
                                </div>
                                @if($parents->children->count() > 4)
                                    <div class="mt-3 pt-3 border-t text-center">
                                        <a href="#" class="text-primary hover:underline text-sm">
                                            {{ __('global.view_all_children') }} ({{ $parents->children->count() }})
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-span-12 md:col-span-6">
                            <div class="box p-5">
                                <div class="text-base font-medium mb-3">{{ __('global.recent_activity') }}</div>
                                <div class="space-y-3">
                                    @forelse($parents->children->flatMap(function($child) { return $child->attendances()->latest()->take(2)->get(); })->sortByDesc('date')->take(5) as $attendance)
                                        <div class="flex items-center p-2 border rounded hover:bg-slate-50">
                                            <div class="w-2 h-2 rounded-full me-3 
                                                {{ $attendance->status === 'present' ? 'bg-success' : ($attendance->status === 'absent' ? 'bg-danger' : 'bg-warning') }}">
                                            </div>
                                            <div class="flex-1">
                                                <div class="font-medium text-sm">{{ $attendance->child->name }}</div>
                                                <div class="text-xs text-slate-500">{{ $attendance->date->format('M d, Y') }}</div>
                                            </div>
                                            <span class="text-xs px-2 py-1 rounded 
                                                {{ $attendance->status === 'present' ? 'bg-success/20 text-success' : ($attendance->status === 'absent' ? 'bg-danger/20 text-danger' : 'bg-warning/20 text-warning') }}">
                                                {{ ucfirst($attendance->status) }}
                                            </span>
                                        </div>
                                    @empty
                                        <div class="text-center py-4 text-slate-500">
                                            <x-base.lucide icon="Activity" class="w-8 h-8 mx-auto mb-2 opacity-50" />
                                            <p class="text-sm">{{ __('global.no_recent_activity') }}</p>
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
                                <span class="font-medium">{{ $parents->name }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.relationship') }}:</span>
                                <span class="font-medium">{{ $parents->relationship ?? __('global.not_specified') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.occupation') }}:</span>
                                <span class="font-medium">{{ $parents->occupation ?? __('global.not_specified') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.workplace') }}:</span>
                                <span class="font-medium">{{ $parents->workplace ?? __('global.not_specified') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.date_of_birth') }}:</span>
                                <span class="font-medium">{{ $parents->date_of_birth ? $parents->date_of_birth->format('F j, Y') : __('global.not_specified') }}</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500">{{ __('global.status') }}:</span>
                                <span class="font-medium px-2 py-1 rounded text-sm 
                                    {{ ($parents->is_active ?? true) ? 'bg-success/20 text-success' : 'bg-danger/20 text-danger' }}">
                                    {{ ($parents->is_active ?? true) ? __('global.active') : __('global.inactive') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="Shield" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.identification') }}
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.national_id') }}:</span>
                                <span class="font-medium">{{ $parents->national_id ?? __('global.not_provided') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.passport_number') }}:</span>
                                <span class="font-medium">{{ $parents->passport_number ?? __('global.not_provided') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.preferred_language') }}:</span>
                                <span class="font-medium">{{ $parents->preferred_language ?? __('global.not_specified') }}</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500">{{ __('global.last_login') }}:</span>
                                <span class="font-medium">{{ $parents->last_login_at ? $parents->last_login_at->format('F j, Y H:i') : __('global.never') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Children Tab -->
        <div id="children" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center justify-between">
                            <span>{{ __('global.children_under_care') }}</span>
                            <span class="text-sm text-slate-500">{{ $parents->children_count }} {{ __('global.children') }}</span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @forelse($parents->children as $child)
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
                                            <x-base.lucide icon="DollarSign" class="w-4 h-4 me-2" />
                                            {{ number_format($child->balance, 2) }} {{ __('global.balance') }}
                                        </div>
                                        <div class="flex items-center">
                                            <x-base.lucide icon="Cake" class="w-4 h-4 me-2" />
                                            {{ $child->dob->format('M d, Y') }}
                                        </div>
                                        <div class="flex items-center">
                                            <x-base.lucide icon="Users" class="w-4 h-4 me-2" />
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
                                    <x-base.lucide icon="Baby" class="w-16 h-16 mx-auto mb-4 text-slate-300" />
                                    <h3 class="text-lg font-medium text-slate-500">{{ __('global.no_children_assigned') }}</h3>
                                    <p class="text-slate-400 mt-2">{{ __('global.assign_children_to_view_details') }}</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Information Tab -->
        <div id="contact" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="Phone" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.primary_contact') }}
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.primary_phone') }}:</span>
                                <span class="font-medium">{{ $parents->phone ?? __('global.not_provided') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.secondary_phone') }}:</span>
                                <span class="font-medium">{{ $parents->secondary_phone ?? __('global.not_provided') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.email') }}:</span>
                                <span class="font-medium">{{ $parents->email ?? __('global.not_provided') }}</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500">{{ __('global.address') }}:</span>
                                <span class="font-medium text-right">{{ $parents->address ?? __('global.not_provided') }}</span>
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
                                <span class="text-slate-500">{{ __('global.full_address') }}:</span>
                                <span class="font-medium text-right max-w-xs">{{ $parents->full_address ?? __('global.not_provided') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.is_primary_guardian') }}:</span>
                                <span class="font-medium">
                                    <span class="{{ ($parents->is_primary_guardian ?? false) ? 'text-success' : 'text-danger' }}">
                                        <x-base.lucide icon="{{ ($parents->is_primary_guardian ?? false) ? 'CheckCircle' : 'XCircle' }}" class="w-4 h-4 inline me-1" />
                                        {{ ($parents->is_primary_guardian ?? false) ? __('global.yes') : __('global.no') }}
                                    </span>
                                </span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500">{{ __('global.is_primary_emergency') }}:</span>
                                <span class="font-medium">
                                    <span class="{{ ($parents->is_primary_emergency_contact ?? false) ? 'text-success' : 'text-danger' }}">
                                        <x-base.lucide icon="{{ ($parents->is_primary_emergency_contact ?? false) ? 'CheckCircle' : 'XCircle' }}" class="w-4 h-4 inline me-1" />
                                        {{ ($parents->is_primary_emergency_contact ?? false) ? __('global.yes') : __('global.no') }}
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Financial Information Tab -->
        <div id="financial" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12 lg:col-span-4">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4">{{ __('global.bank_details') }}</div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.bank_name') }}:</span>
                                <span class="font-medium">{{ $parents->bank_name ?? __('global.not_provided') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.account_number') }}:</span>
                                <span class="font-medium">{{ $parents->bank_account_number ?? __('global.not_provided') }}</span>
                            </div>
                            <div class="pt-4 border-t">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-primary">
                                        {{ $parents->children->sum('fees_paid') > 0 ? number_format($parents->children->sum('fees_paid'), 2) : '0.00' }}
                                    </div>
                                    <div class="text-sm text-slate-600">{{ __('global.total_paid_by_children') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-8">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center justify-between">
                            <span>{{ __('global.children_financial_summary') }}</span>
                            <span class="text-sm text-slate-500">{{ $parents->children->count() }} {{ __('global.children') }}</span>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-left">{{ __('global.child') }}</th>
                                        <th class="text-left">{{ __('global.fees_required') }}</th>
                                        <th class="text-left">{{ __('global.fees_paid') }}</th>
                                        <th class="text-left">{{ __('global.balance') }}</th>
                                        <th class="text-left">{{ __('global.class') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($parents->children as $child)
                                        <tr>
                                            <td class="py-2">
                                                <div class="flex items-center">
                                                    <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center me-2">
                                                        <span class="text-primary text-sm font-bold">{{ strtoupper(substr($child->name, 0, 1)) }}</span>
                                                    </div>
                                                    {{ $child->name }}
                                                </div>
                                            </td>
                                            <td>{{ number_format($child->fees_required, 2) }}</td>
                                            <td class="text-success">{{ number_format($child->fees_paid, 2) }}</td>
                                            <td class="{{ $child->balance > 0 ? 'text-danger' : 'text-success' }}">
                                                {{ number_format(abs($child->balance), 2) }}
                                            </td>
                                            <td>{{ optional($child->class)->name ?? 'Not assigned' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-8 text-slate-500">
                                                <x-base.lucide icon="DollarSign" class="w-12 h-12 mx-auto mb-3 opacity-50" />
                                                <p>{{ __('global.no_children_for_financial_summary') }}</p>
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

        <!-- Notifications Tab -->
        <div id="notifications" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="Bell" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.notification_preferences') }}
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center py-2 border-b">
                                <div>
                                    <div class="font-medium">{{ __('global.sms_notifications') }}</div>
                                    <div class="text-sm text-slate-500">{{ __('global.receive_sms_updates') }}</div>
                                </div>
                                <span class="{{ ($parents->receives_sms_notifications ?? false) ? 'text-success' : 'text-danger' }}">
                                    <x-base.lucide icon="{{ ($parents->receives_sms_notifications ?? false) ? 'CheckCircle' : 'XCircle' }}" class="w-5 h-5" />
                                </span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b">
                                <div>
                                    <div class="font-medium">{{ __('global.email_notifications') }}</div>
                                    <div class="text-sm text-slate-500">{{ __('global.receive_email_updates') }}</div>
                                </div>
                                <span class="{{ ($parents->receives_email_notifications ?? false) ? 'text-success' : 'text-danger' }}">
                                    <x-base.lucide icon="{{ ($parents->receives_email_notifications ?? false) ? 'CheckCircle' : 'XCircle' }}" class="w-5 h-5" />
                                </span>
                            </div>
                            <div class="pt-4 border-t">
                                <div class="text-sm text-slate-600">
                                    {{ __('global.notification_settings_note') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="MessageSquare" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.communication_summary') }}
                        </div>
                        <div class="space-y-4">
                            <div class="text-center p-4 bg-blue-50 rounded-lg">
                                <div class="text-3xl font-bold text-blue-600">
                                    {{ $parents->children->sum(function($child) { return $child->payments()->count(); }) }}
                                </div>
                                <div class="text-sm text-slate-600">{{ __('global.payment_notifications') }}</div>
                            </div>
                            <div class="text-center p-4 bg-green-50 rounded-lg">
                                <div class="text-3xl font-bold text-green-600">
                                    {{ $parents->children->sum(function($child) { return $child->attendances()->where('status', 'absent')->count(); }) }}
                                </div>
                                <div class="text-sm text-slate-600">{{ __('global.absence_notifications') }}</div>
                            </div>
                            <div class="text-center p-4 bg-purple-50 rounded-lg">
                                <div class="text-3xl font-bold text-purple-600">
                                    {{ $parents->children->sum(function($child) { return $child->grades()->count(); }) }}
                                </div>
                                <div class="text-sm text-slate-600">{{ __('global.grade_updates') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Activity Summary Tab -->
        <div id="activity" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12 lg:col-span-4">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4">{{ __('global.attendance_summary') }}</div>
                        <div class="space-y-4">
                            <div class="text-center p-4 bg-success/10 rounded-lg">
                                <div class="text-3xl font-bold text-success">
                                    {{ $parents->children->sum(function($child) { return $child->attendances()->where('status', 'present')->count(); }) }}
                                </div>
                                <div class="text-sm text-slate-600">{{ __('global.total_days_present') }}</div>
                            </div>
                            <div class="text-center p-4 bg-danger/10 rounded-lg">
                                <div class="text-3xl font-bold text-danger">
                                    {{ $parents->children->sum(function($child) { return $child->attendances()->where('status', 'absent')->count(); }) }}
                                </div>
                                <div class="text-sm text-slate-600">{{ __('global.total_days_absent') }}</div>
                            </div>
                            <div class="text-center p-4 bg-warning/10 rounded-lg">
                                <div class="text-3xl font-bold text-warning">
                                    {{ $parents->children->sum(function($child) { return $child->attendances()->where('status', 'late')->count(); }) }}
                                </div>
                                <div class="text-sm text-slate-600">{{ __('global.total_days_late') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="intro-y col-span-12 lg:col-span-8">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center justify-between">
                            <span>{{ __('global.recent_attendance') }}</span>
                            <span class="text-sm text-slate-500">{{ $parents->children->sum(function($child) { return $child->attendances()->count(); }) }} {{ __('global.records') }}</span>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-left">{{ __('global.child') }}</th>
                                        <th class="text-left">{{ __('global.date') }}</th>
                                        <th class="text-left">{{ __('global.status') }}</th>
                                        <th class="text-left">{{ __('global.check_in') }}</th>
                                        <th class="text-left">{{ __('global.notes') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $recentAttendances = $parents->children->flatMap(function($child) {
                                            return $child->attendances()->latest()->take(3)->get()->map(function($attendance) use ($child) {
                                                $attendance->child_name = $child->name;
                                                return $attendance;
                                            });
                                        })->sortByDesc('date')->take(10);
                                    @endphp
                                    @forelse($recentAttendances as $attendance)
                                        <tr>
                                            <td class="py-2">
                                                <div class="flex items-center">
                                                    <div class="w-6 h-6 rounded-full bg-primary/10 flex items-center justify-center me-2">
                                                        <span class="text-primary text-xs font-bold">{{ strtoupper(substr($attendance->child_name, 0, 1)) }}</span>
                                                    </div>
                                                    {{ $attendance->child_name }}
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
                                                <x-base.lucide icon="Activity" class="w-12 h-12 mx-auto mb-3 opacity-50" />
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
