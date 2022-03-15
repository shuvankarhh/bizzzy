<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FreelancerProfile extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'profile_completion_percentage', 'total_jobs', 'total_hours', 'job_success_percentage', 'average_rating', 'is_top_rated'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'freelancer_profile_categories', 'profile_id', 'category_id');
    }
}
