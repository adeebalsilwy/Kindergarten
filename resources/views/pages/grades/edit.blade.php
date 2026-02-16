@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('Grade.edit') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium me-auto">{{ __('Grade.edit') }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-10">
            <div class="intro-y box p-5">
                <form action="{{ route('grades.update', $grade->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="grid grid-cols-12 gap-4 gap-y-5">
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label for="child_id">{{ __('grades.fields.child_id') }}</x-base.form-label>
                            <x-base.tom-select name="child_id" id="child_id" class="mt-2" data-placeholder="{{ __('global.select_option') }}">
                                <option value="">{{ __('global.select_option') }}</option>
                                @foreach($children as $child)
                                    <option value="{{ $child->id }}" {{ old('child_id', $grade->child_id) == $child->id ? 'selected' : '' }}>
                                        {{ $child->name }}
                                    </option>
                                @endforeach
                            </x-base.tom-select>
                            @error('child_id')
                                <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label for="subject">{{ __('grades.fields.subject') }}</x-base.form-label>
                            <x-base.form-input id="subject" type="text" name="subject" value="{{ old('subject', $grade->subject) }}" class="mt-2" />
                            @error('subject')
                                <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label for="score">{{ __('grades.fields.score') }}</x-base.form-label>
                            <x-base.tom-select name="score" id="score" class="mt-2" data-placeholder="{{ __('global.select_option') }}">
                                <option value="">{{ __('global.select_option') }}</option>
                                <option value="A+" {{ old('score', $grade->score) == 'A+' ? 'selected' : '' }}>A+</option>
                                <option value="A" {{ old('score', $grade->score) == 'A' ? 'selected' : '' }}>A</option>
                                <option value="A-" {{ old('score', $grade->score) == 'A-' ? 'selected' : '' }}>A-</option>
                                <option value="B+" {{ old('score', $grade->score) == 'B+' ? 'selected' : '' }}>B+</option>
                                <option value="B" {{ old('score', $grade->score) == 'B' ? 'selected' : '' }}>B</option>
                                <option value="B-" {{ old('score', $grade->score) == 'B-' ? 'selected' : '' }}>B-</option>
                                <option value="C+" {{ old('score', $grade->score) == 'C+' ? 'selected' : '' }}>C+</option>
                                <option value="C" {{ old('score', $grade->score) == 'C' ? 'selected' : '' }}>C</option>
                                <option value="C-" {{ old('score', $grade->score) == 'C-' ? 'selected' : '' }}>C-</option>
                                <option value="D" {{ old('score', $grade->score) == 'D' ? 'selected' : '' }}>D</option>
                                <option value="F" {{ old('score', $grade->score) == 'F' ? 'selected' : '' }}>F</option>
                            </x-base.tom-select>
                            @error('score')
                                <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label for="date">{{ __('grades.fields.date') }}</x-base.form-label>
                            <x-base.form-input id="date" type="date" name="date" value="{{ old('date', $grade->date ? \Carbon\Carbon::parse($grade->date)->format('Y-m-d') : '') }}" class="mt-2" />
                            @error('date')
                                <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label for="evaluator_id">{{ __('grades.fields.evaluator_id') }}</x-base.form-label>
                            <x-base.tom-select name="evaluator_id" id="evaluator_id" class="mt-2" data-placeholder="{{ __('global.select_option') }}">
                                <option value="">{{ __('global.select_option') }}</option>
                                @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}" {{ old('evaluator_id', $grade->evaluator_id) == $teacher->id ? 'selected' : '' }}>
                                        {{ $teacher->name }}
                                    </option>
                                @endforeach
                            </x-base.tom-select>
                            @error('evaluator_id')
                                <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label for="comments">{{ __('grades.fields.comments') }}</x-base.form-label>
                            <x-base.form-textarea id="comments" name="comments" rows="3" class="mt-2 resize-none">{{ old('comments', $grade->comments) }}</x-base.form-textarea>
                            @error('comments')
                                <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="flex justify-end mt-6 gap-2">
                        <x-base.button type="button" variant="outline-secondary" as="a" href="{{ route('grades.index') }}" class="w-24">
                            {{ __('global.cancel') }}
                        </x-base.button>
                        <x-base.button type="submit" variant="primary" class="w-24 shadow-md">
                            {{ __('global.update') }}
                        </x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
