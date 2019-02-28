<div>	
	@if($recarga_pendiente!=null)
			@if($recarga_pendiente->estado_detalle_recarga=='PENDIENTE')
				<div>
					<label>¿Monto a recargar?</label>
					<input id="num_valor_recarga" type="number" min="20000" value="{{number_format($recarga_pendiente->valor_recarga,0,'','')}}" onchange="cambiar_valor_recarga(this)" readonly>
					@include('partials.redimir_cupon_recarga',['c'=>auth()->user()->id])
					<label  class="text-success">Total a pagar $<span id="msnValorAPagar">{{number_format($recarga_pendiente->valor_pagado,0,',','.')}}</span></label>
					<input type="hidden" id="hd_val_recarga" value="20000">	
				</div>
				<label>Selecciona el tipo de pago de tu preferencia</label>
				@if($recarga_pendiente->metodo_pago=='Pago en efectivo')
					<div class="radio">
					  <label><input type="radio" name="tipo_pago" onchange="validar_tipo_pago_recargas(this,'{{auth()->user()->id}}')" value="1">	1. Pago por Transferencia Bancaria.
					</label>
					</div>
					<div class="radio">
					  <label><input type="radio" name="tipo_pago" onchange="validar_tipo_pago_recargas(this,'{{auth()->user()->id}}')" value="2" checked>2. Pago en Efectivo Oficina Bogotá.</label>
					</div>
				@else
					<div class="radio">
					  <label><input type="radio" name="tipo_pago" onchange="validar_tipo_pago_recargas(this,'{{auth()->user()->id}}')" value="1">	1. Pago por Transferencia Bancaria.
					</label>
					</div>
					<div class="radio">
					  <label><input type="radio" name="tipo_pago" onchange="validar_tipo_pago_recargas(this,'{{auth()->user()->id}}')" value="2" checked>2. Pago en Efectivo Oficina Bogotá.</label>
					</div>
				@endif
				
				
				
				<label id="msnMensajeCompra_{{auth()->user()->id}}"></label>
				<input type="hidden" id="hd_tipo_pago">
				<input type="hidden" id="refRecarga" value="{{$ref_code}}">
				<input id="btn_recarga" type="button" name="button" value="RECARGAR" class="btn btn-success" onclick="enviar_registro_recarga('{{auth()->user()->id}}')" disabled>
			@endif
		@else
			<div>
				<label>¿Monto a recargar?</label>
				<input id="num_valor_recarga" type="number" min="20000" value="20000" onchange="cambiar_valor_recarga(this)">
				@include('partials.redimir_cupon_recarga',['c'=>auth()->user()->id])
				<label  class="text-success">Total a pagar $<span id="msnValorAPagar"> 20.000</span></label>
				<input type="hidden" id="hd_val_recarga" value="20000">	
			</div>
			<label>Selecciona el tipo de pago de tu preferencia</label>
			
			<div class="radio">
			  <label><input type="radio" name="tipo_pago" onchange="validar_tipo_pago_recargas(this,'{{auth()->user()->id}}')" value="1">	1. Pago por Transferencia Bancaria.
				</label>
			</div>
			<div class="radio">
			  <label><input type="radio" name="tipo_pago" onchange="validar_tipo_pago_recargas(this,'{{auth()->user()->id}}')" value="2" >2. Pago en Efectivo Oficina Bogotá.</label>
			</div>
			
			<label id="msnMensajeCompra_{{auth()->user()->id}}"></label>
			<input type="hidden" id="hd_tipo_pago">
			<input type="hidden" id="refRecarga" value="{{$ref_code}}">
			<input id="btn_recarga" type="button" name="button" value="RECARGAR" class="btn btn-success" onclick="enviar_registro_recarga('{{auth()->user()->id}}')" disabled>
		@endif
</div>
