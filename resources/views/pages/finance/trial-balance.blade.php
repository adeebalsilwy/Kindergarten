@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>{{ __('global.trial_balance') }} - {{ config('app.name') }}</title>
    <style>
        .rtl { direction: rtl; text-align: right; }
        .ltr { direction: ltr; text-align: left; }
        .financial-table th, .financial-table td { 
            padding: 12px; 
            vertical-align: middle;
        }
        .financial-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .financial-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        @media print {
            .no-print { display: none !important; }
            .financial-table { font-size: 12px; }
            .financial-card { box-shadow: none; border: 1px solid #ddd; }
        }
    </style>
@endsection

@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-2xl font-bold me-auto">
        <span class="ltr:inline">{{ __('global.trial_balance') }}</span>
        <span class="rtl:inline">{{ __('global.trial_balance_ar') }}</span>
    </h2>
    <div class="flex space-x-2 no-print">
        <a href="{{ route('finance.export.excel', ['report_type' => 'trial-balance', 'start_date' => request('start_date'), 'end_date' => request('end_date')]) }}" 
           class="btn btn-success flex items-center">
            <i data-lucide="download" class="w-4 h-4 me-2"></i>
            {{ __('global.export_excel') }}
        </a>
        <a href="{{ route('finance.export.pdf', ['report_type' => 'trial-balance', 'start_date' => request('start_date'), 'end_date' => request('end_date')]) }}" 
           class="btn btn-primary flex items-center">
            <i data-lucide="printer" class="w-4 h-4 me-2"></i>
            {{ __('global.export_pdf') }}
        </a>
        <button onclick="window.print()" class="btn btn-secondary flex items-center no-print">
            <i data-lucide="printer" class="w-4 h-4 me-2"></i>
            {{ __('global.print') }}
        </button>
    </div>
</div>

<div class="grid grid-cols-12 gap-6 mt-5">
    <!-- Report Header -->
    <div class="col-span-12 intro-y box p-6 bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-dark-2 dark:to-dark-3">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                    {{ __('global.trial_balance') }}
                </h3>
                <p class="text-gray-600 dark:text-gray-400 mt-1">
                    {{ __('global.generated_on') }} {{ now()->format('F j, Y g:i A') }}
                </p>
                @if(request('start_date') && request('end_date'))
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                        {{ __('global.period') }}: {{ request('start_date') }} {{ __('global.to') }} {{ request('end_date') }}
                    </p>
                @endif
            </div>
            <div class="mt-4 md:mt-0">
                <div class="flex items-center space-x-2">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('global.language') }}:</span>
                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">
                        {{ app()->getLocale() == 'ar' ? 'العربية' : 'English' }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="col-span-12 intro-y box p-5 no-print">
        <form method="GET" action="{{ route('finance.trial-balance') }}">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 md:col-span-4">
                    <label class="form-label font-medium">{{ __('global.start_date') }}</label>
                    <input type="date" name="start_date" class="form-control w-full" value="{{ request('start_date') }}">
                </div>
                <div class="col-span-12 md:col-span-4">
                    <label class="form-label font-medium">{{ __('global.end_date') }}</label>
                    <input type="date" name="end_date" class="form-control w-full" value="{{ request('end_date') }}">
                </div>
                <div class="col-span-12 md:col-span-4 flex items-end space-x-2">
                    <button type="submit" class="btn btn-primary w-full md:w-auto">
                        <i data-lucide="filter" class="w-4 h-4 me-2"></i>
                        {{ __('global.filter') }}
                    </button>
                    <a href="{{ route('finance.trial-balance') }}" class="btn btn-outline-secondary w-full md:w-auto">
                        {{ __('global.reset') }}
                    </a>
                </div>
            </div>
        </form>
    </div>

    <!-- Financial Summary Cards -->
    <div class="col-span-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="financial-card bg-white dark:bg-dark-1 shadow rounded-lg p-6 border-l-4 border-blue-500">
            <div class="text-gray-600 dark:text-gray-400 text-sm font-medium">{{ __('global.total_debits') }}</div>
            <div class="text-2xl font-bold text-blue-600 mt-2">
                {{ __('global.currency_symbol', ['amount' => number_format($trialBalance['totals']['total_debits'] ?? 0, 2)]) }}
            </div>
            <div class="text-xs text-gray-500 mt-1">{{ __('global.trial_balance') }}</div>
        </div>
        
        <div class="financial-card bg-white dark:bg-dark-1 shadow rounded-lg p-6 border-l-4 border-green-500">
            <div class="text-gray-600 dark:text-gray-400 text-sm font-medium">{{ __('global.total_credits') }}</div>
            <div class="text-2xl font-bold text-green-600 mt-2">
                {{ __('global.currency_symbol', ['amount' => number_format($trialBalance['totals']['total_credits'] ?? 0, 2)]) }}
            </div>
            <div class="text-xs text-gray-500 mt-1">{{ __('global.trial_balance') }}</div>
        </div>
        
        <div class="financial-card bg-white dark:bg-dark-1 shadow rounded-lg p-6 border-l-4 {{ ($trialBalance['totals']['difference'] ?? 0) == 0 ? 'border-green-500' : 'border-red-500' }}">
            <div class="text-gray-600 dark:text-gray-400 text-sm font-medium">{{ __('global.difference') }}</div>
            <div class="text-2xl font-bold {{ ($trialBalance['totals']['difference'] ?? 0) == 0 ? 'text-green-600' : 'text-red-600' }} mt-2">
                {{ __('global.currency_symbol', ['amount' => number_format($trialBalance['totals']['difference'] ?? 0, 2)]) }}
            </div>
            <div class="text-xs text-gray-500 mt-1">
                {{ ($trialBalance['totals']['difference'] ?? 0) == 0 ? __('global.balanced_books') : __('global.unbalanced_books') }}
            </div>
        </div>
        
        <div class="financial-card bg-white dark:bg-dark-1 shadow rounded-lg p-6 border-l-4 border-purple-500">
            <div class="text-gray-600 dark:text-gray-400 text-sm font-medium">{{ __('global.accounts_count') }}</div>
            <div class="text-2xl font-bold text-purple-600 mt-2">{{ count($trialBalance['entries'] ?? []) }}</div>
            <div class="text-xs text-gray-500 mt-1">{{ __('global.active_accounts') }}</div>
        </div>
    </div>

    <!-- Trial Balance Table -->
    <div class="col-span-12 intro-y box p-5">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
            <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                <span class="ltr:inline">{{ __('global.trial_balance') }}</span>
                <span class="rtl:inline">{{ __('global.trial_balance_ar') }}</span>
            </h3>
            <div class="mt-4 md:mt-0 text-sm text-gray-600 dark:text-gray-400">
                {{ __('global.entries_count') }}: {{ count($trialBalance['entries'] ?? []) }}
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="financial-table table table-striped w-full">
                <thead class="bg-gray-50 dark:bg-dark-2">
                    <tr>
                        <th class="font-semibold text-gray-700 dark:text-gray-300 text-start">
                            {{ __('global.account_name') }}
                        </th>
                        <th class="font-semibold text-gray-700 dark:text-gray-300 text-end">
                            {{ __('global.debits') }}
                        </th>
                        <th class="font-semibold text-gray-700 dark:text-gray-300 text-end">
                            {{ __('global.credits') }}
                        </th>
                        <th class="font-semibold text-gray-700 dark:text-gray-300 text-end">
                            {{ __('global.balance') }}
                        </th>
                        <th class="font-semibold text-gray-700 dark:text-gray-300 text-center">
                            {{ __('global.type') }}
                        </th>
                        <th class="font-semibold text-gray-700 dark:text-gray-300 text-center no-print">
                            {{ __('global.actions') }}
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-dark-3">
                    @forelse($trialBalance['entries'] ?? [] as $entry)
                        <tr class="hover:bg-gray-50 dark:hover:bg-dark-2 transition-colors">
                            <td class="font-medium text-gray-900 dark:text-gray-100">
                                {{ $entry['account_name'] }}
                            </td>
                            <td class="text-end text-blue-600 font-medium">
                                {{ __('global.currency_symbol', ['amount' => number_format($entry['debits'], 2)]) }}
                            </td>
                            <td class="text-end text-green-600 font-medium">
                                {{ __('global.currency_symbol', ['amount' => number_format($entry['credits'], 2)]) }}
                            </td>
                            <td class="text-end font-bold {{ $entry['balance'] >= 0 ? 'text-green-600' : 'text-red-600' }}">
                                {{ __('global.currency_symbol', ['amount' => number_format(abs($entry['balance']), 2)]) }}
                                <span class="text-xs ms-1">{{ $entry['balance'] >= 0 ? 'DR' : 'CR' }}</span>
                            </td>
                            <td class="text-center">
                                <span class="px-2 py-1 rounded-full text-xs font-medium 
                                    {{ $entry['type'] === 'debit' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                                    {{ __('global.' . $entry['type']) }}
                                </span>
                            </td>
                            <td class="text-center no-print">
                                <a href="{{ route('finance.general-ledger', ['account_name' => urlencode($entry['account_name'])]) }}" 
                                   class="btn btn-sm btn-outline-primary">
                                    <i data-lucide="eye" class="w-4 h-4 me-1"></i>
                                    {{ __('global.view_details') }}
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-8 text-gray-500 dark:text-gray-400">
                                <i data-lucide="file-text" class="w-12 h-12 mx-auto mb-3 text-gray-300"></i>
                                <p class="font-medium">{{ __('global.no_records_found') }}</p>
                                <p class="text-sm mt-1">{{ __('global.try_adjusting_filters') }}</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                @if(count($trialBalance['entries'] ?? []) > 0)
                <tfoot class="bg-gray-100 dark:bg-dark-3 font-bold">
                    <tr>
                        <td class="px-6 py-3 text-gray-900 dark:text-gray-100">
                            {{ __('global.total') }}
                        </td>
                        <td class="px-6 py-3 text-end text-blue-600">
                            {{ __('global.currency_symbol', ['amount' => number_format($trialBalance['totals']['total_debits'] ?? 0, 2)]) }}
                        </td>
                        <td class="px-6 py-3 text-end text-green-600">
                            {{ __('global.currency_symbol', ['amount' => number_format($trialBalance['totals']['total_credits'] ?? 0, 2)]) }}
                        </td>
                        <td class="px-6 py-3 text-end {{ ($trialBalance['totals']['difference'] ?? 0) == 0 ? 'text-green-600' : 'text-red-600' }}">
                            {{ __('global.currency_symbol', ['amount' => number_format(abs($trialBalance['totals']['difference'] ?? 0), 2)]) }}
                        </td>
                        <td class="px-6 py-3 text-center"></td>
                        <td class="px-6 py-3 text-center no-print"></td>
                    </tr>
                </tfoot>
                @endif
            </table>
        </div>
    </div>

    <!-- Account Categories Summary -->
    @if(count($trialBalance['entries'] ?? []) > 0)
    <div class="col-span-12 intro-y box p-5">
        <h3 class="text-lg font-medium mb-4">{{ __('global.account_categories_summary') }}</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @php
                $categories = [
                    'assets' => ['color' => 'blue', 'label' => __('global.assets')],
                    'liabilities' => ['color' => 'red', 'label' => __('global.liabilities')],
                    'equity' => ['color' => 'green', 'label' => __('global.equity')],
                    'revenue' => ['color' => 'purple', 'label' => __('global.revenue')],
                    'expenses' => ['color' => 'orange', 'label' => __('global.expenses')]
                ];
            @endphp
            
            @foreach($categories as $category => $info)
                @php
                    $categoryEntries = array_filter($trialBalance['entries'] ?? [], function($entry) use ($category) {
                        // Simple categorization based on account name keywords
                        $accountName = strtolower($entry['account_name']);
                        $keywords = [
                            'assets' => ['asset', 'cash', 'bank', 'inventory', 'equipment'],
                            'liabilities' => ['liability', 'loan', 'payable', 'debt'],
                            'equity' => ['equity', 'capital', 'owner'],
                            'revenue' => ['revenue', 'income', 'sales'],
                            'expenses' => ['expense', 'cost', 'rent', 'salary']
                        ];
                        
                        foreach($keywords[$category] as $keyword) {
                            if(str_contains($accountName, $keyword)) {
                                return true;
                            }
                        }
                        return false;
                    });
                    
                    $totalDebits = array_sum(array_column($categoryEntries, 'debits'));
                    $totalCredits = array_sum(array_column($categoryEntries, 'credits'));
                @endphp
                
                @if(count($categoryEntries) > 0)
                <div class="bg-white dark:bg-dark-1 rounded-lg p-4 border border-gray-200 dark:border-dark-3">
                    <div class="flex items-center justify-between">
                        <h4 class="font-medium text-{{ $info['color'] }}-600">{{ $info['label'] }}</h4>
                        <span class="px-2 py-1 bg-{{ $info['color'] }}-100 text-{{ $info['color'] }}-800 rounded-full text-xs">
                            {{ count($categoryEntries) }} {{ __('global.accounts') }}
                        </span>
                    </div>
                    <div class="mt-3 space-y-2">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">{{ __('global.debits') }}:</span>
                            <span class="font-medium text-blue-600">
                                {{ __('global.currency_symbol', ['amount' => number_format($totalDebits, 2)]) }}
                            </span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">{{ __('global.credits') }}:</span>
                            <span class="font-medium text-green-600">
                                {{ __('global.currency_symbol', ['amount' => number_format($totalCredits, 2)]) }}
                            </span>
                        </div>
                        <div class="flex justify-between text-sm font-medium pt-2 border-t border-gray-200 dark:border-dark-3">
                            <span>{{ __('global.net') }}:</span>
                            <span class="{{ ($totalDebits - $totalCredits) >= 0 ? 'text-green-600' : 'text-red-600' }}">
                                {{ __('global.currency_symbol', ['amount' => number_format(abs($totalDebits - $totalCredits), 2)]) }}
                            </span>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
    @endif

    <!-- Instructions and Notes -->
    <div class="col-span-12 intro-y box p-5">
        <h3 class="text-lg font-medium mb-4">{{ __('global.instructions') }}</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h4 class="font-medium text-gray-800 dark:text-gray-200 mb-2">{{ __('global.about_trial_balance') }}</h4>
                <ul class="list-disc ps-5 space-y-1 text-gray-600 dark:text-gray-400 text-sm">
                    <li>{{ __('global.trial_balance_explanation') }}</li>
                    <li>{{ __('global.difference_zero_note') }}</li>
                    <li>{{ __('global.use_for_verification') }}</li>
                </ul>
            </div>
            <div>
                <h4 class="font-medium text-gray-800 dark:text-gray-200 mb-2">{{ __('global.export_options') }}</h4>
                <ul class="list-disc ps-5 space-y-1 text-gray-600 dark:text-gray-400 text-sm">
                    <li>{{ __('global.export_options_note') }}</li>
                    <li>{{ __('global.supports_multilingual') }}</li>
                    <li>{{ __('global.preserves_formatting') }}</li>
                    <li>{{ __('global.print_ready') }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Lucide icons
        lucide.createIcons();
        
        // Add print event listener
        window.addEventListener('beforeprint', function() {
            document.body.classList.add('printing');
        });
        
        window.addEventListener('afterprint', function() {
            document.body.classList.remove('printing');
        });
    });
</script>
@endpush