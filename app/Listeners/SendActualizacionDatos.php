<?php

namespace App\Listeners;

use App\Events\ActualizacionDatos;
use Illuminate\Support\Facades\Mail;
Use App\Mail\ActualizacionDatosMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;




class SendActualizacionDatos
{

    /**
     * Handle the event.
     *
     * @param  ActualizacionDatos  $event
     * @return void
     */
    public function handle(ActualizacionDatos $event)
    {   
        //dd($event->new_email);
        $url=trim(config("app.url")."/confirmar_cambio_email/".$event->user->id."/".$event->new_email);
        //dd($url);
        Mail::to($event->new_email)->queue(

          new ActualizacionDatosMail($event->user,$url)
        );



    }
}
