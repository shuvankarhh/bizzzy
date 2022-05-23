<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobProposal extends Model
{
    use HasFactory;

    protected $fillable = ['job_id', 'user_id', 'price_type', 'price', 'description', 'project_time'];   

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

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function proposal_files()
    {
        return $this->hasMany(JobProposalFile::class);
    }
}
