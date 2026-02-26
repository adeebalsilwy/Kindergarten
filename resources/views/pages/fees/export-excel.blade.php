<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ __('global.text_direction', [], 'en') == 'rtl' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('fees.title') }} - {{ config('app.name') }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 20px;
        }
        .header h1 {
            color: #343a40;
            margin: 0;
            font-size: 28px;
        }
        .header p {
            color: #6c757d;
            margin: 5px 0 0 0;
        }
        .report-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            font-size: 14px;
        }
        .report-info div {
            background-color: #f1f3f4;
            padding: 10px 15px;
            border-radius: 4px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 14px;
        }
        th, td {
            border: 1px solid #dee2e6;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        tr:hover {
            background-color: #e9ecef;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            color: #6c757d;
            font-size: 12px;
            border-top: 1px solid #dee2e6;
            padding-top: 15px;
        }
        .logo {
            max-width: 150px;
            height: auto;
            margin-bottom: 15px;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .summary-row {
            background-color: #fff3cd !important;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            @if(config('app.logo'))
                <img src="{{ public_path(config('app.logo')) }}" alt="{{ config('app.name') }}" class="logo">
            @endif
            <h1>{{ config('app.name') }}</h1>
            <p>{{ __('fees.title') }} - {{ __('global.export_excel') }}</p>
        </div>

        <div class="report-info">
            <div>
                <strong>{{ __('global.generated_at') }}:</strong> {{ now()->format('Y-m-d H:i:s') }}
            </div>
            <div>
                <strong>{{ __('global.total_records') }}:</strong> {{ ${'{{variableNamePlural}}'}->count() }}
            </div>
            <div>
                <strong>{{ __('global.language') }}:</strong> {{ app()->getLocale() == 'ar' ? 'العربية' : 'English' }}
            </div>
        </div>

        <table>
            <thead>
                <tr>
{{tableHeaders}}
                </tr>
            </thead>
            <tbody>
                @foreach(${{'{{variableNamePlural}}'}} as ${{'fee'}})
                <tr>
{{tableBody}}
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="footer">
            <p>{{ __('global.report_generated_by') }} {{ config('app.name') }} | {{ __('global.confidential') }}</p>
        </div>
    </div>
</body>
</html>