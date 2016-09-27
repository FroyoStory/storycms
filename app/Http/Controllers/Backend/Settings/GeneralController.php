<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;

class GeneralController extends Controller
{
    public function index()
    {
        return view('backend.settings.general');
    }
}
