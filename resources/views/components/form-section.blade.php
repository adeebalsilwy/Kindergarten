@props([
    'title' => '',
    'description' => '',
    'icon' => 'Info',
    'collapsible' => false,
    'collapsed' => false,
    'id' => uniqid('section_')
])

<div {{ $attributes->merge(['class' => 'intro-y box p-6 mb-8 border-l-4 border-primary shadow-sm hover:shadow-md transition-shadow duration-300']) }} 
     x-data="{ 
         collapsed: {{ $collapsible && $collapsed ? 'true' : 'false' }},
         toggle() { 
             if ({{ $collapsible ? 'true' : 'false' }}) {
                 this.collapsed = !this.collapsed;
             }
         }
     }">
    
    <!-- Section Header -->
    <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-100 cursor-pointer" 
         @if($collapsible) x-on:click="toggle()" @endif>
        <div class="flex items-center">
            <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center me-4 shadow-inner">
                <x-base.lucide icon="{{ $icon }}" class="w-5 h-5 text-primary" />
            </div>
            <div>
                <h3 class="text-xl font-bold text-slate-800 tracking-tight">{{ $title }}</h3>
                @if($description)
                    <p class="text-sm text-slate-500 mt-1 font-medium italic opacity-80">{{ $description }}</p>
                @endif
            </div>
        </div>
        
        @if($collapsible)
            <div class="text-slate-400">
                <x-base.lucide icon="ChevronDown" class="w-5 h-5 transition-transform" 
                               x-bind:class="{ 'rotate-180': !collapsed }" />
            </div>
        @endif
    </div>
    
    <!-- Section Content -->
    <div x-show="!collapsed" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 transform -translate-y-2"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform -translate-y-2">
        <div class="grid grid-cols-12 gap-x-6 gap-y-4">
            {{ $slot }}
        </div>
    </div>
</div>