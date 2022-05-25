<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPendingBalance extends Model
{
    use HasFactory;

    protected $fillable = ['contract_id','contract_milestone_id','user_id','status','amount'];
}
