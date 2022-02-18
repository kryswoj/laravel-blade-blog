<?php

namespace App\Observers;

use App\Models\BlogPost;
use Illuminate\Support\Facades\Cache;

class BlogPostObserver
{
    /**
     * Handle the BlogPost "created" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function created(BlogPost $blogPost)
    {
        //
    }

    public function updating(BlogPost $blogPost)
    {
        Cache::tags(['blog_posts'])->forget("blog-post-{$blogPost->id}");
    }

    public function deleting(BlogPost $blogPost)
    {
        $blogPost->image()->delete();
        Cache::tags(['blog_posts'])->forget("blog-post-{$blogPost->id}");
    }

    /**
     * Handle the BlogPost "restored" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function restoring(BlogPost $blogPost)
    {

        $blogPost->comments()->restore();

    }

    /**
     * Handle the BlogPost "force deleted" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function forceDeleted(BlogPost $blogPost)
    {
        //
    }
}
