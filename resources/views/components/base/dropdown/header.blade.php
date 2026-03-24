@props(['tag' => 'div'])

<{{ $tag }}
    data-tw-merge
    {{ $attributes->merge($attributes->whereDoesntStartWith('class')->getAttributes()) }}
>
    {{ $slot }}
</{{ $tag }}>
