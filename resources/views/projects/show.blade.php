@extends('layout.app')

@section('title', $project->title)

@section('content')
<div class="max-w-4xl mx-auto py-16">
    <a href="{{ route('portfolio') }}" class="text-sm text-blue-600 mb-4 inline-block">&larr; Back to portfolio</a>

    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-3xl font-bold mb-4">{{ $project->title }}</h1>
        <p class="text-gray-600 mb-6">{{ $project->description }}</p>

        <img src="{{ $project->image }}" alt="{{ $project->title }}" class="w-full h-80 object-cover rounded mb-6">

        <div class="mb-4">
            <strong>Technologies:</strong>
            <div class="flex flex-wrap gap-2 mt-2">
                @foreach($project->technologies as $tech)
                    <span class="tech-tag">{{ $tech }}</span>
                @endforeach
            </div>
        </div>

        <div class="mt-6">
            @if($project->demo_url)
                <a href="{{ $project->demo_url }}" target="_blank" class="btn btn-primary mr-2">Live demo</a>
            @endif
            @if($project->github_url)
                <a href="{{ $project->github_url }}" target="_blank" class="btn btn-secondary">Source</a>
            @endif
        </div>
    </div>
</div>
@endsection
