<?php

namespace App\Listeners\Auth;

use App\Events\Auth\UserConfirmEvent;
use App\Mail\Auth\EmailConfirmed;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class UserConfirmListener implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     *
     * @param  UserConfirmEvent  $event
     * @return void
     */
    public function handle(UserConfirmEvent $event)
    {
        $user = $event->user;

        Mail::to($user)->send(new EmailConfirmed($user));

        $user->confirm_at = Carbon::now();
        $user->save();

    }
}
