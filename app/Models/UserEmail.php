<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEmail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'email_id',
        'verification_token',
        'acting_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
