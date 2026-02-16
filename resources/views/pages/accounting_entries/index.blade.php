@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('AccountingEntry.list') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('global.accounting_entries') }}</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0 gap-2">
            @can('create_accounting_entries')
            <x-base.button variant="primary" as="a" href="{{ route('accounting_entries.create') }}" class="flex items-center">
                <x-base.lucide icon="Plus" class="w-4 h-4 me-2" />
                {{ __('global.create') }} {{ __('global.entry') }}
            </x-base.button>
            @endcan
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- Filter Section -->
        <div class="intro-y col-span-12">
            <div class="box p-5">
                <form class="flex flex-col lg:flex-row gap-4">
                    <div class="relative flex-1">
                        <x-base.lucide icon="Search" class="absolute inset-y-0 start-0 z-10 my-auto ms-3 h-4 w-4 text-slate-500" />
                        <x-base.form-input type="text" placeholder="{{ __('global.search_reference') }}..." class="ps-10" />
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                        <x-base.form-input type="date" class="w-full" placeholder="{{ __('global.from_date') }}" />
                        <x-base.form-input type="date" class="w-full" placeholder="{{ __('global.to_date') }}" />
                        <x-base.form-select class="w-full">
                            <option value="">{{ __('global.account_type') }}</option>
                            <option value="asset">{{ __('global.asset') }}</option>
                            <option value="liability">{{ __('global.liability') }}</option>
                            <option value="equity">{{ __('global.equity') }}</option>
                            <option value="revenue">{{ __('global.revenue') }}</option>
                            <option value="expense">{{ __('global.expense') }}</option>
                        </x-base.form-select>
                        <x-base.button variant="secondary" type="submit" class="flex items-center justify-center">
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
                    <x-base.table.thead class="bg-slate-50 dark:bg-darkmode-800 border-b border-slate-200">
                        <x-base.table.tr>
                            <x-base.table.th class="whitespace-nowrap text-start">{{ __('global.date') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-start">{{ __('global.reference') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-start">{{ __('global.description') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-end">{{ __('global.debit') }}</x-base.table.th>
                            <x-base.table.th class="whitespace-nowrap text-end">{{ __('global.credit') }}</x-base.table.th>
                            <x-base.table.th class="text-center whitespace-nowrap">{{ __('global.actions') }}</x-base.table.th>
                        </x-base.table.tr>
                    </x-base.table.thead>
                    <x-base.table.tbody>
                        @forelse($accountingEntries as $entry)
                            <x-base.table.tr class="hover:bg-slate-50 dark:hover:bg-darkmode-600 transition-colors border-b border-slate-100 dark:border-darkmode-400">
                                <x-base.table.td class="text-xs text-slate-500">{{ $entry->entry_date }}</x-base.table.td>
                                <x-base.table.td class="font-medium text-primary">{{ $entry->reference ?? '-' }}</x-base.table.td>
                                <x-base.table.td class="max-w-xs truncate text-slate-600" title="{{ $entry->description }}">
                                    {{ $entry->description ?? '-' }}
                                </x-base.table.td>
                                <x-base.table.td class="text-end text-danger font-medium">
                                    {{ $entry->debit > 0 ? number_format($entry->debit, 2) : '-' }}
                                </x-base.table.td>
                                <x-base.table.td class="text-end text-success font-medium">
                                    {{ $entry->credit > 0 ? number_format($entry->credit, 2) : '-' }}
                                </x-base.table.td>
                                <x-base.table.td class="w-40">
                                    <div class="flex justify-center items-center gap-2">
                                        <a href="{{ route('accounting_entries.show', $entry->id) }}" class="text-primary" title="{{ __('global.view') }}">
                                            <x-base.lucide icon="Eye" class="w-4 h-4" />
                                        </a>
                                        <a href="{{ route('accounting_entries.edit', $entry->id) }}" class="text-pending" title="{{ __('global.edit') }}">
                                            <x-base.lucide icon="Pencil" class="w-4 h-4" />
                                        </a>
                                        @can('delete_accounting_entries')
                                        <form action="{{ route('accounting_entries.destroy', $entry->id) }}" method="POST" onsubmit="return confirm('{{ __('global.confirm_delete') }}')" class="inline">
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
                                <x-base.table.td colspan="6" class="text-center py-10">
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
            {!! $accountingEntries->links() !!}
        </div>
    </div>
@endsection
