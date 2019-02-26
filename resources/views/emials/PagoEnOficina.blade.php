@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, hemos registrado un deseo de compra en {{config('app.name')}}.


## Datos vendedor##

#Nombre: {{$ad[0]->name}}

#Teléfono: {{$ad[0]->phone}}

#Correo electrónico: {{$ad[0]->email}}

## Resumen Oferta ##

@component('mail::table')
    | tipo | cantidad criptomoneda | criptomoneda |  valor compra | divisa | 
    |:----------|:----------|:----------|:----------|:----------|
    | {{$ad[1]->tipo_anuncio}} | {{$ad[2]->transactionQuantity}} | {{$ad[1]->nombre_cripto_moneda}} | ${{number_format($ad[2]->transation_value,0,',','.')}} | {{$ad[1]->nombre_moneda}} | 
@endcomponent

#Información de nuestra oficina

#METALBIT S.A.S.
#Calle 114 #53 - 96 
#Bogotá D.C. - Colombia 
#Horario: Lunes a Viernes de 8:00 a.m. - 12:30m y de 1:30 p.m. a 5:00 p.m. 


## Resumen Oferta ##
Anuncio:
Estado: PENDIENTE PAGO

#[Ver compra][1]
[1]:{{$ad[3]['url']}}

Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent
