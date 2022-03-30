<?php

namespace App\Models;

use App\Models\Email;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function email()
    {
        return $this->belongsTo(Email::class);
    }
}
