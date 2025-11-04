<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'company',
        'position',
        'location',
        'type', // full-time, part-time, internship, freelance
        'start_date',
        'end_date',
        'current',
        'description',
        'responsibilities',
        'technologies',
        'achievements',
        'company_url',
        'company_logo'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'current' => 'boolean',
        'responsibilities' => 'array',
        'technologies' => 'array',
        'achievements' => 'array'
    ];

    /**
     * Get current experiences
     */
    public static function getCurrent()
    {
        return self::where('current', true)
                   ->orderBy('start_date', 'desc')
                   ->get();
    }

    /**
     * Get all experiences ordered by date
     */
    public static function getOrdered()
    {
        return self::orderBy('current', 'desc')
                   ->orderBy('start_date', 'desc')
                   ->get();
    }

    /**
     * Get experience duration
     */
    public function getDuration()
    {
        $start = Carbon::parse($this->start_date);
        $end = $this->current ? Carbon::now() : Carbon::parse($this->end_date);
        
        return $start->diffForHumans($end, true);
    }

    /**
     * Get experience by type
     */
    public static function getByType($type)
    {
        return self::where('type', $type)
                   ->orderBy('start_date', 'desc')
                   ->get();
    }

    /**
     * Get total experience in years
     */
    public static function getTotalExperience()
    {
        $experiences = self::all();
        $totalMonths = 0;
        
        foreach ($experiences as $exp) {
            $start = Carbon::parse($exp->start_date);
            $end = $exp->current ? Carbon::now() : Carbon::parse($exp->end_date);
            $totalMonths += $start->diffInMonths($end);
        }
        
        return round($totalMonths / 12, 1);
    }
}
