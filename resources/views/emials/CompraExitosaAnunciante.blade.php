@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, hemos registrado una nueva venta de un anuncio en METALBIT

##Datos Comprador##
Usuario : {{$ad[0]->name}}
Teléfono: {{$ad[0]->phone}},
Email: {{$ad[0]->email}},


## Resumen Oferta ##



@component('mail::table')
    | tipo | cantidad criptomoneda | criptomoneda |  valor compra | divisa | 
    |:----------|:----------|:----------|:----------|:----------|
    | {{$ad[1]->tipo_anuncio}} | {{$ad[2]->transactionQuantity}} | {{$ad[1]->nombre_cripto_moneda}} | {{$ad[2]->transation_value}} | {{$ad[1]->nombre_moneda}} | 
@endcomponent

@if($ad[2]->code_wallet=="" && $ad[2]->image_wallet=="")
	## Esta pendiente el registro del código wallet por parte del comprador, una vez se realice el registro te informaremos ##
@else
	@if($ad[2]->code_wallet!="")
		@component('mail::button', ['url' => url('/ver_mis_ventas/'.$user->id.'?='.$ad[2]->transactionId)])
		Ver código wallet 
		@endcomponent
	@elseif($ad[2]->image_wallet!="")
		@component('mail::button', ['url' => url('/ver_mis_ventas/'.$user->id.'?='.$ad[2]->transactionId)])
		Ver código wallet QR
		@endcomponent
	@endif
@endif

Recuerda que debes tener saldo en la cuenta de recargas para que los usuarios puedan
ver tus datos de contacto.

## BALANCE DE COMPRA {{$recarga}} ##


#[Sitio Web][1]
[1]:{{$url}}#



Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent
