<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
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


    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_skill');
    }
}
