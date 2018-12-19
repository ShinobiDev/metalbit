@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, Hemos registrado una compra sin embargo ha sido rechazada.



## Resumen Oferta ##
Anuncio:
Estado: RECHAZADA

Recuerda validar con tu entidad o medio de pago.








Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent
