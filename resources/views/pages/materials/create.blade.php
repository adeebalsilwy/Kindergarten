@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Materials.create') }} - Laravel</title>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/pages/materials.css') }}">
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('Materials.create') }}</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <x-base.button variant="secondary" as="a" href="{{ route('materials.index') }}" class="me-2">
                <x-base.lucide icon="ArrowLeftCircle" class="w-4 h-4 me-2" />
                {{ __('global.back_to_list') }}
            </x-base.button>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="box p-5">
                <form method="POST" action="{{ route('materials.store') }}">
                    @csrf

                    <!-- Basic Information Section -->
                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5 mb-5">
                        <div class="font-medium flex items-center">
                            <x-base.lucide icon="Info" class="w-4 h-4 me-2" />
                            {{ __('materials.sections.basic_info') }}
                        </div>
                        <div class="mt-5">
                            <div class="grid grid-cols-12 gap-4">
                                <div class="col-span-12">
                                    <x-base.form-label>{{ __('materials.fields.name') }} <span class="text-danger">*</span></x-base.form-label>
                                    <x-base.form-input type="text" name="name" value="{{ old('name') }}" placeholder="{{ __('materials.fields.name') }}" required />
                                    @error('name')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-span-12">
                                    <x-base.form-label>{{ __('materials.fields.description') }}</x-base.form-label>
                                    <x-base.form-textarea name="description" rows="3" placeholder="{{ __('materials.fields.description') }}">{{ old('description') }}</x-base.form-textarea>
                                    @error('description')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-span-6">
                                    <x-base.form-label>{{ __('materials.fields.category') }}</x-base.form-label>
                                    <x-base.form-select name="category">
                                        <option value="">{{ __('global.select_option') }}</option>
                                        <option value="arts_crafts" {{ old('category') == 'arts_crafts' ? 'selected' : '' }}>{{ __('materials.categories.arts_crafts') }}</option>
                                        <option value="educational_toys" {{ old('category') == 'educational_toys' ? 'selected' : '' }}>{{ __('materials.categories.educational_toys') }}</option>
                                        <option value="reading_materials" {{ old('category') == 'reading_materials' ? 'selected' : '' }}>{{ __('materials.categories.reading_materials') }}</option>
                                        <option value="music_movement" {{ old('category') == 'music_movement' ? 'selected' : '' }}>{{ __('materials.categories.music_movement') }}</option>
                                        <option value="digital_learning" {{ old('category') == 'digital_learning' ? 'selected' : '' }}>{{ __('materials.categories.digital_learning') }}</option>
                                        <option value="furniture" {{ old('category') == 'furniture' ? 'selected' : '' }}>{{ __('materials.categories.furniture') }}</option>
                                        <option value="hygiene" {{ old('category') == 'hygiene' ? 'selected' : '' }}>{{ __('materials.categories.hygiene') }}</option>
                                        <option value="emergency" {{ old('category') == 'emergency' ? 'selected' : '' }}>{{ __('materials.categories.emergency') }}</option>
                                    </x-base.form-select>
                                    @error('category')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-span-6">
                                    <x-base.form-label>{{ __('materials.fields.type') }}</x-base.form-label>
                                    <x-base.form-select name="type">
                                        <option value="">{{ __('global.select_option') }}</option>
                                        <option value="physical" {{ old('type') == 'physical' ? 'selected' : '' }}>{{ __('materials.types.physical') }}</option>
                                        <option value="digital" {{ old('type') == 'digital' ? 'selected' : '' }}>{{ __('materials.types.digital') }}</option>
                                        <option value="consumable" {{ old('type') == 'consumable' ? 'selected' : '' }}>{{ __('materials.types.consumable') }}</option>
                                        <option value="equipment" {{ old('type') == 'equipment' ? 'selected' : '' }}>{{ __('materials.types.equipment') }}</option>
                                    </x-base.form-select>
                                    @error('type')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-span-6">
                                    <x-base.form-label>{{ __('materials.fields.quantity') }} <span class="text-danger">*</span></x-base.form-label>
                                    <x-base.form-input type="number" name="quantity" value="{{ old('quantity', 0) }}" placeholder="{{ __('materials.fields.quantity') }}" min="0" required />
                                    @error('quantity')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-span-6">
                                    <x-base.form-label>{{ __('materials.fields.unit') }}</x-base.form-label>
                                    <x-base.form-input type="text" name="unit" value="{{ old('unit') }}" placeholder="{{ __('materials.fields.unit') }}" />
                                    @error('unit')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-span-6">
                                    <x-base.form-label>{{ __('materials.fields.status') }} <span class="text-danger">*</span></x-base.form-label>
                                    <x-base.form-select name="status" required>
                                        <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>{{ __('materials.status.available') }}</option>
                                        <option value="in-use" {{ old('status') == 'in-use' ? 'selected' : '' }}>{{ __('materials.status.in_use') }}</option>
                                        <option value="maintenance" {{ old('status') == 'maintenance' ? 'selected' : '' }}>{{ __('materials.status.maintenance') }}</option>
                                        <option value="out-of-stock" {{ old('status') == 'out-of-stock' ? 'selected' : '' }}>{{ __('materials.status.out_of_stock') }}</option>
                                    </x-base.form-select>
                                    @error('status')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-span-6">
                                    <x-base.form-label>{{ __('materials.fields.cost') }}</x-base.form-label>
                                    <x-base.form-input type="number" step="0.01" name="cost" value="{{ old('cost') }}" placeholder="{{ __('materials.fields.cost') }}" min="0" />
                                    @error('cost')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-span-6">
                                    <x-base.form-label>{{ __('materials.fields.supplier') }}</x-base.form-label>
                                    <x-base.form-input type="text" name="supplier" value="{{ old('supplier') }}" placeholder="{{ __('materials.fields.supplier') }}" />
                                    @error('supplier')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-span-6">
                                    <x-base.form-label>{{ __('materials.fields.purchase_date') }}</x-base.form-label>
                                    <x-base.form-input type="date" name="purchase_date" value="{{ old('purchase_date') }}" />
                                    @error('purchase_date')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-span-6">
                                    <x-base.form-label>{{ __('materials.fields.expiry_date') }}</x-base.form-label>
                                    <x-base.form-input type="date" name="expiry_date" value="{{ old('expiry_date') }}" />
                                    @error('expiry_date')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Connections Section -->
                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5 mb-5">
                        <div class="font-medium flex items-center">
                            <x-base.lucide icon="Link" class="w-4 h-4 me-2" />
                            {{ __('materials.sections.connections') }}
                        </div>
                        <div class="mt-5">
                            <div class="grid grid-cols-12 gap-4">
                                <div class="col-span-12">
                                    <x-base.form-label>{{ __('materials.fields.curricula') }}</x-base.form-label>
                                    <x-base.tom-select name="curricula[]" multiple>
                                        @foreach($curricula as $curriculum)
                                            <option value="{{ $curriculum->id }}">{{ $curriculum->name }}</option>
                                        @endforeach
                                    </x-base.tom-select>
                                    @error('curricula')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-span-12">
                                    <x-base.form-label>{{ __('materials.fields.classes') }}</x-base.form-label>
                                    <x-base.tom-select name="classes[]" multiple>
                                        @foreach($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </x-base.tom-select>
                                    @error('classes')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-span-12">
                                    <x-base.form-label>{{ __('materials.fields.activities') }}</x-base.form-label>
                                    <x-base.tom-select name="activities[]" multiple>
                                        @foreach($activities as $activity)
                                            <option value="{{ $activity->id }}">{{ $activity->name }}</option>
                                        @endforeach
                                    </x-base.tom-select>
                                    @error('activities')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end mt-5">
                        <x-base.button variant="secondary" as="a" href="{{ route('materials.index') }}" class="me-2">
                            {{ __('global.cancel') }}
                        </x-base.button>
                        <x-base.button variant="primary" type="submit">
                            <x-base.lucide icon="Save" class="w-4 h-4 me-2" />
                            {{ __('global.create') }}
                        </x-base.button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Preview Panel -->
        <div class="intro-y col-span-12 lg:col-span-4">
            <div class="box p-5">
                <div class="font-medium flex items-center">
                    <x-base.lucide icon="Eye" class="w-4 h-4 me-2" />
                    {{ __('global.preview') }}
                </div>
                
                <div class="mt-5">
                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                        <div class="flex items-center justify-center h-48">
                            <div class="text-center">
                                <x-base.lucide icon="Package" class="w-12 h-12 mx-auto text-slate-500" />
                                <div class="mt-3">{{ old('name') ?: __('materials.fields.name') }}</div>
                                <div class="text-slate-500 mt-1">{{ old('category') ? __($material->getCategoryNameAttribute()) : __('materials.fields.category') }}</div>
                            </div>
                        </div>
                        
                        <div class="mt-5">
                            <div class="flex justify-between">
                                <div>{{ __('materials.fields.quantity_available') }}</div>
                                <div class="font-medium">{{ old('quantity', 0) }}</div>
                            </div>
                            <div class="flex justify-between mt-2">
                                <div>{{ __('materials.fields.type') }}</div>
                                <div class="font-medium">{{ old('type') ?: __('materials.fields.type') }}</div>
                            </div>
                            <div class="flex justify-between mt-2">
                                <div>{{ __('materials.fields.status') }}</div>
                                <div class="font-medium">{{ old('status') == 'available' ? __('materials.status.available') : old('status') }}</div>
                            </div>
                            <div class="flex justify-between mt-2">
                                <div>{{ __('materials.fields.cost') }}</div>
                                <div class="font-medium">{{ old('cost') ? number_format(old('cost'), 2) . ' ' . __('global.currency') : '0.00' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection