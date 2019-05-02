@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, se ha registrado un cambio en tu criptomoneda y actualmente no se encuentra activa, hemos desactivado el anuncio para que no tengas inconvenientes con tus clientes

Recuerda comunicarte con nosotros para bridarte más información, visita nuesto sitio web

@component('mail::button', ['url' => url('http://metalbit.co/')])
 Ir a la web
@endcomponent

## Resumen Oferta ##
Anuncio:

@component('mail::table')
    | tipo | criptomoneda | divisa |
    |:--------|:----------|
    | {{$ad->tipo_anuncio}} | {{$ad->nombre_cripto_moneda}} | {{$ad->nombre_moneda}} |
@endcomponent

Estado: INACTIVO

Recuerda que debes tener saldo en la cuenta de recargas para que los usuarios puedan
ver tus datos de contacto.

## BALANCE DE RECARGA $ {{number_format($recarga,0,',','.')}} ##

#[Recargar][1]
[1]:{{$url}}


Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent
