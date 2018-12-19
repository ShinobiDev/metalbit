<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CredencialesConsorcioTB extends Mailable
{

  public $user;
  public $password;
  

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $password)
    {
       $this->user = $user;
       $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emials.Credenciales-ConsorcioTB')
        ->subject('Credenciales de acceso a '. config('app.name'));
    }
}
