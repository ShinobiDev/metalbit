<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NotificacionAnuncio
{
    use Dispatchable, SerializesModels;



    public $user;
    public $ad;
    public $recarga;
    public $tipo;
    
      public function __construct($user,$ad, $recarga,$tipo)
    {   
        //dd($tipo);
        $this->user = $user;
        $this->ad = $ad;
        $this->recarga = $recarga;
        $this->tipo = $tipo;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */

}
