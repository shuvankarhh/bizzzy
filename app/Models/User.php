<?php

namespace App\Models;

use App\Models\UserAccount;
use App\Models\UserEducation;
use App\Models\RecruiterProfile;
use Laravel\Sanctum\HasApiTokens;
use App\Models\UserWorkExperience;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

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

    public function portfolios()
    {
        return $this->hasMany(UserPortfolio::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function freelancerContracts()
    {
        return $this->hasMany(Contract::class, 'freelancer_id');
    }

    public function userAccount()
    {
        return $this->hasMany(UserAccount::class);
    }
    public function email()
    {
        return $this->belongsTo(Email::class, 'account_email_id');
    }

    public function recruiter_profile()
    {
        return $this->hasOne(RecruiterProfile::class);
    }

    public function verification_request()
    {
        return $this->hasOne(VerificationRequest::class);
    }

    public function stripe_detail()
    {
        return $this->hasOne(StripeDetail::class);
    }

    public function stripe_details()
    {
        return $this->hasMany(StripeDetail::class);
    }

    public function cards()
    {
        return $this->hasMany(PaymentCard::class);
    }

    public function user_balance()
    {
        return $this->hasOne(UserBalance::class);
    }

    public function withdraw_requests()
    {
        return $this->hasMany(WithdrawRequest::class);
    }
    
    public function user_pending_balance()
    {
        return $this->hasMany(UserPendingBalance::class);
    }

    public function isRecruiter()
    {
        $userAccount = $this->userAccount()->where('client_or_freelancer', 1)->first();
        if (is_null($userAccount)) {
            return false;
        }

        return true;
    }
}
