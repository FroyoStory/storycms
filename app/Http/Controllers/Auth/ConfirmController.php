<?php

namespace App\Http\Controllers\Auth;

use App\Events\Auth\UserConfirmEvent;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Mail;

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

    public function resend(Request $request)
    {
        $user = User::where('email', $request->input('email'))
            ->whereNull('confirm_at')
            ->first();

        if ($user) {
            Mail::to($user)->send(new \App\Mail\Auth\EmailRegistered($user));
            session()->flash('message', 'Please check your email for confirmation');
        } else {
            session()->flash('alert', 'Unable to find your email');
        }

        return redirect()->back();
    }
}
