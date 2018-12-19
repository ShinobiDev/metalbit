<?php

namespace App\Listeners;

use App\Events\NotificacionAnuncio;
use Illuminate\Support\Facades\Mail;
Use App\Mail\NotificationMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;




class SendNotification
{
  
    /**
     * Handle the event.
     *
     * @param  UserWasCreated  $event
     * @return void
     */
    public function handle(NotificacionAnuncio $event)
    {   
        $url = "";
        
            if(Auth()->user()!=null){
                $url.="http://metalbit.co/core/users/".trim($event->user->id);
            }else{
                $url.="http://metalbit.co/core/login/";

            }
        //dd($url);    
        Mail::to($event->user->email)->queue(
          //dd($event)  
          new NotificationMail($event->user, $event->ad,$event->recarga,$event->tipo,$url)
        );



    }
}
