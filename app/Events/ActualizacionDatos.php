<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
/*
    |--------------------------------------------------------------------------
    | ActualizacionDatos
    |--------------------------------------------------------------------------
    |
    | Este evento tiene como finalidad generar una notificacion al correo electronico
    | que el usuario quiere registrar como nuevo para su implementación se debe
    | enviar los datos requeridos en este caso user y el nuevo correo 
    |
*/
class ActualizacionDatos
{
    use Dispatchable, SerializesModels;



    public $user;
    public $new_email;
    
    
    
      public function __construct($user,$new_email)
    {   
        //dd($tipo);
        $this->user = $user;
        $this->new_email = $new_email;
        
    
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */

}
