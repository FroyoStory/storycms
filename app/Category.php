<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Purwandi\Responder\Transformable;

class Category extends Model implements Transformable
{
    protected $table    = 'categories';
    protected $fillable = ['name', 'slug'];

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($category) {
            $category->slug = $category->slug ?: str_slug($category->name);
        });
    }

    public static function transformer()
    {
        return \App\Transformers\CategoryTransformer::class;
    }
}
