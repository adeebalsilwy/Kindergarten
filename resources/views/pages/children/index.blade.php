@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Children.list') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('global.children_management') }}</h2>
        <div class="w-full sm:w-auto flex flex-wrap gap-2 mt-4 sm:mt-0">
            @can('create_children')
            <x-base.button variant="primary" as="a" href="{{ route('children.create') }}" class="flex items-center shadow-md">
                <x-base.lucide icon="UserPlus" class="w-4 h-4 mr-2" />
                {{ __('global.add_new_child') }}
            </x-base.button>
            @endcan
            
            @can('export_children')
            <div class="dropdown ml-2">
                <x-base.button variant="outline-secondary" class="flex items-center">
                    <x-base.lucide icon="Download" class="w-4 h-4 mr-2" />
                    {{ __('global.export') }}
                    <x-base.lucide icon="ChevronDown" class="w-4 h-4 ml-2" />
                </x-base.button>
                <div class="dropdown-menu w-40">
                    <div class="dropdown-content">
                        <a href="{{ route('children.export.pdf') }}" class="dropdown-item flex items-center">
                            <x-base.lucide icon="FileText" class="w-4 h-4 mr-2" />
                            {{ __('global.export_pdf') }}
                        </a>
                        <a href="{{ route('children.export.excel') }}" class="dropdown-item flex items-center">
                            <x-base.lucide icon="FileSpreadsheet" class="w-4 h-4 mr-2" />
                            {{ __('global.export_excel') }}
                        </a>
                    </div>
                </div>
            </div>
            @endcan
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-5">
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-primary/20 bg-primary/5">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                            <x-base.lucide icon="Users" class="w-6 h-6 text-primary" />
                        </div>
                        <div class="ml-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 mr-1" />
                                <span class="text-xs">{{ __('global.active') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">{{ $totalActive ?? 0 }}</div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.active_students') }}</div>
                </div>
            </div>
        </div>
        
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-warning/20 bg-warning/5">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-warning/10 flex items-center justify-center">
                            <x-base.lucide icon="DollarSign" class="w-6 h-6 text-warning" />
                        </div>
                        <div class="ml-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 mr-1" />
                                <span class="text-xs">{{ __('global.pending') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">{{ $totalOutstanding ?? 0 }}</div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.outstanding_fees') }}</div>
                </div>
            </div>
        </div>
        
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-info/20 bg-info/5">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-info/10 flex items-center justify-center">
                            <x-base.lucide icon="Calendar" class="w-6 h-6 text-info" />
                        </div>
                        <div class="ml-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 mr-1" />
                                <span class="text-xs">{{ __('global.today') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">{{ $todayAttendance ?? 0 }}%</div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.today_attendance') }}</div>
                </div>
            </div>
        </div>
        
        <div class="intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-success/20 bg-success/5">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-success/10 flex items-center justify-center">
                            <x-base.lucide icon="GraduationCap" class="w-6 h-6 text-success" />
                        </div>
                        <div class="ml-auto">
                            <div class="text-success flex items-center">
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4 mr-1" />
                                <span class="text-xs">{{ __('global.classes') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">{{ $totalClasses ?? 0 }}</div>
                    <div class="text-sm text-slate-600 mt-1">{{ __('global.active_classes') }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter and Search Section -->
    <div class="intro-y box p-5 mt-5">
        <form method="GET" action="{{ route('children.index') }}">
            <div class="flex flex-col lg:flex-row gap-4">
                <!-- Search Bar -->
                <div class="flex-1">
                    <div class="relative">
                        <x-base.form-input 
                            type="text" 
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="{{ __('global.search_children') }}..." 
                            class="w-full pl-10 pr-4 py-2"
                        />
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <x-base.lucide icon="Search" class="h-5 w-5 text-gray-400" />
                        </div>
                    </div>
                </div>
                
                <!-- Class Filter -->
                <div class="w-full lg:w-48">
                    <select name="class_id" class="form-select w-full box">
                        <option value="">{{ __('global.all_classes') }}</option>
                        @foreach($classes as $class)
                            <option value="{{ $class->id }}" {{ request('class_id') == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Status Filter -->
                <div class="w-full lg:w-40">
                     <select name="enrollment_status" class="form-select w-full box">
                        <option value="">{{ __('global.all_status') }}</option>
                        <option value="active" {{ request('enrollment_status') == 'active' ? 'selected' : '' }}>{{ __('global.active') }}</option>
                        <option value="inactive" {{ request('enrollment_status') == 'inactive' ? 'selected' : '' }}>{{ __('global.inactive') }}</option>
                        <option value="graduated" {{ request('enrollment_status') == 'graduated' ? 'selected' : '' }}>{{ __('global.graduated') }}</option>
                    </select>
                </div>
                
                <!-- Action Buttons -->
                <div class="flex gap-2">
                    <x-base.button as="a" href="{{ route('children.index') }}" variant="secondary" class="flex items-center">
                        <x-base.lucide icon="RotateCcw" class="w-4 h-4 mr-2" />
                        {{ __('global.reset') }}
                    </x-base.button>
                    <x-base.button type="submit" variant="primary" class="flex items-center">
                        <x-base.lucide icon="Filter" class="w-4 h-4 mr-2" />
                        {{ __('global.apply') }}
                    </x-base.button>
                </div>
            </div>
        </form>
    </div>

    <!-- Children Grid View -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-5" id="childrenGrid">
        @forelse($childrens as $child)
            <div class="intro-y box overflow-hidden zoom-in border border-slate-200/60 dark:border-darkmode-400">
                <!-- Child Header -->
                <div class="relative h-32 overflow-hidden">
                    @if($child->photo_path)
                        <img alt="{{ $child->name }}" class="w-full h-full object-cover" src="{{ asset($child->photo_path) }}">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center">
                            <span class="text-white text-4xl font-bold">{{ strtoupper(substr($child->name, 0, 1)) }}</span>
                        </div>
                    @endif
                    
                    <!-- Status Badge -->
                    <div class="absolute top-3 right-3">
                        @if($child->enrollment_status === 'active')
                            <span class="px-2 py-1 bg-success/90 text-white text-xs rounded-full font-medium">
                                {{ __('global.active') }}
                            </span>
                        @elseif($child->enrollment_status === 'inactive')
                            <span class="px-2 py-1 bg-warning/90 text-white text-xs rounded-full font-medium">
                                {{ __('global.inactive') }}
                            </span>
                        @else
                            <span class="px-2 py-1 bg-slate-500/90 text-white text-xs rounded-full font-medium">
                                {{ $child->enrollment_status }}
                            </span>
                        @endif
                    </div>
                </div>
                
                <!-- Child Info -->
                <div class="p-5">
                    <div class="flex items-start justify-between">
                        <div>
                            <h3 class="font-medium text-base truncate">{{ $child->name }}</h3>
                            <div class="text-slate-500 text-sm mt-1">
                                <span class="flex items-center">
                                    <x-base.lucide icon="Cake" class="w-4 h-4 mr-1" />
                                    {{ $child->age }} {{ __('global.years_old') }}
                                </span>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-xs text-slate-500">{{ __('global.class') }}</div>
                            <div class="font-medium text-sm">{{ $child->class->name ?? '-' }}</div>
                        </div>
                    </div>
                    
                    <!-- Parent Info -->
                    @if($child->parent)
                        <div class="mt-4 pt-4 border-t border-slate-200/60 dark:border-darkmode-400">
                            <div class="flex items-center text-sm">
                                <x-base.lucide icon="User" class="w-4 h-4 mr-2 text-slate-500" />
                                <span class="truncate">{{ $child->parent->name }}</span>
                            </div>
                            @if($child->parent->phone)
                                <div class="flex items-center text-sm mt-1">
                                    <x-base.lucide icon="Phone" class="w-4 h-4 mr-2 text-slate-500" />
                                    <span>{{ $child->parent->phone }}</span>
                                </div>
                            @endif
                        </div>
                    @endif
                    
                    <!-- Financial Status -->
                    <div class="mt-4 pt-4 border-t border-slate-200/60 dark:border-darkmode-400">
                        <div class="flex justify-between text-sm">
                            <span class="text-slate-500">{{ __('global.fees_balance') }}:</span>
                            <span class="font-medium {{ $child->balance > 0 ? 'text-danger' : 'text-success' }}">
                                {{ number_format(abs($child->balance), 2) }}
                                @if($child->balance > 0)
                                    <span class="text-xs">{{ __('global.debt') }}</span>
                                @else
                                    <span class="text-xs">{{ __('global.paid') }}</span>
                                @endif
                            </span>
                        </div>
                        
                        <!-- Progress Bar -->
                        <div class="mt-2">
                            @php
                                $paymentPercentage = $child->fees_required > 0 ? 
                                    min(100, ($child->fees_paid / $child->fees_required) * 100) : 0;
                            @endphp
                            <div class="w-full bg-slate-200 rounded-full h-2">
                                <div class="bg-{{ $paymentPercentage >= 100 ? 'success' : ($paymentPercentage >= 50 ? 'warning' : 'danger') }} h-2 rounded-full" 
                                     style="width: {{ $paymentPercentage }}%"></div>
                            </div>
                            <div class="text-xs text-slate-500 mt-1 text-right">
                                {{ number_format($paymentPercentage, 1) }}%
                            </div>
                        </div>
                    </div>
                    
                    <!-- Quick Stats -->
                    <div class="grid grid-cols-3 gap-2 mt-4 pt-4 border-t border-slate-200/60 dark:border-darkmode-400">
                        <div class="text-center">
                            <div class="text-lg font-semibold">{{ $child->attendances()->where('status', 'present')->count() }}</div>
                            <div class="text-xs text-slate-500">{{ __('global.present') }}</div>
                        </div>
                        <div class="text-center">
                            <div class="text-lg font-semibold">{{ $child->attendances()->where('status', 'absent')->count() }}</div>
                            <div class="text-xs text-slate-500">{{ __('global.absent') }}</div>
                        </div>
                        <div class="text-center">
                            <div class="text-lg font-semibold">{{ $child->grades()->count() }}</div>
                            <div class="text-xs text-slate-500">{{ __('global.grades') }}</div>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="mt-5 pt-5 border-t border-slate-200/60 dark:border-darkmode-400 flex gap-2">
                        @can('view_children')
                            <x-base.button 
                                variant="outline-secondary" 
                                as="a" 
                                href="{{ route('children.show', $child->id) }}" 
                                size="sm" 
                                class="flex-1 justify-center"
                            >
                                <x-base.lucide icon="Eye" class="w-4 h-4 mr-1" />
                                {{ __('global.view') }}
                            </x-base.button>
                        @endcan
                        
                        @can('edit_children')
                            <x-base.button 
                                variant="outline-primary" 
                                as="a" 
                                href="{{ route('children.edit', $child->id) }}" 
                                size="sm" 
                                class="flex-1 justify-center"
                            >
                                <x-base.lucide icon="Pencil" class="w-4 h-4 mr-1" />
                                {{ __('global.edit') }}
                            </x-base.button>
                        @endcan
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full">
                <div class="box p-10 text-center">
                    <x-base.lucide icon="Users" class="w-16 h-16 text-slate-400 mx-auto mb-5" />
                    <h3 class="text-xl font-medium text-slate-800 dark:text-slate-200 mb-2">
                        {{ __('global.no_children_found') }}
                    </h3>
                    <p class="text-slate-500 mb-6">
                        {{ __('global.no_children_description') }}
                    </p>
                    @can('create_children')
                        <x-base.button 
                            variant="primary" 
                            as="a" 
                            href="{{ route('children.create') }}" 
                            class="flex items-center mx-auto"
                        >
                            <x-base.lucide icon="UserPlus" class="w-4 h-4 mr-2" />
                            {{ __('global.add_first_child') }}
                        </x-base.button>
                    @endcan
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($childrens->hasPages())
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-6">
            <div class="mx-auto">
                {{ $childrens->links() }}
            </div>
        </div>
    @endif

    <!-- Add JavaScript for filtering -->
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const classFilter = document.getElementById('classFilter');
            const statusFilter = document.getElementById('statusFilter');
            const applyFilters = document.getElementById('applyFilters');
            const resetFilters = document.getElementById('resetFilters');
            
            // Apply filters
            applyFilters?.addEventListener('click', function() {
                const searchTerm = searchInput?.value || '';
                const classId = classFilter?.value || '';
                const status = statusFilter?.value || '';
                
                // Build query parameters
                const params = new URLSearchParams();
                if (searchTerm) params.set('search', searchTerm);
                if (classId) params.set('class_id', classId);
                if (status) params.set('status', status);
                
                // Redirect with filters
                window.location.href = `{{ route('children.index') }}?${params.toString()}`;
            });
            
            // Reset filters
            resetFilters?.addEventListener('click', function() {
                searchInput.value = '';
                classFilter.value = '';
                statusFilter.value = '';
                window.location.href = '{{ route('children.index') }}';
            });
            
            // Auto-apply search on enter
            searchInput?.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    applyFilters.click();
                }
            });
            
            // Live search functionality
            let searchTimeout;
            searchInput?.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    const searchTerm = this.value.toLowerCase();
                    const cards = document.querySelectorAll('#childrenGrid > div');
                    
                    cards.forEach(card => {
                        const nameElement = card.querySelector('h3');
                        const classNameElement = card.querySelector('.text-right .font-medium');
                        const parentNameElement = card.querySelector('[class*="truncate"]');
                        
                        const name = nameElement?.textContent.toLowerCase() || '';
                        const className = classNameElement?.textContent.toLowerCase() || '';
                        const parentName = parentNameElement?.textContent.toLowerCase() || '';
                        
                        const matches = name.includes(searchTerm) || 
                                       className.includes(searchTerm) || 
                                       parentName.includes(searchTerm);\                        
                        card.style.display = matches ? 'block' : 'none';
                    });
                }, 300);
            });
        });
    </script>
    @endpush
@endsection
