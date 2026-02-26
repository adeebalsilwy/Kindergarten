@props(['dark' => null, 'bordered' => null, 'hover' => null, 'striped' => null, 'sm' => null])

<table
    data-tw-merge
    {{ $attributes->class(merge(['w-full text-start', $dark ? 'bg-dark text-white dark:bg-black/30' : null]))->merge($attributes->whereDoesntStartWith('class')->getAttributes()) }}
>
    {{ $slot }}
</table>
