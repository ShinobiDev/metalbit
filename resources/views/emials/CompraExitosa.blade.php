@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, Hemos registrado una compra exitosa en METALBIT.


Por favor comunicate con tu comprador, para que se complete la transacción.

## Datos comprador##

Nombre: {{$ad[0]->name}}
Teléfono: {{$ad[0]->phone}}
Correo electrónico:{{$ad[0]->email}}

@component('mail::table')
    | tipo | cantidad criptomoneda | criptomoneda |  valor compra | divisa | 
    |:----------|:----------|:----------|:----------|:----------|
    | {{$ad[1]->tipo_anuncio}} | {{$ad[2]->transactionQuantity}} | {{$ad[1]->nombre_cripto_moneda}} | {{$ad[2]->transation_value}} | {{$ad[1]->nombre_moneda}} | 
@endcomponent

@if($ad[2]->code_wallet=="" || $ad[2]->image_wallet=="")
	##Esta pendiente el registro del código wallet por parte del comprador, una vez se realice el registro te informaremos##
@endif

## Resumen Oferta ##
Anuncio:
Estado: APROVADA




Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent
