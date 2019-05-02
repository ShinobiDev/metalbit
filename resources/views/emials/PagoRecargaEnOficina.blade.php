@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, se ha realizado una nueva recarga pendiente.

Recarga pendiente por valor: $ {{number_format($recarga[1]['valor'],'0',',','.')}} , solo falta que realices el pago en nuestra oficina.


## Resumen Oferta ##

#Información de nuestra oficina

#METALBIT S.A.S.
#Calle 114 #53 - 96 
#Bogotá D.C. - Colombia 
#Horario: Lunes a Viernes de 8:00 a.m. - 12:30m y de 1:30 p.m. a 5:00 p.m. 

Valor a pagar: $ {{number_format($recarga[1]['valor_a_pagar'],'0',',','.')}}

Estado: PENDIENTE DE APROBACIÓN

Recuerda que debes tener saldo en la cuenta de recargas para que los usuarios puedan
ver tus datos de contacto.


## BALANCE ACTUAL DE RECARGA $ {{number_format($recarga[0]->valor,0,',','.')}} ##

#[Recargar][1]
[1]:{{$url}}


Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent
