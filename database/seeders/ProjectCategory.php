<?php

use Illuminate\Database\Seeder;
use App\Models\Project_Category;

class ProjectCategory extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'web-dev',
            'mobile-app',
            'automation',
            'data-science'
        ];

        foreach ($categories as $category) {
            Project_Category::create(['category' => $category]);
        }
    }
}
?>