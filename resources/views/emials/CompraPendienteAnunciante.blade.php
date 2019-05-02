@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, hemos registrado una nueva venta de un anuncio en METALBIT, sin  embargo aún esta pendiente por el pago del comprador

##Datos del comprador 

#Nombre: {{$ad[0]->name}}

#Teléfono: {{$ad[0]->phone}}

#Correo electrónico: {{$ad[0]->email}}

## Resumen Oferta ##

# Número de transacción
#{{$ad[2]->transactionId}}

@component('mail::table')
    | tipo | cantidad criptomoneda | criptomoneda |  valor compra | divisa | 
    |:----------|:----------|:----------|:----------|:----------|
    | {{$ad[1]->tipo_anuncio}} | {{$ad[2]->transactionQuantity}} | {{$ad[1]->nombre_cripto_moneda}} | ${{number_format($ad[2]->transation_value,0,',','.')}} | {{$ad[1]->nombre_moneda}} | 
@endcomponent


@if($ad[2]->code_wallet=="SIN REGISTRAR" && $ad[2]->image_wallet=="SIN REGISTRAR")
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
