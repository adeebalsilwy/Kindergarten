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
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="contact">
                    <x-base.lucide icon="Phone" class="w-4 h-4 me-2" />
                    {{ __('global.contact_info') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="children">
                    <x-base.lucide icon="Users" class="w-4 h-4 me-2" />
                    {{ __('global.children') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="primary-children">
                    <x-base.lucide icon="User" class="w-4 h-4 me-2" />
                    {{ __('global.primary_children') }}
                </button>
                <button class="tab-button px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="secondary-children">
                    <x-base.lucide icon="UserPlus" class="w-4 h-4 me-2" />
                    {{ __('global.secondary_children') }}
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
                                <div class="w-full h-full bg-primary/10 flex items-center justify-center text-primary font-bold text-2xl">
                                    {{ strtoupper(substr($parents->name, 0, 2)) }}
                                </div>
                            </div>
                            <div class="ms-4 flex-1">
                                <div class="text-xl font-bold">{{ $parents->name }}</div>
                                <div class="text-slate-500 text-sm mt-1">
                                    {{ $parents->relationship ?? 'Guardian' }}
                                </div>
                                <div class="text-slate-500 text-sm mt-1">
                                    {{ $parents->occupation ?? 'Not specified' }}
                                </div>
                            </div>
                            <div class="ms-auto">
                                <span class="px-3 py-1 rounded-full text-sm font-medium
                                    {{ $parents->is_active ? 'bg-success/20 text-success' : 'bg-warning/20 text-warning' }}">
                                    {{ $parents->is_active ? __('global.active') : __('global.inactive') }}
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
                                    <div class="text-lg font-bold text-blue-600">{{ $parents->children()->count() }}</div>
                                    <div class="text-xs text-slate-500">{{ __('global.primary_children') }}</div>
                                </div>
                                <div class="text-center p-2 bg-green-50 rounded">
                                    <div class="text-lg font-bold text-green-600">{{ $parents->secondChildren()->count() }}</div>
                                    <div class="text-xs text-slate-500">{{ __('global.secondary_children') }}</div>
                                </div>
                                <div class="text-center p-2 bg-purple-50 rounded">
                                    <div class="text-lg font-bold text-purple-600">{{ $parents->children_count }}</div>
                                    <div class="text-xs text-slate-500">{{ __('global.total_children') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="box p-5 mt-5">
                        <div class="text-base font-medium mb-4">{{ __('global.account_status') }}</div>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-slate-500">{{ __('global.status') }}:</span>
                                <span class="font-medium">{{ $parents->is_active ? __('global.active') : __('global.inactive') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-500">{{ __('global.primary_guardian') }}:</span>
                                <span class="font-medium">{{ $parents->is_primary_guardian ? __('global.yes') : __('global.no') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-500">{{ __('global.primary_emergency_contact') }}:</span>
                                <span class="font-medium">{{ $parents->is_primary_emergency_contact ? __('global.yes') : __('global.no') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-500">{{ __('global.created_at') }}:</span>
                                <span class="font-medium">{{ $parents->created_at->format('M d, Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="intro-y col-span-12 lg:col-span-8">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12 md:col-span-6">
                            <div class="box p-5">
                                <div class="text-base font-medium mb-3">{{ __('global.primary_children') }}</div>
                                <div class="space-y-3">
                                    @forelse($parents->children()->latest()->take(3)->get() as $child)
                                        <div class="flex items-center p-2 border rounded hover:bg-slate-50">
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
                                            <x-base.lucide icon="User" class="w-8 h-8 mx-auto mb-2 opacity-50" />
                                            <p class="text-sm">{{ __('global.no_primary_children') }}</p>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <div class="box p-5">
                                <div class="text-base font-medium mb-3">{{ __('global.secondary_children') }}</div>
                                <div class="space-y-3">
                                    @forelse($parents->secondChildren()->latest()->take(3)->get() as $child)
                                        <div class="flex items-center p-2 border rounded hover:bg-slate-50">
                                            <div class="w-8 h-8 rounded-full bg-secondary/10 flex items-center justify-center me-3">
                                                <span class="text-secondary text-sm font-bold">{{ strtoupper(substr($child->name, 0, 1)) }}</span>
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
                                            <x-base.lucide icon="UserPlus" class="w-8 h-8 mx-auto mb-2 opacity-50" />
                                            <p class="text-sm">{{ __('global.no_secondary_children') }}</p>
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
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500">{{ __('global.date_of_birth') }}:</span>
                                <span class="font-medium">{{ $parents->date_of_birth ? $parents->date_of_birth->format('F j, Y') : __('global.not_specified') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="Shield" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.account_status') }}
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.status') }}:</span>
                                <span class="font-medium px-2 py-1 rounded text-sm
                                    {{ $parents->is_active ? 'bg-success/20 text-success' : 'bg-warning/20 text-warning' }}">
                                    {{ $parents->is_active ? __('global.active') : __('global.inactive') }}
                                </span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.primary_guardian') }}:</span>
                                <span class="font-medium">
                                    @if($parents->is_primary_guardian)
                                        <span class="text-success">
                                            <x-base.lucide icon="CheckCircle" class="w-4 h-4 inline me-1" />
                                            {{ __('global.yes') }}
                                        </span>
                                    @else
                                        <span class="text-danger">
                                            <x-base.lucide icon="XCircle" class="w-4 h-4 inline me-1" />
                                            {{ __('global.no') }}
                                        </span>
                                    @endif
                                </span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.primary_emergency_contact') }}:</span>
                                <span class="font-medium">
                                    @if($parents->is_primary_emergency_contact)
                                        <span class="text-success">
                                            <x-base.lucide icon="CheckCircle" class="w-4 h-4 inline me-1" />
                                            {{ __('global.yes') }}
                                        </span>
                                    @else
                                        <span class="text-danger">
                                            <x-base.lucide icon="XCircle" class="w-4 h-4 inline me-1" />
                                            {{ __('global.no') }}
                                        </span>
                                    @endif
                                </span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500">{{ __('global.preferred_language') }}:</span>
                                <span class="font-medium">{{ $parents->preferred_language ?? __('global.not_specified') }}</span>
                            </div>
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
                            {{ __('global.contact_details') }}
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.phone') }}:</span>
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
                                <span class="font-medium text-right max-w-xs">{{ $parents->address ?? __('global.not_provided') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center">
                            <x-base.lucide icon="Bell" class="w-5 h-5 me-2 text-primary" />
                            {{ __('global.notification_preferences') }}
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.sms_notifications') }}:</span>
                                <span class="font-medium">
                                    @if($parents->receives_sms_notifications)
                                        <span class="text-success">
                                            <x-base.lucide icon="CheckCircle" class="w-4 h-4 inline me-1" />
                                            {{ __('global.enabled') }}
                                        </span>
                                    @else
                                        <span class="text-danger">
                                            <x-base.lucide icon="XCircle" class="w-4 h-4 inline me-1" />
                                            {{ __('global.disabled') }}
                                        </span>
                                    @endif
                                </span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-slate-500">{{ __('global.email_notifications') }}:</span>
                                <span class="font-medium">
                                    @if($parents->receives_email_notifications)
                                        <span class="text-success">
                                            <x-base.lucide icon="CheckCircle" class="w-4 h-4 inline me-1" />
                                            {{ __('global.enabled') }}
                                        </span>
                                    @else
                                        <span class="text-danger">
                                            <x-base.lucide icon="XCircle" class="w-4 h-4 inline me-1" />
                                            {{ __('global.disabled') }}
                                        </span>
                                    @endif
                                </span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-500">{{ __('global.notes') }}:</span>
                                <span class="font-medium text-right max-w-xs">{{ $parents->notes ?? __('global.none') }}</span>
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
                            <span>{{ __('global.all_children') }}</span>
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
                                        <span class="px-2 py-1 rounded text-xs bg-blue-100 text-blue-800">
                                            {{ __('global.primary') }}
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
                                    <h3 class="text-lg font-medium text-slate-500">{{ __('global.no_primary_children') }}</h3>
                                    <p class="text-slate-400 mt-2">{{ __('global.this_guardian_has_no_primary_children') }}</p>
                                </div>
                            @endforelse

                            @forelse($parents->secondChildren as $child)
                                <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                    <div class="flex items-start justify-between mb-3">
                                        <div class="flex items-center">
                                            <div class="w-12 h-12 rounded-full bg-secondary/10 flex items-center justify-center me-3">
                                                <span class="text-secondary font-bold">{{ strtoupper(substr($child->name, 0, 1)) }}</span>
                                            </div>
                                            <div>
                                                <h3 class="font-medium">{{ $child->name }}</h3>
                                                <div class="text-xs text-slate-500">{{ $child->age }} {{ __('global.years_old') }}</div>
                                            </div>
                                        </div>
                                        <span class="px-2 py-1 rounded text-xs bg-purple-100 text-purple-800">
                                            {{ __('global.secondary') }}
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
                                    <h3 class="text-lg font-medium text-slate-500">{{ __('global.no_secondary_children') }}</h3>
                                    <p class="text-slate-400 mt-2">{{ __('global.this_guardian_has_no_secondary_children') }}</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Primary Children Tab -->
        <div id="primary-children" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center justify-between">
                            <span>{{ __('global.primary_children') }}</span>
                            <span class="text-sm text-slate-500">{{ $parents->children()->count() }} {{ __('global.children') }}</span>
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
                                        <span class="px-2 py-1 rounded text-xs bg-blue-100 text-blue-800">
                                            {{ __('global.primary') }}
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
                                    <x-base.lucide icon="User" class="w-16 h-16 mx-auto mb-4 text-slate-300" />
                                    <h3 class="text-lg font-medium text-slate-500">{{ __('global.no_primary_children') }}</h3>
                                    <p class="text-slate-400 mt-2">{{ __('global.this_guardian_has_no_primary_children') }}</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Secondary Children Tab -->
        <div id="secondary-children" class="tab-content">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y col-span-12">
                    <div class="box p-5">
                        <div class="text-lg font-medium mb-4 flex items-center justify-between">
                            <span>{{ __('global.secondary_children') }}</span>
                            <span class="text-sm text-slate-500">{{ $parents->secondChildren()->count() }} {{ __('global.children') }}</span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @forelse($parents->secondChildren as $child)
                                <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                    <div class="flex items-start justify-between mb-3">
                                        <div class="flex items-center">
                                            <div class="w-12 h-12 rounded-full bg-secondary/10 flex items-center justify-center me-3">
                                                <span class="text-secondary font-bold">{{ strtoupper(substr($child->name, 0, 1)) }}</span>
                                            </div>
                                            <div>
                                                <h3 class="font-medium">{{ $child->name }}</h3>
                                                <div class="text-xs text-slate-500">{{ $child->age }} {{ __('global.years_old') }}</div>
                                            </div>
                                        </div>
                                        <span class="px-2 py-1 rounded text-xs bg-purple-100 text-purple-800">
                                            {{ __('global.secondary') }}
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
                                    <x-base.lucide icon="UserPlus" class="w-16 h-16 mx-auto mb-4 text-slate-300" />
                                    <h3 class="text-lg font-medium text-slate-500">{{ __('global.no_secondary_children') }}</h3>
                                    <p class="text-slate-400 mt-2">{{ __('global.this_guardian_has_no_secondary_children') }}</p>
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
