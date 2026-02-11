<div
    data-tw-merge
    {{ $attributes->class(['space-y-1'])->merge($attributes->whereDoesntStartWith('class')->getAttributes()) }}
>
    {{ $slot }}
</div>
