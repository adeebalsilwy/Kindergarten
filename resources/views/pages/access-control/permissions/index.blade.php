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
            ['key' => 'id', 'label' => 'access_control.fields.id', 'class' => 'whitespace-nowrap'],
            ['key' => 'name', 'label' => 'access_control.fields.name', 'class' => 'whitespace-nowrap'],
            ['key' => 'guard_name', 'label' => 'access_control.fields.guard_name', 'class' => 'text-center whitespace-nowrap'],
            ['key' => 'created_at', 'label' => 'access_control.fields.created_at', 'class' => 'text-center whitespace-nowrap'],
        ]"
        :filters="[
            [
                'name' => 'guard_name',
                'label' => 'access_control.fields.guard_name',
                'type' => 'select',
                'placeholder' => 'access_control.permissions.filter_by_guard',
                'options' => [
                    ['value' => 'web', 'label' => 'Web'],
                    ['value' => 'api', 'label' => 'API'],
                ]
            ]
        ]"
        :bulkActions="[
            ['action' => 'delete', 'label' => 'access_control.actions.delete', 'icon' => 'Trash2'],
        ]"
        searchPlaceholder="access_control.permissions.search"
        createUrl="{{ route('permissions.create') }}"
        viewType="table"
        showStats="false"
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
        
        <x-slot name="afterContent">
            {{ $permissions->links() }}
        </x-slot>
    </x-access-control.index>

    <!-- Create Permission Modal -->
    <div id="create-permission-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="font-medium text-base me-auto">{{ __('access_control.permissions.add_new') }}</h2>
                    <x-base.button variant="outline-secondary" data-tw-dismiss="modal">
                        <x-base.lucide icon="X" class="w-4 h-4" />
                    </x-base.button>
                </div>
                <form action="{{ route('permissions.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-4">
                            <x-base.form-label for="modal_name" class="required">
                                {{ __('access_control.fields.name') }} <span class="text-danger">*</span>
                            </x-base.form-label>
                            <x-base.form-input 
                                id="modal_name" 
                                name="name" 
                                type="text" 
                                placeholder="e.g. view_reports" 
                                required 
                            />
                        </div>
                        <div class="mb-4">
                            <x-base.form-label for="modal_guard_name">
                                {{ __('access_control.fields.guard_name') }}
                            </x-base.form-label>
                            <x-base.tom-select name="guard_name" id="modal_guard_name">
                                <option value="web">Web</option>
                                <option value="api">API</option>
                            </x-base.tom-select>
                        </div>
                        <div class="mb-4">
                            <x-base.form-label for="modal_description">
                                {{ __('access_control.fields.description') }}
                            </x-base.form-label>
                            <x-base.form-textarea 
                                id="modal_description" 
                                name="description" 
                                rows="3" 
                                placeholder="{{ __('access_control.messages.description_placeholder') }}"
                            ></x-base.form-textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <x-base.button variant="outline-secondary" data-tw-dismiss="modal">
                            {{ __('access_control.actions.cancel') }}
                        </x-base.button>
                        <x-base.button variant="primary" type="submit">
                            <x-base.lucide icon="Save" class="w-4 h-4 me-2" />
                            {{ __('access_control.actions.create') }}
                        </x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
