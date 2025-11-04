@props([
    'title', 
    'date', 
    'subtitle', 
    'dotColor' => 'bg-blue-500'
])

<div class="relative">
    <div class="absolute -left-1.5 top-2 w-3 h-3 {{ $dotColor }} rounded-full z-10"></div>
    <div class="pl-6">
        <h3 class="text-base font-bold text-gray-900 mb-1">{{ $title }}</h3>
        <div class="text-blue-600 font-semibold text-sm mb-1">{{ $date }}</div>
        <p class="text-gray-600 font-medium text-sm mb-2 italic">{{ $subtitle }}</p>
        
        <div class="text-gray-600 text-sm leading-relaxed">
            {{ $slot }}
        </div>
    </div>
</div>