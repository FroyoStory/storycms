<?php

namespace App;

use App\Observers\PostObserver;
use Illuminate\Database\Eloquent\Model;
use Purwandi\Responder\Transformable;

class Post extends Model implements Transformable
{

    const PUBLISHED = 'published';
    const DRAFT     = 'draft';

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

    /**
     * Transform post format
     *
     * @return \App\Transformers\PostTransformer
     */
    public static function transformer()
    {
        return \App\Transformers\PostTransformer::class;
    }

    /**
     * Author relationship
     *
     * @return \Illuminate\Database\Eloquent\Relation
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Category relationship
     *
     * @return \Illuminate\Database\Eloquent\Relation
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get related articles
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function related()
    {
        return $this->where('id', '!=', $this->id)->limit(5)->get();
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
