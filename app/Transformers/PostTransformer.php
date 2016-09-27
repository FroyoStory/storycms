<?php

namespace App\Transformers;

use App\Post;
use League\Fractal\TransformerAbstract;

class PostTransformer extends TransformerAbstract
{
    public function transform(Post $post)
    {
        return [
            'id'               => $post->id,
            'title'            => $post->title,
            'slug'             => $post->slug,
            'markdown'         => $post->markdown,
            'html'             => $post->html,
            'is_featured'      => $post->is_featured === 1 ? true : false,
            'is_page'          => $post->is_page === 1 ? true : false,
            'visibility'       => $post->visibility ? 'public' : 'private',
            'meta_title'       => $post->meta_title,
            'meta_description' => $post->meta_description,
            'author_id'        => $post->author_id,
            'status'           => $post->status,
        ];
    }
}
