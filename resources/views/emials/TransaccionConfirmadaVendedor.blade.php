@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, hemos registrado la confirmación de una venta en {{config('app.name')}}

##Datos Comprador##
# Usuario : 
	{{$ad[0]->name}}
# Teléfono: 
	{{$ad[0]->phone}},
# Email: 
	{{$ad[0]->email}},

## Resumen Oferta ##



@component('mail::table')
    | tipo | cantidad criptomoneda | criptomoneda |  valor compra | divisa | 
    |:----------|:----------|:----------|:----------|:----------|
    | {{$ad[1]->tipo_anuncio}} | {{$ad[1]->transactionQuantity}} | {{$ad[1]->nombre_cripto_moneda}} | ${{number_format($ad[0]->transation_value,0,',','.')}} | {{$ad[1]->nombre_moneda}} | 
@endcomponent




#[Ver venta][1]
[1]:{{$ad[2]['url']}}


Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent
