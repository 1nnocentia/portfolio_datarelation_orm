<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'project_category_id',
        'technologies',
        'github_url',
        'demo_url',
        'featured',
        'status',
        'client',
        'start_date',
        'end_date',
        'budget',
        'views'
    ];

    protected $casts = [
        'technologies' => 'array',
        'featured' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
        'views' => 'integer'
    ];

    public function category(){
        return $this->belongsTo(ProjectCategory::class, 'project_category_id');
    }

    /**
     * Get projects by category
     */
    public static function getByCategory($category)
    {
        if ($category === 'all') {
            return self::all();
        }
        if (is_numeric($category)) {
            return self::where('project_category_id', (int) $category)->get();
        }

        return self::whereHas('category', function ($q) use ($category) {
            $q->where('category', $category);
        })->get();
    }

    /**
     * Get featured projects
     */
    public static function getFeatured($limit = 3)
    {
        return self::where('featured', true)->limit($limit)->get();
    }

    /**
     * Search projects
     */
    public static function search($query)
    {
        return self::where('title', 'like', "%{$query}%")
                   ->orWhere('description', 'like', "%{$query}%")
                   ->get();
    }

    /**
     * Get project by slug
     */
    public static function findBySlug($slug)
    {
        return self::where('slug', $slug)->with('category')->first();
    }

    /**
     * Increment view count
     */
    public function incrementViews()
    {
        $this->increment('views');
    }
}
