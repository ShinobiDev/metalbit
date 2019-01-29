@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, Se ha realizado una nueva recarga exitosa.

Recarga Exitosa por valor: {{$recarga[1]['valor']}}  {{$recarga[1]['fecha']}}


## Resumen Oferta ##
Anuncio:
Estado: APROBADA

Recuerda que debes tener saldo en la cuenta de recargas para que los usuarios puedan
ver tus datos de contacto.


##NUEVO BALANCE DE RECARGA $ {{format_number($recarga[0]->valor,0,',','.')}} ##

#[Recargar][1]
[1]:{{$url}}#




Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent
