@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Grade.list') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('Grade.list') }}</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            @can('export_grades')
            
                        <div class="flex gap-2">
                            <x-base.button variant="outline-primary" as="a" href="{{ route('grades.export.pdf') }}" class="flex items-center">
                                <x-base.lucide icon="FileText" class="w-4 h-4 me-2" />
                                {{ __('global.export_pdf') }}
                            </x-base.button>
                            <x-base.button variant="outline-success" as="a" href="{{ route('grades.export.excel') }}" class="flex items-center">
                                <x-base.lucide icon="FileSpreadsheet" class="w-4 h-4 me-2" />
                                {{ __('global.export_excel') }}
                            </x-base.button>
                        </div>
            @endcan
            
            @can('create_grades')
            <x-base.button variant="primary" as="a" href="{{ route('grades.create') }}" class="ms-2 flex items-center">
                <x-base.lucide icon="Plus" class="w-4 h-4 me-2" />
                {{ __('Grade.add_new') }}
            </x-base.button>
            @endcan
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- Filter Section -->
        <div class="intro-y col-span-12">
            <div class="box p-5">
                <form method="GET" action="{{ route('grades.index') }}">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <div class="flex-1">
                            <div class="relative">
                                <x-base.form-input 
                                    type="text" 
                                    name="search" 
                                    value="{{ request('search') }}"
                                    placeholder="{{ __('global.search_grades') }}..." 
                                    class="w-full ps-10 pe-4 py-2" 
                                />
                                <div class="absolute inset-y-0 left-0 ps-3 flex items-center pointer-events-none">
                                    <x-base.lucide icon="Search" class="h-5 w-5 text-gray-400" />
                                </div>
                            </div>
                        </div>
                        <select name="subject" class="form-select w-full sm:w-40">
                            <option value="">{{ __('global.all_subjects') }}</option>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject }}" {{ request('subject') == $subject ? 'selected' : '' }}>{{ $subject }}</option>
                            @endforeach
                        </select>
                        <select name="child_id" class="form-select w-full sm:w-40">
                            <option value="">{{ __('global.all_students') }}</option>
                            @foreach($children as $child)
                                <option value="{{ $child->id }}" {{ request('child_id') == $child->id ? 'selected' : '' }}>{{ $child->name }}</option>
                            @endforeach
                        </select>
                        <select name="sort" class="form-select w-full sm:w-40">
                            <option value="">{{ __('global.sort_by_default') }}</option>
                            <option value="date_desc" {{ request('sort') == 'date_desc' ? 'selected' : '' }}>{{ __('global.newest_first') }}</option>
                            <option value="date_asc" {{ request('sort') == 'date_asc' ? 'selected' : '' }}>{{ __('global.oldest_first') }}</option>
                            <option value="score_desc" {{ request('sort') == 'score_desc' ? 'selected' : '' }}>{{ __('global.highest_score') }}</option>
                            <option value="score_asc" {{ request('sort') == 'score_asc' ? 'selected' : '' }}>{{ __('global.lowest_score') }}</option>
                        </select>
                        <div class="flex gap-2">
                            <x-base.button as="a" href="{{ route('grades.index') }}" variant="secondary" class="flex items-center">
                                <x-base.lucide icon="RotateCcw" class="w-4 h-4 me-2" />
                                {{ __('global.reset') }}
                            </x-base.button>
                            <x-base.button type="submit" variant="primary" class="flex items-center">
                                <x-base.lucide icon="Filter" class="w-4 h-4 me-2" />
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
    $canEdit = auth()->user()->can('edit_grades');
    $canDelete = auth()->user()->can('delete_grades');
    $canView = auth()->user()->can('view_grades');
@endphp
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('global.student') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('grades.fields.subject') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('grades.fields.score') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('global.letter_grade') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('grades.fields.date') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('global.class') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('global.evaluator') }}</x-base.table.th>

                        @if($canEdit || $canDelete || $canView)
                        <x-base.table.th class="text-center whitespace-nowrap">{{ __('global.actions') }}</x-base.table.th>
                        @endif
                    </x-base.table.tr>
                </x-base.table.thead>
                <x-base.table.tbody>
                    @forelse($grades as $grade)
                        <x-base.table.tr class="intro-x">
                            <x-base.table.td class="text-center">
                                <div class="flex items-center justify-center">
                                    <div class="w-8 h-8 image-fit zoom-in">
                                        <img alt="{{ $grade->child->name ?? 'Student' }}" class="tooltip rounded-full border-2 border-white shadow-md" 
                                             src="{{ $grade->child->photo_path ? asset('storage/' . $grade->child->photo_path) : asset('dist/images/profile-3.jpg') }}"
                                             title="{{ $grade->child->name ?? 'Student' }}">
                                    </div>
                                    <div class="ms-2">
                                        <span class="font-medium">{{ $grade->child->name ?? 'N/A' }}</span>
                                    </div>
                                </div>
                            </x-base.table.td>
                            <x-base.table.td class="text-center">{{ $grade->subject ?? '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">
                                <span class="px-2 py-1 rounded-full bg-primary/10 text-primary border border-primary/20">
                                    {{ $grade->score ?? '-' }}
                                </span>
                            </x-base.table.td>
                            <x-base.table.td class="text-center">
                                <span class="px-2 py-1 rounded-full 
                                    {{ $grade->grade === 'A' ? 'bg-success/10 text-success border border-success/20' : '' }}
                                    {{ $grade->grade === 'B' ? 'bg-info/10 text-info border border-info/20' : '' }}
                                    {{ $grade->grade === 'C' ? 'bg-warning/10 text-warning border border-warning/20' : '' }}
                                    {{ $grade->grade === 'D' ? 'bg-yellow/10 text-yellow border border-yellow/20' : '' }}
                                    {{ $grade->grade === 'F' ? 'bg-danger/10 text-danger border border-danger/20' : '' }}">
                                    {{ $grade->grade ?? '-' }}
                                </span>
                            </x-base.table.td>
                            <x-base.table.td class="text-center">{{ $grade->date ? $grade->date->format('Y-m-d') : '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">
                                <span class="px-2 py-1 rounded-full bg-blue/10 text-blue border border-blue/20">
                                    {{ optional($grade->child->class)->name ?? 'N/A' }}
                                </span>
                            </x-base.table.td>
                            <x-base.table.td class="text-center">{{ $grade->evaluator_id ?? 'System' }}</x-base.table.td>

                            @if($canEdit || $canDelete || $canView)
                            <x-base.table.td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    @can('view_grades')
                                    <x-base.button variant="outline-secondary" as="a" href="{{ route('grades.show', $grade->id) }}" size="sm" class="me-2">
                                        <x-base.lucide icon="Eye" class="w-4 h-4 me-1" />
                                        {{ __('global.view') }}
                                    </x-base.button>
                                    @endcan
                                    
                                    @can('edit_grades')
                                    <x-base.button variant="outline-primary" as="a" href="{{ route('grades.edit', $grade->id) }}" size="sm" class="me-2">
                                        <x-base.lucide icon="Pencil" class="w-4 h-4 me-1" />
                                        {{ __('global.edit') }}
                                    </x-base.button>
                                    @endcan
                                    
                                    @can('delete_grades')
                                    <x-base.button variant="outline-danger" 
                                                  data-delete-id="{{ $grade->id }}" 
                                                  data-delete-name="{{ $grade->subject ?? 'Grade Record' }}" 
                                                  data-delete-route="{{ route('grades.destroy', $grade->id) }}"
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
                        <x-base.table.td colspan="{{ 7 + ($canEdit || $canDelete || $canView ? 1 : 0) }}" class="text-center py-10">
                                <div class="flex flex-col items-center justify-center">
                                    <x-base.lucide icon="Award" class="w-16 h-16 text-gray-400 mb-4" />
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('global.no_grades_found') }}</h3>
                                    <p class="text-gray-500 dark:text-gray-400 mt-1">{{ __('global.no_grades_description') }}</p>
                                    <x-base.button variant="primary" as="a" href="{{ route('grades.create') }}" class="mt-4">
                                        <x-base.lucide icon="Plus" class="w-4 h-4 me-2" />
                                        {{ __('Grade.add_new') }}
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
            {!! $grades->links() !!}
        </div>

        <!-- Summary Cards -->
        @if($grades->count() > 0)
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
                    <div class="text-3xl font-bold leading-8 mt-6">{{ $grades->count() }}</div>
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
                            $recentCount = $grades->filter(function($item) {
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
                            $todayCount = $grades->filter(fn($item) => \Carbon\Carbon::parse($item->created_at)->isToday())->count();
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
    <div id="deleteModal" class="modal" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <x-base.lucide icon="AlertTriangle" class="w-16 h-16 text-danger mx-auto mt-3" />
                        <div class="text-3xl mt-5">{{ __('global.are_you_sure') }}</div>
                        <div class="text-slate-500 mt-2">
                            {{ __('global.delete_confirmation') }} "<span id="deleteItemName"></span>"?
                        </div>
                        <div class="text-slate-500 mt-1">
                            {{ __('global.this_action_cannot_be_undone') }}
                        </div>
                    </div>
                    <form id="deleteForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <div class="px-5 pb-8 text-center">
                            <x-base.button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">
                                {{ __('global.cancel') }}
                            </x-base.button>
                            <x-base.button type="submit" class="btn btn-danger w-24">
                                {{ __('global.delete') }}
                            </x-base.button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Delete Confirmation -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Delete button click handler
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.dataset.deleteId;
                    const name = this.dataset.deleteName;
                    const route = this.dataset.deleteRoute;
                    
                    document.getElementById('deleteItemName').textContent = name;
                    document.getElementById('deleteForm').setAttribute('action', route);
                    
                    // Show modal
                    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
                    modal.show();
                });
            });
        });
    </script>
@endsection
