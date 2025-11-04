@props(['title'])

<div {{ $attributes->merge(['class' => 'rounded-xl p-6 shadow-lg']) }}>
    
    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
        <div class="w-1 h-6 bg-gradient-primary rounded-full mr-3"></div>
        {{ $title }}
    </h2>
    
    {{ $slot }}

</div>