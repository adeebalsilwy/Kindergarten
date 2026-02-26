@aware(['class' => null])

<label
    data-tw-merge
    {{ $attributes->class(['inline-block mb-2', 'group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:me-5 group-[.form-inline]:sm:text-end'])->merge($attributes->whereDoesntStartWith('class')->getAttributes()) }}
>
    {{ $slot }}
</label>
