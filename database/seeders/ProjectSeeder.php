<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultData = [
            [
                'title' => 'Time Management Website',
                'description' => 'A full-featured time management website with streak, task scheduling, reminders, and user authentication.',
                'image' => '/images/portfolio/clockin.jpg',
                'technologies' => ['Java', 'TailwindCSS', 'MySQL'],
                'category' => 'web-dev', 
                'github_url' => '#',
                'demo_url' => '#',
                'featured' => true
            ],
            [
                'title' => 'Smart Contract Audit Tools',
                'description' => 'A set of tools for auditing smart contracts, ensuring security and compliance.',
                'image' => '/images/portfolio/zectra.png',
                'technologies' => ['Python', 'Node.js', 'Docker'],
                'category' => 'automation',
                'github_url' => '#',
                'demo_url' => '#',
                'featured' => true
            ],
            [
                'title' => 'Little Monologue Multi-Platform',
                'description' => 'A multi-platform application for sharing about mental health and self-development.',
                'image' => '/images/portfolio/littlemonologue.png',
                'technologies' => ['React', 'API', 'Docker'],
                'category' => 'mobile-app', 
                'github_url' => '#',
                'demo_url' => '#',
                'featured' => true
            ],
            [
                'title' => 'Script Of The Soul',
                'description' => 'Cross-platform shopping app with real-time updates and payment integration.',
                'image' => 'https://picsum.photos/seed/default-4/800/400',
                'technologies' => ['Flutter', 'Dart', 'Firebase'],
                'category' => 'mobile-app', 
                'github_url' => '#',
                'demo_url' => '#',
                'featured' => false
            ],
            [
                'title' => 'Personal Portfolio Website',
                'description' => 'Responsive portfolio website built with Laravel and TailwindCSS featuring modern animations.',
                'image' => 'https://picsum.photos/seed/default-5/800/400',
                'technologies' => ['Laravel', 'TailwindCSS', 'JavaScript'],
                'category' => 'web-dev',
                'github_url' => '#',
                'demo_url' => '#',
                'featured' => false
            ]
        ];

        foreach ($defaultData as $projectData) {
            Project::create([
                'title' => $projectData['title'],
                'description' => $projectData['description'],
                'image' => $projectData['image'],
                'technologies' => $projectData['technologies'],
                'category' => $projectData['category'],
                'github_url' => $projectData['github_url'],
                'demo_url' => $projectData['demo_url'],
                'featured' => $projectData['featured'],

                'slug' => Str::slug($projectData['title']),
                'status' => 'completed',
                'client' => 'Personal Project',
                'start_date' => now()->subMonths(rand(3, 6)), 
                'end_date' => now()->subMonths(rand(0, 2)),  
                'budget' => '1m-2.5m',
                'views' => rand(500, 3000),
            ]);
        }

        if (Project::count() === 0) {
            foreach ($defaultData as $row) {
                Project::create($row);
            }
        }

        if (Project::count() < 10) {
            Project::factory()->count(10 - Project::count())->create();
        }

    }
}
