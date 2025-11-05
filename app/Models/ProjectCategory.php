<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProjectCategory extends Model
{
    protected $fillable = [
        'category',
        'slug'
    ];

    public $timestamps = true;

    public function projects()
    {
        return $this->hasMany(Project::class, 'project_category_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            $category->slug = Str::slug($category->category);
        });

        static::updating(function ($category) {
            $category->slug = Str::slug($category->category);
        });
    }

}
