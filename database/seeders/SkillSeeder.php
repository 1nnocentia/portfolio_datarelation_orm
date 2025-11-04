<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
            ['name' => 'HTML5', 'category' => 'frontend', 'level' => 3, 'icon' => 'fab fa-html5', 'color' => 'bg-orange-100', 'experience_years' => 2, 'proficiency' => 80, 'status' => 'active', 'order' => 1],
            ['name' => 'CSS3', 'category' => 'frontend', 'level' => 3, 'icon' => 'fab fa-css3-alt', 'color' => 'bg-blue-100', 'experience_years' => 2, 'proficiency' => 80, 'status' => 'active', 'order' => 2],
            ['name' => 'JavaScript', 'category' => 'frontend', 'level' => 3, 'icon' => 'fab fa-js-square', 'color' => 'bg-yellow-100', 'experience_years' => 2, 'proficiency' => 75, 'status' => 'active', 'order' => 3],
            ['name' => 'Laravel', 'category' => 'backend', 'level' => 3, 'icon' => 'fab fa-laravel', 'color' => 'bg-red-100', 'experience_years' => 2, 'proficiency' => 78, 'status' => 'active', 'order' => 1],
            ['name' => 'PHP', 'category' => 'backend', 'level' => 3, 'icon' => 'fab fa-php', 'color' => 'bg-indigo-100', 'experience_years' => 2, 'proficiency' => 80, 'status' => 'active', 'order' => 2],
            ['name' => 'Python', 'category' => 'data', 'level' => 3, 'icon' => 'fab fa-python', 'color' => 'bg-green-100', 'experience_years' => 1, 'proficiency' => 70, 'status' => 'active', 'order' => 1],
            ['name' => 'Docker', 'category' => 'devops', 'level' => 2, 'icon' => 'fab fa-docker', 'color' => 'bg-blue-100', 'experience_years' => 1, 'proficiency' => 65, 'status' => 'active', 'order' => 1],
        ];

        foreach ($skills as $s) {
            Skill::create($s);
        }
    }
}
