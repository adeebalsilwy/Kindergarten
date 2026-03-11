@props([
    'title' => '',
    'icon' => 'FileText',
    'data' => [],
    'columns' => 2
])

<div class="box p-5">
    @if($title)
        <div class="flex items-center mb-4">
            <x-base.lucide :icon="$icon" class="w-5 h-5 text-primary me-2" />
            <h3 class="text-lg font-bold text-slate-800">{{ $title }}</h3>
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-{{ $columns }} lg:grid-cols-{{ $columns }} gap-4">
        @foreach($data as $key => $value)
            <div class="flex justify-between items-center py-2 border-b border-slate-100 last:border-0">
                <span class="text-sm text-slate-600 font-medium">{{ $key }}:</span>
                <span class="text-sm text-slate-800 font-semibold">{{ $value }}</span>
            </div>
        @endforeach
    </div>
</div>
