@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, Has desactivado este anuncio en METALBIT


## Resumen Oferta ##
Anuncio:

@component('mail::table')
    | tipo | cripto moneda | divisa |
    |:--------|:----------|
    | {{$ad->tipo_anuncio}} | {{$ad->nombre_cripto_moneda}} | {{$ad->nombre_moneda}} |
@endcomponent

Estado: INACTIVO

Recuerda que debes tener saldo en la cuenta de recargas para que los usuarios puedan
ver tus datos de contacto.

## BALANCE DE RECARGA {{$recarga}} ##

#[Recarga][1]
[1]:{{$url}}#


Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent
