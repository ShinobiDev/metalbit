@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, Hemos registrado una compra Pendiente falta que la confirmes.



## Resumen Oferta ##
Anuncio:
Estado: PENDIENTE
#Anunciante
Nombre: {{$ad[0]->name}}
Teléfono: {{$ad[0]->phone}}
Correo electrónico: {{$ad[0]->email}}

@component('mail::table')
    | tipo | cantidad criptomoneda | criptomoneda |  valor compra | divisa | 
    |:----------|:----------|:----------|:----------|:----------|
    | {{$ad[1]->tipo_anuncio}} | {{$ad[2]->transactionQuantity}} | {{$ad[1]->nombre_cripto_moneda}} | {{$ad[2]->transation_value}} | {{$ad[1]->nombre_moneda}} | 
@endcomponent

@if($ad[2]->code_wallet!=null)
	## Código wallet ##
	## {{$ad[2]->code_wallet}} ##	
@elseif($ad[2]->image_wallet!=null)
	##DESCARGA EL QR##
	{{ config('app.url') }}{{$ad[2]->image_wallet}}
@else
	##Esta pendiente el registro del código wallet por parte del comprador, una vez se realice el registro te informaremos##
@endif


Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent
