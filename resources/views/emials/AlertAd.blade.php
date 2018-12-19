@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, Tus clic se esta agotando

## BALANCE DE RECARGA{{$recarga}} ##

#[Recarga][1]
[1]:{{$url}}#

Gracias,<br>
{{ config('app.name') }}
@endcomponent
