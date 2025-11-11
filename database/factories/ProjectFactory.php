<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Skill;
use Illuminate\Support\Str;
// use DB facade not required when using Eloquent relationships

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    protected $model = Project::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(4);
        $slug = Str::slug($title);
        $status = $this->faker->randomElement(['draft', 'active', 'completed', 'on-hold']);

        return [
            'title' => $title,
            'slug' => $slug,
            'description' => $this->faker->paragraph(3),
            'image' => 'https://picsum.photos/seed/' . $slug . '/800/600',
            'project_category_id' => ProjectCategory::inRandomOrder()->value('id') ?? 1,
            'technologies' => [],
            'github_url' => 'https://github.com/1nnocentia/' . $slug,
            'demo_url' => $this->faker->optional()->url(),
            'featured' => $this->faker->boolean(20),
            'status' => $status,
            'client' => $this->faker->company(),
            'start_date' => $this->faker->dateTimeBetween('-1 year', '-6 months'),
            'end_date' => $status === 'completed' ? $this->faker->dateTimeBetween('-5 months', 'now') : null,
            'budget' => $this->faker->randomElement(['under-500k', '500k-1m', '1m-2.5m', '2.5m-5m', 'over-5m']),
            'views' => $this->faker->numberBetween(50, 5000),
        ];
    }

    public function configure(): self
    {
        return $this->afterCreating(function (Project $project) {
            $skills = Skill::inRandomOrder()->take(rand(2, 4))->pluck('id')->toArray();

            if (empty($skills)) {
                $defaults = [
                    'Laravel', 'Flutter', 'Python', 'Vue.js', 'React', 'Tailwind CSS', 'MySQL',
                    'Docker', 'Node.js', 'Firebase', 'Dart', 'Java'
                ];
                foreach ($defaults as $name) {
                    Skill::firstOrCreate(['name' => $name]);
                }
                $skills = Skill::inRandomOrder()->take(rand(2, 4))->pluck('id')->toArray();
            }

            $project->skills()->sync($skills);
            $project->load('skills');
            $skillNames = $project->skills->pluck('name')->toArray();
            $project->technologies = $skillNames;
            $project->save();
        });
    }
}
