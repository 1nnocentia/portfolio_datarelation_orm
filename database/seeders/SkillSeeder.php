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
            ['name' => 'HTML5', 'level' => 3, 'icon' => 'fab fa-html5', 'color' => 'bg-orange-100', 'experience_years' => 2, 'proficiency' => 80, 'status' => 'active', 'order' => 1],
            ['name' => 'CSS3', 'level' => 3, 'icon' => 'fab fa-css3-alt', 'color' => 'bg-blue-100', 'experience_years' => 2, 'proficiency' => 80, 'status' => 'active', 'order' => 2],
            ['name' => 'JavaScript', 'level' => 3, 'icon' => 'fab fa-js-square', 'color' => 'bg-yellow-100', 'experience_years' => 2, 'proficiency' => 75, 'status' => 'active', 'order' => 3],
            ['name' => 'Laravel', 'level' => 3, 'icon' => 'fab fa-laravel', 'color' => 'bg-red-100', 'experience_years' => 2, 'proficiency' => 78, 'status' => 'active', 'order' => 1],
            ['name' => 'PHP', 'level' => 3, 'icon' => 'fab fa-php', 'color' => 'bg-indigo-100', 'experience_years' => 2, 'proficiency' => 80, 'status' => 'active', 'order' => 2],
            ['name' => 'Python', 'level' => 3, 'icon' => 'fab fa-python', 'color' => 'bg-green-100', 'experience_years' => 1, 'proficiency' => 70, 'status' => 'active', 'order' => 1],
            ['name' => 'Docker', 'level' => 2, 'icon' => 'fab fa-docker', 'color' => 'bg-blue-100', 'experience_years' => 1, 'proficiency' => 65, 'status' => 'active', 'order' => 1],
            ['name' => 'Node.js', 'level' => 2, 'icon' => 'fab fa-node-js', 'color' => 'bg-green-100', 'experience_years' => 1, 'proficiency' => 65, 'status' => 'active', 'order' => 1],
            ['name' => 'TensorFlow', 'level' => 2, 'icon' => 'fab fa-tensorflow', 'color' => 'bg-blue-100', 'experience_years' => 1, 'proficiency' => 65, 'status' => 'active', 'order' => 1],
            ['name' => 'Tailwind', 'level' => 2, 'icon' => 'fab fa-wind', 'color' => 'bg-blue-100', 'experience_years' => 1, 'proficiency' => 65, 'status' => 'active', 'order' => 1],
            ['name' => 'Flutter', 'level' => 2, 'icon' => 'fab fa-mobile', 'color' => 'bg-blue-100', 'experience_years' => 1, 'proficiency' => 65, 'status' => 'active', 'order' => 1],
            ['name' => 'Java', 'level' => 2, 'icon' => 'fab fa-java', 'color' => 'bg-blue-100', 'experience_years' => 1, 'proficiency' => 65, 'status' => 'active', 'order' => 1],
            ['name' => 'MySQL', 'level' => 2, 'icon' => 'fab fa-database', 'color' => 'bg-blue-100', 'experience_years' => 1, 'proficiency' => 65, 'status' => 'active', 'order' => 1],
            ['name' => 'Git', 'level' => 2, 'icon' => 'fab fa-git-alt', 'color' => 'bg-blue-100', 'experience_years' => 1, 'proficiency' => 65, 'status' => 'active', 'order' => 1],
        ];

        foreach ($skills as $s) {
            Skill::create($s);
        }
    }
}
