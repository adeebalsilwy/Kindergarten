@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Fee.list') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('Fee.list') }}</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            @can('export_fees')
            
                        <div class="flex gap-2">
                            <x-base.button variant="outline-primary" as="a" href="{{ route('fees.export.pdf') }}" class="flex items-center">
                                <x-base.lucide icon="FileText" class="w-4 h-4 mr-2" />
                                {{ __('global.export_pdf') }}
                            </x-base.button>
                            <x-base.button variant="outline-success" as="a" href="{{ route('fees.export.excel') }}" class="flex items-center">
                                <x-base.lucide icon="FileSpreadsheet" class="w-4 h-4 mr-2" />
                                {{ __('global.export_excel') }}
                            </x-base.button>
                        </div>
            @endcan
            
            @can('create_fees')
            <x-base.button variant="primary" as="a" href="{{ route('fees.create') }}" class="ml-2 flex items-center">
                <x-base.lucide icon="Plus" class="w-4 h-4 mr-2" />
                {{ __('Fee.add_new') }}
            </x-base.button>
            @endcan
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- Filter Section -->
        <div class="intro-y col-span-12">
            <div class="box p-5">
                <form method="GET" action="{{ route('fees.index') }}">
                    <div class="flex flex-col lg:flex-row gap-4">
                        <div class="flex-1">
                            <div class="relative">
                                <x-base.form-input 
                                    type="text" 
                                    name="search"
                                    value="{{ request('search') }}"
                                    placeholder="{{ __('global.search_fees') }}..." 
                                    class="w-full pl-10 pr-4 py-2"
                                />
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <x-base.lucide icon="Search" class="h-5 w-5 text-gray-400" />
                                </div>
                            </div>
                        </div>
                        <div class="w-full lg:w-48">
                            <select name="is_active" class="form-select w-full box">
                                <option value="">{{ __('global.all_status') }}</option>
                                <option value="1" {{ request('is_active') == '1' ? 'selected' : '' }}>{{ __('global.active') }}</option>
                                <option value="0" {{ request('is_active') == '0' ? 'selected' : '' }}>{{ __('global.inactive') }}</option>
                            </select>
                        </div>
                        <div class="flex gap-2">
                            <x-base.button as="a" href="{{ route('fees.index') }}" variant="secondary" class="flex items-center">
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
        </div>

        <!-- Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <x-base.table class="table-report -mt-2">
                <x-base.table.thead>
                    <x-base.table.tr>
@php
    $canEdit = auth()->user()->can('edit_fees');
    $canDelete = auth()->user()->can('delete_fees');
    $canView = auth()->user()->can('view_fees');
@endphp
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('fees.fields.name') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('fees.fields.amount') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('fees.fields.is_active') }}</x-base.table.th>

                        @if($canEdit || $canDelete || $canView)
                        <x-base.table.th class="text-center whitespace-nowrap">{{ __('global.actions') }}</x-base.table.th>
                        @endif
                    </x-base.table.tr>
                </x-base.table.thead>
                <x-base.table.tbody>
                    @forelse($fees as $fee)
                        <x-base.table.tr class="intro-x">
                            <x-base.table.td class="text-center">{{ $fee->name ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $fee->amount ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">
                                <div class="flex items-center justify-center {{ $fee->is_active ? 'text-success' : 'text-danger' }}"> <x-base.lucide icon="{{ $fee->is_active ? 'CheckSquare' : 'XSquare' }}" class="w-4 h-4 mr-2" /> {{ $fee->is_active ? __('global.yes') : __('global.no') }} </div>
                            </x-base.table.td>

                            @if($canEdit || $canDelete || $canView)
                            <x-base.table.td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    @can('view_fees')
                                    <x-base.button variant="outline-secondary" as="a" href="{{ route('fees.show', $fee->id) }}" size="sm" class="mr-2">
                                        <x-base.lucide icon="Eye" class="w-4 h-4 mr-1" />
                                        {{ __('global.view') }}
                                    </x-base.button>
                                    @endcan
                                    
                                    @can('edit_fees')
                                    <x-base.button variant="outline-primary" as="a" href="{{ route('fees.edit', $fee->id) }}" size="sm" class="mr-2">
                                        <x-base.lucide icon="Pencil" class="w-4 h-4 mr-1" />
                                        {{ __('global.edit') }}
                                    </x-base.button>
                                    @endcan
                                    
                                    @can('delete_fees')
                                    <form action="{{ route('fees.destroy', $fee->id) }}" method="POST" onsubmit="return confirm('{{ __('global.confirm_delete') }}')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <x-base.button variant="outline-danger" type="submit" size="sm">
                                            <x-base.lucide icon="Trash2" class="w-4 h-4 mr-1" />
                                            {{ __('global.delete') }}
                                        </x-base.button>
                                    </form>
                                    @endcan
                                </div>
                            </x-base.table.td>
                            @endif
                        </x-base.table.tr>

                    @empty
                        <x-base.table.tr>
                            <x-base.table.td colspan="{{ 3 + ($canEdit || $canDelete || $canView ? 1 : 0) }}" class="text-center py-10">
                                <div class="flex flex-col items-center justify-center">
                                    <x-base.lucide icon="Inbox" class="w-16 h-16 text-gray-400 mb-4" />
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('global.no_data_found') }}</h3>
                                    <p class="text-gray-500 dark:text-gray-400 mt-1">{{ __('global.no_data_description') }}</p>
                                    <x-base.button variant="primary" as="a" href="{{ route('fees.create') }}" class="mt-4">
                                        <x-base.lucide icon="Plus" class="w-4 h-4 mr-2" />
                                        {{ __('Fee.add_new') }}
                                    </x-base.button>
                                </div>
                            </x-base.table.td>
                        </x-base.table.tr>
                    @endforelse
                </x-base.table.tbody>
            </x-base.table>
        </div>

        <!-- Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            {!! $fees->links() !!}
        </div>

        <!-- Summary Cards -->
        @if($fees->count() > 0)
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
                    <div class="text-3xl font-bold leading-8 mt-6">{{ $fees->count() }}</div>
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
                            $recentCount = $fees->filter(function($fee) {
                                return $fee->created_at >= \Carbon\Carbon::now()->subDays(7);
                            })->count();
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
                            $todayCount = $fees->filter(function($fee) {
                                return $fee->created_at->isToday();
                            })->count();
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
