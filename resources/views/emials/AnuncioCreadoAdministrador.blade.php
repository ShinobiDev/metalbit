@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, se ha creado un nuevo anuncio en {{config('app.name')}}

## Anunciante ##
# Nombre:
	{{$ad[1]->name}}
# Correo:
	{{$ad[1]->email}}
# Teléfono:
	{{$ad[1]->phone}}
## Resumen Oferta ##
	
#Anuncio:

@component('mail::table')
    | tipo | cripto moneda | divisa | estado |
    |:--------|:----------|
    | {{$ad[0]->tipo_anuncio}} | {{$ad[0]->nombre_cripto_moneda}} | {{$ad[0]->nombre_moneda}} | {{$ad[0]->estado_anuncio}} |
@endcomponent


#[Ver anuncios sin publicar][1]
[1]:{{$ad[2]['url']}}



Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent
