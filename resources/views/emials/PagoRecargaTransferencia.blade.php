@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, se ha realizado una nueva recarga pendiente.

Recarga pendiente por valor: $ {{number_format($recarga[1]['valor'],'0',',','.')}} , solo falta que realices el pago.


## Resumen Oferta ##

#Presiona este link para ver la certificación bancaria donde podrás realizar el pago de tu recarga en {{config('app.name')}}.

#[MEDIO DE PAGO][1]
[1]:{{$ad[0]['medio_pago']}}	


Estado: PENDIENTE DE APROBACIÓN

Recuerda que debes tener saldo en la cuenta de recargas para que los usuarios puedan
ver tus datos de contacto.


## BALANCE ACTUAL DE RECARGA $ {{number_format($recarga[0]->valor,0,',','.')}} ##

#[Recargar][2]
[2]:{{$url}}


Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent
