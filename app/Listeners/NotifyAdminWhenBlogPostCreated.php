<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\BlogPost;
use App\Events\BlogPostPosted;
use App\Mail\BlogPostAdded;
use App\Models\User;
use App\Jobs\ThrottledMail;

class NotifyAdminWhenBlogPostCreated
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(BlogPostPosted $event)
    {
        User::thatIsAnAdmin()
            ->get()
            ->map(function (User $user) {
                ThrottledMail::dispatch(
                    new BlogPostAdded(),
                    $user
                );
            });
    }
}
