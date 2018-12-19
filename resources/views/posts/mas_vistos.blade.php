{{--aqui va el listado de los mas cliceados--}}

@php
$i=1;
@endphp
@foreach ($ad as $a)

<div class="modal-body">
	
    <h4># {{$i++}} {{$a->tipo_anuncio}} de {{$a->nombre_cripto_moneda}}</h4>
    <h4></h4>
    
    @if($a->tipo=="compra")
    	<h4>para compras </h4>
    @else
    	<h4>para ver información </h4>
    @endif
    <h4> {{$a->print_ad}} de clics </h4>
</div>    

@endforeach
