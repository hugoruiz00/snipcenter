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

    public function user()
    {
        return $this->belongsTo(User::class);   
    }

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
        return $this->hasOne(Vote::class)->where('user_id', auth()->id());
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('id', 'DESC');
    }
}
