@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Grade.add_new') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto flex items-center">
            <x-base.lucide icon="PlusCircle" class="w-5 h-5 me-2" />
            {{ __('Grade.add_new') }}
        </h2>
        <div class="ms-auto">
            <a href="{{ route('grades.index') }}" class="btn btn-outline-secondary me-2">
                <x-base.lucide icon="ArrowLeft" class="w-4 h-4 me-1" />
                {{ __('global.back_to_list') }}
            </a>
        </div>
    </div>
    
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="intro-y box p-5">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <h3 class="text-lg font-medium flex items-center">
                        <x-base.lucide icon="User" class="w-5 h-5 me-2" />
                        {{ __('global.grade_information') }}
                    </h3>
                </div>
                
                <form action="{{ route('grades.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="col-span-12 lg:col-span-6">
                            <x-form-field 
                                label="{{ __('grades.fields.child_id') }}" 
                                name="child_id" 
                                type="select" 
                                :options="$children->pluck('name', 'id')->toArray()" 
                                value="{{ old('child_id') }}" 
                                required="true" 
                                placeholder="{{ __('global.select_child') }}" 
                                :error="$errors->first('child_id')" 
                            />
                        </div>
                        
                        <div class="col-span-12 lg:col-span-6">
                            <x-form-field 
                                label="{{ __('grades.fields.subject') }}" 
                                name="subject" 
                                type="text" 
                                value="{{ old('subject') }}" 
                                placeholder="{{ __('global.enter_subject') }}" 
                                required="true" 
                                :error="$errors->first('subject')" 
                            />
                        </div>
                        
                        <div class="col-span-12 lg:col-span-6">
                            <x-form-field 
                                label="{{ __('grades.fields.score') }}" 
                                name="score" 
                                type="number" 
                                value="{{ old('score') }}" 
                                placeholder="{{ __('global.enter_score') }}" 
                                min="0" 
                                max="100" 
                                step="0.01" 
                                required="true" 
                                :error="$errors->first('score')" 
                            />
                        </div>
                        
                        <div class="col-span-12 lg:col-span-6">
                            <x-form-field 
                                label="{{ __('grades.fields.date') }}" 
                                name="date" 
                                type="date" 
                                value="{{ old('date', now()->format('Y-m-d')) }}" 
                                required="true" 
                                :error="$errors->first('date')" 
                            />
                        </div>
                        
                        <div class="col-span-12">
                            <x-form-field 
                                label="{{ __('grades.fields.comments') }}" 
                                name="comments" 
                                type="textarea" 
                                value="{{ old('comments') }}" 
                                placeholder="{{ __('global.enter_detailed_comments_optional') }}" 
                                rows="4" 
                                :error="$errors->first('comments')" 
                            />
                        </div>
                    </div>
                    
                    <div class="flex justify-end mt-8 pt-5 border-t border-slate-200/60 dark:border-darkmode-400">
                        <a href="{{ route('grades.index') }}" class="btn btn-outline-secondary w-24 me-3">
                            <x-base.lucide icon="X" class="w-4 h-4 me-1" />
                            {{ __('global.cancel') }}
                        </a>
                        <x-base.button type="submit" variant="primary" class="w-24">
                            <x-base.lucide icon="Save" class="w-4 h-4 me-1" />
                            {{ __('global.save') }}
                        </x-base.button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="intro-y col-span-12 lg:col-span-4">
            <div class="intro-y box p-5">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <h3 class="text-lg font-medium flex items-center">
                        <x-base.lucide icon="Info" class="w-5 h-5 me-2" />
                        {{ __('global.about_grades') }}
                    </h3>
                </div>
                
                <div class="space-y-4">
                    <div class="p-4 bg-primary/10 rounded-lg border border-primary/20">
                        <h4 class="font-medium text-primary flex items-center">
                            <x-base.lucide icon="Award" class="w-4 h-4 me-2" />
                            {{ __('global.score_range') }}
                        </h4>
                        <ul class="mt-2 space-y-1 text-sm">
                            <li><span class="font-medium">{{ __('global.a_grade') }}:</span> 90-100%</li>
                            <li><span class="font-medium">{{ __('global.b_grade') }}:</span> 80-89%</li>
                            <li><span class="font-medium">{{ __('global.c_grade') }}:</span> 70-79%</li>
                            <li><span class="font-medium">{{ __('global.d_grade') }}:</span> 60-69%</li>
                            <li><span class="font-medium">{{ __('global.f_grade') }}:</span> 0-59%</li>
                        </ul>
                    </div>
                    
                    <div class="p-4 bg-info/10 rounded-lg border border-info/20">
                        <h4 class="font-medium text-info flex items-center">
                            <x-base.lucide icon="HelpCircle" class="w-4 h-4 me-2" />
                            {{ __('global.tips') }}
                        </h4>
                        <ul class="mt-2 space-y-1 text-sm">
                            <li>• {{ __('global.select_appropriate_student') }}</li>
                            <li>• {{ __('global.enter_valid_score') }}</li>
                            <li>• {{ __('global.add_descriptive_comments') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection