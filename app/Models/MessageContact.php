<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageContact extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'last_interaction' => "datetime:Y-m-d H:i:s",
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'contact_id');
    }
}
