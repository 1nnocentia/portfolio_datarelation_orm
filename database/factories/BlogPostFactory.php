<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogPost>
 */
class BlogPostFactory extends Factory
{
    protected $model = BlogPost::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fakerEn = \Faker\Factory::create('en_GB');

        $title = $this->faker->sentence(6); 
        
        $slug = Str::slug($title);

        $excerpt = $this->faker->paragraph(2);

        return [
            'title' => $title,
            'slug' => $slug,
            'excerpt' => $excerpt,
            'content' => $this->faker->paragraphs(10, true), 
            'featured_image' => 'https://picsum.photos/seed/' . $slug . '/1200/800', 
            'category' => $this->faker->randomElement(['Technology', 'Programming', 'Data Science', 'Tutorials', 'Lifestyle']),
            'tags' => $this->faker->randomElements(['PHP', 'Laravel', 'Python', 'AI', 'Flutter', 'React'], $this->faker->numberBetween(1, 3)),
            'status' => 'published', 
            'featured' => $this->faker->boolean(15), 
            'published_at' => $this->faker->dateTimeBetween('-2 years', 'now'), 
            
            'author_id' => User::factory(), 
            
            'views' => $this->faker->numberBetween(100, 25000),
            'reading_time' => $this->faker->numberBetween(3, 15),
            'meta_title' => $title,
            'meta_description' => $excerpt,
        ];
    }

    public function draft()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'draft',
                'published_at' => null,
            ];
        });
    }
}
