@props([
    'project',
    'hidden' => false
])

<div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden project-card group {{ $hidden ? 'hidden load-more-project' : '' }}"
     data-category="{{ $project->category->slug ?? 'all' }}">

    <div class="relative overflow-hidden">
        <a href="{{ route('portfolio.show', $project->slug) }}">
            <img src="{{ $project->image }}"
                 alt="{{ $project->title }}"
                 class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
        </a>

        <div class="absolute inset-0 bg-linear-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center pb-6">
            <div class="flex space-x-4">
                @if(!empty($project->demo_url))
                    <a href="{{ $project->demo_url }}" target="_blank" class="bg-white/20 backdrop-blur-sm p-3 rounded-full hover:bg-white/30 transition-colors">
                        <i class="fas fa-external-link-alt text-white text-xl"></i>
                    </a>
                @endif
                @if(!empty($project->github_url))
                    <a href="{{ $project->github_url }}" target="_blank" class="bg-white/20 backdrop-blur-sm p-3 rounded-full hover:bg-white/30 transition-colors">
                        <i class="fab fa-github text-white text-xl"></i>
                    </a>
                @endif
            </div>
        </div>
    </div>

    <div class="p-6">
        <h3 class="text-xl font-bold mb-3 text-gray-900"><a href="{{ route('portfolio.show', $project->slug) }}">{{ $project->title }}</a></h3>
        <p class="text-gray-600 mb-4">{{ $project->description }}</p>
        <div class="flex flex-wrap gap-2">
            @foreach($project->technologies as $tech)
                <span class="tech-tag">{{ $tech }}</span>
            @endforeach
        </div>
    </div>

</div>