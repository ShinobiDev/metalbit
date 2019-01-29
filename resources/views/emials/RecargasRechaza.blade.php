@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, se ha rechazado una nueva recarga pendiente.

Recarga rechazada por valor: $ {{$recarga[1]['valor']}}  {{$recarga[1]['fecha']}}, intentanuevamente o comunicate la entidad que seleccionate para realizar la recarga


## Resumen Oferta ##
Anuncio:
Estado: RECHAZADA

Recuerda que debes tener saldo en la cuenta de recargas para que los usuarios puedan
ver tus datos de contacto.


## BALANCE DE RECARGA $ {{format_number($recarga[0]->valor,0,',','.')}} ##

#[Recargar][1]
[1]:{{$url}}#


Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent