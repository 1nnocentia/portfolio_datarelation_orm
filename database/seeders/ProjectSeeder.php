<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Skill;
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
                'skills' => ['Java', 'TailwindCSS', 'MySQL'],
                'project_category_id' => 1,
                'github_url' => '#',
                'demo_url' => '#',
                'featured' => true
            ],
            [
                'title' => 'Smart Contract Audit Tools',
                'description' => 'A set of tools for auditing smart contracts, ensuring security and compliance.',
                'image' => '/images/portfolio/zectra.png',
                'skills' => ['Python', 'Node.js', 'Docker'],
                'project_category_id' => 3,
                'github_url' => '#',
                'demo_url' => '#',
                'featured' => true
            ],
            [
                'title' => 'Little Monologue Multi-Platform',
                'description' => 'A multi-platform application for sharing about mental health and self-development.',
                'image' => '/images/portfolio/littlemonologue.png',
                'skills' => ['React', 'API', 'Docker'],
                'project_category_id' => 2, 
                'github_url' => '#',
                'demo_url' => '#',
                'featured' => true
            ],
            [
                'title' => 'Script Of The Soul',
                'description' => 'Cross-platform shopping app with real-time updates and payment integration.',
                'image' => 'https://picsum.photos/seed/default-4/800/400',
                'skills' => ['Flutter', 'Dart', 'Firebase'],
                'project_category_id' => 2,
                'github_url' => '#',
                'demo_url' => '#',
                'featured' => false
            ],
            [
                'title' => 'Personal Portfolio Website',
                'description' => 'Responsive portfolio website built with Laravel and TailwindCSS featuring modern animations.',
                'image' => 'https://picsum.photos/seed/default-5/800/400',
                'skills' => ['Laravel', 'TailwindCSS', 'JavaScript'],
                'project_category_id' => 1,
                'github_url' => '#',
                'demo_url' => '#',
                'featured' => false
            ]
        ];

        foreach ($defaultData as $projectData) {
            $slug = Str::slug($projectData['title']);
            $payload = [
                'title' => $projectData['title'],
                'description' => $projectData['description'],
                'image' => $projectData['image'],
                'technologies' => $projectData['skills'],
                'project_category_id' => $projectData['project_category_id'],
                'github_url' => $projectData['github_url'],
                'demo_url' => $projectData['demo_url'],
                'featured' => $projectData['featured'],
                'slug' => $slug,
                'status' => 'completed',
                'client' => 'Personal Project',
                'start_date' => now()->subMonths(rand(3, 6)),
                'end_date' => now()->subMonths(rand(0, 2)),
                'budget' => '1m-2.5m',
                'views' => rand(500, 3000),
            ];

            $project = Project::updateOrCreate(['slug' => $slug], $payload);
            $project = Project::where('slug', $slug)->first();

            $skillMap = [
                'TailwindCSS' => 'Tailwind',
                'Tailwind CSS' => 'Tailwind',
                'Node.js' => 'Node.js',
                'MySQL' => 'MySQL',
                'React' => 'React',
                'API' => 'API',
                'Dart' => 'Dart',
                'Firebase' => 'Firebase',
                'Laravel' => 'Laravel',
                'Python' => 'Python',
                'Docker' => 'Docker',
                'Flutter' => 'Flutter',
                'Java' => 'Java',
                'JavaScript' => 'JavaScript'
            ];

            $skillIds = [];
            foreach ($projectData['skills'] as $sName) {
                $normalized = $skillMap[$sName] ?? $sName;
                $skill = Skill::firstOrCreate(
                    ['name' => $normalized],
                    ['level' => 1, 'icon' => '', 'color' => '', 'experience_years' => 0, 'proficiency' => 50, 'status' => 'active', 'order' => 99]
                );
                $skillIds[] = $skill->id;
            }

            if (!empty($skillIds)) {
                $project->skills()->sync($skillIds);
            }
        }

        if (Project::count() < 25) {
            $toCreate = 25 - Project::count();
            Project::factory()->count($toCreate)->create();
        }
    }
}
