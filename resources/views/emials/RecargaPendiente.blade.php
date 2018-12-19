@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, Se ha realizado una nueva recarga Pendiente.

Recarga pendiente por valor: {{$recarga[1]['valor']}}  {{$recarga[1]['fecha']}}, solo falta que realices el pago


## Resumen Oferta ##
Anuncio:
Estado: PENDIENTE DE APROBACION

Recuerda que debes tener saldo en la cuenta de recargas para que los usuarios puedan
ver tus datos de contacto.

## BALANCE DE RECARGA {{$recarga[0]->valor}} ##

#[Recargar][1]
[1]:{{$url}}#


Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent
