@props(['icon', 'name', 'description', 'color' => 'text-blue-600'])

<div class="interest-card">
    <i class="{{ $icon }} text-2xl {{ $color }} mb-3"></i>
    <h4 class="font-semibold mb-2">{{ $name }}</h4>
    <p class="text-sm text-gray-600">{{ $description }}</p>
</div>