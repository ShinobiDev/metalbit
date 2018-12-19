<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificationError extends Mailable
{

  public $user;
  public $error;
  


    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $error)
    {
       //dd($this->tipo);
       $this->user = $user;
       $this->error = $error;
      
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       //dd($this->error);
       return $this->markdown('emials.ErrorApp')
                            ->subject('Algo pasa con tu app '. config('app.name'));

    }
}