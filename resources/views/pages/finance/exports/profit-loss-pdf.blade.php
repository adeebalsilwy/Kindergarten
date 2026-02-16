<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ __('global.profit_loss_statement') }}</title>
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
        .section-header {
            font-weight: bold;
            font-size: 14px;
            margin-top: 15px;
            margin-bottom: 5px;
            padding: 5px 0;
            border-bottom: 1px solid #333;
        }
        .total-row {
            font-weight: bold;
            background-color: #f0f0f0;
        }
        .profit-row {
            font-weight: bold;
            background-color: #f0fff4;
            color: #22c55e;
        }
        .loss-row {
            font-weight: bold;
            background-color: #fef2f2;
            color: #ef4444;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
            color: #666;
            border-top: 1px solid #ccc;
            padding-top: 10px;
        }
        .amount {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="company-name">{{ $companyName }}</div>
        <div class="report-title">{{ __('global.profit_loss_statement') }} {{ app()->getLocale() == 'ar' ? ' (' . __('global.profit_loss_statement_ar') . ')' : '' }}</div>
        <div class="report-info">
            {{ __('global.generated_on') }}: {{ $reportDate }}<br>
            {{ __('global.period') }}: {{ $startDate ?? __('global.from_beginning') }} {{ __('global.to') }} {{ $endDate ?? __('global.to_now') }}
        </div>
    </div>

    <div class="section-header">{{ __('global.revenue') }}</div>
    <table class="table">
        <tbody>
            <tr>
                <td>{{ __('global.total_revenue') }}</td>
                <td class="amount">{{ __('global.currency_symbol', ['amount' => number_format($profitLoss['revenue'], 2)]) }}</td>
            </tr>
        </tbody>
    </table>

    <div class="section-header">{{ __('global.expenses') }}</div>
    <table class="table">
        <tbody>
            <tr>
                <td>{{ __('global.total_expenses') }}</td>
                <td class="amount">{{ __('global.currency_symbol', ['amount' => number_format($profitLoss['expenses'], 2)]) }}</td>
            </tr>
        </tbody>
    </table>

    <table class="table">
        <tbody>
            <tr class="{{ $profitLoss['profit'] >= 0 ? 'profit-row' : 'loss-row' }}">
                <td>{{ __('global.profit_loss') }}</td>
                <td class="amount">
                    {{ __('global.currency_symbol', ['amount' => number_format($profitLoss['profit'], 2)]) }}
                </td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        <p>{{ __('global.generated_by') }} {{ $companyName }} - {{ now()->format('Y-m-d H:i:s') }}</p>
        <p>{{ __('global.page') }} <span class="page"></span> {{ __('global.of') }} <span class="topage"></span></p>
    </div>
</body>
</html>