<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ __('Teacher.title') }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .title {
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="title">{{ __('Teacher.title') }}</div>
        <div>Date: {{ date('Y-m-d H:i:s') }}</div>
    </div>
    
    <table>
        <thead>
            <tr>
                @if(count($data) > 0)
                    @foreach($data[0]->getAttributes() as $key => $value)
                        @if(!in_array($key, ['id', 'created_at', 'updated_at', 'deleted_at']))
                            <th>{{ __('Teacher.fields.'.$key) }}</th>
                        @endif
                    @endforeach
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    @foreach($item->getAttributes() as $key => $value)
                        @if(!in_array($key, ['id', 'created_at', 'updated_at', 'deleted_at']))
                            <td>
                                @if(is_bool($value))
                                    {{ $value ? __('global.yes') : __('global.no') }}
                                @elseif(in_array($key, ['created_at', 'updated_at']) && $value)
                                    {{ \Carbon\Carbon::parse($value)->format('Y-m-d H:i:s') }}
                                @else
                                    {{ $value }}
                                @endif
                            </td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>