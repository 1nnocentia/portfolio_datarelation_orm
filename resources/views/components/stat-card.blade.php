@props([
    'value',
    'label',
    'color' => 'text-blue-600', 
    'suffix' => ''
])

<div class="text-center p-6 bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow">
    <div class="text-3xl font-bold {{ $color }} mb-2">
        {{ $value }}{{ $suffix }}
    </div>
    <div class="text-sm text-gray-600">{{ $label }}</div>
</div>