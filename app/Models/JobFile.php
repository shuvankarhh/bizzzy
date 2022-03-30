<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobFile extends Model
{
    use HasFactory;

    protected $fillable = ['job_id', 'file_name', 'file_location_type'];
}
