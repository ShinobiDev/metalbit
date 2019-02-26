<div>
	<label>Selecciona el tipo de pago de preferencia</label>
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

</div>