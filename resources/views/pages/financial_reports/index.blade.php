@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('FinancialReport.list') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('global.financial_reporting') }}</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0 gap-2">
            @can('create_financial_reports')
            <x-base.button variant="primary" as="a" href="{{ route('financial_reports.create') }}" class="flex items-center">
                <x-base.lucide icon="Plus" class="w-4 h-4 me-2" />
                {{ __('global.create') }} {{ __('global.report') }}
            </x-base.button>
            @endcan
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- Filter Section -->
        <div class="intro-y col-span-12">
            <div class="box p-5">
                <form class="flex flex-col sm:flex-row gap-4">
                    <div class="relative flex-1">
                        <x-base.lucide icon="Search" class="absolute inset-y-0 start-0 z-10 my-auto ms-3 h-4 w-4 text-slate-500" />
                        <x-base.form-input type="text" placeholder="{{ __('global.search') }}..." class="ps-10" />
                    </div>
                    <div class="flex gap-2">
                        <x-base.form-select class="w-full sm:w-48">
                            <option value="">{{ __('global.report_type') }}</option>
                            <option value="general">{{ __('global.general') }}</option>
                            <option value="income">{{ __('global.income') }}</option>
                            <option value="expense">{{ __('global.expense') }}</option>
                        </x-base.form-select>
                        <x-base.button variant="secondary" type="submit" class="flex items-center">
                            <x-base.lucide icon="Filter" class="w-4 h-4 me-2" />
                            {{ __('global.filter') }}
                        </x-base.button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <div class="box p-5">
                <x-base.table class="table-auto w-full">
                    <x-base.table.thead class="bg-slate-50 dark:bg-darkmode-800">
                        <x-base.table.tr>
                            <x-base.table.th class="whitespace-nowrap">{{ __('global.name') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('global.type') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('global.period') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-center">{{ __('global.generated_by') }}</x-base.table.th>
                            <x-base.table.th class="text-center whitespace-nowrap">{{ __('global.actions') }}</x-base.table.th>
                        </x-base.table.tr>
                    </x-base.table.thead>
                    <x-base.table.tbody>
                        @forelse($financialReports as $report)
                            <x-base.table.tr class="hover:bg-slate-50 dark:hover:bg-darkmode-600 transition-colors">
                                <x-base.table.td class="font-medium">
                                    <div class="flex items-center">
                                        <x-base.lucide icon="FileText" class="w-4 h-4 me-2 text-slate-500" />
                                        {{ $report->name }}
                                    </div>
                                </x-base.table.td>
                                <x-base.table.td class="text-center">
                                    <span class="px-2 py-1 rounded text-xs bg-slate-100 text-slate-600">
                                        {{ __('global.'.$report->report_type) }}
                                    </span>
                                </x-base.table.td>
                                <x-base.table.td class="text-center text-xs text-slate-500">
                                    {{ $report->period_start->format('Y/m/d') }} - {{ $report->period_end->format('Y/m/d') }}
                                </x-base.table.td>
                                <x-base.table.td class="text-center">
                                    {{ optional($report->generatedBy)->name ?? '-' }}
                                </x-base.table.td>
                                <x-base.table.td class="w-40">
                                    <div class="flex justify-center items-center gap-2">
                                        <a href="{{ route('financial_reports.show', $report->id) }}" class="text-primary" title="{{ __('global.view') }}">
                                            <x-base.lucide icon="Eye" class="w-4 h-4" />
                                        </a>
                                        <a href="#" class="text-slate-500" title="{{ __('global.print') }}">
                                            <x-base.lucide icon="Printer" class="w-4 h-4" />
                                        </a>
                                        @can('delete_financial_reports')
                                        <form action="{{ route('financial_reports.destroy', $report->id) }}" method="POST" onsubmit="return confirm('{{ __('global.confirm_delete') }}')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-danger">
                                                <x-base.lucide icon="Trash2" class="w-4 h-4" />
                                            </button>
                                        </form>
                                        @endcan
                                    </div>
                                </x-base.table.td>
                            </x-base.table.tr>
                        @empty
                            <x-base.table.tr>
                                <x-base.table.td colspan="5" class="text-center py-10">
                                    <div class="flex flex-col items-center">
                                        <x-base.lucide icon="Inbox" class="w-12 h-12 text-slate-300 mb-2" />
                                        <div class="text-slate-500">{{ __('global.no_data_found') }}</div>
                                    </div>
                                </x-base.table.td>
                            </x-base.table.tr>
                        @endforelse
                    </x-base.table.tbody>
                </x-base.table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            {!! $financialReports->links() !!}
        </div>
    </div>
@endsection
