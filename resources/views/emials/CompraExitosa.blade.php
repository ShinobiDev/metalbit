@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, Hemos registrado una compra exitosa en METALBIT.


Por favor comunicate con tu comprador, para que se complete la transacción.

## Datos comprador##

Nombre:{{$ad->name}}
Télefono:{{$ad->phone}}
Correo electrónico:{{$ad->email}}



## Resumen Oferta ##
Anuncio:
Estado: APROVADA




Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent
