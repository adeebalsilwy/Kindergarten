@props(['variant' => 'primary', 'rounded' => 'full'])

@php
$variants = [
    'primary' => 'bg-primary/20 text-primary',
    'success' => 'bg-success/20 text-success',
    'warning' => 'bg-warning/20 text-warning',
    'danger' => 'bg-danger/20 text-danger',
    'info' => 'bg-info/20 text-info',
    'secondary' => 'bg-slate-200 text-slate-700',
];

$classes = $variants[$variant] ?? $variants['primary'];
@endphp

<span {{ $attributes->merge(['class' => "px-3 py-1 rounded-$rounded text-sm font-medium $classes"]) }}>
    {{ $slot }}
</span>
