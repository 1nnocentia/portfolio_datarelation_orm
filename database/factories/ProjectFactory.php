<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;
use Illuminate\Support\Str;

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
            'category' => $this->faker->randomElement(['web-dev', 'mobile-app', 'data-science', 'automation']),
            'technologies' => $this->faker->randomElements(
                ['Laravel', 'Flutter', 'Python', 'Vue.js', 'React', 'Tailwind CSS', 'MySQL'], 
                $this->faker->numberBetween(2, 4)
            ),
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
}
