@props(['as' => 'button', 'variant' => 'primary', 'size' => null])

<{{ $as }}
    data-tw-toggle="dropdown"
    {{ $attributes->class([
        'dropdown-toggle',
        'cursor-pointer',
        $variant === 'primary' ? 'btn btn-primary' : '',
        $variant === 'secondary' ? 'btn btn-secondary' : '',
        $variant === 'outline' ? 'btn btn-outline-primary' : '',
        $size === 'sm' ? 'btn-sm' : '',
        $size === 'lg' ? 'btn-lg' : '',
    ])->merge($attributes->whereDoesntStartWith('class')->getAttributes()) }}
>{{ $slot }}</{{ $as }}>
