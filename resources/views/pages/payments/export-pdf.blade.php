<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <title>{{ __('global.payments_report') }}</title>
    <style>
        @page {
            margin: 1cm;
        }
        body {
            font-family: 'almarai', sans-serif;
            color: #333;
            line-height: 1.5;
        }
        .header {
            border-bottom: 2px solid #1e293b;
            padding-bottom: 10px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo-section {
            text-align: {{ app()->getLocale() == 'ar' ? 'right' : 'left' }};
        }
        .school-name {
            font-size: 24px;
            font-weight: bold;
            color: #10b981;
        }
        .report-title {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin: 20px 0;
            text-transform: uppercase;
            color: #1e293b;
            background: #f8fafc;
            padding: 10px;
            border-radius: 5px;
        }
        .data-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 11px;
        }
        .data-table th {
            background-color: #1e293b;
            color: white;
            padding: 10px;
            text-align: {{ app()->getLocale() == 'ar' ? 'right' : 'left' }};
        }
        .data-table td {
            border-bottom: 1px solid #e2e8f0;
            padding: 10px;
        }
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            font-size: 10px;
            color: #94a3b8;
            border-top: 1px solid #e2e8f0;
            padding-top: 5px;
        }
        .amount {
            font-weight: bold;
            color: #166534;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo-section">
            <div class="school-name">KidsCare</div>
            <div style="font-size: 12px; color: #64748b;">{{ __('global.finance_department') }}</div>
        </div>
        <div style="text-align: {{ app()->getLocale() == 'ar' ? 'left' : 'right' }}; font-size: 12px;">
            <div>{{ __('global.date') }}: {{ date('Y/m/d') }}</div>
        </div>
    </div>

    <div class="report-title">
        {{ __('global.payments_report') }}
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th>{{ __('global.receipt_no') }}</th>
                <th>{{ __('global.student') }}</th>
                <th>{{ __('global.fee_type') }}</th>
                <th>{{ __('global.date') }}</th>
                <th>{{ __('global.method') }}</th>
                <th style="text-align: end;">{{ __('global.amount') }}</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($data as $item)
                @php $total += $item->amount; @endphp
                <tr>
                    <td>{{ $item->receipt_number }}</td>
                    <td>{{ optional($item->child)->name }}</td>
                    <td>{{ optional($item->fee)->name }}</td>
                    <td>{{ $item->payment_date }}</td>
                    <td>{{ __('global.'.$item->payment_method) }}</td>
                    <td style="text-align: end;" class="amount">{{ number_format($item->amount, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr style="background-color: #f1f5f9; font-weight: bold;">
                <td colspan="5" style="text-align: end; padding: 10px;">{{ __('global.total') }}</td>
                <td style="text-align: end; padding: 10px;">{{ number_format($total, 2) }}</td>
            </tr>
        </tfoot>
    </table>

    <div class="footer">
        {{ __('global.all_rights_reserved') }} &copy; {{ date('Y') }} KidsCare
    </div>
</body>
</html>
