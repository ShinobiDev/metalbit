<div>
	
	<label>Selecciona el tipo de pago de tu preferencia</label>
	

	@if($ad->transaccion_pendiente['state']=='Pendiente')
		
		

		@if($ad->transaccion_pendiente['type']=='Pago en efectivo')
			<div class="radio">
			  <label><input type="radio" name="tipo_pago" onchange="validar_tipo_pago(this,'{{$ad->id}}')" value="1">	1. Pago por Transferencia Bancaria.
			</label>
			</div>
			
			<div class="radio">
			  <label><input type="radio" name="tipo_pago" onchange="validar_tipo_pago(this,'{{$ad->id}}')" value="2" checked>2. Pago en Efectivo Oficina Bogotá.</label>
			</div>
			<input type="hidden" id="hd_tipo_pago{{$ad->id}}" value="2">


		@else
			<div class="radio">
			  <label><input type="radio" name="tipo_pago" onchange="validar_tipo_pago(this,'{{$ad->id}}')" value="1" checked="">	1. Pago por Transferencia Bancaria.
			</label>
			</div>
			
			<div class="radio">
			  <label><input type="radio" name="tipo_pago" onchange="validar_tipo_pago(this,'{{$ad->id}}')" value="2" >2. Pago en Efectivo Oficina Bogotá.</label>
			</div>		
			<input type="hidden" id="hd_tipo_pago{{$ad->id}}" value="1">
		@endif	
		
		
		<label id="msnMensajeCompra_{{$ad->id}}"></label>
		
		<input id="btn_comprar_{{$ad->id}}" type="button" name="submit" value="CAMBIAR METODO COMPRA" class="btn btn-success" onclick="enviar_registro_compra('{{$ad->id}}')" disabled>

	@elseif($ad->transaccion_pendiente['state']=='Visto' || $ad->transaccion_pendiente['state']==0)
		
		
		<div class="radio">
		  <label><input type="radio" name="tipo_pago" onchange="validar_tipo_pago(this,'{{$ad->id}}')" value="1">	1. Pago por Transferencia Bancaria.
		</label>
		</div>
		<div class="radio">
		  <label><input type="radio" name="tipo_pago" onchange="validar_tipo_pago(this,'{{$ad->id}}')" value="2" >2. Pago en Efectivo Oficina Bogotá.</label>
		</div>
		<label id="msnMensajeCompra_{{$ad->id}}"></label>
		<input type="hidden" id="hd_tipo_pago{{$ad->id}}">
		<input id="btn_comprar_{{$ad->id}}" type="button" name="submit" value="COMPRAR" class="btn btn-success" onclick="enviar_registro_compra('{{$ad->id}}')" disabled>

	
	@endif
	

</div>