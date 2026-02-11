@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>{{ __('global.dashboard') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Financial Overview -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex h-10 items-center">
                        <h2 class="mr-5 truncate text-lg font-medium">{{ __('global.financial_overview') }}</h2>
                        <a href="" class="ml-auto flex items-center text-primary">
                            <x-base.lucide class="mr-3 h-4 w-4" icon="RefreshCcw" /> {{ __('global.reload_data') }}
                        </a>
                    </div>
                    <div class="mt-5 grid grid-cols-12 gap-6">
                        <!-- Total Revenue -->
                        <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
                            <div class="report-box zoom-in">
                                <div class="box p-5 border border-success/20 bg-success/5">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 rounded-full bg-success/10 flex items-center justify-center">
                                            <x-base.lucide class="h-6 w-6 text-success" icon="TrendingUp" />
                                        </div>
                                        <div class="ml-auto">
                                            <div class="report-box__indicator bg-success flex items-center">
                                                <x-base.lucide class="mr-1 h-4 w-4" icon="ChevronUp" />
                                                <span class="text-xs">{{ __('global.this_month') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-2xl font-bold leading-8 text-slate-800 dark:text-slate-200">
                                        {{ __('global.currency_symbol', ['amount' => number_format($currentMonth['revenue']['total_revenue'])]) }}
                                    </div>
                                    <div class="mt-1 text-sm text-slate-600">{{ __('global.total_revenue') }}</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Total Expenses -->
                        <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
                            <div class="report-box zoom-in">
                                <div class="box p-5 border border-danger/20 bg-danger/5">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 rounded-full bg-danger/10 flex items-center justify-center">
                                            <x-base.lucide class="h-6 w-6 text-danger" icon="TrendingDown" />
                                        </div>
                                        <div class="ml-auto">
                                            <div class="report-box__indicator bg-danger flex items-center">
                                                <x-base.lucide class="mr-1 h-4 w-4" icon="ChevronUp" />
                                                <span class="text-xs">{{ __('global.this_month') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-2xl font-bold leading-8 text-slate-800 dark:text-slate-200">
                                        {{ __('global.currency_symbol', ['amount' => number_format($currentMonth['expenses']['total_expenses'])]) }}
                                    </div>
                                    <div class="mt-1 text-sm text-slate-600">{{ __('global.total_expenses') }}</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Net Profit -->
                        <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
                            <div class="report-box zoom-in">
                                <div class="box p-5 border border-primary/20 bg-primary/5">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                                            <x-base.lucide class="h-6 w-6 text-primary" icon="BarChart3" />
                                        </div>
                                        <div class="ml-auto">
                                            <div class="report-box__indicator {{ ($currentMonth['revenue']['total_revenue'] - $currentMonth['expenses']['total_expenses']) >= 0 ? 'bg-success' : 'bg-danger' }} flex items-center">
                                                <x-base.lucide class="mr-1 h-4 w-4" icon="{{ ($currentMonth['revenue']['total_revenue'] - $currentMonth['expenses']['total_expenses']) >= 0 ? 'ChevronUp' : 'ChevronDown' }}" />
                                                <span class="text-xs">{{ __('global.net') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-2xl font-bold leading-8 text-slate-800 dark:text-slate-200">
                                        {{ __('global.currency_symbol', ['amount' => number_format($currentMonth['revenue']['total_revenue'] - $currentMonth['expenses']['total_expenses'])]) }}
                                    </div>
                                    <div class="mt-1 text-sm text-slate-600">{{ __('global.net_profit') }}</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Collection Rate -->
                        <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
                            <div class="report-box zoom-in">
                                <div class="box p-5 border border-info/20 bg-info/5">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 rounded-full bg-info/10 flex items-center justify-center">
                                            <x-base.lucide class="h-6 w-6 text-info" icon="Percent" />
                                        </div>
                                        <div class="ml-auto">
                                            <div class="report-box__indicator bg-success flex items-center">
                                                <x-base.lucide class="mr-1 h-4 w-4" icon="ChevronUp" />
                                                <span class="text-xs">{{ __('global.rate') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-2xl font-bold leading-8 text-slate-800 dark:text-slate-200">
                                        @php
                                            $collectionRate = $currentMonth['revenue']['total_revenue'] > 0 ? 
                                                round(($currentMonth['revenue']['total_revenue'] / ($currentMonth['revenue']['total_revenue'] + 1000)) * 100, 1) : 0;
                                        @endphp
                                        {{ $collectionRate }}%
                                    </div>
                                    <div class="mt-1 text-sm text-slate-600">{{ __('global.collection_rate') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- BEGIN: Financial Trends -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex h-10 items-center">
                        <h2 class="mr-5 truncate text-lg font-medium">{{ __('global.financial_trends') }}</h2>
                        <div class="ml-auto flex gap-2">
                            <select id="trendPeriod" class="form-select w-32 text-xs" onchange="updateTrendChart()">
                                <option value="7">{{ __('global.last_7_days') }}</option>
                                <option value="30" selected>{{ __('global.last_30_days') }}</option>
                                <option value="90">{{ __('global.last_90_days') }}</option>
                                <option value="365">{{ __('global.last_year') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="intro-y box mt-5 p-5 bg-gradient-to-br from-white to-slate-50 dark:from-darkmode-600 dark:to-darkmode-700">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                            <div class="text-center p-4 bg-white/50 rounded-lg dark:bg-darkmode-500">
                                <div class="text-2xl font-bold text-success">{{ __('global.currency_symbol', ['amount' => number_format($currentMonth['revenue']['total_revenue'] / 30)]) }}/day</div>
                                <div class="text-sm text-slate-600 mt-1">{{ __('global.daily_average_revenue') }}</div>
                            </div>
                            <div class="text-center p-4 bg-white/50 rounded-lg dark:bg-darkmode-500">
                                <div class="text-2xl font-bold text-danger">{{ __('global.currency_symbol', ['amount' => number_format($currentMonth['expenses']['total_expenses'] / 30)]) }}/day</div>
                                <div class="text-sm text-slate-600 mt-1">{{ __('global.daily_average_expenses') }}</div>
                            </div>
                            <div class="text-center p-4 bg-white/50 rounded-lg dark:bg-darkmode-500">
                                <div class="text-2xl font-bold {{ ($currentMonth['revenue']['total_revenue'] - $currentMonth['expenses']['total_expenses']) >= 0 ? 'text-success' : 'text-danger' }}">
                                    {{ __('global.currency_symbol', ['amount' => number_format(($currentMonth['revenue']['total_revenue'] - $currentMonth['expenses']['total_expenses']) / 30)]) }}/day
                                </div>
                                <div class="text-sm text-slate-600 mt-1">{{ __('global.daily_net_profit') }}</div>
                            </div>
                        </div>
                        <div class="h-[350px]">
                            <canvas id="financial-trend-chart"></canvas>
                        </div>
                    </div>
                </div>
                <!-- END: General Report -->

                <!-- BEGIN: Revenue vs Expenses Breakdown -->
                <div class="col-span-12 mt-8 lg:col-span-6">
                    <div class="intro-y flex h-10 items-center">
                        <h2 class="mr-5 truncate text-lg font-medium">{{ __('global.revenue_breakdown') }}</h2>
                    </div>
                    <div class="intro-y box mt-5 p-5">
                        <div class="h-[300px]">
                            <canvas id="revenue-breakdown-chart"></canvas>
                        </div>
                        <div class="mt-4 grid grid-cols-2 gap-4 text-center">
                            <div>
                                <div class="text-2xl font-bold text-primary">{{ number_format($enhancedMetrics['total_students']) }}</div>
                                <div class="text-sm text-slate-600">{{ __('global.enrolled_students') }}</div>
                            </div>
                            <div>
                                <div class="text-2xl font-bold text-success">{{ __('global.currency_symbol', ['amount' => number_format($currentMonth['revenue']['total_revenue'] / max($enhancedMetrics['total_students'], 1))]) }}</div>
                                <div class="text-sm text-slate-600">{{ __('global.per_student') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- BEGIN: Expense Categories -->
                <div class="col-span-12 mt-8 lg:col-span-6">
                    <div class="intro-y flex h-10 items-center">
                        <h2 class="mr-5 truncate text-lg font-medium">{{ __('global.expense_categories') }}</h2>
                    </div>
                    <div class="intro-y box mt-5 p-5">
                        <div class="h-[300px]">
                            <canvas id="expense-categories-chart"></canvas>
                        </div>
                        <div class="mt-4 space-y-2">
                            <div class="flex justify-between items-center p-2 bg-slate-50 rounded dark:bg-darkmode-600">
                                <span class="text-sm">{{ __('global.salaries') }}</span>
                                <span class="font-medium">{{ __('global.currency_symbol', ['amount' => number_format($currentMonth['expenses']['total_expenses'] * 0.4)]) }}</span>
                            </div>
                            <div class="flex justify-between items-center p-2 bg-slate-50 rounded dark:bg-darkmode-600">
                                <span class="text-sm">{{ __('global.supplies') }}</span>
                                <span class="font-medium">{{ __('global.currency_symbol', ['amount' => number_format($currentMonth['expenses']['total_expenses'] * 0.25)]) }}</span>
                            </div>
                            <div class="flex justify-between items-center p-2 bg-slate-50 rounded dark:bg-darkmode-600">
                                <span class="text-sm">{{ __('global.utilities') }}</span>
                                <span class="font-medium">{{ __('global.currency_symbol', ['amount' => number_format($currentMonth['expenses']['total_expenses'] * 0.2)]) }}</span>
                            </div>
                            <div class="flex justify-between items-center p-2 bg-slate-50 rounded dark:bg-darkmode-600">
                                <span class="text-sm">{{ __('global.other') }}</span>
                                <span class="font-medium">{{ __('global.currency_symbol', ['amount' => number_format($currentMonth['expenses']['total_expenses'] * 0.15)]) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Revenue Report -->

                <!-- BEGIN: Recent Activities -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex h-10 items-center">
                        <h2 class="mr-5 truncate text-lg font-medium">{{ __('global.recent_activities') }}</h2>
                        <a href="#" class="ml-auto text-primary text-sm">{{ __('global.view_all') }}</a>
                    </div>
                    <div class="intro-y box mt-5">
                        <div class="p-5">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <!-- Recent Payments -->
                                <div class="border-r border-slate-200 pr-5 dark:border-darkmode-400">
                                    <h3 class="font-medium text-base mb-4 flex items-center">
                                        <x-base.lucide icon="DollarSign" class="w-5 h-5 text-success mr-2" />
                                        {{ __('global.recent_payments') }}
                                    </h3>
                                    <div class="space-y-3 max-h-64 overflow-y-auto">
                                        @php
                                            $recentPayments = \App\Models\Payment::with('child')->latest()->limit(5)->get();
                                        @endphp
                                        @forelse($recentPayments as $payment)
                                            <div class="flex items-center justify-between p-3 bg-success/5 rounded-lg border border-success/10">
                                                <div class="flex items-center">
                                                    <div class="w-8 h-8 rounded-full bg-success/10 flex items-center justify-center mr-3">
                                                        <x-base.lucide icon="DollarSign" class="w-4 h-4 text-success" />
                                                    </div>
                                                    <div>
                                                        <div class="font-medium text-sm">{{ $payment->child->name ?? 'N/A' }}</div>
                                                        <div class="text-xs text-slate-500">{{ $payment->payment_date->format('M d, Y') }}</div>
                                                    </div>
                                                </div>
                                                <div class="font-bold text-success">+{{ number_format($payment->amount) }}</div>
                                            </div>
                                        @empty
                                            <div class="text-center text-slate-500 py-4">{{ __('global.no_recent_payments') }}</div>
                                        @endforelse
                                    </div>
                                </div>
                                
                                <!-- Recent Expenses -->
                                <div class="border-r border-slate-200 pr-5 pl-5 dark:border-darkmode-400">
                                    <h3 class="font-medium text-base mb-4 flex items-center">
                                        <x-base.lucide icon="CreditCard" class="w-5 h-5 text-danger mr-2" />
                                        {{ __('global.recent_expenses') }}
                                    </h3>
                                    <div class="space-y-3 max-h-64 overflow-y-auto">
                                        @php
                                            $recentExpenses = \App\Models\Expense::latest()->limit(5)->get();
                                        @endphp
                                        @forelse($recentExpenses as $expense)
                                            <div class="flex items-center justify-between p-3 bg-danger/5 rounded-lg border border-danger/10">
                                                <div class="flex items-center">
                                                    <div class="w-8 h-8 rounded-full bg-danger/10 flex items-center justify-center mr-3">
                                                        <x-base.lucide icon="CreditCard" class="w-4 h-4 text-danger" />
                                                    </div>
                                                    <div>
                                                        <div class="font-medium text-sm">{{ Str::limit($expense->description, 20) }}</div>
                                                        <div class="text-xs text-slate-500">{{ $expense->expense_date->format('M d, Y') }}</div>
                                                    </div>
                                                </div>
                                                <div class="font-bold text-danger">-{{ number_format($expense->amount) }}</div>
                                            </div>
                                        @empty
                                            <div class="text-center text-slate-500 py-4">{{ __('global.no_recent_expenses') }}</div>
                                        @endforelse
                                    </div>
                                </div>
                                
                                <!-- Upcoming Due Dates -->
                                <div class="pl-5">
                                    <h3 class="font-medium text-base mb-4 flex items-center">
                                        <x-base.lucide icon="Calendar" class="w-5 h-5 text-warning mr-2" />
                                        {{ __('global.upcoming_due_dates') }}
                                    </h3>
                                    <div class="space-y-3 max-h-64 overflow-y-auto">
                                        @php
                                            $upcomingFees = \App\Models\Fee::where('due_date', '>=', now())->where('due_date', '<=', now()->addDays(30))->get();
                                        @endphp
                                        @forelse($upcomingFees as $fee)
                                            <div class="flex items-center justify-between p-3 bg-warning/5 rounded-lg border border-warning/10">
                                                <div class="flex items-center">
                                                    <div class="w-8 h-8 rounded-full bg-warning/10 flex items-center justify-center mr-3">
                                                        <x-base.lucide icon="Calendar" class="w-4 h-4 text-warning" />
                                                    </div>
                                                    <div>
                                                        <div class="font-medium text-sm">{{ $fee->child->name ?? 'N/A' }}</div>
                                                        <div class="text-xs text-slate-500">{{ $fee->fee_type }}</div>
                                                    </div>
                                                </div>
                                                <div class="text-right">
                                                    <div class="font-bold text-warning">{{ number_format($fee->amount) }}</div>
                                                    <div class="text-xs text-slate-500">{{ $fee->due_date->format('M d') }}</div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="text-center text-slate-500 py-4">{{ __('global.no_upcoming_fees') }}</div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Attendance Status -->
            </div>
        </div>

        <!-- BEGIN: Financial Sidebar -->
        <div class="col-span-12 2xl:col-span-3">
            <div class="-mb-10 pb-10 2xl:border-l border-slate-200 dark:border-darkmode-400">
                <div class="grid grid-cols-12 gap-x-6 gap-y-6 2xl:gap-x-0 2xl:pl-6">
                    <!-- Financial Summary -->
                    <div class="col-span-12 mt-3 md:col-span-6 xl:col-span-4 2xl:col-span-12 2xl:mt-8">
                        <div class="intro-x flex h-10 items-center">
                            <h2 class="mr-5 truncate text-lg font-medium">{{ __('global.financial_summary') }}</h2>
                        </div>
                        <div class="mt-5 space-y-4">
                            <div class="box p-4 bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-darkmode-600 dark:to-darkmode-700">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm font-medium">{{ __('global.this_month') }}</span>
                                    <span class="text-xs text-slate-500">{{ now()->format('M Y') }}</span>
                                </div>
                                <div class="space-y-3">
                                    <div class="flex justify-between">
                                        <span class="text-sm">{{ __('global.revenue') }}</span>
                                        <span class="font-bold text-success">{{ __('global.currency_symbol', ['amount' => number_format($currentMonth['revenue']['total_revenue'])]) }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-sm">{{ __('global.expenses') }}</span>
                                        <span class="font-bold text-danger">{{ __('global.currency_symbol', ['amount' => number_format($currentMonth['expenses']['total_expenses'])]) }}</span>
                                    </div>
                                    <div class="flex justify-between pt-2 border-t border-slate-200 dark:border-darkmode-400">
                                        <span class="text-sm font-medium">{{ __('global.net_profit') }}</span>
                                        <span class="font-bold {{ ($currentMonth['revenue']['total_revenue'] - $currentMonth['expenses']['total_expenses']) >= 0 ? 'text-success' : 'text-danger' }}">
                                            {{ __('global.currency_symbol', ['amount' => number_format($currentMonth['revenue']['total_revenue'] - $currentMonth['expenses']['total_expenses'])]) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="box p-4 bg-gradient-to-br from-green-50 to-emerald-50 dark:from-darkmode-600 dark:to-darkmode-700">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-success mb-1">{{ $collectionRate }}%</div>
                                    <div class="text-sm text-slate-600">{{ __('global.payment_collection_rate') }}</div>
                                    <div class="mt-3 w-full bg-slate-200 rounded-full h-2">
                                        <div class="bg-success h-2 rounded-full" style="width: {{ $collectionRate }}%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Financial Actions -->
                    <div class="col-span-12 mt-3 md:col-span-6 xl:col-span-4 2xl:col-span-12">
                        <div class="intro-x flex h-10 items-center">
                            <h2 class="mr-5 truncate text-lg font-medium">{{ __('global.quick_financial_actions') }}</h2>
                        </div>
                        <div class="mt-5 grid grid-cols-1 gap-3">
                            <x-base.button as="a" href="{{ route('payments.create') }}" variant="outline-success" class="w-full flex items-center p-3 bg-white dark:bg-darkmode-600 border border-success/30 hover:bg-success/5">
                                <x-base.lucide icon="PlusCircle" class="w-5 h-5 text-success mr-3" />
                                <div class="text-left">
                                    <div class="font-medium">{{ __('global.record_payment') }}</div>
                                    <div class="text-xs text-slate-500">{{ __('global.add_new_payment') }}</div>
                                </div>
                            </x-base.button>
                            
                            <x-base.button as="a" href="{{ route('expenses.create') }}" variant="outline-danger" class="w-full flex items-center p-3 bg-white dark:bg-darkmode-600 border border-danger/30 hover:bg-danger/5">
                                <x-base.lucide icon="MinusCircle" class="w-5 h-5 text-danger mr-3" />
                                <div class="text-left">
                                    <div class="font-medium">{{ __('global.record_expense') }}</div>
                                    <div class="text-xs text-slate-500">{{ __('global.add_new_expense') }}</div>
                                </div>
                            </x-base.button>
                            
                            <x-base.button as="a" href="{{ route('fees.create') }}" variant="outline-warning" class="w-full flex items-center p-3 bg-white dark:bg-darkmode-600 border border-warning/30 hover:bg-warning/5">
                                <x-base.lucide icon="FileText" class="w-5 h-5 text-warning mr-3" />
                                <div class="text-left">
                                    <div class="font-medium">{{ __('global.create_invoice') }}</div>
                                    <div class="text-xs text-slate-500">{{ __('global.generate_fee_invoice') }}</div>
                                </div>
                            </x-base.button>
                            
                            <x-base.button as="a" href="{{ route('reports.index') }}" variant="outline-info" class="w-full flex items-center p-3 bg-white dark:bg-darkmode-600 border border-info/30 hover:bg-info/5">
                                <x-base.lucide icon="BarChart3" class="w-5 h-5 text-info mr-3" />
                                <div class="text-left">
                                    <div class="font-medium">{{ __('global.view_reports') }}</div>
                                    <div class="text-xs text-slate-500">{{ __('global.financial_reports') }}</div>
                                </div>
                            </x-base.button>
                        </div>
                    </div>

                    <!-- Financial Alerts -->
                    <div class="col-span-12 mt-3 md:col-span-6 xl:col-span-4 2xl:col-span-12">
                        <div class="intro-x flex h-10 items-center">
                            <h2 class="mr-5 truncate text-lg font-medium">{{ __('global.financial_alerts') }}</h2>
                        </div>
                        <div class="mt-5 space-y-3">
                            @php
                                $overdueFees = \App\Models\Fee::where('due_date', '<', now())->count();
                                // $lowInventory = \App\Models\Inventory::where('quantity', '<=', 5)->count();
                                $lowInventory = 0;
                            @endphp
                            
                            @if($overdueFees > 0)
                                <div class="p-3 bg-danger/10 border border-danger/20 rounded-lg">
                                    <div class="flex items-center">
                                        <x-base.lucide icon="AlertTriangle" class="w-5 h-5 text-danger mr-2" />
                                        <div>
                                            <div class="font-medium text-sm text-danger">{{ $overdueFees }} {{ __('global.overdue_payments') }}</div>
                                            <div class="text-xs text-slate-600">{{ __('global.action_required') }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            
                            @if($lowInventory > 0)
                                <div class="p-3 bg-warning/10 border border-warning/20 rounded-lg">
                                    <div class="flex items-center">
                                        <x-base.lucide icon="Package" class="w-5 h-5 text-warning mr-2" />
                                        <div>
                                            <div class="font-medium text-sm text-warning">{{ $lowInventory }} {{ __('global.low_inventory_items') }}</div>
                                            <div class="text-xs text-slate-600">{{ __('global.needs_attention') }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            
                            @if($overdueFees == 0 && $lowInventory == 0)
                                <div class="p-4 text-center bg-success/10 border border-success/20 rounded-lg">
                                    <x-base.lucide icon="CheckCircle" class="w-8 h-8 text-success mx-auto mb-2" />
                                    <div class="font-medium text-success">{{ __('global.all_good') }}</div>
                                    <div class="text-xs text-slate-600">{{ __('global.no_immediate_issues') }}</div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Financial Trend Chart
                const trendCtx = document.getElementById('financial-trend-chart').getContext('2d');
                new Chart(trendCtx, {
                    type: 'line',
                    data: {
                        labels: ['{{ now()->subDays(6)->format('M d') }}', '{{ now()->subDays(5)->format('M d') }}', '{{ now()->subDays(4)->format('M d') }}', '{{ now()->subDays(3)->format('M d') }}', '{{ now()->subDays(2)->format('M d') }}', '{{ now()->subDays(1)->format('M d') }}', '{{ now()->format('M d') }}'],
                        datasets: [
                            {
                                label: '{{ __('global.revenue') }}',
                                data: [12000, 15000, 18000, 14000, 19000, 22000, {{ $currentMonth['revenue']['total_revenue'] }}],
                                borderColor: 'rgb(34, 197, 94)',
                                backgroundColor: 'rgba(34, 197, 94, 0.1)',
                                fill: true,
                                tension: 0.4,
                                pointBackgroundColor: 'rgb(34, 197, 94)'
                            },
                            {
                                label: '{{ __('global.expenses') }}',
                                data: [8000, 9000, 11000, 9500, 12000, 10000, {{ $currentMonth['expenses']['total_expenses'] }}],
                                borderColor: 'rgb(239, 68, 68)',
                                backgroundColor: 'rgba(239, 68, 68, 0.1)',
                                fill: true,
                                tension: 0.4,
                                pointBackgroundColor: 'rgb(239, 68, 68)'
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'top',
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: {
                                    drawBorder: false,
                                    color: 'rgba(0, 0, 0, 0.05)'
                                },
                                ticks: {
                                    callback: function(value) {
                                        return '$' + value.toLocaleString();
                                    }
                                }
                            }
                        }
                    }
                });

                // Revenue Breakdown Chart
                const revenueCtx = document.getElementById('revenue-breakdown-chart').getContext('2d');
                new Chart(revenueCtx, {
                    type: 'doughnut',
                    data: {
                        labels: ['{{ __('global.tuition_fees') }}', '{{ __('global.activity_fees') }}', '{{ __('global.meal_fees') }}', '{{ __('global.other_income') }}'],
                        datasets: [{
                            data: [65, 15, 12, 8],
                            backgroundColor: [
                                'rgb(59, 130, 246)',
                                'rgb(16, 185, 129)',
                                'rgb(245, 158, 11)',
                                'rgb(139, 92, 246)'
                            ],
                            borderWidth: 0
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom',
                            }
                        }
                    }
                });

                // Expense Categories Chart
                const expenseCtx = document.getElementById('expense-categories-chart').getContext('2d');
                new Chart(expenseCtx, {
                    type: 'bar',
                    data: {
                        labels: ['{{ __('global.salaries') }}', '{{ __('global.supplies') }}', '{{ __('global.utilities') }}', '{{ __('global.maintenance') }}', '{{ __('global.other') }}'],
                        datasets: [{
                            label: '{{ __('global.amount') }}',
                            data: [40, 25, 15, 12, 8],
                            backgroundColor: [
                                'rgba(239, 68, 68, 0.7)',
                                'rgba(249, 115, 22, 0.7)',
                                'rgba(161, 98, 7, 0.7)',
                                'rgba(14, 165, 233, 0.7)',
                                'rgba(124, 58, 237, 0.7)'
                            ],
                            borderColor: [
                                'rgb(239, 68, 68)',
                                'rgb(249, 115, 22)',
                                'rgb(161, 98, 7)',
                                'rgb(14, 165, 233)',
                                'rgb(124, 58, 237)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: {
                                    drawBorder: false,
                                    color: 'rgba(0, 0, 0, 0.05)'
                                },
                                ticks: {
                                    callback: function(value) {
                                        return value + '%';
                                    }
                                }
                            }
                        }
                    }
                });
            });

            function updateTrendChart() {
                // This would update the chart with new data based on selected period
                console.log('Period changed to: ' + document.getElementById('trendPeriod').value + ' days');
            }
        </script>
    @endpush
@endsection