@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>{{ __('access_control.roles.title') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <x-access-control.index
        title="access_control.roles.title"
        resourceRoute="roles"
        :items="$roles"
        :columns="[
            ['key' => 'name', 'label' => 'access_control.fields.name', 'class' => 'whitespace-nowrap'],
            [
                'key' => 'permissions', 
                'label' => 'access_control.fields.permissions', 
                'class' => 'text-center whitespace-nowrap',
                'render' => function($role) {
                    $permissions = $role->permissions->take(3);
                    $moreCount = $role->permissions->count() - 3;
                    $html = '<div class=\"flex flex-wrap justify-center gap-1\">';
                    foreach($permissions as $perm) {
                        $html .= '<span class=\"px-2 py-1 rounded-full bg-slate-100 text-slate-600 text-xs dark:bg-darkmode-400\">' . e($perm->name) . '</span>';
                    }
                    if($moreCount > 0) {
                        $html .= '<span class=\"px-2 py-1 rounded-full bg-primary/10 text-primary text-xs\">+' . $moreCount . ' ' . __('access_control.actions.more') . '</span>';
                    }
                    $html .= '</div>';
                    return $html;
                }
            ],
            ['key' => 'created_at', 'label' => 'access_control.fields.created_at', 'class' => 'text-center whitespace-nowrap', 'render' => fn($role) => $role->created_at->format('Y-m-d')],
        ]"
        :stats="[
            [
                'label' => 'access_control.stats.total_roles',
                'value' => $roles->total(),
                'icon' => 'Shield',
                'trend' => 'Roles'
            ],
            [
                'label' => 'access_control.stats.total_permissions',
                'value' => Spatie\Permission\Models\Permission::count(),
                'icon' => 'Key',
                'trend' => 'Perms',
                'bg' => 'bg-success/5',
                'border' => 'border-success/20',
                'icon_color' => 'text-success',
                'icon_bg' => 'bg-success/10'
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
    <x-base.dialog id="assign-permissions-modal">
        <x-base.dialog.panel size="lg">
            <form action="{{ route('roles.assign-permissions') }}" method="POST">
                @csrf
                <div class="modal-header p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base me-auto">{{ __('access_control.actions.assign_permissions') }}</h2>
                </div>
                <div class="modal-body p-5">
                    <div class="grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12">
                            <x-base.form-label for="role_id">{{ __('access_control.fields.role') }}</x-base.form-label>
                            <x-base.tom-select name="role_id" id="role_id" class="w-full" required>
                                <option value="">{{ __('access_control.actions.select_role') }}</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </x-base.tom-select>
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('access_control.fields.permissions') }}</x-base.form-label>
                            <div class="grid grid-cols-12 gap-2 mt-2">
                                @foreach(Spatie\Permission\Models\Permission::all() as $permission)
                                    <div class="col-span-12 md:col-span-4 lg:col-span-3">
                                        <div class="flex items-center">
                                            <x-base.form-check.input 
                                                type="checkbox" 
                                                name="permissions[]" 
                                                value="{{ $permission->name }}" 
                                                id="perm_{{ $permission->id }}" 
                                            />
                                            <x-base.form-check.label for="perm_{{ $permission->id }}" class="ms-2 text-xs">
                                                {{ $permission->name }}
                                            </x-base.form-check.label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer p-5 border-t border-slate-200/60 dark:border-darkmode-400 text-end">
                    <x-base.button type="button" data-tw-dismiss="modal" variant="outline-secondary" class="w-24 me-1">
                        {{ __('access_control.actions.cancel') }}
                    </x-base.button>
                    <x-base.button type="submit" variant="primary" class="w-24">
                        {{ __('access_control.actions.save') }}
                    </x-base.button>
                </div>
            </form>
        </x-base.dialog.panel>
    </x-base.dialog>
@endsection
