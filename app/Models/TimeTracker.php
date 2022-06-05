<?php

namespace App\Models;

use App\Models\Screenshot;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TimeTracker extends Model
{
    use HasFactory;

    public function screenshots()
    {
        return $this->hasMany(Screenshot::class);
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}
