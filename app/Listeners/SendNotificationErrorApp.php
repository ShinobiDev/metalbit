<?php

namespace App\Listeners;

use App\Events\NotificacionError;
use Illuminate\Support\Facades\Mail;
Use App\Mail\NotificationError;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;




class SendNotificationErrorApp
{
  
    /**
     * Handle the event.
     *
     * @param  UserWasCreated  $event
     * @return void
     */
    public function handle(NotificacionError $event)
    {   
        Mail::to($event->user->email)->queue(            
          new NotificationError($event->user, $event->error)
        );



    }
}
