@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, hemos registrado la confirmación de una recarga en {{config('app.name')}}, por parte de un usuario, es importante que verifiques la transacción con la entidad de pago.


##Datos Usuario##
# Usuario : 
	{{$ad[0]->name}}
# Teléfono: 
	{{$ad[0]->phone}}
# Email: 
	{{$ad[0]->email}}

## Resumen Pago ##

# Número de transacción
#{{$ad[1]->referencia_pago_pay_u }}



#[Ver recargas][1]
[1]:{{$ad[2]['url']}}



Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent
	