@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>Command Monitoring - Deebo</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">CRUD & Command Monitoring</h2>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <x-base.table class="table-report -mt-2">
                <x-base.table.thead>
                    <x-base.table.tr>
                        <x-base.table.th class="whitespace-nowrap">DATE</x-base.table.th>
                        <x-base.table.th class="whitespace-nowrap">COMMAND</x-base.table.th>
                        <x-base.table.th class="whitespace-nowrap">PARAMETERS</x-base.table.th>
                        <x-base.table.th class="text-center whitespace-nowrap">STATUS</x-base.table.th>
                        <x-base.table.th class="text-center whitespace-nowrap">ACTIONS</x-base.table.th>
                    </x-base.table.tr>
                </x-base.table.thead>
                <x-base.table.tbody>
                    @foreach($logs as $log)
                        <x-base.table.tr class="intro-x">
                            <x-base.table.td class="w-40 text-xs">
                                {{ $log->created_at->format('Y-m-d H:i:s') }}
                            </x-base.table.td>
                            <x-base.table.td>
                                <span class="font-medium whitespace-nowrap text-primary">{{ $log->command }}</span>
                            </x-base.table.td>
                            <x-base.table.td>
                                <div class="text-xs text-slate-500">
                                    @foreach($log->parameters as $key => $val)
                                        <b>{{ $key }}:</b> {{ is_array($val) ? json_encode($val) : $val }}<br>
                                    @endforeach
                                </div>
                            </x-base.table.td>
                            <x-base.table.td class="w-40">
                                <div class="flex items-center justify-center {{ $log->status == 'success' ? 'text-success' : ($log->status == 'failed' ? 'text-danger' : 'text-warning') }}">
                                    <x-base.lucide icon="{{ $log->status == 'success' ? 'CheckCircle' : ($log->status == 'failed' ? 'XCircle' : 'RefreshCcw') }}" class="w-4 h-4 mr-2" />
                                    {{ ucfirst($log->status) }}
                                </div>
                            </x-base.table.td>
                            <x-base.table.td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <x-base.button variant="outline-secondary" as="a" href="{{ route('monitoring.show', $log->id) }}" size="sm" class="mr-2">
                                        <x-base.lucide icon="FileText" class="w-4 h-4 mr-1" /> View Logs
                                    </x-base.button>
                                    @if($log->status == 'failed')
                                        <x-base.button variant="primary" as="a" href="{{ route('monitoring.rerun', $log->id) }}" size="sm">
                                            <x-base.lucide icon="RotateCcw" class="w-4 h-4 mr-1 text-white" /> Rerun
                                        </x-base.button>
                                    @endif
                                </div>
                            </x-base.table.td>
                        </x-base.table.tr>
                    @endforeach
                </x-base.table.tbody>
            </x-base.table>
            <div class="mt-4">
                {{ $logs->links() }}
            </div>
        </div>
    </div>
@endsection
