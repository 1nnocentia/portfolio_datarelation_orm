@props(['categories' => []])

<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-2xl font-bold mb-8">Filter by Category</h2>
            <div class="flex flex-wrap justify-center gap-4">
                <button class="px-6 py-3 bg-gradient-primary text-white rounded-full font-semibold hover:shadow-lg transition-all duration-300 filter-btn active" data-filter="all">
                    <i class="fas fa-th mr-2"></i>All Projects
                </button>
                
                @forelse($categories as $category)
                    <button class="px-6 py-3 bg-white text-gray-700 border border-gray-200 rounded-full font-semibold hover:bg-gradient-primary hover:text-white hover:border-transparent transition-all duration-300 filter-btn" data-filter="{{ $category['key'] }}">
                        <i class="{{ $category['icon'] }} mr-2"></i>
                        {{ $category['name'] }}
                    </button>
                @empty
                    <button class="px-6 py-3 bg-white text-gray-700 border border-gray-200 rounded-full font-semibold hover:bg-gray-100 transition-colors" data-filter="web">
                        <i class="fas fa-globe mr-2"></i>Web Development
                    </button>
                @endforelse
            </div>
        </div>
    </div>
</section>