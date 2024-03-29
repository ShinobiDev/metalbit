@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, se ha realizado una nueva recarga pendiente.

Recarga pendiente por valor: $ {{number_format($recarga[1]['valor'],'0',',','.')}} , solo falta que realices el pago.


## Resumen Oferta ##

#Presiona este link para ver la certificación bancaria donde podrás realizar el pago de tu recarga en {{config('app.name')}}.

#Entidad bancaria Bancolombia S.A
#Cuenta de ahorro 821-995486-69	


#[MEDIO DE PAGO][1]
[1]:{{$ad[0]['medio_pago']}}	

Valor a pagar: $ {{number_format($recarga[1]['valor_a_pagar'],'0',',','.')}}

Estado: PENDIENTE DE APROBACIÓN

Recuerda que debes tener saldo en la cuenta de recargas para que los usuarios puedan
ver tus datos de contacto.


#[Recargar][2]
[2]:{{$url}}


Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent
