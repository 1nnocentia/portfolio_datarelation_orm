@extends('layout.app')

@section('title', 'portfolio')

@section('content')

<section class="pt-20 pb-16 bg-linear-to-br from-blue-50 via-white to-purple-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-5xl font-bold mb-7 text-gradient">My Portfolio</h1>
            <div class="w-20 h-1 bg-gradient-primary mx-auto mb-6"></div>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Explore my collection of projects that showcase my skills in web development, 
                design, and problem-solving across various technologies and industries
            </p>
        </div>
    </div>
</section>

<x-project-filter :categories="$categories ?? []" />

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-3 gap-8" id="projects-container">
            @forelse($projects as $index => $project)
                <x-project-card :project="$project" />
            @empty
                <div class="col-span-full text-center text-gray-500 py-12">
                    <i class="fas fa-folder-open text-6xl mb-4 text-gray-300"></i>
                    <p class="text-xl">No projects available at the moment.</p>
                    <p class="text-gray-400 mt-2">Check back later for updates!</p>
                </div>
            @endforelse
        </div>
        @if(!empty($projects) && count($projects) > 3)
            <div class="text-center mt-16">
                <button id="load-more-btn" class="bg-gradient-primary text-white px-8 py-3 rounded-full font-semibold hover:shadow-glow transition-all duration-300 transform hover:scale-105">
                    Load More Projects
                </button>
            </div>
        @endif
    </div>
</section>

<x-cta-block 
    title="Ready to Start Your Project?"
    text="Let's collaborate to bring your ideas to life with cutting-edge technology and innovative solutions."
>
    {{-- Tombol-tombol ini masuk ke $slot --}}
    <a href="{{ route('contact') }}" class="bg-white text-blue-600 px-8 py-3 rounded-full ...">
        Get In Touch
    </a>
    <a href="{{ route('resume') }}" class="border-2 border-white text-white px-8 py-3 rounded-full ...">
        See My Resume
    </a>
</x-cta-block>
@endsection 
@push('scripts')
    @vite('resources/js/portfolio.js')
@endpush