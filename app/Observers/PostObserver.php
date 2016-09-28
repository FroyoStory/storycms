<?php

namespace App\Observers;

use App\Post;

class PostObserver
{
    public function creating(Post $post)
    {
        $post->slug       = $post->slug ?: str_slug($post->title);
        $post->status     = $post->status ?: 'draft';
        $post->visibility = $post->visibility ? 'private' : 'public';
    }
}
