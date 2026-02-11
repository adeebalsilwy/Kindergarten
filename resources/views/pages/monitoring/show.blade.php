@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>Log Details - Deebo</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Command Log: #{{ $log->id }}</h2>
        <x-base.button variant="outline-secondary" as="a" href="{{ route('monitoring.index') }}" class="w-24 mr-2">Back</x-base.button>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12">
            <div class="box p-5">
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 md:col-span-6">
                        <div class="text-slate-500">Command</div>
                        <div class="mt-1 font-medium text-lg">{{ $log->command }}</div>
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <div class="text-slate-500">Execution Date</div>
                        <div class="mt-1 font-medium">{{ $log->created_at->format('Y-m-d H:i:s') }}</div>
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <div class="text-slate-500">Status</div>
                        <div class="mt-1 inline-flex items-center {{ $log->status == 'success' ? 'text-success' : ($log->status == 'failed' ? 'text-danger' : 'text-warning') }}">
                             <x-base.lucide icon="{{ $log->status == 'success' ? 'CheckCircle' : ($log->status == 'failed' ? 'XCircle' : 'RefreshCcw') }}" class="w-4 h-4 mr-2" />
                            {{ ucfirst($log->status) }}
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <div class="text-slate-500">Duration</div>
                        <div class="mt-1 font-medium">{{ $log->updated_at->diffForHumans($log->created_at, true) }}</div>
                    </div>
                </div>

                <div class="mt-10">
                    <h3 class="text-base font-medium border-b pb-2 mb-4">Parameters</h3>
                    <pre class="bg-slate-100 p-4 rounded dark:bg-darkmode-400 overflow-x-auto"><code>{{ json_encode($log->parameters, JSON_PRETTY_PRINT) }}</code></pre>
                </div>

                @if($log->output)
                <div class="mt-10">
                    <h3 class="text-base font-medium border-b pb-2 mb-4">Output</h3>
                    <div class="bg-slate-800 text-slate-100 p-4 rounded font-mono text-sm overflow-x-auto whitespace-pre-wrap">{{ $log->output }}</div>
                </div>
                @endif

                @if($log->error_message)
                <div class="mt-10">
                    <h3 class="text-base font-medium border-b pb-2 mb-4 text-danger">Error Message</h3>
                    <div class="bg-danger/10 text-danger p-4 rounded font-mono text-sm overflow-x-auto whitespace-pre-wrap">{{ $log->error_message }}</div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
