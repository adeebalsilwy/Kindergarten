@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('kindergarten.parents.title') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('kindergarten.parents.title') }}</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            @can('export_parents')
            
                        <div class="flex gap-2">
                            <x-base.button variant="outline-primary" as="a" href="{{ route('parents.export.pdf') }}" class="flex items-center">
                                <x-base.lucide icon="FileText" class="w-4 h-4 me-2" />
                                {{ __('global.export_pdf') }}
                            </x-base.button>
                            <x-base.button variant="outline-success" as="a" href="{{ route('parents.export.excel') }}" class="flex items-center">
                                <x-base.lucide icon="FileSpreadsheet" class="w-4 h-4 me-2" />
                                {{ __('global.export_excel') }}
                            </x-base.button>
                        </div>
            @endcan
            
            @can('create_parents')
            <x-base.button variant="primary" as="a" href="{{ route('parents.create') }}" class="ms-2 flex items-center">
                <x-base.lucide icon="Plus" class="w-4 h-4 me-2" />
                {{ __('kindergarten.parents.add_new') }}
            </x-base.button>
            @endcan
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- Filter Section -->
        <div class="intro-y col-span-12">
            <div class="box p-5">
                <form method="GET" action="{{ route('parents.index') }}">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <div class="flex-1">
                            <x-base.form-input name="search" value="{{ request('search') }}" placeholder="{{ __('global.search') }}" class="w-full" />
                        </div>
                        <select name="is_active" class="form-select w-full sm:w-40">
                            <option value="" {{ request('is_active') === null ? 'selected' : '' }}>{{ __('global.all_statuses') }}</option>
                            <option value="1" {{ request('is_active') == '1' ? 'selected' : '' }}>{{ __('global.active') }}</option>
                            <option value="0" {{ request('is_active') == '0' ? 'selected' : '' }}>{{ __('global.inactive') }}</option>
                        </select>
                        <x-base.button type="submit" variant="primary" class="flex items-center">
                            <x-base.lucide icon="Filter" class="w-4 h-4 me-2" />
                            {{ __('global.filter') }}
                        </x-base.button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Data List -->
        <div class="intro-y col-span-12 overflow-x-auto">
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
                            @if($canEdit || $canDelete || $canView)
                            <x-base.table.th class="text-center whitespace-nowrap">{{ __('global.actions') }}</x-base.table.th>
                            @endif
                        </x-base.table.tr>
                    </x-base.table.thead>
                    <x-base.table.tbody>
                        @forelse($parents as $parent)
                            <x-base.table.tr class="intro-x">
                                <x-base.table.td class="text-center">{{ $parent->name ?? '-' }}</x-base.table.td>
                                <x-base.table.td class="text-center">{{ $parent->phone ?? '-' }}</x-base.table.td>
                                <x-base.table.td class="text-center">{{ $parent->relationship ?? '-' }}</x-base.table.td>

                                @if($canEdit || $canDelete || $canView)
                                <x-base.table.td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        @can('view_parents')
                                        <x-base.button variant="outline-secondary" as="a" href="{{ route('parents.show', $parent->id) }}" size="sm" class="me-2">
                                            <x-base.lucide icon="Eye" class="w-4 h-4 me-1" />
                                            {{ __('global.view') }}
                                        </x-base.button>
                                        @endcan
                                        
                                        @can('edit_parents')
                                        <x-base.button variant="outline-primary" as="a" href="{{ route('parents.edit', $parent->id) }}" size="sm" class="me-2">
                                            <x-base.lucide icon="Pencil" class="w-4 h-4 me-1" />
                                            {{ __('global.edit') }}
                                        </x-base.button>
                                        @endcan
                                        
                                        @can('delete_parents')
                                        <x-base.button variant="outline-danger" 
                                                      data-id="{{ $parent->id }}" 
                                                      data-name="{{ addslashes($parent->name) }}" 
                                                      data-delete-url="{{ route('parents.destroy', $parent->id) }}"
                                                      data-tw-toggle="modal"
                                                      data-tw-target="#delete-confirmation-modal"
                                                      size="sm" class="delete-btn">
                                            <x-base.lucide icon="Trash2" class="w-4 h-4 me-1" />
                                            {{ __('global.delete') }}
                                        </x-base.button>
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
                                        <x-base.button variant="primary" as="a" href="{{ route('parents.create') }}" class="mt-4">
                                            <x-base.lucide icon="Plus" class="w-4 h-4 me-2" />
                                            {{ __('kindergarten.parents.add_new') }}
                                        </x-base.button>
                                    </div>
                                </x-base.table.td>
                            </x-base.table.tr>
                        @endforelse
                    </x-base.table.tbody>
                </x-base.table>
            </x-base.table>
        </div>

        <!-- Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            {{ $parents->withQueryString()->links() }}
        </div>
        </div>

        <!-- Summary Cards -->
        @if($parents->count() > 0)
        <div class="intro-y col-span-12 grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
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
                    <div class="text-3xl font-bold leading-8 mt-6">{{ $parents->count() }}</div>
                    <div class="text-base text-slate-500 mt-1">{{ __('global.total_records') }}</div>
                </div>
            </div>
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex items-center">
                        <x-base.lucide icon="Activity" class="w-8 h-8 text-pending" />
                        <div class="ms-auto">
                            <div class="report-box__indicator bg-success"> 
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4" /> 
                            </div>
                        </div>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">
                        @php
                            $recentCount = $parents->filter(function($item) {
                                return $item->created_at >= \Carbon\Carbon::now()->subDays(7);
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
                        <div class="ms-auto">
                            <div class="report-box__indicator bg-success"> 
                                <x-base.lucide icon="TrendingUp" class="w-4 h-4" /> 
                            </div>
                        </div>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">
                        @php
                            $todayCount = $parents->filter(function($parent) {
                                return $parent->created_at->isToday();
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

    <!-- Delete Confirmation Modal -->
    <x-base.dialog id="delete-confirmation-modal">
        <x-base.dialog.panel>
            <div class="p-5 text-center">
                <x-base.lucide icon="XCircle" class="w-16 h-16 text-danger mx-auto mt-3" />
                <div class="text-3xl mt-5">{{ __('global.confirm_delete') }}</div>
                <div class="text-slate-500 mt-2">
                    {{ __('global.confirm_delete_message') }}
                </div>
                <div class="text-slate-500 mt-2 font-bold" id="deleteParentName"></div>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle delete button clicks
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const name = this.getAttribute('data-name');
                    const deleteUrl = this.getAttribute('data-delete-url');
                    
                    document.getElementById('deleteParentName').textContent = name;
                    
                    const formElement = document.getElementById('deleteForm');
                    if (formElement && deleteUrl) {
                        formElement.action = deleteUrl;
                    }
                });
            });
        });
    </script>
@endsection
