@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, hemos registrado una posible compra, solo falta que la confirmes, realiza el pago en la entidad de tu elección y una vez se realice la confirmación, te enviaremos la información correspondiente para realizar la transacción



## Resumen Oferta ##
Anuncio:
Estado de la compra: PENDIENTE

#Datos del vendedor

#Nombre: {{$ad[0]->name}}

#Teléfono: {{$ad[0]->phone}}

#Correo electrónico: {{$ad[0]->email}}

## Resumen Oferta ##

# Número de transacción
#{{$ad[2]->transactionId}}

@component('mail::table')
    | tipo | cantidad criptomoneda | criptomoneda |  valor compra | divisa | 
    |:----------|:----------|:----------|:----------|:----------|
    | {{$ad[1]->tipo_anuncio}} | {{$ad[2]->transactionQuantity}} | {{$ad[1]->nombre_cripto_moneda}} | ${{number_format($ad[2]->transation_value,'0',',','.')}} | {{$ad[1]->nombre_moneda}} | 
@endcomponent

@if($ad[2]->code_wallet=="SIN REGISTRAR" && $ad[2]->image_wallet=="SIN REGISTRAR")
	## Esta pendiente el registro de tu código wallet, recuerda que es importante que realices este proceso para darle a conocer al vendedor la información requerida para hacer la transacción ##

@component('mail::button', ['url' => url('ver_mis_compras'.'/'.$user->id.'?='.$ad[2]->transactionId)])
Registrar Código Wallet
@endcomponent

@endif
	
	

Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent
