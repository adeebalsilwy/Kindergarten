@props([
    'filters' => [],
    'searchPlaceholder' => 'Search...',
    'showSearch' => true,
    'showFilters' => true,
    'showBulkActions' => false,
    'bulkActions' => [],
    'itemsCount' => 0,
    'selectedCount' => 0,
    'viewOptions' => ['table', 'grid', 'list'],
    'currentView' => 'table',
    'exportOptions' => ['pdf', 'excel', 'csv'],
    'showExport' => true,
    'advancedMode' => false,
])

<div class="access-control-filters">
    <!-- Main Filter Bar -->
    <div class="intro-y box p-5 mb-5">
        <div class="flex flex-col lg:flex-row gap-4 items-start lg:items-center">
            <!-- Search and Basic Filters -->
            <div class="flex-1 w-full">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3">
                    @if($showSearch)
                        <div class="md:col-span-2">
                            <div class="relative">
                                <x-base.form-input
                                    type="text"
                                    name="search"
                                    value="{{ request('search') }}"
                                    placeholder="{{ __($searchPlaceholder) }}"
                                    class="w-full ps-10"
                                />
                                <x-base.lucide icon="Search" class="w-4 h-4 absolute left-3 top-3 text-slate-400" />
                            </div>
                        </div>
                    @endif

                    @foreach($filters as $filter)
                        @if(!$filter['advanced'] ?? false)
                            <div>
                                <x-base.form-label class="text-xs mb-1">
                                    {{ __($filter['label']) }}
                                </x-base.form-label>
                                @if($filter['type'] === 'select')
                                    <x-base.tom-select 
                                        name="{{ $filter['name'] }}" 
                                        class="w-full"
                                        data-placeholder="{{ __($filter['placeholder'] ?? 'Select...') }}"
                                    >
                                        <option value="">{{ __($filter['placeholder'] ?? 'All') }}</option>
                                        @foreach($filter['options'] as $option)
                                            <option 
                                                value="{{ $option['value'] }}" 
                                                {{ request($filter['name']) == $option['value'] ? 'selected' : '' }}
                                            >
                                                {{ __($option['label']) }}
                                            </option>
                                        @endforeach
                                    </x-base.tom-select>
                                @elseif($filter['type'] === 'date')
                                    <x-base.form-input 
                                        type="date" 
                                        name="{{ $filter['name'] }}" 
                                        value="{{ request($filter['name']) }}" 
                                        class="w-full"
                                    />
                                @elseif($filter['type'] === 'date-range')
                                    <div class="flex gap-2">
                                        <x-base.form-input 
                                            type="date" 
                                            name="{{ $filter['name'] }}_from" 
                                            value="{{ request($filter['name'] . '_from') }}" 
                                            placeholder="{{ __('From') }}"
                                            class="w-full"
                                        />
                                        <x-base.form-input 
                                            type="date" 
                                            name="{{ $filter['name'] }}_to" 
                                            value="{{ request($filter['name'] . '_to') }}" 
                                            placeholder="{{ __('To') }}"
                                            class="w-full"
                                        />
                                    </div>
                                @elseif($filter['type'] === 'checkbox')
                                    <div class="flex items-center">
                                        <x-base.form-check.input
                                            type="checkbox"
                                            name="{{ $filter['name'] }}"
                                            value="1"
                                            {{ request($filter['name']) ? 'checked' : '' }}
                                            class="me-2"
                                        />
                                        <span class="text-sm">{{ __($filter['label']) }}</span>
                                    </div>
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-2 w-full lg:w-auto">
                <x-base.button type="submit" variant="primary" class="flex items-center">
                    <x-base.lucide icon="Filter" class="w-4 h-4 me-2" />
                    {{ __('access_control.actions.apply_filters') }}
                </x-base.button>
                
                <x-base.button type="button" variant="outline-secondary" class="flex items-center" onclick="clearFilters()">
                    <x-base.lucide icon="X" class="w-4 h-4 me-2" />
                    {{ __('access_control.actions.clear_filters') }}
                </x-base.button>

                @if($advancedMode)
                    <x-base.button 
                        type="button" 
                        variant="outline-secondary" 
                        class="flex items-center"
                        data-tw-toggle="modal"
                        data-tw-target="#advanced-filters-modal"
                    >
                        <x-base.lucide icon="Settings" class="w-4 h-4 me-2" />
                        {{ __('access_control.actions.advanced_filters') }}
                    </x-base.button>
                @endif

                @if($showExport)
                    <div class="dropdown">
                        <x-base.button variant="outline-secondary" class="flex items-center">
                            <x-base.lucide icon="Download" class="w-4 h-4 me-2" />
                            {{ __('access_control.actions.export') }}
                            <x-base.lucide icon="ChevronDown" class="w-4 h-4 ms-2" />
                        </x-base.button>
                        <div class="dropdown-menu w-40">
                            <div class="dropdown-content">
                                @foreach($exportOptions as $option)
                                    <a href="#" class="dropdown-item flex items-center export-option" data-type="{{ $option }}">
                                        @switch($option)
                                            @case('pdf')
                                                <x-base.lucide icon="FileText" class="w-4 h-4 me-2" />
                                                @break
                                            @case('excel')
                                                <x-base.lucide icon="FileSpreadsheet" class="w-4 h-4 me-2" />
                                                @break
                                            @case('csv')
                                                <x-base.lucide icon="File" class="w-4 h-4 me-2" />
                                                @break
                                        @endswitch
                                        {{ __('access_control.actions.export_' . $option) }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Advanced Filters (Hidden by default) -->
        @if($advancedMode)
            <div id="advanced-filters" class="hidden mt-4 pt-4 border-t border-slate-200/60">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach($filters as $filter)
                        @if($filter['advanced'] ?? false)
                            <div>
                                <x-base.form-label class="text-xs mb-1">
                                    {{ __($filter['label']) }}
                                </x-base.form-label>
                                @if($filter['type'] === 'select')
                                    <x-base.tom-select name="{{ $filter['name'] }}" class="w-full">
                                        <option value="">{{ __($filter['placeholder'] ?? 'All') }}</option>
                                        @foreach($filter['options'] as $option)
                                            <option 
                                                value="{{ $option['value'] }}" 
                                                {{ request($filter['name']) == $option['value'] ? 'selected' : '' }}
                                            >
                                                {{ __($option['label']) }}
                                            </option>
                                        @endforeach
                                    </x-base.tom-select>
                                @elseif($filter['type'] === 'range')
                                    <div class="flex gap-2 items-center">
                                        <x-base.form-input 
                                            type="number" 
                                            name="{{ $filter['name'] }}_min" 
                                            value="{{ request($filter['name'] . '_min') }}" 
                                            placeholder="{{ __('Min') }}"
                                            class="w-full"
                                        />
                                        <span class="text-slate-400">-</span>
                                        <x-base.form-input 
                                            type="number" 
                                            name="{{ $filter['name'] }}_max" 
                                            value="{{ request($filter['name'] . '_max') }}" 
                                            placeholder="{{ __('Max') }}"
                                            class="w-full"
                                        />
                                    </div>
                                @elseif($filter['type'] === 'tags')
                                    <div class="relative">
                                        <input 
                                            type="text" 
                                            name="{{ $filter['name'] }}" 
                                            value="{{ request($filter['name']) }}" 
                                            placeholder="{{ __($filter['placeholder'] ?? 'Type and press Enter') }}"
                                            class="form-control w-full"
                                            data-role="tagsinput"
                                        />
                                    </div>
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <!-- Results Bar -->
    <div class="intro-y flex flex-col sm:flex-row items-center justify-between mb-5">
        <div class="flex items-center gap-4 mb-4 sm:mb-0">
            @if($showBulkActions && $selectedCount > 0)
                <div class="flex items-center gap-2">
                    <span class="text-sm text-slate-600">
                        {{ __('access_control.messages.selected', ['count' => $selectedCount]) }}
                    </span>
                    <div class="dropdown">
                        <x-base.button variant="outline-primary" class="flex items-center">
                            {{ __('access_control.actions.bulk_actions') }}
                            <x-base.lucide icon="ChevronDown" class="w-4 h-4 ms-2" />
                        </x-base.button>
                        <div class="dropdown-menu w-48">
                            <div class="dropdown-content">
                                @foreach($bulkActions as $action)
                                    <button 
                                        type="button" 
                                        class="dropdown-item flex items-center bulk-action"
                                        data-action="{{ $action['action'] }}"
                                    >
                                        <x-base.lucide icon="{{ $action['icon'] }}" class="w-4 h-4 me-2" />
                                        {{ __($action['label']) }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <span class="text-sm text-slate-600">
                    {{ __('access_control.messages.showing') }} {{ $itemsCount }} {{ __('access_control.messages.results') }}
                </span>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <!-- View Options -->
            <div class="flex items-center gap-2">
                <span class="text-sm text-slate-600">{{ __('access_control.actions.view') }}:</span>
                <div class="flex border border-slate-200 rounded-md overflow-hidden">
                    @foreach($viewOptions as $view)
                        <button 
                            type="button" 
                            class="px-3 py-1.5 text-sm {{ $currentView === $view ? 'bg-primary text-white' : 'bg-white text-slate-600 hover:bg-slate-50' }} view-toggle-btn"
                            data-view="{{ $view }}"
                        >
                            @switch($view)
                                @case('table')
                                    <x-base.lucide icon="Table" class="w-4 h-4" />
                                    @break
                                @case('grid')
                                    <x-base.lucide icon="Grid" class="w-4 h-4" />
                                    @break
                                @case('list')
                                    <x-base.lucide icon="List" class="w-4 h-4" />
                                    @break
                            @endswitch
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Sort Options -->
            <div>
                <x-base.tom-select name="sort" class="w-32">
                    <option value="">{{ __('access_control.actions.sort_by') }}</option>
                    <option value="name" {{ request('sort') === 'name' ? 'selected' : '' }}>{{ __('access_control.fields.name') }}</option>
                    <option value="created_at" {{ request('sort') === 'created_at' ? 'selected' : '' }}>{{ __('access_control.fields.created_at') }}</option>
                    <option value="updated_at" {{ request('sort') === 'updated_at' ? 'selected' : '' }}>{{ __('access_control.fields.updated_at') }}</option>
                </x-base.tom-select>
            </div>
        </div>
    </div>
</div>

<!-- Advanced Filters Modal -->
@if($advancedMode)
<div id="advanced-filters-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="font-medium text-base me-auto">{{ __('access_control.actions.advanced_filters') }}</h2>
                <x-base.button variant="outline-secondary" data-tw-dismiss="modal">
                    <x-base.lucide icon="X" class="w-4 h-4" />
                </x-base.button>
            </div>
            <div class="modal-body">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($filters as $filter)
                        <div>
                            <x-base.form-label>{{ __($filter['label']) }}</x-base.form-label>
                            @if($filter['type'] === 'select')
                                <x-base.tom-select name="{{ $filter['name'] }}" class="w-full">
                                    <option value="">{{ __($filter['placeholder'] ?? 'All') }}</option>
                                    @foreach($filter['options'] as $option)
                                        <option value="{{ $option['value'] }}">{{ __($option['label']) }}</option>
                                    @endforeach
                                </x-base.tom-select>
                            @elseif($filter['type'] === 'date-range')
                                <div class="flex gap-2">
                                    <x-base.form-input type="date" name="{{ $filter['name'] }}_from" placeholder="{{ __('From') }}" />
                                    <x-base.form-input type="date" name="{{ $filter['name'] }}_to" placeholder="{{ __('To') }}" />
                                </div>
                            @elseif($filter['type'] === 'checkbox')
                                <div class="form-check">
                                    <x-base.form-check.input type="checkbox" name="{{ $filter['name'] }}" />
                                    <x-base.form-check.label>{{ __($filter['label']) }}</x-base.form-check.label>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <x-base.button variant="outline-secondary" data-tw-dismiss="modal">
                    {{ __('access_control.actions.cancel') }}
                </x-base.button>
                <x-base.button variant="primary" onclick="applyAdvancedFilters()">
                    {{ __('access_control.actions.apply_filters') }}
                </x-base.button>
            </div>
        </div>
    </div>
</div>
@endif

<script>
function clearFilters() {
    document.querySelectorAll('input[name="search"], select, input[type="date"], input[type="checkbox"]').forEach(element => {
        if (element.type === 'checkbox') {
            element.checked = false;
        } else {
            element.value = '';
        }
    });
    
    // Clear Tom Select elements
    document.querySelectorAll('.tom-select').forEach(element => {
        if (element.tomselect) {
            element.tomselect.clear();
        }
    });
    
    window.location.href = window.location.pathname;
}

function applyAdvancedFilters() {
    // Apply advanced filters logic
    document.getElementById('advanced-filters-modal').querySelector('[data-tw-dismiss="modal"]').click();
    document.querySelector('form').submit();
}

// View toggle functionality
document.querySelectorAll('.view-toggle-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const view = this.dataset.view;
        localStorage.setItem('accessControlView', view);
        
        // Update UI
        document.querySelectorAll('.view-toggle-btn').forEach(b => {
            b.classList.remove('bg-primary', 'text-white');
            b.classList.add('bg-white', 'text-slate-600');
        });
        this.classList.add('bg-primary', 'text-white');
        this.classList.remove('bg-white', 'text-slate-600');
        
        // Trigger view change event
        window.dispatchEvent(new CustomEvent('viewChanged', { detail: { view } }));
    });
});

// Bulk actions
document.querySelectorAll('.bulk-action').forEach(btn => {
    btn.addEventListener('click', function() {
        const action = this.dataset.action;
        const selectedItems = Array.from(document.querySelectorAll('.item-checkbox:checked')).map(cb => cb.value);
        
        if (selectedItems.length === 0) {
            alert('{{ __('access_control.messages.no_items_selected') }}');
            return;
        }
        
        if (confirm('{{ __('access_control.messages.confirm_bulk_action') }}')) {
            // Handle bulk action
            fetch('{{ request()->url() }}/bulk-action', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    action: action,
                    items: selectedItems
                })
            }).then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert(data.message || '{{ __('access_control.messages.error') }}');
                }
            });
        }
    });
});

// Export functionality
document.querySelectorAll('.export-option').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        const type = this.dataset.type;
        const params = new URLSearchParams(window.location.search);
        params.append('export', type);
        window.location.href = window.location.pathname + '?' + params.toString();
    });
});

// Initialize Tom Select elements
document.addEventListener('DOMContentLoaded', function() {
    if (typeof TomSelect !== 'undefined') {
        document.querySelectorAll('.tom-select').forEach(element => {
            if (!element.tomselect) {
                new TomSelect(element, {
                    plugins: ['dropdown_input'],
                    allowEmptyOption: true,
                    placeholder: element.dataset.placeholder || 'Select...'
                });
            }
        });
    }
});
</script>