@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, hemos registrado una compra exitosa en {{config('app.name')}}.


## Datos vendedor##

#Nombre: {{$ad[0]->name}}

#Teléfono: {{$ad[0]->phone}}

#Correo electrónico: {{$ad[0]->email}}

## Resumen Oferta ##

@component('mail::table')
    | tipo | cantidad criptomoneda | criptomoneda |  valor compra | divisa | 
    |:----------|:----------|:----------|:----------|:----------|
    | {{$ad[1]->tipo_anuncio}} | {{$ad[2]->transactionQuantity}} | {{$ad[1]->nombre_cripto_moneda}} | ${{number_format($ad[2]->transation_value,0,',','.')}} | {{$ad[1]->nombre_moneda}} | 
@endcomponent

@if($ad[2]->code_wallet=="" && $ad[2]->image_wallet=="")
		## Esta pendiente el registro de tu código wallet, recuerda que es importante que realices este proceso para darle a conocer al vendedor la información requerida para hacer la transacción ##

@component('mail::button', ['url' => url('ver_mis_compras/'.$user->id.'?='.$ad[2]->transactionId)])
Registrar Código Wallet
@endcomponent


@else
	{{--@if($ad[2]->code_wallet!="")
		@component('mail::button', ['url' => url('/ver_mis_ventas/'.$user->id.'?='.$ad[2]->transactionId)])
		Ver código wallet
		@endcomponent
	@elseif($ad[2]->image_wallet!="")
		
		@component('mail::button', ['url' => url('/ver_mis_ventas/'.$user->id.'?='.$ad[2]->transactionId)])
		Ver código wallet QR
		@endcomponent
	@endif--}}
@endif

## Resumen Oferta ##
Anuncio:
Estado: APROBADA

#[Ver compra][1]
[1]:{{$ad[3]['url']}}

Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent
