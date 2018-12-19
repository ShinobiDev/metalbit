@component('mail::message')
# {{ config('app.name')}} #

![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, algo esta sucediendo con la app.




## RESUMEN ERROR ##

{{$error}}

#[ir a la web][1]
[1]:http://metalbit.co/core/#
 


Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent
