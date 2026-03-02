@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>{{ __('Expense.list') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('Expense.list') }}</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0 gap-2">
            @can('export_expenses')
            <x-base.button variant="outline-secondary" as="a" href="{{ route('expenses.export.pdf') }}" class="flex items-center">
                <x-base.lucide icon="FileText" class="w-4 h-4 me-2" />
                {{ __('global.export_pdf') }}
            </x-base.button>
            @endcan
            
            @can('create_expenses')
            <x-base.button variant="primary" as="a" href="{{ route('expenses.create') }}" class="flex items-center shadow-md">
                <x-base.lucide icon="Plus" class="w-4 h-4 me-2" />
                {{ __('Expense.add_new') }}
            </x-base.button>
            @endcan
        </div>
    </div>

    <!-- Statistics -->
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-primary/20 bg-primary/5">
                    <div class="flex items-center">
                        <x-base.lucide icon="ArrowUpCircle" class="w-8 h-8 text-primary" />
                        <div class="ms-auto text-danger flex items-center">
                            <x-base.lucide icon="TrendingDown" class="w-4 h-4 me-1" />
                            <span class="text-xs">{{ __('global.total') }}</span>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">{{ number_format($totalExpenses ?? 0, 2) }}</div>
                    <div class="text-sm text-slate-500 mt-1">{{ __('global.total_expenses') }}</div>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-success/20 bg-success/5">
                    <div class="flex items-center">
                        <x-base.lucide icon="Calendar" class="w-8 h-8 text-success" />
                        <div class="ms-auto text-danger flex items-center">
                            <x-base.lucide icon="TrendingDown" class="w-4 h-4 me-1" />
                            <span class="text-xs">{{ __('global.month') }}</span>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">{{ number_format($thisMonthExpenses ?? 0, 2) }}</div>
                    <div class="text-sm text-slate-500 mt-1">{{ __('global.this_month_expenses') }}</div>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-warning/20 bg-warning/5">
                    <div class="flex items-center">
                        <x-base.lucide icon="Clock" class="w-8 h-8 text-warning" />
                        <div class="ms-auto text-warning flex items-center">
                            <span class="text-xs">{{ __('global.pending') }}</span>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">{{ $pendingExpensesCount ?? 0 }}</div>
                    <div class="text-sm text-slate-500 mt-1">{{ __('global.pending_expenses') }}</div>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
            <div class="report-box zoom-in">
                <div class="box p-5 border border-info/20 bg-info/5">
                    <div class="flex items-center">
                        <x-base.lucide icon="CheckCircle" class="w-8 h-8 text-info" />
                        <div class="ms-auto text-info flex items-center">
                            <span class="text-xs">{{ __('global.completed') }}</span>
                        </div>
                    </div>
                    <div class="text-2xl font-bold leading-8 mt-4">{{ $completedExpensesCount ?? 0 }}</div>
                    <div class="text-sm text-slate-500 mt-1">{{ __('global.completed_expenses') }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- Filter Section -->
        <div class="intro-y col-span-12">
            <div class="box p-5">
                <form method="GET" action="{{ route('expenses.index') }}">
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <label class="form-label font-bold">{{ __('global.search') }}</label>
                            <div class="relative">
                                <x-base.form-input 
                                    type="text" 
                                    name="search"
                                    value="{{ request('search') }}"
                                    placeholder="{{ __('global.search_expenses') }}..." 
                                    class="w-full ps-10"
                                />
                                <div class="absolute inset-y-0 left-0 ps-3 flex items-center pointer-events-none">
                                    <x-base.lucide icon="Search" class="h-4 w-4 text-slate-400" />
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 md:col-span-4 lg:col-span-2">
                            <label class="form-label font-bold">{{ __('global.category') }}</label>
                            <x-base.form-select name="category" class="w-full">
                                <option value="">{{ __('global.all_categories') }}</option>
                                <option value="utilities" {{ request('category') == 'utilities' ? 'selected' : '' }}>{{ __('expenses.categories.utilities') }}</option>
                                <option value="supplies" {{ request('category') == 'supplies' ? 'selected' : '' }}>{{ __('expenses.categories.supplies') }}</option>
                                <option value="salaries" {{ request('category') == 'salaries' ? 'selected' : '' }}>{{ __('expenses.categories.salaries') }}</option>
                                <option value="maintenance" {{ request('category') == 'maintenance' ? 'selected' : '' }}>{{ __('expenses.categories.maintenance') }}</option>
                                <option value="other" {{ request('category') == 'other' ? 'selected' : '' }}>{{ __('expenses.categories.other') }}</option>
                            </x-base.form-select>
                        </div>
                        <div class="col-span-12 md:col-span-4 lg:col-span-2">
                            <label class="form-label font-bold">{{ __('global.status') }}</label>
                            <x-base.form-select name="status" class="w-full">
                                <option value="">{{ __('global.all_status') }}</option>
                                <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>{{ __('expenses.status.paid') }}</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>{{ __('expenses.status.pending') }}</option>
                            </x-base.form-select>
                        </div>
                        <div class="col-span-12 md:col-span-6 lg:col-span-2">
                            <label class="form-label font-bold">{{ __('global.from') }}</label>
                            <x-base.form-input type="date" name="expense_date_from" value="{{ request('expense_date_from') }}" class="w-full" />
                        </div>
                        <div class="col-span-12 md:col-span-6 lg:col-span-2">
                            <label class="form-label font-bold">{{ __('global.to') }}</label>
                            <x-base.form-input type="date" name="expense_date_to" value="{{ request('expense_date_to') }}" class="w-full" />
                        </div>
                        <div class="col-span-12 lg:col-span-1 flex items-end gap-2">
                            <x-base.button type="submit" variant="primary" class="w-full shadow-md">
                                <x-base.lucide icon="Filter" class="w-4 h-4" />
                            </x-base.button>
                            <x-base.button as="a" href="{{ route('expenses.index') }}" variant="outline-secondary" class="w-full">
                                <x-base.lucide icon="RotateCcw" class="w-4 h-4" />
                            </x-base.button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Expense List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <x-base.table class="table-report -mt-2">
                <x-base.table.thead>
                    <x-base.table.tr>
                        <x-base.table.th class="whitespace-nowrap">{{ __('global.title') }}</x-base.table.th>
                        <x-base.table.th class="text-center whitespace-nowrap">{{ __('global.category') }}</x-base.table.th>
                        <x-base.table.th class="text-center whitespace-nowrap">{{ __('global.amount') }}</x-base.table.th>
                        <x-base.table.th class="text-center whitespace-nowrap">{{ __('global.date') }}</x-base.table.th>
                        <x-base.table.th class="text-center whitespace-nowrap">{{ __('global.status') }}</x-base.table.th>
                        <x-base.table.th class="text-center whitespace-nowrap">{{ __('global.actions') }}</x-base.table.th>
                    </x-base.table.tr>
                </x-base.table.thead>
                <x-base.table.tbody>
                    @forelse($expenses as $expense)
                        <x-base.table.tr class="intro-x">
                            <x-base.table.td>
                                <div class="font-medium whitespace-nowrap">{{ $expense->title }}</div>
                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ Str::limit($expense->description, 40) }}</div>
                            </x-base.table.td>
                            <x-base.table.td class="text-center">
                                <span class="px-2 py-1 text-xs rounded-full bg-slate-100 text-slate-600 border border-slate-200">
                                    {{ __('expenses.categories.' . $expense->category) }}
                                </span>
                            </x-base.table.td>
                            <x-base.table.td class="text-center">
                                <div class="font-bold text-danger">{{ number_format($expense->amount, 2) }}</div>
                            </x-base.table.td>
                            <x-base.table.td class="text-center">
                                <div class="whitespace-nowrap">{{ $expense->expense_date->format('Y-m-d') }}</div>
                            </x-base.table.td>
                            <x-base.table.td class="text-center">
                                <span class="px-3 py-1 rounded-full text-xs font-medium 
                                    {{ $expense->status == 'paid' ? 'bg-success/10 text-success border border-success/20' : 'bg-warning/10 text-warning border border-warning/20' }}">
                                    {{ __('expenses.status.' . $expense->status) }}
                                </span>
                            </x-base.table.td>
                            <x-base.table.td class="table-report__action">
                                <div class="flex justify-center items-center gap-2">
                                    <x-base.button variant="outline-secondary" as="a" href="{{ route('expenses.show', $expense->id) }}" size="sm" class="px-2 py-1">
                                        <x-base.lucide icon="Eye" class="w-4 h-4" />
                                    </x-base.button>
                                    @can('edit_expenses')
                                    <x-base.button variant="outline-primary" as="a" href="{{ route('expenses.edit', $expense->id) }}" size="sm" class="px-2 py-1">
                                        <x-base.lucide icon="Pencil" class="w-4 h-4" />
                                    </x-base.button>
                                    @endcan
                                    @can('delete_expenses')
                                    <x-base.button variant="outline-danger" size="sm" class="px-2 py-1 delete-btn" 
                                        onclick="confirmDelete('{{ $expense->id }}', '{{ $expense->title }}')">
                                        <x-base.lucide icon="Trash2" class="w-4 h-4" />
                                    </x-base.button>
                                    @endcan
                                </div>
                            </x-base.table.td>
                        </x-base.table.tr>
                    @empty
                        <x-base.table.tr>
                            <x-base.table.td colspan="6" class="text-center py-20">
                                <div class="flex flex-col items-center">
                                    <x-base.lucide icon="Database" class="w-16 h-16 text-slate-300 mb-4" />
                                    <div class="text-lg font-medium text-slate-500">{{ __('global.no_records_found') }}</div>
                                </div>
                            </x-base.table.td>
                        </x-base.table.tr>
                    @endforelse
                </x-base.table.tbody>
            </x-base.table>
        </div>
        
        <!-- Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-5">
            {{ $expenses->links() }}
        </div>

        <!-- Summary Cards -->
        @if($expenses->count() > 0)
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
                    <div class="text-3xl font-bold leading-8 mt-6">{{ $expenses->count() }}</div>
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
                            $recentCount = $expenses->filter(function($item) {
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
                            $todayCount = $expenses->filter(fn($item) => \Carbon\Carbon::parse($item->created_at)->isToday())->count();
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
