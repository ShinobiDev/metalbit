@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, información del anuncio que haz visto en {{config('app.name')}}

# Usuario : 
 {{$ad[1]->name}}
# Teléfono: 
 {{$ad[1]->phone}}
# Email: 
 {{$ad[1]->email}}

## Resumen Oferta ##
Anuncio:

@component('mail::table')
    | tipo | criptomoneda | divisa | estado |
    |:--------|:----------|
    | {{$ad[0]->tipo_anuncio}} | {{$ad[0]->nombre_cripto_moneda}} | {{$ad[0]->nombre_moneda}} | {{$ad[0]->estado_anuncio}} |
@endcomponent

#[Ver anuncios][1]
[1]:{{$ad[2]['url']}}#

Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent
