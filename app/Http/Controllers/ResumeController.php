<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;
use App\Models\Skill;

class ResumeController extends Controller {
    // Display the resume page
    public function index()
    {
        $personalInfo = $this->getPersonalInfo();
        $education = $this->getEducation();
        $experience = $this->getExperience();
        $skills = $this->getSkills();
        $certifications = $this->getCertifications();

        return view('resume', compact(
            'personalInfo',
            'education', 
            'experience', 
            'skills', 
            'certifications'
        ));
    }

    // Get personal information
    private function getPersonalInfo()
    {
        return [
            'name' => 'Han Inno',
            'title' => 'Automation Engineer',
            'summary' => 'Innovative and deadline-driven Automation Engineer with 3+ years of experience designing and developing user-centered web applications from initial concept to final, polished deliverable.',
            'location' => 'South Sulawesi, ID',
            'phone' => '(62) 851 2345 6789',
            'email' => 'letsworkwithinno@gmail.com',
            'website' => 'www.haninno.dev',
            'linkedin' => 'linkedin.com/in/innocentia-handani'
        ];
    }

    // Education data
    private function getEducation()
    {
        return [
            [
                'degree' => 'MASTER OF FINE ARTS & GRAPHIC DESIGN',
                'period' => '2015 - 2016',
                'institution' => 'Rochester Institute of Technology',
                'location' => 'Rochester, NY',
                'description' => 'Advanced study in web development, user interface design, and modern programming paradigms. Focused on creating responsive, accessible web applications.',
                'gpa' => '3.8/4.0'
            ],
            [
                'degree' => 'BACHELOR OF COMPUTER SCIENCE',
                'period' => '2012 - 2015',
                'institution' => 'University of Technology',
                'location' => 'New York, NY',
                'description' => 'Comprehensive foundation in computer science principles, algorithms, data structures, and software engineering practices with emphasis on web technologies.',
                'gpa' => '3.6/4.0'
            ]
        ];
    }

    // Work experience
    private function getExperience()
    {
        return [
            [
                'position' => 'SENIOR GRAPHIC DESIGN SPECIALIST',
                'period' => '2019 - Present',
                'company' => 'Experion',
                'location' => 'New York, NY',
                'responsibilities' => [
                    'Lead in the design, development, and implementation of the graphic, layout, and production communication materials',
                    'Delegate tasks to the 7 members of the design team and provide counsel on all aspects of the project',
                    'Supervise the assessment of all graphic materials in order to ensure quality and accuracy of the design',
                    'Oversee the efficient use of production project budgets ranging from $2,000 - $25,000'
                ]
            ],
            [
                'position' => 'GRAPHIC DESIGN SPECIALIST',
                'period' => '2017 - 2018',
                'company' => 'Stepping Stone Advertising',
                'location' => 'New York, NY',
                'responsibilities' => [
                    'Developed creative concepts and designs for various marketing materials',
                    'Collaborated with marketing team to create cohesive brand experiences',
                    'Managed multiple projects simultaneously while meeting tight deadlines',
                    'Improved design workflow efficiency by 30% through process optimization'
                ]
            ]
        ];
    }

    // Technical skills
    private function getSkills()
    {
        return [
            'frontend' => [
                ['name' => 'HTML5/CSS3', 'icon' => 'fab fa-html5', 'color' => 'text-orange-500'],
                ['name' => 'JavaScript', 'icon' => 'fab fa-js-square', 'color' => 'text-yellow-500'],
                ['name' => 'React.js', 'icon' => 'fab fa-react', 'color' => 'text-blue-500'],
                ['name' => 'Vue.js', 'icon' => 'fab fa-vuejs', 'color' => 'text-green-500']
            ],
            'backend' => [
                ['name' => 'Laravel', 'icon' => 'fab fa-laravel', 'color' => 'text-red-500'],
                ['name' => 'Node.js', 'icon' => 'fab fa-node-js', 'color' => 'text-green-600'],
                ['name' => 'Python', 'icon' => 'fab fa-python', 'color' => 'text-blue-600'],
                ['name' => 'MySQL/MongoDB', 'icon' => 'fas fa-database', 'color' => 'text-gray-600']
            ]
        ];
    }

    // Certifications
    private function getCertifications()
    {
        return [
            [
                'title' => 'Natural Language Processing with Classification and Vector Spaces',
                'issuer' => 'DeepLearning.AI',
                'year' => '2023',
                'icon' => 'fas fa-certificate',
                'color' => 'text-yellow-600'
            ],
            [
                'title' => 'Supervised Machine Learning: Regression and Classification',
                'issuer' => 'DeepLearning.AI, Coursera, Stanford CPD, UVM',
                'year' => '2023',
                'icon' => 'fas fa-certificate',
                'color' => 'text-yellow-600'
            ],
            [
                'title' => 'Certificate of Competencies - Kalbe Nutritional Data Scientist Virtual Internship Experience Program',
                'issuer' => 'Kalbe Nutritionals (PT Sanghiang Perkasa)',
                'year' => '2023',
                'icon' => 'fas fa-certificate',
                'color' => 'text-yellow-600'
            ]
        ];
    }

    // Download resume as PDF
    public function download()
    {
        // Future: Generate and return PDF resume
        return response()->download(public_path('resume.pdf'));
    }
}