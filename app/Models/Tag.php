<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function blogPosts()
    {
        // return $this->belongsToMany(BlogPost::class);
        return $this->morphedByMany(BlogPost::class, 'taggable')->withTimestamps();
    }

    public function comments()
    {
        // return $this->belongsToMany(BlogPost::class);
        return $this->morphedByMany(Comment::class, 'taggable')->withTimestamps();
    }
}
