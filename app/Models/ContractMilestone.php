<?php

namespace App\Models;

use App\Models\Contract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContractMilestone extends Model
{
    use HasFactory;

    protected $fillable = ['contract_id', 'name', 'deposit_amount', 'end_date', 'is_complete'];

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}
