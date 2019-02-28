<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificationMail extends Mailable
{

  public $user;
  public $ad;
  public $recarga;
  public $tipo;
  public $url;


    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $ad, $recarga,$tipo,$url)
    {
       //dd([$user, $ad, $recarga,$tipo,$url]);
       $this->user = $user;
       $this->ad = $ad;
       $this->recarga = $recarga;
       $this->tipo = $tipo;
       $this->url = $url;
       //dd($this);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //dd($this->tipo);
        switch ($this->tipo) {
            case 'AnuncioCreado':
                return $this->markdown('emials.AnuncioCreado')
                            ->subject('Has creado un nuevo anuncio en '. config('app.name'));
                # code...
                break;
            case 'AnuncioCreadoAdmin':
                //dd($this->ad[0]->tipo_anuncio,$this->ad[0]->nombre_cripto_moneda,$this->ad[0]->nombre_moneda,$this->ad[0]->estado_anuncio);
                return $this->markdown('emials.AnuncioCreadoAdministrador')
                            ->subject('Se ha creado un nuevo anuncio en '. config('app.name'));
                # code...
                break;
            case 'AnuncioClickeado':
                return $this->markdown('emials.ClicAnuncio')
                            ->subject( 'Tu anuncio ha sido clickeado '. config('app.name'));
                # code...
                break;
             case 'AnuncioClickeadoCliente':
                return $this->markdown('emials.ClicAnuncioCliente')
                            ->subject( 'Información del  anuncio que has visto en '. config('app.name'));
                # code...
                break;    
            case 'AnuncioHabilitado':
                return $this->markdown('emials.AnuncioActivado')
                            ->subject('Tu anuncio ha sido activado en '. config('app.name'));
                # code...
                break;
            case 'AnuncioDeshabilitado':
                return $this->markdown('emials.AnuncioDesactivado')
                            ->subject('Tu anuncio ha sido desactivado en '. config('app.name'));
                # code...
                break;
            case 'AnuncioBloqueado':
                //dd($this);
                return $this->markdown('emials.AnuncioDesactivado')
                            ->subject('Tu anuncio ha sido bloqueado en '. config('app.name'));
                # code...
                break;
            case 'RecargaAgotada':
                return $this->markdown('emials.RecargaAgotada')
                            ->subject('Tu recarga se esta agotando en '. config('app.name'));
                # code...
                break;
            case 'RecargaCasiAgotada':
                return $this->markdown('emials.RecargaAgotada')
                            ->subject('Tu recarga ya casi se  agota en '. config('app.name'));
                # code...
                break;
            case 'RecargaExitosa':
                return $this->markdown('emials.RecargaExitosa')
                            ->subject($this->user->name.', hemos registrado una nueva recarga en '. config('app.name'));
                # code...
                break;
            case 'RecargaPendiente':
                return $this->markdown('emials.RecargaPendiente')
                            ->subject('Hemos registrado una nueva recarga, solo falta que la confirmes  '. config('app.name'));
                # code...
                break;
            case 'RecargaRechazada':
                return $this->markdown('emials.RecargaRechazada')
                            ->subject('Hemos registrado una nueva recarga, sin embargo se ha rechazado '. config('app.name'));
                # code...
                break;
            case 'CompraExitosa':
                return $this->markdown('emials.CompraExitosa')
                            ->subject('Hemos registrado una nueva compra en '. config('app.name'));
                # code...
                break;
            case 'CompraExitosaAnunciante':
               //dd($this);
                return $this->markdown('emials.CompraExitosaAnunciante')
                            ->subject('Hemos registrado una nueva compra para tu anuncio  en '. config('app.name'));
                # code...
                break;    
            case 'CompraPendiente':
                return $this->markdown('emials.CompraPend')
                            ->subject('Hemos registrado una nueva compra, solo falta que la confirmes '. config('app.name'));
                # code...
                break;
            case 'CompraRechazada':
                return $this->markdown('emials.CompraRechazada')
                            ->subject('Hemos registrado una nueva compra, pero esta ha sido rechazada '. config('app.name'));
                # code...
                break;    
            case 'CompraPendienteAnunciante':
                return $this->markdown('emials.CompraPendienteAnunciante')
                            ->subject('Hemos registrado una nueva compra en uno de tus anuncios '. config('app.name'));
                # code...
                break;    
            case 'CriptoMonedaInhabilitada':
                return $this->markdown('emials.AlertAdNoHabilitada')
                            ->subject('Uno de tus anuncios ha presentado una falla '. config('app.name'));
                # code...
                break;
            case 'WalletRegistrado':

                return $this->markdown('emials.WalletRegistrado')
                            ->subject('Un reciente comprador ha registrado un wallet '. config('app.name'));
                # code...
                break;
            case 'HashRegistrado':
                //dd($this);
                return $this->markdown('emials.HashRegistrado')
                            ->subject('Un vendedor ha registrado el hash de la transacción de criptomonedas  '. config('app.name'));
                # code...
                break;   
            case 'TransaccionConfirmadaAdmin':
                //dd($this->ad[0]->email,$this->ad[1]->email);
                return $this->markdown('emials.TransaccionConfirmadaAdmin')
                            ->subject('Se ha confirmado una venta de criptomonedas  en '. config('app.name'));
                # code...
                break;     
            case 'TransaccionConfirmadaVendedor':
                //dd($this->ad[2]);
                return $this->markdown('emials.TransaccionConfirmadaVendedor')
                            ->subject('Un comprador ha confirmado una transacción en  '. config('app.name'));
                # code...
                break;    
            case 'NotificarPagoAnunciante':
                //dd($this->ad[2]);
                return $this->markdown('emials.NotificarPagoAnunciante')
                            ->subject('Tu pago esta listo en '. config('app.name'));
                
                break;
            case 'NotificarPagoAdministrador':
                //dd($this);
                    return $this->markdown('emials.NotificarPagoAdministrador')
                            ->subject('Un anunciante ha confirmado un pago hecho por '.config('app.name'));
                    break;    
            case "TransaccionFinalizadaAutomaticamenteAdministrador":

                    return $this->markdown('emials.TransaccionConfirmadaAutomaticamenteAdministrador')
                            ->subject('Se ha cerrado una transacción automaticamente '.config('app.name'));


                    break;       
            case "TransaccionFinalizadaAutomaticamenteComerciante":
                    //dd($this->ad);
                    return $this->markdown('emials.TransaccionConfirmadaAutomaticamenteVendedor')
                            ->subject('Se ha cerrado una transacción automaticamente '.config('app.name'));


                    break; 
            case "PagoTransaccion":
                    //dd($this->ad[3]['medio_pago']);
                    return $this->markdown('emials.PagoTransferencia')
                            ->subject('Información de tu medio de pago para compra en '.config('app.name'));


                    break;
            case "PagoEfectivo":
                    //dd($this);
                    return $this->markdown('emials.PagoEnOficina')
                            ->subject('Información de tu medio de pago para compra en '.config('app.name'));


                    break;     
            case "ConfirmarTransferenciaBancaria":
                    //dd($this);
                    return $this->markdown('emials.PagoTransferenciaAdmin')
                            ->subject('Un comprador ha confirmado una transacción bancaria en '.config('app.name'));


                    break;  
            case "ConfirmarPagoExitosoTransferenciaBancaria":
                    //dd($this);
                    return $this->markdown('emials.PagoExitosoTransferenciaAdmin')
                            ->subject('Se ha confirmado una transacción bancaria en '.config('app.name'));


                    break;  
            case "ConfirmarPagoExitosoPagoEnOficina":
                    //dd($this);
                    return $this->markdown('emials.PagoExitosoEnOficina')
                            ->subject('Se ha confirmado un pago en efectivo en '.config('app.name'));


                    break;          

            
                                             
            default:
                //dd($this->tipo);
                # code...
                break;
        }

    }
}
