<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project_Category extends Model
{
    protected $fillable = [
        'category'
    ];

    public function projects()
    {
        return $this->hasMany(Project::class, 'project_category_id');
    }
}
