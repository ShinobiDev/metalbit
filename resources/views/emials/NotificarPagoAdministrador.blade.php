@component('mail::message')


![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)

Estimad@ {{$user->name}}, se ha confirmado el pago por parte de un anunciante
## Resumen Oferta ##


@component('mail::table')
    | tipo | cantidad criptomoneda | criptomoneda |  valor pagado | divisa | 
    |:----------|:----------|:----------|:----------|:----------|
    | {{$ad[0]->tipo_anuncio}} | {{$ad[0]->transactionQuantity}} | {{$ad[0]->nombre_cripto_moneda}} | ${{number_format($ad[3]['pago'],'0',',','.')}} | {{$ad[0]->nombre_moneda}} | 
@endcomponent



#[Ver transacciones][1]
[1]:{{$ad[1]['url']}}#



Gracias, por seguir confiando en nosotros<br>
{{ config('app.name') }}
@endcomponent
