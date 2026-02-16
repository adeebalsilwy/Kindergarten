<nav {{ $attributes->merge($attributes->whereDoesntStartWith('class')->getAttributes()) }}>
    <ul class="flex w-full me-0 sm:me-auto sm:w-auto">
        {{ $slot }}
    </ul>
</nav>
