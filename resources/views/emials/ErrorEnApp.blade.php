@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad(@) {{$user->name}}, se ha presentado un error en la App por favor verifica los sucedido

Recuerda comunicarte con nosotros para bridarte más información, visita nuesto sitio web 

@component('mail::button', ['url' => url('http://metalbit.co/')])
 Ir a la web
@endcomponent

## Resumen Error ##
Anuncio:

@component('mail::table')
    | error |
    |:--------|
    | {{$ad}}  |
@endcomponent

Estado: ACTIVADO

Recuerda que debes tener saldo en la cuenta de recargas para que los usuarios puedan
ver tus datos de contacto.

## BALANCE DE RECARGA $ {{number_format($recarga,0,',','.')}} ##


#[Recarga][1]
[1]:{{$url}}#




Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent