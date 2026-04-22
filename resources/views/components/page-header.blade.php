@props([
    'title' => '',
    'subtitle' => '',
    'icon' => null,
    'breadcrumb' => [],
    'actions' => []
])

<div class="intro-y flex flex-col sm:flex-row items-center mt-8 mb-6">
    <div class="flex-1">
        <div class="flex items-center">
            @if($icon)
                <div class="bg-primary/10 p-2 rounded-lg me-3">
                    <x-base.lucide :icon="$icon" class="w-6 h-6 text-primary" />
                </div>
            @endif

            <div>
                @if($title)
                    <h2 class="text-2xl font-bold text-slate-800">{{ $title }}</h2>
                @endif

                @if($subtitle)
                    <p class="text-sm text-slate-500 mt-1">{{ $subtitle }}</p>
                @endif
            </div>
        </div>

        @if(count($breadcrumb) > 0)
            <nav class="flex mt-2" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-2">
                    @foreach($breadcrumb as $index => $crumb)
                        @if($index === count($breadcrumb) - 1)
                            <li class="text-sm text-slate-500">{{ $crumb['label'] }}</li>
                        @else
                            <li>
                                <a href="{{ $crumb['url'] ?? '#' }}" class="text-sm text-primary hover:underline">
                                    {{ $crumb['label'] }}
                                </a>
                            </li>
                            @if($index < count($breadcrumb) - 1)
                                <li>
                                    <x-base.lucide icon="ChevronRight" class="w-4 h-4 text-slate-400" />
                                </li>
                            @endif
                        @endif
                    @endforeach
                </ol>
            </nav>
        @endif
    </div>

    @if(count($actions) > 0)
        <div class="w-full sm:w-auto flex gap-2 mt-4 sm:mt-0">
            @foreach($actions as $action)
                @if($action['type'] === 'button')
                    <x-base.button
                        :variant="$action['variant'] ?? 'primary'"
                        :as="$action['as'] ?? 'button'"
                        :href="$action['href'] ?? '#'"
                        class="flex items-center"
                    >
                        @if(isset($action['icon']))
                            <x-base.lucide :icon="$action['icon']" class="w-4 h-4 me-2" />
                        @endif
                        {{ $action['label'] }}
                    </x-base.button>
                @elseif($action['type'] === 'dropdown')
                    <x-base.dropdown>
                        <x-base.button variant="secondary" class="flex items-center">
                            {{ $action['label'] }}
                            <x-base.lucide icon="ChevronDown" class="w-4 h-4 ms-2" />
                        </x-base.button>
                        <x-base.dropdown.content>
                            @foreach($action['items'] as $item)
                                <x-base.dropdown.content>
                                    <a href="{{ $item['href'] ?? '#' }}" class="flex items-center">
                                        @if(isset($item['icon']))
                                            <x-base.lucide :icon="$item['icon']" class="w-4 h-4 me-2" />
                                        @endif
                                        {{ $item['label'] }}
                                    </a>
                                </x-base.dropdown.content>
                            @endforeach
                        </x-base.dropdown.content>
                    </x-base.dropdown>
                @endif
            @endforeach
        </div>
    @endif
</div>
