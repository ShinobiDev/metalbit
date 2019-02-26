@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, hemos registrado una nueva venta de un anuncio en {{config('app.name')}}

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
    | {{$ad[1]->tipo_anuncio}} | {{$ad[2]->transactionQuantity}} | {{$ad[1]->nombre_cripto_moneda}} | ${{number_format($ad[2]->transation_value,'0',',','.')}} | {{$ad[1]->nombre_moneda}} | 
@endcomponent

@if($ad[2]->code_wallet=="" && $ad[2]->image_wallet=="")
	## Esta pendiente el registro del código wallet por parte del comprador, una vez se realice el registro te informaremos ##
@else
	{{--@if($ad[2]->code_wallet!="")
		
		#[Ver código wallet][1]
		[1]:{{$ad[3]['url']}}
		
	@elseif($ad[2]->image_wallet!="")
		
		#[Ver código wallet QR][1]
		[1]:{{$ad[3]['url']}}

	@endif--}}
@endif

Recuerda que debes tener saldo en la cuenta de recargas para que los usuarios puedan
ver tus datos de contacto.


## BALANCE DE RECARGA $ {{number_format($recarga,0,',','.')}} ##

#[Ver venta][1]
[1]:{{$ad[3]['url']}}#



Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent
