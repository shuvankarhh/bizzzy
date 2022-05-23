<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractFeedback extends Model
{
    use HasFactory;

    protected $fillable = ['contract_id', 'user_id', 'feedback_one', 'feedback_two', 'feedback_three', 'feedback_four', 'feedback_five', 'feedback_six'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
