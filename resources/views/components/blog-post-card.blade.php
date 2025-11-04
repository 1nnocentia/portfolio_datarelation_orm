@props(['post'])

<div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden flex flex-col">
    <a href="{{ route('blog.show', $post->slug) }}">
        <img src="{{ $post->featured_image ?? 'https://picsum.photos/seed/'.$post->slug.'/400/250' }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
    </a>
    <div class="p-6 flex flex-col flex-grow"> 
        <span class="text-sm text-blue-600 font-semibold">{{ $post->category }}</span>
        <h3 class="mt-2 mb-3 text-xl font-bold">
            <a href="{{ route('blog.show', $post->slug) }}" class="hover:text-blue-600 transition-colors">{{ $post->title }}</a>
        </h3>
        <p class="text-gray-600 text-sm mb-4 flex-grow">{{ $post->excerpt }}</p> 
        <div class="text-xs text-gray-500 flex items-center justify-between mt-auto"> 
            <span>{{ $post->published_at->format('M j, Y') }}</span>
            <span>{{ $post->reading_time ?? 5 }} min read</span>
        </div>
    </div>
</div>