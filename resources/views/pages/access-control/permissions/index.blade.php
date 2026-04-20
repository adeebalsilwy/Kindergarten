@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>{{ __('access_control.permissions.title') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <x-access-control.index
        title="access_control.permissions.title"
        resourceRoute="permissions"
        :items="$permissions"
        :columns="[
            ['key' => 'name', 'label' => 'access_control.fields.name', 'class' => 'whitespace-nowrap'],
            ['key' => 'guard_name', 'label' => 'access_control.fields.guard', 'class' => 'text-center whitespace-nowrap'],
            ['key' => 'created_at', 'label' => 'access_control.fields.created_at', 'class' => 'text-center whitespace-nowrap', 'render' => fn($p) => $p->created_at->format('Y-m-d')],
        ]"
        :pagination="$permissions"
    >
        <x-slot name="actions">
            <x-base.button 
                variant="primary" 
                data-tw-toggle="modal" 
                data-tw-target="#create-permission-modal"
                class="flex items-center shadow-md"
            >
                <x-base.lucide icon="Plus" class="w-4 h-4 me-2" />
                {{ __('access_control.permissions.add_new') }}
            </x-base.button>
        </x-slot>
    </x-access-control.index>

    <!-- Create Permission Modal -->
    <x-base.dialog id="create-permission-modal">
        <x-base.dialog.panel>
            <form action="{{ route('permissions.store') }}" method="POST">
                @csrf
                <div class="modal-header p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base me-auto">{{ __('access_control.permissions.add_new') }}</h2>
                </div>
                <div class="modal-body p-10">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12">
                            <x-base.form-label for="modal_name" class="font-bold">{{ __('access_control.fields.name') }}</x-base.form-label>
                            <x-base.form-input 
                                id="modal_name"
                                name="name" 
                                type="text" 
                                class="w-full" 
                                placeholder="e.g. view_users"
                            />
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label for="modal_guard" class="font-bold">{{ __('access_control.fields.guard') }}</x-base.form-label>
                            <x-base.tom-select name="guard_name" id="modal_guard" class="w-full">
                                <option value="web">web</option>
                                <option value="api">api</option>
                            </x-base.tom-select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer p-5 text-end border-t border-slate-200/60 dark:border-darkmode-400">
                    <x-base.button type="button" data-tw-dismiss="modal" variant="outline-secondary" class="w-32 me-1">
                        {{ __('access_control.actions.cancel') }}
                    </x-base.button>
                    <x-base.button type="submit" variant="primary" class="w-32">
                        <x-base.lucide icon="Save" class="w-4 h-4 me-2" />
                        {{ __('access_control.actions.save') }}
                    </x-base.button>
                </div>
            </form>
        </x-base.dialog.panel>
    </x-base.dialog>
@endsection
