<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobTag extends Model
{
    use HasFactory;

    protected $fillable = ['job_id', 'tag_id'];

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
