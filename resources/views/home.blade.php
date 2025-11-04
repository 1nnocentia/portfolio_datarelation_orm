@extends('layout.app')

@section('title', 'home')

@section('content')

<section class="min-h-screen flex items-center justify-center bg-linear-to-br from-purple-50 to-blue-50 relative overflow-hidden">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-32 w-96 bg-blue-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
        <div class="absolute -bottom-40 -left-32 w-96 h-96 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 item-center">

            <div class="text-center lg:text-left">
                <h1 class="text-5xl lg:text-7xl font-bold mb-6 animate-fade-in">
                    Hi, I'm <span class="text-gradient">Inno</span>
                </h1>
                <h2 class="text-2xl lg:text-3xl text-gray-600 mb-6 animate-slide-up">
                    Automation Engineer
                </h2>
                 <p class="text-lg text-gray-600 mb-8 leading-relaxed animate-slide-up" style="animation-delay: 0.2s">
                    I hate repetitive tasks and I will automate it for you.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start animate-slide-up" style="animation-delay: 0.4s">
                    <a href=" {{ route('portfolio') }}" class="bg-gradient-primary text-white px-8 py-3 rounded-full font-semibold hover:shadow-glow transition-all duration-300 transform hover:scale-105">
                        View My Work
                    </a>
                    <a href=" {{ route('resume') }}" class="border-2 border-gray-300 text-gray-700 px-8 py-3 rounded-full font-semibold hover:border-blue-500 hover:text-blue-500 transition-all duration-300">
                        My Resume
                    </a>
                </div>
            </div>

            <div class="flex justify-center lg:justify-end">
                <div class="relative">
                    <div class="w-80 h-80 bg-gradient-primary rounded-full flex items-center justify-center shadow-2xl animate-bounce-slow">
                        <div class="w-72 h-72 bg-white rounded-full flex items-center justify-center overflow-hidden">
                            @if(file_exists(public_path('images/profile/avatar.png')))
                                <img src="{{ asset('images/profile/avatar.png') }}" alt="Inno" class="w-72 h-72 rounded-full object-cover">
                            @else
                                <div class="w-60 h-60 bg-gray-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-6xl text-gray-400"></i>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="absolute -top-4 -left-4 w-8 h-8 bg-yellow-400 rounded-full animate-ping"></div>
                    <div class="absolute -bottom-4 -right-4 w-6 h-6 bg-green-400 rounded-full animate-pulse"></div>
                    <div class="absolute top-1/2 -left-8 w-4 h-4 bg-red-400 rounded-full animate-bounce"></div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection