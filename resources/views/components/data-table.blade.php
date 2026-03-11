@props([
    'columns' => [],
    'data' => [],
    'sortable' => true,
    'searchable' => false,
    'paginated' => true,
    'actions' => [],
    'bulkActions' => [],
    'emptyMessage' => __('global.no_data_available')
])

<div class="box p-5">
    @if($searchable)
        <div class="mb-4">
            <x-base.form-input
                type="text"
                placeholder="{{ __('global.search') }}..."
                wire:model.live.debounce.300ms="search"
                class="w-full"
            />
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="bg-slate-100 border-b-2 border-slate-200">
                    @if($bulkActions)
                        <th class="px-4 py-3 text-left">
                            <input type="checkbox" class="form-check-input" wire:model="selected" />
                        </th>
                    @endif

                    @foreach($columns as $key => $label)
                        <th class="px-4 py-3 text-left font-bold text-slate-700
                            {{ $sortable ? 'cursor-pointer hover:bg-slate-200' : '' }}"
                            @if($sortable) wire:click="sortBy('{{ $key }}')" @endif>
                            <div class="flex items-center justify-between">
                                {{ $label }}
                                @if($sortable)
                                    <x-base.lucide icon="ChevronsUpDown" class="w-4 h-4 ms-1" />
                                @endif
                            </div>
                        </th>
                    @endforeach

                    @if($actions)
                        <th class="px-4 py-3 text-center font-bold text-slate-700">
                            {{ __('global.actions') }}
                        </th>
                    @endif
                </tr>
            </thead>

            <tbody>
                @forelse($data as $row)
                    <tr class="border-b border-slate-100 hover:bg-slate-50 transition-colors">
                        @if($bulkActions)
                            <td class="px-4 py-3">
                                <input type="checkbox" class="form-check-input" value="{{ $row->id }}" wire:model="selected" />
                            </td>
                        @endif

                        @foreach($columns as $key => $label)
                            <td class="px-4 py-3 text-slate-700">
                                {{ $row->$key }}
                            </td>
                        @endforeach

                        @if($actions)
                            <td class="px-4 py-3 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    @foreach($actions as $action)
                                        @if($action['type'] === 'view')
                                            <a href="{{ route($action['route'], $row->id) }}"
                                               class="p-2 rounded-lg bg-info/10 text-info hover:bg-info hover:text-white transition-colors"
                                               title="{{ __('global.view') }}">
                                                <x-base.lucide icon="Eye" class="w-4 h-4" />
                                            </a>
                                        @elseif($action['type'] === 'edit')
                                            <a href="{{ route($action['route'], $row->id) }}"
                                               class="p-2 rounded-lg bg-warning/10 text-warning hover:bg-warning hover:text-white transition-colors"
                                               title="{{ __('global.edit') }}">
                                                <x-base.lucide icon="Pencil" class="w-4 h-4" />
                                            </a>
                                        @elseif($action['type'] === 'delete')
                                            <form action="{{ route($action['route'], $row->id) }}" method="POST" class="inline"
                                                  onsubmit="return confirm('{{ __('global.confirm_delete') }}')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="p-2 rounded-lg bg-danger/10 text-danger hover:bg-danger hover:text-white transition-colors"
                                                        title="{{ __('global.delete') }}">
                                                    <x-base.lucide icon="Trash2" class="w-4 h-4" />
                                                </button>
                                            </form>
                                        @endif
                                    @endforeach
                                </div>
                            </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ count($columns) + ($bulkActions ? 1 : 0) + ($actions ? 1 : 0) }}"
                            class="px-4 py-8 text-center text-slate-500">
                            <x-base.lucide icon="Inbox" class="w-12 h-12 mx-auto mb-2 opacity-50" />
                            {{ $emptyMessage }}
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($paginated && method_exists($data, 'links'))
        <div class="mt-4">
            {{ $data->links() }}
        </div>
    @endif
</div>
