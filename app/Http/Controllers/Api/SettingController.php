<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\SettingRepository;
use Illuminate\Http\Request;
use Responder;

class SettingController extends Controller
{

    protected $setting;

    public function __construct(SettingRepository $setting)
    {
        $this->setting = $setting;
    }

    public function store(Request $request)
    {
        $this->setting->create('title', $request->input('title'));
        $this->setting->create('description', $request->input('description'));
        $this->setting->create('facebook', $request->input('facebook'));
        $this->setting->create('twitter', $request->input('twitter'));
        $this->setting->create('instagram', $request->input('instagram'));
        $this->setting->create('youtube', $request->input('youtube'));
        $this->setting->create('active_theme', $request->input('active_theme'));

        return Responder::success('OK');
    }
}
