<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ __('global.general_ledger') }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            margin: 20px;
            direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};
            text-align: {{ app()->getLocale() == 'ar' ? 'right' : 'left' }};
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        .company-name {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .report-title {
            font-size: 16px;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }
        .account-name {
            font-size: 14px;
            font-weight: bold;
            color: #444;
            margin-bottom: 5px;
        }
        .report-info {
            font-size: 12px;
            color: #666;
            margin-bottom: 10px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table th, .table td {
            border: 1px solid #333;
            padding: 8px;
            font-size: 12px;
        }
        .table th {
            background-color: #f0f0f0;
            font-weight: bold;
            text-align: center;
        }
        .table td {
            text-align: {{ app()->getLocale() == 'ar' ? 'right' : 'left' }};
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .text-start {
            text-align: left;
        }
        .summary-box {
            margin: 20px 0;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .summary-item {
            margin: 5px 0;
            font-size: 14px;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
            color: #666;
            border-top: 1px solid #ccc;
            padding-top: 10px;
        }
        .positive {
            color: #22c55e;
        }
        .negative {
            color: #ef4444;
        }
        .debit {
            color: #3b82f6;
        }
        .credit {
            color: #f59e0b;
        }
        .amount {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="company-name">{{ $companyName }}</div>
        <div class="report-title">{{ __('global.general_ledger') }} {{ app()->getLocale() == 'ar' ? ' (' . __('global.general_ledger_ar') . ')' : '' }}</div>
        <div class="account-name">{{ __('global.account_name') }}: {{ $generalLedger['account_name'] }}</div>
        <div class="report-info">
            {{ __('global.generated_on') }}: {{ $reportDate }}<br>
            {{ __('global.period') }}: {{ $startDate ?? __('global.from_beginning') }} {{ __('global.to') }} {{ $endDate ?? __('global.to_now') }}
        </div>
    </div>

    <div class="summary-box">
        <div class="summary-item"><strong>{{ __('global.entries_count') }}:</strong> {{ count($generalLedger['entries']) }}</div>
        <div class="summary-item"><strong>{{ __('global.total_debits') }}:</strong> <span class="amount debit">{{ __('global.currency_symbol', ['amount' => number_format(array_sum(array_column($generalLedger['entries'], 'debit')), 2)]) }}</span></div>
        <div class="summary-item"><strong>{{ __('global.total_credits') }}:</strong> <span class="amount credit">{{ __('global.currency_symbol', ['amount' => number_format(array_sum(array_column($generalLedger['entries'], 'credit')), 2)]) }}</span></div>
        <div class="summary-item"><strong>{{ __('global.final_balance') }}:</strong> 
            <span class="amount {{ $generalLedger['final_balance'] >= 0 ? 'positive' : 'negative' }}">
                {{ __('global.currency_symbol', ['amount' => number_format(abs($generalLedger['final_balance']), 2)]) }}
                <span style="font-size: 10px;">{{ $generalLedger['final_balance'] >= 0 ? 'DR' : 'CR' }}</span>
            </span>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th class="text-center">{{ __('global.date') }}</th>
                <th>{{ __('global.description') }}</th>
                <th class="text-end">{{ __('global.debit') }}</th>
                <th class="text-end">{{ __('global.credit') }}</th>
                <th class="text-end">{{ __('global.balance') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($generalLedger['entries'] as $entry)
                <tr>
                    <td class="text-center">{{ $entry['date']->format('Y-m-d') }}</td>
                    <td>{{ $entry['description'] }}</td>
                    <td class="amount debit">@if($entry['debit'] > 0){{ __('global.currency_symbol', ['amount' => number_format($entry['debit'], 2)]) }}@endif</td>
                    <td class="amount credit">@if($entry['credit'] > 0){{ __('global.currency_symbol', ['amount' => number_format($entry['credit'], 2)]) }}@endif</td>
                    <td class="amount {{ $entry['balance'] >= 0 ? 'positive' : 'negative' }}">
                        {{ __('global.currency_symbol', ['amount' => number_format(abs($entry['balance']), 2)]) }}
                        <span style="font-size: 10px;">{{ $entry['balance'] >= 0 ? 'DR' : 'CR' }}</span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">{{ __('global.no_records_found') }}</td>
                </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr style="background-color: #f0f0f0; font-weight: bold;">
                <td colspan="2">{{ __('global.total') }}</td>
                <td class="amount debit">{{ __('global.currency_symbol', ['amount' => number_format(array_sum(array_column($generalLedger['entries'], 'debit')), 2)]) }}</td>
                <td class="amount credit">{{ __('global.currency_symbol', ['amount' => number_format(array_sum(array_column($generalLedger['entries'], 'credit')), 2)]) }}</td>
                <td class="amount {{ $generalLedger['final_balance'] >= 0 ? 'positive' : 'negative' }}">
                    {{ __('global.currency_symbol', ['amount' => number_format($generalLedger['final_balance'], 2)]) }}
                </td>
            </tr>
        </tfoot>
    </table>

    <div class="footer">
        <p>{{ __('global.generated_by') }} {{ $companyName }} - {{ now()->format('Y-m-d H:i:s') }}</p>
        <p>{{ __('global.page') }} <span class="page"></span> {{ __('global.of') }} <span class="topage"></span></p>
    </div>
</body>
</html>