@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('kindergarten.parents.title') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('kindergarten.parents.title') }}</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            @can('export_parents')
            
                        <div class="flex gap-2">
                            <x-base.button variant="outline-primary" as="a" href="{{ route('parents.export.pdf') }}" class="flex items-center">
                                <x-base.lucide icon="FileText" class="w-4 h-4 mr-2" />
                                {{ __('global.export_pdf') }}
                            </x-base.button>
                            <x-base.button variant="outline-success" as="a" href="{{ route('parents.export.excel') }}" class="flex items-center">
                                <x-base.lucide icon="FileSpreadsheet" class="w-4 h-4 mr-2" />
                                {{ __('global.export_excel') }}
                            </x-base.button>
                        </div>
            @endcan
            
            @can('create_parents')
            <x-base.button variant="primary" as="a" href="{{ route('parents.create') }}" class="ml-2 flex items-center">
                <x-base.lucide icon="Plus" class="w-4 h-4 mr-2" />
                {{ __('kindergarten.parents.add_new') }}
            </x-base.button>
            @endcan
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- Filter Section -->
        <div class="intro-y col-span-12">
            <div class="box p-5">
                <div class="flex flex-col sm:flex-row gap-4">
                    <div class="flex-1">
                        <x-base.form-input type="text" placeholder="{{ __('global.search') }}" class="w-full" />
                    </div>
                    <x-base.button variant="secondary" class="flex items-center">
                        <x-base.lucide icon="Filter" class="w-4 h-4 mr-2" />
                        {{ __('global.filter') }}
                    </x-base.button>
                </div>
            </div>
        </div>

        <!-- Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <x-base.table class="table-report -mt-2">
                <x-base.table.thead>
                    <x-base.table.tr>
@php
    $canEdit = auth()->user()->can('edit_parents');
    $canDelete = auth()->user()->can('delete_parents');
    $canView = auth()->user()->can('view_parents');
@endphp
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('kindergarten.parents.name') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('kindergarten.parents.phone') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('kindergarten.parents.relation') }}</x-base.table.th>
            {{ $parents->links() }}
        </div>

        <!-- Summary Cards -->
        @if($parents->count() > 0)
        <div class="intro-y col-span-12 grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex items-center">
                        <x-base.lucide icon="Database" class="w-8 h-8 text-primary" />
                        <div class="ml-auto">
                            <div class="report-box__indicator bg-success"> 
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4" /> 
                            </div>
                        </div>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">{{ $parents->count() }}</div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.total_records') }}</div>
                </div>
            </div>
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex items-center">
                        <x-base.lucide icon="Activity" class="w-8 h-8 text-pending" />
                        <div class="ml-auto">
                            <div class="report-box__indicator bg-success"> 
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4" /> 
                            </div>
                        </div>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">
                        @php
                            $recentCount = $parents->where('created_at', '>=', now()->subDays(7))->count();
                        @endphp
                        {{ $recentCount }}
                    </div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.added_this_week') }}</div>
                </div>
            </div>
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex items-center">
                        <x-base.lucide icon="Calendar" class="w-8 h-8 text-success" />
                        <div class="ml-auto">
                            <div class="report-box__indicator bg-success"> 
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4" /> 
                            </div>
                        </div>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">
                        @php
                            $todayCount = $parents->whereDate('created_at', today())->count();
                        @endphp
                        {{ $todayCount }}
                    </div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.added_today') }}</div>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection
