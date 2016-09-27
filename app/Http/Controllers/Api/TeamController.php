<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;


class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return response()->json([
            'data' => [
                ['id' => 1, 'name' => 'Admin', 'email' => 'admin@admin.com']
            ],
            'meta' => [
                'code'    => 200,
                'message' => 'OK',
            ]
        ]);
    }
}
