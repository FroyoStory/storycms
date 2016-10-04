<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\SettingRepository;

class FrontController extends Controller
{
    protected $setting;
    protected $data = [];

    public function __construct(SettingRepository $setting)
    {
        $this->setting = $setting;
        $this->data    = [
            'theme' => $this->setting->activeTheme->value ?: 'default',
        ];
    }
}
