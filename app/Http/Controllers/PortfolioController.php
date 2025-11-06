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
            $projects = $category
                ? $category->projects()->with(['category', 'skills'])->get()
                : collect();
        } else {
            $projects = Project::with(['category', 'skills'])->get();
        }

        $categories = $this->getCategories();

        return view('portfolio', compact('projects', 'categories'));
    }

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
        // $project = Project::where('slug', $slug)->first();
        $project = Project::with(['category', 'skills'])->where('slug', $slug)->firstOrFail();

        if (! $project) {
            abort(404, "Project Not Found");
        }

        $categories = $this->getCategories();

        return view('projects.show', compact('project', 'categories'));
    }
}