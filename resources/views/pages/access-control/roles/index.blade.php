@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>{{ __('access_control.roles.title') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <x-access-control.index
        title="access_control.roles.title"
        :items="$roles"
        :columns="[
            ['key' => 'id', 'label' => 'access_control.fields.id', 'class' => 'whitespace-nowrap'],
            ['key' => 'name', 'label' => 'access_control.fields.name', 'class' => 'whitespace-nowrap'],
            [
                'key' => 'permissions', 
                'label' => 'access_control.fields.permissions', 
                'class' => 'text-center whitespace-nowrap',
                'render' => function($role) {
                    $permissions = $role->permissions->take(3);
                    $moreCount = $role->permissions->count() - 3;
                    $html = '<div class="flex flex-wrap justify-center gap-1">;
                    foreach($permissions as $perm) {
                        $html .= '<span class="px-2 py-1 rounded-full bg-slate-100 text-slate-600 text-xs dark:bg-darkmode-400">' . e($perm->name) . '</span>;
                    }
                    if($moreCount > 0) {
                        $html .= '<span class="px-2 py-1 rounded-full bg-primary/10 text-primary text-xs">+' . $moreCount . ' ' . __('access_control.actions.more') . '</span>;
                    }
                    $html .= '</div>;
                    return $html;
                }
            ],
            ['key' => 'guard_name', 'label' => 'access_control.fields.guard_name', 'class' => 'text-center whitespace-nowrap'],
            ['key' => 'created_at', 'label' => 'access_control.fields.created_at', 'class' => 'text-center whitespace-nowrap'],
        ]"
        :filters="[
            [
                'name' => 'guard_name',
                'label' => 'access_control.fields.guard_name',
                'type' => 'select',
                'placeholder' => 'access_control.roles.filter_by_guard',
                'options' => [
                    ['value' => 'web', 'label' => 'Web'],
                    ['value' => 'api', 'label' => 'API'],
                ]
            ]
        ]"
        :bulkActions="[
            ['action' => 'delete', 'label' => 'access_control.actions.delete', 'icon' => 'Trash2'],
            ['action' => 'assign_permissions', 'label' => 'access_control.actions.assign_permissions', 'icon' => 'Shield'],
        ]"
        searchPlaceholder="access_control.roles.search"
        createUrl="{{ route('roles.create') }}"
        viewType="table"
        showStats="true"
        :stats="[
            [
                'value' => $roles->count(),
                'label' => 'access_control.messages.total_roles',
                'icon' => 'ShieldCheck',
                'icon_color' => 'text-info',
                'icon_bg' => 'bg-info/10',
                'border' => 'border-info/20',
                'bg' => 'bg-info/5',
                'trend' => 'access_control.fields.total'
            ],
            [
                'value' => $roles->where('guard_name', 'web')->count(),
                'label' => 'access_control.messages.web_roles',
                'icon' => 'Globe',
                'icon_color' => 'text-primary',
                'icon_bg' => 'bg-primary/10',
                'border' => 'border-primary/20',
                'bg' => 'bg-primary/5',
                'trend' => 'access_control.fields.web'
            ]
        ]"
        :pagination="$roles"
    >
        <x-slot name="actions">
            <x-base.button 
                variant="primary" 
                as="a" 
                href="{{ route('roles.create') }}" 
                class="flex items-center shadow-md"
            >
                <x-base.lucide icon="Plus" class="w-4 h-4 me-2" />
                {{ __('access_control.roles.add_new') }}
            </x-base.button>
            
            <x-base.button 
                variant="outline-secondary" 
                data-tw-toggle="modal" 
                data-tw-target="#assign-permissions-modal"
                class="flex items-center"
            >
                <x-base.lucide icon="Shield" class="w-4 h-4 me-2" />
                {{ __('access_control.actions.assign_permissions') }}
            </x-base.button>
        </x-slot>
        
        <x-slot name="afterContent">
            {{ $roles->links() }}
        </x-slot>
    </x-access-control.index>

    <!-- Assign Permissions Modal -->
    <div id="assign-permissions-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="font-medium text-base me-auto">{{ __('access_control.actions.assign_permissions') }}</h2>
                    <x-base.button variant="outline-secondary" data-tw-dismiss="modal">
                        <x-base.lucide icon="X" class="w-4 h-4" />
                    </x-base.button>
                </div>
                <form action="{{ route('roles.assign-permissions') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-4">
                            <x-base.form-label for="role_select" class="required">
                                {{ __('access_control.fields.role') }} <span class="text-danger">*</span>
                            </x-base.form-label>
                            <x-base.tom-select name="role_id" id="role_select" required>
                                <option value="">{{ __('access_control.actions.select_role') }}</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </x-base.tom-select>
                        </div>
                        <div class="mb-4">
                            <x-base.form-label>
                                {{ __('access_control.fields.permissions') }}
                            </x-base.form-label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 max-h-64 overflow-y-auto p-2 border border-slate-200 rounded">
                                @foreach(Spatie\Permission\Models\Permission::all() as $permission)
                                    <div class="flex items-center">
                                        <x-base.form-check.input 
                                            type="checkbox" 
                                            name="permissions[]" 
                                            value="{{ $permission->id }}" 
                                            id="perm_{{ $permission->id }}" 
                                            class="me-2"
                                        />
                                        <x-base.form-check.label for="perm_{{ $permission->id }}">
                                            {{ $permission->name }}
                                        </x-base.form-check.label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <x-base.button variant="outline-secondary" data-tw-dismiss="modal">
                            {{ __('access_control.actions.cancel') }}
                        </x-base.button>
                        <x-base.button variant="primary" type="submit">
                            <x-base.lucide icon="Save" class="w-4 h-4 me-2" />
                            {{ __('access_control.actions.assign') }}
                        </x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
