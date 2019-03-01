@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, tenemos buenas noticias, tu pago ya esta listo en 
{{config('app.name')}}, para la venta de tu anuncio, por favor confirmanos si recibiste el pago, recuerda que si pasados 3 (tres) días no has confirmado daremos por hecho que el pago fue exitoso.

## Resumen Oferta ##

# Número de transacción
#{{$ad[0]->transactionId}}


@component('mail::table')
    | tipo | cantidad criptomoneda | criptomoneda |  valor compra | divisa | 
    |:----------|:----------|:----------|:----------|:----------|
    | {{$ad[0]->tipo_anuncio}} | {{$ad[0]->transactionQuantity}} | {{$ad[0]->nombre_cripto_moneda}} | ${{number_format($ad[0]->transation_value,'0',',','.')}} | {{$ad[0]->nombre_moneda}} | 
@endcomponent

{{$ad[2]['mensaje']}}#


#[Ver venta][1]
[1]:{{$ad[1]['url']}}#



Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent
