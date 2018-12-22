@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, hemos registrado una compra exitosa en METALBIT.


Por favor comunicate con tu comprador, para que se complete la transacción.

## Datos vendedor##

Nombre: {{$ad[0]->name}}
Teléfono: {{$ad[0]->phone}}
Correo electrónico: {{$ad[0]->email}}

## Resumen Oferta ##

@component('mail::table')
    | tipo | cantidad criptomoneda | criptomoneda |  valor compra | divisa | 
    |:----------|:----------|:----------|:----------|:----------|
    | {{$ad[1]->tipo_anuncio}} | {{$ad[2]->transactionQuantity}} | {{$ad[1]->nombre_cripto_moneda}} | {{$ad[2]->transation_value}} | {{$ad[1]->nombre_moneda}} | 
@endcomponent

@if($ad[2]->code_wallet=="" && $ad[2]->image_wallet=="")
		## Esta pendiente el registro de tu código wallet, recuerda que es importante que realices este proceso para darle a conocer al vendedor la información requerida para hacer la transacción ##

@component('mail::button', ['url' => url('registrar_codigo_wallet'.'/'.$ad[2]->transactionId)])
Registrar Código Wallet
@endcomponent

@else
	@if($ad[2]->code_wallet!="")
		## Código wallet ##
		## {{$ad[2]->code_wallet}} ##	
	@elseif($ad[2]->image_wallet!="")
		##DESCARGA EL QR##
		{{ config('app.url') }}{{$ad[2]->image_wallet}}
	@endif
@endif

## Resumen Oferta ##
Anuncio:
Estado: APROBADA



Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent
