@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, has creado un nuevo anuncio en {{config('app.name')}}, tu anuncio sera verificado para garantizar que cumplas nuestras politicas de uso, una vez termine este proceso se publicara dicho anuncio.


## Resumen Oferta ##
Anuncio:

@component('mail::table')
    | tipo | cripto moneda | divisa | estado |
    |:--------|:----------|
    | {{$ad->tipo_anuncio}} | {{$ad->nombre_cripto_moneda}} | {{$ad->nombre_moneda}} | {{$ad->estado_anuncio}} |
@endcomponent

Recuerda que debes tener saldo en la cuenta de recargas para que los usuarios puedan
ver tus datos de contacto.

## BALANCE DE RECARGA $ {{number_format($recarga,0,',','.')}} ##


#[Recargar][1]
[1]:{{$url}}



Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent
