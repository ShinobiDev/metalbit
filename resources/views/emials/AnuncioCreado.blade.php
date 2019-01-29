@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, Has creado un nuevo anuncio en METALBIT


## Resumen Oferta ##
Anuncio:

@component('mail::table')
    | tipo | cripto moneda | divisa | estado |
    |:--------|:----------|
    | {{$ad->tipo_anuncio}} | {{$ad->nombre_cripto_moneda}} | {{$ad->nombre_moneda}} | {{$ad->estado_anuncio}} |
@endcomponent

Recuerda que debes tener saldo en la cuenta de recargas para que los usuarios puedan
ver tus datos de contacto.

## BALANCE DE RECARGA $ {{format_number($recarga,0,',','.')}} ##


#[Recargar][1]
[1]:{{$url}}#



Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent
