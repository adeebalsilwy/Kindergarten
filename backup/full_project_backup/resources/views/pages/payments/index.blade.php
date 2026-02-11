@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('kindergarten.payments.list') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('kindergarten.payments.list') }}</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            @can('export_payments')
            <div class="flex gap-2">
                <x-base.button variant="outline-primary" as="a" href="{{ route('payments.export.pdf') }}" class="flex items-center">
                    <x-base.lucide icon="FileText" class="w-4 h-4 mr-2" />
                    {{ __('global.export_pdf') }}
                </x-base.button>
                <x-base.button variant="outline-success" as="a" href="{{ route('payments.export.excel') }}" class="flex items-center">
                    <x-base.lucide icon="FileSpreadsheet" class="w-4 h-4 mr-2" />
                    {{ __('global.export_excel') }}
                </x-base.button>
            </div>
            @endcan
            
            @can('create_payments')
            <x-base.button variant="primary" as="a" href="{{ route('payments.create') }}" class="ml-2 flex items-center">
                <x-base.lucide icon="Plus" class="w-4 h-4 mr-2" />
                {{ __('kindergarten.payments.add_new') }}
            </x-base.button>
            @endcan
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <x-base.table class="table-report -mt-2">
                <x-base.table.thead>
                    <x-base.table.tr>
                        <x-base.table.th class="whitespace-nowrap">{{ __('kindergarten.payments.child') }}</x-base.table.th>
                        <x-base.table.th class="whitespace-nowrap text-center">{{ __('kindergarten.payments.amount') }}</x-base.table.th>
                        <x-base.table.th class="whitespace-nowrap text-center">{{ __('kindergarten.payments.date') }}</x-base.table.th>
                        <x-base.table.th class="whitespace-nowrap text-center">{{ __('kindergarten.payments.receipt') }}</x-base.table.th>
                        <x-base.table.th class="whitespace-nowrap text-center">{{ __('kindergarten.payments.status') }}</x-base.table.th>
                        <x-base.table.th class="text-center whitespace-nowrap">{{ __('global.actions') }}</x-base.table.th>
                    </x-base.table.tr>
                </x-base.table.thead>
                <x-base.table.tbody>
                    @forelse($payments as $payment)
                        <x-base.table.tr class="intro-x">
                            <x-base.table.td>
                                <div class="font-medium whitespace-nowrap">{{ $payment->child ? $payment->child->name : '-' }}</div>
                            </x-base.table.td>
                            <x-base.table.td class="text-center">{{ number_format($payment->amount, 2) }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $payment->payment_date ? $payment->payment_date->format('Y-m-d') : '-' }}</x-base.table.td>
                            <x-base.table.td class="text-center">{{ $payment->receipt_number }}</x-base.table.td>
                            <x-base.table.td class="text-center">
                                <span class="px-2 py-1 rounded-full bg-success/10 text-success text-xs font-medium">
                                    {{ $payment->status }}
                                </span>
                            </x-base.table.td>
                            <x-base.table.td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <x-base.button variant="outline-secondary" as="a" href="{{ route('payments.show', $payment->id) }}" size="sm" class="mr-2">
                                        <x-base.lucide icon="Eye" class="w-4 h-4 mr-1" />
                                    </x-base.button>
                                    <x-base.button variant="outline-primary" as="a" href="{{ route('payments.edit', $payment->id) }}" size="sm" class="mr-2">
                                        <x-base.lucide icon="Pencil" class="w-4 h-4 mr-1" />
                                    </x-base.button>
                                    <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" onsubmit="return confirm('{{ __('global.confirm_delete') }}')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <x-base.button variant="outline-danger" type="submit" size="sm">
                                            <x-base.lucide icon="Trash2" class="w-4 h-4 mr-1" />
                                        </x-base.button>
                                    </form>
                                </div>
                            </x-base.table.td>
                        </x-base.table.tr>
                    @empty
                        <x-base.table.tr>
                            <x-base.table.td colspan="6" class="text-center py-10">
                                <div class="flex flex-col items-center justify-center">
                                    <x-base.lucide icon="DollarSign" class="w-16 h-16 text-gray-400 mb-4" />
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('global.no_data_found') }}</h3>
                                    <x-base.button variant="primary" as="a" href="{{ route('payments.create') }}" class="mt-4">
                                        <x-base.lucide icon="Plus" class="w-4 h-4 mr-2" />
                                        {{ __('kindergarten.payments.add_new') }}
                                    </x-base.button>
                                </div>
                            </x-base.table.td>
                        </x-base.table.tr>
                    @endforelse
                </x-base.table.tbody>
            </x-base.table>
        </div>
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            {{ $payments->links() }}
        </div>
    </div>
@endsection
