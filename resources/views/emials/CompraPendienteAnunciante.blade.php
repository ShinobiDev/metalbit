@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, Hemos registrado una nueva venta de un anuncio en METALBIT, sin  embargo aun esta pendiente por el pago de el comprador

##COMPRADOR##
Nombre: {{$ad[0]->name}}
Teléfono: {{$ad[0]->phone}}
Correo electrónico: {{$ad[0]->email}}

@component('mail::table')
    | tipo | cantidad criptomoneda | criptomoneda |  valor compra | divisa | 
    |:----------|:----------|:----------|:----------|:----------|
    | {{$ad[1]->tipo_anuncio}} | {{$ad[2]->transactionQuantity}} | {{$ad[1]->nombre_cripto_moneda}} | {{$ad[2]->transation_value}} | {{$ad[1]->nombre_moneda}} | 
@endcomponent

Recuerda que debes tener saldo en la cuenta de recargas para que los usuarios puedan
ver tus datos de contacto.

## BALANCE DE COMPRA {{$recarga}} ##


#[Sitio web][1]
[1]:{{$url}}#



Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent
