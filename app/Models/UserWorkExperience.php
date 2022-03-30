<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWorkExperience extends Model
{
    use HasFactory;

    protected $fillable = [ 'title', 'company', 'location', 'currently_working', 'start_date', 'end_date', 'description' ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}
