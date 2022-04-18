<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractMilestone extends Model
{
    use HasFactory;

    protected $fillable = ['contract_id', 'name', 'deposit_amount', 'end_date', 'is_complete'];
}
