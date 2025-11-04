<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class PortfolioController extends Controller {
    // Display all projects with filtering
    public function index(Request $request)
    {
        $query = Project::query();

        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }
        
    // Respect any filters applied to the query (category, etc.)
    $projects = $query->get();
        $categories = $this->getCategories();
        $technologies = $this->getTechnologies();

        return view('portfolio', compact('projects', 'categories', 'technologies'));
    }

    // Get project categories
    private function getCategories()
    {
        $uniqueCategories = Project::distinct()->pluck('category')->filter()->values();

        $categoryDetails = [
            'web-dev'    => ['name' => 'Web Development', 'icon' => 'fas fa-globe'],
            'mobile-app' => ['name' => 'Mobile Apps', 'icon' => 'fas fa-mobile-alt'],
            'data-science' => ['name' => 'Data Science', 'icon' => 'fas fa-brain'],
            'automation' => ['name' => 'Automation', 'icon' => 'fas fa-robot'],
        ];

        $formattedCategories = [];
        foreach ($uniqueCategories as $key) {
            if (isset($categoryDetails[$key])) {
                $formattedCategories[] = [
                    'key' => $key,
                    'name' => $categoryDetails[$key]['name'],
                    'icon' => $categoryDetails[$key]['icon'],
                ];
            } else {
                 $formattedCategories[] = [
                    'key' => $key,
                    'name' => ucfirst(str_replace('-', ' ', $key)), // Coba buat nama otomatis
                    'icon' => 'fas fa-folder',
                ];
            }
        }
        return $formattedCategories;
    }

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