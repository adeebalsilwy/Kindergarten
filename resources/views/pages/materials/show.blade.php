@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Materials.show') }} - Laravel</title>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/pages/materials.css') }}">
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('Materials.show') }}</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            @can('update_materials', $material)
            <x-base.button variant="outline-primary" as="a" href="{{ route('materials.edit', $material->id) }}" class="me-2 flex items-center">
                <x-base.lucide icon="Pencil" class="w-4 h-4 me-2" />
                {{ __('global.edit') }}
            </x-base.button>
            @endcan
            
            <x-base.button variant="secondary" as="a" href="{{ route('materials.index') }}" class="me-2 flex items-center">
                <x-base.lucide icon="ArrowLeftCircle" class="w-4 h-4 me-2" />
                {{ __('global.back_to_list') }}
            </x-base.button>
            
            @can('delete_materials', $material)
            <form action="{{ route('materials.destroy', $material->id) }}" method="POST" onsubmit="return confirm('{{ __('global.confirm_delete') }}')" class="inline">
                @csrf
                @method('DELETE')
                <x-base.button variant="outline-danger" type="submit" class="flex items-center">
                    <x-base.lucide icon="Trash2" class="w-4 h-4 me-2" />
                    {{ __('global.delete') }}
                </x-base.button>
            </form>
            @endcan
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- Main Information Card -->
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="box p-5">
                <div class="font-medium flex items-center">
                    <x-base.lucide icon="Info" class="w-4 h-4 me-2" />
                    {{ __('materials.sections.basic_info') }}
                </div>
                
                <div class="mt-5">
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12">
                            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                <div class="flex items-center justify-center h-48">
                                    <div class="text-center">
                                        <x-base.lucide icon="Package" class="w-12 h-12 mx-auto text-slate-500" />
                                        <div class="mt-3 text-xl font-medium">{{ $material->name }}</div>
                                        <div class="text-slate-500 mt-1">{{ __($material->getCategoryNameAttribute()) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-span-6">
                            <x-base.form-label>{{ __('materials.fields.name') }}</x-base.form-label>
                            <div class="mt-1">{{ $material->name }}</div>
                        </div>
                        
                        <div class="col-span-6">
                            <x-base.form-label>{{ __('materials.fields.category') }}</x-base.form-label>
                            <div class="mt-1">{{ __($material->getCategoryNameAttribute()) }}</div>
                        </div>
                        
                        <div class="col-span-6">
                            <x-base.form-label>{{ __('materials.fields.type') }}</x-base.form-label>
                            <div class="mt-1">{{ __($material->getTypeNameAttribute()) }}</div>
                        </div>
                        
                        <div class="col-span-6">
                            <x-base.form-label>{{ __('materials.fields.quantity_available') }}</x-base.form-label>
                            <div class="mt-1">{{ $material->quantity_available }}</div>
                        </div>
                        
                        <div class="col-span-6">
                            <x-base.form-label>{{ __('materials.fields.quantity_required') }}</x-base.form-label>
                            <div class="mt-1">{{ $material->quantity_required }}</div>
                        </div>
                        
                        <div class="col-span-6">
                            <x-base.form-label>{{ __('materials.fields.unit_cost') }}</x-base.form-label>
                            <div class="mt-1">{{ $material->getFormattedCostAttribute() }}</div>
                        </div>
                        
                        <div class="col-span-6">
                            <x-base.form-label>{{ __('materials.fields.supplier') }}</x-base.form-label>
                            <div class="mt-1">{{ $material->supplier ?: '-' }}</div>
                        </div>
                        
                        <div class="col-span-6">
                            <x-base.form-label>{{ __('materials.fields.storage_location') }}</x-base.form-label>
                            <div class="mt-1">{{ $material->storage_location ?: '-' }}</div>
                        </div>
                        
                        <div class="col-span-6">
                            <x-base.form-label>{{ __('materials.fields.is_consumable') }}</x-base.form-label>
                            <div class="mt-1">
                                <x-base.badge :variant="$material->is_consumable ? 'success' : 'secondary'">
                                    {{ $material->is_consumable ? __('global.yes') : __('global.no') }}
                                </x-base.badge>
                            </div>
                        </div>
                        
                        <div class="col-span-6">
                            <x-base.form-label>{{ __('materials.fields.is_digital') }}</x-base.form-label>
                            <div class="mt-1">
                                <x-base.badge :variant="$material->is_digital ? 'info' : 'secondary'">
                                    {{ $material->is_digital ? __('global.yes') : __('global.no') }}
                                </x-base.badge>
                            </div>
                        </div>
                        
                        <div class="col-span-6">
                            <x-base.form-label>{{ __('materials.fields.is_active') }}</x-base.form-label>
                            <div class="mt-1">
                                <x-base.badge :variant="$material->is_active ? 'success' : 'danger'">
                                    {{ $material->is_active ? __('global.active') : __('global.inactive') }}
                                </x-base.badge>
                            </div>
                        </div>
                        
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('materials.fields.description') }}</x-base.form-label>
                            <div class="mt-1">
                                {{ $material->description ?: '-' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Connected Items Card -->
        <div class="intro-y col-span-12 lg:col-span-4">
            <div class="box p-5">
                <div class="font-medium flex items-center">
                    <x-base.lucide icon="Link" class="w-4 h-4 me-2" />
                    {{ __('materials.sections.connections') }}
                </div>
                
                <div class="mt-5 space-y-4">
                    <!-- Connected Curricula -->
                    <div>
                        <h4 class="font-medium mb-2">{{ __('materials.fields.curricula') }}</h4>
                        @if($material->curricula->count() > 0)
                            <div class="space-y-2">
                                @foreach($material->curricula as $curriculum)
                                    <div class="flex items-center justify-between p-2 bg-slate-100/60 dark:bg-darkmode-400 rounded">
                                        <a href="{{ route('curricula.show', $curriculum) }}" class="text-blue-500 hover:underline">
                                            {{ $curriculum->name }}
                                        </a>
                                        <span class="text-xs text-slate-500">
                                            {{ $curriculum->pivot->quantity_required }} {{ __('global.required') }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-slate-500 text-sm">{{ __('global.none_connected') }}</div>
                        @endif
                    </div>
                    
                    <!-- Connected Classes -->
                    <div>
                        <h4 class="font-medium mb-2">{{ __('materials.fields.classes') }}</h4>
                        @if($material->classes->count() > 0)
                            <div class="space-y-2">
                                @foreach($material->classes as $class)
                                    <div class="p-2 bg-slate-100/60 dark:bg-darkmode-400 rounded">
                                        <a href="{{ route('classes.show', $class) }}" class="text-blue-500 hover:underline">
                                            {{ $class->name }}
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-slate-500 text-sm">{{ __('global.none_connected') }}</div>
                        @endif
                    </div>
                    
                    <!-- Connected Activities -->
                    <div>
                        <h4 class="font-medium mb-2">{{ __('materials.fields.activities') }}</h4>
                        @if($material->activities->count() > 0)
                            <div class="space-y-2">
                                @foreach($material->activities as $activity)
                                    <div class="p-2 bg-slate-100/60 dark:bg-darkmode-400 rounded">
                                        <a href="{{ route('activities.show', $activity) }}" class="text-blue-500 hover:underline">
                                            {{ $activity->name }}
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-slate-500 text-sm">{{ __('global.none_connected') }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Data Cards -->
    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- Statistics Card -->
        <div class="intro-y col-span-12 md:col-span-6">
            <div class="box p-5">
                <div class="font-medium flex items-center">
                    <x-base.lucide icon="BarChart2" class="w-4 h-4 me-2" />
                    {{ __('global.statistics') }}
                </div>
                
                <div class="mt-5 grid grid-cols-2 gap-4">
                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-4 text-center">
                        <div class="text-2xl font-bold">{{ $material->quantity_available }}</div>
                        <div class="text-slate-500 text-sm">{{ __('materials.fields.quantity_available') }}</div>
                    </div>
                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-4 text-center">
                        <div class="text-2xl font-bold">{{ $material->quantity_required }}</div>
                        <div class="text-slate-500 text-sm">{{ __('materials.fields.quantity_required') }}</div>
                    </div>
                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-4 text-center">
                        <div class="text-2xl font-bold">{{ $material->unit_cost ? number_format($material->unit_cost, 2) : '0.00' }}</div>
                        <div class="text-slate-500 text-sm">{{ __('global.unit_cost') }}</div>
                    </div>
                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-4 text-center">
                        <div class="text-2xl font-bold">{{ $material->curricula->count() }}</div>
                        <div class="text-slate-500 text-sm">{{ __('global.connected_curricula') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Info Card -->
        <div class="intro-y col-span-12 md:col-span-6">
            <div class="box p-5">
                <div class="font-medium flex items-center">
                    <x-base.lucide icon="FileText" class="w-4 h-4 me-2" />
                    {{ __('global.additional_info') }}
                </div>
                
                <div class="mt-5 space-y-3">
                    <div>
                        <x-base.form-label>{{ __('materials.fields.created_at') }}</x-base.form-label>
                        <div>{{ $material->created_at->format('Y-m-d H:i:s') }}</div>
                    </div>
                    
                    <div>
                        <x-base.form-label>{{ __('materials.fields.updated_at') }}</x-base.form-label>
                        <div>{{ $material->updated_at->format('Y-m-d H:i:s') }}</div>
                    </div>
                    
                    @if($material->purchased_at)
                    <div>
                        <x-base.form-label>{{ __('materials.fields.purchased_at') }}</x-base.form-label>
                        <div>{{ $material->purchased_at->format('Y-m-d') }}</div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection