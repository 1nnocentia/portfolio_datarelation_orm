<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller {
    // Display contact page
    public function index()
    {
        $contactInfo = $this->getContactInfoFormatted();
        $workingHours = $this->getWorkingHours();
        $socialMedia = $this->getSocialMedia();
        $guarantees = $this->getGuarantees();
        $faqs = $this->getFAQs();
        $services = $this->getServices();
        $budgetRanges = $this->getBudgetRanges();

        return view('contact', compact(
            'contactInfo', 
            'workingHours', 
            'socialMedia', 
            'guarantees', 
            'faqs', 
            'services',
            'budgetRanges'
        ));
    }

    // Handle contact form submission
    public function send(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
            'budget' => 'nullable|string',
            'timeline' => 'nullable|string',
            'services' => 'nullable|array'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Prepare email data
            $emailData = [
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'messageContent' => $request->message,
                'budget' => $request->budget,
                'timeline' => $request->timeline,
                'services' => $request->services ?? [],
                'sent_at' => now()
            ];

            // Future: Send email using Laravel Mail

            return response()->json([
                'success' => true,
                'message' => 'Thank you for your message! I\'ll get back to you within 24 hours.'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, there was an error sending your message. Please try again later.'
            ], 500);
        }
    }

    // Get contact information
    private function getContactInfo()
    {
        return [
            'address' => [
                'state' => 'South Sulawesi',
                'country' => 'Indonesia'
            ],
            'phone' => '+62 851 2345 6789',
            'email' => 'letsworkwithinno@gmail.com',
            'website' => 'www.haninno.dev',
            'availability' => 'Monday - Friday, 8:00 AM - 5:00 PM WITA',
            'response_time' => 'Within 24 hours',
            'languages' => ['English', 'Indonesia']
        ];
    }

    // Format contact information
    private function getContactInfoFormatted()
    {
        return [
            [
                'label' => 'Email',
                'value' => ['letsworkwithinno@gmail.com', 'ihandani@student.ciputra.ac.id'],
                'icon' => 'fas fa-envelope',
                'icon_color' => 'text-blue-600',
                'bg_color' => 'bg-blue-100'
            ],
            [
                'label' => 'Phone',
                'value' => ['+62 851 2345 6789'],
                'icon' => 'fas fa-phone',
                'icon_color' => 'text-green-600',
                'bg_color' => 'bg-green-100'
            ],
            [
                'label' => 'Location',
                'value' => ['South Sulawesi'],
                'icon' => 'fas fa-map-marker-alt',
                'icon_color' => 'text-purple-600',
                'bg_color' => 'bg-purple-100'
            ]
        ];
    }

    // Workung hours
    private function getWorkingHours()
    {
        return [
            'Monday - Friday: 8:00 AM - 5:00 PM',
        ];
    }

    // Guarantees
    private function getGuarantees()
    {
        return [
            'title' => 'Quick Response Guarantee',
            'items' => [
                'Response within 24 hours',
                'Free initial consultation',
                'Detailed project proposal',
                'Transparent pricing'
            ]
        ];
    }

    // Social media links
    private function getSocialMedia()
    {
        return [
            [
                'name' => 'LinkedIn',
                'url' => 'https://linkedin.com/in/innocentia-handani',
                'icon' => 'fab fa-linkedin-in',
            ],
            [
                'name' => 'GitHub',
                'url' => 'https://github.com/1nnocentia',
                'icon' => 'fab fa-github',
            ],
            [
                'name' => 'Instagram',
                'url' => 'https://instagram.com/innocentia_h',
                'icon' => 'fab fa-instagram',
            ]
        ];
    }

    // FaQs
    private function getFAQs()
    {
        return [
            [
                'question' => 'What is your typical project timeline?',
                'answer' => 'Project timelines vary depending on complexity. A simple website typically takes 2-4 weeks, while complex web applications can take 2-6 months. I provide detailed timelines during our initial consultation.'
            ],
            [
                'question' => 'Do you provide ongoing maintenance?',
                'answer' => 'Yes! I offer various maintenance packages including security updates, content updates, performance monitoring, and technical support. We can discuss the best option for your needs.'
            ],
            [
                'question' => 'What technologies do you work with?',
                'answer' => 'I specialize in modern libraries including Keras, TensorFlow, Pytorch, and various languages. I choose the best technology stack based on your project requirements.'
            ],
            [
                'question' => 'How do you handle project communication?',
                'answer' => 'I believe in transparent communication. I provide regular updates through your preferred method (email, Jira, or project management tools) and schedule weekly check-ins for larger projects.'
            ],
            [
                'question' => 'What are your payment terms?',
                'answer' => 'I typically work with a 50% deposit to start the project and 50% upon completion. For larger projects, we can arrange milestone-based payments. All terms are clearly outlined in the project contract.'
            ]
        ];
    }

    // Available services
    private function getServices()
    {
        return [
            [
                'name' => 'Web Development',
                'description' => 'Custom web applications and websites',
                'icon' => 'fas fa-code'
            ],
            [
                'name' => 'Mobile Development',
                'description' => 'Cross-platform mobile applications',
                'icon' => 'fas fa-mobile-alt'
            ],
            [
                'name' => 'Automation & AI Solutions',
                'description' => 'Automated workflows and AI-driven applications',
                'icon' => 'fas fa-robot'
            ],
            [
                'name' => 'API Development',
                'description' => 'RESTful API and backend services',
                'icon' => 'fas fa-server'
            ],
            [
                'name' => 'Consulting',
                'description' => 'Technical consultation and architecture review',
                'icon' => 'fas fa-lightbulb'
            ]
        ];
    }
    // Project budget ranges
    public function getBudgetRanges()
    {
        return [
            ['value' => 'under-500k', 'label' => 'Under 500.000'],
            ['value' => '500k-1m',    'label' => '500.000 - 1.000.000'],
            ['value' => '1m-2.5m',    'label' => '1.000.000 - 2.500.000'],
            ['value' => '2.5m-5m',    'label' => '2.500.000 - 5.000.000'],
            ['value' => 'over-5m',    'label' => 'Over 5.000.000'],
        ];
    }

    // Project timeline
    public function getTimelineOptions()
    {
        return [
            ['label' => 'ASAP', 'value' => 'asap'],
            ['label' => '1-2 weeks', 'value' => '1-2weeks'],
            ['label' => '1-3 months', 'value' => '1-3months'],
            ['label' => '3-6 months', 'value' => '3-6months'],
            ['label' => 'No rush', 'value' => 'no-rush']
        ];
    }
}