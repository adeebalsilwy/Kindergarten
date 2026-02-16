<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <title>{{ __('global.financial_report') }}</title>
    <style>
        @page { margin: 1cm; }
        body { font-family: 'almarai', sans-serif; color: #333; line-height: 1.5; }
        .header { border-bottom: 2px solid #1e293b; padding-bottom: 10px; margin-bottom: 20px; display: flex; justify-content: space-between; }
        .school-name { font-size: 24px; font-weight: bold; color: #10b981; }
        .report-title { text-align: center; font-size: 20px; font-weight: bold; margin: 20px 0; background: #f8fafc; padding: 10px; }
        .data-table { width: 100%; border-collapse: collapse; font-size: 11px; }
        .data-table th { background-color: #1e293b; color: white; padding: 10px; text-align: {{ app()->getLocale() == 'ar' ? 'right' : 'left' }}; }
        .data-table td { border-bottom: 1px solid #e2e8f0; padding: 10px; }
        .footer { position: fixed; bottom: 0; width: 100%; text-align: center; font-size: 10px; color: #94a3b8; }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo-section">
            <div class="school-name">KidsCare</div>
            <div style="font-size: 12px;">{{ __('global.financial_department') }}</div>
        </div>
        <div style="text-align: {{ app()->getLocale() == 'ar' ? 'left' : 'right' }}; font-size: 12px;">
            <div>{{ __('global.date') }}: {{ date('Y/m/d') }}</div>
        </div>
    </div>

    <div class="report-title">{{ __('global.financial_report') }}</div>

    <table class="data-table">
        <thead>
            <tr>
                <th>{{ __('global.name') }}</th>
                <th>{{ __('global.type') }}</th>
                <th>{{ __('global.period') }}</th>
                <th>{{ __('global.generated_by') }}</th>
                <th>{{ __('global.date') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ __('global.'.$item->report_type) }}</td>
                    <td>{{ $item->period_start->format('Y-m-d') }} - {{ $item->period_end->format('Y-m-d') }}</td>
                    <td>{{ optional($item->generatedBy)->name }}</td>
                    <td>{{ $item->created_at->format('Y-m-d') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">{{ __('global.all_rights_reserved') }} &copy; {{ date('Y') }} KidsCare</div>
</body>
</html>
