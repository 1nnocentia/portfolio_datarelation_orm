<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'level',
        'icon',
        'color',
        'experience_years',
        'proficiency',
        'status',
        'order'
    ];

    protected $casts = [
        'level' => 'integer',
        'experience_years' => 'integer',
        'proficiency' => 'integer',
        'order' => 'integer'
    ];

    /**
     * Get skills by category
     */
    public static function getByCategory($category)
    {
        return self::where('category', $category)
                   ->orderBy('order')
                   ->get();
    }

    /**
     * Get all categories
     */
    public static function getCategories()
    {
        return self::distinct('category')
                   ->pluck('category')
                   ->filter()
                   ->values();
    }

    /**
     * Get skills with high proficiency
     */
    public static function getExpert($minProficiency = 80)
    {
        return self::where('proficiency', '>=', $minProficiency)
                   ->orderBy('proficiency', 'desc')
                   ->get();
    }

    /**
     * Get skills for display on home page
     */
    public static function getForHomePage($limit = 8)
    {
        return self::where('status', 'active')
                   ->orderBy('proficiency', 'desc')
                   ->limit($limit)
                   ->get();
    }
}
