@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Materials.list') }} - Laravel</title>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/pages/materials.css') }}">
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('Materials.list') }}</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            @can('export_materials')
                        <div class="flex gap-2">
                            <x-base.button variant="outline-primary" as="a" href="{{ route('materials.export.pdf') }}" class="flex items-center">
                                <x-base.lucide icon="FileText" class="w-4 h-4 me-2" />
                                {{ __('global.export_pdf') }}
                            </x-base.button>
                            <x-base.button variant="outline-success" as="a" href="{{ route('materials.export.excel') }}" class="flex items-center">
                                <x-base.lucide icon="FileSpreadsheet" class="w-4 h-4 me-2" />
                                {{ __('global.export_excel') }}
                            </x-base.button>
                        </div>
            @endcan
            
            @can('create_materials')
            <x-base.button variant="primary" as="a" href="{{ route('materials.create') }}" class="ms-2 flex items-center">
                <x-base.lucide icon="Plus" class="w-4 h-4 me-2" />
                {{ __('Materials.add_new') }}
            </x-base.button>
            @endcan
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- Advanced Filter Section -->
        <div class="intro-y col-span-12">
            <div class="box p-5 curriculum-filters">
                <h3 class="text-md font-medium mb-4 flex items-center">
                    <x-base.lucide icon="Filter" class="w-4 h-4 me-2" />
                    {{ __('global.filters') }}
                </h3>
                <form id="filterForm" method="GET" action="{{ route('materials.index') }}">
                    <div class="filter-row">
                        <div class="filter-group">
                            <x-base.form-label>{{ __('materials.fields.name') }}</x-base.form-label>
                            <x-base.form-input type="text" name="name" value="{{ request('name') }}" placeholder="{{ __('materials.fields.name') }}" />
                        </div>
                        <div class="filter-group">
                            <x-base.form-label>{{ __('materials.fields.category') }}</x-base.form-label>
                            <x-base.form-input type="text" name="category" value="{{ request('category') }}" placeholder="{{ __('materials.fields.category') }}" />
                        </div>
                        <div class="filter-group">
                            <x-base.form-label>{{ __('materials.fields.type') }}</x-base.form-label>
                            <x-base.form-input type="text" name="type" value="{{ request('type') }}" placeholder="{{ __('materials.fields.type') }}" />
                        </div>
                        <div class="filter-group">
                            <x-base.form-label>{{ __('materials.fields.is_active') }}</x-base.form-label>
                            <x-base.tom-select name="is_active">
                                <option value="">{{ __('global.all') }}</option>
                                <option value="1" {{ request('is_active') === '1' ? 'selected' : '' }}>{{ __('global.active') }}</option>
                                <option value="0" {{ request('is_active') === '0' ? 'selected' : '' }}>{{ __('global.inactive') }}</option>
                            </x-base.tom-select>
                        </div>
                    </div>
                    <div class="filter-row mt-3">
                        <div class="filter-group">
                            <x-base.form-label>{{ __('materials.fields.is_consumable') }}</x-base.form-label>
                            <x-base.tom-select name="is_consumable">
                                <option value="">{{ __('global.all') }}</option>
                                <option value="1" {{ request('is_consumable') === '1' ? 'selected' : '' }}>{{ __('global.yes') }}</option>
                                <option value="0" {{ request('is_consumable') === '0' ? 'selected' : '' }}>{{ __('global.no') }}</option>
                            </x-base.tom-select>
                        </div>
                        <div class="filter-group">
                            <x-base.form-label>{{ __('materials.fields.is_digital') }}</x-base.form-label>
                            <x-base.tom-select name="is_digital">
                                <option value="">{{ __('global.all') }}</option>
                                <option value="1" {{ request('is_digital') === '1' ? 'selected' : '' }}>{{ __('global.yes') }}</option>
                                <option value="0" {{ request('is_digital') === '0' ? 'selected' : '' }}>{{ __('global.no') }}</option>
                            </x-base.tom-select>
                        </div>
                        <div class="filter-group">
                            <x-base.form-label>{{ __('global.sort_by') }}</x-base.form-label>
                            <x-base.tom-select name="sort_by">
                                <option value="created_at" {{ request('sort_by') === 'created_at' ? 'selected' : '' }}>{{ __('global.date_created') }}</option>
                                <option value="name" {{ request('sort_by') === 'name' ? 'selected' : '' }}>{{ __('materials.fields.name') }}</option>
                                <option value="category" {{ request('sort_by') === 'category' ? 'selected' : '' }}>{{ __('materials.fields.category') }}</option>
                                <option value="quantity_available" {{ request('sort_by') === 'quantity_available' ? 'selected' : '' }}>{{ __('materials.fields.quantity_available') }}</option>
                            </x-base.tom-select>
                        </div>
                        <div class="filter-group">
                            <x-base.form-label>{{ __('global.sort_direction') }}</x-base.form-label>
                            <x-base.tom-select name="sort_direction">
                                <option value="desc" {{ request('sort_direction') === 'desc' ? 'selected' : '' }}>{{ __('global.descending') }}</option>
                                <option value="asc" {{ request('sort_direction') === 'asc' ? 'selected' : '' }}>{{ __('global.ascending') }}</option>
                            </x-base.tom-select>
                        </div>
                    </div>
                    <div class="filter-actions">
                        <x-base.button variant="primary" type="submit" class="flex items-center">
                            <x-base.lucide icon="Search" class="w-4 h-4 me-2" />
                            {{ __('global.apply_filters') }}
                        </x-base.button>
                        <a href="{{ route('materials.index') }}" class="btn btn-outline-secondary flex items-center">
                            <x-base.lucide icon="RefreshCw" class="w-4 h-4 me-2" />
                            {{ __('global.clear_filters') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Data List -->
        <div class="intro-y col-span-12 overflow-x-auto">
            <x-base.table class="curriculum-table table-report -mt-2 min-w-full">
                <x-base.table.thead>
                    <x-base.table.tr>
@php
    $canEdit = auth()->user()->can('update_materials');
    $canDelete = auth()->user()->can('delete_materials');
    $canView = auth()->user()->can('view_materials');
@endphp
                        <x-base.table.th class="whitespace-nowrap text-center">{{ __('materials.fields.name') }}</x-base.table.th>
                        <x-base.table.th class="whitespace-nowrap text-center">{{ __('materials.fields.category') }}</x-base.table.th>
                        <x-base.table.th class="whitespace-nowrap text-center">{{ __('materials.fields.type') }}</x-base.table.th>
                        <x-base.table.th class="whitespace-nowrap text-center">{{ __('materials.fields.quantity_available') }}</x-base.table.th>
                        <x-base.table.th class="whitespace-nowrap text-center">{{ __('materials.fields.quantity_required') }}</x-base.table.th>
                        <x-base.table.th class="whitespace-nowrap text-center">{{ __('materials.fields.unit_cost') }}</x-base.table.th>
                        <x-base.table.th class="whitespace-nowrap text-center">{{ __('materials.fields.supplier') }}</x-base.table.th>
                        <x-base.table.th class="whitespace-nowrap text-center">{{ __('materials.fields.storage_location') }}</x-base.table.th>
                        <x-base.table.th class="whitespace-nowrap text-center">{{ __('materials.fields.is_consumable') }}</x-base.table.th>
                        <x-base.table.th class="whitespace-nowrap text-center">{{ __('materials.fields.is_digital') }}</x-base.table.th>
                        <x-base.table.th class="whitespace-nowrap text-center">{{ __('materials.fields.is_active') }}</x-base.table.th>

                        @if($canEdit || $canDelete || $canView)
                        <x-base.table.th class="text-center whitespace-nowrap">{{ __('global.actions') }}</x-base.table.th>
                        @endif
                    </x-base.table.tr>
                </x-base.table.thead>
                <x-base.table.tbody>
                    @forelse($materials as $material)
                        <x-base.table.tr class="intro-x">
                            <x-base.table.td class="text-center truncate max-w-xs">{{ $material->name }}</x-base.table.td>
                            <x-base.table.td class="text-center truncate max-w-xs">{{ $material->category ?: '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center truncate max-w-xs">{{ $material->type ?: '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $material->quantity_available }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $material->quantity_required }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $material->unit_cost ? '€' . number_format($material->unit_cost, 2) : '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center truncate max-w-xs">{{ $material->supplier ?: '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center truncate max-w-xs">{{ $material->storage_location ?: '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">
                                <span class="status-badge {{ $material->is_consumable ? 'status-active' : 'status-inactive' }}">
                                    {{ $material->is_consumable ? __('global.yes') : __('global.no') }}
                                </span>
                            </x-base.table.td>
                            <x-base.table.td class="text-center">
                                <span class="status-badge {{ $material->is_digital ? 'status-active' : 'status-inactive' }}">
                                    {{ $material->is_digital ? __('global.yes') : __('global.no') }}
                                </span>
                            </x-base.table.td>
                            <x-base.table.td class="text-center">
                                <span class="status-badge {{ $material->is_active ? 'status-active' : 'status-inactive' }}">
                                    {{ $material->is_active ? __('global.active') : __('global.inactive') }}
                                </span>
                            </x-base.table.td>

                            @if($canEdit || $canDelete || $canView)
                            <x-base.table.td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    @can('view_materials')
                                    <x-base.button variant="outline-secondary" as="a" href="{{ route('materials.show', $material->id) }}" size="sm" class="me-2">
                                        <x-base.lucide icon="Eye" class="w-4 h-4 me-1" />
                                        {{ __('global.view') }}
                                    </x-base.button>
                                    @endcan
                                    
                                    @can('update_materials')
                                    <x-base.button variant="outline-primary" as="a" href="{{ route('materials.edit', $material->id) }}" size="sm" class="me-2">
                                        <x-base.lucide icon="Pencil" class="w-4 h-4 me-1" />
                                        {{ __('global.edit') }}
                                    </x-base.button>
                                    @endcan
                                    
                                    @can('delete_materials')
                                    <form action="{{ route('materials.destroy', $material->id) }}" method="POST" onsubmit="return confirm('{{ __('global.confirm_delete') }}')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <x-base.button variant="outline-danger" type="submit" size="sm">
                                            <x-base.lucide icon="Trash2" class="w-4 h-4 me-1" />
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
                            <x-base.table.td colspan="{{ 11 + ($canEdit || $canDelete || $canView ? 1 : 0) }}" class="text-center py-10">
                                <div class="flex flex-col items-center justify-center">
                                    <x-base.lucide icon="Inbox" class="w-16 h-16 text-gray-400 mb-4" />
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('global.no_data_found') }}</h3>
                                    <p class="text-gray-500 dark:text-gray-400 mt-1">{{ __('global.no_data_description') }}</p>
                                    <x-base.button variant="primary" as="a" href="{{ route('materials.create') }}" class="mt-4">
                                        <x-base.lucide icon="Plus" class="w-4 h-4 me-2" />
                                        {{ __('Materials.add_new') }}
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
            {!! $materials->appends(request()->query())->links() !!}
        </div>

        <!-- Summary Cards -->
        @if($materials->count() > 0)
        <div class="intro-y col-span-12 grid grid-cols-1 md:grid-cols-4 gap-6 mt-6">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex items-center">
                        <x-base.lucide icon="Database" class="w-8 h-8 text-primary" />
                        <div class="ms-auto">
                            <div class="report-box__indicator bg-success"> 
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4" /> 
                            </div>
                        </div>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">{{ $materials->count() }}</div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.total_materials') }}</div>
                </div>
            </div>
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex items-center">
                        <x-base.lucide icon="Package" class="w-8 h-8 text-success" />
                        <div class="ms-auto">
                            <div class="report-box__indicator bg-success"> 
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4" /> 
                            </div>
                        </div>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">
                        {{ $materials->sum('quantity_available') }}
                    </div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.total_quantity') }}</div>
                </div>
            </div>
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex items-center">
                        <x-base.lucide icon="ShoppingBag" class="w-8 h-8 text-warning" />
                        <div class="ms-auto">
                            <div class="report-box__indicator bg-success"> 
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4" /> 
                            </div>
                        </div>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">
                        {{ $materials->where('is_consumable', true)->count() }}
                    </div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.consumable_materials') }}</div>
                </div>
            </div>
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex items-center">
                        <x-base.lucide icon="Monitor" class="w-8 h-8 text-info" />
                        <div class="ms-auto">
                            <div class="report-box__indicator bg-success"> 
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4" /> 
                            </div>
                        </div>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">
                        {{ $materials->where('is_digital', true)->count() }}
                    </div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.digital_materials') }}</div>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection