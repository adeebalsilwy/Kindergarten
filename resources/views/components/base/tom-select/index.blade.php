<select {{ $attributes->class(['tom-select', $attributes->has('name') && $errors->has($attributes->get('name')) ? 'border-danger' : null])->merge($attributes->whereDoesntStartWith('class')->getAttributes()) }}>
    {{ $slot }}
</select>

@pushOnce('styles')
    @vite('resources/css/vendors/tom-select.css')
@endPushOnce

@pushOnce('vendors')
    @vite('resources/js/vendors/tom-select.js')
@endPushOnce

@pushOnce('scripts')
    @vite('resources/js/components/base/tom-select.js')
@endPushOnce
