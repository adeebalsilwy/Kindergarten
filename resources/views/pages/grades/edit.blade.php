@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Grade.edit') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto flex items-center">
            <x-base.lucide icon="Pencil" class="w-5 h-5 me-2" />
            {{ __('Grade.edit') }}
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
                
                <form action="{{ route('grades.update', $grade->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="col-span-12 lg:col-span-6">
                            <x-form-field 
                                label="{{ __('grades.fields.child_id') }}" 
                                name="child_id" 
                                type="select" 
                                :options="$children->pluck('name', 'id')->toArray()" 
                                value="{{ old('child_id', $grade->child_id) }}" 
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
                                value="{{ old('subject', $grade->subject) }}" 
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
                                value="{{ old('score', $grade->score) }}" 
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
                                value="{{ old('date', $grade->date?->format('Y-m-d') ?? now()->format('Y-m-d')) }}" 
                                required="true" 
                                :error="$errors->first('date')" 
                            />
                        </div>
                        
                        <div class="col-span-12">
                            <x-form-field 
                                label="{{ __('grades.fields.comments') }}" 
                                name="comments" 
                                type="textarea" 
                                value="{{ old('comments', $grade->comments) }}" 
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
                            {{ __('global.update') }}
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
                        {{ __('global.grade_details') }}
                    </h3>
                </div>
                
                <div class="space-y-4">
                    <div class="p-4 bg-primary/10 rounded-lg border border-primary/20">
                        <h4 class="font-medium text-primary flex items-center">
                            <x-base.lucide icon="User" class="w-4 h-4 me-2" />
                            {{ __('global.student_info') }}
                        </h4>
                        <div class="mt-2 space-y-1 text-sm">
                            <p><span class="font-medium">{{ __('global.name') }}:</span> {{ $grade->child->name ?? 'N/A' }}</p>
                            <p><span class="font-medium">{{ __('global.class') }}:</span> {{ optional($grade->child->class)->name ?? 'N/A' }}</p>
                        </div>
                    </div>
                    
                    <div class="p-4 bg-success/10 rounded-lg border border-success/20">
                        <h4 class="font-medium text-success flex items-center">
                            <x-base.lucide icon="Award" class="w-4 h-4 me-2" />
                            {{ __('global.current_grade') }}
                        </h4>
                        <div class="mt-2 space-y-1 text-sm">
                            <p><span class="font-medium">{{ __('global.subject') }}:</span> {{ $grade->subject }}</p>
                            <p><span class="font-medium">{{ __('global.score') }}:</span> {{ $grade->score }}</p>
                            <p><span class="font-medium">{{ __('global.letter_grade') }}:</span> 
                                <span class="px-2 py-1 rounded-full 
                                    {{ $grade->grade === 'A' ? 'bg-success/10 text-success border border-success/20' : '' }}
                                    {{ $grade->grade === 'B' ? 'bg-info/10 text-info border border-info/20' : '' }}
                                    {{ $grade->grade === 'C' ? 'bg-warning/10 text-warning border border-warning/20' : '' }}
                                    {{ $grade->grade === 'D' ? 'bg-yellow/10 text-yellow border border-yellow/20' : '' }}
                                    {{ $grade->grade === 'F' ? 'bg-danger/10 text-danger border border-danger/20' : '' }}">
                                    {{ $grade->grade ?? 'N/A' }}
                                </span>
                            </p>
                            <p><span class="font-medium">{{ __('global.date') }}:</span> {{ $grade->date->format('M d, Y') }}</p>
                        </div>
                    </div>
                    
                    <div class="p-4 bg-info/10 rounded-lg border border-info/20">
                        <h4 class="font-medium text-info flex items-center">
                            <x-base.lucide icon="HelpCircle" class="w-4 h-4 me-2" />
                            {{ __('global.tips') }}
                        </h4>
                        <ul class="mt-2 space-y-1 text-sm">
                            <li>• {{ __('global.edit_grade_carefully') }}</li>
                            <li>• {{ __('global.update_related_fields') }}</li>
                            <li>• {{ __('global.save_changes_confirm') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection