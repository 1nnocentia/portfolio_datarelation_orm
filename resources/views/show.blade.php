@extends('layout.app')

@section('content')
<section class="py-20 bg-gray-50">
    <div class="max-w-5xl mx-auto px-6">
        <div class="mb-10">
            <h1 class="text-4xl font-bold mb-4">{{ $project->title }}</h1>
            <p class="text-gray-500 mb-2">Category: {{ $project->category->project_category ?? 'Uncategorized' }}</p>
            <p class="text-gray-400">Status: {{ ucfirst($project->status) }}</p>
        </div>

        <img src="{{ $project->image }}" alt="{{ $project->title }}" class="rounded-2xl shadow-lg mb-8 w-full object-cover">

        <div class="prose max-w-none">
            <p>{{ $project->description }}</p>
        </div>

        <div class="mt-8">
            <h2 class="text-xl font-semibold mb-4">Technologies Used:</h2>
            <ul class="flex flex-wrap gap-2">
                @foreach($project->technologies ?? [] as $tech)
                    <li class="px-4 py-2 bg-gray-200 rounded-full">{{ $tech }}</li>
                @endforeach
            </ul>
        </div>

        <div class="mt-10 flex gap-4">
            @if($project->github_url)
                <a href="{{ $project->github_url }}" target="_blank" class="bg-gray-800 text-white px-5 py-3 rounded-lg hover:bg-gray-700 transition">
                    <i class="fab fa-github mr-2"></i> View on GitHub
                </a>
            @endif
            @if($project->demo_url)
                <a href="{{ $project->demo_url }}" target="_blank" class="bg-blue-600 text-white px-5 py-3 rounded-lg hover:bg-blue-500 transition">
                    <i class="fas fa-external-link-alt mr-2"></i> Live Demo
                </a>
            @endif
        </div>
    </div>
</section>
@endsection
