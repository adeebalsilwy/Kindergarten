@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>{{ __('kindergarten.attendance.title') }} - {{ __('kindergarten.menu.kindergarten') }}</title>
@endsection

@section('subcontent')
    <h2 class="intro-y mt-8 text-lg font-medium mr-auto">{{ __('kindergarten.attendance.title') }}: {{ $date }}</h2>
    
    @if(session('success'))
        <div class="alert alert-success show mb-2">{{ session('success') }}</div>
    @endif

    <div class="intro-y box p-5 mt-5">
        <form action="{{ route('attendance.store') }}" method="POST">
            @csrf
            <input type="hidden" name="date" value="{{ $date }}">
            
            <div class="overflow-x-auto">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap">{{ __('kindergarten.children.name') }}</th>
                            <th class="text-center">{{ __('kindergarten.attendance.status.present') }}</th>
                            <th class="text-center">{{ __('kindergarten.attendance.status.absent') }}</th>
                            <th class="text-center">{{ __('kindergarten.attendance.status.sick') }}</th>
                            <th class="text-center">{{ __('kindergarten.attendance.status.late') }}</th>
                            <th class="text-center">{{ __('kindergarten.attendance.status.excused') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($children as $child)
                            @php
                                $status = $attendances[$child->id]->status ?? 'present'; // Default to present
                            @endphp
                            <tr>
                                <td class="font-medium">{{ $child->name }} ({{ $child->class_grade }})</td>
                                <td class="text-center">
                                    <input type="radio" name="attendance[{{ $child->id }}]" value="present" {{ $status == 'present' ? 'checked' : '' }} class="form-check-input">
                                </td>
                                <td class="text-center">
                                    <input type="radio" name="attendance[{{ $child->id }}]" value="absent" {{ $status == 'absent' ? 'checked' : '' }} class="form-check-input">
                                </td>
                                <td class="text-center">
                                    <input type="radio" name="attendance[{{ $child->id }}]" value="sick" {{ $status == 'sick' ? 'checked' : '' }} class="form-check-input">
                                </td>
                                <td class="text-center">
                                    <input type="radio" name="attendance[{{ $child->id }}]" value="late" {{ $status == 'late' ? 'checked' : '' }} class="form-check-input">
                                </td>
                                <td class="text-center">
                                    <input type="radio" name="attendance[{{ $child->id }}]" value="excused" {{ $status == 'excused' ? 'checked' : '' }} class="form-check-input">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-5 text-right">
                <button type="submit" class="btn btn-primary w-40">{{ __('kindergarten.attendance.save') }}</button>
            </div>
        </form>
    </div>
@endsection
