@props(['title', 'text'])

<section class="py-20 bg-gradient-primary text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold mb-6">{{ $title }}</h2>
        <p class="text-xl mb-8 opacity-90">
            {{ $text }}
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            {{ $slot }}
        </div>
    </div>
</section>