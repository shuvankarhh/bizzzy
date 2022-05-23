<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class VerificationRequest extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'approved_at', 'attachment', 'admin_id', 'status', 'note'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function email()
    {
        return $this->belongsTo(Email::class, 'account_email_id');
    }
}