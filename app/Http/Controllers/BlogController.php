<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;

class BlogController extends Controller {
    // Display blog listing
    public function index(Request $request)
    {
        // Get published posts from database
        $query = BlogPost::where('status', 'published')
                         ->where('published_at', '<=', now())
                         ->orderBy('published_at', 'desc');

        // Filter by category if provided
        if ($request->has('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'like', "%{$searchTerm}%")
                  ->orWhere('excerpt', 'like', "%{$searchTerm}%")
                  ->orWhere('content', 'like', "%{$searchTerm}%");
            });
        }

    $posts = $query->get();
    $categories = $this->getCategories();
    // Use controller helper to get a single featured post (model) or null
    $featuredPost = $this->getFeaturedPost();
        $recentPosts = BlogPost::where('status', 'published')
                              ->orderBy('published_at', 'desc')
                              ->limit(3)
                              ->get();

        // Format data for template
        $blogCategories = $this->formatCategoriesForTemplate($categories);
        
        return view('blog', compact('posts', 'blogCategories', 'featuredPost', 'recentPosts'));
    }

    // Format Categories
    private function formatCategoriesForTemplate($categories)
    {
        return collect($categories)->map(function($category) {
            return [
                'name' => $category['name'],
                'count' => $category['count'],
                'icon' => $this->getCategoryIcon($category['name']),
            ];
        })->toArray();
    }

    // Category icon
    private function getCategoryIcon($categoryName)
    {
        $icons = [
            'Laravel' => 'fab fa-laravel',
            'PHP' => 'fab fa-php',
            'JavaScript' => 'fab fa-js-square',
            'React' => 'fab fa-react',
            'CSS' => 'fab fa-css3-alt',
            'API' => 'fas fa-server',
            'Docker' => 'fab fa-docker',
            'Tutorial' => 'fas fa-graduation-cap',
            'Frontend' => 'fas fa-desktop',
            'Backend' => 'fas fa-database',
            'HTML5' => 'fab fa-html5',
            'TailwindCSS' => 'fas fa-wind',
            'Python' => 'fab fa-python',
            'Flutter' => 'fas fa-mobile-alt',
            'Java' => 'fab fa-java',
            'git' => 'fab fa-git-alt',
        ];

        return $icons[$categoryName] ?? 'fas fa-tag';
    }

    // Display single blog post
    public function show($slug)
    {
        $post = $this->getBlogPostBySlug($slug);
        $relatedPosts = $this->getRelatedPosts($post);

        if (!$post) {
            abort(404);
        }

        return view('blog', compact('post', 'relatedPosts'));
    }

    // Get all blog posts
    private function getBlogPosts()
    {
        return BlogPost::where('status', 'published')
                       ->where('published_at', '<=', now())
                       ->orderBy('views', 'desc')
                       ->get();
    }

    // Get blog post categories from database
    private function getCategories()
    {
        $categories = BlogPost::where('status', 'published')
                             ->groupBy('category')
                             ->selectRaw('category, count(*) as count')
                             ->get();
        
        $result = [
            ['key' => 'all', 'name' => 'All Posts', 'count' => BlogPost::where('status', 'published')->count()]
        ];
        
        foreach ($categories as $category) {
            $result[] = [
                'key' => $category->category,
                'name' => $category->category,
                'count' => $category->count
            ];
        }
        
        return $result;
    }

    // Get featured blog post
    private function getFeaturedPost()
    {
        $featuredPost = BlogPost::where('featured', true)
                               ->where('status', 'published')
                               ->orderBy('published_at', 'desc')
                               ->first();
                               
        if (!$featuredPost) {
            $featuredPost = BlogPost::where('status', 'published')
                                   ->orderBy('published_at', 'desc')
                                   ->first();
        }
        return $featuredPost ?: null;
    }

    // Get blog post by slug
    private function getBlogPostBySlug($slug)
    {
        $posts = $this->getBlogPosts();
        foreach ($posts as $post) {
            if ($post['slug'] === $slug) {
                return $post;
            }
        }
        return null;
    }

    // Get related posts
    private function getRelatedPosts($currentPost)
    {
        $posts = $this->getBlogPosts();
        $related = [];

        foreach ($posts as $post) {
            if ($post['id'] !== $currentPost['id']) {
                // Check if posts share categories or tags
                $sharedCategories = array_intersect($post['categories'], $currentPost['categories']);
                $sharedTags = array_intersect($post['tags'], $currentPost['tags']);
                
                if (!empty($sharedCategories) || !empty($sharedTags)) {
                    $related[] = $post;
                }
            }
        }

        return array_slice($related, 0, 3);
    }

    // Newsletter subscription
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        // Future: Save to database or send to email service
        // For now, just return success response
        
        return response()->json([
            'success' => true,
            'message' => 'Thank you for subscribing to our newsletter!'
        ]);
    }
}