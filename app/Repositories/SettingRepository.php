<?php

namespace App\Repositories;

use App\Setting;
use InvalidArgumentException;

class SettingRepository
{

    public function create($key, $value, $type = null)
    {
        if (in_array($key, Setting::$column)) {
            Setting::updateOrCreate(compact('key'), compact('value', 'type'));
        }
    }

    public function collection()
    {
        return Setting::all();
    }

    public function __set($key, $value)
    {
        $item = $this->collection()->filter(function ($item) use ($key, $value) {
            return $item->key === $key;
        })->values()->first();

        if ($item) {
            $item->value = $value;
            return $item->save();
        } else {
            return $this->create($key, $value, '');
        }
    }

    public function __get($key)
    {
        $item = $this->collection()->filter(function ($item) use ($key) {
            return $item->key === $key;
        })->values()->first();

        if ($item) {
            return $item;
        }

        throw new InvalidArgumentException("The key " . $key . " is not exist", 1);
    }
}
