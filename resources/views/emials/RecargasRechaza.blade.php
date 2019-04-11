@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, se ha rechazado una recarga.

Recarga rechazada por valor: $ {{$recarga[1]['valor']}}  {{$recarga[1]['fecha']}}, intenta nuevamente o comunícate la entidad que seleccionaste para realizar la recarga.


## Resumen Oferta ##
Anuncio:
Estado: RECHAZADA

Recuerda que debes tener saldo en la cuenta de recargas para que los usuarios puedan
ver tus datos de contacto.


## BALANCE DE RECARGA $ {{number_format($recarga[0]->valor,0,',','.')}} ##

#[Recargar][1]
[1]:{{$url}}


Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent