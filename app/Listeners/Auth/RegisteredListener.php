<?php

namespace App\Listeners\Auth;

use App\Mail\Auth\EmailRegistered;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class RegisteredListener implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     *
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $user = $event->user;

        Mail::to($user)->send(new EmailRegistered($user));
    }
}
