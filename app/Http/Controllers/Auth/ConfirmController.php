<?php

namespace App\Http\Controllers\Auth;

use App\Events\Auth\UserConfirmEvent;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class ConfirmController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function store($token)
    {
        $user = User::where('confirm_token', $token)
            ->whereNull('confirm_at')
            ->first();

        if ($user) {

            event(new UserConfirmEvent($user));

            Auth::login($user);

            return redirect('/');
        }

        return view('errors.503');
    }
}
