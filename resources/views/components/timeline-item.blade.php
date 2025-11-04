@props(['item', 'align' => 'left'])

<div class="relative flex items-center">
    @if($align === 'left')
        <div class="flex-1 text-right pr-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <h4 class="text-lg font-semibold {{ $item['color'] ?? 'text-gray-800' }}">{{ $item['title'] }}</h4>
                <div class="text-sm text-gray-500">{{ $item['institution'] ?? '' }} • {{ $item['period'] ?? '' }}</div>
                <p class="mt-3 text-gray-600">{{ $item['description'] ?? '' }}</p>
            </div>
        </div>
        <div class="absolute left-1/2 transform -translate-x-1/2 w-4 h-4 {{ $item['dot_color'] ?? 'bg-blue-600' }} rounded-full border-4 border-white shadow"></div>
        <div class="flex-1 pl-8"></div>
    @else
        <div class="flex-1 pr-8"></div>
        <div class="absolute left-1/2 transform -translate-x-1/2 w-4 h-4 {{ $item['dot_color'] ?? 'bg-blue-600' }} rounded-full border-4 border-white shadow"></div>
        <div class="flex-1 pl-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <h4 class="text-lg font-semibold {{ $item['color'] ?? 'text-gray-800' }}">{{ $item['title'] }}</h4>
                <div class="text-sm text-gray-500">{{ $item['institution'] ?? '' }} • {{ $item['period'] ?? '' }}</div>
                <p class="mt-3 text-gray-600">{{ $item['description'] ?? '' }}</p>
            </div>
        </div>
    @endif
</div>
