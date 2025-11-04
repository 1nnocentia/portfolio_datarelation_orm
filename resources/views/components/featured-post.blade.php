@props(['post' => null])

@php
use Carbon\Carbon;

// Accept model, array, or null. Normalize using data_get which works on both.
$postData = $post;
$get = fn($key, $default = null) => data_get($postData, $key, $default);

$title = $get('title', '');
$featuredImage = $get('featured_image') ?: 'https://picsum.photos/seed/';
$category = $get('category', '');
$publishedAtRaw = $get('published_at', null);
$published = null;
if ($publishedAtRaw instanceof \Carbon\Carbon || $publishedAtRaw instanceof \Illuminate\Support\Carbon) {
    $published = $publishedAtRaw->format('M j, Y');
} elseif ($publishedAtRaw) {
    try {
        $published = Carbon::parse($publishedAtRaw)->format('M j, Y');
    } catch (\Throwable $e) {
        $published = (string) $publishedAtRaw;
    }
}

$readingTime = $get('reading_time', '5');
$slug = $get('slug', '#');
$likes = $get('likes', 0);
$comments = $get('comments_count', $get('comments', 0));
$excerpt = $get('excerpt', '');

@endphp

@if($postData)
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <div class="relative h-64 lg:h-auto">
                <img src="{{ $featuredImage }}" alt="{{ $title }}" class="w-full h-full object-cover">
                <div class="absolute top-4 left-4">
                    <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-semibold">Featured</span>
                </div>
            </div>
            <div class="p-8 lg:p-12 flex flex-col justify-center">
                <div class="mb-4">
                    <span class="text-blue-600 font-semibold text-sm">{{ $category }}</span>
                    <div class="flex items-center text-gray-500 text-sm mt-2">
                        <i class="fas fa-calendar mr-2"></i>
                        <span>{{ $published }}</span>
                        <span class="mx-2">•</span>
                        <i class="fas fa-clock mr-2"></i>
                        <span>{{ $readingTime }} min read</span>
                    </div>
                </div>
                <h3 class="text-3xl font-bold mb-4 text-gray-900">{{ $title }}</h3>
                <p class="text-gray-600 mb-6 leading-relaxed">{{ $excerpt }}</p>

                <div class="flex items-center justify-between">
                    <a href="{{ route('blog.show', $slug) }}" class="bg-gradient-primary text-white px-6 py-3 rounded-lg hover:shadow-glow transition-all duration-300 inline-flex items-center">
                        Read Article
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    <div class="flex items-center space-x-4 text-gray-500">
                        <button class="hover:text-red-500 transition-colors">
                            <i class="fas fa-heart"></i>
                            <span class="ml-1">{{ $likes }}</span>
                        </button>
                        <button class="hover:text-blue-500 transition-colors">
                            <i class="fas fa-comment"></i>
                            <span class="ml-1">{{ $comments }}</span>
                        </button>
                        <button class="hover:text-green-500 transition-colors">
                            <i class="fas fa-share"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
        <div class="p-8 lg:p-12 text-center">
            <i class="fas fa-newspaper text-6xl text-gray-300 mb-4"></i>
            <h3 class="text-xl font-bold text-gray-400 mb-4">No Featured Post Available</h3>
            <p class="text-sm text-gray-600 mb-6 leading-relaxed">Check back soon for fresh content and insights about web development and technology.</p>
        </div>
    </div>
@endif