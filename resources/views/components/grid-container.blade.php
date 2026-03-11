@props([
    'cols' => 1,
    'mobileCols' => 1,
    'tabletCols' => 2,
    'gap' => 6
])

<div class="grid grid-cols-{{ $mobileCols }} sm:grid-cols-{{ $tabletCols }} md:grid-cols-{{ $cols }} lg:grid-cols-{{ $cols }} gap-{{ $gap }}">
    {{ $slot }}
</div>
