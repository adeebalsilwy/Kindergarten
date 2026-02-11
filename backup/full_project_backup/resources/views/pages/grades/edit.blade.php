@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('kindergarten.grades.edit') }} - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('kindergarten.grades.edit') }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-10">
            <div class="intro-y box p-5">
                <form action="{{ route('grades.update', $grades->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('kindergarten.grades.student') }}</x-base.form-label>
                            <x-base.form-input type="text" name="child_id" value="{{ old('child_id', $grades->child_id ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('kindergarten.grades.subject') }}</x-base.form-label>
                            <x-base.form-input type="text" name="subject" value="{{ old('subject', $grades->subject ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('kindergarten.grades.score') }}</x-base.form-label>
                            <x-base.form-input type="text" name="score" value="{{ old('score', $grades->score ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('kindergarten.grades.date') }}</x-base.form-label>
                            <x-base.form-input type="date" name="date" value="{{ old('date', $grades->date ?? '') }}" class="mt-2" />
                        </div>

                    </div>
                    <div class="flex justify-end mt-5">
                        <a href="{{ route('grades.index') }}" class="btn btn-outline-secondary w-24 mr-1">{{ __('global.cancel') }}</a>
                        <x-base.button type="submit" variant="primary" class="w-24">{{ __('global.update') }}</x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
