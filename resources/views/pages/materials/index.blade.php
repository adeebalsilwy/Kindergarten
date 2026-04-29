@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('materials.list') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <!-- Page Header -->
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8 mb-6">
        <div class="flex-1">
            <div class="flex items-center">
                <div class="bg-primary/10 p-2 rounded-lg me-3">
                    <x-base.lucide icon="Package" class="w-6 h-6 text-primary" />
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-slate-800">{{ __('materials.list') }}</h2>
                    <p class="text-sm text-slate-500 mt-1">Manage your materials efficiently</p>
                </div>
            </div>
        </div>
        <div class="w-full sm:w-auto flex gap-2 mt-4 sm:mt-0">
            @can('export', App\Models\Material::class)
            <x-base.button variant="outline-primary" as="a" href="{{ route('materials.export.pdf') }}" class="flex items-center">
                <x-base.lucide icon="FileText" class="w-4 h-4 me-2" />
                {{ __('global.export_pdf') }}
            </x-base.button>
            <x-base.button variant="outline-success" as="a" href="{{ route('materials.export.excel') }}" class="flex items-center">
                <x-base.lucide icon="FileSpreadsheet" class="w-4 h-4 me-2" />
                {{ __('global.export_excel') }}
            </x-base.button>
            @endcan
            @can('create', App\Models\Material::class)
            <x-base.button variant="primary" as="a" href="{{ route('materials.create') }}" class="flex items-center">
                <x-base.lucide icon="Plus" class="w-4 h-4 me-2" />
                {{ __('materials.create_new') }}
            </x-base.button>
            @endcan
            <x-base.button variant="outline-secondary" id="fillDemoData" class="flex items-center">
                <x-base.lucide icon="Database" class="w-4 h-4 me-2" />
                Fill Demo Data
            </x-base.button>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- Statistics Cards -->
        @if($materials->count() > 0)
        <div class="intro-y col-span-12 md:col-span-3">
            <x-stat-card
                :title="__('global.total_materials')"
                :value="$materials->count()"
                icon="Database"
                color="blue"
                trend="{{ $materials instanceof \Illuminate\Pagination\LengthAwarePaginator ? min(100, ($materials->count() / max(1, $materials->total())) * 100) : 100 }}"
                trend-label="{{ __('global.this_month') }}"
            />
        </div>

        <div class="intro-y col-span-12 md:col-span-3">
            <x-stat-card
                :title="__('global.total_quantity')"
                :value="$materials->sum('quantity_available')"
                icon="Package"
                color="green"
                subtitle="{{ __('global.units_available') }}"
            />
        </div>

        <div class="intro-y col-span-12 md:col-span-3">
            <x-stat-card
                :title="__('global.consumable_materials')"
                :value="$materials->where('is_consumable', true)->count()"
                icon="ShoppingBag"
                color="warning"
            />
        </div>

        <div class="intro-y col-span-12 md:col-span-3">
            <x-stat-card
                :title="__('global.digital_materials')"
                :value="$materials->where('is_digital', true)->count()"
                icon="Monitor"
                color="info"
            />
        </div>
        @endif

        <!-- Filter Bar -->
        <x-filter-bar
            :action="route('materials.index')"
            :cols="4"
            :reset-route="route('materials.index')"
        >
            <div>
                <x-base.form-label>{{ __('materials.fields.name') }}</x-base.form-label>
                <x-base.form-input
                    type="text"
                    name="name"
                    value="{{ request('name') }}"
                    placeholder="{{ __('materials.fields.name') }}"
                />
            </div>

            <div>
                <x-base.form-label>{{ __('materials.fields.category') }}</x-base.form-label>
                <x-base.form-input
                    type="text"
                    name="category"
                    value="{{ request('category') }}"
                    placeholder="{{ __('materials.fields.category') }}"
                />
            </div>

            <div>
                <x-base.form-label>{{ __('materials.fields.type') }}</x-base.form-label>
                <x-base.tom-select name="type">
                    <option value="">{{ __('global.all') }}</option>
                    <option value="physical" {{ request('type') === 'physical' ? 'selected' : '' }}>{{ __('global.physical') }}</option>
                    <option value="digital" {{ request('type') === 'digital' ? 'selected' : '' }}>{{ __('global.digital') }}</option>
                    <option value="consumable" {{ request('type') === 'consumable' ? 'selected' : '' }}>{{ __('global.consumable') }}</option>
                    <option value="equipment" {{ request('type') === 'equipment' ? 'selected' : '' }}>{{ __('global.equipment') }}</option>
                </x-base.tom-select>
            </div>

            <div>
                <x-base.form-label>{{ __('materials.fields.is_active') }}</x-base.form-label>
                <x-base.tom-select name="is_active">
                    <option value="">{{ __('global.all') }}</option>
                    <option value="1" {{ request('is_active') === '1' ? 'selected' : '' }}>{{ __('global.active') }}</option>
                    <option value="0" {{ request('is_active') === '0' ? 'selected' : '' }}>{{ __('global.inactive') }}</option>
                </x-base.tom-select>
            </div>

            <div>
                <x-base.form-label>{{ __('materials.fields.is_consumable') }}</x-base.form-label>
                <x-base.tom-select name="is_consumable">
                    <option value="">{{ __('global.all') }}</option>
                    <option value="1" {{ request('is_consumable') === '1' ? 'selected' : '' }}>{{ __('global.yes') }}</option>
                    <option value="0" {{ request('is_consumable') === '0' ? 'selected' : '' }}>{{ __('global.no') }}</option>
                </x-base.tom-select>
            </div>

            <div>
                <x-base.form-label>{{ __('materials.fields.is_digital') }}</x-base.form-label>
                <x-base.tom-select name="is_digital">
                    <option value="">{{ __('global.all') }}</option>
                    <option value="1" {{ request('is_digital') === '1' ? 'selected' : '' }}>{{ __('global.yes') }}</option>
                    <option value="0" {{ request('is_digital') === '0' ? 'selected' : '' }}>{{ __('global.no') }}</option>
                </x-base.tom-select>
            </div>

            <div>
                <x-base.form-label>{{ __('global.sort_by') }}</x-base.form-label>
                <x-base.tom-select name="sort_by">
                    <option value="created_at" {{ request('sort_by') === 'created_at' ? 'selected' : '' }}>{{ __('global.date_created') }}</option>
                    <option value="name" {{ request('sort_by') === 'name' ? 'selected' : '' }}>{{ __('materials.fields.name') }}</option>
                    <option value="category" {{ request('sort_by') === 'category' ? 'selected' : '' }}>{{ __('materials.fields.category') }}</option>
                    <option value="quantity_available" {{ request('sort_by') === 'quantity_available' ? 'selected' : '' }}>{{ __('materials.fields.quantity_available') }}</option>
                </x-base.tom-select>
            </div>

            <div>
                <x-base.form-label>{{ __('global.sort_direction') }}</x-base.form-label>
                <x-base.tom-select name="sort_direction">
                    <option value="desc" {{ request('sort_direction') === 'desc' ? 'selected' : '' }}>{{ __('global.descending') }}</option>
                    <option value="asc" {{ request('sort_direction') === 'asc' ? 'selected' : '' }}>{{ __('global.ascending') }}</option>
                </x-base.tom-select>
            </div>
        </x-filter-bar>

        <!-- Materials Table -->
        <x-section-container :title="__('materials.list')" icon="Package" :collapsible="false">
            @php
                $columns = [
                    'name' => __('materials.fields.name'),
                    'category' => __('materials.fields.category'),
                    'type' => __('materials.fields.type'),
                    'quantity_available' => __('materials.fields.quantity_available'),
                    'unit_cost' => __('materials.fields.unit_cost'),
                    'supplier' => __('materials.fields.supplier'),
                    'is_active' => __('materials.fields.is_active'),
                ];

                $actions = [];
                if (auth()->user()->can('view', App\Models\Material::class)) {
                    $actions[] = ['type' => 'view', 'route' => 'materials.show'];
                }
                if (auth()->user()->can('update', App\Models\Material::class)) {
                    $actions[] = ['type' => 'edit', 'route' => 'materials.edit'];
                }
                if (auth()->user()->can('delete', App\Models\Material::class)) {
                    $actions[] = ['type' => 'delete', 'route' => 'materials.destroy'];
                }
            @endphp

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-slate-100 border-b-2 border-slate-200">
                            @foreach($columns as $key => $label)
                                <th class="px-4 py-3 text-left font-bold text-slate-700">{{ $label }}</th>
                            @endforeach

                            @if(count($actions) > 0)
                                <th class="px-4 py-3 text-center font-bold text-slate-700">
                                    {{ __('global.actions') }}
                                </th>
                            @endif
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($materials as $material)
                            <tr class="border-b border-slate-100 hover:bg-slate-50 transition-colors">
                                <td class="px-4 py-3">
                                    <div class="font-semibold text-slate-800">{{ $material->name }}</div>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 rounded-full text-xs bg-slate-100 text-slate-700">
                                        {{ $material->category ?: '-' }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    @if($material->type)
                                        <span class="px-2 py-1 rounded-full text-xs
                                            @if($material->type === 'digital') bg-info/10 text-info
                                            @elseif($material->type === 'consumable') bg-warning/10 text-warning
                                            @else bg-primary/10 text-primary
                                            @endif">
                                            {{ ucfirst($material->type) }}
                                        </span>
                                    @else
                                        <span class="text-slate-400">-</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <div class="font-semibold {{ $material->quantity_available > 0 ? 'text-success' : 'text-danger' }}">
                                        {{ $material->quantity_available }}
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    @if($material->unit_cost)
                                        <div class="font-semibold">€{{ number_format($material->unit_cost, 2) }}</div>
                                    @else
                                        <span class="text-slate-400">-</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 truncate max-w-xs text-center">
                                    {{ $material->supplier ?: '-' }}
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <span class="px-3 py-1 rounded-full text-xs font-medium
                                        @if($material->is_active) bg-success/20 text-success
                                        @else bg-slate-200 text-slate-600
                                        @endif">
                                        {{ $material->is_active ? __('global.active') : __('global.inactive') }}
                                    </span>
                                </td>

                                @if(count($actions) > 0)
                                <td class="px-4 py-3 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        @foreach($actions as $action)
                                            @if($action['type'] === 'view')
                                                <a href="{{ route($action['route'], $material->id) }}"
                                                   class="p-2 rounded-lg bg-info/10 text-info hover:bg-info hover:text-white transition-colors"
                                                   title="{{ __('global.view') }}">
                                                    <x-base.lucide icon="Eye" class="w-4 h-4" />
                                                </a>
                                            @elseif($action['type'] === 'edit')
                                                <a href="{{ route($action['route'], $material->id) }}"
                                                   class="p-2 rounded-lg bg-warning/10 text-warning hover:bg-warning hover:text-white transition-colors"
                                                   title="{{ __('global.edit') }}">
                                                    <x-base.lucide icon="Pencil" class="w-4 h-4" />
                                                </a>
                                            @elseif($action['type'] === 'delete')
                                                <form action="{{ route($action['route'], $material->id) }}" method="POST" class="inline"
                                                      onsubmit="return confirm('{{ __('global.confirm_delete') }}')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="p-2 rounded-lg bg-danger/10 text-danger hover:bg-danger hover:text-white transition-colors"
                                                            title="{{ __('global.delete') }}">
                                                        <x-base.lucide icon="Trash2" class="w-4 h-4" />
                                                    </button>
                                                </form>
                                            @endif
                                        @endforeach
                                    </div>
                                </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ count($columns) + count($actions) }}" class="px-4 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <x-base.lucide icon="Inbox" class="w-16 h-16 text-slate-300 mb-4" />
                                        <h3 class="text-lg font-bold text-slate-700">{{ __('global.no_data_found') }}</h3>
                                        <p class="text-slate-500 mt-2 mb-4">{{ __('Start by adding your first material') }}</p>
                                        @can('create', App\Models\Material::class)
                                        <x-base.button variant="primary" as="a" href="{{ route('materials.create') }}">
                                            <x-base.lucide icon="Plus" class="w-4 h-4 me-2" />
                                            {{ __('materials.create_new') }}
                                        </x-base.button>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($materials->hasPages())
            <div class="mt-6">
                {{ $materials->links() }}
            </div>
            @endif
        </x-section-container>
    </div>

    <!-- Demo Data Modal -->
    <div id="demoDataModal" class="hidden">
        <div class="fixed inset-0 z-50 flex items-center justify-center">
            <div class="absolute inset-0 bg-slate-900/75" @click="closeDemoModal()"></div>
            <div class="relative bg-white rounded-lg shadow-xl w-full max-w-lg mx-4 p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-slate-800">Fill Materials with Demo Data</h3>
                    <button @click="closeDemoModal()" class="p-1 rounded-lg hover:bg-slate-100">
                        <x-base.lucide icon="X" class="w-5 h-5" />
                    </button>
                </div>
                <div class="mb-6">
                    <p class="text-sm text-slate-600 mb-4">This will create sample materials for testing purposes.</p>
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-3">
                        <div class="flex items-start">
                            <x-base.lucide icon="Info" class="w-5 h-5 text-blue-600 me-2 mt-0.5" />
                            <div class="text-sm text-blue-800">
                                <strong>Sample materials include:</strong>
                                <ul class="list-disc ms-4 mt-2 space-y-1">
                                    <li>Art Supplies (Paint, Brushes, Paper)</li>
                                    <li>Educational Tools (Tablets, Books)</li>
                                    <li>Sports Equipment (Balls, Cones)</li>
                                    <li>Science Materials (Microscopes, Chemicals)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end gap-2">
                    <x-base.button variant="outline-secondary" @click="closeDemoModal()">Cancel</x-base.button>
                    <x-base.button variant="primary" id="confirmDemoFill">
                        <x-base.lucide icon="Check" class="w-4 h-4 me-2" />
                        Fill Data
                    </x-base.button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const demoModal = document.getElementById('demoDataModal');
        const fillDemoBtn = document.getElementById('fillDemoData');
        const confirmBtn = document.getElementById('confirmDemoFill');

        if (fillDemoBtn) {
            fillDemoBtn.addEventListener('click', function() {
                demoModal.classList.remove('hidden');
            });
        }

        window.closeDemoModal = function() {
            demoModal.classList.add('hidden');
        };

        if (confirmBtn) {
            confirmBtn.addEventListener('click', function() {
                confirmBtn.disabled = true;
                confirmBtn.innerHTML = '<svg class="animate-spin h-4 w-4 me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Creating...';

                fetch('{{ route('materials.create') }}', {
                    method: 'GET',
                    headers: {
                        'Accept': 'text/html',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const form = doc.querySelector('form');
                    
                    if (form) {
                        const demoData = {
                            name: 'Demo Art Supplies Set',
                            description: 'A comprehensive set of art supplies for kindergarten activities including paints, brushes, colored paper, and crayons.',
                            category: 'arts_crafts',
                            type: 'consumable',
                            quantity: 50,
                            unit: 'set',
                            status: 'available',
                            cost: 25.99,
                            supplier: 'Educational Supplies Co.',
                            purchase_date: new Date().toISOString().split('T')[0],
                            quantity_required: 10,
                            specifications: '{"color": "multicolor", "age_range": "3-8 years", "material": "non-toxic"}'
                        };

                        Object.keys(demoData).forEach(key => {
                            const input = form.querySelector(`[name="${key}"]`);
                            if (input) {
                                input.value = demoData[key];
                            }
                        });

                        const formAction = form.getAttribute('action');
                        const formData = new FormData();
                        formData.append('_token', '{{ csrf_token() }}');
                        Object.keys(demoData).forEach(key => {
                            formData.append(key, demoData[key]);
                        });

                        return fetch(formAction, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'text/html'
                            },
                            body: formData
                        });
                    }
                })
                .then(response => {
                    if (response && response.ok) {
                        window.location.href = '{{ route('materials.index') }}?success=1';
                    } else {
                        alert('Error creating demo material. Please try again.');
                        confirmBtn.disabled = false;
                        confirmBtn.innerHTML = '<x-base.lucide icon="Check" class="w-4 h-4 me-2" /> Fill Data';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred. Please try again.');
                    confirmBtn.disabled = false;
                    confirmBtn.innerHTML = '<x-base.lucide icon="Check" class="w-4 h-4 me-2" /> Fill Data';
                });
            });
        }
    });
</script>
@endpush
