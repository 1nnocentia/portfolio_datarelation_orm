@props(['title', 'issuer', 'icon', 'iconBg', 'iconColor'])

<div class="flex items-center p-3 bg-white rounded-lg shadow-sm">
    <div class="w-8 h-8 {{ $iconBg }} rounded-full flex items-center justify-center mr-3 shrink-0">
        <i class="{{ $icon }} {{ $iconColor }} text-sm"></i>
    </div>
    <div>
        <h3 class="font-bold text-gray-900 text-sm">{{ $title }}</h3>
        <p class="text-gray-600 text-xs">{{ $issuer }}</p>
    </div>
</div>