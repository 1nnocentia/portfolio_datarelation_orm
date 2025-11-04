@props(['name', 'bgColor', 'hoverBgColor'])

<div class="skill-card text-center group hover:scale-105 transition-transform duration-300">

    <div class="w-20 h-20 mx-auto mb-4 {{ $bgColor }} rounded-2xl flex items-center justify-center {{ $hoverBgColor }} transition-colors duration-300">
        {{ $slot }}
    </div>
    
    <h4 class="font-semibold text-gray-900">{{ $name }}</h4>
</div>