<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'category',
        'tags',
        'status',
        'featured',
        'published_at',
        'author_id',
        'views',
        'reading_time',
        'meta_title',
        'meta_description'
    ];

    protected $casts = [
        'tags' => 'array',
        'featured' => 'boolean',
        'published_at' => 'datetime',
        'views' => 'integer',
        'reading_time' => 'integer'
    ];

    /**
     * Get published posts
     */
    public static function getPublished()
    {
        return self::where('status', 'published')
                   ->where('published_at', '<=', Carbon::now())
                   ->orderBy('published_at', 'desc')
                   ->get();
    }

    /**
     * Get featured posts
     */
    public static function getFeatured($limit = 3)
    {
        return self::where('featured', true)
                   ->where('status', 'published')
                   ->limit($limit)
                   ->get();
    }

    /**
     * Get posts by category
     */
    public static function getByCategory($category)
    {
        return self::where('category', $category)
                   ->where('status', 'published')
                   ->orderBy('published_at', 'desc')
                   ->get();
    }

    /**
     * Search posts
     */
    public static function search($query)
    {
        return self::where('status', 'published')
                   ->where(function($q) use ($query) {
                       $q->where('title', 'like', "%{$query}%")
                         ->orWhere('content', 'like', "%{$query}%")
                         ->orWhere('excerpt', 'like', "%{$query}%");
                   })
                   ->orderBy('published_at', 'desc')
                   ->get();
    }

    /**
     * Get post by slug
     */
    public static function findBySlug($slug)
    {
        return self::where('slug', $slug)
                   ->where('status', 'published')
                   ->first();
    }

    /**
     * Get related posts
     */
    public function getRelatedPosts($limit = 3)
    {
        return self::where('id', '!=', $this->id)
                   ->where('category', $this->category)
                   ->where('status', 'published')
                   ->limit($limit)
                   ->get();
    }

    /**
     * Increment view count
     */
    public function incrementViews()
    {
        $this->increment('views');
    }

    /**
     * Get all categories
     */
    public static function getCategories()
    {
        return self::where('status', 'published')
                   ->distinct('category')
                   ->pluck('category')
                   ->filter()
                   ->values();
    }

    /**
     * Get popular posts
     */
    public static function getPopular($limit = 5)
    {
        return self::where('status', 'published')
                   ->orderBy('views', 'desc')
                   ->limit($limit)
                   ->get();
    }
}
