@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, hemos registrado un deseo de compra en {{config('app.name')}}.


## Datos vendedor##

#Nombre: {{$ad[0]->name}}

#Teléfono: {{$ad[0]->phone}}

#Correo electrónico: {{$ad[0]->email}}

## Resumen Oferta ##

# Número de transacción
#{{$ad[2]->transactionId}}


@component('mail::table')
    | tipo | cantidad criptomoneda | criptomoneda |  valor compra | divisa | 
    |:----------|:----------|:----------|:----------|:----------|
    | {{$ad[1]->tipo_anuncio}} | {{$ad[2]->transactionQuantity}} | {{$ad[1]->nombre_cripto_moneda}} | ${{number_format($ad[2]->transaction_value_pagado,0,',','.')}} | {{$ad[1]->nombre_moneda}} | 
@endcomponent

#Presiona este link para ver la certificación bancaria donde podrás realizar el pago de tu compra en {{config('app.name')}}

#[MEDIO DE PAGO][1]
[1]:{{$ad[3]['medio_pago']}}	

## Resumen Oferta ##
Anuncio:
Estado: PENDIENTE PAGO

#[Ver compra][2]
[2]:{{$ad[3]['url']}}

Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent
