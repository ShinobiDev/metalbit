<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CompartirMail extends Mailable
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
       //dd($this->error);
       return $this->markdown('emials.CompartirCodigoReferido')
                            ->from($this->user->email,$this->user->name)
                            ->subject('Quiero invitarte a participar en MetalBit ');

    }
}