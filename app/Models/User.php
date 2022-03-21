<?php

namespace App\Models;

use App\Models\UserEducation;
use Laravel\Sanctum\HasApiTokens;
use App\Models\UserWorkExperience;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_name',
        'acting_status',
        'google_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function work_experiences()
    {
        return $this->hasMany(UserWorkExperience::class);
    }

    public function educations()
    {
        return $this->hasMany(UserEducation::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'user_skills');
    }

    public function freelance_profile()
    {
        return $this->hasOne(FreelancerProfile::class);
    }

    public function address()
    {
        return $this->hasOne(UserAddress::class);
    }

    public function languages()
    {
        return $this->hasMany(UserLanguage::class);
    }

    public function service_categories()
    {
        return $this->belongsToMany(Category::class, 'freelancer_profile_categories', 'profile_id', 'category_id');
    }
    
}
