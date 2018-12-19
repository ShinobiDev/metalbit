<?php

namespace App\Listeners;

use App\Events\UserWasCreated;
use Illuminate\Support\Facades\Mail;
Use App\Mail\CredencialesConsorcioTB;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;




class SendLoginCredencials
{

    /**
     * Handle the event.
     *
     * @param  UserWasCreated  $event
     * @return void
     */
    public function handle(UserWasCreated $event)
    {
        Mail::to($event->user)->queue(
          new CredencialesConsorcioTB($event->user, $event->password)
        );



    }
}
