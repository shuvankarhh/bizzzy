<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobProposal extends Model
{
    use HasFactory;

    protected $fillable = ['job_id', 'user_id', 'price_type', 'price', 'description', 'project_time'];
}
