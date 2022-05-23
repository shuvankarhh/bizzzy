<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = ['payment_type', 'price', 'service_charge_type', 'service_charge', 'paid_amount', 'is_fully_paid', 'end_date', 'contract_status', 'contract_confirmation_date', 'created_by_user', 'is_confirmed_by_client', 'is_confirmed_by_freelancer', 'job_id', 'freelancer_id', 'additional_message', 'hours_per_week'];

    /**
     * Accessors for Contract
     * 
     * @return Attribute
     */
    public function getContractStatusAttribute($value)
    {
        switch ($value) {
            case 1:
                return "Pending";
            case 2:
                return "Active";
            case 3:
                return "Ended";
            case 4:
                return "Paused";
            case 5:
                return "In Review";
        }
    }

    /**
     * Mutators for Contract
     * 
     * @return Attribute
     */
    public function setPaymentTypeAttribute($value)
    {
        if (strtolower($value) === 'fixed') {
            $this->attributes['payment_type'] = 1;
        } else {
            $this->attributes['payment_type'] = 2;
        }
    }

    /**
     * Contract Eloquent Relaitons
     * 
     * @return EloquentRelationships
     */
    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function milestones()
    {
        return $this->hasMany(ContractMilestone::class);
    }

    public function recruiter()
    {
        return $this->belongsTo(User::class, 'created_by_user');
    }

    public function freelancer()
    {
        return $this->belongsTo(User::class, 'freelancer_id');
    }

    public function feedback()
    {
        return $this->hasMany(ContractFeedback::class);
    }
}
