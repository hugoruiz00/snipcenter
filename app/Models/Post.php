<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'body',
        'user_id',
        'post_status_id',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function currentUserVote()
    {
        return $this->hasOne(Vote::class)->latestOfMany();
    }
}
