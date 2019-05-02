@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, han visto tu anuncio en {{config('app.name')}}

# Cliente : 
 {{$ad[1]->name}}
# Teléfono: 
 {{$ad[1]->phone}},
# Email: 
 {{$ad[1]->email}},

## Resumen Oferta ##
Anuncio:

@component('mail::table')
    | tipo | criptomoneda | divisa | estado |
    |:--------|:----------|
    | {{$ad[0]->tipo_anuncio}} | {{$ad[0]->nombre_cripto_moneda}} | {{$ad[0]->nombre_moneda}} | {{$ad[0]->estado_anuncio}} |
@endcomponent

## BALANCE DE RECARGA $ {{number_format($recarga,0,',','.')}} ##

#[Recargar][1]
[1]:{{$url}}

  No dejes agotar tu recarga, para que puedan seguir viendo tu anuncio.


Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent
