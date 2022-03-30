<?php

namespace App\Models;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'job_visibility', 'name', 'description', 'project_time', 'project_type', 'experience_level', 'price_type', 'price', 'hours_per_week', 'total_proposals', 'total_invitation_sent', 'average_rating', 'money_spent'];
    
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'price' => 'decimal:0',
    ];

    /**
     * Attribute casting from plain integers!
     * 
     * @return Mixed
     */

    public function getCreatedAtAttribute($value)
    {
        $date = new Carbon($value);
        return $date->diffForHumans();
    }
    
    public function getProjectTimeAttribute($value)
    {
        switch($value){ 
            case 1:
                return 'Less than 1 month';
            case 2:
                return '1 to 3 months';
            case 3:
                return '3 to 6 months';
            case 4:
                return 'More than 6 months';
        }
    }
    
    public function getExperienceLevelAttribute($value)
    {
        switch($value){
            case 1:
                return 'Entry';
            case 2:
                return 'Intermediate';
            case 3:
                return 'Expert';
        }
    }

    /**
     * All Eloquent Relationships
     * 
     * @return HasRealationship
     */

    public function tags()
    {
        return $this->hasMany(JobTag::class);
    }

    public function recruiter()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categories()
    {
        return $this->hasMany(JobCategory::class);
    }

    public function proposals()
    {
        return $this->belongsToMany(User::class, 'job_proposals', 'job_id', 'user_id');
    }

    /**
     * Will attempt later!
     */
    // public function applied()
    // {
    //     dd($this->attributes);
    //     return JobProposal::where('job_id', $this->attributes['id'])->where('user_id', auth()->id())->count();
    // }
}
