@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, hemos registrado una nueva venta de un anuncio en METALBIT, sin  embargo aún esta pendiente por el pago del comprador

##Datos del comprador 

#Nombre: {{$ad[0]->name}}

#Teléfono: {{$ad[0]->phone}}

#Correo electrónico: {{$ad[0]->email}}

## Resumen Oferta ##

@component('mail::table')
    | tipo | cantidad criptomoneda | criptomoneda |  valor compra | divisa | 
    |:----------|:----------|:----------|:----------|:----------|
    | {{$ad[1]->tipo_anuncio}} | {{$ad[2]->transactionQuantity}} | {{$ad[1]->nombre_cripto_moneda}} | ${{$ad[2]->transation_value}} | {{$ad[1]->nombre_moneda}} | 
@endcomponent


@if($ad[2]->code_wallet=="" && $ad[2]->image_wallet=="")
	## Esta pendiente el registro del código wallet, por parte del comprador una vez este realice el debido registro, te informaremos para que puedas hacer la transacción ##
@endif


Recuerda que debes tener saldo en la cuenta de recargas para que los usuarios puedan
ver tus datos de contacto.

## BALANCE DE COMPRA $ {{number_format($recarga,0,',','.')}} ##


#[Sitio web][1]
[1]:{{$url}}



Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent
