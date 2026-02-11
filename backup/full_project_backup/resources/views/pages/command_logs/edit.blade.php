@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('head')
    <title>{{ __('CommandLog.edit') }} - Laravel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('CommandLog.edit') }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-10">
            <div class="intro-y box p-5">
                <form action="{{ route('command_logs.update', $commandLogs->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('command-logs.fields.command') }}</x-base.form-label>
                            <x-base.form-input type="text" name="command" value="{{ old('command', $commandLogs->command ?? '') }}" class="mt-2" />
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('command-logs.fields.parameters') }}</x-base.form-label>
                            <x-base.form-textarea name="parameters" rows="4" class="resize-none">{{ old('parameters', $commandLogs->parameters ?? '') }}</x-base.form-textarea>
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('command-logs.fields.output') }}</x-base.form-label>
                            <x-base.form-textarea name="output" rows="4" class="resize-none">{{ old('output', $commandLogs->output ?? '') }}</x-base.form-textarea>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <x-base.form-label>{{ __('command-logs.fields.status') }}</x-base.form-label>
                            <x-base.tom-select name="status" class="mt-2">
                                <option value="">{{ __('global.select_option') }}</option>
                                <option value="active" {{ old('status', $commandLogs->status ?? '') == 'active' ? 'selected' : '' }}>{{ __('global.active') }}</option>
                                <option value="inactive" {{ old('status', $commandLogs->status ?? '') == 'inactive' ? 'selected' : '' }}>{{ __('global.inactive') }}</option>
                                <option value="pending" {{ old('status', $commandLogs->status ?? '') == 'pending' ? 'selected' : '' }}>{{ __('global.pending') }}</option>
                                <option value="draft" {{ old('status', $commandLogs->status ?? '') == 'draft' ? 'selected' : '' }}>{{ __('global.draft') }}</option>
                            </x-base.tom-select>
                        </div>
                        <div class="col-span-12">
                            <x-base.form-label>{{ __('command-logs.fields.error_message') }}</x-base.form-label>
                            <x-base.form-textarea name="error_message" rows="4" class="resize-none">{{ old('error_message', $commandLogs->error_message ?? '') }}</x-base.form-textarea>
                        </div>

                    </div>
                    <div class="flex justify-end mt-5">
                        <a href="{{ route('command_logs.index') }}" class="btn btn-outline-secondary w-24 mr-1">{{ __('global.cancel') }}</a>
                        <x-base.button type="submit" variant="primary" class="w-24">{{ __('global.update') }}</x-base.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
