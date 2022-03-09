<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    protected $fillable = ['email'];    

    public function userEmail()
    {
        return $this->hasOne(UserEmail::class);
    }
}
