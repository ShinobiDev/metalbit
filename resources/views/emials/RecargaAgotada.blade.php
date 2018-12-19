@component('mail::message')
# {{ config('app.name')}} #

![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, Tu saldo de recarga se ha agotado.


Recuerda que debes tener saldo en la cuenta de recargas para que los usuarios puedan
ver tus datos de contacto.

## BALANCE DE RECARGA {{$recarga}} ##

#[Recarga][1]
[1]:{{$url}}#
  No dejes agotar tu recarga, para que puedan seguir viendo tu anuncio.


Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent
