@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Hola, soy {{$user->name}}, quiero invitarte a que te inscribas en METALBIT

debes seguir las instrucciones para registarte.


#[Registrate aquí][1]
[1]:{{$url}}  


Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent
