@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, hemos registrado el hash/id de una de tus compras, por favor verifica que la transacción se ha realizado correctamente.

##Datos Vendedor##
# Usuario :
  {{$ad[0]->name}}
# Teléfono: 
  {{$ad[0]->phone}},
# Email: 
  {{$ad[0]->email}}


## Resumen Oferta ##

# Número de transacción
#{{$ad[1]->transactionId}}

@component('mail::table')
    | tipo | cantidad criptomoneda | criptomoneda |  valor compra | divisa | 
    |:----------|:----------|:----------|:----------|:----------|
    | {{$ad[1]->tipo_anuncio}} | {{$ad[1]->transactionQuantity}} | {{$ad[1]->nombre_cripto_moneda}} | ${{number_format($ad[1]->transation_value,'0',',','.')}} | {{$ad[1]->nombre_moneda}} | 
@endcomponent


Recuerda que debes tener saldo en la cuenta de recargas para que los usuarios puedan
ver tus datos de contacto.


#[Ver compra][1]
[1]:{{$ad[2]['url']}}



Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent
