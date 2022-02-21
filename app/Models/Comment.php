<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\LatestScope;
use App\Traits\Taggable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Builder;

class Comment extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Taggable;

    protected $hidden = [
        'deleted_at',
        'commentable_type',
        'commentable_id',
        'user_id',
    ];

    protected $with = [
        'user',
        'user.image',
    ];

    protected $fillable = [
        'user_id',
        'content',
    ];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeLatest(Builder $query)
    {
        return $query->orderBy(static::CREATED_AT, 'desc');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function (Comment $comment) {
            if($comment->commentable_type === BlogPost::class) {
                Cache::tags(['blog-post'])->forget("blog-post-{$comment->commentable_id}");
                Cache::tags(['blog-post'])->forget('mostCommented');
            }
        });
        // static::addGlobalScope(new LatestScope);
    }
}
