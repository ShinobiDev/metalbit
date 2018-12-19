<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ActualizacionDatosMail extends Mailable
{

  public $user;
  public $url;
  


    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $url)
    {
       //dd($this->tipo);
       $this->user = $user;
       $this->url = $url;
      
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       //dd($this->url);
       return $this->markdown('emials.ActualizacionDatos')
                            ->subject('Hemos registrado un cambio en tu correo');

    }
}