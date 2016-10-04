<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('backend.team.index');
    }
}
