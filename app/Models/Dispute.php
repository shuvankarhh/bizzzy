<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispute extends Model
{
    use HasFactory;

    protected $fillable = ['contract_id', 'dispute_created_by', 'processed_by', 'description', 'status'];

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
    

}
