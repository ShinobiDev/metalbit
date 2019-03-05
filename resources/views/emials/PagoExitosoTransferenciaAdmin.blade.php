@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, hemos registrado la confirmación de una venta en {{config('app.name')}}, a través de una transferencia bancaria.


##Datos Vendedor##
# Usuario : 
	{{$ad[0]->name}}
# Teléfono: 
	{{$ad[0]->phone}}
# Email: 
	{{$ad[0]->email}}

##Datos Comprador##
# Usuario : 
	{{$ad[1]->name}}
# Teléfono: 
	{{$ad[1]->phone}},
# Email: 
	{{$ad[1]->email}},

## Resumen Oferta ##

# Número de transacción
#{{$ad[2]->transactionId}}

#Estado transacción: Confirmada con entidad bancaria

@component('mail::table')
    | tipo | cantidad criptomoneda | criptomoneda |  valor compra | divisa | 
    |:----------|:----------|:----------|:----------|:----------|
    | {{$ad[2]->tipo_anuncio}} | {{$ad[2]->transactionQuantity}} | {{$ad[2]->nombre_cripto_moneda}} | ${{number_format($ad[2]->transaction_value_pagado,0,',','.')}} | {{$ad[2]->nombre_moneda}} | 
@endcomponent



#[Ver transacciones][1]
[1]:{{$ad[3]['url']}}



Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent
