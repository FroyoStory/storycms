<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    public function index()
    {
        return view('backend.team.index');
    }
}
