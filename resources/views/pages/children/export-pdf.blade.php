<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <title>{{ __('global.students_report') }}</title>
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
        .info-table {
            width: 100%;
            margin-bottom: 20px;
            font-size: 12px;
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
        .data-table tr:nth-child(even) {
            background-color: #f8fafc;
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
        .badge {
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: bold;
        }
        .badge-success { background: #dcfce7; color: #166534; }
        .badge-danger { background: #fee2e2; color: #991b1b; }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo-section">
            <div class="school-name">KidsCare</div>
            <div style="font-size: 12px; color: #64748b;">{{ __('global.kindergarten_management_system') }}</div>
        </div>
        <div style="text-align: {{ app()->getLocale() == 'ar' ? 'left' : 'right' }}; font-size: 12px;">
            <div>{{ __('global.date') }}: {{ date('Y/m/d') }}</div>
            <div>{{ __('global.time') }}: {{ date('H:i') }}</div>
        </div>
    </div>

    <div class="report-title">
        {{ __('global.students_report') }}
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ __('global.name') }}</th>
                <th>{{ __('global.class') }}</th>
                <th>{{ __('global.age') }}</th>
                <th>{{ __('global.gender') }}</th>
                <th>{{ __('global.enrollment_status') }}</th>
                <th>{{ __('global.parent') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td style="font-weight: bold;">{{ $item->name }}</td>
                    <td>{{ optional($item->class)->name ?? '-' }}</td>
                    <td>{{ $item->age }}</td>
                    <td>{{ __('global.'.$item->gender) }}</td>
                    <td>
                        <span class="badge {{ $item->enrollment_status == 'active' ? 'badge-success' : '' }}">
                            {{ __('global.'.$item->enrollment_status) }}
                        </span>
                    </td>
                    <td>{{ optional($item->parent)->name ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        {{ __('global.all_rights_reserved') }} &copy; {{ date('Y') }} KidsCare - {{ __('global.generated_by') }}: {{ auth()->user()->name }}
    </div>
</body>
</html>
