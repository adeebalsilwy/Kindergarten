@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>{{ __('global.students') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('global.students') }}</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0 gap-2">
            @can('create_children')
            <x-base.button variant="primary" as="a" href="{{ route('children.create') }}" class="flex items-center shadow-md">
                <x-base.lucide icon="Plus" class="w-4 h-4 mr-2" />
                {{ __('global.add_student') }}
            </x-base.button>
            @endcan
            <x-base.dropdown>
                <x-base.dropdown.toggle as="x-base.button" variant="outline-secondary" class="font-normal">
                    {{ __('global.export') }} <x-base.lucide icon="ChevronDown" class="w-4 h-4 ml-2" />
                </x-base.dropdown.toggle>
                <x-base.dropdown.menu class="w-40">
                    <x-base.dropdown.item as="a" href="{{ route('children.index', ['export' => 'xlsx']) }}">
                        <x-base.lucide icon="FileSpreadsheet" class="w-4 h-4 mr-2" /> Excel
                    </x-base.dropdown.item>
                    <x-base.dropdown.item as="a" href="{{ route('children.index', ['export' => 'pdf']) }}">
                        <x-base.lucide icon="FileText" class="w-4 h-4 mr-2" /> PDF
                    </x-base.dropdown.item>
                </x-base.dropdown.menu>
            </x-base.dropdown>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- Statistics Section -->
        <div class="col-span-12 grid grid-cols-12 gap-6 intro-y">
            <div class="col-span-12 sm:col-span-6 xl:col-span-3">
                <div class="report-box zoom-in">
                    <div class="box p-5">
                        <div class="flex">
                            <x-base.lucide icon="Users" class="report-box__icon text-primary" />
                        </div>
                        <div class="text-2xl font-medium leading-8 mt-6">{{ $childrens->total() }}</div>
                        <div class="text-base text-slate-500 mt-1">{{ __('global.total_students') }}</div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-6 xl:col-span-3">
                <div class="report-box zoom-in">
                    <div class="box p-5">
                        <div class="flex">
                            <x-base.lucide icon="CheckSquare" class="report-box__icon text-success" />
                        </div>
                        <div class="text-2xl font-medium leading-8 mt-6">{{ $childrens->where('enrollment_status', 'active')->count() }}</div>
                        <div class="text-base text-slate-500 mt-1">{{ __('global.active') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter & Search Section -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <div class="flex w-full sm:w-auto">
                <div class="w-56 relative text-slate-500">
                    <x-base.form-input
                        type="text"
                        class="w-56 pr-10 !box"
                        placeholder="{{ __('global.search') }}..."
                    />
                    <x-base.lucide
                        class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"
                        icon="Search"
                    />
                </div>
            </div>
            <div class="hidden md:block mx-auto text-slate-500">
                Showing {{ $childrens->firstItem() }} to {{ $childrens->lastItem() }} of {{ $childrens->total() }} entries
            </div>
        </div>

        <!-- Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">{{ __('global.name') }}</th>
                        <th class="whitespace-nowrap">{{ __('global.class') }}</th>
                        <th class="text-center whitespace-nowrap">{{ __('global.gender') }}</th>
                        <th class="text-center whitespace-nowrap">{{ __('global.status') }}</th>
                        <th class="text-center whitespace-nowrap">{{ __('global.fees') }}</th>
                        <th class="text-right whitespace-nowrap">{{ __('global.balance') }}</th>
                        <th class="text-center whitespace-nowrap">{{ __('global.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($childrens as $child)
                        <tr class="intro-x">
                            <td class="w-40">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 image-fit zoom-in mr-3">
                                        <img alt="{{ $child->name }}" class="rounded-full shadow-lg" src="{{ $child->photo_path ? asset($child->photo_path) : 'https://ui-avatars.com/api/?name=' . urlencode($child->name) . '&background=random' }}">
                                    </div>
                                    <div class="font-medium whitespace-nowrap">{{ $child->name }}</div>
                                </div>
                            </td>
                            <td>
                                <div class="text-slate-500 text-xs whitespace-nowrap">{{ $child->class->name ?? 'N/A' }}</div>
                            </td>
                            <td class="text-center">
                                <span class="capitalize">{{ __('global.'.$child->gender) }}</span>
                            </td>
                            <td class="w-40">
                                @php
                                    $statusColor = $child->enrollment_status == 'active' ? 'text-success' : ($child->enrollment_status == 'graduated' ? 'text-primary' : 'text-danger');
                                @endphp
                                <div class="flex items-center justify-center {{ $statusColor }}">
                                    <x-base.lucide icon="Activity" class="w-4 h-4 mr-2" /> {{ __('global.'.$child->enrollment_status) }}
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="text-xs">{{ __('global.total') }}: {{ number_format($child->fees_required) }}</div>
                                <div class="text-success text-xs font-bold">{{ __('global.paid') }}: {{ number_format($child->fees_paid) }}</div>
                            </td>
                            <td class="text-right">
                                <div class="font-bold {{ ($child->fees_required - $child->fees_paid) > 0 ? 'text-danger' : 'text-success' }}">
                                    {{ number_format($child->fees_required - $child->fees_paid) }}
                                </div>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3 text-primary" href="{{ route('children.show', $child->id) }}">
                                        <x-base.lucide icon="Eye" class="w-4 h-4 mr-1" /> {{ __('global.view') }}
                                    </a>
                                    <a class="flex items-center mr-3" href="{{ route('children.edit', $child->id) }}">
                                        <x-base.lucide icon="CheckSquare" class="w-4 h-4 mr-1" /> {{ __('global.edit') }}
                                    </a>
                                    @can('delete_children')
                                    <form action="{{ route('children.destroy', $child->id) }}" method="POST" onsubmit="return confirm('{{ __('global.confirm_delete') }}')" class="flex items-center">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="flex items-center text-danger">
                                            <x-base.lucide icon="Trash2" class="w-4 h-4 mr-1" /> {{ __('global.delete') }}
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-10 text-slate-500">
                                <x-base.lucide icon="Inbox" class="w-12 h-12 mx-auto mb-3" />
                                {{ __('global.no_records_found') }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            {{ $childrens->links() }}
        </div>
    </div>
@endsection
