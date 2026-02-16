@extends('../themes/kindergarten')

@section('head')
    <title>{{ __('global.account_statement') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('global.account_statement') }}</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <x-base.button variant="outline-primary" as="a" href="{{ route('classes.export.pdf') }}?report_type=account_statement" class="flex items-center me-2">
                <x-base.lucide icon="FileText" class="w-4 h-4 me-2" />
                {{ __('global.export_pdf') }}
            </x-base.button>
            <x-base.button variant="outline-success" as="a" href="{{ route('classes.export.excel') }}?report_type=account_statement" class="flex items-center">
                <x-base.lucide icon="FileSpreadsheet" class="w-4 h-4 me-2" />
                {{ __('global.export_excel') }}
            </x-base.button>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- Filter Section -->
        <div class="intro-y col-span-12">
            <div class="box p-5">
                <form method="GET" action="{{ route('classes.account-statement') }}">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <div class="flex-1">
                            <x-base.form-label>{{ __('global.start_date') }}</x-base.form-label>
                            <x-base.form-input type="date" name="start_date" value="{{ request('start_date') }}" />
                        </div>
                        <div class="flex-1">
                            <x-base.form-label>{{ __('global.end_date') }}</x-base.form-label>
                            <x-base.form-input type="date" name="end_date" value="{{ request('end_date') }}" />
                        </div>
                        <div class="flex items-end">
                            <x-base.button variant="primary" type="submit" class="flex items-center">
                                <x-base.lucide icon="Search" class="w-4 h-4 me-2" />
                                {{ __('global.search') }}
                            </x-base.button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Account Statement Table -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <x-base.table class="table-report -mt-2">
                <x-base.table.thead>
                    <x-base.table.tr>
                        <x-base.table.th class="text-center whitespace-nowrap">{{ __('global.date') }}</x-base.table.th>
                        <x-base.table.th class="text-center whitespace-nowrap">{{ __('global.description') }}</x-base.table.th>
                        <x-base.table.th class="text-center whitespace-nowrap">{{ __('global.debit') }}</x-base.table.th>
                        <x-base.table.th class="text-center whitespace-nowrap">{{ __('global.credit') }}</x-base.table.th>
                        <x-base.table.th class="text-center whitespace-nowrap">{{ __('global.balance') }}</x-base.table.th>
                    </x-base.table.tr>
                </x-base.table.thead>
                <x-base.table.tbody>
                    @forelse($accountStatement['entries'] as $entry)
                        <x-base.table.tr class="intro-x">
                            <x-base.table.td class="text-center">{{ $entry['date']->format('Y-m-d') }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $entry['description'] }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $entry['debit'] > 0 ? number_format($entry['debit'], 2) : '' }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $entry['credit'] > 0 ? number_format($entry['credit'], 2) : '' }}</x-base.table.td>
                            <x-base.table.td class="text-center {{ $entry['balance'] >= 0 ? 'text-success' : 'text-danger' }}">{{ number_format($entry['balance'], 2) }}</x-base.table.td>
                        </x-base.table.tr>
                    @empty
                        <x-base.table.tr>
                            <x-base.table.td colspan="5" class="text-center py-10">
                                <div class="flex flex-col items-center justify-center">
                                    <x-base.lucide icon="Inbox" class="w-16 h-16 text-gray-400 mb-4" />
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('global.no_data_found') }}</h3>
                                    <p class="text-gray-500 dark:text-gray-400 mt-1">{{ __('global.no_data_description') }}</p>
                                </div>
                            </x-base.table.td>
                        </x-base.table.tr>
                    @endforelse
                </x-base.table.tbody>
            </x-base.table>
        </div>

        <!-- Final Balance Section -->
        @if(isset($accountStatement['final_balance']))
        <div class="intro-y col-span-12 mt-4">
            <div class="box p-5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="p-4 border rounded-lg">
                        <div class="text-gray-500">{{ __('global.account_name') }}</div>
                        <div class="text-xl font-bold">{{ $accountStatement['account_name'] }}</div>
                    </div>
                    <div class="p-4 border rounded-lg {{ $accountStatement['final_balance'] >= 0 ? 'bg-success/10' : 'bg-danger/10' }}">
                        <div class="text-gray-500">{{ __('global.final_balance') }}</div>
                        <div class="text-xl font-bold {{ $accountStatement['final_balance'] >= 0 ? 'text-success' : 'text-danger' }}">{{ number_format($accountStatement['final_balance'], 2) }}</div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection