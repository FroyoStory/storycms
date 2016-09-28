<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table    = 'settings';
    protected $fillable = ['key', 'value', 'type'];

    protected $shadow_column = [
        ['key' => 'title', 'type' => 'blog'],
        ['key' => 'description', 'type' => 'blog'],
        ['key' => 'facebook', 'type' => 'blog'],
        ['key' => 'twitter', 'type' => 'blog'],
        ['key' => 'instagram', 'type' => 'blog'],
        ['key' => 'youtube', 'type' => 'blog'],
        ['key' => 'active_theme', 'type' => 'theme'],
    ];

    public function saveKey($key, $type, $value)
    {
        $this->updateOrCreate([
            'key'  => $key,
            'type' => $type,
        ], [
            'key'   => $key,
            'type'  => $type,
            'value' => $value,
        ]);
    }
}
