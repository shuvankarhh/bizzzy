<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HUser extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'h_id',
        'name',
        'email',
        'username',
        'acting_status',
        'h_created_by_user',
        'h_created_at',
        'h_crud_operation',
        'password'
    ];
}
