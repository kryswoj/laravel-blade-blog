<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\BlogPost;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'bio',
        'email',
        'job',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'email_verified_at',
        'created_at',
        'updated_at',
        'is_admin',
        'locale',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function blogPosts()
    {
        return $this->hasMany(BlogPost::class);
    }

    public function favouritePosts()
    {
        return $this->belongsToMany(BlogPost::class, 'user_favourite_posts')->with('mostRecentComment', 'tags', 'user');
    }

    public function isPostFavourite(BlogPost $post)
    {
        return $this->favouritePosts->contains($post);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function commentsOn()
    {
        return $this->morphMany(Comment::class, 'commentable')->with('user.image');
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }


    public function scopeWithMostBlogPosts(Builder $query)
    {
        return $query->withCount('blogPosts')->orderBy('blog_posts_count', 'desc');
    }

    public function scopeWithMostBlogPostsLastMonth(Builder $query)
    {
        return $query->withCount(['blogPosts' => function ($query) {
            $query->whereBetween(static::CREATED_AT, [now()->subMonth(), now()]);
        }])
            ->has('blogPosts', '>=', 2)
            ->orderBy('blog_posts_count', 'desc');
    }

    public function scopeThatHasCommentedOnPost(Builder $query, BlogPost $post)
    {
        return $query->whereHas('comments', function ($query) use ($post) {
            return $query
                ->where('commentable_id', $post->id)
                ->where('commentable_type', BlogPost::class);
        });
    }

    public function scopeThatIsAnAdmin(Builder $query)
    {
        return $query->where('is_admin', true);
    }
}
