<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonTimeZone;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['from', 'to', 'message', 'status'];

    public function getCreatedAtAttribute($value)
    {
        $date = new Carbon($value);
        $date->setTimezone(config('app.timezone'));
        if($date->format('d/m') == date('d/m')){
            return $date->format("h:i a");
        }else{
            return $date->format("d/m/Y h:i a");
        }
    }
}
