<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEducation extends Model
{
    use HasFactory;

    protected $table = 'user_educations';

    protected $fillable = ['institute_name', 'degree', 'area_of_study', 'currently_working', 'start_date', 'end_date', 'description'];

    public function getStartDateAttribute($value)
    {
        return new Carbon($value);
    }

    public function getEndDateAttribute($value)
    {
        return new Carbon($value);
    }

    
}
