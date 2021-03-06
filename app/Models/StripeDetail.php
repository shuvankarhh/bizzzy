<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StripeDetail extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'status', 'amount_to_verify'];
}
