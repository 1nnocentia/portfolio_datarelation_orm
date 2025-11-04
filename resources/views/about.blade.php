@extends('layout.app')

@section('title', 'about')\

@section('content')

<section class="pt-20 pb-16 bg-linear-to-br from-blue-50 via-white to-purple-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-5xl font-bold mb-6 text-gradient overflow-y-visible">About Me</h1>
            <div class="w-20 h-1 bg-gradient-primary mx-auto mb-6"></div>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Get to know more about my journey, skills, and passion for creating amazing digital experiences
            </p>
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            
            <div class="relative">
                <div class="aspect-square bg-gradient-primary rounded-2xl p-1">
                    <div class="w-full h-full bg-white rounded-2xl flex items-center justify-center">
                        <div class="text-center">
                            <div class="w-48 h-48 rounded-full mx-auto mb-6 overflow-hidden">
                                @if(file_exists(public_path('images/profile/avatar.png')))
                                    <img src="{{ asset('images/profile/avatar.png') }}" alt="Inno" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-gray-200 rounded-full flex items-center justify-center">
                                        <i class="fas fa-user text-6xl text-gray-400"></i>
                                @endif
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900">Inno</h3>
                            <p class="text-gray-600">Automation Engineer</p>
                        </div>
                    </div>
                </div>
                
                <div class="absolute -top-4 -right-4 w-20 h-20 bg-blue-200 rounded-full opacity-60"></div>
                <div class="absolute -bottom-4 -left-4 w-16 h-16 bg-purple-200 rounded-full opacity-60"></div>
            </div>

            <div class="space-y-8">
                <div>
                    <h2 class="text-3xl font-bold mb-6 text-gray-900">{{ $personalInfo['about_title'] ?? 'My Story' }}</h2>
                    <div class="space-y-4 text-gray-600 leading-relaxed">
                        @if(isset($personalInfo['story']) && is_array($personalInfo['story']))
                            @foreach($personalInfo['story'] as $paragraph)
                                <p>{{ $paragraph }}</p>
                            @endforeach
                        @else
                            <p>{{ $personalInfo['bio'] ?? 'Passionate developer focused on creating innovative solutions.' }}</p>
                            <p>{{ $personalInfo['mission'] ?? 'Dedicated to building technology that makes a positive impact.' }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Personal Statistics Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">{{ $personalInfo['name'] ?? 'Professional Overview' }}</h2>
            <p class="text-xl text-gray-600">{{ $personalInfo['tagline'] ?? 'Passionate about creating innovative solutions' }}</p>
        </div>
        
        <!-- Stats Grid -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @if(isset($personalInfo['stats']) && is_array($personalInfo['stats']))
                @foreach($personalInfo['stats'] as $stat)
                    <x-stat-card 
                        :value="$stat['value'] ?? '0'"
                        :label="$stat['label'] ?? 'Metric'"
                        :color="$stat['color'] ?? 'text-blue-600'"
                        :suffix="$stat['suffix'] ?? ''"
                    />
                @endforeach
            @else
                <x-stat-card value="{{ $personalInfo['years_experience'] ?? '2' }}+" label="Years Experience" color="text-blue-600" />
                <x-stat-card value="{{ $personalInfo['projects_completed'] ?? '15' }}+" label="Projects Completed" color="text-green-600" />
                <x-stat-card value="{{ $personalInfo['gpa'] ?? '3.9' }}+" label="GPA" color="text-purple-600" />
                <x-stat-card value="{{ $personalInfo['completion_rate'] ?? '100' }}%" label="Success Rate" color="text-red-600" />
            @endif
        </div>
        
        <!-- Action Buttons -->
        <div class="flex justify-center gap-4 mt-12">
            <a href="{{ route('resume') }}" class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition-colors font-semibold">
                Download Resume
            </a>
            <a href="{{ route('contact') }}" class="bg-gray-100 text-gray-700 px-8 py-3 rounded-lg hover:bg-gray-200 transition-colors font-semibold">
                Contact Me
            </a>
        </div>
    </div>
</section>


<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-4">Skills & Technologies</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                I work with cutting-edge technologies to deliver exceptional results
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">
    
            <x-skill-card name="HTML5" bgColor="bg-orange-100" hoverBgColor="group-hover:bg-orange-200">
                <i class="fab fa-html5 text-orange-500 text-4xl"></i>
            </x-skill-card>

            <x-skill-card name="CSS3" bgColor="bg-blue-100" hoverBgColor="group-hover:bg-blue-200">
                <i class="fab fa-css3-alt text-blue-500 text-4xl"></i>
            </x-skill-card>

            <x-skill-card name="JavaScript" bgColor="bg-yellow-100" hoverBgColor="group-hover:bg-yellow-200">
                <i class="fab fa-js-square text-yellow-500 text-4xl"></i>
            </x-skill-card>

            <x-skill-card name="Tailwind" bgColor="bg-cyan-100" hoverBgColor="group-hover:bg-cyan-200">
                <i class="fas fa-wind text-cyan-500 text-4xl"></i>
            </x-skill-card>

            <x-skill-card name="Python" bgColor="bg-blue-100" hoverBgColor="group-hover:bg-blue-200">
                <i class="fab fa-python text-blue-500 text-4xl"></i>
            </x-skill-card>

            <x-skill-card name="Flutter" bgColor="bg-blue-100" hoverBgColor="group-hover:bg-blue-200">
                <svg class="w-10 h-10 text-blue-500" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M14.314 0L8.892 5.422l3.045 3.045L17.359 3z"/>
                    <path d="M8.892 5.422L3.471 10.844l3.045 3.045L12 9.405z"/>
                    <path d="M8.892 18.578L14.314 24l4.468-4.468L17.359 21z"/>
                    <path d="M8.892 18.578L3.471 13.156l3.045-3.045L12 14.595z"/>
                </svg>
            </x-skill-card>

            <x-skill-card name="Laravel" bgColor="bg-red-100" hoverBgColor="group-hover:bg-red-200">
                <i class="fab fa-laravel text-red-500 text-4xl"></i>
            </x-skill-card>

            <x-skill-card name="PHP" bgColor="bg-purple-100" hoverBgColor="group-hover:bg-purple-200">
                <i class="fab fa-php text-purple-500 text-4xl"></i>
            </x-skill-card>

            <x-skill-card name="Java" bgColor="bg-orange-100" hoverBgColor="group-hover:bg-orange-200">
                <i class="fab fa-java text-orange-600 text-4xl"></i>
            </x-skill-card>

            <x-skill-card name="MySQL" bgColor="bg-blue-100" hoverBgColor="group-hover:bg-blue-200">
                <i class="fas fa-database text-blue-600 text-4xl"></i>
            </x-skill-card>

            <x-skill-card name="Git" bgColor="bg-orange-100" hoverBgColor="group-hover:bg-orange-200">
                <i class="fab fa-git-alt text-orange-600 text-4xl"></i>
            </x-skill-card>

            <x-skill-card name="Docker" bgColor="bg-blue-100" hoverBgColor="group-hover:bg-blue-200">
                <i class="fab fa-docker text-blue-500 text-4xl"></i>
            </x-skill-card>

        </div>
    </div>
</section>

<!-- Experience & Education Timeline -->
@if(isset($experiences) || isset($education))
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold mb-4">Experience & Education</h2>
            <p class="text-xl text-gray-600">
                My journey through various roles and educational experiences
            </p>
        </div>

        <div class="relative">
            <!-- Timeline line -->
            <div class="absolute left-1/2 transform -translate-x-1/2 w-px h-full bg-gray-200"></div>

            <!-- Timeline items -->
           <div class="space-y-12">
                @if(isset($experiences))
                    @foreach($experiences as $index => $exp)
                        <x-timeline-item 
                            :item="$exp" 
                            :align="$index % 2 == 0 ? 'left' : 'right'" 
                        />
                    @endforeach
                @else
                    <!-- Default timeline if no data -->
                    <div class="text-center text-gray-500">
                        <p>Experience and education timeline will be displayed here.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endif

<!-- Personal Information & Interests -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            
            <!-- Personal Information -->
            <div>
                <h3 class="text-2xl font-bold mb-6">Personal Information</h3>
                <div class="space-y-4">
                    @if(isset($personalInfo['contact_details']))
                        @foreach($personalInfo['contact_details'] as $detail)
                            <div class="flex items-center">
                                <i class="{{ $detail['icon'] }} text-blue-600 w-6 mr-3"></i>
                                <span class="font-medium w-24">{{ $detail['label'] }}:</span>
                                <span class="text-gray-600">{{ $detail['value'] }}</span>
                            </div>
                        @endforeach
                    @else
                        <!-- Default contact info -->
                        <div class="flex items-center">
                            <i class="fas fa-user text-blue-600 w-6 mr-3"></i>
                            <span class="font-medium w-24">Name:</span>
                            <span class="text-gray-600">{{ $personalInfo['name'] ?? 'Developer' }}</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-envelope text-blue-600 w-6 mr-3"></i>
                            <span class="font-medium w-24">Email:</span>
                            <span class="text-gray-600">{{ $personalInfo['email'] ?? 'developer@example.com' }}</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-map-marker-alt text-blue-600 w-6 mr-3"></i>
                            <span class="font-medium w-24">Location:</span>
                            <span class="text-gray-600">{{ $personalInfo['location'] ?? 'Remote' }}</span>
                        </div>
                    @endif
                </div>

                <div class="mt-8">
                    <a href="{{ route('resume') }}" class="bg-gradient-primary text-white px-6 py-3 rounded-lg hover:shadow-glow transition-all duration-300 inline-flex items-center">
                        <i class="fas fa-download mr-2"></i>
                        {{ $personalInfo['resume_text'] ?? 'See Resume' }}
                    </a>
                </div>
            </div>

            <!-- Interests & Hobbies -->
            <div>
                <h3 class="text-2xl font-bold mb-6">Interests & Hobbies</h3>
                <div class="grid grid-cols-2 gap-4">
                    @forelse($personalInfo['interests'] ?? [] as $interest)
                        <x-interest-card 
                            :icon="$interest['icon']"
                            :name="$interest['name']"
                            :description="$interest['description']"
                            :color="$interest['color'] ?? 'text-blue-600'"
                        />
                    @empty
                        <x-interest-card 
                            icon="fas fa-code"
                            name="Coding"
                            description="Building innovative solutions"
                            color="text-blue-600"
                        />
                        <x-interest-card 
                            icon="fas fa-book"
                            name="Learning"
                            description="Exploring new technologies"
                            color="text-green-600"
                        />
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

<x-cta-block 
    title="Ready to Collaborate?"
    text="Let's create something amazing together! I'm available for freelance projects, 
          full-time opportunities, or just a friendly chat about technology."
>
    <a href="{{ route('contact') }}" class="bg-white text-blue-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition-colors">
        Get In Touch
    </a>
    <a href="{{ route('portfolio') }}" class="border-2 border-white text-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-blue-600 transition-colors">
        View Portfolio
    </a>
</x-cta-block>

@endsection