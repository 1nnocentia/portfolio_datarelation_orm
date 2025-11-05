<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProjectCategory;
use Illuminate\Support\Str;

class ProjectCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            'Web Development',
            'Mobile Apps',
            'Data Science',
            'Automation'
        ];

        foreach ($items as $name) {
            ProjectCategory::updateOrCreate(
                ['slug' => Str::slug($name)],
                ['category' => $name, 'slug' => Str::slug($name)]
            );
        }
    }
}
