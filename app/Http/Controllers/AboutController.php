<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class AboutController extends Controller {
    // Display the about page
    public function index()
    {
        $personalInfo = $this->getPersonalInfo();
        $timeline = $this->getTimeline();
        $skills = $this->getSkills();
        $interests = $this->getInterests();
        $facts = $this->getFacts();

        $experiences = $this->getExperiences();
        
        return view('about', compact(
            'personalInfo',
            'timeline',
            'skills',
            'interests',
            'facts',
            'experiences'
        ));
    }

    // Personal Information
    private function getPersonalInfo()
    {
        return [
            'name' => 'Han Inno',
            'title' => 'Automation Engineer',
            'tagline' => 'Passionate developer with expertise in modern web technologies and problem-solving skills',
            'about_title' => 'My Story',
            'bio' => "I'm an aspiring Machine Learning Engineer and an enthusiastic AI aficionado. My passion lies at the intersection of code and cognition, focusing on real-world AI applications, especially with AI-integrated IoT.",
            'mission' => "I'm dedicated to creating ethical, interpretable, and human-centered AI systems that reflect our values, not just technical sophistication.",
            'story' => [
                "I'm Han Inno, an aspiring Machine Learning Engineer and an enthusiastic AI aficionado. My passion lies at the intersection of code and cognition, focusing on real-world AI applications, especially with AI-integrated IoT. I'm dedicated to creating ethical, interpretable, and human-centered AI systems that reflect our values, not just technical sophistication.",
                " ",
                "Currently, I'm strengthening my full-stack foundation, delving into backend development with Java, Spring Boot, and MySQL, while also exploring frontend and mobile technologies like React and Flutter. My journey also involves diving into ML workflows and smart contract security, all aimed at building robust and intuitive AI solutions.",
                " ",
                "I believe technology is a powerful medium for self-expression and innovation. My goal is to craft intelligent system with empathy, making AI not just smart, but truly meaningful."
            ],
            'location' => 'Indonesia',
            'email' => 'letsworkwithinno@gmail.com',
            'years_experience' => 2,
            'gpa' => 3.9,
            'projects_completed' => 15,
            'completion_rate' => 100,
            'stats' => [
                [
                    'value' => '2',
                    'suffix' => '+',
                    'label' => 'Years Experience',
                    'color' => 'text-blue-600'
                ],
                [
                    'value' => '15',
                    'suffix' => '+',
                    'label' => 'Projects Completed',
                    'color' => 'text-green-600'
                ],
                [
                    'value' => '3.9',
                    'suffix' => '+',
                    'label' => 'GPA',
                    'color' => 'text-purple-600'
                ],
                [
                    'value' => '100',
                    'suffix' => '%',
                    'label' => 'Success Rate',
                    'color' => 'text-red-600'
                ]
            ],
            'contact_details' => [
                [
                    'icon' => 'fas fa-user',
                    'label' => 'Name',
                    'value' => 'Han Inno'
                ],
                [
                    'icon' => 'fas fa-envelope',
                    'label' => 'Email',
                    'value' => 'letsworkwithinno@gmail.com'
                ],
                [
                    'icon' => 'fas fa-map-marker-alt',
                    'label' => 'Location',
                    'value' => 'Indonesia'
                ]
            ],
            'interests' => [
                [
                    'name' => 'Coding',
                    'description' => 'Personal projects and automation',
                    'icon' => 'fas fa-code',
                    'color' => 'text-blue-600'
                ],
                [
                    'name' => 'Reading',
                    'description' => 'Tech blogs, programming books, and sci-fi novels',
                    'icon' => 'fas fa-book',
                    'color' => 'text-green-600'
                ],
                [
                    'name' => 'Photography',
                    'description' => 'Aesthetic and Cinematic Enthusiast',
                    'icon' => 'fas fa-camera',
                    'color' => 'text-purple-600'
                ],
                [
                    'name' => 'Gaming',
                    'description' => 'Genshin Impact Enthusiast',
                    'icon' => 'fas fa-gamepad',
                    'color' => 'text-red-600'
                ],
                [
                    'name' => 'Music',
                    'description' => 'Playing piano for classical music',
                    'icon' => 'fas fa-music',
                    'color' => 'text-pink-600'
                ]
            ],
            'resume_text' => 'See Resume'
        ];
    }

    // Career Timeline
    private function getTimeline()
    {
        return [
            [
                'year' => '2024 - Present',
                'title' => 'Informatics Intern Student',
                'company' => 'Ciputra University',
                'description' => 'Research Assistant and Technical/Support Administration Assistant',
                'type' => 'internship'
            ],
        ];
    }

    // Experiences and education timeline
    private function getExperiences()
    {
        return [
            [
                'title' => 'Informatics Student',
                'institution' => 'Ciputra University',
                'period' => '2024 - Present',
                'description' => 'Informatics students at Ciputra University are cultivated as technopreneurs, blending strong technical expertise with a mandatory entrepreneurship curriculum to build and launch innovative tech ventures.',
                'color' => 'text-blue-600',
                'dot_color' => 'bg-blue-600'
            ],
            [
                'title' => 'Data Science Bootcamp',
                'institution' => 'Rakamin Academy',
                'period' => '2022-2023',
                'description' => 'Data Science is an interdisciplinary field that combines statistics, computer science, and business knowledge to extract insights and knowledge from data. It involves using advanced analytics techniques, including machine learning and predictive modeling, to uncover hidden patterns, make predictions, and drive strategic decision-making.',
                'color' => 'text-green-600',
                'dot_color' => 'bg-green-600'
            ],
            [
                'title' => 'Data & Business Analyst Class',
                'institution' => 'RuangGuru',
                'period' => '2022',
                'description' => 'A Data and Business Analyst acts as a crucial bridge between raw data and strategic business decisions. They analyze complex datasets to uncover trends and insights, and then translate these findings into actionable recommendations to solve business problems, improve processes, and drive growth.',
                'color' => 'text-purple-600',
                'dot_color' => 'bg-purple-600'
            ],
            [
                'title' => 'Research Assistant',
                'institution' => 'University of Surabaya',
                'period' => '2022',
                'description' => 'My work involved cleansing and preparing a raw dataset in Excel, making value adjustments through deflation, and then conducting the final analysis using both DEAP and Stata.',
                'color' => 'text-orange-600',
                'dot_color' => 'bg-orange-600'
            ]
        ];
    }

    // Skills data organized by category
    private function getSkills()
    {
        return Skill::all()
            ->groupBy('category')
            ->map(function ($skills, $category) {
                return [
                    'category' => ucwords(str_replace('_', ' ', $category)) . ' Development',
                    'skills' => $skills->map(function ($skill) {
                        return [
                            'name' => $skill->name,
                            'level' => $skill->proficiency
                        ];
                    })->toArray()
                ];
            })
            ->values()
            ->toArray();
    }

    // Interests and hobbies
    private function getInterests()
    {
        return [
            [
                'title' => 'Technology & Innovation',
                'description' => 'Always exploring the latest trends in automation and emerging technologies.',
                'icon' => 'fas fa-laptop-code'
            ],
            [
                'title' => 'Design & Creativity',
                'description' => 'Passionate about creating beautiful, user-friendly interfaces and experiences.',
                'icon' => 'fas fa-paint-brush'
            ],
            [
                'title' => 'Photography',
                'description' => 'Capturing moments and exploring the world through the lens of creativity.',
                'icon' => 'fas fa-camera'
            ],
            [
                'title' => 'Anime & Genshin Impact',
                'description' => 'Love exploring different cultures in Anime and Genshin Impact ~tehee .',
                'icon' => 'fas fa-plane'
            ]
        ];
    }

    // Fun facts
    private function getFacts()
    {
        return [
            ['label' => 'Cups of Coffee', 'value' => '1,247', 'icon' => 'fas fa-coffee'],
            ['label' => 'Lines of Code', 'value' => '10,000+', 'icon' => 'fas fa-code'],
            ['label' => 'Projects Completed', 'value' => '15+', 'icon' => 'fas fa-project-diagram'],
            ['label' => 'GPA', 'value' => '3.9+', 'icon' => 'fas fa-smile']
        ];
    }
}
?>