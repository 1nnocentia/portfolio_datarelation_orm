@extends('layout.app')

@section('title', 'contact')

@section('content')

<section class="pt-20 pb-16 bg-linear-to-br from-blue-50 via-white to-purple-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-5xl font-bold mb-6 text-gradient">Get In Touch</h1>
            <div class="w-20 h-1 bg-gradient-primary mx-auto mb-6"></div>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Have a project in mind? Let's discuss how we can work together to bring your ideas to life
            </p>
        </div>
    </div>
</section>

{{-- Contact Section --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            {{-- Contact Form --}}
            <div>
                <div class="bg-white p-8 rounded-2xl shadow-xl">
                    <h2 class="text-3xl font-bold mb-8 text-gray-900">Send Message</h2>

                    <form id="contact-form" action="{{ route('contact') }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="first_name" class="block text-sm font-semibold text-gray-700 mb-2">First Name</label>
                                <input type="text" id="first_name" name="first_name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" placeholder="Henry"/>
                            </div>
                            <div>
                                <label for="last_name" class="block text-sm font-semibold text-gray-700 mb-2">Last Name</label>
                                <input type="text" id="last_name" name="last_name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" placeholder="Wriothesley" required>
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                            <input type="email" id="email" name="email" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                   placeholder="Wriothesley@genshin.com" required>
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
                            <input type="tel" id="phone" name="phone" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                   placeholder="+62 851 2345 6789">
                        </div>
                        
                        <div>
                            <label for="subject" class="block text-sm font-semibold text-gray-700 mb-2">Subject</label>
                            <select id="subject" name="subject" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" required>
                                <option value="">Select a subject</option>
                                <option value="automation">Automation</option>
                                <option value="machine-learning">Machine Learning</option>
                                <option value="consultation">Consultation</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        {{-- Budget Range --}}
                        <div>
                            <label for="budget" class="block text-sm font-semibold text-gray-700 mb-2">Project Budget</label>
                            <select id="budget" name="budget" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                
                                <option value="">Select budget range</option>
                                @foreach($budgetRanges as $range)
                                    <option value="{{ $range['value'] }}">{{ $range['label'] }}</option>
                                @endforeach
                                
                            </select>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">Message</label>
                            <textarea id="message" name="message" rows="6" 
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 resize-none"
                                      placeholder="Tell me about your project, goals, and any specific requirements..." required></textarea>
                        </div>

                        <div class="flex items-start">
                            <input type="checkbox" id="privacy" name="privacy" 
                                   class="mt-1 w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" required>
                            <label for="privacy" class="ml-3 text-sm text-gray-600">
                                I agree to the <a href="#" class="text-blue-600 hover:underline">Privacy Policy</a> 
                                and <a href="#" class="text-blue-600 hover:underline">Terms of Service</a>
                            </label>
                        </div>

                        <button type="submit" 
                                class="w-full bg-gradient-primary text-white py-4 px-6 rounded-lg font-semibold hover:shadow-glow transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Send Message
                        </button>

                    </form>
                </div>
            </div>

            {{-- Contact Information --}}
            <div class="space-y-8">
                {{-- Contact Details --}}
                <div class="bg-gray-50 p-8 rounded-2xl">
                    <div class="space-y-6">
                        @if(isset($contactInfo))
                            @foreach($contactInfo as $info)
                                <div class="flex item-start">
                                    <div class="w-12 h-12 {{ $info['bg_color'] ?? 'bg-blue-100' }} rounded-lg flex items-center justify-center mr-4 shrink-0">
                                        <i class="{{ $info['icon'] }} {{ $info['icon_color'] ?? 'text-blue-600' }} text-xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900 mb-1">{{ $info['label'] }}</h4>
                                        @if(is_array($info['value']))
                                            @foreach($info['value'] as $value)
                                                <p class="text-gray-600">{{ $value }}</p>
                                            @endforeach
                                        @else
                                            <p class="text-gray-600">{{ $info['value'] }}</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @else
                            {{-- Default contact info --}}
                            <div class="flex items-start">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4 shrink-0">
                                    <i class="fas fa-envelope text-blue-600 text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Email</h4>
                                    <p class="text-gray-600">letsworkwithinno@gmail.com</p>
                                </div>
                            </div>
                        @endif

                        @if(isset($workingHours))
                            <div class="flex items-start">
                                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mr-4 shrink-0">
                                    <i class="fas fa-clock text-orange-600 text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Working Hours</h4>
                                    @foreach($workingHours as $hours)
                                        <p class="text-gray-600">{{ $hours }}</p>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Social Media --}}
                @if(isset($socialMedia) && count($socialMedia) > 0)
                    <div class="bg-gray-900 p-8 rounded-2xl text-white">
                        <h3 class="text-2xl font-bold mb-6">Follow Me</h3>
                        <p class="text-gray-300 mb-6">Connect with me on social media for updates and behind-the-scenes content</p>
                        <div class="grid grid-cols-3 gap-4">
                            @foreach($socialMedia as $social)
                                <a href="{{ $social['url'] }}" target="_blank" class="social-card">
                                    <i class="{{ $social['icon'] }} text-2xl mb-2"></i>
                                    <span class="text-sm">{{ $social['name'] }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
                
                {{-- Quick Response --}}
                @if(isset($guarantees) && count($guarantees) > 0)
                    <div class="bg-gradient-primary p-8 rounded-2xl text-white">
                        <h3 class="text-xl font-bold mb-4">{{ $guarantees['title'] ?? 'Quick Response Guarantee' }}</h3>
                        <div class="space-y-3 text-sm">
                            @foreach($guarantees['items'] ?? [] as $guarantee)
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle mr-3"></i>
                                    <span>{{ $guarantee }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- Testimonial --}}


{{-- FAQ --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold mb-4">Frequently Asked Questions</h2>
            <p class="text-xl text-gray-600">
                Quick answers to common questions about working with me
            </p>
        </div>

        <div class="space-y-6">
            @forelse($faqs ?? [] as $index => $faq)
                <div class="faq-item">
                    <button class="faq-question w-full text-left p-6 bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold">{{ $faq['question'] }}</h3>
                            <i class="fas fa-chevron-down text-gray-400"></i>
                        </div>
                    </button>
                    <div class="faq-answer hidden p-6 pt-0">
                        <p class="text-gray-600">{{ $faq['answer'] }}</p>
                    </div>
                </div>
            @empty
                <!-- Default FAQ if no data from controller -->
                <div class="faq-item">
                    <button class="faq-question w-full text-left p-6 bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold">How can I get in touch with you?</h3>
                            <i class="fas fa-chevron-down text-gray-400"></i>
                        </div>
                    </button>
                    <div class="faq-answer hidden p-6 pt-0">
                        <p class="text-gray-600">
                            You can reach out through the contact form above or via email. I typically respond within 24 hours.
                        </p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection