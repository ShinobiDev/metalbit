<?php

namespace App\Listeners;

use App\Events\CompartirCodigo;
use Illuminate\Support\Facades\Mail;
Use App\Mail\CompartirMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;




class SendShareMail
{
  
    /**
     * Handle the event.
     *
     * @param  UserWasCreated  $event
     * @return void
     */
    public function handle(CompartirCodigo $event)
    {   

      
            $cc=explode(",", $event->correos);
            //dd($cc);    
            $url= trim(config('app.url')."/register_landing/".$event->user->codigo_referido);
            foreach ($cc as $key => $value) {
                    # code...
                if(filter_var($value, FILTER_VALIDATE_EMAIL) ){
                     Mail::to($value)->queue(
                      //dd($event)  
                      new CompartirMail($event->user,$url)
                    );   
                }
                    
            }

            
        



    }
}
