<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table    = 'settings';
    protected $fillable = ['key', 'value', 'type'];

    public static $column = [
        'title', 'description', 'facebook', 'twitter', 'instagram', 'youtube', 'active_theme',
    ];
}
