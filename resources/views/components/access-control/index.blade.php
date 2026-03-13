@props([
    'title' => 'Access Control',
    'items' => [],
    'columns' => [],
    'filters' => [],
    'searchPlaceholder' => 'Search...',
    'createUrl' => null,
    'bulkActions' => [],
    'showStats' => true,
    'stats' => [],
    'pagination' => null,
    'viewType' => 'table', // table, grid, list
    'sortable' => true,
    'searchable' => true,
    'filterable' => true,
    'exportable' => true,
    'importable' => false,
    'resourceRoute' => null, // e.g. 'roles' or 'users'
])

<div class="access-control-index">
    <!-- Header Section -->
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __($title) }}</h2>
        <div class="w-full sm:w-auto flex flex-wrap gap-2 mt-4 sm:mt-0">
            @if(isset($actions))
                {{ $actions }}
            @endif

            @if($importable)
                <x-base.button variant="outline-secondary" class="flex items-center">
                    <x-base.lucide icon="Upload" class="w-4 h-4 me-2" />
                    {{ __('access_control.actions.import') }}
                </x-base.button>
            @endif
            
            @if($exportable)
                <div class="dropdown">
                    <x-base.button variant="outline-secondary" class="flex items-center" data-tw-toggle="dropdown">
                        <x-base.lucide icon="Download" class="w-4 h-4 me-2" />
                        {{ __('access_control.actions.export') }}
                        <x-base.lucide icon="ChevronDown" class="w-4 h-4 ms-2" />
                    </x-base.button>
                    <div class="dropdown-menu w-40">
                        <div class="dropdown-content">
                            <a href="{{ request()->fullUrlWithQuery(['export' => 'pdf']) }}" class="dropdown-item flex items-center">
                                <x-base.lucide icon="FileText" class="w-4 h-4 me-2" />
                                {{ __('access_control.actions.export_pdf') }}
                            </a>
                            <a href="{{ request()->fullUrlWithQuery(['export' => 'excel']) }}" class="dropdown-item flex items-center">
                                <x-base.lucide icon="FileSpreadsheet" class="w-4 h-4 me-2" />
                                {{ __('access_control.actions.export_excel') }}
                            </a>
                        </div>
                    </div>
                </div>
            @endif
            
            @if($createUrl)
                <x-base.button variant="primary" as="a" href="{{ $createUrl }}" class="flex items-center shadow-md">
                    <x-base.lucide icon="Plus" class="w-4 h-4 me-2" />
                    {{ __('access_control.actions.add_new') }}
                </x-base.button>
            @endif
        </div>
    </div>

    <!-- Statistics Cards -->
    @if($showStats && !empty($stats))
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-5">
            @foreach($stats as $stat)
                <div class="intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5 border {{ $stat['border'] ?? 'border-primary/20' }} {{ $stat['bg'] ?? 'bg-primary/5' }}">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-full {{ $stat['icon_bg'] ?? 'bg-primary/10' }} flex items-center justify-center">
                                    <x-base.lucide icon="{{ $stat['icon'] ?? 'Database' }}" class="w-6 h-6 {{ $stat['icon_color'] ?? 'text-primary' }}" />
                                </div>
                                <div class="ms-auto">
                                    <div class="text-success flex items-center">
                                        <x-base.lucide icon="TrendingUp" class="w-4 h-4 me-1" />
                                        <span class="text-xs">{{ $stat['trend'] ?? __('access_control.fields.total') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-2xl font-bold leading-8 mt-4">{{ $stat['value'] }}</div>
                            <div class="text-sm text-slate-600 mt-1">{{ __($stat['label']) }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <!-- Filter and Search Section -->
    @if($filterable || $searchable)
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12">
                <div class="box p-5">
                    <form method="GET" action="{{ request()->url() }}">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-6 gap-4">
                            @if($searchable)
                                <div>
                                    <x-base.form-label>{{ __('access_control.actions.search') }}</x-base.form-label>
                                    <x-base.form-input 
                                        name="search" 
                                        value="{{ request('search') }}" 
                                        placeholder="{{ __('access_control.actions.search') }}" 
                                        class="w-full"
                                    />
                                </div>
                            @endif
                            
                            @foreach($filters as $filter)
                                <div>
                                    <x-base.form-label>{{ __($filter['label']) }}</x-base.form-label>
                                    @if($filter['type'] === 'select')
                                        <x-base.tom-select name="{{ $filter['name'] }}" class="w-full">
                                            <option value="">{{ __($filter['placeholder'] ?? 'access_control.actions.all') }}</option>
                                            @foreach($filter['options'] as $option)
                                                <option value="{{ $option['value'] }}" {{ request($filter['name']) == $option['value'] ? 'selected' : '' }}>
                                                    {{ __($option['label']) }}
                                                </option>
                                            @endforeach
                                        </x-base.tom-select>
                                    @elseif($filter['type'] === 'date')
                                        <x-base.form-input 
                                            name="{{ $filter['name'] }}" 
                                            type="date" 
                                            value="{{ request($filter['name']) }}" 
                                            class="w-full"
                                        />
                                    @endif
                                </div>
                            @endforeach
                            
                            <div class="flex items-end gap-2">
                                <x-base.button type="submit" variant="primary" class="flex-1">
                                    <x-base.lucide icon="Filter" class="w-4 h-4 me-2" />
                                    {{ __('access_control.actions.filter') }}
                                </x-base.button>
                                <x-base.button type="button" variant="outline-secondary" class="px-3" onclick="clearFilters()">
                                    <x-base.lucide icon="X" class="w-4 h-4" />
                                </x-base.button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    <!-- View Toggle -->
    <div class="intro-y flex flex-col sm:flex-row items-center mt-5">
        <div class="flex items-center gap-2 mb-4 sm:mb-0">
            @if(method_exists($items, 'firstItem'))
                <span class="text-sm text-slate-600">{{ __('access_control.messages.showing') }} {{ $items->firstItem() ?? 0 }} {{ __('access_control.messages.to') }} {{ $items->lastItem() ?? 0 }} {{ __('access_control.messages.of') }} {{ $items->total() }} {{ __('access_control.messages.results') }}</span>
            @else
                <span class="text-sm text-slate-600">{{ __('access_control.messages.showing') }} {{ $items->count() }} {{ __('access_control.messages.results') }}</span>
            @endif
        </div>
        <div class="flex items-center gap-2">
            <span class="text-sm text-slate-600 me-2">{{ __('access_control.actions.view') }}:</span>
            <div class="flex border border-slate-200 rounded-md overflow-hidden">
                <button type="button" title="{{ __('access_control.actions.view_table') }}" class="px-3 py-1.5 text-sm {{ $viewType === 'table' ? 'bg-primary text-white' : 'bg-white text-slate-600 hover:bg-slate-50' }}" onclick="changeView('table')">
                    <x-base.lucide icon="Table" class="w-4 h-4" />
                </button>
                <button type="button" title="{{ __('access_control.actions.view_grid') }}" class="px-3 py-1.5 text-sm {{ $viewType === 'grid' ? 'bg-primary text-white' : 'bg-white text-slate-600 hover:bg-slate-50' }}" onclick="changeView('grid')">
                    <x-base.lucide icon="Grid" class="w-4 h-4" />
                </button>
            </div>
        </div>
    </div>

    <!-- Content Area -->
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12">
            @if($viewType === 'table')
                <!-- Table View -->
                <div class="overflow-x-auto">
                    <x-base.table class="table-report -mt-2">
                        <x-base.table.thead>
                            <x-base.table.tr>
                                @if(!empty($bulkActions))
                                    <x-base.table.th class="w-10">
                                        <x-base.form-check.input type="checkbox" id="selectAll" />
                                    </x-base.table.th>
                                @endif
                                @foreach($columns as $column)
                                    <x-base.table.th class="{{ $column['class'] ?? 'whitespace-nowrap' }}">
                                        @if($sortable && ($column['sortable'] ?? true))
                                            <a href="{{ request()->fullUrlWithQuery(['sort' => $column['key'], 'direction' => (request('sort') == $column['key'] && request('direction') == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center">
                                                {{ __($column['label']) }}
                                                @if(request('sort') == $column['key'])
                                                    <x-base.lucide icon="{{ request('direction') == 'asc' ? 'ChevronUp' : 'ChevronDown' }}" class="w-4 h-4 ms-1" />
                                                @endif
                                            </a>
                                        @else
                                            {{ __($column['label']) }}
                                        @endif
                                    </x-base.table.th>
                                @endforeach
                                <x-base.table.th class="text-center whitespace-nowrap">{{ __('access_control.fields.actions') }}</x-base.table.th>
                            </x-base.table.tr>
                        </x-base.table.thead>
                        <x-base.table.tbody>
                            @forelse($items as $item)
                                <x-base.table.tr class="intro-x">
                                    @if(!empty($bulkActions))
                                        <x-base.table.td>
                                            <x-base.form-check.input type="checkbox" name="selected_items[]" value="{{ $item->id }}" class="item-checkbox" />
                                        </x-base.table.td>
                                    @endif
                                    @foreach($columns as $column)
                                        <x-base.table.td class="{{ $column['td_class'] ?? '' }}">
                                            @if(isset($column['render']))
                                                {!! $column['render']($item) !!}
                                            @else
                                                @if(isset($column['relation']))
                                                    @php
                                                        $value = $item;
                                                        foreach(explode('.', $column['relation']) as $relation) {
                                                            $value = $value->$relation ?? null;
                                                        }
                                                    @endphp
                                                    {{ $value }}
                                                @else
                                                    {{ $item->{$column['key']} ?? '-' }}
                                                @endif
                                            @endif
                                        </x-base.table.td>
                                    @endforeach
                                    <x-base.table.td class="table-report__action w-56">
                                        <div class="flex justify-center items-center gap-2">
                                            @if($resourceRoute)
                                                <x-base.button variant="outline-primary" as="a" href="{{ route($resourceRoute . '.show', $item->id) }}" size="sm" class="px-2 py-1">
                                                    <x-base.lucide icon="Eye" class="w-3 h-3 me-1" />
                                                    {{ __('access_control.actions.view') }}
                                                </x-base.button>
                                                <x-base.button variant="outline-secondary" as="a" href="{{ route($resourceRoute . '.edit', $item->id) }}" size="sm" class="px-2 py-1">
                                                    <x-base.lucide icon="Pencil" class="w-3 h-3 me-1" />
                                                    {{ __('access_control.actions.edit') }}
                                                </x-base.button>
                                                <x-base.button 
                                                    variant="outline-danger" 
                                                    size="sm" 
                                                    class="px-2 py-1 delete-btn"
                                                    data-id="{{ $item->id }}"
                                                    data-name="{{ $item->name ?? $item->title ?? '' }}"
                                                    data-delete-url="{{ route($resourceRoute . '.destroy', $item->id) }}"
                                                    data-tw-toggle="modal"
                                                    data-tw-target="#delete-confirmation-modal"
                                                >
                                                    <x-base.lucide icon="Trash2" class="w-3 h-3 me-1" />
                                                    {{ __('access_control.actions.delete') }}
                                                </x-base.button>
                                            @else
                                                <x-base.button variant="outline-primary" size="sm" class="px-2 py-1">
                                                    <x-base.lucide icon="Eye" class="w-3 h-3 me-1" />
                                                    {{ __('access_control.actions.view') }}
                                                </x-base.button>
                                                <x-base.button variant="outline-secondary" size="sm" class="px-2 py-1">
                                                    <x-base.lucide icon="Pencil" class="w-3 h-3 me-1" />
                                                    {{ __('access_control.actions.edit') }}
                                                </x-base.button>
                                                <x-base.button variant="outline-danger" size="sm" class="px-2 py-1">
                                                    <x-base.lucide icon="Trash2" class="w-3 h-3 me-1" />
                                                    {{ __('access_control.actions.delete') }}
                                                </x-base.button>
                                            @endif
                                        </div>
                                    </x-base.table.td>
                                </x-base.table.tr>
                            @empty
                                <x-base.table.tr>
                                    <x-base.table.td colspan="{{ count($columns) + (empty($bulkActions) ? 1 : 2) }}" class="text-center py-10">
                                        <x-base.lucide icon="Database" class="w-16 h-16 text-slate-400 mx-auto mb-5" />
                                        <h3 class="text-xl font-medium text-slate-800 dark:text-slate-200 mb-2">
                                            {{ __('access_control.messages.no_data') }}
                                        </h3>
                                        <p class="text-slate-600 dark:text-slate-400 mb-6">
                                            {{ __('access_control.messages.start_by_adding') }}
                                        </p>
                                        @if($createUrl)
                                            <x-base.button variant="primary" as="a" href="{{ $createUrl }}" class="flex items-center mx-auto">
                                                <x-base.lucide icon="Plus" class="w-4 h-4 me-2" />
                                                {{ __('access_control.actions.add_first') }}
                                            </x-base.button>
                                        @endif
                                    </x-base.table.td>
                                </x-base.table.tr>
                            @endforelse
                        </x-base.table.tbody>
                    </x-base.table>
                </div>
            @else
                <!-- Grid/List View -->
                <div id="itemsContainer" class="{{ $viewType === 'grid' ? 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6' : 'space-y-4' }}">
                    @forelse($items as $item)
                        <div class="intro-y box zoom-in shadow-md border border-slate-200/60 dark:border-darkmode-400 {{ $viewType === 'list' ? 'flex items-center p-4' : 'p-5' }}">
                            <div class="{{ $viewType === 'list' ? 'flex-shrink-0 me-4' : 'flex items-start mb-4' }}">
                                <div class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center">
                                    <x-base.lucide icon="User" class="w-6 h-6 text-primary" />
                                </div>
                            </div>
                            <div class="{{ $viewType === 'list' ? 'flex-1' : '' }}">
                                <div class="font-medium text-base">{{ $item->name ?? $item->title ?? '-' }}</div>
                                <div class="text-slate-500 text-sm mt-1">
                                    {{ $item->email ?? $item->description ?? '' }}
                                </div>
                                <div class="mt-3 space-y-2">
                                    @foreach($columns as $column)
                                        @if(!in_array($column['key'], ['name', 'title', 'email', 'description']))
                                            <div class="flex justify-between text-xs">
                                                <span class="text-slate-600 dark:text-slate-300">{{ __($column['label']) }}:</span>
                                                <span class="font-medium">
                                                    @if(isset($column['relation']))
                                                        @php
                                                            $value = $item;
                                                            foreach(explode('.', $column['relation']) as $relation) {
                                                                $value = $value->$relation ?? null;
                                                            }
                                                        @endphp
                                                        {{ $value ?? '-' }}
                                                    @else
                                                        {{ $item->{$column['key']} ?? '-' }}
                                                    @endif
                                                </span>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="{{ $viewType === 'list' ? 'flex items-center gap-2 ms-4' : 'flex justify-between items-center mt-4 pt-4 border-t border-slate-200/60 dark:border-darkmode-400' }}">
                                <div class="text-xs text-slate-500">
                                    ID: {{ $item->id }}
                                </div>
                                <div class="flex gap-1">
                                    <x-base.button variant="outline-primary" size="sm" class="px-2 py-1">
                                        <x-base.lucide icon="Eye" class="w-3 h-3" />
                                    </x-base.button>
                                    <x-base.button variant="outline-secondary" size="sm" class="px-2 py-1">
                                        <x-base.lucide icon="Pencil" class="w-3 h-3" />
                                    </x-base.button>
                                    <x-base.button 
                                        variant="outline-danger" 
                                        size="sm" 
                                        class="px-2 py-1 delete-btn"
                                        data-id="{{ $item->id }}"
                                        data-name="{{ $item->name ?? $item->title ?? '' }}"
                                        data-delete-url="{{ route($resourceRoute . '.destroy', $item->id) }}"
                                        data-tw-toggle="modal"
                                        data-tw-target="#delete-confirmation-modal"
                                    >
                                        <x-base.lucide icon="Trash2" class="w-3 h-3" />
                                    </x-base.button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full">
                            <div class="box p-10 text-center">
                                <x-base.lucide icon="Database" class="w-16 h-16 text-slate-400 mx-auto mb-5" />
                                <h3 class="text-xl font-medium text-slate-800 dark:text-slate-200 mb-2">
                                    {{ __('access_control.messages.no_data') }}
                                </h3>
                                <p class="text-slate-600 dark:text-slate-400 mb-6">
                                    {{ __('access_control.messages.start_by_adding') }}
                                </p>
                                @if($createUrl)
                                    <x-base.button variant="primary" as="a" href="{{ $createUrl }}" class="flex items-center mx-auto">
                                        <x-base.lucide icon="Plus" class="w-4 h-4 me-2" />
                                        {{ __('access_control.actions.add_first') }}
                                    </x-base.button>
                                @endif
                            </div>
                        </div>
                    @endforelse
                </div>
            @endif
        </div>

        <!-- Pagination -->
        @if($pagination && method_exists($pagination, 'links'))
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
                <div class="me-auto">
                    {{ $pagination->withQueryString()->links() }}
                </div>
                <div class="text-slate-500 text-sm">
                    @if(method_exists($items, 'firstItem'))
                        {{ __('access_control.messages.showing') }} {{ $items->firstItem() ?? 0 }} {{ __('access_control.messages.to') }} {{ $items->lastItem() ?? 0 }} {{ __('access_control.messages.of') }} {{ $items->total() }} {{ __('access_control.messages.results') }}
                    @else
                        {{ __('access_control.messages.showing') }} {{ $items->count() }} {{ __('access_control.messages.results') }}
                    @endif
                </div>
            </div>
        @endif

        @if(isset($afterContent))
            <div class="intro-y col-span-12 mt-5">
                {{ $afterContent }}
            </div>
        @endif

        @if(isset($slot) && $slot->isNotEmpty())
            <div class="intro-y col-span-12 mt-5">
                {{ $slot }}
            </div>
        @endif
    </div>

    <!-- Delete Confirmation Modal -->
    <x-base.dialog id="delete-confirmation-modal">
        <x-base.dialog.panel>
            <div class="p-5 text-center">
                <x-base.lucide icon="XCircle" class="w-16 h-16 text-danger mx-auto mt-3" />
                <div class="text-3xl mt-5">{{ __('global.confirm_delete') }}</div>
                <div class="text-slate-500 mt-2">
                    {{ __('global.confirm_delete_message') }}
                </div>
                <div class="text-slate-500 mt-2 font-bold" id="deleteItemName"></div>
            </div>
            <div class="px-5 pb-8 text-center">
                <x-base.button type="button" data-tw-dismiss="modal" variant="outline-secondary" class="w-24 mr-1">
                    {{ __('global.cancel') }}
                </x-base.button>
                <form id="deleteForm" method="POST" action="" class="inline">
                    @csrf
                    @method('DELETE')
                    <x-base.button type="submit" variant="danger" class="w-24">
                        {{ __('global.delete') }}
                    </x-base.button>
                </form>
            </div>
        </x-base.dialog.panel>
    </x-base.dialog>
</div>

<script>
function clearFilters() {
    document.querySelectorAll('input[name="search"], select').forEach(element => {
        element.value = '';
    });
    window.location.href = window.location.pathname;
}

function changeView(viewType) {
    // Store view preference in localStorage
    localStorage.setItem('accessControlView', viewType);
    window.location.reload();
}

// Initialize view and delete functionality
document.addEventListener('DOMContentLoaded', function() {
    // saved view initialization...
    const savedView = localStorage.getItem('accessControlView');
    if (savedView) {
        // Update UI to reflect saved view
        document.querySelectorAll('.view-toggle button').forEach(btn => {
            btn.classList.remove('bg-primary', 'text-white');
            btn.classList.add('bg-white', 'text-slate-600');
        });
        document.querySelector(`[onclick="changeView('${savedView}')"]`)?.classList.add('bg-primary', 'text-white');
        document.querySelector(`[onclick="changeView('${savedView}')"]`)?.classList.remove('bg-white', 'text-slate-600');
    }

    // Handle delete button clicks
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const name = this.getAttribute('data-name');
            const deleteUrl = this.getAttribute('data-delete-url');
            
            const nameElement = document.getElementById('deleteItemName');
            if (nameElement) nameElement.textContent = name;
            
            const formElement = document.getElementById('deleteForm');
            if (formElement && deleteUrl) {
                formElement.action = deleteUrl;
            }
        });
    });
});
</script>
