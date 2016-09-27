<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Purwandi\Responder\Transformable;

class Post extends Model implements Transformable
{
    protected $table    = 'posts';
    protected $fillable = [
        'title', 'slug', 'markdown', 'html', 'is_featured', 'is_page', 'status',
        'visibility', 'meta_title', 'meta_description', 'author_id', 'published_at',
    ];

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($post) {
            $post->slug       = $post->slug ?: str_slug($post->title);
            $post->status     = $post->status ?: 'draft';
            $post->visibility = $post->visibility ? 'private' : 'public';
        });
    }

    public static function transformer()
    {
        return \App\Transformers\PostTransformer::class;
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
