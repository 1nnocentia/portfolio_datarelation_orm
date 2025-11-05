<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Support\Str;

class PortfolioController extends Controller {
    // Display all projects with filtering
    public function index(Request $request)
    {
        $categorySlug = $request->query('category');

        if ($categorySlug) {
            $category = ProjectCategory::where('slug', $categorySlug)->first();

            $projects = $category ? $category->projects : collect();
        } else {
            $projects = Project::all();
        }

        $categories = $this->getCategories();

        return view('portfolio', compact('projects', 'categories'));
    }

    // private function getCategories()
    // {
    //     return ProjectCategory::select('id', 'category')
    //         ->get()
    //         ->map(function ($category) {
    //             return [
    //                 'key' => $category->category,
    //                 'name' => ucwords(str_replace('-', ' ', $category->category)),
    //                 'icon' => 'fas fa-folder',
    //             ];
    //         });
    // }

    private function getCategories()
    {
        return ProjectCategory::all()->map(function($c){
            $c->name = ucwords(str_replace('-', ' ', $c->category));
            return $c;
        });
    }

    /**
     * Show single project by slug
     */
    public function show($slug)
    {
        $project = Project::where('slug', $slug)->first();

        if (! $project) {
            abort(404, "Project Not Found");
        }

        $categories = $this->getCategories();

        return view('projects.show', compact('project', 'categories'));
    }
    private function getCategoryIcon($categoryName)
    {
        $icons = [
            'Web Development' => 'fas fa-globe',
            'Mobile Apps'     => 'fas fa-mobile-alt',
            'Data Science'    => 'fas fa-brain',
            'Automation'      => 'fas fa-robot',
        ];

        return $icons[$categoryName] ?? 'fas fa-folder';
    }



    // Get project categories
    // private function getCategories()
    // {
    //     $uniqueCategories = Project::distinct()->pluck('project_category_id')->filter()->values();

    //     $categoryDetails = [
    //         'web-dev'    => ['name' => 'Web Development', 'icon' => 'fas fa-globe'],
    //         'mobile-app' => ['name' => 'Mobile Apps', 'icon' => 'fas fa-mobile-alt'],
    //         'data-science' => ['name' => 'Data Science', 'icon' => 'fas fa-brain'],
    //         'automation' => ['name' => 'Automation', 'icon' => 'fas fa-robot'],
    //     ];

    //     $formattedCategories = [];
    //     foreach ($uniqueCategories as $key) {
    //         if (isset($categoryDetails[$key])) {
    //             $formattedCategories[] = [
    //                 'key' => $key,
    //                 'name' => $categoryDetails[$key]['name'],
    //                 'icon' => $categoryDetails[$key]['icon'],
    //             ];
    //         } else {
    //              $formattedCategories[] = [
    //                 'key' => $key,
    //                 'name' => ucfirst(str_replace('-', ' ', $key)), // Coba buat nama otomatis
    //                 'icon' => 'fas fa-folder',
    //             ];
    //         }
    //     }
    //     return $formattedCategories;
    // }

    // Available tech
    private function getTechnologies()
    {
        return [
            ['name' => 'Laravel', 'icon' => 'fab fa-laravel', 'color' => 'text-red-500'],
            ['name' => 'React', 'icon' => 'fab fa-react', 'color' => 'text-blue-500'],
            ['name' => 'JavaScript', 'icon' => 'fab fa-js-square', 'color' => 'text-yellow-500'],
            ['name' => 'Python', 'icon' => 'fab fa-python', 'color' => 'text-green-500'],
            ['name' => 'Node.js', 'icon' => 'fab fa-node-js', 'color' => 'text-green-600'],
            ['name' => 'Docker', 'icon' => 'fab fa-docker', 'color' => 'text-blue-600']
        ];
    }

}