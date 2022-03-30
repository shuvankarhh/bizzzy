<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPreferredLanguage extends Model
{
    use HasFactory;

    protected $fillable = ['job_id', 'language_code', 'proficiency_level'];
}
