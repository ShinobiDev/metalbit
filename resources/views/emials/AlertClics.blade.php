@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, tu saldo de recarga se esta agotando.

Recuerda que debes tener saldo en tu cuenta de recargas para que
los usurarios puedan ver tus datos de contacto.

## BALANCE DE RECARGA $ {{number_format($recarga,0,',','.')}} ##

#[Recargar][1]
[1]:{{$url}}

Gracias,<br>
{{ config('app.name') }}
@endcomponent
