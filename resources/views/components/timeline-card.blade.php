@props(['item', 'align' => 'left'])

<div class="relative flex items-center">
    @if($align === 'left')
        <div class="flex-1 text-right pr-8">
            <x-timeline-card :item="$item" />
        </div>
        <div class="absolute left-1/2 transform -translate-x-1/2 w-4 h-4 {{ $item['dot_color'] ?? 'bg-blue-600' }} rounded-full border-4 border-white shadow"></div>
        <div class="flex-1 pl-8"></div>
    @else
        <div class="flex-1 pr-8"></div>
        <div class="absolute left-1/2 transform -translate-x-1/2 w-4 h-4 {{ $item['dot_color'] ?? 'bg-blue-600' }} rounded-full border-4 border-white shadow"></div>
        <div class="flex-1 pl-8">
            <x-timeline-card :item="$item" />
        </div>
    @endif
</div>
