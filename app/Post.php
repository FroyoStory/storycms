<?php

namespace App;

use App\Observers\PostObserver;
use Illuminate\Database\Eloquent\Model;
use Purwandi\Responder\Transformable;

class Post extends Model implements Transformable
{
    protected $table    = 'posts';
    protected $fillable = [
        'title', 'slug', 'markdown', 'html', 'is_featured', 'is_page', 'status',
        'visibility', 'meta_title', 'meta_description', 'author_id', 'published_at',
        'category_id',
    ];

    protected static function boot()
    {
        parent::boot();
        static::observe(new PostObserver);
    }

    public static function transformer()
    {
        return \App\Transformers\PostTransformer::class;
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
