@extends('layout.app')

@section('title', 'Resume')

@section('content')

<section class="pt-20 pb-16 bg-linear-to-br from-blue-50 via-white to-purple-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-5xl font-bold mb-6 text-gradient">Resume</h1>
            <div class="w-20 h-1 bg-gradient-primary mx-auto mb-6"></div>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Passionate developer with expertise in modern web technologies and problem-solving skills
            </p>
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <div class="space-y-10">
                <x-resume-card title="Summary" class="bg-linear-to-br from-blue-50 to-purple-50">
                    <div class="relative pl-6">
                        <div class="absolute left-0 top-2 w-3 h-3 bg-blue-500 rounded-full"></div>
                        <div class="border-l-2 border-gray-200 pl-6 ml-1.5">
                            <h3 class="text-lg font-bold text-gray-900 mb-3">{{ $personalInfo['name'] ?? 'Han Inno' }}</h3>
                            <p class="text-gray-600 leading-relaxed mb-4 italic">
                                {{ $personalInfo['bio'] ?? 'Hi! I am a highly motivated and results-driven individual with a passion for technology. Throughout my career, I have consistently demonstrated my ability to lead and motivate teams to achieve common goals.' }}
                            </p>
                            
                            <div class="space-y-2 text-gray-700">
                                <div class="flex items-center text-sm">
                                    <i class="fas fa-map-marker-alt text-blue-500 w-4 mr-3"></i>
                                    <span>{{ $personalInfo['location'] ?? 'Indonesia' }}</span>
                                </div>
                                <div class="flex items-center text-sm">
                                    <i class="fas fa-phone text-blue-500 w-4 mr-3"></i>
                                    <span>{{ $personalInfo['phone'] ?? '(62) 851 2345 6789' }}</span>
                                </div>
                                <div class="flex items-center text-sm">
                                    <i class="fas fa-envelope text-blue-500 w-4 mr-3"></i>
                                    <span>letsworkwithinno@gmail.com</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </x-resume-card>

                <x-resume-card title="Education" class="bg-white border border-gray-100">
                    <div class="relative pl-6">
                        <div class="absolute left-1.5 top-8 bottom-0 w-0.5 bg-gray-200"></div>
                        <div class="space-y-8">
                            
                            <x-resume-item 
                                title="ARTIFICIAL INTELLIGENCE"
                                date="2024 - present"
                                subtitle="Ciputra University"
                                dotColor="bg-blue-500"
                            >
                                <p>
                                    Informatics students at Ciputra University are cultivated as technopreneurs, 
                                    blending strong technical expertise with a mandatory entrepreneurship curriculum to build and launch innovative tech ventures.
                                </p>
                            </x-resume-item>
                        </div>
                    </div>
                </x-resume-card>
            </div>
            
            <div class="space-y-10">
                <x-resume-card title="Certifications & Awards" class="bg-linear-to-br from-purple-50 to-pink-50">
                    <div class="space-y-4">
                        
                        <x-certification-item
                            title="Natural Language Processing with Classification and Vector Spaces"
                            issuer="DeepLearning.AI - 2023"
                            icon="fas fa-certificate"
                            iconBg="bg-blue-100"
                            iconColor="text-blue-600"
                        />

                        <x-certification-item
                            title="Supervised Machine Learning: Regression and Classification"
                            issuer="DeepLearning.AI, Coursera, Stanford CPD, UVM - 2023"
                            icon="fas fa-certificate"
                            iconBg="bg-blue-100"
                            iconColor="text-blue-600"
                        />

                        <x-certification-item
                            title="Certificate of Competencies - Kalbe Nutritional Data Scientist Virtual Internship Experience Program"
                            issuer="Kalbe Nutritionals (PT Sanghiang Perkasa) - 2023"
                            icon="fas fa-certificate"
                            iconBg="bg-blue-100"
                            iconColor="text-blue-600"
                        />

                    </div>
                </x-resume-card>

                <x-resume-card title="Professional Experience" class="bg-white border border-gray-100">
                    <div class="relative pl-6">
                        <div class="absolute left-1.5 top-8 bottom-0 w-0.5 bg-gray-200"></div>
                        <div class="space-y-8">
                            
                            <x-resume-item 
                                title="Informatics Intern Student"
                                date="2024 - present"
                                subtitle="South Sulawesi, Indonesia"
                                dotColor="bg-green-500"
                            >
                                <ul class="space-y-2">
                                    <li class="flex items-start">
                                        <span class="mr-2">•</span>
                                        <span>Research Assistant</span>
                                    </li>
                                    <li class="flex items-start">
                                        <span class="mr-2">•</span>
                                        <span>Technical/Support Administration Assistant</span>
                                    </li>
                                </ul>
                            </x-resume-item>

                        </div>
                    </div>
                </x-resume-card>

            </div>
        </div>
    </div>
</section>


<x-cta-block 
    title="Download My Resume"
    text="Get a PDF copy of my complete resume for your records"
>
    <a href="#" class="inline-block bg-white text-purple-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition-colors duration-300">
        <i class="fas fa-download mr-2"></i>Download PDF
    </a>
    <a href="{{ route('contact') }}" class="inline-block border-2 border-white text-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-purple-600 transition-colors duration-300">
        <i class="fas fa-envelope mr-2"></i>Contact Me
    </a>
</x-cta-block>

@endsection